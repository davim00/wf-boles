<?php
/**
 * The hero image for the home page
 *
 * @package William_Boles
 */

 function wfboles_frontpage_jumbotron() { ?>
   <div id="site-hero" class="jumbotron frontpage-jumbotron" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.7) 0%,rgba(0,0,0,0.5) 50%,rgba(0,0,0,0.7) 100%), url('<?php echo get_template_directory_uri() . '/images/cracks.jpg' ?>');">
     <div class="container">
       <div class="row">
         <div class="col-sm-12">
           <h1>Got pavement issues?</h1>
           <p>Have your concrete and pavement issues answered by a licensed civil engineer.</p>
           <a class="btn btn-lg btn-primary page-scroll" href="#contact">Get your FREE answers now</a>
         </div>
       </div>
     </div>
   </div>
 <?php }
