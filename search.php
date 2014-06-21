<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>

    <div class="columns eight">

	<?php if (have_posts()) : ?>

		<h2><?php _e('Search Results','justintheclouds'); ?></h2>

		<?php postNavigation(); ?>

		<?php while (have_posts()) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<h2><?php the_title(); ?></h2>

				<?php postedOn(); ?>

				<div class="entry">

					<?php the_excerpt(); ?>

				</div>

			</article>

		<?php endwhile; ?>

		<?php postNavigation(); ?>

	<?php else : ?>

		<h2><?php _e('Nothing Found','justintheclouds'); ?></h2>

	<?php endif; ?>
        
    </div>/

<?php get_sidebar(); ?>

<?php get_footer(); ?>
