<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
    <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="minimal-ui,width=device-width">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
    </head>

    <body lang="de" <?php body_class(); ?>>
        <div class="page-header">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-center">
                <img src="<?php echo get_template_directory_uri()?>/image/bluebag_logo.png" />
            </a>
        </div>

        <div class="container">

            <!-- navbar -->
            <div class="row">
                <nav data-spy="affix" data-offset-top="170" id="sam-main-nav" class="navbar navbar-sam navbar-static-top navbar-default" role="navigation">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>


                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <?php /* wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); */

                            wp_nav_menu( array(
                                    'menu'              => 'primary',
                                    'theme_location'    => 'header-menu',
                                    'depth'             => 2,
                                    // 'container'         => 'div',
                                    // 'container_class'   => 'collapse navbar-collapse',
                                    // 'container_id'      => 'bs-example-navbar-collapse-1',
                                    'menu_class'        => 'nav navbar-nav',
                                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                    'walker'            => new wp_bootstrap_navwalker())
                            );

                            wp_nav_menu( array(
                                    'menu'              => 'secondary',
                                    'theme_location'    => 'header-right-menu',
                                    'depth'             => 2,
                                    // 'container'         => 'div',
                                    // 'container_class'   => 'collapse navbar-collapse',
                                    // 'container_id'      => 'bs-example-navbar-collapse-1',
                                    'menu_class'        => 'nav navbar-nav navbar-right',
                                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                    'walker'            => new wp_bootstrap_navwalker())
                            );
                            // get_search_form();
                            ?>
                        </div>
                    </div>
                </nav>
            </div><!-- /navbar -->