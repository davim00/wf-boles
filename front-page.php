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

<section>
	<div class="container">
	  <div class="row">
	    <div class="col-sm-6">
	      <h2>Hello, I&rsquo;m William Boles</h2>
				<p>I&rsquo;ve worked in the pavement industry for over 35 years as a civil engineer, contractor and consultant for the federal government and several private companies. Now, I want to help you overcome your pavement problems and answer the concerns you might have with your concrete and asphalt work.</p>
	    </div>
			<div class="col-sm-6">
			  <img src="<?php echo get_template_directory_uri() . '/images/headshot.jpg' ?>" alt="Head Shot" />
			</div>
	  </div>
	</div>
</section>
<section>
	<div class="container">
	  <div class="row">
	    <div class="col-sm-12">
	      <h2>Get the right answers for any type of pavement issue.</h2>
				<p>Just send me your questions and photos to learn more about the following common issues:</p>
	    </div>
	  </div>
		<div class="row">
		  <div class="col-sm-4">
		    <div class="thumbnail frontpage-thumbnail">
		      <img class="img-circle" src="<?php echo get_template_directory_uri() . '/images/thumb-01.png' ?>" alt="Cracks" />
					<div class="caption">
						<p class="lead">Cracks, scaling<br />& surface wear</p>
					</div>
			  </div>
			</div>
			<div class="col-sm-4">
				<div class="thumbnail frontpage-thumbnail">
					<img class="img-circle" src="<?php echo get_template_directory_uri() . '/images/thumb-02.png' ?>" alt="Weather" />
					<div class="caption">
						<p class="lead">Weather<br />& drainage issues</p>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="thumbnail frontpage-thumbnail">
					<img class="img-circle" src="<?php echo get_template_directory_uri() . '/images/thumb-03.png' ?>" alt="Design" />
					<div class="caption">
						<p class="lead">Parking lot, driveway<br />or road design</p>
					</div>
			</div>
		</div>
	</div>
</section>

<?php wfboles_frontpage_form(); ?>

	<!--<div id="primary" class="content-area row">
		<main id="main" class="site-main col-sm-12" role="main">-->

		<?php /*
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
		endif;*/

			/* Start the Loop */
			/*
			while ( have_posts() ) : the_post();*/

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				 /*
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_pagination(array(
				'prev_text' => __('Previous', 'wfboles'),
				'next_text' => __('Next', 'wfboles')
			));

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php*/
get_footer();
