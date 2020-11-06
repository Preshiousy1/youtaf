$(document).ready(function(){
    
    (function($) {
        "use strict";

    
    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");

    var submit = $('#submit-comment'); // submit button
    var alert = $('com_#alert-msg'); 

    // validate contactForm form
    $(function() {
        $('#commentForm').validate({
            rules: {
                guest_name: {
                    required: true,
                    minlength: 2
                },
                guest_email: {
                    required: true,
                    email: true
                },
                comment: {
                    required: true,
                    minlength: 20
                }
            },
            messages: {
                guest_name: {
                    required: "<small>Please type in a name</small>",
                    minlength: "<small>your name must consist of at least 2 characters</small>"
                },
                guest_email: {
                    required: "<small>Your email address is required</small>"
                },
                comment: {
                    required: "<small>um... didn't you want to leave a comment?</small>",
                    minlength: "<small>Is this all you'd like to day? really?</small>"
                }
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type:"POST",
                    data: $(form).serialize(),
                    //url:"comments.store",
                    beforeSend: function() {
                        alert.fadeIn();
                        alert.html('Sending....'); 
                    },
                    success: function(data) {
                        let res = JSON.parse(data);
                        console.log(res);
                        alert.fadeOut(); 
                        
                        if(res.status == 'OK'){
                            $('#com_success').fadeIn();
                            $('#com_success').html(res.data);
                            $('#commentForm').trigger('reset'); 
                        }
                        else{
                            $('#com_error').fadeIn();
                            $('#com_error').html(res.message);
                        }
                            // $('.modal').modal('hide');
		                	// $('#success').modal('show');
                        
                    },
                    error: function() {
                        $('#commentForm').fadeTo( "slow", 1, function() {
                            $('#com_error').fadeIn();
                            // $('.modal').modal('hide');
		                	// $('#error').modal('show');
                        })
                    }
                })
            }
        })
    })
        
 })(jQuery)
})