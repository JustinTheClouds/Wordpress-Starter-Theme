<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
?>
		<footer id="footer" class="source-org vcard copyright" role="contentinfo">
			<small>&copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?></small>
		</footer>

	</div>

	<?php wp_footer(); ?>


<!-- here comes the javascript -->

<!-- jQuery is called via the WordPress-friendly way via functions.php -->

<!-- this is where we put our custom functions -->
<script src="<?php bloginfo('template_directory'); ?>/_/js/functions.js"></script>

<?php if($_SERVER['HTTP_HOST'] != 'localhosts' && of_get_option('apis_ga_id') && of_get_option('apis_ga_domain')): ?>
<!-- Asynchronous google analytics; this is the official snippet. -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', '<?php echo of_get_option('apis_ga_id'); ?>', '<?php echo of_get_option('apis_ga_domain'); ?>');
  ga('send', 'pageview');
</script>
<!-- Asynchronous google analytics; this is the official snippet. -->
<?php endif; ?>
	
</body>

</html>
