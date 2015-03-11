<?php
/**
 * Created by IntelliJ IDEA.
 * User: gelli
 * Date: 11/03/15
 * Time: 21:16
 */


/**
 * Declare woocommerce plugin support
 */
add_action('after_setup_theme',  function () {
  add_theme_support('woocommerce');
});

add_filter( 'woocommerce_output_related_products_args', function () {


  $args['posts_per_page'] = 4; // 4 related products
  $args['columns'] = 4; // arranged in 2 columns

  return $args;
});