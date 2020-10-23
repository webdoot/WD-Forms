<?php

include_once WDFMS_PLUGIN_DIR . 'admin/class-wdfms-form-view-page.php';

$wdfms_entries_page = new Wdfms_Entries_Page();
echo '<div class="wrap"><h2>Form Eentries</h2><form method="post">';

// echo $studentTable->current_action();
print_r($_REQUEST);

// $studentTable->search_box('search', 'search_id');
$wdfms_entries_page->prepare_items(); 
$wdfms_entries_page->display(); 
echo '</form></div>'; 