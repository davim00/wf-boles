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
 * Add the typography section
 */
wfboles_Kirki::add_section( 'typography', array(
	'title'      => esc_attr__( 'Typography', 'wfboles' ),
	'priority'   => 2,
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
 * Add the footer section
 */
wfboles_Kirki::add_section( 'footer_options', array(
	'title'      => esc_attr__( 'Footer Options', 'wfboles' ),
	'priority'   => 3,
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
