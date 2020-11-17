@extends('frontend/common/webmaster')
@section('title',"Doors Studio - Idea & People behind Doors Studio")

@section('linkfile')
@endsection 

@section('content')
<!-- start hero_warp -->
<main class="main-content ">


<style type="text/css">
  
  .about-section {

    box-shadow: inset 0 1px 18px #0909094d !important;
  }
</style>

  <section class="about-section" data-aos="fade-up">
     <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
               <div class="aboutleftsec" >
                 <h2>About</h2>
                 <h1>Hive Hostels</h1>
                <p>The main motto behind HIVE Hostels is that in a world where students and professionals spend hours of their time in learning and working, they deserve to stay at a place which is more than just an accommodation. We, don’t believe in compromising and to ensure that we deliver world-class shared-living experiences through our high-quality, technology-enabled, service-led housing ecosystem. We believe in providing high-end amenities and services to cater to all your needs.</p>


               </div>
           </div>
           <div class="col-md-12">
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
                         <div class="iconblock"><img src="{{ URL::asset('public/frontend/assets/images/pune-icon.png') }}"></div>
                         <label>Pune</label>
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


<hr style="    margin-top: 0rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 2px solid rgb(250 177 11);
}">







@endsection

@section('extrascript')
<script>
    $('#profileModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var name = button.data('name');
        var img = button.data('img');
        var info = button.data('info');
        var designation = button.data('designation');
        var modal = $(this);
        modal.find("#name").text(name);
        modal.find("#img").attr('src', img);
        modal.find("#info").text(info);
        modal.find("#designation").text(designation);
    });
</script>
@endsection