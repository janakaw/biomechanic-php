



(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
		
        { 
			
			
            //form validation rules
            $("#reporting").validate({
					
                rules: {
					
					
                   date: {
						required: {
							depends: function(element) {
							if ($('#userName').val()!=""){
							return true;
							}else{
							return false;
							}
							}
							}
							},
					
                   userName: {
						required: {
							depends: function(element) {
							if ($('#date').val()!=""){
							return true;
							}else{
							return false;
							}
							}
							}
							}
					
					
            
                    
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
                    
		
		  
		
		
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);