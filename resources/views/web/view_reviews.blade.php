@extends('web.layouts.main') @section('content')
<style type="text/css">
    .rev-sec {
        padding-top: 0 !important;
    }
</style>
<section class="inner-banner">
    <img src="{{asset('web/images/bnr-bg.jpg')}}" />
    <div class="inner-cap">
        <h4 style="text-align: center;">View <span>Reviews</span></h4>
    </div>
</section>
<section class="view-com">
    <div class="container">
        <div class="title-heading">
            <h2><span>{{$reviews_details[0]->company_name}}</span></h2>
        </div>
        <div class="row">
            <div class="col-md-8 lft-side">
                <div class="company-title">
                    <h4>Company Employee Reviews</h4>
                </div>
                <!-- COMMENT BOX -->
                @if($reviews_details) @foreach($reviews_details as $review)
                <?php $rating_stars=$review->user_reviews_rating($review->id); ?>
                <div class="rev-box">
                    <div class="preview-rev">
                        <div class="rate-pre">
                            @if ($rating_stars <= 0.5 && $rating_stars > 0)
                            <span>0.5</span>
                            <ul>
                                <li><i class="fa fa-star-half-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                            @endif @if ($rating_stars <= 1 && $rating_stars > 0.5)
                            <span>1.0</span>
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                            @endif @if ($rating_stars <= 1.5 && $rating_stars > 1)
                            <span>1.5</span>
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-half-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                            @endif @if ($rating_stars <= 2 && $rating_stars > 1.5)
                            <span>2.0</span>
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                            @endif @if ($rating_stars <= 2.5 && $rating_stars > 2)
                            <span>2.5</span>
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-half-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                            @endif @if ($rating_stars <= 3 && $rating_stars > 2.5)
                            <span>3.0</span>
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                            @endif @if ($rating_stars <= 3.5 && $rating_stars > 3)
                            <span>3.5</span>
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-half-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                            @endif @if ($rating_stars <= 4 && $rating_stars > 3.5)
                            <span>4.0</span>
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                            @endif @if ($rating_stars <= 4.5 && $rating_stars > 4)
                            <span>4.5</span>
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-half-o"></i></li>
                            </ul>
                            @endif @if ($rating_stars <= 5 && $rating_stars > 4.5)
                            <span>5.0</span>
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            @endif
                        </div>
                        <div class="rate-head-pre">
                            <h5>{{$review->company_name}}</h5>
                        </div>
                        <div class="status-pre">
                            <p>{{$review->job_title}}, {{$review->job_location}} – {{$review->start_date}} to {{$review->end_date}}</p>
                        </div>
                        <div class="comment-pre">
                            <p>{{$review->your_review}}</p>
                        </div>
                        <ul class="pros-con">
                            <li class="pros-pre">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                <ul class="inner-items">
                                    <li>Pros</li>
                                    <li class=""><span>{{$review->pros}}</span></li>
                                </ul>
                            </li>
                            <li class="con-pre">
                                <i class="fa fa-times" aria-hidden="true"></i>
                                <ul class="inner-items">
                                    <li>Cons</li>
                                    <li class=""><span>{{$review->cons}}</span></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach @endif
            </div>
            <div class="col-md-4 ryt-side">
                <div class="over-all-r sticky-top">
                    <div class="rate-pre">
                        <p>Overall Rating</p>
                        <?php
                                 $company_img=$reviews_details[0]->img($reviews_details[0]->company_name); $reviews_count=$reviews_details[0]->reviews_count($reviews_details[0]->company_name);
                        $rating_stars=$reviews_details[0]->reviews_rating($reviews_details[0]->company_name); ?> @if ($rating_stars <= 0.5 && $rating_stars > 0)
                        <b>0.5</b>
                        <ul>
                            <li><i class="fa fa-star-half-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                        </ul>
                        @endif @if ($rating_stars <= 1 && $rating_stars > 0.5)
                        <b>1.0</b>
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                        </ul>
                        @endif @if ($rating_stars <= 1.5 && $rating_stars > 1)
                        <b>1.5</b>
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                        </ul>
                        @endif @if ($rating_stars <= 2 && $rating_stars > 1.5)
                        <b>2.0</b>
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                        </ul>
                        @endif @if ($rating_stars <= 2.5 && $rating_stars > 2)
                        <b>2.5</b>
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                        </ul>
                        @endif @if ($rating_stars <= 3 && $rating_stars > 2.5)
                        <b>3.0</b>
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                        </ul>
                        @endif @if ($rating_stars <= 3.5 && $rating_stars > 3)
                        <b>3.5</b>
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                        </ul>
                        @endif @if ($rating_stars <= 4 && $rating_stars > 3.5)
                        <b>4.0</b>
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                        </ul>
                        @endif @if ($rating_stars <= 4.5 && $rating_stars > 4)
                        <b>4.5</b>
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                        </ul>
                        @endif @if ($rating_stars <= 5 && $rating_stars > 4.5)
                        <b>5.0</b>
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        @endif
                        <span>Based on {{$reviews_count}} reviews</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection @section('css')
<style type="text/css"></style>
@endsection @section('js')
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
