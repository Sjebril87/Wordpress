<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Voyage
 * @subpackage Voyage1
 * @since Voyage 1.0
 */
get_header(); ?>
<div id="content" class="<?php echo voyage_grid_class(); ?> clearfix" role="main">
	<?php get_template_part( 'content-none' ); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
