<?php 

  $args = array( 'post_type' => 'specials' );

  $query = new WP_Query( $args );

?>

<?php get_header(); ?>

  <div class="container">

    <div class="row">

      <div class="page-header">

        <h2>Specials</h2>

      </div><!-- end page-header -->

        <section class="two-column row no-max pad">

          <div class="col-md-12">

            <div class="row">

              <?php if( $query->have_posts() ) : ?>

                <?php while( $query->have_posts() ) : $query->the_post(); ?>

                  <!-- Primary -->

                  <div class="primary">

                    <div class="col-md-6">

                      <h2><?php the_title(); ?></h2>

                      <p><?php the_content(); ?></p>

                    </div><!-- end col-md-6 -->

                  </div><!-- end primary -->

                  <!-- Secondary -->

                  <div class="secondary">

                    <div class="col-md-6">

                      <?php the_post_thumbnail(); ?>

                      <p><?php the_meta(); ?></p>

                    </div><!-- end col-md-6 -->

                  </div><!-- end secondary -->

                <?php endwhile; ?>

              <?php endif; ?>

            </div><!-- end row -->              

          </div><!-- end col-md-12 -->

        </section><!-- end three-column row no-max pad -->
  
<?php get_footer(); ?>