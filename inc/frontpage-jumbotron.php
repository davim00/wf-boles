<?php
/**
 * The hero image for the home page
 *
 * @package William_Boles
 */

 function wfboles_frontpage_jumbotron() { ?>
   <div id="site-hero" class="jumbotron frontpage-jumbotron" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.7) 0%,rgba(0,0,0,0.5) 50%,rgba(0,0,0,0.7) 100%), url('<?php echo esc_url( get_theme_mod( 'header_bg_image', 'images/header-bg.jpg' ) ); ?>')">
     <div class="container">
       <div class="row">
         <div class="col-sm-12">
           <h1><?php echo esc_attr( get_theme_mod('header_text', 'Lorem ipsum dolor sit amet.')); ?></h1>
           <p><?php echo esc_attr( get_theme_mod('subheader_text', 'Etiam diam risus, sagittis at urna id, malesuada semper justo ut id.' ) ); ?></p>
           <?php if ( true == get_theme_mod( 'header_CTA_toggle', false ) ) : ?>
             <a class="btn btn-lg btn-primary page-scroll" href="<?php echo esc_url( get_theme_mod( 'header_CTA_URL', '#' ) ); ?>"><?php echo esc_attr( get_theme_mod( 'header_CTA_text', esc_attr__( 'Find out more', 'wfboles' ) ) ); ?></a>
           <?php endif; ?>
         </div>
       </div>
     </div>
   </div>
 <?php }
