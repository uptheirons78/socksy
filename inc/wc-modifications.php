<?php
  /**
   * Modify WooCommerce with Bootstrap tags and personal styles
   */
  /**
   * Modify Main Container in Shop Page
  */
  add_action('woocommerce_before_main_content', 'socksy_open_container_row', 5);
  function socksy_open_container_row() {
    echo '<div class="container shop-content"><div class="row">';
  }
  add_action('woocommerce_after_main_content', 'socksy_close_container_row', 5);
  function socksy_close_container_row() {
    echo '</div></div>';
  }
  /**
   * Modify Sidebar on Shop Page
   */
  add_action( 'woocommerce_before_main_content', 'socksy_add_sidebar_tags', 6);
  function socksy_add_sidebar_tags() {
    echo '<div class="sidebar-shop col-lg-3 col-md-4 order-2 order-md-1">';
  }

  remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar');
  add_action( 'woocommerce_before_main_content', 'woocommerce_get_sidebar', 7);

  add_action( 'woocommerce_before_main_content', 'socksy_close_sidebar_tags', 8);
  function socksy_close_sidebar_tags() {
    echo '</div>';
  }
  /**
   * Modify Product Content on Shop Page
   */
  add_action( 'woocommerce_before_main_content', 'socksy_add_shop_tags', 9);
  function socksy_add_shop_tags() {
    echo '<div class="col-lg-9 col-md-8 order-1 order-md-2">';
  }

  add_action( 'woocommerce_before_main_content', 'socksy_close_shop_tags', 4);
  function socksy_close_shop_tags() {
    echo '</div>';
  }

  /**
   * Add excerpt of product in Shop Page
   */
  add_action( 'woocommerce_after_shop_loop_item_title', 'the_excerpt', 1);

  // add_filter( 'woocommerce_show_page_title', 'socksy_remove_shop_title' );
  // function socksy_remove_shop_title($val) {
  //   $val = false;
  //   return $val;
  // }

?>