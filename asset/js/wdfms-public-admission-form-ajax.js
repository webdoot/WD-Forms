/**
 * Admission form ajax
 */

jQuery(document).ready(function($){
  $('form#admission_form').ajaxForm({

        success: function(response){
            var application_no = response.data.submit_id ;
            var mobile = response.data.mobile ;
            // form reset
            resetForm: true;
            // success message
            var msg = ' <div class="w3-container w3-padding-32 w3-border">' ;
               msg += ' <div class="w3-panel w3-border w3-round-large w3-pale-green w3-text-green w3-hover-text-teal w3-padding-32" >' ;
               msg += ' <p> <span class="dashicons dashicons-yes-alt"></span> Application successfully submitted. </p> ' ; 
               msg += ' <p> Note: Your application no: <b>' + application_no + '</b> and mobile no: <b>' + mobile + '</b> . </p> ' ;
               msg += ' <p> Status can be checked at - </p> ' ;
               msg += ' </div> </div> ';
            $('wdfms-admission-form').html(msg);
        },

        error: function(response){
            // success message
            var msg = ' <div class="w3-container w3-padding-32 w3-border">' ;
               msg += ' <div class="w3-panel w3-border w3-round-large w3-pale-red w3-text-red w3-hover-text-brown w3-padding-32" >' ;
               msg += ' <p> <span class="dashicons dashicons-dismiss"></span> Something went wrong. Your form is not submitted.</p> ' ; 
               msg += ' <p> Contact : </p> ' ;
               msg += ' </div> </div> ';
            $('wdfms-admission-form').html(msg);
        },

        // uploadProgress(event, position, total, percentComplete){
        //     console.log(percentComplete);
        // }

        
    });
});
