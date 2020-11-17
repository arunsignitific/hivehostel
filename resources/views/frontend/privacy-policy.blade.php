@extends('frontend/common/webmaster')
@section('title',"Doors Studio - Idea & People behind Doors Studio")

@section('linkfile')
<style>
h1 {
    font-size: 30px;
    letter-spacing: 1px;
    line-height: 36px;
    text-transform: uppercase;
    padding-top: 30px;
    color: black;
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    margin: 0 0 30px 0;
}

h2 {
    font-size: 20px;
    letter-spacing: 1px;
    text-transform: uppercase;
    position: relative;
    color: black;
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    margin: 0 0 30px 0;
}

.blog_single_item:after {
    position: absolute;
    content: '';
    bottom: 0;
    left: 50%;
    width: 100px;
    margin-left: -50px;
    height: 2px;
    background: #ccc;
}

.blog_single_content .blog_single_item {
    padding-bottom: 42px;
    border-bottom: 0 solid #e6e9f1;
}
h3, p{
    color: black;
}
</style>
@endsection

@section('subheader')
<!-- start hero_warp -->
<section class="hero_warp inner_banner contact_banner">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-12 col-12">
                <div class="banner_content">
                    <h1 class="banner_title">PRIVACY POLICY</h1>
                    {{-- <p class="banner_para wow fadeInUp">We will help your brand to flourish, your business.</p> --}}
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
 <!-- start blog_wrap -->
 <section class="blog_wrap blog_single_wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="blog_content blog_single_content">
                    <div class="blog_single_item wow fadeInUp mb-5">
                        <h3 class="text-center">OUR PRIVACY POLICY</h3><br>
                        {{-- <div class="blog_simg_img">
                            <img src="{{ asset('storage/app/blog_pics/'.$service->header_img ) }}" class="img-fluid" alt="img">
                        </div> --}}
                        <p class="text-center">This website is the property of Doors Studio. The purpose of this Policy we doubt you care about is to set out the principles governing our use of personal information that we may obtain by using the website. In you have any clarifications, contact us at </p>
                    </div>
                    <h3>Security</h3><br>
                    <p>All the information shared by visitors on the website is stored securely both online and offline.
                    The data is considered confidential and is not available to anybody externally or internally.</p><br>
                    <h3>Links</h3><br>
                    <p>This website contains links to many other sites. Doors Studio is not responsible for privacy practices of these sites. This privacy statement applies only to our website</p><br>
                    <h3>Log Files</h3><br>
                    <p>These logfiles including internet protocol (IP) addresses, browser categories, internet service provider (ISP) details, referring/exit pages, platform type, date/time stamp, and number of clicks – to analyze trends, administer the site, track user's movement in the aggregate, and gather broad demographic information for aggregate use. IP addresses, etc. - are not linked to personally identifiable information.</p><br>
                    <h3>Information Sharing</h3><br>
                    <p>Any of the information about our site visitors is not sold or passed on to any third party. The only exception to this is where we are legally obligated to do so to comply with a current judicial proceeding, court order or legal process served on our Website.</p><br>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End blog_wrap -->
@endsection

@section('extrascript')
@endsection