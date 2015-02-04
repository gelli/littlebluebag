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
            <div class="col-md-4 ">
                <div class="row">
                    <div class="text-center col-xs-12 hidden-xs">
                        <a href="ebook-manuell-fotografieren">
                            <img src="<?php echo get_template_directory_uri()?>/static/images/ebook.png" border="1"/>
                        </a>
                        <hr/>
                    </div>

                    <div class="welcome text-center col-ms-12 hidden-xs">
                        <div>
                            <a href="https://www.facebook.com/littlebluebag" target="_blank" class="sam-icon-size-48 sam-icon sam-color-three">&#xf101;</a>
                            <a href="https://plus.google.com/112711029813738652601/posts" target="_blank" class="sam-icon-size-48 sam-icon sam-color-three">&#xf102;</a>
                            <a href="http://www.pinterest.com/katrinandsandra/" target="_blank" class="sam-icon-size-48 sam-icon sam-color-three">&#xf105;</a>
                            <a href="https://vimeo.com/katrinandsandra" target="_blank" class="sam-icon-size-48 sam-icon sam-color-three">&#xf109;</a>
                            <a href="https://www.youtube.com/channel/UCeqThqTs9zDDQVvlDIbACxg" target="_blank" class="sam-icon-size-48 sam-icon sam-color-three">&#xf10a;</a>
                        </div>
                        <hr/>
                    </div>
                    <div class="text-center col-xs-12 col-sm-6 col-md-12">
                        <div class="teaser-box">
                            <a href="/about/">
                                <?php echo wp_get_attachment_image( 267, 'post-thumbnail', false, array('class' => 'img-responsive teaser-img')); ?>
                            </a>
                        </div>
                    </div>

                    <div class="text-center col-xs-12 col-sm-6 col-md-12">
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
                    </div>

                    <div class="col-xs-12">
                        <div class="teaser-box sam-boxed text-center">
                            <p>
                                <a target="_blank" href="http://www.instagram.com/katrinandsandra" class="sam-icon-size-48 sam-icon sam-color-two">&#xf103;</a>
                                <a target="_blank" href="http://www.instagram.com/katrinandsandra">Folge <strong>Katrin</strong> auf Instagram</a>
                            </p>
                            <p>
                                <a target="_blank" href="http://www.instagram.com/littlebluebag" class="sam-icon-size-48 sam-icon sam-color-two">&#xf103;</a>
                                <a target="_blank" href="http://www.instagram.com/littlebluebag">Folge <strong>Sandra</strong> auf Instagram</a>
                            </p>
                        </div>
                    </div>

                    <div class="text-center col-xs-12">
                        <h3 class="featured-posts"><?php _e('Our Vlog', 'littlebluebag' ); ?></h3>
                        <div class="teaser-box videoWrapper">
                            <iframe src="//www.youtube.com/embed/?list=PLvr0Ef_Rv_qkBq1YZjyF2nLdWyAkwQk7L" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div> <!-- col-md-4 -->

            <div class="col-md-8">
                <div class="row image-wall">
                    <div class="visible-xs visible-sm">
                        <h3 class="featured-posts"><?php _e('Articles', 'littlebluebag' ); ?></h3>
                    </div>
                    <?php
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                            get_template_part( 'frontpost');
                        endwhile;
                        else :
                            // If no content, include the "No posts found" template.
                            get_template_part( 'content', 'none' );
                        endif;
                    ?>
                </div> <!-- row imagewall -->

                <div id="amazon-search" class="row text-center">
                    <script charset="utf-8" type="text/javascript">
                        amzn_assoc_ad_type = "responsive_search_widget";
                        amzn_assoc_tracking_id = "weddingsam-21";
                        amzn_assoc_marketplace = "amazon";
                        amzn_assoc_region = "DE";
                        amzn_assoc_placement = "";
                        amzn_assoc_search_type = "search_box";
                        amzn_assoc_width = "auto";
                        amzn_assoc_height = "auto";
                        amzn_assoc_default_search_category = "";
                        amzn_assoc_default_search_key = "";
                        amzn_assoc_theme = "light";
                        amzn_assoc_bg_color = "000000";
                    </script>
                    <script src="//z-eu.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&Operation=GetScript&ID=OneJS&WS=1&MarketPlace=DE"></script>
                </div>
            </div> <!-- col-md-8 -->

            <div class="clearfix"></div>

            <!-- pager -->
            <div class="text-center">
                <?php grayskull_numeric_posts_nav(); ?>
            </div>
        </div>

        <!-- Custom Category One -->
        <?php
        $query = new WP_Query( array (
          'post_type' => 'post',
          'posts_per_page' => '3',
          'category_name' => lbb_get_category(get_theme_mod('lbb_custom_cat_1'))->slug
        ));

        if ( $query->have_posts() ) : ?>

            <div class="row">
                <h2 id="featured-posts"><?php _e(lbb_get_category(get_theme_mod('lbb_custom_cat_1'))->name, 'littlebluebag' ); ?></h2>

                <?php //// Start the Loop.
                while ( $query->have_posts() ) : $query->the_post(); ?>

                    <div class="col-md-4 col-sm-4 col-xs-12 sam-featured">
                        <a class="img-wrap" href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail("image-wall", array('class' => 'img-responsive lbb-feature-image')); ?>
                            <div><!-- <p><?php echo get_the_title(); ?> </p>--> </div>
                        </a>
                    </div>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <div class="row space-top">
            <div class="col-xs-12">
                <div class="panel panel-default panel-newsletter">
                    <div class="panel-body  ">
                        <h3>Newsletter</h3>
                        <hr class="visible-sm visible-md visible-lg"/>
                        <p class="visible-md visible-lg">
                            Ihr wollt immer von den neuesten Neuigkeiten erfahren? Kein Problem!
                            Meldet euch für unseren monatlichen Newsletter an.
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

        <!-- Most Read Articles -->
        <?php
        $query = new WP_Query( array (
          'post_type' => 'post',
          'posts_per_page' => '3',
          'category_name' => 'featured'
        ));

        if ( $query->have_posts() ) : ?>
            <div class="row">
                <h2 id="featured-posts"><?php _e( 'Most Popular Articles', 'littlebluebag' ); ?></h2>

                <?php //// Start the Loop.
                while ( $query->have_posts() ) : $query->the_post(); ?>

                    <div class="col-md-4 col-sm-4 col-xs-12 sam-featured">
                        <a class="img-wrap" href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail("image-wall", array('class' => 'img-responsive lbb-feature-image')); ?>
                            <div><!-- <p><?php echo get_the_title(); ?> </p>--> </div>
                        </a>
                    </div>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <div class="clearfix space-top"></div>
    </div>
<?php
get_footer();