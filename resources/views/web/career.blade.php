@extends('web.layouts.main')
@section('content')
<section class="inner-banner">
    <img src="{{asset('web/images/bnr-bg.jpg')}}" />
    <div class="inner-cap">
        @if(isset($_GET)&&(isset($_GET['search'])))
        <?php echo (html_entity_decode(Helper::editck('h4', '', 'Search' ,'h4Search'.__LINE__)));?>
        <h4>Search</h4>
        @else
        <?php echo (html_entity_decode(Helper::editck('h4', '', 'career <span>advice</span>' ,'h4career <span>advice</span>'.__LINE__)));?>
        @endif
    </div>
</section>
<section class="career-advice">
    <div class="container">
        <div class="career-heading">
            @if(isset($_GET)&&(isset($_GET['search'])))
            <h2>
                Search: <span><?php echo $_GET["search"];?></span>
            </h2>
            @else
            <?php echo (html_entity_decode(Helper::editck('h2', '', 'The Latest <span>Career Advice</span>' ,'h2The Latest <span>Career Advice</span>'.__LINE__)));?>
            @endif
        </div>
        <div class="row">
            @if(!$blogs->isEmpty()) @foreach($blogs as $blog)
            <div class="col-md-6 col-lg-4 mb-5">
                <a href="{{route('news_detail' ,$blog->slug)}}">
                    <div class="post-sec">
                        <div class="post-img">
                            <img src="{{asset($blog->img)}}" alt="" />
                        </div>
                        <div class="post-title">
                            <p>Post by {{$blog->post_by}} | {{date("d M y" ,strtotime($blog->created_date))}}</p>
                            <h3>{{$blog->name}}</h3>
                            <!-- <a href="#" class="post-btn">Lorem ipsum</a> -->
                        </div>
                    </div>
                </a>
            </div>
            @endforeach @else
            <div class="col-md-12">
                <div class="alert alert-warning" style="margin: 10% 0; text-align: center;">
                    <strong>No Records Found</strong>
                </div>
            </div>
            @endif
        </div>
        <!-- <div class="pagination">
            <a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
            <a href="#">1</a>
            <a class="active" href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        </div> -->
    </div>
</section>
<section class="get-matched">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <div class="get-title">
                    <?php echo (html_entity_decode(Helper::editck('h2', '', 'Get matched the most Valuable jobs, Just Drop Your Resume' ,'h2Get matched the most Valuable jobs, Just Drop Your Resume'.__LINE__)));?>
                    <?php echo (html_entity_decode(Helper::editck('p', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.' ,'pLoremipsumdolorelit,seddoeiusmodtemporincididuntut'.__LINE__)));?>
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
@endsection
@section('js')
@endsection
