@extends('frontend/common/webmaster')
@section('title',"Contact Doors Studio for Website Design, Development, SEO, SMO, PPC & Mobile Apps Development")

@section('linkfile')
@endsection

@section('content')
   <main class="main-content ">

 
</main>
@endsection

@section('extrascript')
<script>
    var SITE_URL="{{ url('/') }}";
</script>
<script>
//contact form
$('#contactform').on('submit', function(e){
			e.preventDefault();
			 var form_data =$(this).serialize();	 
			var req_url=SITE_URL+'/contact-us/send';	 
			$.ajax({
					type: 'POST',
					url: req_url,
					data: form_data,
					cache: false,
					success: function(data){
						 var jObj=JSON.parse(data);
						  if(jObj.status==="success")
						 {
							 //alert(jObj.msg);
							 $(".contactmsg").text(jObj.msg);
							 $(".contactmsg").removeClass("error");
							 $(".contactmsg").addClass("success");
							 $(".contactmsg").css("display","block");
							 $("#contactform")[0].reset();
						  }else if(jObj.status==="haserror")
						 {
							 //msg="Invalid Request"; 
							  $(".contactmsg").text(jObj.msg);
							  $(".contactmsg").addClass("error");
							  $(".contactmsg").css("display","block");
							  //alert(jObj.msg);
						 }
						 setTimeout(function() {
						  $(".contactmsg").css("display","none"); }, 10000);
						 }
				});
			 
			
		});
</script>
@endsection