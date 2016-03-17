<?php
/*
 * Plugin Name: Echo Testimonies
 * Plugin URI: http://echods.com
 * Description: Testimonies plugin
 * Version: 1.0.0
 * Author: Isaac Castillo
 * Author URI: http://icemancast.com
 * License: GPL2

/*  Copyright 2014  Isaac Castillo  (email : icemancast@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if(!defined('ECHO_TESTIMONIES')) define('ECHO_TESTIMONIES', dirname(__FILE__));

 //Require files
require_once ECHO_TESTIMONIES . '/includes/functions.php';
require_once ECHO_TESTIMONIES . '/includes/echo-testimonies-shortcodes.php';

function echo_testimonies_posttype()
{
  $labels = array(
    'name'  => 'Echo Testimonies',
    'singular_name' => 'Echo Testimony',
    'menu_name' => 'Echo Testimonies',
    'name_admin_bar' => 'Echo Testimonies',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Testimony',
    'new_item' => 'New Echo Testimony',
    'edit_item' => 'Edit Testimony',
    'view_item' => 'View Testimony',
    'all_items' => 'All Testimonies',
    'search_items' => 'Search Echo Testimonies',
    'parent_item_colon' => 'Parent Echo Testimonies',
    'not_found' => 'No testimony found.',
    'not_found_in_trash' => 'No testimony found in Trash.',
  );

  $args = array(
    'labels' => $labels,
    'public' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 6,
    'menu_icon' => 'dashicons-editor-quote',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'echo-testimonies' ),
    'capability_type' => 'post',
    'has_archive' => false,
    'hierarchical' => true,
    'supports' => array( 'title', 'editor', 'custom-fields', 'page-attributes' )
  );
  register_post_type( 'echo-testimonies', $args);
}
add_action('init', 'echo_testimonies_posttype' );

function echo_testimonies_rewrite_flush() {
  echo_testimonies_posttype();
  flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'echo_testimonies_rewrite_flush' );
