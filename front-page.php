<?php
/**
 * The front page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package William_Boles
 */

get_header(); ?>

<section id="intro" class="top-space">
	<div class="container">
	  <div class="row">
	    <div class="col-sm-6">
				<div class="intro-text-block">
					<h2><?php echo get_theme_mod( 'about_header_text', 'Fusce tincidunt <b>tempor lobortis</b>.' ); ?></h2>
					<p class="intro-text"><?php echo get_theme_mod( 'about_text', 'Nunc condimentum sed mi ac efficitur. Vestibulum quis tempus felis, ac tincidunt tellus. Proin fermentum neque sed tempor accumsan. Cras elementum sem non justo cursus, vitae mattis dolor viverra. Pellentesque gravida gravida nulla sed tempor. Quisque efficitur congue elit id pellentesque. Praesent eros nisi, elementum quis tortor at, dignissim lobortis urna. Donec metus neque, tristique a orci ac, convallis sodales mauris. Mauris placerat dolor non dapibus rutrum.' ); ?></p>
				</div>
	    </div>
			<div class="col-sm-6">
			  <img class="img-responsive" src="<?php echo esc_url( get_theme_mod( 'about_image', get_template_directory_uri() . '/images/headshot.jpg' ) ); ?>" alt="Head Shot" />
			</div>
	  </div>
	</div>
</section>
<?php if ( 'image' == get_theme_mod( 'issues_bg_toggle', 'color' ) ) : ?>
<section id="answers" class="top-space bottom-space" style="background: url('<?php echo esc_url( get_theme_mod( 'issues_bg_image', get_template_directory_uri() . '/images/cracked-drive.jpg' ) ); ?>')">
<?php else : ?>
<section id="answers" class="top-space bottom-space" style="background: <?php echo get_theme_mod( 'issues_bg_color', '#2B3B4C' ); ?>">
<?php endif; ?>
	<div class="container">
	  <div class="row">
			<div class="col-sm-12 section-head">
				<h2><?php echo get_theme_mod( 'issues_header_text', 'Nulla nec nisl at ex ullamcorper sollicitudin sed.' ); ?></h2>
				<p><?php echo get_theme_mod( 'issues_text', 'Integer ante tortor, pharetra vitae facilisis id, laoreet ut magna nulla facilisi quisque blandit.' ); ?></p>
			</div>
		</div>
		<div class="row row-centered">

			<?php // Default values for 'my_setting' theme mod.
			$defaults = array(
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
			);

			// Theme_mod settings to check.
			$settings = get_theme_mod( 'issues_repeater', $defaults );
			foreach( $settings as $setting ) : ?>
				<div class="col-sm-4 col-centered">
			    <div class="thumbnail frontpage-thumbnail">
			      <img src="<?php echo wp_get_attachment_url( $setting['issue_image'] ); ?>" alt="Cracks" />
						<div class="caption">
							<p><?php echo $setting['issue_desc']; ?></p>
						</div>
				  </div>
				</div>
			<?php endforeach; ?>

		</div>
</section>

<?php wfboles_frontpage_form();

get_footer();
