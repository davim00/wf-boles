<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package William_Boles
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header row">
	  <div class="col-sm-12 col-md-8 col-md-push-2">
				<?php
				if ( ! is_singular() ) :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php wfboles_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif; ?>
			</div>
		</header><!-- .entry-header -->

		<div class="entry-content row">
			<div class="col-sm-12 col-md-8 col-md-push-2">
				<?php
					the_content( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wfboles' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wfboles' ),
						'after'  => '</div>',
					) );
				?>
			</div>
		</div><!-- .entry-content -->

		<footer class="entry-footer row">
			<div class="col-sm-12 col-md-8 col-md-push-2">
				<?php wfboles_entry_footer(); ?>
			</div>
		</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
