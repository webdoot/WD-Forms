<?php

defined( 'ABSPATH' ) || exit;

// Add Shortcode
add_shortcode( 'wdfms-test', 'wdfms_shortcode_test' );

function wdfms_shortcode_test($atts) {
    $a = shortcode_atts( array(
            'foo' => '',
            'bar' => 'something else',
          ), $atts );

    return "{$atts['foo']}";



}