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
			
            <div class="entry">
                
                <h1 class="entry-title"><?php the_title(); ?></h1>

                <div class="entry-content">

                    <?php the_content(); ?>
                    
                </div>
                
                <div class="entry-meta">

                    <?php wp_link_pages(array('before' => __('Pages: '), 'next_or_number' => 'number')); ?>

                    <?php the_tags( __('Tags: '), ', ', ''); ?>

                    <?php postedOn(); ?>

                </div>
                
            </div>
			
			<?php edit_post_link(__('Edit this entry'),'','.'); ?>
			
		</article>

	<?php comments_template(); ?>

	<?php endwhile; endif; ?>

    <?php postNavigation(); ?>
        
    </div>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>