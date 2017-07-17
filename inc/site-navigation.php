<?php
/**
 * The main site navigation
 *
 * @package William_Boles
 */

 function wfboles_site_navigation() { ?>
   <nav id="site-navigation" class="navbar navbar-default main-navigation" role="navigation">
     <div class="container">
       <div class="navbar-header pull-left">
         <div class="site-title">
           <?php wfboles_the_custom_logo(); ?>
         </div>
       </div>

       <!-- Collect the nav links, forms, and other content for toggling -->
       <?php if ( is_front_page() && ! is_home() ) :
         wp_nav_menu( array(
           'menu'              => 'front-menu',
           'theme_location'    => 'front-page',
           'depth'             => 2,
           'container'         => 'div',
           'container_class'   => 'navbar-header pull-right',
           'container_id'      => 'navbar',
           'menu_class'        => 'nav navbar-nav pull-right',
           'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
           'walker'            => new WP_Bootstrap_Navwalker())
             );
       else :
         wp_nav_menu( array(
           'menu'              => 'inner-menu',
           'theme_location'    => 'inner-page',
           'depth'             => 2,
           'container'         => 'div',
           'container_class'   => 'collapse navbar-collapse',
           'container_id'      => 'navbar',
           'menu_class'        => 'nav navbar-nav navbar-right',
           'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
           'walker'            => new WP_Bootstrap_Navwalker())
             );
        endif;
       ?><!-- /.navbar-collapse -->
     </div><!-- /.container-fluid -->
   </nav><!-- #site-navigation -->
 <?php }
