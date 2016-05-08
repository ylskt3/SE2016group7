$(document).ready(function(){

    /* menu tooltip */
    $('[data-toggle="tooltip"]').tooltip();

     /*
        Background slideshow
    */

    $('.form-container').backstretch("assets/img/8.jpg");

    /*
           Wow
       */
       new WOW().init();






});

// Search bar
$(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #search_param').val(param);
	});
});
