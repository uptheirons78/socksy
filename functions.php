<?php
/**
 * Socksy Theme Functions and Definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Socksy
 */

function socksy_scripts(){
  /**
   * Include Bootstrap 4 Css and Js
   */
  wp_enqueue_script( 'bootstrap-js', get_template_directory_uri(  ) . '/inc/bootstrap.min.js', array( 'jquery' ), '4.4.1', true );
  wp_enqueue_style( 'bootstrap-css', get_template_directory_uri(  ) . '/inc/bootstrap.min.css', array(), '4.4.1', 'all' );
  /**
   * Include Theme Styles
   */
  wp_enqueue_style( 'socksy-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all' );
}
add_action( 'wp_enqueue_scripts', 'socksy_scripts' );

function socksy_config(){
  /**
   * Register Socksy Menus
   */
  register_nav_menus(
    array(
      'socksy_main_menu' => 'Socksy Main Menu',
      'socksy_footer_menu' => 'Socksy Footer Menu'
    )
    );

    /**
     * Woocommerce related settings
     */

    add_theme_support('woocommerce', array(
      'thumbnail_image_width'   => 255,
      'single_image_width'      => 255,
      'product_grid'            => array(
          'default_rows'  => 10,
          'min_rows'  => 5,
          'max_rows'  => 10,
          'default_columns'  => 1,
          'min_columns'  => 1,
          'max_columns'  => 1,
      )
    ));
    add_theme_support( 'wc-product-gallery-zoom');
    add_theme_support( 'wc-product-gallery-lightbox');
    add_theme_support( 'wc-product-gallery-slider');

    if ( ! isset( $content_width ) ) {
	    $content_width = 600;
    }
}
add_action( 'after_setup_theme', 'socksy_config', 0 );

require get_template_directory() . '/inc/wc-modifications.php';

