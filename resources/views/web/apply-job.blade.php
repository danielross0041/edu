@extends('web.layouts.main')
@section('content')
<section class="inner-banner">
    <img src="{{asset('web/images/bnr-bg.jpg')}}" />
    <div class="inner-cap">
        <h4>Apply <span>Now</span></h4>
    </div>
</section>
<section class="login-sec">
    <div class="container">
        <div class="user-login">
            <div class="user-maininfo">
                <p>
                    Apply for <span><a href="{{route('job_details' ,Crypt::encrypt($job->id))}}">{{$job->job_title}}</a></span>
                </p>
            </div>
            <form id="job_applied" class="job-app-form">
                @csrf
                <input type="hidden" name="resume_upload" id="resume_upload" value="" />
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                <input type="hidden" name="job_id" value="{{$job->id}}" />
                <div class="row">
                    <div class="col-md-12">
                        <div class="ability-wrapper">
                            <input id="first_name" placeholder="Enter your first name" type="text" name="first_name" required autofocus />
                            <input id="last_name" placeholder="Enter your last name" type="text" name="last_name" required />
                            <input id="email_address" placeholder="Enter your email" type="email" readonly="" value="{{Auth::user()->email}}" name="email" required />
                            <input id="city" placeholder="Enter your City, State" type="text" name="city" required />
                            <input id="phonenumber" placeholder="Enter your Phone number" value="{{Auth::user()->phonenumber}}" type="text" name="phonenumber" required />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="dropzone" id="myDropzone"></div>
                        {{--
                        <p>Drag and drop your resume here, or browse your computer.</p>
                        --}}
                        <p class="resume-apply">
                            Resume Required To Apply
                        </p>
                    </div>
                    <div class="col-md-12">
                        <div class="cntnue-mail">
                            <button type="button" id="uploadFile">Apply</button>
                            <input class="submit-form" type="hidden" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@section('css')
<style>
    .resume-apply {
        color: red;
    }
    #myDropzone span i {
        display: block;
        font-size: 32px;
        color: #8f8e8e;
    }
    .job-app-form .dropzone > div {
        margin: 1rem;
    }
    .dropzone {
        min-height: 0;
        border: 2px solid rgba(0, 0, 0, 0.3);
        background: white;
        padding: 10px;
    }
</style>
<link href="{{asset('vendors/dropzone2/dropzone.min.css')}}" rel="stylesheet" />
@endsection
@section('js')
<script src="{{asset('vendors/dropzone2/dropzone.min.js')}}"></script>
<script>
    var token = "{!! csrf_token() !!}";
    Dropzone.options.myDropzone = {
        url: '{{route("resume_upload_submit")}}',
        autoProcessQueue: false,
        uploadMultiple: false,
        parallelUploads: 1,
        maxFiles: 1,
        maxFilesize: 1,
        acceptedFiles: ".pdf,.docx",
        addRemoveLinks: true,
        params: {
            _token: token,
        },
        init: function () {
            var submitButton = document.querySelector("#uploadFile");
            myDropzone = this;
            submitButton.addEventListener("click", function (f) {
                var has_error = 0;
                var has_error = 0;
                $("#job_applied input,email").each(function (i, e) {
                    if ($(e).prop("required") == true) {
                        if ($(e).val() == "") {
                            var name = $(e).prop("name");
                            name = name.replaceAll("_", " ");
                            if (name != "email") {
                                word = name[0].toUpperCase() + name.substring(1);
                                toastr.error(word + " this question is required");
                                f.preventDefault();
                                $(e).closest(".ability-wrapper").find("input").focus();
                                has_error++;
                                return false;
                            }
                        }
                    }
                });
                if (has_error == 0) {
                    // $("#get_started").submit();
                    myDropzone.processQueue();
                }
            });
            this.on("addedfile", function (file) {}),
                this.on("success", function (file, response) {
                    $("#resume_upload").val(response);
                    $(".submit-form").trigger("click");
                    toastr.success("You have been successfully applied for this job");
                });
        },
    };
    $(".submit-form").click(function (e) {
        var formData = $("#job_applied").serialize();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "post",
            dataType: "json",
            url: "{{route('job_applied')}}",
            data: formData,
            success: function (response) {
                if (response.status == 1) {
                    window.location.href = response.location;
                } else {
                    toastr.error(response.message);
                    setTimeout(function () {
                        window.location.href = response.location;
                    }, 3000);
                }
                return false;
            },
        });
    });
</script>
@endsection
