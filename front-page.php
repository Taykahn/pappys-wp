<?php
/**
 * Front Page
 */

get_header() ?>

<?php 

  $args = array( 
    'post_type'      => 'featured_items', 
    'orderby'        => 'rand', 
    'posts_per_page' =>'1' 
  );

  $featured_items = new WP_Query( $args );
  
  $args = array(
    'post_type'     =>'specials', 
    'orderby'       =>'rand', 
    'posts_per_page'=>'1'
    );

  $specials=new WP_Query( $args ); 

  $args = array( 
    'post_type'     => 'full_bar', 
    'orderby'       => 'rand', 
    'posts_per_page'=>'1' );

  $full_bar = new WP_Query( $args );

  $contact = new WP_Query( 'page_id=25' );

  $map = new WP_Query( 'page_id=769' );

?>

<section class="three-column row no-max pad" style="margin-left: 10px; margin-right: 10px;">

  <div class="col-md-12">

    <div class="row">

<br>

      <h1>Featured Items  &amp  Specials</h1>

<br>

        <!-- Primary -->

        <div class="primary">

          <div class="col-md-4">

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

<section class="two-column row no-max pad" style="margin-left: 10px; margin-right: 10px;">

  <div class="col-md-12">

    <div class="row">

<br>

    <h1>Location</h1>

<br>

    <!-- Primary 2 -->

      <div class="primary-2">

      <div class="col-md-6">

        <?php while ($contact-> have_posts()) : $contact-> the_post();  ?>

          <?php the_content(); ?>

        <?php endwhile;?>

      </div><!-- end col-md-6 --> 

      </div><!-- end primary 2 -->

      <!-- Secondary 2 -->

      <div class="secondary-2">

      <div class="col-md-6">

        <?php while ($map-> have_posts()) : $map-> the_post();  ?>

          <?php the_content(); ?>

        <?php endwhile;?>

      </div><!-- end col-md-6 --> 

      </div><!-- end secondary 2 -->

    </div><!-- end row -->

  </div><!-- end col-md-12 -->

</section><!-- end two-column row no-max pad -->

<?php get_footer() ?>







