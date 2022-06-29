@extends('web.layouts.main') 
@section('content')
        <section class="inner-banner">
            <img src="{{asset('web/images/inner-banner.jpg')}}" />

            <div class="inner-cap">
                <form class="msform">
                    <ul id="progressbar">
                        <li class="active step-form" data-form="1" id="account"><strong>job basics</strong></li>
                        <li class="step-form" data-form="2" id="personal"><strong>job details</strong></li>
                        <li class="step-form" data-form="3" id="payment"><strong>describe the job</strong></li>
                        <li class="step-form" data-form="4" id="confirm"><strong>finalize your job listing</strong></li>
                    </ul>
                </form>
            </div>
        </section>

        <section class="step-sec">
            <div class="container" id="grad1">
                <div class="row justify-content-center mt-0">
                    <div class="col-md-12 p-0 mt-3 mb-2">
                        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                            <div class="row">
                                <div class="col-md-12 mx-0">
                                    <form id="msform" method="POST" class="form-job" enctype="multipart/form-data">
                                        <!-- fieldsets -->
                                        <fieldset class="steper-form active" data-step="1">
                                            
                                            <input type="hidden" name="job_id" class="job_id" value="">
                                            <input type="hidden" name="step_filled" value="1">
                                            
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <section class="industry-sec">
                                                <div class="container">
                                                    <div class="industry-basic">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="industry-title">
                                                                    <h4>job <span>basics</span></h4>
                                                                </div>
                                                                <div class="industry-small">
                                                                    <h4>Industry Standard Job Title <span>*</span></h4>
                                                                </div>
                                                                <div class="industry-form">
                                                                    <input type="text" name="job_title" value="{{isset($job)?$job->job_title:''}}" placeholder="ex: accountant, tax manager" />
                                                                </div>
                                                                <div class="industry-small">
                                                                    <h4>Where will this job primarily be performed? <span>*</span></h4>
                                                                </div>
                                                                <div class="industry-btn">
                                                                    <div class="row">
                                                                        @foreach($data['role_location'] as $key => $val)
                                                                        <div class="col-md-6">
                                                                            <input id="on-site-{{str_replace(' ','-',$key)}}" type="radio" name="role_location" value="{{$val}}" {{(isset($job) && $job->role_location == $val)?'checked':''}}  />
                                                                            <label for="on-site-{{str_replace(' ','-',$key)}}" title="{{$val}}">
                                                                                {{$key}}
                                                                            </label>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                <div class="industry-small">
                                                                    <h4>Job Location<span>*</span></h4>
                                                                </div>
                                                                <div class="industry-form">
                                                                    <label>Street Address</label>
                                                                    <input type="text" name="location" value="{{isset($job)?$job->location:''}}" placeholder="ex: Newyork, USA" required="" />
                                                                </div>
                             
                                                                <div class="industry-small">
                                                                    <h4>Company Name on Job Listing <span>*</span></h4>
                                                                </div>
                                                                <div class="industry-form">
                                                                    <input type="text" name="company_name" value="{{isset($job)?$job->company_name:''}}" id="company_name" required=""  placeholder="The Education Team" />
                                                                </div>
                                                                <div class="industry-noti">
                                                                    <h4>Job Notifications Will Be Sent To:</h4>
                                                                    <a href="mailto:{{Auth::user()->email}}">{{Auth::user()->email}}</a>
                                                                </div>
                                                                <div class="industry-small">
                                                                    <h4>Reference code (optional)</h4>
                                                                </div>
                                                                <div class="industry-form">
                                                                    <input type="text" name="reference_code" value="{{isset($job)?$job->reference_code:''}}" placeholder="Your company’s internal code" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <input type="button" name="next" class="next action-button" value="continue" />
                                        </fieldset>
                                        <fieldset class="steper-form" data-step="2">
                                            <input type="hidden" name="job_id" class="job_id" value="">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="step_filled" value="2">
                                            <section class="industry-sec" >
                                                <div class="container">
                                                    <div class="industry-basic">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="industry-title">
                                                                    <h4>job <span>details</span></h4>
                                                                </div>
                                                                <div class="industry-small">
                                                                    <h4>Employment Type <span>*</span></h4>
                                                                </div>
                                                                <div class="industry-btn">
                                                                    <div class="row">
                                                                        @foreach($data['employment_type'] as $key => $val)
                                                                        <div class="col-md-6">
                                                                            <input id="options-{{$key}}" value="{{$val}}" name="employment_type" type="radio" />
                                                                            <label for="options-{{$key}}">
                                                                                {{$val}}
                                                                            </label>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                <div class="industry-hiring">
                                                                    <i class="fa fa-rocket" aria-hidden="true"></i>
                                                                    <div class="hiring-para">
                                                                        <h4>HIRING BOOST</h4>
                                                                        <p>Listing a salary increases applications by 20%</p>
                                                                    </div>
                                                                </div>
                                                                <div class="industry-small">
                                                                    <h4>What does this job pay?</h4>
                                                                </div>
                                                                <div class="hiring-form">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <input type="text" min="0" name="starting_salary" value="{{isset($job)?$job->starting_salary:''}}" placeholder="$30000" required=""/>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" min="1" name="ending_salary" value="{{isset($job)?$job->ending_salary:''}}" placeholder="$30000" required=""/>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <select name="currency" required="">
                                                                                <option value="USD">$[USD]</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <select name="period" required="">
                                                                              @foreach($data['period'] as $val)
                                                                                <option {{(isset($job) && $job->period == $val)?'selected':''}} value="{{$val}}">per {{$val}}</option>
                                                                              @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="hiring-exact">
                                                                    <h4>Exact Rate</h4>
                                                                </div>
                                                                <div class="hiring-accord hiring-job">
                                                                    <div class="hiring-pneal">
                                                                        <button type="button" class="accordion active">Additional Compensation</button>
                                                                        <div class="panel" style="max-height: 135px;">
                                                                            <h4>Select all that apply</h4>
                                                                            <div class="hiring-frm">
                                                                                 @foreach($data['compensation'] as $val)
                                                                                <div>
                                                                                    <input type="radio" value="{{$val}}" name="compensation" />
                                                                                    <label>{{$val}}</label>
                                                                                </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <input type="button" name="continue" class="previous action-button-previous" value="Previous" /> 
                                            <input type="button" name="next" class="next action-button" value="Next Step" />
                                        </fieldset>
                                        <fieldset class="steper-form"  data-step="3">
                                            <input type="hidden" name="job_id" class="job_id" value="">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="step_filled" value="3">
                                            <section class="describe-sec">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="describe-job">
                                                                <h4>Describe <span>the Job</span></h4>
                                                                <p>Make sure your job ad gets the job done. Enter your description into each section for best results. The more complete the job ad, the better your responses.</p>
                                                            </div>
                                                            <div class="hiring-accord">
                                                                <div class="hiring-pneal">
                                                                    <button type="button" class="accordion active">Summary</button>
                                                                    <div class="panel" style="max-height: 472px;">
                                                                        <textarea name="summary" id="summary" class="keyouttext" required="">{{isset($job)?$job->summary:''}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="hiring-pneal">
                                                                    <button type="button" class="accordion">Qualifications & Skills</button>
                                                                    <div class="panel">
                                                                        <textarea name="skills" id="skills" class="keyouttext" required="">{{isset($job)?$job->skills:''}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="hiring-pneal">
                                                                    <button type="button" class="accordion">Company Description</button>
                                                                    <div class="panel">
                                                                        <textarea name="company_description" id="company_description" class="keyouttext" required="">{{isset($job)?$job->company_description:''}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <input type="button" name="cancel" class="previous action-button-previous" value="Previous" /> <input type="button" name="continue" class="next action-button" value="Confirm" />
                                        </fieldset>
                                        <fieldset class="steper-form" data-step="4">
                                            <input type="hidden" name="job_id" class="job_id" value="">
                                            <input type="hidden" name="company_logo" id="company_logo" value="">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="step_filled" value="4">
                                            <section class="finalize-sec ">
                                                <div class="container">
                                                    <div class="finalize-title">
                                                        <h4>Finalize Your <span>Job Listing</span></h4>
                                                        <p>
                                                            Nice work! This is your job ad preview. Now all you need to do is review for accuracy, add your logo and videos if you'd like. If you want to make any changes, just click the edit
                                                            icons on the right of each entry.
                                                        </p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="industry-hiring">
                                                                <i class="fa fa-rocket" aria-hidden="true"></i>
                                                                <div class="hiring-para">
                                                                    <h4>HIRING BOOST</h4>
                                                                    <p>Listing a salary increases applications by 20%</p>
                                                                </div>
                                                            </div>

                                                            <div class="wrapper">
                                                                <div class="container">
                                                                    <div class="upload-container">
                                                                        <div class="border-container">
                                                                            <h4>Add Company Logo</h4>
                                                                            <div class="icons fa-4x">
                                                                                <i class="fa fa-file-image-o" data-fa-transform="shrink-3 down-2 left-6 rotate--45"></i>
                                                                            </div>
                                                                            <div class="dropzone" id="myDropzone"></div>
                                                                            <p>Drag and drop files here, or browse your computer.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="finalize-location">
                                                                <h4>Job Title & Location</h4>
                                                                <div class="finalize-edit">
                                                                    <h3 id="job_title_here">Teacher <span>*</span> <i class="fa fa-pencil" aria-hidden="true"></i></h3>
                                                                    <a href="javascript:void(0)" id="email_here">demo@domain.com <span>*</span> <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                                    <a href="javascript:void(0)" id="company_name_here">Newyork, USA <span>Newyork, USA</span> <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="finalize-over">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="finalize-over-head">
                                                                    <h4>Overview <i class="fa fa-pencil" aria-hidden="true"></i></h4>
                                                                    <p>
                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut suscipit ligula. Praesent sapien nibh, rutrum eget leo sed, aliquet faucibus tortor. Praesent vel
                                                                        bibendum ligula donec in nunc nec massa.
                                                                    </p>
                                                                </div>
                                                                <div class="finalize-accord">
                                                                    <button type="button" class="accordion">Responsibilities</button>
                                                                    <div class="panel" id="summary_here">
                                                                        <p>Create a list of the day-to-day tasks and duties of this job.</p>
                                                                    </div>

                                                                    <button type="button" class="accordion">Qualifications</button>
                                                                    <div class="panel" id="skills_here">
                                                                        <p>Describe the required work experience, education or other characteristics of the ideal candidate for your job.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="finalize-detail">
                                                                    <h4>Job Details</h4>
                                                                </div>

                                                                <div class="industry-hiring">
                                                                    <i class="fa fa-rocket" aria-hidden="true"></i>
                                                                    <div class="hiring-para">
                                                                        <h4>HIRING BOOST</h4>
                                                                        <p>Listing a salary increases applications by 20%</p>
                                                                    </div>
                                                                </div>
                                                                <div class="finalize-accord">
                                                                    <button type="button" class="accordion">Salary</button>
                                                                    <div class="panel">
                                                                        <p id="salary_here">Add a Salary</p>
                                                                    </div>

                                                                    <button type="button" class="accordion">Job Type</button>
                                                                    <div class="panel">
                                                                        <p id="employment_type_here">Full Time</p>
                                                                    </div>

                                                                    <button type="button" class="accordion">Additional Compensation</button>
                                                                    <div class="panel">
                                                                        <p id="compensation_here">List any compensation, besides salary, that this job features.</p>
                                                                    </div>

                                                                    <!-- <button type="button" class="accordion">Skills</button>
                                                                    <div class="panel">
                                                                        <p id="_here">Add Skills to help identify qualified candidates</p>
                                                                    </div> -->

                                                                    <!-- <button type="button" class="accordion">Employee Benefits</button>
                                                                    <div class="panel">
                                                                        <p id="_here">List any benefits that your organization offers with this job.</p>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>

                                            <section class="finalize-about">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="finalize-company">
                                                                <div class="finalize-accord">
                                                                    <button type="button" class="accordion">About the company</button>
                                                                    <div class="panel" id="company_description_here">
                                                                        <p>Candidates like to get a sense of your company goals, history & culture.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            
                                                            <div class="industry-button">
                                                                <a href="" class="cancel-industry">cancel</a>

                                                                <a href="javascript:void(0)" class="continue-industry submit-form" id="uploadFile">continue</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection
@section('js')
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script>
    var summary = CKEDITOR.replace( 'summary' );
    summary.on( 'change', function( evt ) {
        $("#summary").text( evt.editor.getData())    
    });

    var skills = CKEDITOR.replace( 'skills' );
    skills.on( 'change', function( evt ) {
        $("#skills").text( evt.editor.getData())    
    });
    var company_description = CKEDITOR.replace( 'company_description' );
    company_description.on( 'change', function( evt ) {
        $("#company_description").text( evt.editor.getData())    
    });
    
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

    Dropzone.options.myDropzone= {
    url: '{{route("companylogo_submit")}}',
    autoProcessQueue: false,
    uploadMultiple: false,
    parallelUploads: 1,
    maxFiles: 1,
    maxFilesize: 1,
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    params: {
            _token: token
        },
    init: function() {

            var submitButton = document.querySelector("#uploadFile")
            myDropzone = this;
            submitButton.addEventListener("click", function() {
                myDropzone.processQueue(); 
            });
            this.on("addedfile", function(file) {

            }),
            this.on("success", function(file, response) {
                //console.log(file);
                //console.log(response);
                $("#company_logo").val(response)
                $(".action-button").trigger("click")
                toastr.success("Job has been successfully posted");
                window.location.href = "{{route('welcome')}}"
            })
        }
    }
      

    $(".action-button").click(function(){
        var like = $(this).closest(".steper-form");
        var formData = jQuery(like).serialize();
        console.log(formData);
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
                    $(".job_id").val("");
                    $(".job_id").val(response.job_id);
                    console.log(response)
                    if (response.checker == 3) {
                        $("#job_title_here").text(response.title);
                        $("#email_here").text(response.email);
                        $("#company_name_here").text(response.company_name);
                        $("#salary_here").text(response.salary);
                        $("#summary_here").html(response.summary);
                        $("#skills_here").html(response.skills);
                        $("#company_description_here").html(response.company_description);
                        $("#employment_type_here").text(response.employment_type);
                        $("#compensation_here").text(response.compensation);
                    }
                }
                return false;
              }
          });
    })

    $(".step-form").click(function(){   
    $(".step-form").removeClass("active")
    $(this).addClass("active")
    var id = $(this).data("form");
        $(".steper-form").each(function(i,e){
            if($(e).data("step") == id){
                $(".steper-form").removeClass("active")
                $(e).addClass("active")
            }
        })
    })

</script>
@endsection