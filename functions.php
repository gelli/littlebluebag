<?php
/** Little Blue Bag function theme function definitions */

/**
 * Add support for bootstraps navigation style
 */
require(get_template_directory().'/inc/wp-bootstrap-navwalker/wp_bootstrap_navwalker.php');

/**
 * Setup theme options
 */
add_action( 'after_setup_theme', function () {

    /**
     * local fix since curl isn't working properly
     * on yosemite
     */
    WP_DEBUG && add_filter( 'http_api_transports', function () {
        return array( 'streams' );
    });

    /**
     * i18n text support
     *
     * Translations can be added to the /languages/ directory.
     */
    load_theme_textdomain( 'littlebluebag', get_template_directory() . '/languages' );

    // Add RSS feed links to <head> for posts and comments.
    add_theme_support('automatic-feed-links');

    // Enable support for Post Thumbnails for image wall
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 400, 400 );
    add_image_size("image-wall", 380, 253, true);

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));
});

/**
 * Enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() .'/static/css/bootstrap.css');
    wp_enqueue_style( 'greyskull_css', get_template_directory_uri() .'/static/css/style.css');

    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
    wp_enqueue_script('bootstrap', get_template_directory_uri() .'/static/js/bootstrap.js');
    wp_enqueue_script('modernizr', get_template_directory_uri() .'/static/js/modernizr.js');

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
});

/**
 * header register menus
 */
add_action( 'init', function () {
    register_nav_menu('header-menu',__( 'Header Menu' ));
    register_nav_menu('header-right-menu', __('Right Header Menu'));
});


add_action( 'widgets_init', function () {

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
});

// Replaces the excerpt "more" text by a link
add_filter('excerpt_more', function ($more) {
    global $post;

    return
        '<p><a class="moretag" href="'. get_permalink($post->ID) . '">'
        .__( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyfourteen' )
        .'</a></p>';
});

/**
 * Override post author drop down to also include
 * all guests. Needed for the guest author box
 *
 * @param $output
 * @return mixed|null|string
 */
add_filter('wp_dropdown_users', function ($output) {

    /**
     * Get the global post data to make sure
     * we select the right editor
     */
    global $post;

    // return if this isn't the theme author override dropdown
    if (!preg_match('/post_author_override/', $output)) return $output;

    // return if we've already replaced the list (end recursion)
    if (preg_match ('/post_author_override_replaced/', $output)) return $output;

    // replacement call to wp_dropdown_users
    $output = wp_dropdown_users(array(
        'echo' => 0,
        'name' => 'post_author_override_replaced',
        'selected' => empty($post->ID) ? $user_ID : $post->post_author,
        'include_selected' => true
    ));

    // put the original name back
    $output = preg_replace('/post_author_override_replaced/', 'post_author_override', $output);

    return $output;
});

add_action( 'customize_register', function ( $wp_customize ) {

    // Get all categories
    $categories = get_categories();
    $cats = array();
    $i = 0;


    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cats[$category->term_id] = $category->name;
    }

    $wp_customize->add_setting('lbb_custom_cat_1', array(
      'default'        => $default
    ));

    $wp_customize->add_control( 'cat_1_select_box', array(
      'settings' => 'lbb_custom_cat_1',
      'label'   => 'Select Category:',
      'section'  => 'lbb_custom_frontpage_categories',
      'type'    => 'select',
      'choices' => $cats,
    ));

    $wp_customize->add_section( 'lbb_custom_frontpage_categories' , array(
      'title'      => __( 'Custom Category #1', 'littlebluebag' ),
      'priority'   => 30,
    ) );

});

/**
 * i18n enabled category names
 *
 * @param $categoryId
 * @return array|null|object|WP_Error
 */
function lbb_get_category($categoryId) {
    return function_exists ("pll_get_term")
      ? get_category(pll_get_term($categoryId))
      : get_category($categoryId);
}

/**
 * Entry pager function
 */
function grayskull_numeric_posts_nav() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /**	Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /**	Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<ul id="pager" class="pagination">' . "\n";

    /**	Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

    /**	Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /**	Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /**	Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /**	Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );

    echo '</ul>' . "\n";
}


