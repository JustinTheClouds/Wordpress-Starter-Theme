<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'html5reset'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	$options = array();
    
    
    $options[] = array(
		'name' => __('Design', 'html5reset'),
		'type' => 'heading');
    $options[] = array(
		'name' => __('Header Logo', 'html5reset'),
		'desc' => __('', 'html5reset'),
		'id' => 'design_logo',
		'type' => 'upload');
    
    $options[] = array(
		'name' => __('Contact', 'html5reset'),
		'type' => 'heading');
    $options[] = array(
		'name' => __('Address', 'html5reset'),
		'desc' => __("123 Superman St. #123", 'html5reset'),
		'id' => 'contact_address',
		'std' => '',
		'type' => 'text');
    $options[] = array(
		'name' => __('City', 'html5reset'),
		'desc' => __("Austin", 'html5reset'),
		'id' => 'contact_city',
		'std' => '',
		'type' => 'text');
    $options[] = array(
		'name' => __('State', 'html5reset'),
		'desc' => __("TX", 'html5reset'),
		'id' => 'contact_state',
		'std' => '',
		'type' => 'text');
    $options[] = array(
		'name' => __('Zip', 'html5reset'),
		'desc' => __("78753", 'html5reset'),
		'id' => 'contact_zip',
		'std' => '',
		'type' => 'text');
    $options[] = array(
		'name' => __('Phone', 'html5reset'),
		'desc' => __("(123)123-1234", 'html5reset'),
		'id' => 'contact_phone',
		'std' => '',
		'type' => 'text');
    $options[] = array(
		'name' => __('Fax', 'html5reset'),
		'desc' => __("(123)123-1234", 'html5reset'),
		'id' => 'contact_fax',
		'std' => '',
		'type' => 'text');
    $options[] = array(
		'name' => __('Hours', 'html5reset'),
		'desc' => __("Monday to Saturday, 10AM to 7PM and Sundays, 12PM to 5PM", 'html5reset'),
		'id' => 'contact_hours',
		'std' => '',
		'type' => 'text');
    
    $options[] = array(
		'name' => __('Social', 'html5reset'),
		'type' => 'heading');
    $options[] = array(
		'name' => __('Facebook Link', 'html5reset'),
		'desc' => __("http://www.facebook.com/username", 'html5reset'),
		'id' => 'social_facebook',
		'std' => '',
		'type' => 'text');
    $options[] = array(
		'name' => __('Twitter Link', 'html5reset'),
		'desc' => __("http://www.twitter.com/username", 'html5reset'),
		'id' => 'social_twitter',
		'std' => '',
		'type' => 'text');
    $options[] = array(
		'name' => __('Instagram Link', 'html5reset'),
		'desc' => __("http://www.instagram.com/username", 'html5reset'),
		'id' => 'social_instagram',
		'std' => '',
		'type' => 'text');
    $options[] = array(
		'name' => __('Pinterest Link', 'html5reset'),
		'desc' => __("http://www.pinterest.com/username", 'html5reset'),
		'id' => 'social_pinterest',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Header Meta', 'html5reset'),
		'type' => 'heading');

// Standard Meta
	$options[] = array(
		'name' => __('Head ID', 'html5reset'),
		'desc' => __("", 'html5reset'),
		'id' => 'meta_headid',
		'std' => 'www-sitename-com',
		'type' => 'text');
	$options[] = array(
		'name' => __('Google Webmasters', 'html5reset'),
		'desc' => __("Speaking of Google, don't forget to set your site up: <a href='http://google.com/webmasters' target='_blank'>http://google.com/webmasters</a>", 'html5reset'),
		'id' => 'meta_google',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Author Name', 'html5reset'),
		'desc' => __('Populates meta author tag.', 'html5reset'),
		'id' => 'meta_author',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Mobile Viewport', 'html5reset'),
		'desc' => __('Uncomment to use; use thoughtfully!', 'html5reset'),
		'id' => 'meta_viewport',
		'std' => 'width=device-width, initial-scale=1.0',
		'type' => 'text');

// Icons
	$options[] = array(
		'name' => __('Site Favicon', 'html5reset'),
		'desc' => __('', 'html5reset'),
		'id' => 'head_favicon',
		'type' => 'upload');
	$options[] = array(
		'name' => __('Apple Touch Icon', 'html5reset'),
		'desc' => __('', 'html5reset'),
		'id' => 'head_apple_touch_icon',
		'type' => 'upload');

// App: Windows 8
	$options[] = array(
		'name' => __('App: Windows 8', 'html5reset'),
		'desc' => __('Application Name', 'html5reset'),
		'id' => 'meta_app_win_name',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('Tile Color', 'html5reset'),
		'id' => 'meta_app_win_color',
		'std' => '',
		'type' => 'color');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('Tile Image', 'html5reset'),
		'id' => 'meta_app_win_image',
		'std' => '',
		'type' => 'upload');

// App: Twitter
	$options[] = array(
		'name' => __('App: Twitter Card', 'html5reset'),
		'desc' => __('twitter:card (summary, photo, gallery, product, app, player)', 'html5reset'),
		'id' => 'meta_app_twt_card',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('twitter:site (@username of website)', 'html5reset'),
		'id' => 'meta_app_twt_site',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __("twitter:title (the user's Twitter ID)", 'html5reset'),
		'id' => 'meta_app_twt_title',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('twitter:description (maximum 200 characters)', 'html5reset'),
		'id' => 'meta_app_twt_description',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('twitter:url (url for the content)', 'html5reset'),
		'id' => 'meta_app_twt_url',
		'std' => '',
		'type' => 'text');

// App: Facebook
	$options[] = array(
		'name' => __('App: Facebook', 'html5reset'),
		'desc' => __('og:title', 'html5reset'),
		'id' => 'meta_app_fb_title',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('og:description', 'html5reset'),
		'id' => 'meta_app_fb_description',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('og:url', 'html5reset'),
		'id' => 'meta_app_fb_url',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'html5reset'),
		'desc' => __('og:image', 'html5reset'),
		'id' => 'meta_app_fb_image',
		'std' => '',
		'type' => 'upload');
    
    // API Settings
    $options[] = array(
		'name' => __('APIs', 'html5reset'),
		'type' => 'heading');
    $options[] = array(
		'name' => __('Google Analytics ID', 'html5reset'),
		'desc' => __('UA-XXXXXXX-XX', 'html5reset'),
		'id' => 'apis_ga_id',
		'std' => '',
		'type' => 'text');
    $options[] = array(
		'name' => __('Google Analytics Domain', 'html5reset'),
		'desc' => __('domain.com', 'html5reset'),
		'id' => 'apis_ga_domain',
		'std' => '',
		'type' => 'text');

	return $options;

}