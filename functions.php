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
  wp_enqueue_style( 'socksy-main-style', get_stylesheet_uri(), array(), 1.0, 'all' );
  wp_enqueue_style( 'socksy-style', get_template_directory_uri() . '/assets/css/style.css', array(), filemtime(get_template_directory() . '/assets/css/style.css'), 'all' );

  /**
   * Google Fonts
   */
  wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Rajdhani:400,500,600,700&display=swap|https://fonts.googleapis.com/css?family=Seaweed+Script&display=swap' );

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

/**
 * Theme must not depend on WooCommerce Plugin
 * if WooCommerce Plugin is not installed or is disabled
 * wc-modifications.php will not be loaded
 */
if(class_exists('WooCommerce')) {
  require get_template_directory() . '/inc/wc-modifications.php';
}


