
jQuery(document).ready(function() {

    /* Wechat toggle function */

       $("#QRcode").hide();
       $("#wechat").click(function(){
       $("#QRcode").slideToggle("slow");
     });

    /* Wow */
    new WOW().init();

     /* menu tooltip */
    $('[data-toggle="tooltip"]').tooltip();

    /*
	    Contact form
	*/
	$('.c-form-box form').submit(function(e) {
		e.preventDefault();
		var this_form_parent = $(this).parents('.c-form-box');
	    var postdata = $(this).serialize();
	    $.ajax({
	        type: 'POST',
	        url: 'assets/contact.php',
	        data: postdata,
	        dataType: 'json',
	        success: function(json) {

	        	$('.c-form-box form label[for="c-form-name"] .contact-error').fadeOut('fast', function(){
	        		if(json.nameMessage != '') {
		                $(this).html('(' + json.nameMessage + ')').fadeIn('fast');
		            }
	        	});
	            $('.c-form-box form label[for="c-form-email"] .contact-error').fadeOut('fast', function(){
	        		if(json.emailMessage != '') {
		                $(this).html('(' + json.emailMessage + ')').fadeIn('fast');
		            }
	        	});
	        	$('.c-form-box form label[for="c-form-subject"] .contact-error').fadeOut('fast', function(){
	        		if(json.subjectMessage != '') {
		                $(this).html('(' + json.subjectMessage + ')').fadeIn('fast');
		            }
	        	});
	        	$('.c-form-box form label[for="c-form-message"] .contact-error').fadeOut('fast', function(){
	        		if(json.messageMessage != '') {
		                $(this).html('(' + json.messageMessage + ')').fadeIn('fast');
		            }
	        	});
	            if(json.nameMessage == '' && json.emailMessage == '' && json.subjectMessage == '' && json.messageMessage == '') {
	            	this_form_parent.find('.c-form-top').fadeOut('fast');
	            	this_form_parent.find('.c-form-bottom').fadeOut('fast', function() {
	            		this_form_parent.append('<p>Thanks for contacting us! We will get back to you very soon.</p>');
	            		// reload background
	    			//	$('.c-form-container').backstretch("resize");
	                });
	            }

	        }
	    });
	});


});
