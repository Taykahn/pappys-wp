<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/images/favicon.ico">

    <title>
      <?php wp_title( '|', true, 'right' ); ?>
      <?php bloginfo('name'); ?>
    </title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <?php wp_head() ?>

    <?php 
      global $post;
      global $cws_img_path;
      $post_slug = $post->post_name;
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
          </button>
          <a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a>
        </div>
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
      </div>
    </nav>

  <?php 

    $banner_img = CWS_Theme::cws_get_img( 'pappys-store.png', 'Pappy\'s Grill &amp; Pub' ); 

  ?>

  <header>

      <div class="container-fluid no-pad">

        <div class="banner no-pad" style="background: url( '<?php echo $banner_img ?>' ) 50%/cover no-repeat; height: 400px;">
        
          <div class="container"> 

            <div class="title col-sm-12">

              <div class="h1-title col-sm-12">
          
                <!--<h1>Welcome to Pappy's!</h1>-->

              </div><!--.h1-title-->

            <div class="blue-button col-sm-12">

                <!--<a href="http://localhost:8888/Pappys-wp/menu/" class="blue-btn">Our Menu</a>-->

              </div><!--.blue-button-->

            </div><!--.title-->
            
          </div><!--.container-->

        </div><!--.banner-->

      </div><!--end container-->

  </header>

  <main id="main" role="main">
