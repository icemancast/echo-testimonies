<?php

/**
 * Register and load css for plugin
 *
 * @return string
*/
function echo_testimonies_css()
{
	if ( !is_admin() ) { // we do not want to register or enqueue these styles on admin screens

		wp_register_style( 'echo-testimonies', plugins_url('../assets/css/echo-testimonies.css', __FILE__), '0.1.0', 'screen');

		// enqueue stylesheets
		wp_enqueue_style( 'echo-testimonies' );
    }
}
// register and enqueue theme stylesheets
add_action( 'wp_enqueue_scripts', 'echo_testimonies_css', 10 );




/**
 * Register and load js for plugin
 *
 * @return string
*/
function echo_testimonies_js()
{
  if ( !is_admin() ) { // we do not want to register or enqueue these styles on admin screens
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js');

    wp_register_script( 'echo-tesimonies-js', plugins_url('../assets/js/echo-testimonies.js', __FILE__), array( 'jquery' ), '0.1.0', true );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'echo-tesimonies-js' );
  }
}
add_action( 'wp_enqueue_scripts', 'echo_testimonies_js', 10 );




/**
 * Filter title for post type to change placholder for field
 *
 * @return string
*/
function wpfstop_change_default_title( $title ){
  $screen = get_current_screen();
  if ( 'echo-testimonies' == $screen->post_type ){
      $title = 'Enter Person Name';
  }
  return $title;
}
add_filter( 'enter_title_here', 'wpfstop_change_default_title' );




/**
 * Get random 4 testimonies
 *
 * @return array
*/
function get_testimonies($count = 4) {

  $args = array(
    'post_type' => 'echo-testimonies',
    'post_status' => 'publish',
    'posts_per_page' => $count,
    'orderby' => 'rand'
  );

  $loop = new WP_Query( $args );

  while ( $loop->have_posts() ) : $loop->the_post();

    $testimonies[] =
    [
      'id' => get_the_ID(),
      'name' => get_the_title(),
      'testimony' => get_the_content()
    ];

  endwhile;
  return $testimonies;
}