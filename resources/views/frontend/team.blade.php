@extends('frontend/common/webmaster')
@section('title',"Doors Studio - Our Clients")




@section('content')
<!-- start hero_warp -->
<main class="main-content ">




<section class="contactblock">
     <div class="container">
       <div class="contactinner">
        <!--  -->
 <h1 class=" text-center mb0">Meet the
Team</h1>
<hr style="    width: 5%;
    text-align: center;
    margin: 10px auto;
    border: 1px solid #808080d6;">
 <h1 class="common-headinghmain text-center">The Page Turners
</h1>
<p class="text-center">"We believe that there shouldn't be much of a difference between your own home and our hostel."</p>




<div class="row ">
  

  @foreach($team as $teams)
  <div class="col-md-6 team">
     <div class="team-sec">
 <div class="team-img-sec">
     <img src="{{url('/storage/app/team_members_pic/')}}/{{$teams->profile_pic}}">
    </div>
    <div class="name-sec">
      <h3 class="team-name">{{$teams->name}}</h3>
      <p>{{$teams->designation}}</p>
    </div>
</div>
</div>

@endforeach



</div>
 
     </div>
  </div></section>



  <hr style="margin-top: 0rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 2px solid rgb(250 177 11);
}">


  <style type="text/css">
    .team{ margin-bottom: 30px; }
    .team-sec ul li {
    display: inline-block;
}

.team-sec {
    margin: 3% auto;
}

.name-sec {
    text-align: center;
    padding: 0px 40px;
    line-height: 0px;
    margin: 20px;
}
.team-name {
    text-align: center;
}


.team-img-sec {
    width: 55%;
    margin: auto;
    border: 5px solid #fab10b;
    height: 350px;
}

.team-img-sec img{ width: 100%; height: 100%; margin: 0 auto; }

  </style>
</main>
@endsection

@section('extrascript')
@endsection