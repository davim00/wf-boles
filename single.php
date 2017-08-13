<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package William_Boles
 */

 get_header(); ?>

 <div id="primary" class="content-area row">
 	<main id="main" class="site-main col-sm-12" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() ); ?>

			<div class="row">
			  <div class="col-sm-12 col-md-8 col-md-push-2">
					<?php the_post_navigation(); ?>
				</div>
			</div>

			
			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
