@extends('web.layouts.main') @section('content')
<div id="demo" class="carousel slide" data-ride="carousel">
    <!-- The slideshow -->
    <div class="carousel-inner">
        <form action="{{route('search_detail')}}" method="GET">
            <div class="carousel-item active">
                <img src="{{asset('web/images/banner-home.jpg')}}" alt="" width="1100" />
                <div class="bnr-heading">
                    <?php echo (html_entity_decode(Helper::editck('h1', '', 'Get the <span>right job</span></h1>
                    <h1>you deserve' ,'h1Get the <span>right job</span></h1>
                    <h1>you deserve'.__LINE__)));?>
                    <?php echo (html_entity_decode(Helper::editck('p', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' ,'pLorem ipsum dolor sit amet, consectetur adipiscing elit.'.__LINE__)));?>
                    <div class="banner-form">
                        <label class="banner-job">
                            <input type="text" list="browsers" id="search-job" autofocus name="searching" placeholder="Job title or keyword" required="" />
                            <datalist id="browsers">
                                @foreach($data as $key)
                                <option value="{{$key}}">
                                    @endforeach
                                </option>
                            </datalist>
                        </label>
                        <label class="banner-york">
                            <input type="text" list="states" id="search-job" autofocus name="state" placeholder="New York, USA" required="" />
                            <datalist id="states">
                                @foreach($states as $state)
                                <option value="{{$state->name}}">
                                    @endforeach
                                </option>
                            </datalist>
                        </label>
                        <button type="submit">search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Slider End -->
<section class="simple-steps">
    <div class="container">
        <div class="title-heading">
            <?php echo (html_entity_decode(Helper::editck('h2', '', '<span>3 simple</span> Steps' ,'h2<span>3 simple</span> Step'.__LINE__)));?>
            <!-- <h2><span>3 simple</span> Steps</h2> -->
        </div>
        <div class="3 simple Steps">
            <div class="row">
                <div class="col-md-4">
                    <div class="simple-images">
                        <img src="{{asset('web/images/resume.png')}}" alt="" />
                        <div class="step-txt1">
                            <?php echo (html_entity_decode(Helper::editck('h3', '', '1. upload resume' ,'h31. upload resume'.__LINE__)));?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="simple-images">
                        <img src="{{asset('web/images/interview.png')}}" alt="" />
                        <div class="step-txt2">
                            <?php echo (html_entity_decode(Helper::editck('h3', '', '2. Be interviewed' ,'h32. Be interviewed'.__LINE__)));?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="simple-images">
                        <div class="simp-img3">
                            <img src="{{asset('web/images/get-hired.png')}}" alt="" />
                            <div class="step-txt">
                                <?php echo (html_entity_decode(Helper::editck('h3', '', '3. Get Hired' ,'h33. Get Hired'.__LINE__)));?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="feature-sec">
    <div class="container">
        <div class="title-heading">
            <?php echo (html_entity_decode(Helper::editck('h2', '', '<span>Featured</span> Jobs' ,'h2<span>Featured</span> Jobs'.__LINE__)));?>
        </div>
        <div class="private-schools">
            <div class="row">
                @if(!$jobs->isEmpty())
                <?php
// dd($jobs);
?>
                @foreach($jobs as $job)
                <div class="col-md-6 col-xl-4">
                    <div class="feature-details">
                        <div class="school-title">
                            <div class="scool-logo">
                                <?php
                                   if(isset($job->company_logo) && $job->company_logo != ''){ $company_logo = asset("/uploads/company_logo/".$job->company_logo); } else { $company_logo = asset('web/images/no-img.png'); }?>
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
                @endforeach @endif
            </div>
            <div class="find-job">
                <a href="{{route('search_detail')}}">Find more jobs</a>
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
                    <?php echo (html_entity_decode(Helper::editck('h2', '', 'Get matched the most Valuable jobs, Just Drop Your Resume' ,'h2Get matched the most Valuable jobs, Just Drop Your Resume'.__LINE__)));?>
                    <?php echo (html_entity_decode(Helper::editck('p', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.' ,'pLoremipsumdolorsitamet,consecteturadipis'.__LINE__)));?>
                </div>
                <div class="upload-btn">
                    <a href="{{route('upload_resume')}}">
                        <!-- <i class="fas fa-file-upload"></i> -->
                        <i class="fa fa-file" aria-hidden="true"></i>Upload your Resume
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection @section('css')
<style type="text/css">
    .modal-backdrop {
    position: static;

}
</style>
@endsection @section('js') @endsection
