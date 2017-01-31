<?php
/**
 * Front page
 */
get_header() ?>

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
