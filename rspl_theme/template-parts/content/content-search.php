<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rspl-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<?php rspl_theme_post_thumbnail(); ?>

	<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			rspl_theme_posted_on();
			rspl_theme_category_list();
			?>
		</div><!-- .entry-meta -->
	<?php endif; ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php rspl_theme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
