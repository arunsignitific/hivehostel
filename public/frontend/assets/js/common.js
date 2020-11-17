// $("li.menulist").click(function () {
//         var id = $(this).attr("class");

//         $('.' + id).siblings().find(".active").removeClass("active");
//             //                       ^ you forgot this
//         $('.' + id).addClass("active");
//         localStorage.setItem("menulist", id);
//     });

//     var selectedolditem = localStorage.getItem('menulist');

//     if (selectedolditem != null) {
//         $('.' + selectedolditem).siblings().find(".active").removeClass("active");
//         //                                        ^ you forgot this
//         $('.' + selectedolditem).addClass("active");
//     }
// $('li.menulist').each(function(){
//     if(window.location.href.indexOf($(this).find('a:first').attr('href'))>-1)
//     {
//     $(this).addClass('active').siblings().removeClass('active');
//     }
// });
if($(window).width() >= 992){


$(window).scroll(function() {
  var header = $(document).scrollTop();
  var headerHeight = $(".header").outerHeight();
  // var firstSection = $(".main-content section:nth-of-type(1)").outerHeight();
  if (header > headerHeight) {
    $("body").addClass("fixed");
  } else {
    $("body").removeClass("fixed");
  }
  // if (header > firstSection) {
  //   $(".header").addClass("in-view");
  // } else {
  //   $(".header").removeClass("in-view");
  // }
});

};
$( document ).ready(function() {

/*plus-minus*/

 $('.minus-one').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
      });
      $('.plus-one').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
      });

/*plus-minus-end*/

  // $('.main-sublocation-wrapper,.loc-screen ').addClass("show");
  $('.location-search').click(function(){
         $('.main-sublocation-wrapper,.loc-screen ').addClass("show");
    });
     document.addEventListener('click', function(e){
                // console.log(e.target)
                if(e.target.className == 'loc-screen show'){
                  $('.main-sublocation-wrapper').removeClass("show");
                  $('.loc-screen').removeClass("show");
                  $('.location-search-pop-wrapper').removeClass("show");
                  $('.sublocation-old-popup').show();
                  $('.loc-error, .loc-error-addr').hide();
                }
              })
            });

$('.cart').click(function(){
         $('.cart-screen').addClass("show");
         $('.li-cart-summary-wrapper').addClass("show");
          e.stopPropagation(); 
    });
$('.li-cart-header .close').click(function(){
         $('.cart-screen').removeClass("show");
         $('.li-cart-summary-wrapper').removeClass("show");
    });

document.addEventListener('click', function(e){
                // console.log(e.target)
                if(e.target.className == 'cart-screen show'){
                  $('.cart-screen').removeClass("show");
                  $('.li-cart-summary-wrapper').removeClass("show");
                }
 });

 $(".humburger-menu").on('click', function(e){
    $('.menubar').toggleClass('mobmenushow')
});





$(".modeDropdown").click(function(e){
    e.stopPropagation(); 
});

$('.dropmenu').on('click', function(){
	// alert(111);
	$(this).next('.user-dropdown').toggle();
});


$('.dropmenu').on('click', function(){
  // alert(111);
  $(this).next('.user-dropdown').toggle();
});

// $('.item-available .close').click(function(){

//  // var $input = $(this).parent().find('input');
//  $(this).parent().find('li').addClass('hide')
// });

/*adresradio*/
$('li .radiobox').on('click', function(){
  $(".li-address-container .address-block").removeClass('selected');
  $(this).parent('li').addClass('selected');
});


/*adress=form*/
$('.editaddfun').on('click', function(){
$('.adressmapblock').addClass('show');
$('.addr-form-back')

});

$('.addr-form-back').on('click', function(){
$('.adressmapblock').removeClass('show');

});

  
$(document).ready(function() {
  var formFields = $('.form-field');
  
  formFields.each(function() {
    var field = $(this);
    var input = field.find('input');
    var label = field.find('label');
    
    function checkInput() {
      var valueLength = input.val().length;
      
      if (valueLength > 0 ) {
        label.addClass('freeze')
      } else {
            label.removeClass('freeze')
      }
    }
    
    input.change(function() {
      checkInput()
    })
  });
});
/*form-end*/

/*dropdown-custom*/
$('.slots-selector').on('click', function(){
$('.slots-layout').toggleClass('show');
$('.slots-selector').toggleClass('up');
$('.slots-screen-bg').show();
 $('.slots-screen-bg,.cancel-slot,.cancel').on('click', function(){
$('.slots-layout').removeClass('show');
$('.slots-selector').removeClass('up');
$('.slots-screen-bg').hide();
 });
});

/*dropdown-custom-end*/


AOS.init({
  duration: 1200,
})
