<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>

    <div class="content columns eight">

		<?php if (have_posts()) : ?>
        
            <?php archiveHeading(); ?>

			<?php postNavigation(); ?>

			<?php while (have_posts()) : the_post(); ?>
			
				<article <?php post_class() ?> itemscope itemtype="http://schema.org/BlogPosting">
				
                    <?php microdata('BlogPosting'); ?>

                    <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

                    <?php postedOn(); ?>

                    <div class="entry">
                        <?php the_content(); ?>
                    </div>

				</article>

			<?php endwhile; ?>

			<?php postNavigation(); ?>
			
	<?php else : ?>

		<h2><?php _e('Nothing Found','justintheclouds'); ?></h2>

	<?php endif; ?>
        
    </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
