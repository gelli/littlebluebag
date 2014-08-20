<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
    <div id="main-content" class="main-content">
        <div class="row sam-content">
            <div class="col-md-4">
                <div class="welcome text-center">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img id="img-suitcase" src="<?php echo get_template_directory_uri()?>/image/suitcase.png"/></a>
                    <h1 style="font-size:3.6em;" class="sam-color-two">Welcome</h1>
                    <h4 class="sam-color-grey">and thank you for visiting</h4>
                    <img id="littleblue-slogan" src="<?php echo get_template_directory_uri()?>/image/bluebag_logo_solo.png"/>
                    <h2 class="sam-color-one">Katrin <span class="sam-color-two">&</span> Sandra</h2>
                    <hr/>
                    <div>
                        <a href="https://www.facebook.com/littlebluebag" target="_blank" class="sam-icon-size-48 sam-icon sam-color-three">&#xf106;</a>
                        <a href="https://plus.google.com/112711029813738652601/posts" target="_blank" class="sam-icon-size-48 sam-icon sam-color-three">&#xf101;</a>
                        <a href="http://www.pinterest.com/katrinandsandra/" target="_blank" class="sam-icon-size-48 sam-icon sam-color-three">&#xf103;</a>
                        <a href="https://vimeo.com/katrinandsandra" target="_blank" class="sam-icon-size-48 sam-icon sam-color-three">&#xf104;</a>
                    </div>
                    <hr/>
                    <div class="teaser-box text-left">
                        <p>
                            <a href="/about/"><span class="teaser-camera glyphicon glyphicon-camera"></span></a> Katrin und Sandra.
                        </p><p>
                            Auf jeden Fall zu zweit unterwegs und gemeinsam wollen wir eins: In Bildern Geschichten erzählen.
                        </p>
                        <p>
                            Persönlich. Lebendig. Einzigartig. Wir helfen euch aus eurem Urlaub ein unvergessliches Abenteuer werden zu lassen.
                        </p>
                        <p>Wir geben euch Tipps rund um die Urlaubsplanung, die Reisefotografie und das Filmen unterwegs. </p>
                        <p>Auch die Bildverwaltung, die Bearbeitung und der Filmschnitt werden Thema dieses Reiseblogs sein.</p>
                        <p>Es ist euer Abenteuer. Entspannt euch! Wir sind für euch da.</p>
                        <p class="text-right">Katrin und Sandra.</p>
                    </div>

                    <div class="teaser-box sam-boxed">
                        <p>
                            <a target="_blank" href="http://www.instagram.com/katrinandsandra" class="sam-icon-size-48 sam-icon sam-color-two">&#xf102;</a>
                            <a target="_blank" href="http://www.instagram.com/katrinandsandra">Folge <strong>Katrin</strong> auf Instagram</a>
                        </p>
                        <p>
                            <a target="_blank" href="http://www.instagram.com/sandraundkatrin" class="sam-icon-size-48 sam-icon sam-color-two">&#xf102;</a>
                            <a target="_blank" href="http://www.instagram.com/sandraundkatrin">Folge <strong>Sandra</strong> auf Instagram</a>
                        </p>
                    </div>

                    <div class="teaser-box teaser-img">
                        <a href="/about/">
                            <?php echo wp_get_attachment_image( 267, 'post-thumbnail', false, array('class' => 'img-responsive')); ?>
                         </a>
                    </div>
                </div>
            </div> <!-- col-md-4 -->

            <div class="col-md-8">

                <div class="row image-wall">

                    <?php

                        if ( have_posts() ) : while ( have_posts() ) : the_post();

                            get_template_part( 'frontpost');

                        endwhile;

                    else :
                        // If no content, include the "No posts found" template.
                        get_template_part( 'content', 'none' );

                    endif;
                    ?>

                </div> <!-- row -->

            </div> <!-- col-md-8 -->

            <div class="clearfix"></div>
            <!-- /video and blog -->

            <div class="row text-center">
                <?php grayskull_numeric_posts_nav(); ?>
            </div>
        </div>


            <?php
            $query = new WP_Query( array (
                'post_type' => 'post',
                'posts_per_page' => '3',
                'category_name' => 'featured'
            ));

            if ( $query->have_posts() ) : ?>

            <h2 id="featured-posts">Meistgelesene Artikel</h2>
            <div class="row sam-featured">


            <?php // Start the Loop.
            while ( $query->have_posts() ) : $query->the_post(); ?>

            <div class="col-md-4 col-xs-12">
                <a class="img-wrap" href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail("image-wall", array('class' => 'img-responsive')); ?>
                    <div><!-- <p><?php echo get_the_title(); ?> </p>--> </div>
                </a>
            </div>

                <?php endwhile;

            else :
                // If no content, include the "No posts found" template.
                get_template_part( 'content', 'none' );

            endif;
            ?>

        </div>
        <div class="clearfix" style="margin-top:20px;"></div>
    </div>
<?php
get_footer();