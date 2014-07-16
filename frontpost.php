<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
    <div class="col-md-6 col-xs-12">
        <a class="img-wrap" href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail("image-wall", array('class' => 'img-responsive')); ?>
            <div><!-- <p><?php echo get_the_title(); ?> </p>--> </div>
        </a>
    </div>

