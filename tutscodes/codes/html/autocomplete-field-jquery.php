jQuery(document).ready(function(){
  jQuery(".cmacfield").on("keyup change", function() { 		
    var searchfield = jQuery(this);
    var keyword = searchfield.val().toLowerCase();
    if(keyword.length >= 3) {
      jQuery('.cmac-suggestions').show();
      jQuery(".cmac-suggestions ul li").hide();
      jQuery(".cmac-suggestions ul li").filter(function() {
        var filtervalue = jQuery(this).text().toLowerCase().indexOf(keyword) > -1;
        if (filtervalue) {
          jQuery(this).toggle(filtervalue);  
        }
      });
    } else {
      jQuery('.cmac-suggestions').hide(); 
    }
  });
});