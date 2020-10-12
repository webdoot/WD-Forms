
/**************************************************************
 * Gamedoot AJAX data management of Game Table.               *
 * Data submitted to (declared) $gamedoot_ajax_url.           *
 **************************************************************/

$(document).ready(function() { 		
            
        /** View & Update table record **/
        $('.view-data-btn, .update-data-btn').click(function(){            
            var dataid = $(this).attr("data-id");
            var dataitem = $(this).attr("data-item");
            //console.log(dowhat);
            var postdata = "action=gamedoot_request&param=game_view_record&id="+dataid;
            $.post(gamedoot_admin_ajax, postdata, function(response){
                    var data = $.parseJSON(response);
                    // console.log(data);
                    switch(dataitem){
                        case "game-view" :
                            gameViewForm(data);
                            break;
                        case "game-update" :
                            gameUpdateForm(data);
                            break;
                        default :                    
                    }
                    
            });
        });

        /** Delete table record **/
         $('.delete-data-btn').click(function(){
            var conf = confirm("Are you sure want to delete?");
            // After confirmation as yes.
            if (conf) {
                    var dataid = $(this).attr("data-id");
                    var postdata = "action=gamedoot_request&param=game_delete_record&id="+dataid;
                    $.post(gamedoot_admin_ajax, postdata, function(response){
                            var data = $.parseJSON(response);
                            if(data.status == 1) {
                                    // alert(data.message);
                                    $.notifyBar({ cssClass: "success", html: data.message });    // Notification bar
                                    setTimeout (function(){
                                            location.reload();
                                    }, 1000);
                            } else {
                                    // alert(data.message);
                                    $.notifyBar({ cssClass: "error", html: data.message });		// Notification bar
                            }
                    });
            }
         });

        /** Add Table Record  **/
        $('.add-data-form').validate({
            submitHandler: function(){
                var dataitem = $(".add-data-form").attr("data-item");
                /// Saving the data.
                switch(dataitem){
                    case "game-data" :
                        var postdata = $('.add-data-form').serialize()+ '&action=gamedoot_request&param=game_add_record';
                        break;
                    default :                    
                } 
                $.post(gamedoot_admin_ajax, postdata, function(response){
                    var data = $.parseJSON(response);                                
                        //data.status;
                        // data.message
                    if(data.status == 1) {
                        $.notifyBar({ cssClass: "success", html: data.message });	// Notification bar
                    } else {
                        $.notifyBar({ cssClass: "error", html: data.message });		// Notification bar
                    }
                    location.reload(true);
                });
            }
        });

       /** Photo Icon Upload: into Gallery and Table updation **/
       /// Photo Icon:
        $('.upload-img-icon-btn').click(function(){	
                var image = wp.media({				// Calling media gallery.
                        title   : 'Upload Game Icon Image',		// Title of the gallery window.
                        multiple: false				// Multiple image sellection.
                }).open().on('select', function(){
                        var files = image.state().get('selection').first();
                        var jsonFiles = files.toJSON();
                        $('.gamedoot-selected-icon-img').attr("src", jsonFiles.url);    // Display image.
                        $('.gamedoot-icon-url').val(jsonFiles.url);      // Input field value.
                }); 
        }); 

        /// Photo Wall:
        $('.upload-img-wall-btn').click(function(){			
                var image = wp.media({				// Calling media gallery.
                        title   : 'Upload Game Wall Image',		// Title of the gallery window.
                        multiple: false				// Multiple image sellection.
                }).open().on('select', function(){
                        var files = image.state().get('selection').first();
                        var jsonFiles = files.toJSON();
                        $('.gamedoot-selected-wall-img').attr("src", jsonFiles.url);    // Display image.
                        $('.gamedoot-wall-url').val(jsonFiles.url);     // Input field value.
                }); 
        });
        
        
        /** Table View Functions declaration **/
            function gameViewForm (data){
                $('#game-form-id-22').html('( #'+ data.ID + ' )');
                $('#game-view-id-22').attr("data-id", data.ID);
                $('#name-f-22').html(data.name_full);
                $('#name-d-22').html(data.name_disp);
                $('#desc-sh-22').html(data.desc_short);
                $('#desc-lg-22').html(data.desc_long);
                $('#fee-p-22').html(data.fee_play);
                $('#fee-w-22').html(data.fee_watch);
                $('#owner-22').html(data.owner);
                $('#rank-22').html(data.ranking);
                $('#reg-dt-22').html(data.dt_create);
                $('#img-icon-22').attr("src", data.img_icon); 
                $('#img-wall-22').attr("src", data.img_wall); 
            }
            
            function tournamentViewForm (data){
                
            }
            
        /** Table Update Functions declaration **/
            function gameUpdateForm (data){
                $('#game-form-heading-33').html('( #'+ data.ID + ' )');
                $('#name-f-33').val(data.name_full);
                $('#name-d-33').val(data.name_disp);
                $('#desc-sh-33').val(data.desc_short);
                $('#desc-lg-33').val(data.desc_long);
                $('#fee-p-33').val(data.fee_play);
                $('#fee-w-33').val(data.fee_watch);
                $('#owner-33').val(data.owner);			// readonly
                $('#rank-33').val(data.ranking);		// readonly
                $('#reg-dt-33').val(data.dt_create);		// readonly
                $('.gamedoot-selected-icon-img').attr("src", data.img_icon);
                $('.gamedoot-selected-wall-img').attr("src", data.img_wall);
                
                $('#game-id-33').val(data.ID);
                $('.gamedoot-icon-url').val(data.img_icon); 
                $('.gamedoot-wall-url').val(data.img_wall); 
               
                
                $('#update-game-form-33').validate({
                    submitHandler: function(){ 
                        /// Saving the data.                        
                        var postdata = $('#update-game-form-33').serialize()+ '&action=gamedoot_request&param=game_update_record';
                        // alert(postdata);
                        $.post(gamedoot_admin_ajax, postdata, function(response){
                            var data = $.parseJSON(response);                                
                            if(data.status == 1) {
                                // alert(data.message);
                                $.notifyBar({ cssClass: "success", html: data.message });    // Notification bar
                                setTimeout (function(){
                                        location.reload();
                                }, 1000);

                            } else {
                                    // alert(data.message);
                                    $.notifyBar({ cssClass: "error", html: data.message });  // Notification bar
                            }
                        });
                    }
                })
            }
});

