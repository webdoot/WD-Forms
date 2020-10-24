<?php

/**
 * Admission form shortcode : [wdfms-admission-form-view]
 */

add_shortcode( 'wdfms-admission-form-view', 'wdfms_shortcode_admission_form_view'); 
function wdfms_shortcode_admission_form_view () { 

$post   = get_post(140);
// $post->post_title;
echo $post->post_content;
// print_r($post->post_content);

 } 
