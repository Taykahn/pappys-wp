<?php
/**
* Template Name: Pappys Menu
**/
?>

<?php 

  $args = array( 'post_type' => 'pappys_menu' );

  $query = new WP_Query( $args );

?>

<?php get_header(); ?>

  <div class="container">

    <div class="row">

      <div class="page-header">

        <h2>Menu</h2>

      </div><!-- end page-header -->

      <section class="three-column row no-max pad">

        <div class="col-md-12">

          <div class="row pdf-menu">

            <div class="col-md-12">

              <?php if( $query->have_posts() ) : ?>

                <?php while( $query->have_posts() ) : $query->the_post(); ?>

                  <?php the_post_thumbnail(); ?>

                  <?php the_content(); ?>
<hr>
                <?php endwhile; ?>

              <?php endif; ?>

            </div><!-- end col-md-12 -->

          </div><!-- end row pdf-menu -->

        </div><!-- end col-md-12 -->

      </section><!-- end three-column row no-max pad -->

    </div><!-- end row -->

  </div><!-- end container --> 

<?php get_footer(); ?>