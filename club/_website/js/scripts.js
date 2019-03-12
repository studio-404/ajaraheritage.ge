

$(document).ready(function(){

	$('#myCarousel').carousel({
        interval: 4000
    });
    // handles the carousel thumbnails
    $('[id^=carousel-selector-]').click( function(){
      var id_selector = $(this).attr("id");
      var id = id_selector.substr(id_selector.length -1);
      id = parseInt(id);
      $('#myCarousel').carousel(id);
      $('[id^=carousel-selector-]').removeClass('selected');
      $(this).addClass('selected');
    });

    // when the carousel slides, auto update
    $('#myCarousel').on('slid', function (e) {
      var id = $('.item.active').data('slide-number');
      id = parseInt(id);
      $('[id^=carousel-selector-]').removeClass('selected');
      $('[id=carousel-selector-'+id+']').addClass('selected');
    });
});




$(function() {
    $(".ScrollTop").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

    if (document.documentElement.clientWidth > 992) {
        $('.LangPicker').selectpicker({});
    }    
});



function initMap() {
    var myLatLng = {lat:41.6345337, lng: 41.6163557};

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 17,
      center: myLatLng
    });

    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      //title: 'Hello World!'
    });
}





/*
Responsive Menu
*/
$(document).ready(function () {
    var trigger = $('.hamburger'),
        overlay = $('.overlay'),
       isClosed = false;

    function buttonSwitch() {
      
        if (isClosed === true) {
            overlay.hide();
            trigger.removeClass('is-open');
            trigger.addClass('is-closed');
            isClosed = false;
        } else {
            overlay.show();
            trigger.removeClass('is-closed');
            trigger.addClass('is-open');
            isClosed = true;
        }
    }

    trigger.click(function () {
        buttonSwitch();
    });

    $('[data-toggle="offcanvas"]').click(function () {
        $('#MainMenu').toggleClass('toggled');
    });

 


  $('.hamburger').click(function(){
        $('body').toggleClass('ShowMenuFull'); 
  });


  $('.fa-search').on('hover, mouseover', function() {
      $('.SearcHoverDiv input').focus();
  });


});

$(document).ready(function(){
    $(".fancybox").fancybox({
        
    });


    $('.HomePartnersSlide').slick({
        infinite: true,
        slidesToShow: 8,
        slidesToScroll: 1,
        prevArrow: $('.PartArrows .PartLeftArrow'),
        nextArrow: $('.PartArrows .PartRightArrow'),
		responsive: [
			{
			  breakpoint: 1024,
			  settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
				infinite: false,
				dots: false
			  }
			}
		  ]
    });

    //$("#LoginModal").modal()


     

});

$(function() {
    var $radioButtons = $('.AjaraRadio');
    $radioButtons.click(function() {
        $radioButtons.each(function() {
            $(this).parent().parent().parent().toggleClass('active', this.checked);
        });
    });
});