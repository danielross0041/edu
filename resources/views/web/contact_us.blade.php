@extends('web.layouts.main')
@section('content')
<section class="inner-banner">
    <img src="{{asset('web/images/bnr-bg.jpg')}}" />
    <div class="inner-cap">
        <?php echo (html_entity_decode(Helper::editck('h4', '', 'Contact <span>us</span>' ,'h4Contact <span>us</span>'.__LINE__)));?>
    </div>
</section>
<section class="career-advice contact-page">
    <div class="container">
        <div class="row">
            <div class="col-md-5 lft-sec">
                <div class="post-sec">
                    <div class="post-title">
                        <?php echo (html_entity_decode(Helper::editck('h4', '', 'Contact Details' ,'h4Contact Details'.__LINE__)));?>
                        <!-- <p>We're here for you. Send us a message and someone from our support team will be in touch as soon as possible.</p> -->
                        <div class="cont-info">
                            <div class="cntct-rnd"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                            <div class="cntc-info-blk">
                                <?php echo (html_entity_decode(Helper::editck('h5', '', 'Address:' ,'h5Address:'.__LINE__)));?>
                                <?php echo (html_entity_decode(Helper::editck('p', '', 'Lorem Ipsum Text Here' ,'pLorem Ipsum Text Here'.__LINE__)));?>
                            </div>
                        </div>
                        <div class="cont-info">
                            <div class="cntct-rnd"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                            <div class="cntc-info-blk">
                                <?php echo (html_entity_decode(Helper::editck('h5', '', 'Phone:' ,'h5Phone:'.__LINE__)));?>
                                <?php echo (html_entity_decode(Helper::editck('p', '', '12345-6789' ,'p12345-6789'.__LINE__)));?>
                            </div>
                        </div>
                        <div class="cont-info">
                            <div class="cntct-rnd"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                            <div class="cntc-info-blk">
                                <?php echo (html_entity_decode(Helper::editck('h5', '', 'Email:' ,'h5Email:'.__LINE__)));?>
                                <?php echo (html_entity_decode(Helper::editck('p', '', 'info@educationteam.com' ,'pinfo@educationteam.com'.__LINE__)));?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 ryt-sec">
                <div class="post-sec">
                    <div class="post-title">
                        <form class="needs-validation" novalidate method="POST" action="{{route('contact_submit')}}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{(Auth::user())?Auth::user()->id:'0'}}" />
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo (html_entity_decode(Helper::editck('h4', '', 'Stay In Touch' ,'h4Stay In Touch'.__LINE__)));?>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" required placeholder="Name" />
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="surname" class="form-control" required placeholder="Surname" />
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="email" class="form-control" required placeholder="Email" />
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="phonenumber" class="form-control" required placeholder="Phone" />
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="company" class="form-control" required placeholder="Company/Department Affiliation" />
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="subject" class="form-control" required placeholder="How can we help you?" />
                                </div>
                                <div class="col-md-12">
                                    <textarea name="message" class="form-control" required="" placeholder="Message"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="submit-form">Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('css')
<style></style>
@endsection 
@section('js') 
@endsection
