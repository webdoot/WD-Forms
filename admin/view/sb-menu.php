<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="wdfmsSidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="../wp-content/plugins/wd-school/asset/images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>Mike</strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><span class="dashicons dashicons-email-alt"></span></a>
      <a href="#" class="w3-bar-item w3-button"><span class="dashicons dashicons-admin-users"></span></a>
      <a href="#" class="w3-bar-item w3-button"><span class="dashicons dashicons-admin-generic"></span></a>
    </div>
  </div>
  
  <div class="w3-bar-block">
    <?php if (current_user_can('administrator') && is_admin()) : ?>      
      <a href="../wp-admin" class="w3-bar-item w3-button w3-padding w3-dark-grey w3-hover-black"><span class="dashicons dashicons-external"></span> Back to Dashbord</a> <hr>
    <?php endif; ?>
    
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><span class="dashicons dashicons-no"></span>Close Menu</a>    
    
    <a href="../wp-admin/admin.php?page=wd-school-dashboard" class="w3-bar-item w3-button w3-padding <?php echo ($_REQUEST['page'] == 'wd-school-dashboard') ? 'w3-cyan' : '' ?>" ><span class="dashicons dashicons-performance"></span> Dashboard</a>
    
    <a href="../wp-admin/admin.php?page=wd-school-student" class="w3-bar-item w3-button w3-padding <?php echo ($_REQUEST['page'] == 'wd-school-student') ? 'w3-cyan' : '' ?>"><span class="dashicons dashicons-groups"></span> Students</a>
    
    <a href="../wp-admin/admin.php?page=wd-school-setting" class="w3-bar-item w3-button w3-padding <?php echo ($_REQUEST['page'] == 'wd-school-setting') ? 'w3-cyan' : '' ?>"><span class="dashicons dashicons-admin-settings"></span> Settings</a>
    <br><br>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="wdfmsOverlay"></div>

	


