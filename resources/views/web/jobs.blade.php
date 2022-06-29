@extends('web.layouts.main') 
@section('content')
<section class="inner-banner">
    <img src="{{asset('web/images/inner-banner.jpg')}}" />
    <div class="inner-cap">
        <h4>manage <span>Jobs</span></h4>
    </div>

</section>
<form method="post" action="{{route('bulk_open')}}" id="bulk-open-id">
{{ csrf_field() }}
<input type="hidden" name="user_id" id="user_id" value="{{$user = Auth::user()->id}}">
</form>

<section class="open-close-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="btn-blue tablinks active" onclick="openCity(event, 'London')" href="javascript:void(0);">Open And Paused Jobs ({{$open_paused_jobs}})</a>
                <a class="btn-white tablinks" onclick="openCity(event, 'Paris')" href="javascript:void(0);">Closed Jobs({{$closed_jobs}})</a>
               
            </div>
        </div>
    </div>
</section>

<div id="London" class="tabcontent" style="display:block;"> 
<section class="search-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="search-bar">
                    <div class="job-titles">
                        <input type="text" placeholder="Search ..." id="myInput" />
                        <button type=""><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                    <div class="job-titles">
                        <input type="text" placeholder="Search locations ..." id="myLocation" />
                        <button type=""><i class="fa fa-map-marker" aria-hidden="true"></i></button>
                    </div>
                    <!--  <input type="" name="" placeholder="Search Locations"> -->
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-3">
                <div class="posting-blk">
                    {{--
                    <div class="posting-date">
                        <span>Action:</span>
                        <select>
                            <option>Bulk Actions</option>
                            <option>Bulk Actions</option>
                            <option>Bulk Actions</option>
                        </select>
                    </div>
                    --}}                  
                    <div class="posting-date pull-right">
                        <!-- <span>Action:</span> -->
                        <span style="margin-bottom: 3px;font-weight: bold;">Filter by</span>
                        <select class="bulk-open-class" id="sort_by">                           
                            <option >Bulk Actions</option>
                            <option value="Open" data-id="1">Status Open</option>
                            <option value="Pending" data-id="2">Status Pending</option>
                            <option value="Closed" data-id="0">Status Closed</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="expire-jobs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="job-table table-responsive">
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
                            @foreach($jobs as $job)
                            @if($job->status != "Closed")
                            <tr>
                                <!-- <td class="job-check"><input type="checkbox" name="bluk_status" value="{{$job->id}}"> </td> -->
                                <td>
                                    <h4>{{$job->company_name}}</h4>
                                    <p>{{$job->user->email}}</p>
                                    <!-- Location -->
                                    <p>New York, NY<br>Created: {{date("d M y" ,strtotime($job->created_at))}} </p>
                                </td>
                                <td class="job-view">{{$job->job_title}}</td>
                                <td class="job-star">{{$job->employment_type}}</td>
                                <td class="job-location">{{$job->job_schedule}}</td>
                                <!--<td class="job-view"><i class="fa fa-calendar" aria-hidden="true"></i> {{date("d M y" ,strtotime($job->created_at))}}</td>-->
                                {{--
                                <td><span class="job-approve">{{$job->status}}</span></td>
                                --}}
                                <td>
                                    <div class="dropdown open-job">
                                        <strong class="job_status" data-status="{{$job->status}}" >Job Status</strong>
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if ($job->status=="Open") @php $color='green';@endphp @elseif ($job->status=="Paused") @php $color='orng';@endphp @else @php $color='red';@endphp @endif
                                            <span class="{{$color}}"></span> {{$job->status}}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item status_dropdown" data-id="Open" data-job_id="{{Crypt::encrypt($job->id)}}" data-user_id="{{Auth::user()->id}}" href="javascript:void(0);">
                                                <span class="green"></span>Open
                                            </a>
                                            <a class="dropdown-item status_dropdown" data-job_id="{{Crypt::encrypt($job->id)}}" data-user_id="{{Auth::user()->id}}" data-id="Paused" href="javascript:void(0);">
                                                <span class="orng"></span>Paused
                                            </a>
                                            <a class="dropdown-item status_dropdown" data-id="Closed" data-job_id="{{Crypt::encrypt($job->id)}}" data-user_id="{{Auth::user()->id}}" href="javascript:void(0);">
                                                <span class="red"></span>Closed
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <ul>
                                        <!-- <li><a href="" class="job-refresh"><i class="fa fa-refresh" aria-hidden="true"></i></a></li> -->
                                        <li class="dropdown">
                                            <button class="job-clone dropbtn"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                            <div class="dropdown-content myDropdown" style="display: none;">
                                                <a href="{{route('job_edit' ,Crypt::encrypt($job->id))}}?action=view">Edit Job</a>
                                                <a href="{{route('job_edit' ,Crypt::encrypt($job->id))}}?action=manage">Manage budget</a>
                                                <!--<a href="#myModal4" data-target="#myModal4" data-toggle="modal">Post job in multiple locations</a>-->
                                                <!--<a href="#contact">See performace report</a>-->
                                                <a href="{{route('job_edit' ,Crypt::encrypt($job->id))}}?action=view">View job details</a>

                                                <a href="{{route('job_response' ,Crypt::encrypt($job->id))}}?action=view">View response</a>
                                            </div>
                                        </li>
                                        <!-- <li><a href="{{route('job_edit' ,Crypt::encrypt($job->id))}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></li> -->
                                        <!-- <li><a href=""><i class="fa fa-trash" aria-hidden="true"></i></a></li> -->
                                    </ul>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{--
    <div class="justify-content-center">
        {!! $jobs->links() !!}
    </div>
    --}}
</section>
</div>

<div id="Paris" class="tabcontent">
 <section class="search-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="search-bar">
                    <div class="job-titles">
                        <input type="text" placeholder="Search ..." id="myInput" />
                        <button type=""><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                    <div class="job-titles">
                        <input type="text" placeholder="Search locations ..." id="myLocation" />
                        <button type=""><i class="fa fa-map-marker" aria-hidden="true"></i></button>
                    </div>
                    <!--  <input type="" name="" placeholder="Search Locations"> -->
                </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-3">
                <div class="posting-blk">
                    {{--
                    <div class="posting-date">
                        <span>Action:</span>
                        <select>
                            <option>Bulk Actions</option>
                            <option>Bulk Actions</option>
                            <option>Bulk Actions</option>
                        </select>
                    </div>
                    --}}                  
                    <div class="posting-date pull-right">
                        <!-- <span>Action:</span> -->
                        <span style="margin-bottom: 3px;font-weight: bold;">Filter by</span>
                        <select class="bulk-open-class" id="sort_by">                           
                            <option >Bulk Actions</option>
                            <option value="Open" data-id="1">Status Open</option>
                            <option value="Pending" data-id="2">Status Pending</option>
                            <option value="Closed" data-id="0">Status Closed</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="expire-jobs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <div class="job-table table-responsive">
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
                            @foreach($jobs as $job)
                            @if($job->status == "Closed")
                            <tr>
                                <!-- <td class="job-check"><input type="checkbox" name="bluk_status" value="{{$job->id}}"> </td> -->
                                <td>
                                    <h4>{{$job->company_name}}</h4>
                                    <p>{{$job->user->email}}</p>
                                    <!-- Location -->
                                    <p>New York, NY<br>Created: {{date("d M y" ,strtotime($job->created_at))}} </p>
                                </td>
                                <td class="job-view">{{$job->job_title}}</td>
                                <td class="job-star">{{$job->employment_type}}</td>
                                <td class="job-location">{{$job->job_schedule}}</td>
                                <!--<td class="job-view"><i class="fa fa-calendar" aria-hidden="true"></i> {{date("d M y" ,strtotime($job->created_at))}}</td>-->
                                {{--
                                <td><span class="job-approve">{{$job->status}}</span></td>
                                --}}
                                <td>
                                    <div class="dropdown open-job">
                                        <strong class="job_status" data-status="{{$job->status}}" >Job Status</strong>
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if ($job->status=="Open") @php $color='green';@endphp @elseif ($job->status=="Paused") @php $color='orng';@endphp @else @php $color='red';@endphp @endif
                                            <span class="{{$color}}"></span> {{$job->status}}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item status_dropdown" data-id="Open" data-job_id="{{Crypt::encrypt($job->id)}}" data-user_id="{{Auth::user()->id}}" href="javascript:void(0);">
                                                <span class="green"></span>Open
                                            </a>
                                            <a class="dropdown-item status_dropdown" data-job_id="{{Crypt::encrypt($job->id)}}" data-user_id="{{Auth::user()->id}}" data-id="Paused" href="javascript:void(0);">
                                                <span class="orng"></span>Paused
                                            </a>
                                            <a class="dropdown-item status_dropdown" data-id="Closed" data-job_id="{{Crypt::encrypt($job->id)}}" data-user_id="{{Auth::user()->id}}" href="javascript:void(0);">
                                                <span class="red"></span>Closed
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <ul>
                                        <!-- <li><a href="" class="job-refresh"><i class="fa fa-refresh" aria-hidden="true"></i></a></li> -->
                                        <li class="dropdown">
                                            <button class="job-clone dropbtn"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                            <div class="dropdown-content myDropdown" style="display: none;">
                                                <a href="{{route('job_edit' ,Crypt::encrypt($job->id))}}?action=view">Edit Job</a>
                                                <a href="{{route('job_edit' ,Crypt::encrypt($job->id))}}?action=manage">Manage budget</a>
                                                <!--<a href="#myModal4" data-target="#myModal4" data-toggle="modal">Post job in multiple locations</a>-->
                                                <!--<a href="#contact">See performace report</a>-->
                                                <a href="{{route('job_edit' ,Crypt::encrypt($job->id))}}?action=view">View job details</a>

                                                <a href="{{route('job_response' ,Crypt::encrypt($job->id))}}?action=view">View response</a>
                                            </div>
                                        </li>
                                        <!-- <li><a href="{{route('job_edit' ,Crypt::encrypt($job->id))}}"><i class="fa fa-pencil" aria-hidden="true"></i></a></li> -->
                                        <!-- <li><a href=""><i class="fa fa-trash" aria-hidden="true"></i></a></li> -->
                                    </ul>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{--
    <div class="justify-content-center">
        {!! $jobs->links() !!}
    </div>
    --}}
</section>   
</div>    


 @endsection @section('css')
<style>
.open-close-sec .tablinks.active {
    background-color: #018cb3;
    border: 1px solid #018cb3;
    color: #fff !important;
}
.open-close-sec .tablinks {
    background-color: #fff;
    border: 1px solid #00000061;
    color: #00637e !important;
    display: inline-block;
}
.tabcontent {
  display: none;
}
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
@endsection @section('js')

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

<script>

    $("#sort_by").change(function(){
        var data = $(this).find(":selected").val();
        $(".job_status").each(function(i,e){
            if($(e).data("status") == data){
                $(e).closest("tr").show()
            }else{
                $(e).closest("tr").hide()
            }
        })
    })
    $(document).ready(function () {
        $(".status_dropdown").click(function (event) {
            event.preventDefault();
            let status = $(this).data("id");
            let job_id = $(this).data("job_id");
            let user_id = $(this).data("user_id");
            let _token = $('meta[name="csrf-token"]').attr("content");
            $.ajax({
                url: "{{route('job_create_save')}}",
                type: "POST",
                dataType : "json",
                data: {
                    status: status,
                    job_id: job_id,
                    user_id: user_id,
                    step_filled: "7",
                    _token: _token,
                },
                success: function (response) {
                    if (response.status == 1) {
                   toastr.success(response.message);
                    setTimeout(function(){ 
                        window.location.href = response.location;
                    }, 2000);



                    }
                    return false;
                },
                error: function (error) {
                     toastr.error(response.message);
                    setTimeout(function(){ 
                        window.location.href = response.location;
                    }, 2000);
                },
            });
        });
    });
$('.bulk-open-class').on('change', function() {
     var status_id = $(this).find(':selected').attr('data-id');
$("input:checkbox[name='bluk_status']:checked").each(function(){    
bluk_status.push($(this).val());
// alert(alert("bluk status: " + bluk_status.join(", "));
     });
     if (status_id==1) {
     // $('#bulk-open-id').submit();
     }
    });

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
    $(".job-clone").click(function () {
        if ($(this).closest(".dropdown").find(".myDropdown").hasClass("current")) {
            $(this).closest(".dropdown").find(".myDropdown").removeClass("current");
            $(".myDropdown").removeClass("current");
            $(".job-clone").removeClass("current");
        } else {
            $(this).closest(".dropdown").find(".myDropdown").addClass("current");
            $(this).addClass("current");
        }
    });
</script>
@endsection
