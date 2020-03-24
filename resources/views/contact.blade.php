@extends('user.layout.app')

@section('content')

<div class="banner row no-margin" style="background-image: url('{{ asset('asset/img/banner-bg.jpg') }}');">
    <div class="banner-overlay"></div>
    <div class="container pad-60">
        <div class="col-md-8">
            <h2 class="banner-head"><span class="strong">Welcome To,</span><br>Cabbie Ecommerce Transport</h2>
        </div>
       
    </div>
</div>

<div class="row white-section pad-60 no-margin">
    <div class="container">
        
        <div class="col-md-4 content-block small">
             <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/driving-license.png')}}"></div>
            <h2>Address</h2>
            <div class="title-divider"></div>
            <p>Cabbie Ecommerce Transport</p>
			<p>P.O. Box No - 146</p>
			<p>Abu Dhabi</p>
        </div>
    </div>

        <div class="col-md-4 content-block small">
             <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/destination.png')}}"></div>
            <h2>Email</h2>
            <div class="title-divider"></div>
            <p>Info@cabbieuae.com</p>
        </div>
    </div>

        <div class="col-md-4 content-block small">
             <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/taxi-app.png')}}"></div>
            <h2>Call Us</h2>
            <div class="title-divider"></div>
            <p>Country - UAE</p>
			 <p>Phone - +971 50 412 1313 </p>
        </div>
    </div>

    </div>
</div>



            


<!-- <div class="footer-city row no-margin" style="background-image: url({{ asset('asset/img/footer-city.png') }});"></div> -->
@endsection