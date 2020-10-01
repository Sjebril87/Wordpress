<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package odierlite
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
			<?php printf(esc_html__('%1$s %2$s %3$s', 'odierlite'), '&copy;', esc_attr(date_i18n(__('Y', 'odierlite'))), esc_attr(get_bloginfo())); ?>
                <span class="sep"> &ndash; </span>
            <?php printf(esc_html__('%1$s OdierLite theme by %2$s', 'odierlite'), '', '<a href="' . esc_url('https://zthemes.net/', 'odierlite') . '">ZThemes</a>'); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
