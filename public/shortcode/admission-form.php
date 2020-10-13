<?php

defined( 'ABSPATH' ) || exit;

// Add Shortcode
function wdfms_shortcode_admission_form() {

return
	'<div id="err" style="max-width: 300px"></div>
	
	<div style="max-width: 300px">
		<form id="form1" class="" name="form1" method="post" action="//sms.webdoot.com/action_layer.php?action=1">

		    <input class="" name="login" id="login" autofocus type="text" required />

		    <input class="" name="pass"  id="pass"  type="password" required />

		    <button class="">Sign in</button>

		</form> 
	</div> ' ;

}

add_shortcode( 'wdfms-admission-form', 'wdfms_shortcode_admission_form' );