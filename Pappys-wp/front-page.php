<?php
/**
 * Front page
 */
get_header() ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">

      <div class="container">
        
        <?php if ( have_posts() ) : 

            while ( have_posts() ) : the_post(); ?>

              <p><?php the_content() ?></p>

             <?php endwhile; 
               
        <?php endif ?>

      </div><!--end container-->

    </div><!--end jumbotron-->

    <div class="container">

      <!-- Example row of columns -->
      <div class="row">
          
        <div class="inner-content col-sm-12">
            
            <h1>Welcome to Pappy's Restaurant!</h1>
            
            <h2>We have a wide variety of entres and appitizers!</h2>
            
            <h3>Be sure to checkout our burger bar! Try 'em all!</h3>
            
        </div><!--.inner-content-->
          
        <div class="col-md-4">

          <?php if ( dynamic_sidebar( 'front-left' ) ); ?>

        </div>

        <div class="col-md-4">

          <?php if ( dynamic_sidebar( 'front-center' ) ); ?>

        </div>

        <div class="col-md-4">
          
          <?php if ( dynamic_sidebar( 'front-right' ) ); ?>

        </div>

      </div><!--end container-->

<?php get_footer(); ?>
