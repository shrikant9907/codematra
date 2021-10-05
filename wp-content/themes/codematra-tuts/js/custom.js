jQuery('document').ready(function(){

  // Check if terms and conditions checked
  var agreetoc = localStorage.getItem('agreetocookie');
  if (agreetoc != 'true') {
    console.log('agreetoc', agreetoc);
    jQuery('.cookienotice-btn').on('click', function(){
      jQuery(this).parent().hide();
      localStorage.setItem('agreetocookie', true);
    });
  } else {
    jQuery('.cookienotice').hide();
  }
  
  // Used On Home page
	jQuery('.four_col_carosusel').slick({
		infinite: true,
		autoplay: true,
		autoSlide: true,
		speed: 300,
		slidesToShow: 5,
		slidesToScroll: 1,
		responsive: [ 
		{
		  breakpoint: 1024,
		  settings: {
		    slidesToShow: 4,
		    slidesToScroll: 4,
		    infinite: true,
		  }
		},
		{
		  breakpoint: 600,
		  settings: {
		    slidesToShow: 2,
		    slidesToScroll: 2
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
		    slidesToShow: 1,
		    slidesToScroll: 1
		  }
		}
		]
	});

});
   
jQuery(window).scroll(function() {    
  if (jQuery(window).width() > 767) {
    var scroll = jQuery(window).scrollTop();
    if (scroll >= 400) {
      jQuery("body").addClass("scrolled");
    } else {
      jQuery("body").removeClass("scrolled");
    }
	}  
});  