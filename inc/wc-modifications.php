<?php
  function socksy_wc_modify() {
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
     * Remove WC Sidebar from original position
     */
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar');

    /**
     * Add and edit Sidebar on Shop Page
     */
    if( is_shop() ) {

      add_action( 'woocommerce_before_main_content', 'socksy_add_sidebar_tags', 6);
      function socksy_add_sidebar_tags() {
        echo '<div class="sidebar-shop col-lg-3 col-md-4 order-2 order-md-1">';
      }
      add_action( 'woocommerce_before_main_content', 'woocommerce_get_sidebar', 7);

      add_action( 'woocommerce_before_main_content', 'socksy_close_sidebar_tags', 8);
      function socksy_close_sidebar_tags() {
        echo '</div>';
      }

      /**
      * Add excerpt of product in Shop Page
      */
      add_action( 'woocommerce_after_shop_loop_item_title', 'the_excerpt', 1);
    }

    /**
     * Modify Product Content on Shop Page
     */
    add_action( 'woocommerce_before_main_content', 'socksy_add_shop_tags', 9);
    function socksy_add_shop_tags() {
      if ( is_shop() ) {
        echo '<div class="col-lg-9 col-md-8 order-1 order-md-2">';
      } else {
        echo '<div class="col">';
      }
    }

    add_action( 'woocommerce_before_main_content', 'socksy_close_shop_tags', 4);
    function socksy_close_shop_tags() {
      echo '</div>';
    }

  }

  add_action( 'wp', 'socksy_wc_modify' );

?>