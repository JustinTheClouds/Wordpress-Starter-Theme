<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>

    <div class="content columns eight">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

			<?php postedOn(); ?>

			<div class="entry">
				<?php the_content(); ?>
			</div>

			<footer class="postmetadata">
				<?php the_tags(__('Tags: ','justintheclouds'), ', ', '<br />'); ?>
				<?php _e('Posted in','justintheclouds'); ?> <?php the_category(', ') ?> | 
				<?php comments_popup_link(__('No Comments &#187;','justintheclouds'), __('1 Comment &#187;','justintheclouds'), __('% Comments &#187;','justintheclouds')); ?>
			</footer>

		</article>

	<?php endwhile; ?>

	<?php postNavigation(); ?>

	<?php else : ?>

		<h2><?php _e('Nothing Found','justintheclouds'); ?></h2>

	<?php endif; ?>
        
    </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
