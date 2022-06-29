<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ftr-logo">
                            <img src="{{asset('web/images/logo.png')}}" />
                        </div>
                        <div class="ftr-info">
                            <?php echo (html_entity_decode(Helper::editck('p', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac ultricies metus, non iaculis metus donec sed quam.' ,'pLoremdipiscingelit,noniaculismetusdonecsedquam.'.__LINE__)));?>
                        </div>
                        <div class="social-icons">
                            <a href="<?=Helper::config('facebooklink')?>"> <i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="<?=Helper::config('twitterlink')?>"> <i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="<?=Helper::config('linkedinlink')?>"> <i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-2">
                <div class="row rw-h">
                    <div class="col-md-12">
                        <?php echo (html_entity_decode(Helper::editck('h4', '', 'Quick Links' ,'h4QuickLinks'.__LINE__)));?>
                        <ul>
                            <li><a href="{{route('about_us')}}">About Us</a></li>
                            {{--
                            <li><a href="{{route('blogs_index')}}">Latest Blogs</a></li>
                            --}}
                            <li><a href="{{route('popular_companies')}}">Companies</a></li>
                            <li><a href="{{route('contact_us')}}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-2">
                <div class="row rw-h">
                    <div class="col-md-12">
                        <?php echo (html_entity_decode(Helper::editck('h4', '', 'other links' ,'h4other links'.__LINE__)));?>
                        <ul>
                            <li><a href="{{url('/')}}?search=job">Find Jobs</a></li>
                            <li><a href="{{route('step1_form')}}">Post a Job</a></li>
                            <li><a href="{{route('signup_login')}}">Sign In</a></li>
                            <li><a href="{{route('signup')}}">Sign Up</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="row rw-h">
                    <div class="col-md-12">
                        <?php echo (html_entity_decode(Helper::editck('h4', '', 'Subscribe newsletter' ,'h4Subscribe newsletter'.__LINE__)));?>
                        <div class="sletter-main">
                            <div class="subscribe-info">
                                <?php echo (html_entity_decode(Helper::editck('p', '', 'Sign up today to get resources on how to attract and retain more customers!' ,'h4Sign up today to get resources on how to attract and retain more customers!'.__LINE__)));?>
                            </div>
                            <div class="user-form">
                                <form action="{{route('newsletter_submit')}}" method="POST">
                                    @csrf
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <input type="email" placeholder="Email Address" name="email" required="" />
                                    <div class="plain">
                                        <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="ftrinr-info">
                        <?php echo (html_entity_decode(Helper::editck('p', '', 'Copyright © 2021 .<span>The Education Team .</span> All Right Reserved.' ,'p Education Team .</span> All Right Reserved.'.__LINE__)));?>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul>
                        <li><a href="{{route('terms')}}">Terms and Conditions </a></li>
                        <li><a href="">|</a></li>
                        <li><a href="{{route('policy')}}">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
