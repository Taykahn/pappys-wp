<aside id="sidebar" class="col-md-4">

	<div id="primary" class="widget-area" role="complementary">

		<?php

		if ( is_active_sidebar( 'our_firm_sidebar' ) ) {

			dynamic_sidebar( 'our_firm_sidebar' );

			} else {

			echo 'Please insert a sidebar.';

		}

		?>

	</div><!-- end primary -->

</aside><!-- end aside -->
