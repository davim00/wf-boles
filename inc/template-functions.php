<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package William_Boles
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wfboles_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'wfboles_body_classes' );



/**
 * Modify the Read More link
 *
 * @link https://codex.wordpress.org/Customizing_the_Read_More
 */
 function modify_read_more_link() {
    return '<div class="read-more-link"><a class="more-link" href="' . get_permalink() . '">Read more</a></div>';
	}
add_filter( 'the_content_more_link', 'modify_read_more_link' );



/**
 * Modify the post password form output
 */
add_filter( 'the_password_form', 'custom_password_form' );
function custom_password_form() {
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$output = '<form class="post-password-form" action="' . esc_url( site_url('/wp-login.php?action=postpass', 'login_post') ) . '" method="post"><p>' . __( 'This content is password protected. To view it please enter your password below:' ) . '</p><div class="form-group form-inline"><label for="' . $label . '" class="sr-only">Password</label><input name="post-password" id="' . $label . '" type="password" placeholder="Password" class="form-control"/><input type="submit" name="Submit" class="password-submit btn btn-default" value="' . esc_attr__( "Submit" ) . '" /></div></form>';
	return $output;
};







/**
 * Display the featured image and set a fallback image
 * if there is not featured image.
 */
 function wfboles_post_thumbnail() {
	 if ( has_post_thumbnail() ) {
		 the_post_thumbnail();
	 } else {
		 ?>	<img src="<?php echo esc_url( bloginfo('template_directory') . '/images/featured-img-fallback.jpg' ); ?>" alt="<?php the_title(); ?>" />
		<?php ;
 	 }
 }



 /**
  * Display the site logo.
  */
 function wfboles_the_custom_logo() {
	 if ( function_exists( 'the_custom_logo' ) ) {
		 if ( has_custom_logo() ) {
			 the_custom_logo();
		 } else { ?>
			 <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		 <?php }
 	}
 }
// Make the custom logo play nicely with Bootstrap
 add_filter('get_custom_logo','change_logo_class');
 function change_logo_class($html) {
	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
	return $html;
 }
 add_filter( 'get_custom_logo', 'remove_width_attribute', 10 );
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}



/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function wfboles_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => true,
		),

		// This is an example of the use of 'is_callable' functionality. A user could - for instance -
		// have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
		// 'wordpress-seo-premium'.
		// By setting 'is_callable' to either a function from that plugin or a class method
		// `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
		// recognize the plugin as being installed.
		// array(
		// 	'name'        => 'WordPress SEO by Yoast',
		//	'slug'        => 'wordpress-seo',
		//	'is_callable' => 'wpseo_init',
		// ),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'wfboles',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'wfboles' ),
			'menu_title'                      => __( 'Install Plugins', 'wfboles' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'wfboles' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'wfboles' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'wfboles' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'wfboles'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'wfboles'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'wfboles'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'wfboles'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'wfboles'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'wfboles'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'wfboles'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'wfboles'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'wfboles'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'wfboles' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'wfboles' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'wfboles' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'wfboles' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'wfboles' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'wfboles' ),
			'dismiss'                         => __( 'Dismiss this notice', 'wfboles' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'wfboles' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'wfboles' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}
