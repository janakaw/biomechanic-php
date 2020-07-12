



(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
		
        { 
			
			
            //form validation rules
            $("#register").validate({
                rules: {
					 email:{
                        required: true,
                        email: true
                    },
					
                    password: {
                       required: true,
                       minlength: 5
                    },
					repass:{
					 required: true,
					 equalTo: "#password"
					
					
					},
                    firstName: {
						required:true,
						number:false
						},
					lastName: {
						required:true,
						number:false
						},
					address1: "required",
					address2: "required",
					city: "required",
					state: "required",
					zip: "required",
					phnType: "required",
					countryCode: "required",
					phone: {
						required: true,
						number:true
						},
					
                   agree: "required"
                    
                },
				
                messages: {
					
					repass:{
					equalTo: "Passwords do not match",
				},
					//chkTermsAndConditions: "You must agree to out terms and conditions",
								
					
                    password: {
                        required: "Please enter a password",
                        minlength: "At least 5 characters long"
                    },
                    email: {
						
						required:"Please enter a valid Email address",
						email: "This is not a valid email address"
					
					},
                    agree: "Please accept our policy"
                },
				highlight: function (element, errorClass, validClass) {
        $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).closest('.control-group').removeClass('error').addClass('success');
    },
    success: function (label) {
        $(label).closest('form').find('.valid').removeClass("invalid");
    },
    errorPlacement: function (error, element) {
        element.closest('.control-group').find('.help-block').html(error.text());
    },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);