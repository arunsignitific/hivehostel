@extends('frontend/common/webmaster')
@section('title',"Contact Doors Studio for Website Design, Development, SEO, SMO, PPC & Mobile Apps Development")

@section('linkfile')
@endsection

@section('subheader')
    <!-- start hero_warp -->
    <section class="hero_warp inner_banner contact_banner">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-12 col-12">
                    <div class="banner_content">
                        <h1 class="banner_title">Dribbble work</h1>
                        <p class="banner_para wow fadeInUp">We will help your brand to flourish, your business.</p>
                    </div>
                </div>
            </div>
        </div>
        <ul class="social_link">
            <li>
                <a href="https://twitter.com/doors_studio" target="_blank" rel="nofollow">
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-twitter"></i>
                </a>
            </li>
            <li>
                <a href="https://www.facebook.com/Doors-Studio-200419663693348/" target="_blank" rel="nofollow">
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-facebook"></i>
                </a>
            </li>
            <li>
                <a href="https://www.pinterest.com/doorsstudio/" target="_blank" rel="nofollow">
                    <i class="fa fa-pinterest-p"></i>
                    <i class="fa fa-pinterest-p"></i>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/doors_studio/" target="_blank" rel="nofollow">
                    <i class="fa fa-instagram"></i>
                    <i class="fa fa-instagram"></i>
                </a>
            </li>
            <li>
                <a href="https://www.linkedin.com/company/doors-studio?trk=nav_account_sub_nav_company_admin" target="_blank" rel="nofollow">
                    <i class="fa fa-linkedin"></i>
                    <i class="fa fa-linkedin"></i>
                </a>
            </li>
        </ul>
    </section>
    <!-- end hero_warp -->
@endsection

@section('content')
    <!-- start portfolio_single_content -->
    <section class="portfolio_single_content">
        <div class="container">
            <div class="row">
                <div class="col-lg col-sm-12 col-12">
                    <div class="project_summary">
                        <h3 class="portfolio_single_title">Project Summary</h3>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-12">
                                <ul class="project_summary_list">
                                    <li><b>Client:</b>  Adam Smith</li>
                                    <li><b>Budget:</b>  $4,000</li>
                                    <li><b>Core taskes:</b>  Web & Mobile Application</li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-12 col-12">
                                <ul class="project_summary_list">
                                    <li><b>Appointed date:</b>  12th May 2019</li>
                                    <li><b>Completion:</b>  23th October 2019</li>
                                    <li><b>Website:</b><a href="index.html"><span>www.filix.com</span><span>www.filix.com</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 single_body">
                    <h3 class="portfolio_single_title">Research</h3>
                    <p class="portfolio_para">Filix was outstanding! I was looking for a professional to design and develop my new website for my recipe blog. I searched for long, failed to choose a suitable lne until I found Filix. I searched for long, failed to choose a suitable lne until I found Filix </p>
                    <div class="row">
                        <div class="col-12">
                            <div class="portfolio_single_img">
                                <img src="{{ URL::asset('public/frontend/assets/images/port_single/portfolio_single_img_1.jpg') }}" alt="img" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <div class="portfolio_single_img mb_60">
                                <img src="{{ URL::asset('public/frontend/assets/images/port_single/portfolio_single_img_2.jpg') }}" alt="img" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="portfolio_single_img mb_60">
                                <img src="{{ URL::asset('public/frontend/assets/images/port_single/portfolio_single_img_3.jpg') }}" alt="img" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <h3 class="portfolio_single_title">Prototype</h3>
                    <p class="portfolio_para">Filix was outstanding! I was looking for a professional to design and develop my new website for my recipe blog. I searched for long, failed to choose a suitable lne until I found Filix. I searched for long, failed to choose a suitable lne until I found Filix </p>
                    <div class="row">
                        <div class="col-12">
                            <div class="portfolio_single_img mb_55">
                                <img src="{{ URL::asset('public/frontend/assets/images/port_single/portfolio_single_img_4.jpg') }}" alt="img" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <p class="portfolio_para">Filix was outstanding! I was looking for a professional to design and develop my new website for my recipe blog. I searched for long, failed to choose a suitable lne until I found Filix. I searched for long, failed to choose a suitable lne until I found Filix </p>
                </div>
            </div>
        </div>
    </section>
    <!-- end portfolio_single_content -->
@endsection

@section('extrascript')
@endsection