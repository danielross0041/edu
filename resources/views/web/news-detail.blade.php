@extends('web.layouts.main') @section('content')

<section class="inner-banner">

    <img src="{{asset('web/images/bnr-bg.jpg')}}" />

    <div class="inner-cap">
{{--
<h4>news <span>detail</span></h4>
--}}
        <h4>{{$blog_details->name}}</h4>

    </div>

</section>

<section class="article-sec">

    <div class="container">

        <div class="row">

            <div class="col-md-8">

                <div class="article-txt">

                    <div class="article-blk">

                       {{--
                       <img src="{{asset($blog_details->img)}}" alt="" />
                       --}} 

                        <h2>{{$blog_details->name}}</h2>

                        <?php echo html_entity_decode($blog_details['details'])?>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="search-section">

                    <div class="posts-headings">

                        <h2>Search Blog</h2>

                    </div>

                    <form method="get" id="searchform" action="{{route('career')}}" class="post-form">

                              <input type="search" name="search" placeholder="Search Keyword..." required>

                              <button type="button" class="btn btn-primary" id="fieldtxt"><img src="{{asset('web/images/search-icon.png')}}" alt="" /></button>

                    </form>

                </div>

                <div class="popular-posts">

                    <div class="blk-area">

                        <div class="posts-headings">

                            <h3>Popular Posts</h3>

                        </div>

                        @if($recent_blogs) @foreach($recent_blogs as $blog)

                        <a href="{{route('news_detail' ,$blog->slug)}}">

                            <div class="blog-blk">

                                <div class="blog-imgs">

                                    <img src="{{asset($blog->img)}}" alt="" style="width:81px;height:79px" />

                                </div>

                                <div class="blog-txt">

                                    <h3>{{$blog->name}}</h3>

                                    <h4>{{date("d M y" ,strtotime($blog->created_date))}}</h4>

                                </div>

                            </div>

                        </a>

                        @endforeach @endif

                    </div>

                </div>

                

                <div class="social-connect">

                    <div class="posts-headings">

                        <h3>Social Connect</h3>
                        <ul>
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank" class="fb-s"><i class="fa fa-facebook" aria-hidden="true"></i> Share on Facebook</a></li>
                            <li><a href="https://twitter.com/intent/tweet?text={{url()->current()}}" target="_blank" class="tw-s"><i class="fa fa-twitter" aria-hidden="true"></i> Share on Twitter</a></li>
                            <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{url()->current()}}" target="_blank" class="li-s"><i class="fa fa-linkedin" aria-hidden="true"></i> Share on Linkedin</a></li>
                        </ul>
                        <!-- <a href="">
                        <img src="{{asset('web/images/social.jpg')}}" alt="" /></a>
                        <a href="">
                        <img src="{{asset('web/images/social.jpg')}}" alt="" /></a>
                        <a href="">
                        <img src="{{asset('web/images/social.jpg')}}" alt="" /></a> -->

                    </div>

                </div>

                   

            </div>

        </div>

    </div>

</section>


<section class="related-news">

    <div class="container">

        <div class="career-heading">

            <h2>Related <span>News</span></h2>

        </div>

        <div class="row">

            <div class="col-md-4">

                <div class="post-sec">

                    <div class="post-img">

                        <img src="{{asset('web/images/career-advice-img1.jpg')}}" alt="" />

                    </div>

                    <div class="post-title">

                        <p>Post by Jonathan doe | 28 Sep, 2021</p>

                        <h3>Lorem ipsum dolor sit amet consectetur elit...</h3>

                        <a href="#" class="post-btn">Lorem ipsum</a>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="post-sec">

                    <div class="post-img">

                        <img src="{{asset('web/images/career-advice-img2.jpg')}}" alt="" />

                    </div>

                    <div class="post-title">

                        <p>Post by Jonathan doe | 28 Sep, 2021</p>

                        <h3>Lorem ipsum dolor sit amet consectetur elit...</h3>

                        <a href="#" class="post-btn">Lorem ipsum</a>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="post-sec">

                    <div class="post-img">

                        <img src="{{asset('web/images/career-advice-img3.jpg')}}" alt="" />

                    </div>

                    <div class="post-title">

                        <p>Post by Jonathan doe | 28 Sep, 2021</p>

                        <h3>Lorem ipsum dolor sit amet consectetur elit...</h3>

                        <a href="#" class="post-btn">Lorem ipsum</a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



@endsection @section('css')

<style type="text/css"></style>

@endsection

@section('js')

<script>

$("#fieldtxt").click(function(){

       $('#searchform')[0].submit();

    });

</script>

@endsection

