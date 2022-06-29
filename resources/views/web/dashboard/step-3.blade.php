@extends('web.layouts.main') 

@section('content')



<form id="create-job-form">

@csrf



@if(isset($job) && $job != null)

  <input type="hidden" name="job_id" value="{{Crypt::encrypt($job->id)}}">

@endif

<input type="hidden" name="user_id" value="{{Auth::user()->id}}">

<input type="hidden" name="step_filled" value="2">

<section class="basic-info">

    <div class="container">

        <div class="row">

            <div class="col-md-8">

                <div class="heading-edit-job"> {{--information--}}

                    <div class="row">

                        <div class="col-md-6">

                            <div class="hding-job"> {{--job-post--}}
                                <?php echo (html_entity_decode(Helper::editck('h4', '', 'Include details' ,'h4Include details'.__LINE__)));?>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="hding-job-img"> {{--post-img--}}

                                <img src="{{asset('web/images/INCLUDE-DETAILS.png')}}" />

                            </div>

                        </div>

                    </div>

                </div>

                <div class="maininfo-sec">

                 {{-- COMMENT   <div class="mainn">

                        <h4>Is this a full-time or part-time job? <span class="asterik">*</span></h4>

                        <div class="row">

                        @foreach($data['part_time'] as $key => $val)

                        <div class="col-md-12">

                        <div class="post-opt">

                            <label class="container">

                                <p>{{$val}}</p>

                                <input type="radio" value="{{$val}}" {{(isset($job) && $job->part_time == $val)?'checked':''}} name="part_time" />

                                <span class="checkmark"></span>

                            </label>

                        </div>    

                        </div>

                        @endforeach

                        </div>

                    </div>  --}}



                    <div class="mainn">

                        <h4>Do any of these job types apply?</h4>

                        <div class="row">

                        @foreach($data['employment_type'] as $key => $val)

                        <div class="col-md-12">

                        <div class="post-opt">

                            <label class="container">

                                <p>{{$val}}</p>

                                <input type="checkbox" value="{{$val}}" {{(isset($job) && $job->employment_type == $val)?'checked':''}} name="employment_type" />

                                <span class="checkmark"></span>

                            </label>

                        </div>

                        </div>

                        @endforeach

                    </div>

                    </div>

                </div>



                <div class="maininfo-sec">

                    <div class="mainn">

                        <h4>What is the schedule for this job? <span class="asterik">*</span></h4>

                        <div class="row">
                                                @foreach($data['job_schedule'] as $key => $val)
                        @php

                    $array_job_schedule=$job_schedule_checked="";

                    $var_job_schedule = $job->job_schedule;

                    $array_job_schedule = explode(', ', $var_job_schedule);

                    @endphp

                    @if (in_array($val, $array_job_schedule))

                    @php  $job_schedule_checked="checked";@endphp

                    @else

                    @php $job_schedule_checked="";@endphp

                    @endif

                        <div class="col-md-12">

                        <div class="post-opt">

                            <label class="container">

                                <p>{{$val}}</p>

                                <input type="checkbox" data-key="{{$key}}" value="{{$val}}" class="job_schedule"  {{$job_schedule_checked}} name="job_schedule[]" />

                                <span class="checkmark"></span>

                            </label>

                        </div>

                        </div>

                        @endforeach    



                    </div>

                    </div>

                </div>





                <div class="maininfo-sec">

                    <div class="mainn">

                        <div class="language">

                        <p>How many people do you want to hire for this opening?<span class="asterik">*</span></p>

                        </div>

                        <div class="country-opt">

                            <select class="form-control" name="hire_open" required="" id="hire_open">

                                <option value="Not Mention" selected>Select an option</option>

                              

                                @for($i = 1;$i <= 10;$i++)

                                <option {{(isset($job) && $job->hire_open == $i)?'selected':''}} value="{{$i}}">{{$i}}</option>

                                @endfor

                                <option {{(isset($job) && $job->hire_open == 'I have an ongoing need to fill this role')?'selected':''}} value="I have an ongoing need to fill this role">I have an ongoing need to fill this role</option>

                            </select>

                        </div>

                    </div>

                    <div class="mainn">

                        <div class="language">

                        <p>How quickly do you need to hire?<span class="asterik">*</span></p>

                        </div>

                        <div class="country-opt">

                            <select class="form-control" name="need_to_hire" required="" id="need_to_hire">

                                <option value="Not Mention">Select an option</option>

                              @foreach($data['need_to_hire'] as $val)

                                <option {{(isset($job) && $job->need_to_hire == $val)?'selected':''}} value="{{$val}}">{{$val}}</option>

                              @endforeach

                            </select>

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

            </div>

            <div class="col-md-4 sticky-top">

                <div class="about-job">

                    <?php echo (html_entity_decode(Helper::editck('h5', '', 'About this job' ,'h5About this job'.__LINE__)));?>
                    <?php echo (html_entity_decode(Helper::editck('p', '', 'we use this information to find the best candidate for this job' ,'pwe use this information to find the best candidate for this job'.__LINE__)));?>

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

                                 <a href="{{route('step2_form' ,Crypt::encrypt($job->id))}}" class="back">Back</a>

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

            <div class="col-md-4"></div>

        </div>

    </div>

</section>

</form>



@endsection 

@section('css') 

@endsection 

@section('js')

<script>

    // CKEDITOR.replace("editor1");





    $(document).ready(function(){

        $(".one-location").hide()

    })



    $("#company_name").focusout(function(){

      var type = "duplicate";

      var table = "company";

      var value = $(this).val();

      var like = $(this);

      $.ajaxSetup({

        headers: {

          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

      });

      $.ajax({

        type: 'post',

        dataType : 'json',

        url: "{{route('validator_check')}}",

        data: {type:type , value:value,table:table},

          success: function (response) {

            if (response.status == 0) {

              $(like).addClass("is-invalid")

              $(like).removeClass("is-valid")

            }else{

              $(like).addClass("is-valid")

              $(like).removeClass("is-invalid")

            }

            return false;

          }

      });

    })





    $(".submit-form").click(function(){



        // if ($('input[name="part_time"]:checked').val() === undefined) {

        //     toastr.error("Please full-time or part-time job first to process further");

        //     return false;

        // }
        if ($('input[name="employment_type"]:checked').val() === undefined) {

            toastr.error("Please job types first to process further");

            return false;

        }if ($('.job_schedule').is(':checked')) {
        }else{

            toastr.error("Please schedule job first to process further");

            return false;

        }

        if ($('#hire_open').val() == 'Not Mention') {

            toastr.error("Please people do you want to hire first to process further");

            return false;

        }if ($('#need_to_hire').val() =='Not Mention') {

            toastr.error("Please need to hire first to process further");

            return false;

        }

       

        var formData = $("#create-job-form").serialize();

            $.ajaxSetup({

            headers: {

              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

          });

          $.ajax({

            type: 'post',

            dataType : 'json',

            url: "{{route('job_create_save')}}",

            data: formData,

              success: function (response) {

                if (response.status == 1) {

                    window.location.href = response.location;

                }

                return false;

              }

          });



    })





    // $(".role_location").click(function(){

    //     if ($(this).data("key") == "one-location") {

            

    //     }

    // })

</script>

@endsection

