<?php
/**
 * The template for the search form
 *
 * @link https://codex.wordpress.org/Styling_Theme_Forms
 *
 * @package William_Boles
 */

?>
<form role="search" method="get" class="form-search form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
	  <label class="sr-only" for="s"><?php _e( 'Search', 'wfboles' ); ?></label>
	  <input type="text" class="form-control search-query" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'wfboles' ); ?>" value="<?php echo get_search_query(); ?>" name="s" id="s" title="<?php echo esc_attr_x( 'Search', 'label', 'wfboles' ); ?>" />
	</div>
	<button type="submit" name="Submit" class="btn btn-default" value="<?php echo esc_attr_x( 'Search', 'submit button', 'wfboles' ); ?>">Submit</button>
</form>
