<?php
/**
 * William Boles Theme Customizer
 *
 * @package William_Boles
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wfboles_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'header_image' );
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->remove_section( 'custom_css' );

	$wp_customize->remove_setting( 'blogdescription' );
	$wp_customize->remove_setting( 'site_icon' );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'wfboles_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'wfboles_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'wfboles_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function wfboles_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function wfboles_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wfboles_customize_preview_js() {
	wp_enqueue_script( 'wfboles_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'wfboles_customize_preview_js' );

/**
 * Add the theme configuration
 */
wfboles_Kirki::add_config( 'wfboles_theme', array(
	'option_type' => 'theme_mod',
	'capability'  => 'edit_theme_options',
) );

/**
 * Add the front page panel
 */
wfboles_Kirki::add_panel( 'frontpage_panel', array(
    'priority'    => 130,
    'title'       => __( 'Front Page Options', 'wfboles' ),
    'description' => __( 'Edit the options for the static front page', 'wfboles' ),
) );

/**
 * Add the header section
 */
wfboles_Kirki::add_section( 'frontpage_header', array(
	'title'      => esc_attr__( 'Header', 'wfboles' ),
	'panel'      => 'frontpage_panel',
	'priority'   => 10,
	'capability' => 'edit_theme_options',
) );

/**
 * Add the header toggle control
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'				=> 'switch',
	'settings'		=> 'header_switch',
	'label'				=> esc_attr__( 'Show the header', 'wfboles' ),
	'description'	=> esc_attr__( 'Display an image header with custom text instead of the page header.', 'wfboles' ),
	'help'				=> esc_attr__( 'Selecting &ldquo;Yes&rdquo; will display a header with a custom background image, text, and optional CTA button.', 'wfboles' ),
	'section'			=> 'frontpage_header',
	'priority'		=> 10,
	'default'			=> '0',
	'choices'			=> array(
		'on'  => esc_attr__( 'Yes', 'wfboles' ),
		'off' => esc_attr__( 'No', 'wfboles' )
	)
) );

/**
 * Add the header background
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        			=> 'image',
	'settings'    			=> 'header_bg_image',
	'label'       			=> esc_attr__( 'Header background image', 'wfboles' ),
	'description' 			=> esc_attr__( 'The image shown in the background of the header', 'wfboles' ),
	'help'        			=> esc_attr__( 'Select an image from the media gallery, or upload a new one. Landscape images work best.', 'wfboles' ),
	'section'     			=> 'frontpage_header',
	'default'     			=> get_template_directory_uri() . '/images/header-bg.jpg',
	'priority'    			=> 20,
	'active_callback'   => array(
		array(
			'setting'  => 'header_switch',
			'operator' => '==',
			'value'    => true,
		),
	)
) );

/**
 * Add the header text
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        			=> 'text',
	'settings'    			=> 'header_text',
	'label'       			=> esc_attr__( 'Header text', 'wfboles' ),
	'description' 			=> esc_attr__( 'The header text', 'wfboles' ),
	'help'        			=> esc_attr__( 'Type the text for the header. HTML is not allowed.', 'wfboles' ),
	'section'     			=> 'frontpage_header',
	'default'     			=> esc_attr__( 'Lorem ipsum dolor sit amet.', 'wfboles' ),
	'priority'    			=> 30,
	'active_callback'   => array(
		array(
			'setting'  => 'header_switch',
			'operator' => '==',
			'value'    => true,
		),
	)
) );

/**
 * Add the subheader text
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        			=> 'text',
	'settings'    			=> 'subheader_text',
	'label'       			=> esc_attr__( 'Subheader text', 'wfboles' ),
	'description' 			=> esc_attr__( 'The subheader text', 'wfboles' ),
	'help'        			=> esc_attr__( 'Type the text for the subheader. HTML is not allowed.', 'wfboles' ),
	'section'     			=> 'frontpage_header',
	'default'     			=> esc_attr__( 'Etiam diam risus, sagittis at urna id, malesuada semper justo ut id.', 'wfboles' ),
	'priority'    			=> 40,
	'active_callback'   => array(
		array(
			'setting'  => 'header_switch',
			'operator' => '==',
			'value'    => true,
		),
	)
) );

/**
 * Add the header CTA toggle
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        			=> 'checkbox',
	'settings'    			=> 'header_CTA_toggle',
	'label'       			=> esc_attr__( 'Add a button', 'wfboles' ),
	'description' 			=> esc_attr__( 'Add a button link in the header', 'wfboles' ),
	'help'        			=> esc_attr__( 'You can put a button style link in the header. Good for a call-to-action.', 'wfboles' ),
	'section'     			=> 'frontpage_header',
	'default'     			=> '0',
	'priority'    			=> 50,
	'active_callback'   => array(
		array(
			'setting'  => 'header_switch',
			'operator' => '==',
			'value'    => true,
		),
	)
) );

/**
 * Add the CTA button text
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        			=> 'text',
	'settings'    			=> 'header_CTA_text',
	'label'       			=> esc_attr__( 'Button text', 'wfboles' ),
	'description' 			=> esc_attr__( 'The text for the button', 'wfboles' ),
	'help'        			=> esc_attr__( 'Type the text for the button link. HTML is not allowed.', 'wfboles' ),
	'section'     			=> 'frontpage_header',
	'default'     			=> esc_attr__( 'Find out more', 'wfboles' ),
	'priority'    			=> 60,
	'active_callback'   => array(
		array(
			'setting'  => 'header_switch',
			'operator' => '==',
			'value'    => true,
		),
		array(
			'setting'  => 'header_CTA_toggle',
			'operator' => '==',
			'value'    => true,
		),
	)
) );

/**
 * Add the CTA button link
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        			=> 'text',
	'settings'    			=> 'header_CTA_URL',
	'label'       			=> esc_attr__( 'Button link', 'wfboles' ),
	'description' 			=> esc_attr__( 'The link for the button', 'wfboles' ),
	'help'        			=> esc_attr__( 'Type the button link here. You may use any full URL (http...), page/post slug, or page anchor (#...).', 'wfboles' ),
	'section'     			=> 'frontpage_header',
	'default'     			=> '#',
	'priority'    			=> 70,
	'active_callback'   => array(
		array(
			'setting'  => 'header_switch',
			'operator' => '==',
			'value'    => true,
		),
		array(
			'setting'  => 'header_CTA_toggle',
			'operator' => '==',
			'value'    => true,
		),
	)
) );

/**
 * Add the about section
 */
wfboles_Kirki::add_section( 'frontpage_about', array(
	'title'      => esc_attr__( '&ldquo;About&rdquo; Section', 'wfboles' ),
	'panel'      => 'frontpage_panel',
	'priority'   => 20,
	'capability' => 'edit_theme_options',
) );

/**
 * Add the about section header text
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        			=> 'editor',
	'settings'    			=> 'about_header_text',
	'label'       			=> esc_attr__( '&ldquo;About&rdquo; section header', 'wfboles' ),
	'description' 			=> esc_attr__( 'The header text for the &ldquo;About&rdquo; section', 'wfboles' ),
	'help'        			=> esc_attr__( 'Type the text for the &ldquo;About&rdquo; section header. Use bold (<b></b>) to turn text color to the prinary theme color.', 'wfboles' ),
	'section'     			=> 'frontpage_about',
	'default'     			=> esc_attr__( 'Fusce tincidunt tempor lobortis.', 'wfboles' ),
	'priority'    			=> 20
) );

/**
 * Add the about section text
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        			=> 'editor',
	'settings'    			=> 'about_text',
	'label'       			=> esc_attr__( '&ldquo;About&rdquo; section text', 'wfboles' ),
	'description' 			=> esc_attr__( 'The text for the &ldquo;About&rdquo; section', 'wfboles' ),
	'help'        			=> esc_attr__( 'Type the text for the &ldquo;About&rdquo; section.', 'wfboles' ),
	'section'     			=> 'frontpage_about',
	'default'     			=> esc_attr__( 'Nunc condimentum sed mi ac efficitur. Vestibulum quis tempus felis, ac tincidunt tellus. Proin fermentum neque sed tempor accumsan. Cras elementum sem non justo cursus, vitae mattis dolor viverra. Pellentesque gravida gravida nulla sed tempor. Quisque efficitur congue elit id pellentesque. Praesent eros nisi, elementum quis tortor at, dignissim lobortis urna. Donec metus neque, tristique a orci ac, convallis sodales mauris. Mauris placerat dolor non dapibus rutrum.', 'wfboles' ),
	'priority'    			=> 30
) );

/**
 * Add the about section image
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        			=> 'image',
	'settings'    			=> 'about_image',
	'label'       			=> esc_attr__( '&ldquo;About&rdquo; section image', 'wfboles' ),
	'description' 			=> esc_attr__( 'The image for the &ldquo;About&rdquo; section', 'wfboles' ),
	'help'        			=> esc_attr__( 'Select the image for the &ldquo;About&rdquo; section.', 'wfboles' ),
	'section'     			=> 'frontpage_about',
	'default'     			=> get_template_directory_uri() . '/images/headshot.jpg',
	'priority'    			=> 40
) );

/**
 * Add the issues section
 */
wfboles_Kirki::add_section( 'frontpage_issues', array(
	'title'      => esc_attr__( '&ldquo;Issues&rdquo; Section', 'wfboles' ),
	'panel'      => 'frontpage_panel',
	'priority'   => 30,
	'capability' => 'edit_theme_options',
) );

/**
 * Add the issues section header text
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        			=> 'editor',
	'settings'    			=> 'issues_header_text',
	'label'       			=> esc_attr__( '&ldquo;Issues&rdquo; section header', 'wfboles' ),
	'description' 			=> esc_attr__( 'The header text for the &ldquo;Issues&rdquo; section', 'wfboles' ),
	'help'        			=> esc_attr__( 'Type the text for the &ldquo;Issues&rdquo; section header. Use bold (<b></b>) to turn text color to the prinary theme color.', 'wfboles' ),
	'section'     			=> 'frontpage_issues',
	'default'     			=> esc_attr__( 'Nulla nec nisl at ex ullamcorper sollicitudin sed.', 'wfboles' ),
	'priority'    			=> 10
) );

/**
 * Add the issues section text
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        			=> 'editor',
	'settings'    			=> 'issues_text',
	'label'       			=> esc_attr__( '&ldquo;Issues&rdquo; section text', 'wfboles' ),
	'description' 			=> esc_attr__( 'The text for the &ldquo;Issues&rdquo; section', 'wfboles' ),
	'help'        			=> esc_attr__( 'Type the text for the &ldquo;Issues&rdquo; section.', 'wfboles' ),
	'section'     			=> 'frontpage_issues',
	'default'     			=> esc_attr__( 'Integer ante tortor, pharetra vitae facilisis id, laoreet ut magna nulla facilisi quisque blandit.', 'wfboles' ),
	'priority'    			=> 20
) );

/**
 * Add the issues section background toggle
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        			=> 'radio',
	'settings'    			=> 'issues_bg_toggle',
	'label'       			=> esc_attr__( '“Issues” section background', 'wfboles' ),
	'description' 			=> esc_attr__( 'The background type for the &ldquo;Issues&rdquo; section', 'wfboles' ),
	'help'        			=> esc_attr__( 'Select whether to have a solid color or an image for the background.', 'wfboles' ),
	'section'     			=> 'frontpage_issues',
	'default'     			=> 'color',
	'priority'    			=> 30,
	'choices'						=> array(
		'color'		=> esc_attr__( 'Solid color', 'wfboles' ),
		'image'		=> esc_attr__( 'Image', 'wfboles' ),
	)
) );

/**
 * Add the issues section background color picker
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        			=> 'color',
	'settings'    			=> 'issues_bg_color',
	'label'       			=> esc_attr__( '&ldquo;Issues&rdquo; section background color', 'wfboles' ),
	'description' 			=> esc_attr__( 'The background color for the &ldquo;Issues&rdquo; section', 'wfboles' ),
	'help'        			=> esc_attr__( 'Select the color for the background.', 'wfboles' ),
	'section'     			=> 'frontpage_issues',
	'default'     			=> '#2B3B4C',
	'priority'    			=> 40,
	'active_callback'   => array(
		array(
			'setting'  => 'issues_bg_toggle',
			'operator' => '==',
			'value'    => 'color',
		),
	)
) );

/**
 * Add the issues section background image
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        			=> 'image',
	'settings'    			=> 'issues_bg_image',
	'label'       			=> esc_attr__( '&ldquo;Issues&rdquo; section background image', 'wfboles' ),
	'description' 			=> esc_attr__( 'The background image for the &ldquo;Issues&rdquo; section', 'wfboles' ),
	'help'        			=> esc_attr__( 'Select the image for the background. Landscape images work best. Use an image editor to adjust the contrast, brightness and color to improve the legibility of text.', 'wfboles' ),
	'section'     			=> 'frontpage_issues',
	'default'     			=> get_template_directory_url() . '/images/issues-bg.jpg',
	'priority'    			=> 50,
	'active_callback'   => array(
		array(
			'setting'  => 'issues_bg_toggle',
			'operator' => '==',
			'value'    => 'image',
		),
	)
) );

/**
 * Add the issues section repeater
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        			=> 'repeater',
	'settings'    			=> 'issues_repeater',
	'label'       			=> esc_attr__( '&ldquo;Issues&rdquo; section listing', 'wfboles' ),
	'description' 			=> esc_attr__( 'The list of issues for the &ldquo;Issues&rdquo; section', 'wfboles' ),
	'help'        			=> esc_attr__( 'Add images and short descriptions of the issues.', 'wfboles' ),
	'section'     			=> 'frontpage_issues',
	'row_label'					=> array(
		'type'  => 'text',
		'value' => esc_attr__( 'Issue', 'wfboles' )
	),
	'choices'						=> array(
		'limit'      => 6
	),
	'default'     			=> array(
		array(
			'issue_image'		=> get_template_directory_uri() . '/images/thumb.jpg',
			'issue_desc'		=> esc_attr__( 'Issue description', 'wfboles' ),
		),
		array(
			'issue_image'		=> get_template_directory_uri() . '/images/thumb.jpg',
			'issue_desc'		=> esc_attr__( 'Issue description', 'wfboles' ),
		),
		array(
			'issue_image'		=> get_template_directory_uri() . '/images/thumb.jpg',
			'issue_desc'		=> esc_attr__( 'Issue description', 'wfboles' ),
		),
	),
	'fields'						=> array(
		'issue_image'   => array(
			'type'         => 'image',
			'label'        => esc_attr__( 'Issue image', 'wfboles' ),
			'description'  => esc_attr__( 'Select an image that illustrates the issue', 'wfboles' ),
			'default'			 => get_template_directory_uri() . '/images/thumb.jpg'
		),
		'issue_desc'    => array(
			'type'         => 'text',
			'label'        => esc_attr__( 'Issue name', 'wfbole' ),
			'description'  => esc_attr__( 'Enter a short name of the issue', 'wfboles' ),
			'default'			 => esc_attr__( 'Issue description', 'wfboles' )
		)
	),
	'priority'    			=> 60
) );

/**
 * Add the typography section
 */
wfboles_Kirki::add_section( 'typography', array(
	'title'      => esc_attr__( 'Typography', 'wfboles' ),
	'priority'   => 50,
	'capability' => 'edit_theme_options',
) );

/**
 * Add the body-typography control
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        => 'typography',
	'settings'    => 'body_typography',
	'label'       => esc_attr__( 'Body Typography', 'wfboles' ),
	'description' => esc_attr__( 'Select the main typography options for your site.', 'wfboles' ),
	'help'        => esc_attr__( 'The typography options you set here apply to all content on your site.', 'wfboles' ),
	'section'     => 'typography',
	'priority'    => 10,
	'default'     => array(
		'font-family'    => '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI","Helvetica Neue",Arial,sans-serif',
		'variant'        => '400',
		'font-size'      => '16px',
		'line-height'    => '1.5',
		// 'letter-spacing' => '0',
		// 'color'          => '#333333',
	),
	'output' => array(
		array(
			'element' => 'body',
		),
	),
) );

/**
 * Add the header-typography control
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        => 'typography',
	'settings'    => 'headers_typography',
	'label'       => esc_attr__( 'Headers Typography', 'wfboles' ),
	'description' => esc_attr__( 'Select the typography options for your headers.', 'wfboles' ),
	'help'        => esc_attr__( 'The typography options you set here will override the Body Typography options for all headers on your site (post titles, widget titles etc).', 'wfboles' ),
	'section'     => 'typography',
	'priority'    => 20,
	'default'     => array(
		'font-family'    => '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI","Helvetica Neue",Arial,sans-serif',
		'variant'        => '400',
		'text-transform' => 'normal',
		// 'font-size'      => '16px',
		// 'line-height'    => '1.5',
		'letter-spacing' => '0',
		// 'color'          => '#333333',
	),
	'output' => array(
		array(
			'element' => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', '.h1', '.h2', '.h3', '.h4', '.h5', '.h6' ),
		),
	),
) );

/**
 * Add the brand-typography control
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        => 'typography',
	'settings'    => 'brand_typography',
	'label'       => esc_attr__( 'Brand Typography', 'wfboles' ),
	'description' => esc_attr__( 'Select the typography options for your brand.', 'wfboles' ),
	'help'        => esc_attr__( 'The typography options you set here will override the typography options for the brand text on your site.', 'wfboles' ),
	'section'     => 'typography',
	'priority'    => 30,
	'default'     => array(
		'font-family'    => '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI","Helvetica Neue",Arial,sans-serif',
		'variant'        => '400',
		'text-transform' => 'normal',
		// 'font-size'      => '16px',
		// 'line-height'    => '1.5',
		'letter-spacing' => '0',
		// 'color'          => '#333333',
	),
	'output' => array(
		array(
			'element' => '.site-title',
		),
	),
) );

/**
 * Add the jumbotron-typography control
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        => 'typography',
	'settings'    => 'jumbotron_typography',
	'label'       => esc_attr__( 'Hero Image Header', 'wfboles' ),
	'description' => esc_attr__( 'Select the typography options for your hero image header.', 'wfboles' ),
	'help'        => esc_attr__( 'The typography options you set here will override the typography options for the hero image header text on your site.', 'wfboles' ),
	'section'     => 'typography',
	'priority'    => 40,
	'default'     => array(
		'font-family'    => '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI","Helvetica Neue",Arial,sans-serif',
		'variant'        => '400',
		'text-transform' => 'normal',
		// 'font-size'      => '16px',
		// 'line-height'    => '1.5',
		'letter-spacing' => '0',
		// 'color'          => '#333333',
	),
	'output' => array(
		array(
			'element' => '.frontpage-jumbotron h1',
		),
	),
) );

/**
 * Add the form section
 */
wfboles_Kirki::add_section( 'form_section', array(
	'title'      => esc_attr__( 'Form Title and Text', 'wfboles' ),
	'priority'   => 135,
	'capability' => 'edit_theme_options',
) );

/**
 * Add the form section header text
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        			=> 'editor',
	'settings'    			=> 'form_header_text',
	'label'       			=> esc_attr__( 'Contact form header', 'wfboles' ),
	'description' 			=> esc_attr__( 'The header text for the contact form', 'wfboles' ),
	'help'        			=> esc_attr__( 'Type the text for the contact form header.', 'wfboles' ),
	'section'     			=> 'form_section',
	'default'     			=> esc_attr__( 'Contact us today.', 'wfboles' ),
	'priority'    			=> 10
) );

/**
 * Add the form section text
 */
wfboles_Kirki::add_field( 'wfboles_theme', array(
	'type'        			=> 'editor',
	'settings'    			=> 'form_text',
	'label'       			=> esc_attr__( 'Contact form instructions', 'wfboles' ),
	'description' 			=> esc_attr__( 'The instructions for the contact form', 'wfboles' ),
	'help'        			=> esc_attr__( 'Type the instructions for the contact form.', 'wfboles' ),
	'section'     			=> 'form_section',
	'default'     			=> esc_attr__( 'In eu mi rhoncus, euismod augue nec, vulputate nunc. Fusce hendrerit magna et felis fringilla, quis venenatis ex cursus. Nunc mattis molestie mi, id pulvinar libero fermentum sit amet. Duis id justo est. Ut cursus vehicula sodales. Integer pretium lectus in purus pulvinar, sit amet tempor eros accumsan.', 'wfboles' ),
	'priority'    			=> 20
) );

/**
 * Add the footer section
 */
wfboles_Kirki::add_section( 'footer_options', array(
	'title'      => esc_attr__( 'Footer Options', 'wfboles' ),
	'priority'   => 140,
	'capability' => 'edit_theme_options',
) );

/**
 * Display the copyright year with the (c) symbol
 */
 wfboles_Kirki::add_field( 'wfboles_theme', array(
 		'settings' => 'footer_copyright_year',
 		'label'    => __( 'Display the copyright year', 'axiom-america' ),
 		'section'  => 'footer_options',
 		'type'     => 'checkbox',
 		'default'	 => '1',
 		'priority' => 10,
 ) );

 /**
  * Text to show next to the copyright year
  */
  wfboles_Kirki::add_field( 'wfboles_theme', array(
		'settings' => 'footer_copyright_text',
		'label'    => __( 'Copyright text', 'wfboles' ),
		'section'  => 'footer_options',
		'type'     => 'text',
		'default'	 => esc_html__( 'William Boles. All rights reserved.', 'wfboles' ),
  	'priority' => 20,
		'active_callback' => array(
			array(
				'setting' => 'footer_copyright_year',
				'operator' => '==',
				'value' => true,
			)
		)
  ) );

 /**
  * Text to show on the right side of the footer
  */
	wfboles_Kirki::add_field( 'wfboles_theme', array(
			'settings' => 'footer_text',
			'label'    => __( 'Text at the bottom of the footer', 'wfboles' ),
			'section'  => 'footer_options',
			'type'     => 'editor',
			'default'	 => __( 'Theme: wfboles by <a href="http://mattdavisdesign.com" target="_blank">Matt Davis</a>.', 'wfboles' ),
			'priority' => 30,
	) );
