<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package William_Boles
 */

get_header(); ?>

<div id="primary" class="content-area row">
	<main id="main" class="site-main col-sm-12" role="main">

		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile; ?>

			<div class="entry-content row">
			  <div class="col-sm-12 col-md-8 col-md-push-2">

					<?php
					the_posts_pagination(array(
						'prev_text' => __('Previous', 'wfboles'),
						'next_text' => __('Next', 'wfboles')
					));

					the_posts_navigation(); ?>

				</div><!-- .row -->
			</div><!-- .col -->

		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
