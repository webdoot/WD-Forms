/**
 * Admission form ajax
 */

jQuery(document).ready(function($){
  $('form#admission_form').ajaxForm({

        success: function(response){
            $('wdfms-admission-form').hide();
            $('wdfms-admission-form-message').show();
        },

        // error: function(response){
        //     console.log(response);
        // },

        // uploadProgress(event, position, total, percentComplete){
        //     console.log(percentComplete);
        // },

        // resetForm: true
    });




});
