<?php

/*
Plugin Name: Admin Featured Image Column
Plugin URI: https://wpassist.me/
Description: Add post thumbnail to admin post table.
Version: 1.0
Author: Metin Saylan
Author URI: https://metinsaylan.com/
*/

add_filter('manage_posts_columns', 'wpa_add_featured_image_column', 5);
add_action('manage_posts_custom_column', 'wpa_output_featured_image_column', 5, 2);
 
function wpa_add_featured_image_column($defaults){
    $defaults['wpa_admin_featured_image_column'] = __('Featured Image');
    return $defaults;
}
 
function wpa_output_featured_image_column($column_name, $id){
    if($column_name === 'wpa_admin_featured_image_column'){
        echo '<img src="' . get_the_post_thumbnail_url( get_the_ID(), array( 150, 150 ) ) . '" width="90" height="90" />';
    }
}