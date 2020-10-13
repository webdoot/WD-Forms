
<div class="wrap">
<h1>Admin Setting</h1>

<form method="post" >
	<input type="hidden" name="wdfms_page" value="wd-school">
	<input type="hidden" name="wdfms_action" value="update">
	<?php wp_nonce_field( 'wdfms_action', 'wdfms_value' ); ?>
	<table class="form-table" role="presentation">
		<tbody>
			<tr>
				<th scope="row">WD School Panel (for Admin) </th>
				<td>
					<fieldset>
						<legend class="screen-reader-text"><span>For each post in a feed, include </span></legend>
						<p>					
							<label><input name="wdfms_panel" type="radio" value="FULL" <?php echo (get_option('wdschool_panel') == 'FULL') ? 'checked="checked"' : '' ; ?> > Full Panel </label> <br>	
							<label><input name="wdfms_panel" type="radio" value="HALF" <?php echo (get_option('wdschool_panel') == 'HALF') ? 'checked="checked"' : '' ; ?> > Partial Panel </label>						
						</p>
						<p class="description">	Determines how WD School Panel is displayed to Admin(only). It is always Full for Clients. 
							<a href="#">Learn more </a>. </p>
					</fieldset>
				</td>
			</tr>
		</tbody>
	</table>
	<p class="submit"><input type="submit" name="wd_submit" id="wd-submit" class="button button-primary" value="Save Changes"></p>
</form>
</div>

<script type="text/javascript">
	
(function($) {
    // Notificaion
    <?php if ($GLOBALS['wdschool']['msg']) {
        echo "$.notify('" . $GLOBALS['wdschool']['msg'] . "', '" . $GLOBALS['wdschool']['msgtype'] . "');"; 
        }
    ?> 
})( jQuery );

</script>