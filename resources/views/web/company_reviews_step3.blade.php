@extends('web.layouts.main') @section('content')
<style type="text/css">
    .rev-sec {
        padding-top: 0 !important;
    }
</style>
<section class="inner-banner">
    <img src="{{asset('web/images/bnr-bg.jpg')}}" />
    <div class="inner-cap">
        <h4 style="text-align: center;">Preview</h4>
    </div>
</section>
<form id="get_started" action="{{route('reviews_save2')}}" method="post">
    @csrf
    @if(isset($review) && $review != null)
    <input type="hidden" name="review_id" value="{{Crypt::encrypt($review->id)}}" />
    @endif
    <input type="hidden" name="user_id" value="{{!is_null(Auth::user())?Auth::user()->id:'0'}}" />
    <input type="hidden" name="step_filled" value="3" />
    <input type="hidden" name="is_confirm" value="1" />
    <section class="company-ratings">
        <div class="container">
            {{--
            <div class="title-heading">
                <h2><span>Company </span> Review</h2>
            </div>
            --}}
            <div class="review-form">
                <!-- FINAL STEP -->
                <div class="final-step">
                    <div class="r-message">
                        <p>Write your review for EEEA, Inc</p>
                        <h3>Preview</h3>
                    </div>
                    <?php $rating_stars=$review->user_reviews_rating($review->id); ?>
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
                            <h5>{{isset($review)?$review->company_name:''}}</h5>
                        </div>
                        <div class="status-pre">
                            <p>{{isset($review)?$review->job_title:''}}, {{isset($review)?$review->job_location:''}} – {{isset($review)?$review->start_date:''}} to {{isset($review)?$review->end_date:''}}</p>
                        </div>
                        <div class="comment-pre">
                            <p>{{isset($review)?$review->your_review:''}}</p>
                        </div>
                        <ul class="pros-con">
                            <li class="pros-pre">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                <ul class="inner-items">
                                    <li>Pros</li>
                                    <li class=""><span>{{isset($review)?$review->pros:''}}</span></li>
                                </ul>
                            </li>
                            <li class="con-pre">
                                <i class="fa fa-times" aria-hidden="true"></i>
                                <ul class="inner-items">
                                    <li>Cons</li>
                                    <li class=""><span>{{isset($review)?$review->cons:''}}</span></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="other-pre">
                        <h6>What tips or advice would you give to someone interviewing at EEEA, Inc?</h6>
                        <p>{{isset($review)?$review->tips_or_advice_would_you_give_to_someone_interviewing:'-'}}</p>
                        <h6>How long does it take to get hired from start to finish? What are the steps along the way?</h6>
                        <p>{{isset($review)?$review->hired_from_start_to_finish_and_steps_along_the_way:'-'}}</p>
                    </div>
                </div>
                <!-- LAST BTN -->
                <div class="btn-to-step two-btn">
                    <input type="button" onclick="window.location.href='{{route('company_reviews_step2' ,Crypt::encrypt($review->id))}}';" value="<< Back" />
                    <input type="submit" value="Submit Review" class="submit-form" />
                </div>
                <!-- END LAST BTN -->
                <!-- END FINAL STEP -->
            </div>
        </div>
    </section>
</form>
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
<!-- <script>
    $(".submit-form").click(function () {
        var formData = $("#get_started").serialize();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "post",
            dataType: "json",
            url: "{{route('reviews_save2')}}",
            data: formData,
            success: function (response) {
                if (response.status == 1) {
                    window.location.href = response.location;
                }
                return false;
            },
        });
    });
</script> -->
<!-- <script>
  $( ".login-btn" ).click(function() {
    toastr.error("Kindly Login First");
       setTimeout(function() {
                        window.location='{{route('signup_login')}}';
                    }, 2000);

});
  </script> -->
@endsection
