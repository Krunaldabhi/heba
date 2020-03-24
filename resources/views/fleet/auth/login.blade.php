@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3 col-md-8 col-md-offset-2">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="logo-section text-center">
                    <!-- <link rel="shortcut icon" type="image/png" href="{{ config('constants.site_icon') }}"> -->
                    <img src="{{config('constants.site_icon')}}" alt="">
                </div>
            </div>
        </div>
        <div id="userform">
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li class="active"><a href="#fleet" role="tab" data-toggle="tab">Fleet</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="fleet">
                    <h2 class="text-uppercase text-center">Sign In</h2>
                    <div class="row {{ Session::has('message')?'':'hide' }}">
                        <span>{{ Session::has('message')?Session::get('message'):'' }}</span>
                    </div>
                    <form id="login" role="form" method="POST" action="{{ url('/fleet/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label @if(Setting::get('demo_mode', 0)==1)class="active"@endif>Fleet Administrator E-mail<span class="req">*</span> </label>
                            <input type="email" name="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address." autocomplete="off" @if(Setting::get('demo_mode', 0)==1)value="fleet@demo.com"@endif>
                                   @if ($errors->has('email'))
                                   <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label @if(Setting::get('demo_mode', 0)==1)class="active"@endif> Password<span class="req">*</span> </label>
                            <input type="password" name="password" class="form-control" id="password" required data-validation-required-message="Please enter your password" autocomplete="off" @if(Setting::get('demo_mode', 0)==1)value="123456"@endif>
                                   @if ($errors->has('password'))
                                   <p class="help-block text-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                        <div class="mrgn-30-top">
                            <input type="hidden" name="login_type" value="fleet">
                            <button type="submit" class="btn btn-larger btn-block" /> Log in
                            </button>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <div class="details">
                                @if(Setting::get('demo_mode', 0)==1)
                                <h4 class="text-captilize text-left">Using below detail for demo version</h4>
                                <h5><strong>User Name : </strong><span>fleet@demo.com</span></h5>
                                <h5><strong>Password  : </strong><span>123456</span></h5>
                                <p>Super Administrator can manage whole system and other user's rights too.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
