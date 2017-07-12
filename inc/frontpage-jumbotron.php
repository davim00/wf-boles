<?php
/**
 * The hero image for the home page
 *
 * @package William_Boles
 */

 function wfboles_frontpage_jumbotron() { ?>
   <div class="jumbotron frontpage-jumbotron" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.5) 0%,rgba(0,0,0,0.2) 50%,rgba(0,0,0,0.5) 100%), url('<?php echo get_template_directory_uri() . '/images/cracks.jpg' ?>');">
     <div class="container">
       <div class="row">
         <div class="col-sm-12">
           <h2>Got pavement issues?</h2>
           <p>Have your concrete and pavement issues answered by a licensed civil engineer.</p>
           <a class="btn btn-lg btn-primary" href="#contact">Get your FREE answers now</a>
         </div>
       </div>
     </div>
   </div>
 <?php }
