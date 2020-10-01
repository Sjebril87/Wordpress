<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travel Ace
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-item">
		
		<div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
        </div><!-- .featured-image -->

    	<div class="blog-overlay"></div>

		<div class="entry-container">
			<header class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</header><!-- .entry-header -->
			
			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php travel_ace_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</div><!-- .entry-container -->
	</div><!-- .post-item -->
</article><!-- #post-## -->
