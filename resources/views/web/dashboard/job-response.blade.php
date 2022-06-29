@extends('web.layouts.main') @section('content')
<section class="inner-banner">
    <img src="{{asset('web/images/inner-banner.jpg')}}" />
    <div class="inner-cap">
        <h4>Job  <span>Response</span></h4>
    </div>
</section>

<section class="open-close-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h3>Job :  {{$job->job_title}} </h3> <p>{{$job->role_location}} </p>
                <p>Starting from {{!is_null($job->currency)?$job->currency:'USD'}} <b> {{$job->starting_salary}}</b> - {{!is_null($job->currency)?$job->currency:'USD'}} <b>{{$job->ending_salary}}  / {{$job->period}}</b></p>
                <p><a href="{{route('job_details' , Crypt::encrypt($job->id))}}">View Job</a> </p>
            </div>
        </div>
    </div>
</section>
  
<section class="search-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="search-bar">
                    <div class="job-titles">
                        <input type="text" placeholder="Search ..." id="myInput" />
                        <button type=""><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>

        </div>
    </div>
</section>
<section class="expire-jobs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               
                <div class="job-table">
                     <h4>Job Seeker Response</h4>
                    <table>
                        <thead>
                            <tr>
                                <!-- <th><input type="checkbox" name=""></th> -->
                                
                                <th>Company</th>
                                <th>Title</th>
                                <th>Job Type</th>
                                <th>Job Schedule</th>
                                <!--<th>Applied Date</th>-->
                                <th>Status</th>

                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody id="jobs">
                            @foreach($job_inquiry as $job)
                            <tr>
                                <!-- <td class="job-check"><input type="checkbox" name="bluk_status" value="{{$job->id}}"> </td> -->
                                <td>
                                    <h4>{{$job->first_name}} {{$job->last_name}}</h4>
                                    <p>{{$job->email}}</p>
                                    <!-- Location -->
                                    <p>{{$job->city}}<br>Created: {{date("d M y" ,strtotime($job->created_at))}} </p>
                                </td>
                                <td class="job-view"><a href="tel:{{$job->phonenumber}}">{{$job->phonenumber}}</a></td>
                                <td class="job-star"></td>
                                <td class="job-location"><a href="{{asset('/uploads/resume/'.$job->resume_upload)}}" target="_blank">View resume</a></td>
                                <td>
         <form action="{{route('get_download')}}" method="POST" >
          @csrf
      <input type="hidden" name="files" value="{{$final_resume}}">
        <button  class="btn-primary">Download</button>
      </form>
                                  </td>  
                           
                                
                                <td>
                                    <div class="dropdown open-job">
                                        <strong class="job_status" data-status="{{$job->status}}" >Job Status</strong>
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if ($job->status=="Pending") @php $color='orng';@endphp @elseif ($job->status=="Interested") @php $color='green';@endphp @else @php $color='red';@endphp @endif
                                            <span class="{{$color}}"></span> {{$job->status}}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item status_dropdown" data-id="Interested" data-job_id="{{Crypt::encrypt($job->id)}}" data-user_id="{{Auth::user()->id}}" href="javascript:void(0);">
                                                <span class="green"></span>Interested
                                            </a>
                                            <a class="dropdown-item status_dropdown" data-job_id="{{Crypt::encrypt($job->id)}}" data-user_id="{{Auth::user()->id}}" data-id="Reject" href="javascript:void(0);">
                                                <span class="red"></span>Reject
                                            </a>
                                            
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection 
@section('css')
<style>
    .posting-date {
        width: 100%;
        padding-left: 10px;
    }
    .dropdown-content.myDropdown.current {
        display: block !important;
    }
    .prof-box a {
        padding: 8px 20px !important;
    }
    .navbar-dark .lst-log {
        border-top: 1px solid #00000040 !important;
        margin-top: 10px;
        padding-top: 13px ​ !important;
    }
</style>
@endsection 
@section('js')
<script>
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#jobs tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });


</script>
@endsection
