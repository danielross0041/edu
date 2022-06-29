@extends('web.layouts.main') @section('content')

<section class="inner-banner">
    <img src="{{asset('web/images/bnr-bg.jpg')}}" />

    <div class="inner-cap">
        <h4>Login <span>Here</span></h4>
    </div>
</section>

<section class="login-sec">
    <div class="container">
        <div class="user-login">
            <div class="user-maininfo">
                <h4>Welcome <span>Back {{(isset($_GET['with'])?ucfirst($_GET['with']):'')}}!</span></h4>

                <p>
                    If you don't have an account? <span><a href="{{route('signup')}}">Sign up</a></span>
                </p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row">
                    {{--

                    <div class="col-md-6">
                        <div class="user-input lft-input">
                            <div class="post-opt">
                                <label class="container">
                                    <p><span>Employer</span></p>

                                    <input type="radio" checked="checked" value="Employer" name="role_type" />

                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="user-input rit-input">
                            <div class="post-opt">
                                <label class="container">
                                    <p><span>Job seeker</span></p>

                                    <input type="radio" checked="checked" value="Job seeker" name="role_type" />

                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    --}}

                    <div class="col-md-12">
                        <div class="user-input">
                            <i class="fa fa-user" aria-hidden="true"></i>

                            <input id="emailaddress" placeholder="Enter your email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />

                            @error('email')

                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="user-input">
                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>

                            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password" />

                            @error('password')

                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                            @enderror
                        </div>
                    </div>

                    <!-- <div class="col-md-12">

                        <div class="forget-pass">

                            <a href="">Forget Password</a>

                        </div>

                    </div> -->

                    <div class="col-md-12">
                        <div class="cntnue-mail">
                            <button type="submit">Continue With Email</button>
                        </div>
                    </div>

                    <div class="option">
                        <h5>OR</h5>
                    </div>
                    {{--
                    <div class="col-md-12">
                        <div class="cntnue-Apple">
                            <button><i class="fa fa-apple" aria-hidden="true"></i>Continue With Apple</button>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="cntnue-facebook">
                            <button><i class="fa fa-facebook" aria-hidden="true"></i>Continue With Facebook</button>
                        </div>
                    </div>
                    --}}
                    <div class="col-md-12">
                        <div class="cntnue-google">
                        <div id="gSignIn"></div>
                        </div>
                        <!-- Show the user profile details -->
                        <div class="userContent" style="display: none;"></div>
                        {{--
                        <div class="cntnue-google">
                            <button><i class="fa fa-google" aria-hidden="true"></i>Continue With Google</button>--}}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection @section('css')
<meta name="google-signin-client_id" content="{{env('GOOGLE_CLIENT_ID')}}" />
<style>
    .lft-input p,
    .rit-input p {
        position: relative;

        top: 4px;
    }

    .lft-input {
        padding-right: 0;
    }

    .rit-input {
        padding-left: 0;
    }

    .rit-input::before {
        left: 40px;

        top: 9px;
    }

    .lft-input::before {
        left: 95px;

        top: 9px;
    }
    
    div#gSignIn {
        margin: 0 auto;
        width: 44%;
    }
</style>

@endsection @section('js')
<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
<script type="text/javascript">

    
    function renderButton() {
        gapi.signin2.render("gSignIn", {
            scope: "profile email",
            width: 240,
            height: 50,
            longtitle: true,
            theme: "dark",
            onsuccess: onSuccess,
            onfailure: onFailure,
        });
    }

    // Sign-in success callback
    function onSuccess(googleUser) {
        var id_token = googleUser.getAuthResponse().id_token;
        //console.log("ID Token: " + id_token);
        // Get the Google profile data (basic)
        //var profile = googleUser.getBasicProfile();

        // Retrieve the Google account data
        gapi.client.load("oauth2", "v2", function () {
            var request = gapi.client.oauth2.userinfo.get({
                userId: "me",
            });
            request.execute(function (resp) {
                // Display the user details
                $("#gSignIn").click(function(){
                    search_user(resp.given_name, resp.email, resp.id, id_token, resp.picture); //  Search or create user
                })
                

                // var profileHTML = '<h3>Welcome '+resp.given_name+'! <a href="javascript:void(0);" onclick="signOut();">Sign out</a></h3>';
                // profileHTML += '<img src="'+resp.picture+'"/><p><b>Google ID: </b>'+resp.id+'</p><p><b>Name: </b>'+resp.name+'</p><p><b>Email: </b>'+resp.email+'</p><p><b>Gender: </b>'+resp.gender+'</p><p><b>Locale: </b>'+resp.locale+'</p><p><b>Google Profile:</b> <a target="_blank" href="'+resp.link+'">click to view profile</a></p>';
                // document.getElementsByClassName("userContent")[0].innerHTML = profileHTML;
                // document.getElementById("gSignIn").style.display = "none";
                // document.getElementsByClassName("userContent")[0].style.display = "block";
            });
        });
    }
    // Sign-in failure callback
    function onFailure(error) {
        alert(error);
    }

    // Sign out the user
    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            document.getElementsByClassName("userContent")[0].innerHTML = "";
            document.getElementsByClassName("userContent")[0].style.display = "none";
            document.getElementById("gSignIn").style.display = "block";
        });
        auth2.disconnect();
    }

    function search_user(name, email, google_id, token, picture) {
        var user_type = "{{(isset($_GET['with'])?ucfirst($_GET['with']):'')}}";
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "post",
            dataType: "json",
            url: "{{route('user_search')}}",
            data: { name: name, email: email, google_id: google_id, token: token, picture: picture, user_type: user_type },
            success: function (response) {
                if (response.stat == 1) {
                    setTimeout(function () {
                        toastr.success(response.message);
                        window.location.href = response.url;
                    }, 3000);
                } else {
                    toastr.error(response.message);
                    return false;
                }
            },
        });
    }
</script>
@endsection
