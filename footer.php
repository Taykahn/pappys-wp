<?php 
/**
* Footer
*/

$facebook_img = CWS_Theme::cws_get_img( 'facebook-wrap.png'); 

$creditcard_img = CWS_Theme::cws_get_img( 'CreditCardLogos.png');

?>

</main>

<hr>

  <footer>

    <div class="section">

      <div class="social-icon">

        <a href="https://www.facebook.com/Pappys-Grill-Pub-245352765500666/"><img src="<?php echo esc_url( $facebook_img ) ?>" alt="facebook logo" class="social-icon"></a>

      </div><!-- end social-icon -->

      <div class="cards">

        <img src="<?php echo esc_url( $creditcard_img ) ?>" alt="creditcards">

        <p>Sorry, no checks</p>

      </div><!-- end cards -->

      <div class="copyright">

        <p>&copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?></p>

      </div><!-- end copyright -->

    </div><!-- end section -->

  </footer>

    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>

    <?php wp_footer(); ?>

  </body>

</html>