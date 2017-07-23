<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package William_Boles
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body id="page-top" data-spy="scroll" data-target=".main-navigation" <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wfboles' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php // The primary site navigation
		wfboles_site_navigation(); ?>


		<?php // A jumbotron (hero image) can be displayed on a static front page, set with the customizer
		if ( is_front_page() && ! is_home() && true == get_theme_mod( 'header_switch', false ) ) :
			wfboles_frontpage_jumbotron();
		else :
			wfboles_page_header();
		endif; ?>

	</header><!-- #masthead -->

	<?php if ( is_front_page() && ! is_home() ) : ?>
		<div id="content" class="site-content">
	<?php else : ?>
		<div id="content" class="site-content container">
	<?php endif;
