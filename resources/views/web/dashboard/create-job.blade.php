@extends('web.layouts.main') @section('content')
<form id="create-job-form">
    @csrf @if(isset($job) && $job != null)
    <input type="hidden" name="job_id" value="{{Crypt::encrypt($job->id)}}" />
    @endif
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
    <input type="hidden" name="step_filled" value="1" />
    <section class="basic-info">
        <div class="container">
            <div class="row">
                <!-- TOP DIV -->
                <div class="col-md-8">
                    <div class="heading-edit-job">
                        {{--information--}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="hding-job">
                                    {{--job-post--}}
                                    <?php echo (html_entity_decode(Helper::editck('h4', '', 'Employers' ,'h4Employers'.__LINE__)));?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="hding-job-img">
                                    {{-- post-img --}}
                                    <img src="{{asset('web/images/joob1.png')}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="maininfo-sec">
                        <div class="mainn">
                            <div class="country">
                                <p>Company name for this job <span class="asterik">*</span></p>
                            </div>
                            <div class="country-opt">
                                <input type="text" name="company_name" value="{{isset($job)?$job->company_name:''}}" id="company_name" required="" class="form-control" />
                            </div>
                        </div>
                        <div class="mainn">
                            <div class="language">
                                <p>Your role in the hiring process <span class="asterik">*</span></p>
                            </div>
                            <div class="country-opt">
                                <select class="form-control" id="exampleFormControlSelect1" name="hiring_process_role">
                                    @foreach($data['hiring_process_role'] as $val)
                                    <option {{(isset($job) && $job->hiring_process_role == $val)?'selected':''}} value="{{$val}}">{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{--
                        <div class="mainn">
                            <div class="language">
                                <p>Your typical hiring budget <span class="asterik">*</span></p>
                            </div>
                            <div class="country-opt">
                                <select class="form-control" id="exampleFormControlSelect1" name="hiring_budget">
                                    @foreach($data['hiring_budget'] as $val)
                                    <option {{(isset($job) && $job->hiring_budget == $val)?'selected':''}} value="{{$val}}">{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mainn">
                            <div class="language">
                                <p>Job title <span class="asterik">*</span></p>
                            </div>
                            <div class="country-opt">
                                <input type="text" name="job_title" value="{{isset($job)?$job->job_title:''}}" class="form-control" required="" />
                            </div>
                        </div>
                        <div class="mainn">
                            <div class="language">
                                <p>Location <span class="asterik">*</span></p>
                            </div>
                            <div class="country-opt">
                                <input type="text" name="location" value="{{isset($job)?$job->location:''}}" class="form-control" required="" />
                            </div>
                        </div>
                        --}}
                    </div>
                    <div class="maininfo-sec">
                        <div class="mainn">
                            <div class="language">
                                <p>Job title <span class="asterik">*</span></p>
                            </div>
                            <div class="country-opt">
                                <input type="text" name="job_title" list="all_job_title" value="{{isset($job)?$job->job_title:''}}" class="form-control" required="" />
                            </div>
                            <div class="country-opt">
                                <datalist id="all_job_title">
                                    @foreach($data2 as $val)
                                    <option value="{{$val}}"></option>
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                    </div>
                    {{--
                    <div class="start-jobb">
                        <h4>Salary</h4>
                        <div class="mainn">
                            <div class="language">
                                <p>Starting Range<span class="asterik">*</span></p>
                            </div>
                            <div class="country-opt">
                                <input type="number" min="0" name="starting_salary" value="{{isset($job)?$job->starting_salary:''}}" class="form-control" required="" />
                            </div>
                        </div>
                        <div class="mainn">
                            <div class="language">
                                <p>Ending Range<span class="asterik">*</span></p>
                            </div>
                            <div class="country-opt">
                                <input type="number" min="1" name="ending_salary" value="{{isset($job)?$job->ending_salary:''}}" class="form-control" required="" />
                            </div>
                        </div>
                        <div class="language">
                            <p>Period<span class="asterik">*</span></p>
                        </div>
                        <div class="country-opt">
                            <select class="form-control" id="exampleFormControlSelect1" name="period">
                                @foreach($data['period'] as $val)
                                <option {{(isset($job) && $job->period == $val)?'selected':''}} value="{{$val}}">per {{$val}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="start-jobb">
                        <h4>Job description</h4>
                        <div class="mainn">
                            <div class="language">
                                <p>Describe the responsibilities of this job, required work experience, skills, or education.</p>
                            </div>
                            <div class="country-opt">
                                <textarea name="editor1" required="">{{isset($job)?$job->editor1:''}}</textarea>
                            </div>
                        </div>
                    </div>
                    --}}
                    <div class="role-sec">
                        <div class="start-jobb">
                            <h4>Which option best describe this role location?<span>*</span></h4>
                            @foreach($data['role_location'] as $key => $val)
                            <div class="post-opt">
                                <label class="container">
                                    <p>{{$key}}<span> ({{$val}})</span></p>
                                    <input type="radio" data-key="{{$key}}" value="{{$val}}" class="role_location" {{(isset($job) && $job->role_location == $val)?'checked':''}} name="role_location" />
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @endforeach
                        </div>
                        <div class="row one-location">
                            <div class="start-jobb">
                                <div class="col-md-12">
                                    <div class="language">
                                        <h4>Street address *</h4>
                                    </div>
                                    <div class="country-opt">
                                        <input type="text" name="street_address" value="" placeholder="We'll include this information in your job post." class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="language">
                                        <h4>City *</h4>
                                    </div>
                                    <div class="country-opt">
                                        <input type="text" name="city" value="" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="language">
                                        <h4>Zip code *</h4>
                                    </div>
                                    <div class="country-opt">
                                        <input type="text" name="zip_code" value="" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-btn">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="user-btn">
                                        <a href="{{route('step1_form')}}" class="back">Back</a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="user-btnn">
                                        <a href="javascript:void(0)" class="back submit-form">Save and Continue</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- TOP -->
                <!-- BOTTOM -->
                <!-- BOTTOM -->
                <div class="col-md-4 sticky-top">
                    <div class="about-job">
                        <?php echo (html_entity_decode(Helper::editck('h5', '', 'Post a Job' ,'h5Post a Job'.__LINE__)));?>
                        <?php echo (html_entity_decode(Helper::editck('p', '', 'we use this information to find the best candidate for this job' ,'pwe use this information to find the best candidate for this job'.__LINE__)));?>
                        <!-- <p>we use this information to find the best candidate for this job</p> -->
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
                <!-- HERE -->
                <!-- HERE -->
                <div class="col-md-4"></div>
            </div>
        </div>
    </section>
</form>
@endsection @section('css') @endsection @section('js')
<script>
    // CKEDITOR.replace("editor1");
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
    $(".submit-form").click(function () {
        if ($('input[name="company_name"]').val() == "") {
            toastr.error("Please company name first to process further");
            return false;
        }
        if ($('input[name="hiring_process_role"]').val() == "") {
            toastr.error("Please role in the hiring process first to process further");
            return false;
        }
        if ($('input[name="job_title"]').val() == "") {
            toastr.error("Please job title first to process further");
            return false;
        }
        if ($('input[name="role_location"]:checked').val() === undefined) {
            toastr.error("Please role location first to process further");
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
@endsection
