@extends('web.layouts.main') 

@section('content')

    <section class="inner-banner">

      <img src="{{asset('web/images/inner-banner.jpg')}}">



      <div class="inner-cap">

        <h4>JOB <span>DETAILS</span> </h4>

      </div>

    </section>

<div class="app-job-main-col">

  <section class="apply-for-job-sec">

  <div class="container">

    <div class="app-job-det">

      <div class="row">

        <div class="col-md-7">

          <div class="app-job-main-head">

            <h4>{{$job->job_title}}</h4>

            <ul>

              <li>{{$job->company_name}}</li>

              <li>{{$job->employment_type}}</li>

              <li>$ {{$job->starting_salary}}-{{$job->ending_salary}} a {{$job->period}}</li>

            </ul>

            {{--

            <p><img src="{{asset('web/images/sign.png')}}"> Response to 51-74% of applications in the past 30 days,typically with in 8 days</p>

            --}}

          </div>

        </div>

        <div class="col-dm-5">

          <div class="app-job-btns">

            <a href="{{route('apply_job' , Crypt::encrypt($job->id))}}" class="app-now-main-btn">Apply Now</a>

            {{--
        <a href="{{route('view_applied_jobs',Crypt::encrypt($job->id))}}" value="" class="app-now-main-btn">View Applied</a>
              
            



            

            <a href="" class="app-job-fav-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>

            --}}

          </div>

        </div>

      </div>

    </div>

  </div>

</section>



<section class="app-job-des-list-sec">

  <div class="container">

    <div class="app-job-des-list">
        <div class="looking-for">
            <h5>{{$job->company_name}} is looking to hire</h5>
        </div>
      <p> <span>"{{$job->job_title}}"</span> for {{$job->role_location}}.</p>

          {{--

          <p><span>Experience</span>:2-4years of relevant expierience</p>

          <p><span>Gender</span>:Male</p>

            --}}

          <table class="job-det">
              <tbody>
                  <tr>
                      <td>Hiring Process:</td>
                      <td>{{$job->hiring_process_role}}</td>
                  </tr>
                  <tr>
                      <td>Job Type:</td>
                      <td>{{$job->employment_type}}</td>
                  </tr>
                  <tr>
                      <td>Job Schedule:</td>
                      <td>{{$job->job_schedule}}</td>
                  </tr>
                  <tr>
                      <td>Hire:</td>
                      <td>{{$job->hire_open}} {{($job->hire_open==1)?'People':'Peoples'}}</td>
                  </tr>
                  <tr>
                      <td>Need To Hire:</td>
                      <td>{{$job->need_to_hire}}</td>
                  </tr>
                  <tr>
                      <td>Supplemental Pay:</td>
                      <td>{{$job->compensation}}</td>
                  </tr>

                  <tr>
                      <td>Benefits Offered:</td>
                      <td>{{$job->benefits}}</td>
                  </tr>

                  <tr>
                      <td>Job Responsibility:</td>
                      <td><?php echo html_entity_decode($job['job_description'])?></td>
                  </tr>

                  <tr>
                      <td>COVID-19 Precautions:</td>
                      <td>{{$job->covid_19_precautions}}</td>
                  </tr>


              </tbody>
          </table>  

         {{--
          <p><span>Hiring Process: </span>{{$job->hiring_process_role}}</p>

          <p><span>Job Type: </span>{{$job->employment_type}}</p>

          <p><span>Job Schedule: </span>{{$job->job_schedule}}</p>

          <p><span>Hire : </span>{{$job->hire_open}} {{($job->hire_open==1)?'People':'Peoples'}}</p>

          <p><span>Need To Hire: </span>{{$job->need_to_hire}}</p>

          <p><span>Supplemental Pay: </span>{{$job->compensation}}</p>

          <p><span>Benefits Offered: </span>{{$job->benefits}}</p>

          <p><span>Job Responsibility:</span></p>
          
          <div class="job-responsibility">

            

            <ul>

              <li>Work With Software Developer,Network Engineer and support all Teams.</li>

              <li>Monitoring network eqipments and servers </li>

              <li>Assist with the design,implementation,and ongoing support for new software and features.</li>

              <li>Oversee troubleshooting for system errors ,Provide Help Desk support for network issues.</li>

              <li>Provide Technical Support either by phone,remote access or site visit as needed. </li>

              <li>Evaluate and resolve connectivity IT issues,equipments,software,Networking,hardware.</li>

              <li>Set up new Computer with nececessary peripheral devices(Bio metric,routers,printers etc)Installing testing and monitor servers,firewalls,and new solution.</li>

              <li>Perform task data backups servers,website and maintainace on required.</li>

              <li>Assist with servers,LAN/WAN technologies,computer repair/troubleshooting software</li>

              <li>Networks,virus protection,WIFI technology and more.</li>

              <li>Support of more than 50 + LAN users in all aspect of desktop,network users,Maintaining</li>

              <li>Installation/Un-installation,configurations,Fault Diagnosing.Installation and administration of windows 10,8.1,8,7 & XP based networking  using all renowned.</li>

              <li>Biometric Attendence Managment System(BAMS).</li>

              <li>Centrelize online attendence managment system.</li>

            </ul>

            

            <?php //echo html_entity_decode($job['job_description'])?>

             <div class="job-type">

               <p><span>COVID-19 Precautions :</span>{{$job->covid_19_precautions}}</p>

               </div>--}}

          </div>

    </div>

  </div>

</section>

</div>    

@endsection

@section('css')

<style>

    



.dropdown-content.myDropdown.current {

    display: block !important;

}

.prof-box a {

    padding: 8px 20px !important;

}

.navbar-dark .lst-log {

    border-top: 1px solid #00000040 !important;

    margin-top: 10px;

    padding-top: 13px ​!important;

}
.looking-for h5 {
    text-transform: uppercase;
    border-bottom: 1px solid #018cb3;
    display: inline-block;
    padding-bottom: 4px;
    margin-bottom: 15px;
}
.app-job-main-head ul {
    margin: 0 0 4px;
}

</style>

<style type="text/css">

      a.app-now-main-btn {

    border: 1px solid #018cb3;

    background: #018cb3;

    padding: 10px 16px 10px;

    color: #fff;

    border-radius: 7px;

    margin: 0px 10px;

    margin-left: 0;

    display: inline-block;

}

 a.app-now-main-btn:hover{

  background-color: transparent;

  color: #018cb3;

 }

.app-job-det {

    box-shadow: 0 1px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);

    border-radius: 7px;

    padding: 20px;

    margin: 20px 0px;

        background-color: #fff;



}

table.job-det td:first-child {
    font-weight: bold !important;
    width: 210px;
}

.app-job-btns {

}



.app-job-det .row {

    justify-content: space-between;
        align-items: center;

}

a.app-job-fav-icon {

    display: inline-block;

    color: #000;

    padding: 10px;

    background-color: #d6d6d6;

    border-radius: 7px;

    margin-right: 20px;

}
table.job-det {
    border-collapse: separate;
    border-spacing: 0px 20px;
    margin-top: -14px;
}
table.job-det td {
    vertical-align: top;
}

.app-job-main-head h4 {

    font-size: 1.5rem;
    text-transform: uppercase;

}



.app-job-main-head ul li {color: #868686;font-weight: 600;line-height: 22px;text-transform: capitalize;}



.app-job-det p {

    color: #868686;

    font-weight: 600;

    font-size: 14px;

    font-style: italic;

}

.app-job-des-list {

    background-color: #ffffff;

    border-radius: 7px;

    padding: 20px;

}



.app-job-des-list span {

    color: #000;

    font-weight: 600;

}



.app-job-des-list p {

    margin-bottom: 13px;

    word-break: break-word;

}



.app-job-des-list ul li {

    list-style: unset;

    margin-left: 14px;

    margin-bottom: 10px;

}

.app-job-main-col {

    background-color: #e0e7f3;

        padding: 30px 0px;



}

    </style>

@endsection

@section('js')    

@endsection