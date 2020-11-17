@extends('frontend/common/webmaster')
@section('title',"Contact Doors Studio for Website Design, Development, SEO, SMO, PPC & Mobile Apps Development")

@section('linkfile')
<style>
.capabiliti_wrap .capabiliti_tab_content .tab-pane .service_item .content li {
    color: #c1c1c1;
    font-weight: 300;
    font-size: 15px;
    font-family: "Poppins", sans-serif;
    line-height: 28px;
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
                    <h1 class="banner_title">CAPABILITIES</h1>
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
<!-- start capabiliti_wrap -->
<section class="capabiliti_wrap">
    <div class="bg_text" >
        <h1 class="bg_strock_text" data-parallax='{"x": 200}'>Capabilties</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <h2 class="capabiliti_title wow fadeInUp">Capabilities</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                <ul class="nav nav-tabs capabiliti_tab">
                    <li class="nav-item wow fadeInUp">
                      <a class="nav-link active" data-toggle="tab" href="#Development">Development</a>
                    </li>
                    <li class="nav-item wow fadeInUp">
                      <a class="nav-link" data-toggle="tab" href="#Marketing">Digital Marketing</a>
                    </li>
                    <li class="nav-item wow fadeInUp">
                      <a class="nav-link" data-toggle="tab" href="#Content">Content Creation</a>
                    </li>
                  <li class="nav-item wow fadeInUp">
                    <a class="nav-link" data-toggle="tab" href="#Branding">Branding and Visual Designing</a>
                  </li>
                  <li class="nav-item wow fadeInUp">
                    <a class="nav-link" data-toggle="tab" href="#Communication">Communication and Creative Strategy</a>
                  </li>
                </ul>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                <div class="tab-content capabiliti_tab_content">
                    <div class="tab-pane fade show" id="Branding">
                        {{-- <p class="tabPara">Burke what a load of rubbish young delinquent matie boy a blinding shot horse play cuppa old wind up bevvy my good sir, bugger all mate that ummm I'm telling starkers show off show.!</p> --}}
                        
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-pencil-alt"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'web-design']) }}"><h4>UI & UX DESIGN</h4></a>
                                        <p>Integrating functionality with the ‘look and feel’ of your online presence.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-vector"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'graphic-designing']) }}"><h4>Graphic Designing</h4></a>
                                        <p>Creating exclusive visual communication as per your brand.</p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-layers-alt"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'packaging-design']) }}"><h4>Packaging Design</h4></a>
                                        <p>Delivering your idea ‘custom made’</p>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-pie-chart"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'branding']) }}"><h4>Branding</h4></a>
                                        <p>Formulating a brand identity that goes a long way.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="Development">
                        {{-- <p class="tabPara">Burke what a load of rubbish young delinquent matie boy a blinding shot horse play cuppa old wind up bevvy my good sir, bugger all mate that ummm I'm telling starkers show off show.!</p> --}}
                        
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-pencil-alt"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'web-development']) }}"><h4>Website Development</h4></a>
                                        <p>An overall curation and development of your website.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-vector"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'web-application-development']) }}"><h4>Web Applications development</h4></a>
                                        <p>They are made easy with us!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-layers-alt"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'e-commerce-development']) }}"><h4>E-Commerce Development</h4></a>
                                        <p>Forging an online platform for a seamless buyer experience.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-pie-chart"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'api-integration']) }}"><h4>API Integration</h4></a>
                                        <p>Hatching an interface between data, applications, and devices that makes their interdependency smooth.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-layers-alt"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'mobile-applications']) }}"><h4>Mobile Application</h4></a>
                                        <p>When everything is available at a click, what are you waiting for?</p>
                                        <ol class="ml-4">
                                            <li>Android</li>
                                            <li>IOS</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-layers-alt"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'crm-erp']) }}"><h4>CRM & ERP</h4></a>
                                        <p>Making managing your relationships better with your consumers and employees.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="Content">
                        <p class="tabPara">“Because the magic and wonders happen ‘between the lines”</p>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-pencil-alt"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'blog-content']) }}"><h4>Blog Content</h4></a>
                                        <p>Discussing various aspects of your brand in a creative, quirky and interactive manner.</p>
                                        <ul class="ml-4">
                                            <li>PR article</li>
                                            <li>Newsletter Writing</li>
                                            <li>Article Writing</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-vector"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'seo-content']) }}"><h4>SEO Content</h4></a>
                                        <p>Your king level content should top the charts, which is our motive.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-layers-alt"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'copywriting']) }}"><h4>Copywriting</h4></a>
                                        <p>Making every word count!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-pie-chart"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'website-content']) }}"><h4>Website Content</h4></a>
                                        <p>Keeping it brief and comprehensive, we strive to make your content the face of your brand.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-pie-chart"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'video-content']) }}"><h4>Video Content</h4></a>
                                        <p>Ideating, scripting and executing brand-specific video content.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="Marketing">
                        {{-- <p class="tabPara">Burke what a load of rubbish young delinquent matie boy a blinding shot horse play cuppa old wind up bevvy my good sir, bugger all mate that ummm I'm telling starkers show off show.!</p> --}}
                        
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-pencil-alt"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'social-media-marketing']) }}"><h4>Social Media Marketing</h4></a>
                                        <p>Attaching the power of social media with your brand.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-vector"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'search-engine-optimization']) }}"><h4>SEO</h4></a>
                                        <p>Lead your website in the race of ranking on google.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-layers-alt"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'paid-marketing']) }}"><h4>Paid Marketing</h4></a>
                                        <p>A little push to your organic marketing to make it a success.</p>
                                        <ol class="ml-4">
                                            <li>Social Media Campaign</li>
                                            <li>PPC</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="Communication">
                        {{-- <p class="tabPara">Burke what a load of rubbish young delinquent matie boy a blinding shot horse play cuppa old wind up bevvy my good sir, bugger all mate that ummm I'm telling starkers show off show.!</p> --}}
                        
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-pencil-alt"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'brand-reputation']) }}"><h4>Brand Reputation</h4></a>
                                        <p>An everyday process you invest in, to later cash on!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-vector"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'brand-positioning']) }}"><h4>Brand Positioning</h4></a>
                                        <p>How you wish your brand to be defined in the industry!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="service_item">
                                    <div class="icon">
                                        <i class="ti-layers-alt"></i>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('serviceView', ['slug'=>'execution-strategy']) }}"><h4>Execution Strategy</h4></a>
                                        <p>The ultimate plan to make your brand reach where you aspire.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end capabiliti_wrap -->
@endsection

@section('extrascript')
@endsection