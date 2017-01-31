<?php
/**
 * Functions
 */

//Require included files
require_once STYLESHEETPATH . '/includes/cws-theme-class.php';

/**
 * Load theme styles and scripts
 *
 * @add_action wp_enqueue_scripts
 *
 * @return void
 */
function pbg_scripts() {

	global $wp_scripts;
	wp_enqueue_style      ( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style      ( 'main_css',      get_template_directory_uri() . '/style.css' );
	wp_register_script    ( 'html5_shiv',    'https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js', '', '', false );
	wp_register_script    ( 'respond_js',    'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false );
	$wp_scripts->add_data ( 'html5_shiv',    'conditional', 'lt IE 9' );
	$wp_scripts->add_data ( 'respond_js',    'conditional', 'lt IE 9' );
	wp_enqueue_script     ( 'bottstrap_js',  get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );

}
add_action( 'wp_enqueue_scripts', 'pbg_scripts' );

//add_filter( 'show_admin_bar', '__return_false' );

/**
 * add menus
 */
add_theme_support( 'menus' );

function register_theme_menus() {
	register_nav_menus(
		array(
			'header-menu'	=> __( 'Header Menu' )
		)
	);
}
add_action( 'init', 'register_theme_menus' );


function create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description'   => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));

}

create_widget( 'Front Page Left', 'front-left', 'Displays on the left of the homepage' );
create_widget( 'Front Page Center', 'front-center', 'Displays in the center of the homepage' );
create_widget( 'Front Page Right', 'front-right', 'Displays on the right of the homepage' );

create_widget( 'Contact Page Right', 'contact-right', 'Displays on the side of contact page with a sidebar.' );



?>
