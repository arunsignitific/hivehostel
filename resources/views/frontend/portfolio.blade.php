@extends('frontend/common/webmaster')
@section('title',"Contact Doors Studio for Website Design, Development, SEO, SMO, PPC & Mobile Apps Development")

@section('linkfile')
@endsection

@section('subheader')
    <!-- start hero_warp -->
    <section class="hero_warp inner_banner portfolio_banner">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-12 col-12">
                    <div class="banner_content">
                        <h1 class="banner_title">Portfolio 2 columns </h1>
                        <p class="banner_para wow fadeInUp">We will help your brand to flourish, your business</p>
                    </div>
                </div>
            </div>
        </div>
        <ul class="social_link">
            <li>
                <a href="#">
                    <i class="fa fa-behance"></i>
                    <i class="fa fa-behance"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-dribbble"></i>
                    <i class="fa fa-dribbble"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-pinterest-p"></i>
                    <i class="fa fa-pinterest-p"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-twitter"></i>
                </a>
            </li>
        </ul>
    </section>
    <!-- end hero_warp -->
@endsection

@section('content')
    <!-- start portfolio_warp -->
    <section class="portfolio_warp" id="portfolio_warp">
       <div class="port_bg_text" >
           <h1 class="bg_strock_text" data-parallax='{"x": -200}'>Portfolio</h1>
       </div>
        <div class="container">
            <div class="row portfolio_single_wrap">
                <div class="col-md-6 col-sm-12 col-xs-12 portfolio_single_item wow fadeInUp">
                    <div class="portfolio_item">
                        <div class="port_img tilt">
                            <a href="{{ route('portfolioView') }}"><img src="{{ URL::asset('public/frontend/assets/images/portfolio_img_1.jpg') }}" alt="img" class="img-fluid"></a>
                        </div>
                        <a  class="exp" href="{{ route('portfolioView') }}"><span class="exp_inner"><span class="exp_hover">Explore</span></span></a>
                        <div class="port_text">
                            <a href="{{ route('portfolioView') }}"><h3 class="port_title">NASA <br> Apollo Project</h3></a>
                            <p class="catagory">- <a href="#">branding,</a> <a href="#">web design</a></p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 portfolio_single_item portfolio_cus wow fadeInUp">
                    <div class="portfolio_item">
                        <div class="port_img tilt">
                            <a href="{{ route('portfolioView') }}"><img src="{{ URL::asset('public/frontend/assets/images/portfolio_img_2.jpg') }}" alt="img" class="img-fluid"></a>
                        </div>
                        <a  class="exp" href="{{ route('portfolioView') }}"><span class="exp_inner"><span class="exp_hover">Explore</span></span></a>
                        <div class="port_text">
                            <a href="{{ route('portfolioView') }}"><h3 class="port_title">Tilda’s  <br> Bi-Cycle Shop</h3></a>
                            <p class="catagory">- <a href="#">branding,</a> <a href="#">web design</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 portfolio_single_item portfolio_cus wow fadeInUp">
                    <div class="portfolio_item">
                        <div class="port_img tilt">
                            <a href="{{ route('portfolioView') }}"><img src="{{ URL::asset('public/frontend/assets/images/portfolio_img_4.jpg') }}" alt="img" class="img-fluid"></a>
                        </div>
                        <a  class="exp" href="{{ route('portfolioView') }}"><span class="exp_inner"><span class="exp_hover">Explore</span></span></a>
                        <div class="port_text">
                            <a href="{{ route('portfolioView') }}"><h3 class="port_title">Restaurant <br> In Chinatown </h3></a>
                            <p class="catagory">- <a href="#">branding,</a> <a href="#">web design</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 portfolio_single_item wow fadeInUp">
                    <div class="portfolio_item">
                        <div class="port_img tilt">
                            <a href="{{ route('portfolioView') }}"><img src="{{ URL::asset('public/frontend/assets/images/portfolio_img_3.jpg') }}" alt="img" class="img-fluid"></a>
                        </div>
                        <a  class="exp" href="{{ route('portfolioView') }}"><span class="exp_inner"><span class="exp_hover">Explore</span></span></a>
                        <div class="port_text">
                            <a href="{{ route('portfolioView') }}"><h3 class="port_title">Jon Smith  <br> Recipe Blog</h3></a>
                            <p class="catagory">- <a href="#">branding,</a> <a href="#">web design</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 portfolio_single_item portfolio_cus wow fadeInUp">
                    <div class="portfolio_item">
                        <div class="port_img tilt">
                            <a href="{{ route('portfolioView') }}"><img src="{{ URL::asset('public/frontend/assets/images/portfolio_img_6.jpg') }}" alt="img" class="img-fluid"></a>
                        </div>
                        <a  class="exp" href="{{ route('portfolioView') }}"><span class="exp_inner"><span class="exp_hover">Explore</span></span></a>
                        <div class="port_text">
                            <a href="{{ route('portfolioView') }}"><h3 class="port_title">Real Estate <br> Project in NYC</h3></a>
                            <p class="catagory">- <a href="#">branding,</a> <a href="#">web design</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 portfolio_single_item wow fadeInUp">
                    <div class="portfolio_item">
                        <div class="port_img tilt">
                            <a href="{{ route('portfolioView') }}"><img src="{{ URL::asset('public/frontend/assets/images/portfolio_img_5.jpg') }}" alt="img" class="img-fluid"></a>
                        </div>
                        <a  class="exp" href="{{ route('portfolioView') }}"><span class="exp_inner"><span class="exp_hover">Explore</span></span></a>
                        <div class="port_text">
                            <a href="{{ route('portfolioView') }}"><h3 class="port_title">Mark’s <br> Home Service</h3></a>
                            <p class="catagory">- <a href="#">branding,</a> <a href="#">web design</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end portfolio_warp -->
@endsection

@section('extrascript')
@endsection