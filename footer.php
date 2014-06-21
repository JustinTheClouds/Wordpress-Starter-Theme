<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
?>
        </main>

		<footer id="footer" class="row" role="contentinfo">
            <nav class="row">
                <?php wp_nav_menu( array('menu' => 'footer') ); ?>
            </nav>
            <div class="row">
                <small class="copyright columns sic">&copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?></small>
                <div class="columns six built-by"><a href="http://justintheclouds.com" target="_blank"><span class="Justin"><span class="J">J</span>ustin</span><span class="The">The</span><span class="Clouds">Clouds</span></a></div>
            </div>
		</footer>

	</div>

	<?php wp_footer(); ?>

    <!-- this is where we put our custom functions -->
    <script src="<?php bloginfo('template_directory'); ?>/js/functions.js"></script>

    <?php if($_SERVER['HTTP_HOST'] != 'localhost' && of_get_option('apis_ga_id') && of_get_option('apis_ga_domain')): ?>
    <!-- Google analytics-->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', '<?php echo of_get_option('apis_ga_id'); ?>', '<?php echo of_get_option('apis_ga_domain'); ?>');
      ga('send', 'pageview');
    </script>
    <!-- Google analytics-->
    <?php endif; ?>
	
</body>

</html>
