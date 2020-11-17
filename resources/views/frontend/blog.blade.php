@extends('frontend/common/webmaster')
@section('title',"Doors Studio Blog | Insights about Digital Marketing")

@section('linkfile')
@endsection

@section('subheader')
<!-- start hero_warp -->
<section class="hero_warp inner_banner contact_banner">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-12 col-12">
                <div class="banner_content">
                    <h1 class="banner_title">Blog</h1>
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
    <section class="blog_wrap pd_120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="blog_content">
                        @foreach ($blogs as $data)
                        <div class="blog_single_item wow fadeInUp">
                            <div class="blog_post">
                                <div class="post_img">
                                    <a href="{{ route('blogPost', ['slug'=>$data->slug]) }}"><img src="{{ asset('storage/app/blog_pics/'.$data->header_img ) }}" alt="img"></a>
                                </div>
                                <div class="post_content">
                                    <ul class="post_info">
                                        <li><span class="author"><img src="{{ URL::asset('public/assets/media/favicon.ico') }}" alt="img"> by Doors Studio</span></li>
                                    <li class="float-right"><span class="post_time"><img src="{{ URL::asset('public/frontend/assets/images/svg/timetable.svg') }}" alt="icon">{{ date('M d, Y', strtotime($data->created_at)) }}</span></li>
                                    </ul>
                                    <h3 class="post_title"><a href="{{ route('blogPost', ['slug'=>$data->slug]) }}">{{ $data->title }}</a></h3>
                                    {{-- <p class="post_details">Filix was outstanding! I was looking for a professional to design and develop my new website for my recipe blog. I searched for long, failed to choose a suitable lne until I found Filix. I searched for long, failed to choose a suitable lne until I found Filix.</p> --}}
                                    <a href="{{ route('blogPost', ['slug'=>$data->slug]) }}" class="read_more">Explore </a>
                                </div>
                            </div>
                        </div>
                            
                        @endforeach
                    </div>
                    {{-- <div class="pagination_content wow fadeInUp">
                        <nav class="navigation">
                            <ul class="pagination text-center">
                                <li><a href="#"><i class="arrow_left"></i></a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#"><i class="arrow_right"></i></a></li>
                            </ul>
                        </nav>
                    </div> --}}

                    @if ($blogs->lastPage() > 1)
                    <div class="pagination_content wow fadeInUp">
                        <nav class="navigation">
                            <ul class="pagination text-center">
                                <li class="{{ ($blogs->currentPage() == 1) ? ' disabled' : '' }}"><a href="{{ $blogs->url(1) }}"><i class="arrow_left"></i></a></li>
                                @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                                    <li class="{{ ($blogs->currentPage() == $i) ? ' active' : '' }}">
                                        <a href="{{ $blogs->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                <li class="{{ ($blogs->currentPage() == $blogs->lastPage()) ? ' disabled' : '' }}"><a href="{{ $blogs->url($blogs->currentPage()+1) }}"><i class="arrow_right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <!-- End blog_wrap -->
@endsection

@section('extrascript')
@endsection