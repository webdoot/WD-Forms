<?php



/****************** 
 * Mics Functions *
 ******************/

/*
 * Notification message
 */
// function wdfms_msg(string $msg, string $type){
// 	$GLOBALS['wdschool']['msg'] = $msg ;
// 	$GLOBALS['wdschool']['msgtype'] = $type ;
// }


// get form_id
function wdfms_get_form_id(){
	if (get_post_type() == 'wdfms_form') {
		return get_the_ID();
	}
	elseif($GLOBALS['wdfms_gbl']['form_id']) {
		return $GLOBALS['wdfms_gbl']['form_id'];
	}
	else {
		return $GLOBALS['wdfms_gbl'];
	}
	
}




?>