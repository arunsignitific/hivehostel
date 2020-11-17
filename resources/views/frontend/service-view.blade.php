@extends('frontend/common/webmaster')
@section('title',"$service->meta_title")

@section('linkfile')
<meta name="description" content="{{ $service->meta_description }}">
<meta name="keywords" content="{{ $service->meta_keyword }}">
<style>
.hero_warp.inner_banner .banner_content .banner_title {
    font-size: 30px;
    line-height: 35px;
    margin-bottom: 0;
}

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

h3{
    color: black;
    font-size: 18px;
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
</style>
@endsection

@section('subheader')
    <!-- start hero_warp -->
    <section class="hero_warp inner_banner blog_single_banner"  style="background-image: url('{{ asset('storage/app/service_pics/'.$service->header_img) }}') ">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-12 col-12">
                    <div class="banner_content text-center">
                    <h1 class="banner_title">{{ $service->banner_heading }}</h1>
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
                            <h1 class="text-center">{{ $service->h1 }}</h1>
                            @if($service->h2)<h2 class="text-center">{{ $service->h2 }}</h2>@endif
                            {{-- <div class="blog_simg_img">
                                <img src="{{ asset('storage/app/service_pics/'.$service->header_img ) }}" class="img-fluid" alt="img">
                            </div> --}}
                        </div>
                        {!! $service->post !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End blog_wrap -->
@endsection

@section('extrascript')
@endsection