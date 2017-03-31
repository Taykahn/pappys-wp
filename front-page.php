<?php
/**
 * Front Page
 */

get_header() ?>

<?php 

  $args = array( 
    'post_type'      => 'featured_items', 
    'orderby'        => 'rand', 
    'posts_per_page' =>'2' 
  );

  $featured_items = new WP_Query( $args );
  
  $args = array(
    'post_type'     =>'specials', 
    'orderby'       =>'rand', 
    'posts_per_page'=>'2'
    );

  $specials=new WP_Query( $args ); 

  $args = array( 
    'post_type'     => 'full_bar', 
    'orderby'       => 'rand', 
    'posts_per_page'=>'2' );

  $full_bar = new WP_Query( $args );

?>

<section class="three-column row no-max pad" style="margin-left: 10px;">

  <div class="col-md-12">

    <div class="row">

        <!-- Primary -->

        <div class="primary">

          <div class="col-md-4">

            <h2>Featured Items</h2>

              <hr>

                <?php if ( $featured_items->have_posts() ) : ?>

                  <?php while ( $featured_items->have_posts() ) : $featured_items->the_post(); ?>

                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>

                    <p><?php the_content(); ?></p>

                    <?php the_meta(); ?>

                  <?php endwhile; ?>

                <?php endif ?>

              <?php wp_reset_postdata() ?>

            <?php get_post(); ?>

          </div><!-- col-md-4 -->

        </div><!-- end primary -->

        <!-- Secondary -->

        <div class="secondary">

          <div class="col-md-4">

            <h2>The Specials</h2>

              <hr>

                <?php if ( $specials->have_posts() ) : ?>

                  <?php while ( $specials->have_posts() ) : $specials->the_post(); ?>

                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>

                    <?php the_content(); ?>

                    <?php the_meta() ?>

                  <?php endwhile; ?>

                <?php endif; ?>

              <?php wp_reset_postdata() ?>

            <?php get_post(); ?>

          </div><!-- col-md-4 -->

        </div><!-- end secondary -->

        <!-- Tertiary -->

        <div class="tertiary">

          <div class="col-md-4">

            <h2>The Bar</h2>

              <hr>

                <?php if ( $full_bar->have_posts() ) : ?>

                  <?php while ( $full_bar->have_posts() ) : $full_bar->the_post(); ?>

                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h3></a>

                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>

                    <p><?php the_content(); ?></p>

                    <?php the_meta(); ?>

                  <?php endwhile; ?>

                <?php endif ?>

              <?php wp_reset_postdata() ?>

            <?php get_post(); ?>

          </div><!-- end col-md-4 -->

        </div><!-- end tertiary -->

    </div><!-- end row -->

  </div><!-- end col-md-12 -->

</section><!-- end three-column row no-max pad -->

<?php get_footer() ?>