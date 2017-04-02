<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/images/favicon.ico">

    <title>
      <?php wp_title( '|', true, 'right' ); ?>
      <?php bloginfo('name'); ?>
    </title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">

    <?php wp_head() ?>

    <?php 
      global $post;
      global $cws_img_path;
      $post_slug = isset( $post->post_name ) ? $post->post_name : null;
      $page_slug = 'page-'.$post_slug;
      $post_id   = 'post-id-'.$post->ID;
      $fouc      = 'fouc';
      $classes   = array( $page_slug, $post_id );
    ?>

  </head>

  <body <?php body_class( $classes ) ?>>

    <nav class="navbar navbar-inverse navbar-fixed-top">

      <div class="container">

        <div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

            <span class="sr-only">Toggle navigation</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

          </button><!-- end button -->

          <div class="phone">

            <a href="tel:816-390-9550">(816) 390-9550</a>

          </div><!-- end phone -->

        </div><!-- end navbar-header -->

        <div id="navbar" class="navbar-collapse collapse">

          <?php 
            $args = array(
              'menu'          => 'header-menu',
              'menu_class'    => 'nav navbar-nav',
              'container'     => 'false'
            );
            wp_nav_menu( $args );
          ?>

        </div><!--/.navbar-collapse -->

      </div><!-- end container -->

    </nav><!-- end navbar -->

  <?php 

    $banner_img = CWS_Theme::cws_get_img( 'pappys-floor.png', 'Pappy\'s Grill &amp; Pub' ); 
    $pappys_img = CWS_Theme::cws_get_img( 'pappys-image.png', 'Pappy\'s Grill &amp; Pub' );

  ?>

  <header>

      <div class="container-fluid no-pad">

        <div class="banner no-pad" style="background: url( '<?php echo esc_html( $banner_img ) ?>' ) 50%/cover no-repeat; height: 500px;">

          <div class="wrapper">

            <div class="banner-img">

              <a href="http://localhost:8888/Pappys-wp/"><img src="<?php echo esc_url( $pappys_img ) ?> "></a>

              <div class="hours">

                <?php $args = new WP_Query( 'page_id=554' ); ?>

                <?php while ($args-> have_posts()) : $args-> the_post();  ?>

                  <?php the_content(); ?>

                <?php endwhile;?>

              </div><!-- end hours -->

            </div><!--end banner-img-->

          </div><!--end wrapper-->

        </div><!--.banner-->

      </div><!--end container-->

  </header><!-- end header -->

  <main id="main" role="main">
