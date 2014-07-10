<?php

require(get_template_directory().'/vnd/wp-bootstrap-navwalker/wp_bootstrap_navwalker.php');

/**
 * Enqueue scripts and styles
 */
function greyskull14_scripts() {
    wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() .'/vnd/bootstrap/dist/css/bootstrap.css');
    wp_enqueue_style( 'greyskull_css', get_template_directory_uri() .'/style/lbb.css');

    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
    wp_enqueue_script('bootstrap', get_template_directory_uri() .'/vnd/bootstrap/dist/js/bootstrap.min.js');
}

add_action( 'wp_enqueue_scripts', 'greyskull14_scripts' );


/**
 * header register menus
 */
function greyskull_register_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
    register_nav_menu('header-right-menu', __('Right Header Menu'));
}
add_action( 'init', 'greyskull_register_menu' );

function greyskull_widgets_init() {

    register_sidebar( array(
        'name'          => __( 'Sidebar Widget Area', 'greyskull14' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Appears in the sidebar section of the site.', 'greyskull14' ),
        'before_widget' => '<div id="%1$s" class="row widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget Area', 'greyskull14' ),
        'id'            => 'footer-1',
        'description'   => __( 'Appears in the footer section of the site.', 'greyskull14' ),
        'before_widget' => '<div id="%1$s" class="col-md-4 %2$s"><div class="row-centered text-left">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h1>',
        'after_title'   => '</h1><hr/>',
    ) );


}
add_action( 'widgets_init', 'greyskull_widgets_init' );

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 400, 400 );

/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
add_theme_support( 'html5', array(
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
) );


if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
}


// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
    global $post;

    return
        '<p><a class="moretag" href="'. get_permalink($post->ID) . '">'
        .__( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyfourteen' )
        .'</a></p>';
}

add_filter('excerpt_more', 'new_excerpt_more');