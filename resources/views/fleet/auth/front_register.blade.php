@extends('provider.layout.auth')

@section('content')
<div class="col-md-12">
    <a class="log-blk-btn" href="{{ url('/fleet/login') }}">@lang('fleets.signup.already_register')</a>
    <h3>@lang('fleets.signup.sign_up')</h3>
</div>

<div class="col-md-12">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/fleet/register') }}">

        <div id="first_step">
            <div class="row" id="phone_number_login">
                <div class="col-md-4">
                    <input value="+91" type="text" placeholder="+91" id="country_code" name="country_code" />
                </div> 
                
                <div class="col-md-8">
                    <input type="phone" autofocus id="phone_number" class="form-control" placeholder="@lang('fleets.signup.enter_phone')" name="phone_number" value="{{ old('phone_number') }}" data-stripe="number" maxlength="10" onkeypress="return isNumberKey(event);"/>
                </div>

                <div class="col-md-8">
                    @if ($errors->has('phone_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-12" style="padding-bottom: 10px;" id="mobile_verfication"></div>
                <div class="col-md-12" style="padding-bottom: 10px;">
                    <input type="button" class="log-teal-btn small verify_btn" onclick="smsLogin();" value="Verify Phone Number" id="sign-in-button" />
                </div>
            </div>
            <div class="row" id="phone_number_verify" style="display: none;">
                <div class="col-md-12">
                    <input type="text" autofocus id="verficition_code" class="form-control" placeholder="@lang('fleets.signup.enter_otp')" name="verficition_code"  data-stripe="number" maxlength="6" onkeypress="return isNumberKey(event);"/>
                    <div id="otp_verfication"></div>
                </div>
                  <div class="col-md-12" style="padding-bottom: 10px;">
                    <input type="button" class="log-teal-btn small verify_btn" onclick="verifyOTP();" value="Verify OTP"  />
                </div>
            </div>
        </div>

        {{ csrf_field() }}

        <div id="second_step" style="display: none;">
            <div>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="@lang('fleets.profile.name')" autofocus data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="@lang('fleets.profile.name') can only contain alphanumeric characters and . - spaces">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
             <div>
                <input id="company" type="text" class="form-control" name="company" value="{{ old('company') }}" placeholder="@lang('fleets.profile.company')" autofocus data-validation="alphanumeric" data-validation-allowing=" -" data-validation-error-msg="@lang('fleets.profile.company') can only contain alphanumeric characters and . - spaces">
                @if ($errors->has('company'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company') }}</strong>
                    </span>
                @endif
            </div>
            <div>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="@lang('fleets.signup.email_address')" data-validation="email">            
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
                                 
            <div>
                <input id="password" type="password" class="form-control" name="password" placeholder="@lang('fleets.signup.password')" data-validation="length" data-validation-length="min6" data-validation-error-msg="Password should not be less than 6 characters">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>    
            <div>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="@lang('fleets.signup.confirm_password')" data-validation="confirmation" data-validation-confirm="password" data-validation-error-msg="Confirm Passsword is not matched">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>  
        
            
            <button type="submit" class="log-teal-btn">
                @lang('fleets.signup.register')
            </button>

        </div>
    </form>
</div>
<div id="recaptcha-container"></div>
@endsection


@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script type="text/javascript">
    @if (count($errors) > 0)
        $("#second_step").show();
    @endif
    $.validate({
        modules : 'security',
    });
    $('.checkbox-inline').on('change', function() {
        $('.checkbox-inline').not(this).prop('checked', false);  
    });
    function isNumberKey(evt)
    {   
        var edValue = document.getElementById("phone_number");
        var s = edValue.value;
        if (event.keyCode == 13) {
            event.preventDefault();
            if(s.length>=10){
                smsLogin();
            }
        }
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }

</script>
<script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
<script>
  // initialize Account Kit with CSRF protection
  var firebaseConfig = {
    apiKey: "{{ config('constants.firebase_api_key') }}",
    authDomain: "{{ config('constants.firebase_auth_domain') }}",
    databaseURL: "{{ config('constants.firebase_database_url') }}",
    projectId: "{{ config('constants.firebase_project_id') }}",
    storageBucket: "{{ config('constants.firebase_storage_bucket') }}",
    messagingSenderId: "{{ config('constants.firebase_message_id') }}",
    appId: "{{ config('constants.firebase_app_id') }}",
    measurementId: "{{ config('constants.firebase_messurement_id') }}"
  };
firebase.initializeApp(firebaseConfig);

window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
  'size': 'invisible',
  'callback': function(response) {
    // reCAPTCHA solved, allow signInWithPhoneNumber.
    
  }
});
 
    function showVerificationInput(){
        $('#phone_number').attr('readonly',true);
        $('#country_code').attr('readonly',true);
        $("#phone_number_verify").fadeIn(400);
        $("#phone_number_login").fadeOut(400);
    }

    function verifyOTP(){
        var code=$("#verficition_code").val();
        var response=window.confirmationResult.confirm(code).then(function (result) {
              // User signed in successfully.
               console.log(result);
              var user = result.user;
              $('#second_step').fadeIn(400);
              $('#first_step').fadeOut(400);
              // ...
            }).catch(function (error) {
               $("#verficition_code").parent().addClass('has-error');
                $('#otp_verfication').html("<p class='helper'> * Authentication Failed </p>");
            });
       
    }

  // login callback
  function loginCallback(response) {
    if (response.status === "PARTIALLY_AUTHENTICATED") {
      var code = response.code;
      var csrf = response.state;
      // Send code to server to exchange for access token
      $('#mobile_verfication').html("<p class='helper'> * Phone Number Verified </p>");
      $('#phone_number').attr('readonly',true);
      $('#country_code').attr('readonly',true);
      $('#second_step').fadeIn(400);
      $('.verify_btn').hide();

      $.post("{{route('account.kit')}}",{ code : code }, function(data){
        $('#phone_number').val(data.phone.national_number);
        $('#country_code').val('+'+data.phone.country_prefix);
      });

    }
    else if (response.status === "NOT_AUTHENTICATED") {
      // handle authentication failure
      $('#mobile_verfication').html("<p class='helper'> * Authentication Failed </p>");
    }
    else if (response.status === "BAD_PARAMS") {
      // handle bad parameters
    }
  }

  // phone form submission handler
  function smsLogin() {

    var countryCode = document.getElementById("country_code").value;
    var phoneNumber = document.getElementById("phone_number").value;
    var testVerificationCode='123456';
    

    firebase.auth().signInWithPhoneNumber(countryCode+" "+phoneNumber, window.recaptchaVerifier)
    .then(function (confirmationResult) {
      // confirmationResult can resolve with the whitelisted testVerificationCode above.
      showVerificationInput();
        window.confirmationResult = confirmationResult;
    }).catch(function (error) {
      // Error; SMS not sent
      // ...
    });
  }

</script>

@endsection