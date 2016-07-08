$(document).ready(function() {
    
  var owl = $("#owl-demo");
 
  owl.owlCarousel({
      
      autoPlay: 3000, //Set AutoPlay to 3 seconds
 
      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3]
      
  });
 
  // Custom Navigation Events
  $(".next").click(function(){
    owl.trigger('owl.next');
  })
  $(".prev").click(function(){
    owl.trigger('owl.prev');
  })
 
});

    
$(document).ready(function(){
    if (Modernizr.touch) {
        // show the close overlay button
        $(".close-overlay").removeClass("hidden");
        // handle the adding of hover class when clicked
        $(".img").click(function(e){
            if (!$(this).hasClass("hover")) {
                $(this).addClass("hover");
            }
        });
        // handle the closing of the overlay
        $(".close-overlay").click(function(e){
            e.preventDefault();
            e.stopPropagation();
            if ($(this).closest(".img").hasClass("hover")) {
                $(this).closest(".img").removeClass("hover");
            }
        });
    } else {
        // handle the mouseenter functionality
        $(".img").mouseenter(function(){
            $(this).addClass("hover");
        })
        // handle the mouseleave functionality
        .mouseleave(function(){
            $(this).removeClass("hover");
        });
    }
}); 


/*mouse hover zoom*/
$('.maps').click(function () {
    $('.maps iframe').css("pointer-events", "auto");
});

$( ".maps" ).mouseleave(function() {
  $('.maps iframe').css("pointer-events", "none"); 
});

/*Date Picker*/
$(function () {
    $('#datetimepicker1').datetimepicker({
        viewMode: 'years',
            format: 'DD/MM/YYYY'  
    });
});


/*Time Picker*/
$(function () {
    $('#datetimepicker3').datetimepicker({
        format: 'LT'
    });
});


//Slider
jQuery(document).ready(function(){
  $("#main-slider .carousel-indicators li:first").addClass("active");
  $("#main-slider .carousel-inner .item:first").addClass("active");
});


// Scroll to top appear when certain height
$(window).scroll(function(event){
var scroll = $(window).scrollTop();
if (scroll >= 250) {
  $(".go-top").addClass("show");
} else {
  $(".go-top").removeClass("show");
}
});

//Smooth Scrolling
$(function() {
  $('.go-top').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});



jQuery(document).ready(function($){
    // jQuery sticky Menu
	$("#main-nav").sticky({topSpacing:0});
     
});


$(document).ready(function() {
    $(".fancybox").fancybox({
        helpers : {
            title : {
                type : 'over'
            }
        }
    });
});

