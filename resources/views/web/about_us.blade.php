@extends('web.layouts.main')
@section('content')
<section class="inner-banner">
    <img src="{{asset('web/images/bnr-bg.jpg')}}" />
    <div class="inner-cap">
        <?php echo (html_entity_decode(Helper::editck('h4', '', 'About <span>us</span>' ,'h4About <span>us</span>'.__LINE__)));?>
    </div>
</section>
<section class="career-advice about-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php echo (html_entity_decode(Helper::editck('h4', '', 'What is Lorem Ipsum?' ,'h4WhatisLoremIpsum?LoremIpsumissimplydummy'.__LINE__)));?>
                <?php echo (html_entity_decode(Helper::editck('h4', '', 'Why do we use it?' ,'h4Itisalongestablishedfactthatareaderwillbedi'.__LINE__)));?>
                <?php echo (html_entity_decode(Helper::editck('h4', '', 'Where does it come from?' ,'h4Contpopubelief,Loremnotsimplyrandom'.__LINE__)));?>
            </div>
            {{--
            <div class="col-md-5 lft-sec">
                <div class="post-sec">
                    <div class="post-title">
                        <h4>Contact Details</h4>
                        <!-- <p>We're here for you. Send us a message and someone from our support team will be in touch as soon as possible.</p> -->
                        <div class="cont-info">
                            <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                            <div class="cntc-info-blk">
                                <h5>Address:</h5>
                                <p>Lorem Ipsum Text Here</p>
                            </div>
                        </div>
                        <div class="cont-info">
                            <span><i class="fa fa-mobile" aria-hidden="true"></i></span>
                            <div class="cntc-info-blk">
                                <h5>Phone:</h5>
                                <p>12345-6789</p>
                            </div>
                        </div>
                        <div class="cont-info">
                            <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            <div class="cntc-info-blk">
                                <h5>Email:</h5>
                                <p>info@educationteam.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            --}} {{--
            <div class="col-md-7 ryt-sec">
                <div class="post-sec">
                    <div class="post-title">
                        <form class="needs-validation" novalidate method="POST" action="{{route('contact_submit')}}">
                            @csrf
                            <input type="hidden" name="user_id" value="{{(Auth::user())?Auth::user()->id:'0'}}" />
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Stay In Touch</h4>
                                    <!--  <span class="user1">
                                <label>What would you like help with?
                                    <input type="text" name="subject" class="form-control" required  placeholder="Subject">
                                </label>
                              </span> -->
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
                                <!-- <div class="col-md-12">
                                <h4>Message <span>*</span></h4>
                              <span class="user2">
                                <label>Please do not include credit card or other sensitive/confidential information
                                    <textarea name="message" class="form-control" required=""></textarea>
                                </label>
                              </span>
                            </div> -->
                                <div class="col-md-12">
                                    <button type="submit" class="submit-form">Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            --}}
        </div>
    </div>
</section>
@endsection 
@section('css')
<style></style>
@endsection 
@section('js')
@endsection
