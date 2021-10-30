jQuery('document').ready(function($){

  // Download Template Track
  jQuery('.trackdownloads').click(function(e){
      var el = jQuery(this);
      var fileid = el.data('id');
      var filename = el.data('template');
      var newdownloadcount = el.data('downloads');
      jQuery.ajax({
          type: 'POST',
          url: LOCOBJ.ajaxurl,
          data: {
              action: 'download_counter',
              id: fileid,
              name: filename,
          },
      })
      .done(function(res){
        newdownloadcount = newdownloadcount + 1;
      jQuery('.downloadcounts').text(newdownloadcount);
        console.log("downloaded");
      })
      .fail(function(xhr){
        console.log(xhr);
      })
  });

  // hide Loader
  setTimeout(function(){ 
    jQuery('.site-loader').fadeOut();
  }, 500);
  

  // Subscription modal
  var subnl = localStorage.getItem('subnl');
  if (subnl != 'true') {
    setTimeout(function(){ 
      jQuery('#subscriptionModal').modal('show');
      jQuery('#subscribe-1').on('submit', function(){
        localStorage.setItem('subnl', true);
        setTimeout(function(){ 
          jQuery('#subscriptionModal').modal('hide');
        }, 20000);
      });
    }, 10000);
  }
  
  // Check if terms and conditions checked
  var agreetoc = localStorage.getItem('agreetocookie');
  if (agreetoc != 'true') {
    jQuery('.cookienotice-btn').on('click', function(){
      jQuery(this).parent().hide();
      localStorage.setItem('agreetocookie', true);
    });
  } else {
    jQuery('.cookienotice').hide();
  }
 
});
   
jQuery(function(){
  // Hamburger 
	jQuery('.hamburger').on('click', function(e){
    // e.preventDefault(); 
    jQuery(this).toggleClass('active');
    jQuery('.sidebar').fadeToggle();   
    jQuery('.sidebar').toggleClass('active');   
    jQuery('body').toggleClass('noscroll');   
    jQuery('body').toggleClass('sidebaractive');   
    console.log('clicked');
  });

  // Active Sidebar
	jQuery('.navbar-collapse').on('click', function(e){
		if (e.target === this) {
      e.preventDefault();	
		  jQuery('.hamburger').trigger('click');
    }
  });

});

// Hide / Show Header for Scroll 
var lastScrollTop = 0;
if (jQuery(window).width() > 991) {
  jQuery( window ).scroll(function() {
    var currentScrollTop = jQuery(this).scrollTop();
    if(lastScrollTop < currentScrollTop) {
      jQuery('.site-header').slideUp('fast');
    } else {
      jQuery('.site-header').slideDown('fast');
    }
    lastScrollTop = currentScrollTop;
  });
}
 
// Tool Tip Bootstrap
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})


