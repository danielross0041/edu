@extends('web.layouts.main') @section('content')
<style type="text/css">
    .rev-sec {
        padding-top: 0 !important;
    }
    .banne{
        text-align: center;
    }
</style>
<section class="inner-banner">
    <img src="{{asset('web/images/bnr-bg.jpg')}}" />
    <div class="inner-cap no-flex">
        <?php echo (html_entity_decode(Helper::editck('h4', 'banne', 'Companies <span>Reviews</span>' ,'h4Companies <span>Reviews</span>'.__LINE__)));?>
    </div>
</section>

<section class="main-rev">
    <div class="container">
        <div>
            <?php echo (html_entity_decode(Helper::editck('h6', '', 'Rate your recent company:' ,'h6Rate your recent company:'.__LINE__)));?>
                        <a class="banner-btn" href="{{route('company_reviews')}}">
                        <select required="" name="company_overall_rating" class="star">
                            <option value="">--</option>
                            <option class="star" value="1">1</option>
                            <option class="star" value="2">2</option>
                            <option class="star" value="3">3</option>
                            <option class="star" value="4">4</option>
                            <option class="star" value="5">5</option>
                        </select>
                        </a>
                    </div>
       
    </div>
</section>

<section class="pop-com">
    <div class="container">
        {{--
        <div class="title-heading">
            <h2><span>Company </span> Review</h2>
        </div>
        --}}
        <div class="private-schools">
            <div class="row">
                @if($company_name) @foreach($company_name as $company) @if($company->company_name != "")
                <div class="col-sm-6 col-lg-4">
                    <div class="feature-details">
                        <div class="school-title">
                            <div class="scool-logo">
                                <?php
                                 $company_img=$company->img($company->company_name); $reviews_count=$company->reviews_count($company->company_name); $rating_stars=$company->reviews_rating($company->company_name); ?>
                                <?php if (isset($company_img->company_logo)){?> <img src="{{asset("/uploads/company_logo/".$company_img->company_logo)}}" alt="">
                                <?php }else{ ?>
                                <img src="{{asset("/uploads/company_logo/wallet_1638586602.png")}}" alt="">
                                <?php } ?>
                            </div>
                            <div class="schl-head">
                                <h3>{{$company->company_name}}</h3>
                                @if ($rating_stars <= 0.5 && $rating_stars > 0)
                                <ul>
                                    <li><i class="fa fa-star-half-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                </ul>
                                @endif @if ($rating_stars <= 1 && $rating_stars > 0.5)
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                </ul>
                                @endif @if ($rating_stars <= 1.5 && $rating_stars > 1)
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-half-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                </ul>
                                @endif @if ($rating_stars <= 2 && $rating_stars > 1.5)
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                </ul>
                                @endif @if ($rating_stars <= 2.5 && $rating_stars > 2)
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-half-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                </ul>
                                @endif @if ($rating_stars <= 3 && $rating_stars > 2.5)
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                </ul>
                                @endif @if ($rating_stars <= 3.5 && $rating_stars > 3)
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-half-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                </ul>
                                @endif @if ($rating_stars <= 4 && $rating_stars > 3.5)
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                </ul>
                                @endif @if ($rating_stars <= 4.5 && $rating_stars > 4)
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star-half-o"></i></li>
                                </ul>
                                @endif @if ($rating_stars <= 5 && $rating_stars > 4.5)
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                                @endif
                                <a href="{{route('view_reviews' ,Crypt::encrypt($company->company_name))}}">{{$reviews_count}} reviews</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif @endforeach @endif
            </div>
            {{--
            <div class="find-job">
                <a href="https://digitalservicescorp.com/educate-system/search-detail">Find more jobs</a>
            </div>
            --}}
        </div>
    </div>
</section>
@endsection @section('css')
<style type="text/css">

</style>
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
  <script>
function myFunction() {
  setTimeout(function() {
                        window.location='{{route('company_reviews')}}';
                    }, 2000);
}
</script>
@endsection
