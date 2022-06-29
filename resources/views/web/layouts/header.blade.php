       <!-- Header Start -->

        <header>

            <!-- Begin: Bottom Row -->

            <div class="bottom-row">

                <div class="container">

                    <nav class="navbar navbar-expand-md navbar-light">

                        <a href="{{url('/')}}" class="navbar-brand"><img src="{{asset('web/images/logo.jpg')}}" alt="" /></a>

                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">

                            <span class="navbar-toggler-icon"></span>

                        </button>



                        <div class="collapse navbar-collapse" id="navbarCollapse">

                            <div class="navbar-nav">

                                <a href="{{url('/')}}?search=job" class="nav-item nav-link active find-job-search">Find Jobs</a>

                                

                                <a href="{{route('career')}}" class="nav-item nav-link">Career advice</a>
                                <a href="{{route('popular_companies')}}" class="nav-item nav-link">Company Reviews</a>

                                

                                <a href="{{route('upload_resume')}}" class="nav-item nav-link">upload resume</a>

                                

                                @auth

                                <a href="{{route('step1_form')}}" class="nav-item nav-link reg-btn">post a job</a> {{--hdr-btn--}}

                                <nav class=" ">{{--navbar-dark navbar-expand-sm--}}



 {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

    <span class="navbar-toggler-icon"></span>

  </button> --}}

  <div class="inner-divbar" id="navbar-list-4"> {{--collapse navbar-collapse--}}

    <ul class="navbar-nav">

        <li class="nav-item dropdown">

        <a class="prof-drop nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

          <img src="{{asset('web/images/profile.png')}}" width="40" height="40" class="rounded-circle">

          
    <?php
        $name = Auth::user()->name;
        if(strlen($name) > 10){
            $name = substr($name, 0, 7) . '..';    
        }
        echo $name;
    ?>

        </a>

        <div class="dropdown-menu prof-box" aria-labelledby="navbarDropdownMenuLink">

          
                                                    <div class="email-id">{{Auth::user()->email}}</div>
                                                    <a class="dropdown-item" href="{{route('step1_form')}}"><i class="fa fa-pencil-square" aria-hidden="true"></i>
 post a job</a>

                                                

                                                

                                                    <a class="dropdown-item" href="{{route('job_display')}}"><i class="fa fa-file-text" aria-hidden="true"></i> manage jobs</a>

                                                

                                                

                                                    <a class="dropdown-item" href="{{route('manage_resume')}}"><i class="fa fa-address-card" aria-hidden="true"></i> manage resume</a>
                                                    <a class="dropdown-item" href="{{route('company_reviews')}}"><i class="fa fa-star" aria-hidden="true"></i> Company Reviews</a>

                                                

                                                
                                                    {{--
                                                    <a class="dropdown-item" href="#resume-alert"><i class="fa fa-bell" aria-hidden="true"></i> resume alerts</a>
                                                    --}}
                                                

                                                

                                                    <a class="dropdown-item lst-log" href="{{ route('logout') }}" onclick="event.preventDefault();

                                                     document.getElementById('logout-form').submit();"><!--<i class="fa fa-sign-in" aria-hidden="true"></i>--> sign out</a>

                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                                        @csrf

                                                        </form>

                                                





        </div>

      </li>   

    </ul>

  </div>

</nav>

@endauth



@guest

                                    
<div class="dropdown login-drop">
  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <i class="fa fa-lock" aria-hidden="true"></i> Login
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{route('signup_login')}}?with=employee"><i class="fa fa-user" aria-hidden="true"></i> Employee Login</a>
    <a class="dropdown-item" href="{{route('signup_login')}}?with=employer"><i class="fa fa-users" aria-hidden="true"></i> Employer Login</a>
  </div>
</div>
                                    {{--<a href="{{route('signup_login')}}" class="nav-item nav-link login-btn"><i class="fa fa-lock" aria-hidden="true"></i> login</a> --}}

                                    <a href="{{route('signup')}}" class="nav-item nav-link reg-btn">register now</a>



@endguest



                                <!-- <div class="login-side">

                                    @auth

                                    <div class="manage-drop-down">

                                        <span>

                                            <i class="fa fa-user" aria-hidden="true"></i>

                                            <ul class="header-small-menu">

                                                <li>

                                                    <a href="{{route('step1_form')}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> post a job</a>

                                                </li>

                                                <li>

                                                    <a href="{{route('job_display')}}"><i class="fa fa-file-text-o" aria-hidden="true"></i> manage jobs</a>

                                                </li>

                                                <li>

                                                    <a href="#manage-applications"><i class="fa fa-newspaper-o" aria-hidden="true"></i> manage applications</a>

                                                </li>

                                                <li>

                                                    <a href="#resume-alert"><i class="fa fa-bell-o" aria-hidden="true"></i> resume alerts</a>

                                                </li>

                                                <li>

                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();

                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-in" aria-hidden="true"></i> sign out</a>

                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                                        @csrf

                                                        </form>

                                                </li>

                                            </ul>

                                        </span>

                                    </div>

                                    @endauth 



                                    @if(!Auth::check())

                                    <a href="{{route('signup_login')}}" class="nav-item nav-link login-btn"><i class="fa fa-lock" aria-hidden="true"></i>login</a>

                                    <a href="{{route('signup')}}" class="nav-item nav-link reg-btn">register now</a>

                                    @endif

                                    

                                </div> -->

                            </div>

                        </div>

                    </nav>

                </div>

            </div>

            <!-- END: Bottom Row -->

        </header>