@extends('frontend/common/webmaster')
@section('title',"404 Error page - Doors Studio")

@section('linkfile')
<style>
.client_wrap {
    padding: 10px 0;
    background: #fff;
    position: relative;
    z-index: 10;
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
                    <h1 class="banner_title">404: Page not found</h1>
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

<!-- start capabiliti_wrap -->
<section class="client_wrap">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="client_single_item text-center wow fadeInUp" style="margin-bottom: 0px;">
                    <img src="{{ URL::asset('public/frontend/assets/images/doors404.jpg') }}" alt="icon">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end capabiliti_wrap -->
@endsection

@section('content')
@endsection

@section('extrascript')
@endsection