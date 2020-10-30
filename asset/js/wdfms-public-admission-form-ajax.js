/**
 * Admission form ajax
 */

jQuery(document).ready(function($){
    console.log(wdfms_obj.form_id);
  $('form#admission_form').ajaxForm({

        url: wdfms_obj.ajax_url + '?_wpnonce=' + wdfms_obj.nonce ,

        success: function(response){
            var application_no = response.submit_id ;
            var mobile = response.mobile ;            
            // success message
            var msg = ' <div class="w3-panel w3-border w3-round-large w3-pale-green w3-text-green w3-hover-text-teal w3-padding-32" >' ;
               msg += ' <p> <span class="dashicons dashicons-yes-alt"></span> Application successfully submitted. </p> ' ; 
               msg += ' <p> Note: Your application no: <b>' + application_no + '</b> and mobile no: <b>' + mobile + '</b> . </p> ' ;
               msg += ' <p> Status can be checked at - </p> ' ;
               msg += ' </div> ';
            $('form#admission_form').html(msg);
        },

        error: function(response, type, exception){
            var message = response.responseJSON.message;
            // success message
            var msg = ' <div class="w3-panel w3-border w3-round-large w3-pale-red w3-text-red w3-hover-text-brown w3-padding-32" >' ;
               msg += ' <p> <span class="dashicons dashicons-dismiss"></span> ' + message + ' Your form is not submitted.</p> ' ; 
               msg += ' <p> Contact : </p> ' ;
               msg += ' </div> ';
            $('form#admission_form').html(msg);
        },

        // form reset
        resetForm: true,

        // uploadProgress(event, position, total, percentComplete){
        //     console.log(percentComplete);
        // }
        
    });
});
