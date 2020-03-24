@extends('user.layout.app')

@section('content')
<div class="banner row no-margin" style="background-image: url('{{ asset('asset/img/banner-bg.jpg') }}');">
    <div class="banner-overlay"></div>
    <div class="container pad-60">
        <div class="col-md-8">
            <h2 class="banner-head"><span class="strong">Cabbie</span></h2><h3><br>"Our inspiration is to bring the Emirati Culture and vibe with every ride"</h3>
        </div>
       
    </div>
</div>


<div class="row gray-section no-margin full-section">
    <div class="container">                
        <div class="col-md-6 content-block">
            <div class="icon"><img src="{{asset('asset/img/taxi-car.png')}}"></div>
            <h3>Our Story</h3>
            <h2>Designed just for Valuable Customers</h2>
            <div class="title-divider"></div>
            <p>Cabbie is a transportation application network established in Abu Dhabi, UAE by experienced pioneering Emirati Entrepreneurs in 2019. Where the idea is to bring a much needed resource to all kind of Passengers and Drivers looking to take the extra mile. Cabbie has a wide range of resource, experience combining a diverse team in bringing an agile service/offers to both Passengers and Drivers.</p>
            <p>Cabbie is fetching an integrated technology solutions to make the flow of the application friendly to all kind of users and 24/7 access to our Tech team.</p>
        </div>
        <div class="col-md-6 full-img text-center" style="background-image: url({{ asset('asset/img/driver-car.jpg') }});"> 
            <!-- <img src="img/anywhere.png"> -->
        </div>
    </div>
</div>

 <section class="section">
        <div class="container">
          
            <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="img-fluid text-center mb-3">
                        <img class="img-fluid" src="asset/img/taxi_max.jpg" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 ar-text-right">
                    <h3>Our Founders</h3>
                    <p>Our founders started with a dream and with their combined effort and diverse talents made the dream into reality. The pioneering Emirati’s are focusing on the challenges and making them an opportunity by bringing this integrated application solution to fit all kind of passengers/ drivers needs in the region. Team spirit is the main drive and motivation in creating a new source of opportunities and solutions in the economy of the region. We see things as a team to ensure that we grow and aspire to be top in the market and keep our quality and service the same the top high notch as always.</p>
                    <a href="/en-ae/leadership" class="link">Read More</a>
                </div>
            </div>
        </div>
    </section>

<div class="row white-section pad-60 no-margin">
    <div class="container">
        
		  <h2>Learn more about Cabbie Founders</h2>
		
        <div class="col-md-4 content-block small">
            <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/budget.png')}}"></div>
            <h2>Rewards</h2>
            <div class="title-divider"></div>
            <p>You’re in the driver’s seat. So reward yourself with discounts on fuel, vehicle maintenance, cell phone bills, and more. Reduce your daily expenses and take home extra cash.</p>
        </div></div>

        <div class="col-md-4 content-block small">
            <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/driving-license.png')}}"></div>
            <h2>Requirements</h2>
            <div class="title-divider"></div>
            <p>Know you’re ready to hit the road. Whether you’re driving your own car or a commercially-licensed vehicle, you must meet the minimum requirements and complete a safety screening online.</p>
        </div></div>

        <div class="col-md-4 content-block small">
            <div class="box-shadow">
                <div class="icon"><img src="{{asset('asset/img/seat-belt.png')}}"></div>
            <h2>Safety</h2>
            <div class="title-divider"></div>
            <p>When you drive with {{ config('constants.site_title', 'aistaxi') }}, you get 24/7 driver support and insurance coverage. And all riders are verified with their personal information and phone number, so you’ll know who you’re picking up and so will we.</p>
        </div></div>

    </div>
</div>



<div class="row gray-section left full-section">
    <div class="container ">    
     
        <div class="col-md-12 content-block">
            <div class="icon"><img src="{{asset('asset/img/taxi-car.png')}}"></div>
            <h3>Cabbie Careers and Future Endeavors</h3>
            <div class="title-divider"></div>
            <p>Cabbie is a start of a partnership and family where we are focused on Team effort in all areas of our services and operations whether its tech support or being a strategist we welcome all kind of new ways to open new doors in our Future success.</p>
           
        </div>
    </div>
</div>
            
<div class="row find-city no-margin">
    <div class="container">
        <div class="col-md-12 center content-block">
            <div class="box-shadow">
                <div class="pad-60 ">
        <h2>Start making money</h2>
        <p>Ready to make money? The first step is to sign up online.</p>
<a class="content-more more-btn" href="{{url('login')}}">Join the Cabbie Family <i class="fa fa-chevron-right"></i></a>
        <!-- <button type="submit" class="full-primary-btn drive-btn">START DRIVE NOW</button> -->
    </div>
</div>
</div>
    </div>
</div>



   



<!-- <div class="footer-city row no-margin" style="background-image: url({{ asset('asset/img/footer-city.png') }});"></div> -->
@endsection