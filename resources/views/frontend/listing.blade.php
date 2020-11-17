@extends('frontend/common/webmaster')
@section('title',"Hostel details")

@section('content')
 
<main class="main-content ">


  <section class="navigationsec">
     <div class="container-fluid">
         <div class="top-navigation mb0">
           <a href="index.html"><span>Home</span></a>
           <a href="javascript:;"><span class="active">India</span></a>
         </div>
     </div>
</section>

<!-- <section class="listing-filter">

  <div class="filterblock">
     <div class="filterbox radioblock">

     </div>
     <div class="filterbox">
       <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">AREA
        <ul class="dropdown-menu">

          @foreach($hostel as $data)
 <li class="area_filter" id="{{$data->hostel_area}}"><a class="area"  href="javascript:void(0);">{{$data->hostel_area}}</a>
 </li>
        @endforeach
        </ul>
        </div>

        <label>Greate Noida</label>
     </div>
   
  
      <div class="filterbox">
       <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">CITY
            <ul class="dropdown-menu">

               @foreach($hostel as $data)
            <li class="city_filter" id="{{$data->city}}" ><a  class="city" id="city"  href="javascript:void(0);">{{$data->city}}</a>
              </li>

              @endforeach
            </ul>
          </div>
          <label>Mumdai</label>
     
     </div>
      <div class="filterbox">
         <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">STATE
            <ul class="dropdown-menu">
                 @foreach($hostel as $data)
            <li class="state_filter" id="{{$data->state}}" ><a  class="state" id="state" href="javascript:void(0);">{{$data->state}}</a>
              </li>

              @endforeach
            </ul>
           
          </div>
           <label>New Delhi</label>
     
     </div>

        <div class="filterbox radioblock">
       <label>GENDER</label>
       <div class="selectradio">
         <div class="inlineselect"> 
          <input id="3" type="radio" name="gender">
      <label class="custom-radio" for="3"></label>
      <span class="label-text">Boys</span></div>
         <div class="inlineselect">
          <input id="4" type="radio" name="gender">
      <label class="custom-radio" for="4"></label>
      <span class="label-text">Girl</span></div>
       </div>
     </div>
  </div>
  <input type="hidden" class="areaclass">
  <input type="hidden" class="cityclass">
  <input type="hidden" class="stateclass">
  <input type="hidden" class="gender_f">
</section> -->



 <section class="morehappy-section">
   <div class="container-fluid">
      <div class="newheadeblock noborder">
            <div class="headerleft bottomheading ">
              <h2>Places for staycation in <span>India</span></h2>
            </div>
          </div>

        <style>
          
          .productlistblock a{ color: black; text-decoration: none; }
        </style>


          <div class="productlistblock">


  @foreach($hostel as $data)

             <div class="commonproductlist" data-aos="fade-up">

              <a href="{{url('/details')}}/{{$data->id}}">
                <div class="imgblock"><img src="{{url('/')}}/storage/app/hostel-gallery/<?=$data->image_profile;?>"></div>
              </a>
                 <div class="textblock">
            <div class="heading">
            
           <a href="{{url('/details')}}/{{$data->id}}"> <h4>{{$data->name}} <p style="margin-bottom: 0px;">{{$data->hostel_area}}</p><p>{{$data->city}}</p></h4>

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





<!-- <?php

$id = $data->id;

$room_ami = json_decode($data->hostel_amenities);


foreach ($room_ami as $amin_value) {

 $amin_info = DB::table('room_amenities')
    ->where('id', '=', $amin_value)
    ->get();

foreach($amin_info as $amin){

 ?>



<label class="bottomlist"><img src="{{url('/')}}/storage/app/team_members_pic/<?=$amin->icon;?>"><?=$amin->name;?></label>


<?php
}

   
}


?> -->



 <button class="btn btn-yellow" data-toggle="modal" data-target="#myModal">Request For Booking</button>
        

                 </div>


             </div> 

@endforeach



          
          </div>


   </div>
 </section>


<script>
  
  $(document).ready( function(){

 $('.area_filter').click( function(){
  var area_name = $(this).attr('id');
  $('.areaclass').val(area_name);
  filterData();
 });

 $('.city_filter').click( function(){
  var cityclass = $(this).attr('id');
  $('.cityclass').val(cityclass);
  filterData();
 });

 $('.state_filter').click( function(){
  var stateclass = $(this).attr('id');
  $('.stateclass').val(stateclass);
  filterData();
 });


function filterData(){

var area_name = $('.areaclass').val();
var state_name = $('.cityclass').val();
var city_name = $('.stateclass').val();

var req_url = '{{url("/filter-hostels")}}';

  $.ajax({
          type: 'POST',
          url: req_url,     
          data:{
            area_value: area_name,
            state_value: state_name,
            city_value: city_name,
             "_token": "{{ csrf_token() }}",
          },
          cache: false,
          success: function(response){
            console.log(response);
/*            
var duce = jQuery.parseJSON(response);
var list_data = '';
                     $.each(duce, function(i,item) {

                      console.log(item.hostelname)

                      list_data += '<li><a href='+send_url+'/'+item.hostelid+'>'+item.hostelname+'</a></li>';
                     
                     });
$('.output_ul').html(list_data);*/
        }

 });
}

});

 </script>



<!-- ///modal//// -->


<!-- Button to Open the Modal -->


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Enquiry Form</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
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
      </div>

      <!-- Modal footer -->
  <!--     <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>


</main>

@endsection

@section('extrascript')
@endsection