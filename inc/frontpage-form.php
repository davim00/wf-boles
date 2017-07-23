<?php
/**
 * The contact form widget area for the home page
 *
 * @package William_Boles
 */

 function wfboles_frontpage_form() {
   if ( is_active_sidebar( 'contact-1' ) ) : ?>
   <section class="form-footer top-space bottom-space" id="contact">
     <div class="container">
       <div class="row row-centered">
         <div class="col-lg-7 col-md-8 col-sm-10 col-centered section-head">
           <h2><?php echo get_theme_mod( 'form_header_text', 'Contact us today.'); ?></h2>
           <p><?php echo get_theme_mod( 'form_text', 'In eu mi rhoncus, euismod augue nec, vulputate nunc. Fusce hendrerit magna et felis fringilla, quis venenatis ex cursus. Nunc mattis molestie mi, id pulvinar libero fermentum sit amet. Duis id justo est. Ut cursus vehicula sodales. Integer pretium lectus in purus pulvinar, sit amet tempor eros accumsan.'); ?></p>
         </div>
       </div>
       <div class="row row-centered">
         <div class="col-lg-7 col-md-8 col-sm-10 col-centered">
          <?php dynamic_sidebar( 'contact-1' ); ?>
         </div>
       </div>
     </div>
   </section>
 <?php endif;
 }
