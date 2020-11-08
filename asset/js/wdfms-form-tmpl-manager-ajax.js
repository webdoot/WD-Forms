/**
 * Form template manage ajax
 */
// display wdfms_tmpl
jQuery(document).ready(function($){
    $('button.wdfms-form-tmpl').click(function(){ 
        var postid = $(this).attr("data-id");
        var data = { 'action': 'wdfms_tmpl_display', 'postid': postid };

        // ajaxurl is always pointing to admin-ajax.php
        $.post(ajaxurl, data, function(response) {
            tb_show('Form Template','#TB_inline?&width=700&height=370&inlineId=wdfms_tb');
            var tmpl_form = '<form method="post" id="wdfms_form_tmpl"> <label for="wdfms_tmpl">Paste your template here:</label> <br> <textarea name="wdfms_tmpl" rows="12" style="width:100%" >' + response + '</textarea> <br> <br> <button onclick="wdfms_tmpl_submit(' + postid + ')" type="submit" class="button button-primary"> Save </button> </form>';
            $('#TB_ajaxContent p').html(tmpl_form);            
        });  //post  
    });  //button   
});


// submit wdfms_tmpl
function wdfms_tmpl_submit(postid){
    jQuery('form#wdfms_form_tmpl').ajaxForm({
        url: ajaxurl + '?action=wdfms_tmpl_edit&postid=' + postid ,

        success: function(response){  
            tb_remove();  //close thickbox
            jQuery.notify(response.data.message, response.data.type);            
            setTimeout(function(){
                location.reload();
            }, 3000); 
        },

        error: function(response, type, exception){
            tb_remove();  //close thickbox
            jQuery.notify(response.data.message, response.data.type);            
            setTimeout(function(){
                location.reload();
            }, 3000); 
        },

        // form reset 
        // resetForm: true,        
    }); 
}

