@extends('frontend/common/webmaster')
@section('title',"Digital Marketing, Creative Agency, Digital Agency in Delhi, Goa - Doors Studio")


@section('content')

<main class="main-content ">

 <section class="topbanner">
  <div class="slide-content">
      <h1 data-aos="fade-up" data-aos-duration="1000">Work Life or  College Life</h1>
      <h3 data-aos="fade-up" data-aos-duration="4000">Live it comfortably with HIVE</h3>  
      <div class="search-block">

<style type="text/css">
  .search_output li{ padding: 5px;  background-color: #f8f8f8; margin-bottom: 5px;}

  .search_output li a{ color: black;  }

</style>
         <form method="post" action="#">

            <div class="search-form">
              <a href="javascript:;" class="locationimg"><img src="{{ URL::asset('public/frontend/assets/images/marker.png') }}"></a>
             <input type="text" class="form-control seacrhform" id="seacrhform" name="seachicon" placeholder="Search Hostels by Area , Pincode , University">

             <a href="javascript:;" class="seachicon" id="seachicon" ><img src="{{ URL::asset('public/frontend/assets/images/search.png') }}"></a>
             <div class="search_output">
             <ul class="output_ul">
               </ul>
           </div>
            </div>
         </form>

      </div>
  </div>
 </section>
 <section class="bannerbottom-sec"> 
     <div class="container-fluid">
        <div class="bottomslider">
          <div>
            <div class="commonsmallblock"><a href="javascript:;"> <img src="{{ URL::asset('public/frontend/assets/images/icon1.png') }}"><label>24h reception</label> </a></div>
           
          </div>
            <div>
              <div class="commonsmallblock"> <a href="javascript:;"><img src="{{ URL::asset('public/frontend/assets/images/icon2.png') }}"><label>Breakfast</label> </a> </div>
            </div>
            <div>
               <div class="commonsmallblock"><a href="javascript:;"> <img src="{{ URL::asset('public/frontend/assets/images/icon3.png') }}"><label>Kitchen</label>  </a></div>
            </div>
            <div>
               <div class="commonsmallblock"><a href="javascript:;"> <img src="{{ URL::asset('public/frontend/assets/images/icon4.png') }}"><label>Laundry Facilities</label>  </a></div>
            </div>
            <div>
               <div class="commonsmallblock"><a href="javascript:;"> <img src="{{ URL::asset('public/frontend/assets/images/icon5.png') }}"><label>Lagguage Storage</label>  </a></div>
            </div>
            <div>
              
            </div>
        </div>
     </div>
 </section> 
  <section class="about-section" data-aos="fade-up">
     <div class="container-fluid">
         <div class="row">
           <div class="col-md-6">
               <div class="aboutleftsec" >
                 <h2>About</h2>
                 <h1>Hive Hostels</h1>
                <p>The main motto behind HIVE Hostels is that in a world where students and professionals spend hours of their time in learning and working, they deserve to stay at a place which is more than just an accommodation. We, don’t believe in compromising and to ensure that we deliver world-class shared-living experiences through our high-quality, technology-enabled, service-led housing ecosystem. We believe in providing high-end amenities and services to cater to all your needs.</p>


               </div>
           </div>
           <div class="col-md-6">
               <div class="aboutright">
                 <h4>Your homely stays at  a single place</h4>

                 <div class="placemain">
                  <ul>
                    <li>
                      <a href="javascript:;">
                        <div class="iconblock"><img src="{{ URL::asset('public/frontend/assets/images/mumbai-icon.png') }}"></div>
                        
                         <label>Mumbai</label>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:;">
                       <div class="iconblock">  <img src="{{ URL::asset('public/frontend/assets/images/delhi-icon.png') }}"></div>
                         <label>Delhi</label>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:;">
                        <div class="iconblock"> <img src="{{ URL::asset('public/frontend/assets/images/noida-icon.png') }}"></div>
                         <label>Noida</label>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:;">
                         <div class="iconblock"><img src="{{ URL::asset('public/frontend/assets/images/dehradun-icon.png') }}"></div>
                         <label>Dehuradun</label>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:;">
                         <div class="iconblock"><img src="{{ URL::asset('public/frontend/assets/images/gnoida-icon.png') }}"></div>
                         <label>G Noida</label>
                      </a>
                    </li>
                  </ul>
                 </div>
               </div>
           </div>
         </div>
    
     </div>
</section>



<section class="roomsecsection rightanglesec" >
  <div class="container-fluid">
  <div class="roomsecmain">
    <div class="roomsecleft">
         <img src="{{ URL::asset('public/frontend/assets/images/bed.png') }}">
    </div>
    <div class="roomsecright" > 
       <h4>Rooms set up by our</h4>
       <h2>Comfort Expert</h2>
       <p>Our Comfort Expert was once a student like you only. He never liked his hostel space and always wanted to design a hostel room that has everything a student needs. We got him on-board and made him our Comfort Expert to design your room. So, whether you are just relaxing or studying, you’ll always experience a new definition of living.</p>
       <div class="roombottomiconblock">
            <div class="comoniconblock">
              <div class="icon">
                <img src="{{ URL::asset('public/frontend/assets/images/bed-icon.png') }}">
              </div>
              <label>Bed with Mattress</label>
            </div>
            <div class="comoniconblock">
              <div class="icon">
                <img src="{{ URL::asset('public/frontend/assets/images/cupboard-icon.png') }}">
              </div>
              <label>Spacious Cupboard</label>
            </div>
            <div class="comoniconblock">
              <div class="icon">
                <img src="{{ URL::asset('public/frontend/assets/images/study-icon.png') }}">
              </div>
              <label>Study <br>Table</label>
            </div>
            <div class="comoniconblock">
              <div class="icon">
                <img src="{{ URL::asset('public/frontend/assets/images/curtion-icon.png') }}">
              </div>
              <label>Bright Curtains</label>
            </div>
       </div>
    </div>
  </div>
  </div>
</section>
<section class="roomsecsection leftanglesec">
  <div class="container-fluid">
  <div class="roomsecmain">
    <div class="roomsecright">
       <h2>#LifeAtHive</h2>
       <h4>on your screen</h4>
       <p>Whether you want to provide any feedback or just mark your attendance digitally, explore everything you need from weekly menus to deals & discounts on a single screen with ease. </p>
       <div class="roombottomiconblock">
            <div class="comoniconblock newiconblock">
              <div class="icon">
                <img src="{{ URL::asset('public/frontend/assets/images/complaint.png') }}">
              </div>
              <label>Complaint Management</label>
            </div>
            <div class="comoniconblock newiconblock">
              <div class="icon">
                <img src="{{ URL::asset('public/frontend/assets/images/offer.png') }}">
              </div>
              <label>Deals & Discounts</label>
            </div>
            <div class="comoniconblock newiconblock">
              <div class="icon">
                <img src="{{ URL::asset('public/frontend/assets/images/rating.png') }}">
              </div>
              <label>Daily Online Feedbacks</label>
            </div>
            <div class="comoniconblock newiconblock">
              <div class="icon">
                <img src="{{ URL::asset('public/frontend/assets/images/check-in-desk.png') }}">
              </div>
              <label>Digital <br>Check-Ins</label>
            </div>
       </div>
    </div>
    <div class="roomsecleft" data-aos="fade-left">
         <img src="{{ URL::asset('public/frontend/assets/images/mobile.png') }}">
    </div>
  </div>
  </div>
</section>
<section class="roomsecsection rightanglesec ouresponblock">
  <div class="container-fluid">
  <div class="roomsecmain">
    <div class="roomsecleft">
         <div class="our-res-left">
            <div class="commonresblock" data-aos="fade-up">
              <div class="circleblock">
                 <img src="{{ URL::asset('public/frontend/assets/images/dining-table.png') }}">
              </div>
              <label>Planned Dining Area</label>
            </div>
             <div class="commonresblock" data-aos="fade-up">
              <div class="circleblock">
                 <img src="{{ URL::asset('public/frontend/assets/images/tv-screen.png') }}">
              </div>
              <label>Flat Screen Television</label>
            </div>
             <div class="commonresblock" data-aos="fade-up">
              <div class="circleblock">
                 <img src="{{ URL::asset('public/frontend/assets/images/gaming.png') }}">
              </div>
              <label>Gaming Corner</label>
            </div>
         </div>
         <div class="our-res-right">
            <div class="commonresblock" data-aos="fade-up">
              <div class="circleblock">
                 <img src="{{ URL::asset('public/frontend/assets/images/appliance.png') }}">
              </div>
              <label>Appliances for Common use</label>
            </div>
             <div class="commonresblock" data-aos="fade-up">
              <div class="circleblock">
                 <img src="{{ URL::asset('public/frontend/assets/images/netflix.png') }}">
              </div>
              <label>Workout & Fitness Zone</label>
            </div>
         </div>
    </div>
    <div class="roomsecright nomargin">
       <h2>Premium Amenities </h2>
       <h4>Our responsibility</h4>
       <p>From getting in shape to playing video games for hours on the same bean bag and deforming its shape, whatever you need we are here to deliver to you. </p>
       <div class="roombottomiconblock">
            <div class="jumpimg"><img src="{{ URL::asset('public/frontend/assets/images/jump.png') }}"></div>
       </div>
    </div>
  </div>
  </div>

</section>


<section class="roomsecsection leftanglesec">
  <div class="container-fluid">
  <div class="roomsecmain">
    <div class="roomsecright">
       <h2>We are here </h2>
       <h4>for you.</h4>
       <p>Missing your home-cooked food? Want to go for a fun bicycle ride? Or searching for a pick & drop shuttle service? Everything you wished your hostel should have, now actually have them all. </p>
       <div class="roombottomiconblock mt30">
            <div class="comoniconblock newiconblock">
              <div class="icon">
                <img src="{{ URL::asset('public/frontend/assets/images/meal.png') }}">
              </div>
              <label>Delicious <br> Meals</label>
            </div>
            <div class="comoniconblock newiconblock">
              <div class="icon">
                <img src="{{ URL::asset('public/frontend/assets/images/wifi.png') }}">
              </div>
              <label>Internet Booster Packs</label>
            </div>
            <div class="comoniconblock newiconblock">
              <div class="icon">
                <img src="{{ URL::asset('public/frontend/assets/images/security-guard.png') }}">
              </div>
              <label>24*7 <br>Security</label>
            </div>
            <div class="comoniconblock newiconblock">
              <div class="icon">
                <img src="{{ URL::asset('public/frontend/assets/images/washing-machine.png') }}">
              </div>
              <label>Laundry<br>Service </label>
            </div>
       </div>
    </div>
    <div class="roomsecleft">
         <img src="{{ URL::asset('public/frontend/assets/images/like.png') }}">
    </div>
  </div>
  </div>
</section> 

</main>




<script>
  
  $(document).ready( function(){



 $('#seacrhform').keyup( function(){


var req_url = '{{url("/search-hostels")}}';
var send_url = '{{url("/details")}}';

var form_data = $("#seacrhform").val();
  $.ajax({
          type: 'POST',
          url: req_url,
     
          data:{
            value: $('#seacrhform').val(),
             "_token": "{{ csrf_token() }}",
          },
          cache: false,
          success: function(response){
var duce = jQuery.parseJSON(response);
var list_data = '';
                     $.each(duce, function(i,item) {

                      console.log(item.hostelname)

                      list_data += '<li><a href='+send_url+'/'+item.hostelid+'>'+item.hostelname+'</a></li>';
                     
                     });
$('.output_ul').html(list_data);
        }

 })

  })


 $('#seachicon').click( function(){

var req_url = '{{url("/search-hostels")}}';
var send_url = '{{url("/details")}}';

var form_data = $("#seacrhform").val();
  $.ajax({
          type: 'POST',
          url: req_url,
     
          data:{
            value: $('#seacrhform').val(),
             "_token": "{{ csrf_token() }}",
          },
          cache: false,
          success: function(response){
var duce = jQuery.parseJSON(response);
var list_data = '';
                     $.each(duce, function(i,item) {

                      console.log(item.hostelname)

                      list_data += '<li><a href='+send_url+'/'+item.hostelid+'>'+item.hostelname+'</a></li>';
                     
                     });
$('.output_ul').html(list_data);
        }

 })

  })

 })
</script>

@endsection

@section('extrascript')

@endsection