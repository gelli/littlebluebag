<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

    <div clas="row">
        <div class="col-md-9">
            <div id="primary" class="content-area">
                <div id="content" class="site-content" role="main">
                    <?php
                        // Start the Loop.
                        while ( have_posts() ) : the_post();

                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );

                            // Previous/next post navigation.
                            /* twentyfourteen_post_nav(); */

                            ?>

                            <div class="row space-top">
                                <div class="col-xs-12">
                                    <div class="panel panel-default panel-newsletter">
                                        <div class="panel-body  ">
                                            <h3>Newsletter</h3>
                                            <hr class="visible-sm visible-md visible-lg"/>
                                            <p class="visible-md visible-lg">
                                                Du willst immer von den neuesten Neuigkeiten erfahren? Kein Problem!
                                                Melde dich für unseren monatlichen Newsletter an.
                                            </p>
                                            <form method="post" action="/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">
                                                <p>
                                                <div class="input-group">
                                                    <span class="input-group-addon">@</span>
                                                    <input type="email" name="ne" class="form-control" placeholder="E-Mail">
                                <span class="input-group-btn">
                                    <input class="newsletter-submit btn btn-default" type="submit" value="Anmelden"/>
                                </span>
                                                </div>

                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <?php


                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) {
                                comments_template();
                            }
                        endwhile;
                    ?>
                </div><!-- #content -->
            </div><!-- #primary -->




        </div> <!-- .col -->
        <div class="col-md-3">
            <?php get_sidebar( 'sam-sidebar') ?>
        </div>
    </div>

<?php
get_footer();
