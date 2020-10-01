<div class="featured-area">
		
	<div id="owl-demo" class="owl-carousel">
		
		<?php

			$number = get_theme_mod( 'odierlite_featured_number' );
		
		?>
		
		<?php $feat_query = new WP_Query( array( 'cat' => '', 'showposts' => $number ) ); ?>

		<?php if ($feat_query->have_posts()) : while ($feat_query->have_posts()) : $feat_query->the_post(); ?>

			<div class="item" style="background-image:url(<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'odierlite-slider-thumb' ); if(!$image) { echo get_template_directory_uri() . '/img/slider-default.jpg'; } else { echo esc_url($image[0]); } ?>);">

				<div class="feat-overlay">
					<div class="feat-text">
						<span class="feat-cat"><?php the_category(', '); ?></span>
						<h3><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h3>
					</div>
				</div>

			</div>
			
		<?php endwhile; endif; ?>

		<?php wp_reset_postdata(); ?>

	</div>
	
</div>