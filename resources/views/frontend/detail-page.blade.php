@extends('frontend/common/webmaster')
@section('title',"Hostel details")


@section('content')



<main class="main-content ">


<?php

//dd($hostel_detail);
?>



 <section class="topdetailbanner">
     <div class="maindetalgal imglist">
          <div class="gallery-left-sec">
             <a href="{{url('/public/frontend/assets/')}}/images/gal-1.jpg" data-fancybox="images">
              <img src="{{url('/public/frontend/assets/')}}/images/gal-1.jpg">
            </a>
          </div>
          <div class="gallery-right-sec">
           <div class="commongalsection">
             <a href="{{url('/public/frontend/assets/')}}/images/gal-2.jpg" data-fancybox="images">
                <img src="{{url('/public/frontend/assets/')}}/images/gal-2.jpg">
                </a>
           </div>
           <div class="commongalsection">
             <a href="{{url('/public/frontend/assets/')}}/images/gal-4.jpg" data-fancybox="images">
                <img src="{{url('/public/frontend/assets/')}}/images/gal-4.jpg">
                </a>
           </div>
           <div class="commongalsection">
             <a href="{{url('/public/frontend/assets/')}}/images/gal-3.jpg" data-fancybox="images">
                <img src="{{url('/public/frontend/assets/')}}/images/gal-3.jpg">
                </a>
           </div>
           <div class="commongalsection">
             <a href="{{url('/public/frontend/assets/')}}/images/gal-5.jpg" data-fancybox="images">
                <img src="{{url('/public/frontend/assets/')}}/images/gal-5.jpg">
                </a>
           </div>
          </div>
     </div>
 </section>
 
<!--  <section class="topdetailbanner">
     <div class="maindetalgal imglist">


          <div class="gallery-left-sec">
             <a href=" {{url('/')}}/storage/app/hostel-gallery/<?=$hostel_detail->image_profile;?>" data-fancybox="images">
              <img src="{{url('/')}}/storage/app/hostel-gallery/<?=$hostel_detail->image_profile;?>">
            </a>
          </div>



          <div class="gallery-right-sec">


          <?php
 

 $image_gallery =  json_decode($hostel_detail->image_gallery);

 foreach($image_gallery as $img){
?>

           <div class="commongalsection">
             <a href="{{url('/')}}/storage/app/hostel-gallery/<?=$img;?>" data-fancybox="images">
                <img src="{{url('/')}}/storage/app/hostel-gallery/<?=$img;?>">
                </a>
           </div>

           <?php

         }

          ?>


          </div>
     </div>
 </section> -->

  <section class="navigationsec">
     <div class="container-fluid">
         <div class="top-navigation mb0">
           <a href="index.html"><span>Home</span></a>
           <a href="#"><span>{{$hostel_detail->city}}</span></a>
           <a href="#"><span class="active">{{$hostel_detail->name}}</span></a>
         </div>
    
     </div>
</section>
<section class="firm-detail">
   <div class="container-fluid">
     <div class="row">
        <div class="col-sm-12">  
          <div class="newheadeblock">
            <div class="headerleft">
              <h3>About</h3>
              <h2>{{$hostel_detail->name}}</h2>
            </div>
            <h4><strong>For {{$hostel_detail->hostel_for}}</strong></h4>
          </div>
          <p class="commonpara">{!!$hostel_detail->about_hostel!!}</p>


          <div class="prising-data">
<div class="row">
  

  
  

  

  
  
  


  <div class="col-md-2"> 
    <b>No. of Rooms</b>
    <p> {{$hostel_detail->no_of_room}}<span> Nos</span></p>
  </div>

    <div class="col-md-2"> 
    <b>No. of Beds</b>
    <p> {{$hostel_detail->no_of_beds}}  <span> Nos</span></p>
  </div>

    <div class="col-md-2"> 
    <b>Price for Single</b>
    <p><span>&#x20b9; </span> {{$hostel_detail->single}}</p>
  </div>
 
    <div class="col-md-2"> 
    <b>Price for Double</b>
    <p><span>&#x20b9; </span> {{$hostel_detail->dubble}}</p>
  </div>

    <div class="col-md-2"> 
     <b>Price for Triple</b>
    <p><span>&#x20b9; </span> {{$hostel_detail->triple}}</p>
  </div>

    <div class="col-md-2"> 
    <b>Price for Quardruple</b>
    <p><span>&#x20b9; </span> {{$hostel_detail->quardruple}}</p>
  </div>

  <div class="col-md-2"></div>
</div>
          </div>
         
        </div>
     </div>
     <div class="mapsection">
      <div class="row">
           <div class="col-md-6">
               <div class="maptextblock">
                 <ul>
                  <li>{!!$hostel_detail->near_by_amenites!!}</li>
                 </ul>
               </div>
           </div>
           <div class="col-md-6">

            <div class="address">
              <p>{{$hostel_detail->address}} {{$hostel_detail->hostel_area}} </p>
              <p>{{$hostel_detail->city}} , {{$hostel_detail->state}} - {{$hostel_detail->pincode}}</p>

      

            </div>
                <div class="mapmain" style="">
  {!!$hostel_detail->location!!}
                
               </div>
           </div>
         </div>
      </div>
   </div>
</section>


<section class="roomspecial-sec">
  <div class="container-fluid">
     <h3>A ROOM AS SPECIAL AS YOU</h3>
     <p class="commonpara">Your room is designed by people who’ve experienced landing and living in a strange city, just like you.  That’s why every comfort you’ve left behind is right there waiting for y</p>
     <div class="roomspecial-inner">



<?php

$id = $hostel_detail->id;

$room_ami = json_decode($hostel_detail->hostel_amenities);


foreach ($room_ami as $amin_value) {

 $amin_info = DB::table('room_amenities')
    ->where('id', '=', $amin_value)
    ->get();

foreach($amin_info as $amin){

 ?>



   <div class="roomspecialicon">
              <div class="icon">
                <img src="{{url('/storage/app/team_members_pic/')}}/<?=$amin->icon;?>">
              </div>
              <label><p><?=$amin->name;?></p></label>
            </div>


<?php
}

   
}


?>

     </div>
  
  </div>
</section>
 <section class="morehappy-section">
   <div class="container-fluid">
      <div class="newheadeblock">
            <div class="headerleft bottomheading">
              <h2>More Happy Places like that</h2>
            </div>
            <h4><a href="javascript:;">View All</a></h4>
          </div>

          <div class="productlistblock" id="productslide">
     <style>
          
          .productlistblock a{ color: black; text-decoration: none; }
        </style>


@foreach($related as $data)
             <div class="commonproductlist">

                <div class="imgblock">

                  <a href="{{url('/details')}}/{{$data->id}}">
                  <img src="{{url('/')}}/storage/app/hostel-gallery/<?=$data->image_profile;?>">
                </a>

                </div>


                 <div class="textblock">
                     <div class="heading">

                       <a href="{{url('/details')}}/{{$data->id}}">
                      <h4>{{$data->name}} <p style="margin-bottom: 0px;">{{$data->hostel_area}}</p><p>{{$data->city}}</p></h4>
                    </a>

    <?php
if($data->hostel_for == 'boys'){
  ?>
 <label><img src="{{ URL::asset('public/frontend/assets/images/boys.jpg') }}">{{$data->hostel_for}}</label>
  <?php
}else{
   ?>
 <label><img src="{{ URL::asset('public/frontend/assets/images/birthday-girl.png') }}">{{$data->hostel_for}}</label>
  <?php
}
    ?>

                     </div>
 <button class="btn btn-yellow">Request For Booking</button>
                 </div>

                 
             </div>
          @endforeach  
          </div>
   </div>
 </section>

 
</main>

@endsection

@section('extrascript')
@endsection