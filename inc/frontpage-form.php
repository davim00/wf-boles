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
       <div class="row">
         <div class="col-sm-12 section-head">
           <h2>Send your questions today</h2>
           <p>I&rsquo;m ready to give you FREE insights into pavement related issues you are dealing with. Just use the form below to send your questions, and be sure to include multiple closeup and overview photos to get the best response. Your information will remain private and will not be shared.</p>
         </div>
       </div>
       <div class="row">
         <div class="col-sm-4 col-xs-12 col-sm-push-4">
          <?php dynamic_sidebar( 'contact-1' ); ?>
         </div>
       </div>
     </div>
   </section>
 <?php endif;
 }
