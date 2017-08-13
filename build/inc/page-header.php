<?php
/**
 * The page headers
 *
 * @package William_Boles
 */

 function wfboles_page_header() { ?>
   <div class="jumbotron entry-header">

      <?php if ( is_front_page() || is_single() || is_page() && ! is_archive() && ! is_404() && ! is_search() ) : ?>
        <h1 class="entry-title">
          <?php single_post_title(); ?>
        </h1>
      <?php elseif ( is_archive() ) :
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
      elseif ( is_404() ) : ?>
        <h1 class="page-title">
          <?php esc_html_e( 'Woops! Something is missing...', 'wfboles' ); ?>
        </h1>
      <?php elseif ( is_search() ) : ?>
        <h1 class="page-title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Searching &ldquo;%s&rdquo;', 'wfboles' ), '<span>' . get_search_query() . '</span>' );
				?></h1>
      <?php endif; ?>
 	</div><!-- .entry-header -->
 <?php }
