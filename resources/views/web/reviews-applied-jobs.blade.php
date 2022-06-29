@extends('web.layouts.main') 

@section('content')

    <section class="inner-banner">

      <img src="{{asset('web/images/inner-banner.jpg')}}">

      <div class="inner-cap">

        <h4>APPLIED <span>DETAILS</span> </h4>

      </div>

    </section>

<div class="app-job-main-col">
<section class="app-job-des-list-sec">

  <div class="container">

    <div class="app-job-des-list">
        <div class="looking-for">
        <h5>All DEtails HERE</h5>
       {{-- <form action="{{route('get_download')}}" method="POST" >
          @csrf
      <input type="hidden" name="files" value="{{$final_resume}}">
        <button  class="btn-primary">Download</button>
      </form>--}}
          </div>
   

                       <table class="job-det">
                                    <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>first_name</th>
                                    <th>last_name</th>
                                    <th>email</th>
                                    <th>phonenumber</th>
                                    <th>city</th>
                                    <th>resume_upload</th>
                                    <th>status</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($applied_jobs as $jobs)
                                      <tr>
                                      <th>{{$jobs->id}}</th>
                                      <th>{{$jobs->first_name}}</th>
                                      <th>{{$jobs->last_name}}</th>
                                       <th>{{$jobs->email}}</th>
                                      <th>{{$jobs->phonenumber}}</th>
                                      <th>{{$jobs->city}}</th>
                                      <th><img class="img-profile rounded-circle"
                                                     style="width: 50px;height: 50px;"
                                                     src="{{asset($jobs->resume_upload)}}"></th>
                                      <th>{{$jobs->status}}</th>
                                      
                                            
                          
                                          
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

        
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