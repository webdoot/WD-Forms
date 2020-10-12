
<wdfms>
<?php 
if ($GLOBALS['wdschool']['panel'] == 'FULL') {
	include_once WDFMS_PLUGIN_DIR . 'admin/view/top-menu.php'; 
	include_once WDFMS_PLUGIN_DIR . 'admin/view/sb-menu.php';
}
else {
	echo '<style type="text/css"> #wpcontent {padding-left: 0px} </style>';
}

?>

<!-- !PAGE CONTENT! -->
<div class="w3-main"  style= "<?php echo ($GLOBALS['wdschool']['panel'] == 'FULL') ? 'margin-left:300px' : '' ?>" >

  <!-- Header -->
  <header class="w3-container" style="<?php echo ($GLOBALS['wdschool']['panel'] == 'FULL') ? 'padding-top:32px' : 'padding-top:10px' ?>">
    <h3 class="w3-left"><b><span class="dashicons dashicons-groups"></span> Students </b></h3>
    <a class="w3-btn w3-right w3-cyan "><span class="dashicons dashicons-plus"></span> Add</a>
  </header>  
  <hr>

  <div class="w3-container w3-margin-bottom">
    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white" id="student-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Class</th>
          <th>Roll</th>
          <th>Tele</th>
          <th>Parent</th>
          <th>Address</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      	<?php foreach ($students as $student) : ?>
        <tr>        
        	<td> <?php echo $student['id']; ?> </td>       
          	<td> <?php echo $student['s_name']; ?> </td>
          	<td> <?php echo $student['class_id']; ?> </td>
          	<td> <?php echo $student['s_rollno']; ?> </td>
          	<td> <?php echo $student['s_phone']; ?> </td>
          	<td> <?php echo $student['p_name']; ?> </td>
          	<td> <?php echo $student['s_address']; ?> </td>
          	<td>
          		<a class="w3-badge w3-light-blue"><span class="dashicons dashicons-visibility"></span></a>
          		<a class="w3-badge w3-green"><span class="dashicons dashicons-edit"></span></a>
          		<a class="w3-badge w3-red"><span class="dashicons dashicons-trash"></span></a>
          	</td>                 
        </tr>
        <?php endforeach; ?> 
      </tbody>
      
    </table><br>
    
  </div>
  <hr>

<?php include_once WDFMS_PLUGIN_DIR . 'admin/view/footer.php'; ?>

  <!-- End page content -->
</div>

</wdfms>

<script>
// Get the Sidebar
var wdfmsSidebar = document.getElementById("wdfmsSidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("wdfmsOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (wdfmsSidebar.style.display === 'block') {
        wdfmsSidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        wdfmsSidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    wdfmsSidebar.style.display = "none";
    overlayBg.style.display = "none";
}


// Notificaion
<?php if ($GLOBALS['wdschool']['msg']) {
    echo "$.notify('" . $GLOBALS['wdschool']['msg'] . "', '" . $GLOBALS['wdschool']['msgtype'] . "');"; 
    }
?> 


// Data Table
$(document).ready( function () {
    $('#student-table').DataTable();
});

</script>


