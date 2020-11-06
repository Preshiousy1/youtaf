$(document).ready(function(){
    
    (function($) {
        "use strict";

    
    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");

    var submit = $('#submit-btn'); // submit button
    var alert = $('#alert-msg'); 

    // validate contactForm form
    $(function() {
        $('#contactForm').validate({
            rules: {
                fname: {
                    required: true,
                    minlength: 2
                },
                lname: {
                    required: true,
                    minlength: 2
                },
                subject: {
                    required: true,
                    minlength: 4
                },
                number: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true,
                    minlength: 20
                }
            },
            messages: {
                fname: {
                    required: "<small>Please type in a first name</small>",
                    minlength: "<small>your name must consist of at least 2 characters</small>"
                },
                lname: {
                    required: "<small>Please type in a last name</small>",
                    minlength: "<small>your name must consist of at least 2 characters</small>"
                },
                email: {
                    required: "<small>Your email address is required</small>"
                },
                subject: {
                    required: "<small>Please type in a subject</small>",
                    minlength: "<small>your subject must consist of at least 4 characters</small>"
                },
                number: {
                    required: "<small>you have a number, don't you?</small>",
                    minlength: "<small>your Number must consist of at least 5 characters</small>"
                },
                message: {
                    required: "<small>um...yea, you have to write something to send this form.</small>",
                    minlength: "<small>thats all? really?</small>"
                }
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type:"POST",
                    data: $(form).serialize(),
                    url:"contact_process.php",
                    beforeSend: function() {
                        alert.fadeIn();
                        alert.html('Sending....'); 
                    },
                    success: function(data) {
                        let res = JSON.parse(data);
                        console.log(res);
                        alert.fadeOut(); 
                        
                        if(res.status == 'OK'){
                            $('#success').fadeIn();
                            $('#success').html(res.data);
                            $('#contactForm').trigger('reset'); 
                        }
                        else{
                            $('#error').fadeIn();
                            $('#error').html(res.message);
                        }
                            // $('.modal').modal('hide');
		                	// $('#success').modal('show');
                        
                    },
                    error: function() {
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $('#error').fadeIn();
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