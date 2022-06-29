@extends('web.layouts.main') @section('content')

    <section class="dash-sign-sec">
     <div class="container">
       <div class="dash-sign-blk">
        <h4>Register <span>Now!</span></h4>
        <p>All Fields are Required</p>
        <form class="needs-validation" novalidate method="POST" action="{{route('registration_submit')}}" >
            @csrf
          <div class="row">
            <div class="col-md-12">
              <span class="user1">
                <input type="text" class="" required name="name" placeholder="Full name" value="{{ old('name') }}">
              </span>
            </div>
            <div class="col-md-12">
              <span class="user2">
                <input type="email" name="email" id="email" required="" placeholder="Email Address">
              </span>
            </div>
            <div class="col-md-12">
              <span class="user3">
                <input type="number" id="number" name="phonenumber" placeholder="1NXXNXXXXXX" value="{{ old('phonenumber') }}">
              </span>
            </div>
            
            <div class="col-md-12">
              <span class="user5">
                <input type="password" name="password" required="" placeholder="Password">
              </span>
            </div>

            <div class="col-md-12">
                <div class="post-opt">
                <label class="container">
                    <p><span>Employer</span></p>
                    <input type="radio" checked="checked" value="Employer" name="role_type">
                    <span class="checkmark"></span>
                </label>
              </div>
            </div>

            <div class="col-md-12">
               <div class="post-opt">
                <label class="container">
                    <p><span>Job seeker</span></p>
                    <input type="radio" checked="checked" value="Job seeker" name="role_type">
                    <span class="checkmark"></span>
                </label>
              </div>
            </div>

            <div class="col-md-12">
              <button type="submit"> Create Account </button>
            </div>
          </div>
        </form>
       </div>
     </div>
    </section>

@endsection 
@section('css')

@endsection 
@section('js') 
<script>
    // Select your input element.
    var number = document.getElementById('number');
    // Listen for input event on numInput.
    number.onkeydown = function(e) {
        if(!((e.keyCode > 95 && e.keyCode < 106)
          || (e.keyCode > 47 && e.keyCode < 58) 
          || e.keyCode == 8)) {
            return false;
        }
    }


    $("#email").focusout(function(){
      var type = "duplicate";
      var table = "user";
      var value = $(this).val();
      var like = $(this);

        if (value != "") {
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            type: 'post',
            dataType : 'json',
            url: "{{route('validator_check')}}",
            data: {type:type , value:value,table:table},
              success: function (response) {
                if (response.status == 0) {
                  $(like).addClass("is-invalid")
                  $(like).removeClass("is-valid")
                  $(like).prop("placeholder" , value)
                  $(like).val("")
                  toastr.error(response.message);

                }else{
                  $(like).addClass("is-valid")
                  $(like).removeClass("is-invalid")
                }
                return false;
              }
          });
        }
      
    })
</script>
@endsection
