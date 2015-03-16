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


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
        <div class="post-date">
            <div class="month"><?php echo get_the_date('M'); ?></div>
            <div class="day"><?php echo get_the_date('d'); ?></div>
        </div>


    <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?>
		<?php
			endif;

			if ( is_single() ) :
				the_title(
                    '<h1 class="entry-title">',
                    '</h1>'
                );
			else :
				the_title(
                    '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">',
                    '</a></h1>' );
			endif;
		?>

        <div class="entry-meta clearfix">

          <?php
          // Set up and print post meta information.
          printf( '<span class="entry-date"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span> <a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span>',
          esc_url( get_permalink() ),
          esc_attr( get_the_date( 'c' ) ),
          esc_html( get_the_date() ),
          esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
          );
          ?>

          <span class="cat-links"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> <?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span>

            <?php
            if ( 'post' == get_post_type() )
                /* twentyfourteen_posted_on(); */

                if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
                    ?>
                    &nbsp;<span class="comments-link"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <?php comments_popup_link( __( 'Leave a comment', 'twentyfourteen' ), __( '1 Comment', 'twentyfourteen' ), __( '% Comments', 'twentyfourteen' ) ); ?></span>
                <?php
                endif;

            edit_post_link( __( 'Edit', 'twentyfourteen' ), '&nbsp;<span class="edit-link"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> ', '</span>' );
            ?>
        </div><!-- .entry-meta -->


	</header><!-- .entry-header -->

    <?php if (!is_single()) : ?>
    <div class="entry-thumb">
        <a href="<?php echo esc_url(get_permalink()); ?>">
            <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?>
        </a>
    </div>

    <?php endif; ?>

    <?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php
            if( is_single() or strpos($post->post_content, '<!--more-->') >= 1 ) {
                the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ) );
            } else {
                the_excerpt();
            }

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php endif; ?>
    <!--
	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?> -->
</article><!-- #post-## -->
<div class="clearfix"> </div>