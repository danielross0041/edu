@extends('web.layouts.main') @section('content')

<form id="create-job-form">

    @csrf 

    @if(isset($job) && $job != null)

    <input type="hidden" name="job_id" value="{{Crypt::encrypt($job->id)}}" />

    @endif

    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />

    <input type="hidden" name="step_filled" value="4" />

    <input type="hidden" name="company_logo" id="company_logo" value="">

    <section class="basic-info">

        <div class="container">

            <div class="row">

                <div class="col-md-8">

                    <div class="heading-edit-job">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="hding-job">

                                    <h4>Describe the Job</h4>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="hding-job-img">

                                    <img src="{{asset('web/images/DESCRIBE-THE-JOB.png')}}" />

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="maininfo-sec">
                        <div class="row">
                        <div class="mainn">

                            <div class="col-md-12">

                                <div class="describe-job">

                                    <h4>Job Description <span>*</span></h4>

                                    <p>Describe the responsibilities of this job, required work experience, skills, or education.</p>

                                </div>

                                <div class="hiring-accord">

                                    <div class="hiring-pneal">

                                        <div class="panel" style="max-height: 472px;">

                                            <textarea name="job_description" id="job_description" class="keyouttext" required=""></textarea>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        </div>

                        <div class="mainn add-cvd">
                            <div class="row">
                            <div class="col-md-12">

                                <div class="describe-job">

                                    <h4>Are you taking any additional COVID-19 precautions?</h4>

                                    <p>Let people know how your company is responding to COVID-19.</p>

                                </div>

                                <div class="hiring-accord">

                                    <div class="hiring-pneal">

                                        <div class="panel" style="max-height: 472px;">

                                            <textarea name="covid_19_precautions" id="covid_19_precautions" class="keyouttext" required=""></textarea>

                                        </div>

                                    </div>

                                </div>

                            </div></div>

                        </div>

                    </div>

                    

                    

                    <div class="maininfo-sec">

                        <div class="mainn">
                            <div class="row">
                            <div class="col-md-12">

                                <div class="describe-job">

                                    <h4>Add company photos and videos</h4>

                                    <p>Give an inside look at working at your company by adding photos and videos to your post.</p>

                                </div>

                                <div class="hiring-accord">

                                    <div class="hiring-pneal">

                                        <div class="panel" style="max-height: 472px;">

                                       <!--  <label> Add Photo and videos

                                        <input type="file" size="60" >

                                        </label> --> 

                                         </div>

                                        <div class="dropzone" id="myDropzone"></div>

                                        <p>Drag and drop files here, or browse your computer.</p>

                                    </div>

                                </div>

                            </div></div>

                        </div>

                    </div>

                   

                </div>

                <div class="col-md-4 sticky-top">

                    <div class="about-job">

                        <h5>About this job</h5>

                        <p>we use this information to find the best candidate for this job</p>

                        <div class="about-img">

                            <img src="{{asset('web/images/about.png')}}" />

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="role-sec">

        <div class="container">

            <div class="row">

                <div class="col-md-8">

                    <div class="main-btn">

                        <div class="row">

                            <div class="col-sm-6">

                                <div class="user-btn">

                                    <a href="{{route('step4_form' ,Crypt::encrypt($job->id))}}" class="back">Back</a>

                                </div>

                            </div>

                            <div class="col-sm-6">

                                <div class="user-btnn">

                                    <a href="javascript:void(0)" class="back" id="uploadFile">Save and Continue</a>

                                    <input class="submit-form" type="hidden" />

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-4"></div>

            </div>

        </div>

    </section>

</form>

@endsection @section('css')

<style>

    .describe-job p {

        font-size: 16px;

        color: #878787;

        font-weight: unset;

    }

    .describe-job span {

        color: red;

    }

    .panel textarea {

        width: 100%;

        height: 100px;

        border-radius: 5px;

        border: 2px solid;

        border-color: #d1d1d1;

    }

    .panel label {

        padding: 10px;

        color: #2557a7;

        display: table;

        border: 2px solid;

        border-radius: 10px;

        border-color: #d1d1d1;

        font-weight: 700;

    }

    input[type="file"] {

        display: none;

    }

</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />

@endsection @section('js')

<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>

    var job_description = CKEDITOR.replace("job_description");

    job_description.on("change", function (evt) {

        $("#job_description").text(evt.editor.getData());

    });

</script>

<script>

    $(document).ready(function () {

        $(".one-location").hide();

    });

    $("#company_name").focusout(function () {

        var type = "duplicate";

        var table = "company";

        var value = $(this).val();

        var like = $(this);

        $.ajaxSetup({

            headers: {

                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),

            },

        });

        $.ajax({

            type: "post",

            dataType: "json",

            url: "{{route('validator_check')}}",

            data: { type: type, value: value, table: table },

            success: function (response) {

                if (response.status == 0) {

                    $(like).addClass("is-invalid");

                    $(like).removeClass("is-valid");

                } else {

                    $(like).addClass("is-valid");

                    $(like).removeClass("is-invalid");

                }

                return false;

            },

        });

    });

    $(".submit-form").click(function (e) {



        if ($('#job_description').val() == '') {

            toastr.error("Please job description first to process further");

            e.preventDefault();

            return false;

        }

        else if ($('#covid_19_precautions').val() == '') {

            toastr.error("Please COVID-19 precautions first to process further");

            e.preventDefault();

            return false;

        }

       

        var formData = $("#create-job-form").serialize();

        $.ajaxSetup({

            headers: {

                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),

            },

        });

        $.ajax({

            type: "post",

            dataType: "json",

            url: "{{route('job_create_save')}}",

            data: formData,

            success: function (response) {

                if (response.status == 1) {

                    window.location.href = response.location;

                }

                return false;

            },

        });

    });

    // $(".role_location").click(function(){

    //     if ($(this).data("key") == "one-location") {

    //     }

    // })

</script>

<script>

    //Dropzone.autoDiscover = false;

    var token = "{!! csrf_token() !!}";

    // Dropzone.options.myDropzone = {

    //     url: '{{route("companylogo_submit")}}',

    //     paramName: "file",

    //     autoProcessQueue: false,

    //     maxFiles: 1,

    //     maxFilesize: 1,

    //     acceptedFiles: 'image/*',

    //     addRemoveLinks: true,

    //     params: {

    //         _token: token

    //     },

    //     init: function() {

    //         this.on("addedfile", function(file) {

    //             alert("Added file.");

    //         }),

    //         this.on("success", function(file, response) {

    //             console.log(response);

    //         })

    //     }

    // }

    // $('#myDropzone').dropzone();

    Dropzone.options.myDropzone = {

        url: '{{route("companylogo_submit")}}',

        autoProcessQueue: false,

        uploadMultiple: false,

        parallelUploads: 1,

        maxFiles: 1,

        maxFilesize: 1,

        acceptedFiles: "image/*",

        addRemoveLinks: true,

        params: {

            _token: token,

        },

        init: function () {

            var submitButton = document.querySelector("#uploadFile");

            myDropzone = this;

            submitButton.addEventListener("click", function () {

                myDropzone.processQueue();

            });

            this.on("addedfile", function (file) {}),

                this.on("success", function (file, response) {

                    //console.log(file);

                    //console.log(response);

                    $("#company_logo").val(response);

                    //alert(response);

                    $(".submit-form").trigger("click");

                    toastr.success("Job has been successfully posted");

                    //window.location.href = "{{route('welcome')}}";

                });

        },

    };





</script>

@endsection

