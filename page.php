<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>

    <div class="content columns eight">
        
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<article id="post-<?php the_ID(); ?>">

			<h2><?php the_title(); ?></h2>

			<div class="entry">

                <div class="entry-content">
				    <?php the_content(); ?>
                </div>

				<?php wp_link_pages(array('before' => __('Pages: '), 'next_or_number' => 'number')); ?>

			</div>

			<?php edit_post_link(__('Edit this entry.'), '<p>', '</p>'); ?>

		</article>

		<?php endwhile; endif; ?>
        
    </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
