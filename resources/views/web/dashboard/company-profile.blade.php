@extends('web.layouts.main') 

@section('content')

   

<form method="POST" action="{{route('company_create_save')}}">

@csrf

<input type="hidden" name="job_id" value="{{$job->id}}">

<section class="basic-info">

    <div class="container">

        <div class="row">

            <div class="col-md-8">

                <div class="heading-edit-job">

                    <div class="row">

                        <div class="col-md-6">

                            <div class="hding-job">

                                <h4>Company information</h4>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="hding-job-img">

                                <img src="{{asset('web/images/basicinfo-img.png')}}" />

                            </div>

                        </div>

                    </div>

                </div>

                <div class="maininfo-sec">

                    <div class="mainn">

                        <div class="country">

                            <p>Your name <span class="asterik">*</span></p>

                        </div>

                        <div class="country-opt">

                            <input type="text" name="full_name" value="{{Auth::user()->name}}" required="" class="form-control">

                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                        </div>

                    </div>

                    <div class="mainn">

                        <div class="language">

                            <p>Your company name <span class="asterik">*</span></p>

                        </div>

                        <div class="country-opt">

                            <input type="text" name="company_name" id="company_name" readonly="" value="{{$job->company_name}}" required="" class="form-control">

                            <input type="hidden" name="slug" value="{{Str::slug($job->company_name, '_')}}">

                        </div>

                    </div>

                    <div class="mainn">

                        <div class="language">

                            <p>Phone number <span class="asterik">*</span></p>

                        </div>

                        <div class="country-opt">

                            <input type="text" name="contact_number" id="contact_number" required="" class="form-control">

                        </div>

                    </div>



                    <div class="mainn">

                        <div class="language">

                            <p>Company size<span class="asterik">*</span></p>

                        </div>

                        <div class="country-opt">

                            <select class="form-control" id="exampleFormControlSelect1" name="emp_size" required="">

                                <option value="Not Define">Select an option</option>

                                <option value="1-49">1 - 49</option>

                                <option value="50-149">50 - 149</option>

                                <option value="150-249">150 - 249</option>

                                <option value="250-499">250 - 499</option>

                                <option value="500-749">500 - 749</option>

                                <option value="750-999">750 - 999</option>

                                <option value="1000+">1000 +</option>

                            </select>

                        </div>

                    </div>

                    

                    <div class="mainn">

                        <div class="language">

                            <p>How did you hear about us?<span class="asterik">*</span></p>

                        </div>

                        <div class="country-opt">

                            <select class="form-control" id="exampleFormControlSelect1" name="hear_about" required="">

                                <option value="Not Define">Select an option</option>

                                <option value="Search-Engine">Search Engine (ex. Google, Bing, Yahoo) </option>

                                <option value="Billboard">Billboard </option>

                                <option value="Radio">Radio (AM/FM/XM) </option>

                                <option value="Word-of-Mouth">Word of Mouth </option>

                                <option value="Newspaper">Newspaper </option>

                                <option value="Magazine">Online Video </option>

                                <option value="Tv">TV </option>

                                <option value="Podcast">Podcast </option>

                                <option value="Streaming-Audio">Streaming Audio (Spotify, Pandora, etc.) </option>

                                <option value="Mail">In the Mail </option>

                                <option value="Social-Media">Social Media </option>

                                <option value="Other">Other </option>

                            </select>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="about-job">

                    <h5>Describe your company details</h5>

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

                                <a href="{{route('step2_form' ,[Crypt::encrypt($job->id)])}}" class="back">Back</a>

                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="user-btnn">

                                <a href="javascript:void(0)" class="back" id="save" onclick="document.getElementById('submit-form').click();">Save</a>

                                <input type="submit" hidden="" id="submit-form">

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

            </div>

        </div>

    </div>

</section>

</form>



 @endsection 

@section('css')



@endsection 

@section('js')

 <script>

    $("#company_name").focusout(function(){

      var type = "duplicate";

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

        data: {type:type , value:value},

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

</script>

@endsection

