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

/**
 * add widgets
 */

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

/**
 * custom post type function
 */

function create_posttype() {

    register_post_type( 'menu-item',

    // CPT Options

        array(

            'labels' => array(
                'name'          => __( 'Menu Item' ),
                'singular_name' => __( 'Menu Item' )
            ),
            'public'            => true,
            'has_archive'       => true,
            'rewrite'           => array('slug' => 'menu-item'),
        )
    );
}

// Hooking up function to theme setup

add_action( 'init', 'create_posttype' );

function custom_post_type() {

// Set UI labels for Custom Post Type

    $labels = array(

        'name'                => _x( 'Menu-item', 'Post Type General Name', 'Pappys-wp' ),
        'singular_name'       => _x( 'Menu-item', 'Post Type Singular Name', 'Pappys-wp' ),
        'menu_name'           => __( 'Menu-item', 'Pappys-wp' ),
        'parent_item_colon'   => __( 'Parent Menu', 'Pappys-wp' ),
        'all_items'           => __( 'All Menus', 'Pappys-wp' ),
        'view_item'           => __( 'View Menu', 'Pappys-wp' ),
        'add_new_item'        => __( 'Add New Item', 'Pappys-wp' ),
        'add_new'             => __( 'Add New', 'Pappys-wp' ),
        'edit_item'           => __( 'Edit Menu', 'Pappys-wp' ),
        'update_item'         => __( 'Update Item', 'Pappys-wp' ),
        'search_items'        => __( 'Search Menu', 'Pappys-wp' ),
        'not_found'           => __( 'Not Found', 'Pappys-wp' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'Pappys-wp' ),
    );
// Set other options for Custom Post Type

     $args = array(
        'label'               => __( 'menu-item', 'Pappys-wp' ),
        'description'         => __( 'menu item description', 'Pappys-wp' ),
        'labels'              => $labels,

        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'page-attributes' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'taxonomies'          => array( 'genres', 'category' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

    // Registering your Custom Post Type

    register_post_type( 'menu-item', $args );

 }
/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/
add_action( 'init', 'custom_post_type', 0 );

add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'menu-item' ) );
    return $query;
}

add_theme_support( 'post-thumbnails' );

function new_excerpt_more( $more ) {
    return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );


/* 
 * google map
 */
function my_acf_google_map_api( $api ){
    
    $api['key'] = 'AIzaSyCB8_4ty30wN5v3CrH5XEN_QFyDVmWKDnM';
    
    return $api;
    
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function my_acf_init() {
    
    acf_update_setting('google_api_key', 'xxx');
}

add_action('acf/init', 'my_acf_init');






?>
