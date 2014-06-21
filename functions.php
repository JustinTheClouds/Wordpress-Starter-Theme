<?php
/**
 * @package WordPress
 * @subpackage JustinTheClouds Starter Theme
 * @since HTML5 Reset 2.0
 */

	// Options Framework (https://github.com/devinsays/options-framework-plugin)
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/' );
		require_once dirname( __FILE__ ) . '/admin/options-framework.php';
    }	
        
    // Enable archive page menu adding
    // require_once dirname(__FILE__) . '/admin/enable-custom-archive-pages.php';

	// Theme Setup (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function justintheclouds_setup() {
		load_theme_textdomain( 'justintheclouds', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );	
		add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) );
		add_theme_support( 'post-thumbnails' );
        
        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'primary'   => __( 'Top primary menu', 'justintheclouds' ),
            'footer' => __( 'Footer menu if different from primary', 'justintheclouds' ),
        ) );
        
        add_editor_style( array( 'css/entry-content-base.css', get_template_directory_uri() ) );
	}
	add_action( 'after_setup_theme', 'justintheclouds_setup' );
	
	// Scripts & Styles
	function justintheclouds_scripts_styles() {
		global $wp_styles;

		// Load Comments	
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	
		// Load Stylesheets
        wp_enqueue_style( 'gumby', get_template_directory_uri() . '/css/gumby-bare.css' );
        wp_enqueue_style( 'base', get_template_directory_uri() . '/css/styles.css' );
        wp_enqueue_style( 'style', get_stylesheet_uri() );
	
		// Load scripts
		wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.1.0.js' );
		wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/functions.js', array('jquery') );
		
	}
	add_action( 'wp_enqueue_scripts', 'justintheclouds_scripts_styles' );
	
	// WP Title (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function justintheclouds_wp_title( $title, $sep ) {
		global $paged, $page;
	
		if ( is_feed() )
			return $title;
	
        // Add the site name.
		$title .= get_bloginfo( 'name' );
	
        // Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
	
        // Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'justintheclouds' ), max( $paged, $page ) );
//FIX
//		if (function_exists('is_tag') && is_tag()) {
//		   single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
//		elseif (is_archive()) {
//		   wp_title(''); echo ' Archive - '; }
//		elseif (is_search()) {
//		   echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
//		elseif (!(is_404()) && (is_single()) || (is_page())) {
//		   wp_title(''); echo ' - '; }
//		elseif (is_404()) {
//		   echo 'Not Found - '; }
//		if (is_home()) {
//		   bloginfo('name'); echo ' - '; bloginfo('description'); }
//		else {
//		    bloginfo('name'); }
//		if ($paged>1) {
//		   echo ' - page '. $paged; }
	
		return $title;
	}
	add_filter( 'wp_title', 'justintheclouds_wp_title', 10, 2 );

	// Load jQuery
	if ( !function_exists( 'core_mods' ) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script( 'jquery' );
				wp_register_script( 'jquery', ( "//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ), false);
				wp_enqueue_script( 'jquery' );
			}
		}
		add_action( 'wp_enqueue_scripts', 'core_mods' );
	}

	// Clean up the <head>, if you so desire.
	function removeHeadLinks() {
	 	remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
	}
	add_action('init', 'removeHeadLinks');

	// Widgets
	if ( function_exists('register_sidebar' )) {
		function justintheclouds_widgets_init() {
			register_sidebar( array(
				'name'          => __( 'Sidebar Widgets', 'justintheclouds' ),
				'id'            => 'sidebar-primary',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
		}
		add_action( 'widgets_init', 'justintheclouds_widgets_init' );
	}

	// Navigation - update coming from twentythirteen
	function postNavigation() {
        
        echo '<div class="navigation">';
        
        if(is_single()) {
            echo '	<div class="next-post" rel="next">'. next_post_link() .'</div>';
            echo '	<div class="prev-post" rel="prev">'. previous_post_link() .'</div>';
        } else {
            echo '	<div class="next-posts" rel="next">'. next_posts_link() .'</div>';
            echo '	<div class="prev-posts" rel="prev">'. previous_posts_link() .'</div>';
        }
        
		echo '</div>';
	}

	// Posted On
	function postedOn() {
		printf( __( '<span class="sep">Posted </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a> by <span class="byline author vcard">%5$s</span>', '' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_author() )
		);
	}

    // Archive Page Heading
    function archiveHeading($el='h2') {
        
        // Hack. Set $post so that the_date() works.
        $post = $posts[0];

        // If this is a category archive
        if (is_category()) {
            $title = __('Archive for the', 'justintheclouds') . " &#8216; " . single_cat_title('', false) . " &#8217; " . __('Category', 'justintheclouds');
        
        // If this is a tag archive
        } elseif( is_tag() ) {
            $title = __('Posts Tagged', 'justintheclouds') . " &#8216; " . single_tag_title('', false) . " &#8217;";
            
        // If this is a daily archive
        } elseif (is_day()) {
            $title = __('Archive for', 'justintheclouds') . ' ' . the_time('F jS, Y');
            
        // If this is a monthly archive
        } elseif (is_month()) {
            $title = __('Archive for', 'justintheclouds') . ' ' . the_time('F, Y');
            
        // If this is a yearly archive
        } elseif (is_year()) {
           $title = __('Archive for', 'justintheclouds') . ' ' . the_time('Y');
                              
        // If this is an author archive
        } elseif (is_author()) {
            $title = __('Author Archive', 'justintheclouds');
            
        // If this is a paged archive
        } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
            $title = __('Blog Archives', 'justintheclouds');
        }
        
        echo "<$el class=\"archive-title\">$title</$el>";
    }

    function socialIcons($size) {
        
        $fb = of_get_option("social_facebook");
        $tw = of_get_option("social_twitter");
        $ig = of_get_option("social_instagram");
        $pi = of_get_option("social_pinterest");
        
        if(!$fb && !$tw && !$ig && !$pi) return;
        
        echo '<div class="social-icons">';
        if($fb) {
            echo '<a href="' . $fb . '" target="_blank"><i class="fa fa-facebook fa-'.$size.'"></i></a>';
        }
        if($tw) {
            echo '<a href="' . $tw . '" target="_blank"><i class="fa fa-twitter fa-'.$size.'"></i></a>';
        }
        if($ig) {
            echo '<a href="' . $ig . '" target="_blank"><i class="fa fa-instagram fa-'.$size.'"></i></a>';
        }
        if($pi) {
            echo '<a href="' . $pi . '" target="_blank"><i class="fa fa-pinterest fa-'.$size.'"></i></a>';
        }
        echo '</div>';
    }

    // Add schema.org microdata
    function microdata($type) {
        switch($type) {
            case 'BlogPosting':
                echo '<meta itemprop="name" content="' . get_the_title() . '" />';
                echo '<meta itemprop="url" content="' . get_permalink() . '" />';
                echo '<meta itemprop="articleBody" content="' . get_the_content() . '" />';
                echo '<meta itemprop="datePublished" content="' . get_the_date('c') . '" />';
                break;
        }
    }

?>
