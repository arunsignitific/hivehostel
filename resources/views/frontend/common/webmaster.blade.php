<!DOCTYPE html>
<html lang="en">

<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
    content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,width=device-width,user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title')</title>
  <link href="{{ URL::asset('public/frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('public/frontend/assets/css/aos.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('public/frontend/assets/fonts/stylesheet.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/assets/fonts/stylesheet.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/frontend/assets/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('public/frontend/assets/css/slick-theme.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('public/frontend/assets/css/slick.css') }}">
  <link href="{{ URL::asset('public/frontend/assets/css/aos.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('public/frontend/assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('public/frontend/assets/css/mobile.css') }}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

   @section('linkfile')
    @show
<style type="text/css">

  .prising-data{ text-align: center; background: #f2f2f2; padding: 10px; margin: 15px 0px; }

  .sticky {display: none;}



</style>

    <link href="lightgallery/dist/css/lightgallery.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>

</head> 

<body>
  <header class="header">
     <div class="topnav">
        <div class="container-fluid">
          <div class="row">
            <div class="col">
                <img class="humburger-menu" src="{{ URL::asset('public/frontend/assets/images/hamburger_new.svg') }}" data-name="Hamburger">
              <div class="logo">
                <a href="{{route('index')}}">
                  <img src="{{ URL::asset('public/frontend/assets/images/logo.png') }}" alt="Logo" class="logoimg">
                </a>
              </div>
            </div>
            <div class="col socialicon">
                <div class="right-socialicon">
                 <!--  <div class="languageselect">
                      <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown"><label>En</label>
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="#">DE</a></li>
                          <li><a href="#">IT</a></li>
                          <li><a href="#">FR</a></li>
                        </ul>
                      </div> 
                  </div> -->
                  <ul>
                    
                     <!-- <li><a href="javascript:;"><img src="{{ URL::asset('public/frontend/assets/images/blog.png') }}"></a></li>
                     <li><a href="javascript:;"><img src="{{ URL::asset('public/frontend/assets/images/social-hub.svg') }}"></a></li> -->
                   <li><a href="https://instagram.com/thehivehostels"><img src="{{ URL::asset('public/frontend/assets/images/instagram.svg') }}"></a></li>
                     <li><a href="https://www.facebook.com/thehivehostels"><img src="{{ URL::asset('public/frontend/assets/images/fb.svg') }}"></a></li>
                    <!--  <li><a href="javascript:;"><img src="{{ URL::asset('public/frontend/assets/images/flickr.svg') }}"></a></li>
                     <li><a href="javascript:;"><img src="{{ URL::asset('public/frontend/assets/images/pinterest.svg') }}"></a></li>
                     <li><a href="javascript:;"><img src="{{ URL::asset('public/frontend/assets/images/yt.svg') }}"></a></li> -->
                     <!-- <li><a href="javascript:;"><img src="{{ URL::asset('public/frontend/assets/images/in.svg') }}"></a></li> -->
                  </ul>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="menubar">
          <div class="container-fluid">
              <div class="menumain">
                 <ul>
                <!--  <li><a href="javascript:;">Why Us?</a></li> -->
                <li style="float: left; "><div class="sticky"><a href="{{route('index')}}"><img style="width: 60%; margin-top: -16px;" src="{{url('/public/frontend/assets')}}/images/white-logo1.png"></a></div></li>
                   <li><a href="{{route('index')}}">Home</a></li>
                   <li><a href="{{route('about')}}">About Us </a></li>
                <!--    <li><a href="#">Why Us</a></li> -->
                   <li><a href="{{route('team')}}">Our Team</a></li>
                   <li><a href="{{url('/listing')}}">Hostels</a></li>
                   <!-- <li><a href="#">Gallery</a></li> -->
                   <li><a href="{{route('contact')}}">Contact Us</a></li>
                 <!--   <li><a href="#">Wanna Join Us</a></li> -->
                 </ul>
              </div>
           </div>
      </div>
  </header>




<!-- ///////////////// -->





<!-- ////////////////////// -->




    @section('content')
    @show

@if (session()->has('success'))
    <script>
      
      alert('@if (session()->has('error')){{ session('error') }}@endif @if (session()->has('success')){{ session('success') }} @endif')
    </script>
 @endif

  <section class="contactblock">
     <div class="container">
       <div class="contactinner">
            <h3 class="common-headingh3 text-center mb0">All Sets?</h3>
            <h1 class="common-headinghmain text-center">Let's Connect!</h1>
            <div class="row">
               <div class="col-md-6">
                 <div class="conatcform">
                    <form method="post"  action="{{url('/contact-us/send')}}">
                      @csrf
                         <div class="form-field">
                          <input type="text" name="name" class="form-control">
                          <label for="first_name"> Name</label>
                        </div>
                        <div class="form-field">
                          <input type="text" name="email" class="form-control">
                          <label for="first_name"> Email</label>
                        </div>
                        <div class="form-field">
                          <input type="text" name="phone" class="form-control">
                          <label for="first_name"> Mobile</label>
                        </div>
                        <div class="form-field">
                         <textarea name="message" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <button class="btn btn-submit">Send</button>
                    </form>
                 </div>
               </div>
               <div class="col-md-6">
                 <div class="rightcontactblock">
                   <div class="commonphone">
                    <img src="{{ URL::asset('public/frontend/assets/images/phone.png') }}">
                    <div class="phonetext">
                       <h4>Phone No.</h4>
                       <h2>1800-102-5252</h2>
                    </div>
                   </div>
                   <div class="commonphone">
                    <img src="{{ URL::asset('public/frontend/assets/images/paper-plane.png') }}">
                    <div class="phonetext">
                       <h4>Email Address</h4>
                       <h5>hello@hivahotels.com</h5>
                    </div>
                   </div>
                   <div class="commonphone">
                    <img src="{{ URL::asset('public/frontend/assets/images/adress.png') }}">
                    <div class="phonetext">
                       <h4>Address</h4>
                       <h5>752, ATG@231NC,6rd floorcity Center mall, Bandra-492001</h5>
                    </div>
                   </div>
                 </div>
 
               </div>
            </div>
       </div>
 
     </div>
  </section>


 <style type="text/css">
    .review-slider{ position: relative !important;  }
    .eapps-link{ position: absolute !important; }
    .eapps-remove-link{ display: none !important; }
  </style>
 
  <section class="messy-section">
   <div class="container-fluid">
      <div class="client-review-sec">
        <div class="headin-sec">
          <h3>#LifeAtHive</h3>
            <p>Life is beautiful when you spend it at a place which is full of energy, positivity and services that set it apart from others, #LifeAtHive is just like that. 
                 Your new happy place is just a click away, let's connect.
</p>
        </div>
        <div class="review-slider">

<div class="elfsight-app-8f9c259d-ef7f-4316-948c-0cd5b11ad23d"></div>
        </div>
      </div>
   </div>
  </section>






  <footer class="common-footer">
    <div class="footer-inner">
      <div class="container-fluid">
        
        <div class="footercommonblock">
           <div class="fotterlogo-sec">
            <a href="home.html"><img src="{{ URL::asset('public/frontend/assets/images/white-logo.png') }}"></a>
          </div> 
        </div>
        <div class="footercommonblock">
           <div class="usefullink">
              <h3 class="fottercommonheading">Useful Links</h3>
               <ul class="commonlist-sec"> 

                 <li><a href="{{route('about')}}">About Us</a></li>
                <!--  <li><a href="javascript:;">Why Us?</a></li> -->
                 <li><a href="{{route('team')}}">Our Team</a></li>
                 <li><a href="{{route('listing')}}">Hostels</a></li>
                 <li><a href="{{route('contact')}}">Contact Us</a></li>
               </ul>
              <!--  <ul class="commonlist-sec">
                 <li><a href="javascript:;">Our Hostels</a></li>
                 <li><a href="javascript:;">FAQ</a></li>
                 <li><a href="javascript:;">Gallery</a></li>
                 <li><a href="javascript:;">Join Us</a></li>
               </ul> -->
             </div>
        </div>
         <div class="footercommonblock">
              <div class="usefullink">
              <h3 class="fottercommonheading">Location</h3>
               <ul class="commonlist-sec">
                 <li><a href="javascript:;">Mumbai</a></li>
                 <li><a href="javascript:;">Pune</a></li>
                 <li><a href="javascript:;">Delhi</a></li>
                 <li><a href="javascript:;">Dehradun</a></li>
                 <li><a href="javascript:;">Noida</a></li>
                 <li><a href="javascript:;">Greater Noida</a></li>
               </ul>
             </div>
         </div>
         <div class="footercommonblock">
            <div class="usefullink">
                  <h3 class="fottercommonheading">Contact Us</h3>
                   <address class="adress-block">
                     <p>752, ATG@231NC, 6rd floorcity Center mall, Bandra-492001</p>
                     <p>1800-102-5252</p>
                     <p>hello@hivahotels.com</p>
                   </address>
             </div>
         </div>
      </div>
      
    </div>
    <div class="copyright-block">
       <div class="container-fluid">
          <div class="copyrightinner">
            <div class="row">
                 <div class="col-sm-5">
                  <p>copyright 2020 Hive Hostel</p>
                </div>
                <div class="col-sm-7">
                  <p class="copyrightdesign">Designed by <a href="https://www.doorsstudio.com/" target="_blank"><img src="{{ URL::asset('public/frontend/assets/images/bottom-logo.png') }}"></a></p>
                </div>
          </div>
          </div>
       </div>
    </div>
  </footer>
<!-- login-modal -->
<!-- The Modal -->
    <div class="modal loginmodal commonmodal" id="loginmodal" >
      <div class="modal-dialog ">
        <div class="modal-content bgimgmodal">
           <div class="white-bgmodal">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Sign In / Sign Up</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
             <div class="mobliform-box">
              <form class="otpfrom">
                  <div class="form-grop">
                   <label class="modal_label">Enter Mobile Number</label>
                     <input class="form-control" type="text" value="99898980808">
                   </div>
                   <div class="login-buttonblock">
                    <button class="btn btn-login disable" type="button">Login</button>
                  </div>
                  <p class="signtext">By signing in you agree to our <a href="terms-condition.html">terms and conditions</a></p>
               </form>
              <form class="noform" style="display:none">
                  <div class="form-grop">
                   <label class="modal_label">Enter Mobile Number</label>
                   <div class="modaledit_input">
                     <input class="form-control" type="text" value="99898980808">
                     <a href="javascript:;" class="edittextmodal">Edit</a>
                   </div>
                  </div>
                  <ul class="nav nav-tab modalnav">
                    <li><a data-toggle="tab" href="#otp" class="active">OTP</a></li>
                    <li><a data-toggle="tab" href="#phone">Password Login</a></li>
                  </ul>

                  <div class="tab-content">
                    <div id="otp" class="tab-pane fade show active">
                      <div class="form-grop">
                         <label class="modal_label">Enter OTP</label>
                         <div class="modaledit_input">
                           <input class="form-control" type="text" value="112121">
                           <a href="javascript:;" class="edittextmodal">Resend OTP</a>
                         </div>
                        </div>
                    </div>
                    <div id="phone" class="tab-pane fade ">
                      <div class="form-grop">
                       <label class="modal_label">Enter Password</label>
                         <input class="form-control" type="password" value="asfsf">
                      </div>
                    </div>
                  </div>
                   <div class="login-buttonblock">
                      <button class="btn btn-login" type="button">Login</button>
                  </div>
                  <p class="signtext">By signing in you agree to our <a href="terms-condition.html">terms and conditions</a></p>
               </form>

               
             </div>
          </div>
          <div>
        </div>
      </div>
     </div>
    </div>
  </div>

<!-- login-modal-end -->










<!-- eof #canvas -->
<div class="opensideZContact"><img src="https://www.doorsstudio.com/images/quickenquiry.png" width="57" height="240" alt="quick enquiry for seo &amp; website design development"></div>
<div class="sideZContact">
<ul>
<li> <h6 style="color: white; margin-bottom: 10px; margin-top: 10px;">Quick Enquiry</h6></li>
<li> <div class="closesideZContact" style="color: white; flex: right;">x</div></li>
</ul>


<div id="divRSV">
<form name="frmEnquiryleft" id="frmEnquiryleft" method="post" action="{{url('/contact-us/send')}}">

  @csrf
  <input name="name" id="nameL" type="text" value="Name*" onblur="if (this.value == '') {this.value = 'Name*';}" onfocus="if (this.value == 'Name*') {this.value = '';}" class="inp" maxlength="75" >
  <input name="email" id="emailL" type="text" class="inp" onblur="if (this.value == '') {this.value = 'Email*';}" onfocus="if (this.value == 'Email*') {this.value = '';}" value="Email*" maxlength="75" ps-email-field-id="3bbd4ea7-741b-45db-abe1-5ee2e63537c7" >
  <input name="phone" id="phoneL" type="text" class="inp" onblur="if (this.value == '') {this.value = 'Phone*';}" onfocus="if (this.value == 'Phone*') {this.value = '';}" maxlength="16" value="Phone*">
  <input name="city" id="cityL" type="text" class="inp" onblur="if (this.value == '') {this.value = 'city*';}" onfocus="if (this.value == 'city*') {this.value = '';}" maxlength="16" value="City*" >
  <textarea name="message" id="message" class="inp" onblur="if (this.value == '') {this.value = 'Message*';}" onfocus="if (this.value == 'Message*') {this.value = '';}" >Message*</textarea>
  <div id="divRSVLoader">
    <input  type="submit" value="submit" class="btn btn-yellow">
  </div>
</form>
<script>

$(document).ready( function(){


var stickyOffset = $('.sticky').offset().top;

$(window).scroll(function(){

  var sticky = $('.sticky'),
      scroll = $(window).scrollTop();

  if (scroll >= 250) sticky.css('display','block');
  else sticky.css('display','none');
});




$('#frmEnquiryleft').submit( function(){

$.ajax({
url: "sendemail",
type: "POST",
data:$("#frmEnquiryleft input").serialize(),//only input
cache: false,
success: function(html){
alert('Thank You for showing interest in our services. Our executive will get in touch with you soon.');
location.reload();
}
});
})
})
</script>
</div>
</div>
<script>

$(".closesideZContact").click(function () {

$('.sideZContact').animate({right: "-310"}, 500, function(){$('.opensideZContact').animate({right: "0"}, 300);});
});

$(".opensideZContact").click(function () {

$('.opensideZContact').animate({right: "-60"}, 300, function(){$('.sideZContact').animate({right: "0"}, 500);});


});
</script>
<style>
.sideZContact ul li{ display: inline-block; }
.sideZContact ul li:last-child{    float: right;
background: white;
width: 30px;
height: 30px;
border-radius: 50%;
cursor: pointer;
}
.opensideZContact img{ height: 160px; }
.closesideZContact{color: black !important; font-size: 23px;
padding-left: 9px;}
.sideZContact {
position: fixed;
right: -310px;
top: 50%;
z-index: 10;
margin: -150px 0 0 0;
width: 300px;
padding: 10px;
background: rgba(0, 0, 0, 0.6);
border-radius: 5px;
}
#frmEnquiryleft input{ height: 40px !important; width: 100% !important; margin-bottom: 10px;  padding: 0px 15px;}
#frmEnquiryleft textarea{ height: 40px !important; width: 100% !important; margin-bottom: 10px; padding: 0px 15px; }
#frmEnquiryleft button{ height: 40px !important; width: 100% !important; }
.opensideZContact {
position: fixed;
right: 0;
top: 50%;
z-index: 10;
margin: -100px -5px 0 0px;
width: 40px;
padding: 0;
}
</style>










  <script src="{{ URL::asset('public/frontend/assets/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ URL::asset('public/frontend/assets/js/popper.min.js') }}"></script>
  <script src="{{ URL::asset('public/frontend/assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('public/frontend/assets/js/slick.min.js') }}"></script>
  <script src="{{ URL::asset('public/frontend/assets/js/aos.js') }}"></script>
  <script src="{{ URL::asset('public/frontend/assets/js/common.js') }}"></script>

  <script>
$( document ).ready(function(){

  $('.banner-slider').slick({
      dots: true,
      infinite: true,
      speed: 2000,
     autoplay: true,
     autoplaySpeed: 2000,
     arrows:false,
     });

   $('.orderslide').css("display", "block");
    $('.orderslide').slick({
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 2000,
      arrows:false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows:false,
             autoplay: true,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        }
      ]
    });
/*best-selleing-Start*/
$('.bottomslider').slick({
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows:false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        }
      ]
    });

/*best-selleing-End*/
/*post-slider-start*/
$('.sliderreview').slick({
      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows:false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        }
      ]
    });
$('.catslider').slick({
      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows:false,
      responsive: [
      {
          breakpoint: 1280,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: true,
          }
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        }
      ]
    });

      });



  </script>

</body>

</html>  