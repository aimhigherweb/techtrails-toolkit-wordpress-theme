<?php


/********************************************************************************************
*								FRONT-END CUSTOMISATION
*********************************************************************************************/
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'toolkittechtrails_setup' ) ) :

function toolkittechtrails_setup() {

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );


	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'toolkittechtrails' ),
		'social'  => __( 'Social Links Menu', 'toolkittechtrails' ),
		'footer'  => __( 'Footer Menu', 'toolkittechtrails' ),
		'top'  => __( 'Top Menu', 'toolkittechtrails' ),
	) );


	 // Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	// Enable support for Post Formats. See: https://codex.wordpress.org/Post_Formats
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // toolkittechtrails_setup
add_action( 'after_setup_theme', 'toolkittechtrails_setup' );


//Gravity Form
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

function more_link_text() {
    return '<a class="readmore" href="' . get_permalink() . '">Read More..</a>';
}
add_filter( 'the_content_more_link', 'more_link_text' );

/********************************************************************************************
*								SCRIPTS & CSS
*********************************************************************************************/

function toolkittechtrails_scripts() {

	// Theme stylesheet. Update  version number after CSS changes
	wp_enqueue_style( 'toolkittechtrails_style', get_stylesheet_uri(), array(), '1_0' );

	//Font Awesome
	wp_enqueue_style( 'toolkittechtrails_font_awesome', get_template_directory_uri() . ASSET_DIR . '/css/font-awesome.min.css', array( 'toolkittechtrails_style' ), '1_0' );
	wp_style_add_data( 'toolkittechtrails_font_awesome', 'conditional', '' );

	wp_enqueue_script( 'entry_file', get_template_directory_uri() . ASSET_DIR . '/js/index.js', array(), '1_0', true);

	//JS for Table On Mobile
	wp_enqueue_script( 'toolkittechtrails_overthrow', get_template_directory_uri() . ASSET_DIR . '/js/overthrow-detect.js', array(), '1_0' );
	wp_script_add_data( 'toolkittechtrails_overthrow', 'conditional', '');

	wp_enqueue_script( 'toolkittechtrails_overthrow_polyfill', get_template_directory_uri() . ASSET_DIR . '/js/overthrow-polyfill.js', array(), '1_0' );
	wp_script_add_data( 'toolkittechtrails_overthrow_polyfill', 'conditional', '');

	wp_enqueue_script( 'toolkittechtrails_overthrow_toss', get_template_directory_uri() . ASSET_DIR . '/js/overthrow-toss.js', array(), '1_0' );
	wp_script_add_data( 'toolkittechtrails_overthrow_toss', 'conditional', '');

	wp_enqueue_script( 'toolkittechtrails_overthrow_init', get_template_directory_uri() . ASSET_DIR . '/js/overthrow-init.js', array(), '1_0' );
	wp_script_add_data( 'toolkittechtrails_overthrow_init', 'conditional', '');

}

add_action( 'wp_enqueue_scripts', 'toolkittechtrails_scripts' );

add_action('wp_head', 'wp_dash_head');
function wp_dash_head(){
    //
    ?>
    <?php //Open PHP tags
}

function toolkittechtrails_body_classes( $classes ) {
	// Adds a full-width class.
	if ( is_page_template( 'full-width.php' ) || is_404() || is_search() || !is_active_sidebar( 'sidebar' )) {
        $classes[] = 'full-width';
    }
	// Adds a class of Sub to all subpages.
	if (!(is_front_page())) {
		$classes[] = 'sub';
	}

	return $classes;
}
add_filter( 'body_class', 'toolkittechtrails_body_classes' );

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

//Customizer additions.
require get_template_directory() . '/inc/customizer.php';


/********************************************************************************************
*								WIDGETS CONFIGURATION
*********************************************************************************************/
function toolkittechtrails_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'toolkittechtrails' ),
		'id'            => 'sidebar',
		'before_widget' => '<div class="widget clearfix">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Home Slider ', 'toolkittechtrails' ),
		'id'            => 'slider',
		'before_widget' => '<div class="widget clearfix">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );


	register_sidebar( array(
		'name'          => __( 'Sub Slider ', 'toolkittechtrails' ),
		'id'            => 'sub-slider',
		'before_widget' => '<div class="widget clearfix">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Home Services ', 'toolkittechtrails' ),
		'id'            => 'home-services',
		'before_widget' => '<div class="widget clearfix">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'After Content ', 'toolkittechtrails' ),
		'id'            => 'after-content',
		'before_widget' => '<div class="widget clearfix">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}

add_action( 'widgets_init', 'toolkittechtrails_widgets_init' );


/********************************************************************************************
*								DASH POST TYPES
*********************************************************************************************/

add_action( 'init', 'create_alignment' );
add_action( 'init', 'create_career' );
add_action( 'init', 'create_sentence' );
add_action( 'init', 'create_subject' );
add_action( 'init', 'create_casestudy' );

function create_career() {
	register_post_type( 'career',
        array(
            'labels' => array(
                'name' => 'Careers',
                'singular_name' => 'Career',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Career',
                'edit' => 'Edit',
                'edit_item' => 'Edit Career',
                'new_item' => 'Add Career',
                'view' => 'View',
                'view_item' => 'View Career',
                'search_items' => 'Search Career',
                'not_found' => 'No Careers found',
                'not_found_in_trash' => 'No Career found in Trash',
                'parent' => 'Parent Career',
				'rewrite' => array('slug' => 'career')
            ),

            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor','page-attributes' ),
            'taxonomies' => array( 'post_tag','category'),
            'rewrite' => array('slug' => 'career'),
            'menu_icon' => 'dashicons-book',
            'has_archive' => 'career',
        )
    );
    flush_rewrite_rules();
}

function create_subject() {
	register_post_type( 'subject',
        array(
            'labels' => array(
                'name' => 'Subjects',
                'singular_name' => 'Subject',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Subject',
                'edit' => 'Edit',
                'edit_item' => 'Edit Subject',
                'new_item' => 'Add Subject',
                'view' => 'View',
                'view_item' => 'View Subject',
                'search_items' => 'Search Subject',
                'not_found' => 'No Subjects found',
                'not_found_in_trash' => 'No Subjects found in Trash',
                'parent' => 'Parent Subject',
				'rewrite' => array('slug' => 'subject')
            ),

            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'thumbnail','page-attributes', 'editor' ),
            'taxonomies' => array( 'post_tag','category'),
            'rewrite' => array('slug' => 'subject'),
            'menu_icon' => 'dashicons-book',
            'has_archive' => 'subject',
        )
    );
    flush_rewrite_rules();
}

function create_sentence() {
	register_post_type( 'sentence',
        array(
            'labels' => array(
                'name' => 'Sentences',
                'singular_name' => 'Sentence',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Sentence',
                'edit' => 'Edit',
                'edit_item' => 'Edit Sentence',
                'new_item' => 'Add Sentence',
                'view' => 'View',
                'view_item' => 'View Sentence',
                'search_items' => 'Search Sentence',
                'not_found' => 'No Sentences found',
                'not_found_in_trash' => 'No Sentences found in Trash',
                'parent' => 'Parent Sentence',
				'rewrite' => array('slug' => 'sentence')
            ),

            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'thumbnail','page-attributes' ),
            'taxonomies' => array( 'post_tag','category'),
            'rewrite' => array('slug' => 'sentence'),
            'menu_icon' => 'dashicons-book',
            'has_archive' => 'sentence',
        )
    );
    flush_rewrite_rules();
}

function create_alignment() {
	register_post_type( 'alignment',
        array(
            'labels' => array(
                'name' => 'Alignments',
                'singular_name' => 'Alignment',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Alignment',
                'edit' => 'Edit',
                'edit_item' => 'Edit Alignment',
                'new_item' => 'Add Alignment',
                'view' => 'View',
                'view_item' => 'View Alignment',
                'search_items' => 'Search Alignment',
                'not_found' => 'No Alignments found',
                'not_found_in_trash' => 'No Alignments found in Trash',
                'parent' => 'Parent Alignment',
				'rewrite' => array('slug' => 'alignment')
            ),

            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'thumbnail','page-attributes' ),
            'taxonomies' => array( 'post_tag','category'),
            'rewrite' => array('slug' => 'alignment'),
            'menu_icon' => 'dashicons-book',
            'has_archive' => 'alignment',
        )
    );
    flush_rewrite_rules();
}

function create_casestudy() {
    register_post_type( 'casestudy',
        array(
            'labels' => array(
                'name' => 'Case Studies',
                'singular_name' => 'Case Study',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Case Study',
                'edit' => 'Edit',
                'edit_item' => 'Edit Case Study',
                'new_item' => 'Add Case Study',
                'view' => 'View',
                'view_item' => 'View Case Study',
                'search_items' => 'Search Case Studies',
                'not_found' => 'No Case Studies found',
                'not_found_in_trash' => 'No Case Studies found in Trash',
                'parent' => 'Parent Case Study',
				'rewrite' => array('slug' => 'case-studies')
            ),

            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'thumbnail','page-attributes' ),
            'taxonomies' => array( 'post_tag','category'),
            'rewrite' => array('slug' => 'case-studies'),
            'menu_icon' => 'dashicons-hammer',
            'has_archive' => 'case-studies',
        )
    );
    flush_rewrite_rules();
}


function remove_yoast(){
    if( !current_user_can("view_seo")){
        // Remove page analysis columns from post lists, also SEO status on post editor.
        add_filter('wpseo_use_page_analysis', '__return_false');

        // Remove Yoast meta boxes from all of these post types.
        add_action('add_meta_boxes', function() {
            $post_types = ['career', 'subject', 'sentence', 'alignment'];

            foreach ($post_types as $type) {
                remove_meta_box('wpseo_meta', $type, 'normal');
            }
        }, 100000);
    }
}
add_action('add_meta_boxes', 'remove_yoast');

// include all of the rest api files
include(get_template_directory() . '/inc/api.php');
include(get_template_directory() . '/inc/toolkit-functions.php');


?>