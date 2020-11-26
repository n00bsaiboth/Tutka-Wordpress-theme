jQuery(document).ready(function($){
                     
  /* prepend menu icon */
  $('#nav-wrap').prepend('<div id="menu-icon">Menu</div>');
	              
  /* toggle nav */
  $("#menu-icon").on("click", function(){
    $(".mobile-menu").slideToggle();
    $(this).toggleClass("active");
  });
              
});
