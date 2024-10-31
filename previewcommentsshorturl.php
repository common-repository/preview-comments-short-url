<?php
/*
Plugin Name: Preview comments short URL
Plugin URI: http://onlinevortex.com/projects/preview-comments-short-url/
Description: Expand short URLs in comments admin page
Version: 0.8
Author: Carlos Mendoza
Author URI: http://onlinevortex.com/

Copyright 2009 Carlos Mendoza (cmendoza@onlinevortex.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

add_action('admin_init', 'ecsu_init' );
function ecsu_init(){
    $path = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__));
    wp_register_script('previewcommentsshorturlscript', $path.'/jquery.longurl.js');
    wp_register_script('pcsu', $path.'/pcsu.js');
    wp_register_style('pcsu_style', $path.'/pcsu.css');
}

// Add menu page
add_action('admin_menu', 'pcsu_add_script');
function pcsu_add_script() {
    add_action('admin_print_scripts-edit-comments.php', 'pcsu_scripts');
    add_action('admin_print_styles-edit-comments.php', 'pcsu_style');
}

function pcsu_scripts() {
    wp_enqueue_script('previewcommentsshorturlscript');
    wp_enqueue_script('pcsu');
}

function pcsu_style() {
    wp_enqueue_style('pcsu_style');
}

?>
