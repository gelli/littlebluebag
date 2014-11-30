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
  <div class="lbb-feature">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail("image-wall", array('class' => 'img-responsive lbb-feature-image')); ?>
      </a>

    <?php /*
    <div class="lbb-feature-meta">
      <h2><?php echo get_the_title(); ?></h2>
    </div> */ ?>
  </div>
</div>

