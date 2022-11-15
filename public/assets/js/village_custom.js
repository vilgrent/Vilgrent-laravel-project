$('#addvillage').bootstrapValidator({
    // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
    feedbackIcons: {
      valid: 'glyphicon glyphicon-ok',
      validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        village_name: {
            validators: {
                notEmpty: {
                    message: 'Please enter subscriptionstart.'
                }
            }
        },
        district: { 
            validators: {
                
                 notEmpty: {
                     message: 'Please enter subscriptionend.'
                 },
                
                 

            }
        },
        village_pin_code: {
            validators: {
                notEmpty: {
                    message: 'Please enter paiddate.'
                }
            }
        },
       
        
        

    },
    submitHandler: function(validator, form, submitButton) {
      
      validator.defaultSubmit();

    },
    errorPlacement: function(error, element) {
      alert("errorPlacement");
    }
  });
  