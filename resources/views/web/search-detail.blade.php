@extends('web.layouts.main') 

@section('content')


<section class="inner-banner">

    <img src="{{asset('web/images/bnr-bg.jpg')}}" />



    <div class="inner-cap">

        <h4>Search <span> Jobs</span></h4>

    </div>

</section>

<section class="feature-sec">

   <div class="container">

     {{-- <div class="title-heading">

         <h2><span>Featured</span> Jobs</h2>

      </div> --}}

       <form action="{{route('search_detail')}}" method="GET">

       <div class="banner-form" style="margin: 0 auto;">

                            <label class="banner-job">

                                <input type="text" list="browsers" id="search-job" autofocus  name="searching" placeholder="Job title or keyword" required="" value="{{(isset($_GET) && isset($_GET['searching']) ?$_GET['searching']:'' )}}" />

                                <datalist id="browsers">

                                    @foreach($data as $key)

                                        <option value="{{$key}}">

                                    @endforeach

                                </datalist>

                            </label>

                            <label class="banner-york">

                                <input type="text" list="states" id="search-job" autofocus  name="state" placeholder="New York, USA" required="" value="{{(isset($_GET) && isset($_GET['state']) ?$_GET['state']:'' )}}"/>

                                <datalist id="states">

                                    @foreach($states as $state)

                                        <option value="{{$state->name}}">

                                    @endforeach

                                </datalist>

                            </label>

                            <button type="submit">search</button>

                        </div>

                    </form>

                    <br>

                    <br>



      <div class="private-schools">

         <div class="row">

            @if(!$jobs->isEmpty())
            @foreach($jobs as $job)

            <div class="col-md-4">

               <div class="feature-details">

                  <div class="school-title">

                     <div class="scool-logo">

                        <?php

                           if(isset($job->company_logo) && $job->company_logo != ''){

                                $company_logo = asset("/uploads/company_logo/".$job->company_logo);

                            }

                            else

                            {

                                $company_logo = asset('web/images/no-img.png');

                            }?>          

                        <img src="{{$company_logo}}" alt="" />

                     </div>

                     <div class="schl-head">

                        <h3>{{$job->company_name}}</h3>

                        <p>{{$job->role_location}}</p>

                     </div>

                  </div>

                  <div class="dummy-txt">

                     <h2>{{$job->job_title}}</h2>

                     <h4>{{$job->employment_type}}</h4>

                     {!! Str::limit($job->job_description, 90) !!}

                  </div>

                  <div class="price-area">

                     <div class="price">

                        <h3>${{$job->starting_salary}}<span>/{{$job->period}}</span></h3>

                     </div>

                     <div class="apply">

                        <a href="{{route('job_details' ,Crypt::encrypt($job->id))}}">Apply now</a>

                     </div>

                  </div>

               </div>

            </div>

            @endforeach
            @else
            <h2>No Jobs Found</h2>
            @endif

         </div>

      </div>

   </div>

</section>

<section class="get-matched">

   <div class="container">

      <div class="row">

         <div class="col-md-3"></div>

         <div class="col-md-9">

            <div class="get-title">

               <h2>Get matched the most Valuable jobs, Just Drop Your Resume</h2>

               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>

            </div>

            <div class="upload-btn">

               <a href="{{route('upload_resume')}}">

                  <!-- <i class="fas fa-file-upload"></i> -->

                  <i class="fa fa-file" aria-hidden="true"></i>Upload your CV

               </a>

            </div>

         </div>

      </div>

   </div>

</section>

@endsection

@section('css')

<style type="text/css"></style>

@endsection

@section('js')



<script type="text/javascript">

 $(document).ready(function () {

        $("#myInput").on("keyup", function () {

            var value = $(this).val().toLowerCase();

            $("#jobs tr").filter(function () {

                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);

            });

        });

        

        $("#myLocation").on("keyup", function () {

            var value = $(this).val().toLowerCase();

            $("#jobs tr").filter(function () {

                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);

            });

        });

    });

 </script>

@endsection