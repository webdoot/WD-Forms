<?php

/**
 * Admission form shortcode : [wdfms-admission-form-view]
 */

add_shortcode( 'wdforms', 'wdfms_shortcode_ttt'); 
function wdfms_shortcode_ttt ($id) { 

// $post   = get_post(140);
// $post->post_title;
// echo $post->post_content;
// print_r($post->post_content);

print_r($id['id']);

 } 