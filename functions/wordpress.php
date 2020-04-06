<?php

    //Upload logo to customise area
    function custom_logo_setup() {
        $defaults = array(
            'height'      => 50,
            'width'       => 120,
            'flex-height' => true,
            'flex-width'  => true,
        );
        add_theme_support( 'custom-logo', $defaults );
    }
    add_action( 'after_setup_theme', 'custom_logo_setup' );

    // Main Nav
    register_nav_menus(array (
        'primary' => __( 'Primary Menu' ),
        'social' => 'Social Menu',
        'footer' => 'Footer Menu',
	));
	
	//Add Social Icons to Nav Menu
    add_filter('wp_nav_menu_objects', 'social_menu_icons', 10, 2);

    function social_menu_icons($items, $args) {
        if($args->theme_location == 'social_menu') {
            foreach($items as &$item) {
                $icon = file_get_contents(get_field('icon', $item));

                if($icon) {
                    $item->title = $icon . $item->title;
                }
            }

            return $items;
        }
        else {
            return $items;
        }
    }

    // Hide the widget titles
    add_filter('widget_title','my_widget_title'); 

    function my_widget_title($t) {
        return null;
    }

    //Allow using SVGs
    // Allow SVG
    add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

        global $wp_version;
        if ( $wp_version !== '4.7.1' ) {
            return $data;
        }
        
        $filetype = wp_check_filetype( $filename, $mimes );
        
        return [
            'ext'             => $filetype['ext'],
            'type'            => $filetype['type'],
            'proper_filename' => $data['proper_filename']
        ];
        
    }, 10, 4 );

    function cc_mime_types( $mimes ){
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
    add_filter( 'upload_mimes', 'cc_mime_types' );

    function fix_svg() {
        echo '<style type="text/css">
            .attachment-266x266, .thumbnail img {
                width: 100% !important;
                height: auto !important;
            }
            </style>';
    }
    add_action( 'admin_head', 'fix_svg' );

    //Custom Login Logo
    function my_login_logo_one() { 
        ?> 
        <style type="text/css"> 
            body.login div#login h1 a {
                background-image: url('/wp-content/themes/toolkittechtrails/img/aimhigher.png');
                background-position: center;
                background-size: contain;
				height: 150px;
				margin-bottom: 0;
                padding-bottom: 30px; 
                width: 100%;
            } 
        </style>
        <?php 
    } add_action( 'login_enqueue_scripts', 'my_login_logo_one' );

    //Allow Featured images for blog posts
    add_theme_support( 'post-thumbnails' ); 

    //Stop Inlining width and height for images
    add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 ); 
    add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
    function remove_thumbnail_dimensions( $html ) { 
        $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html ); 
        return $html;
    }

    //Nullify for Gatsby Rest API
    if (!function_exists('acf_nullify_empty')) {
        /**
         * Return `null` if an empty value is returned from ACF.
         *
         * @param mixed $value
         * @param mixed $post_id
         * @param array $field
         *
         * @return mixed
         */
        function acf_nullify_empty($value, $post_id, $field) {
            if (empty($value)) {
                return null;
            }
            return $value;
        }
    }

    add_filter('acf/format_value/type=image', 'acf_nullify_empty', 100, 3);

    function filter_ptags_on_images($content){
        return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
     }
     
     add_filter('the_content', 'filter_ptags_on_images');

     //Duplicating Pages
    function rd_duplicate_post_as_draft(){
        global $wpdb;
        if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
            wp_die('No post to duplicate has been supplied!');
        }
     
        /*
         * Nonce verification
         */
        if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
            return;
     
        /*
         * get the original post id
         */
        $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
        /*
         * and all the original post data then
         */
        $post = get_post( $post_id );
     
        /*
         * if you don't want current user to be the new post author,
         * then change next couple of lines to this: $new_post_author = $post->post_author;
         */
        $current_user = wp_get_current_user();
        $new_post_author = $current_user->ID;
     
        /*
         * if post data exists, create the post duplicate
         */
        if (isset( $post ) && $post != null) {
     
            /*
             * new post data array
             */
            $args = array(
                'comment_status' => $post->comment_status,
                'ping_status'    => $post->ping_status,
                'post_author'    => $new_post_author,
                'post_content'   => $post->post_content,
                'post_excerpt'   => $post->post_excerpt,
                'post_name'      => $post->post_name,
                'post_parent'    => $post->post_parent,
                'post_password'  => $post->post_password,
                'post_status'    => 'draft',
                'post_title'     => $post->post_title,
                'post_type'      => $post->post_type,
                'to_ping'        => $post->to_ping,
                'menu_order'     => $post->menu_order
            );
     
            /*
             * insert the post by wp_insert_post() function
             */
            $new_post_id = wp_insert_post( $args );
     
            /*
             * get all current post terms ad set them to the new post draft
             */
            $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
            foreach ($taxonomies as $taxonomy) {
                $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
                wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
            }
     
            /*
             * duplicate all post meta just in two SQL queries
             */
            $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
            if (count($post_meta_infos)!=0) {
                $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
                foreach ($post_meta_infos as $meta_info) {
                    $meta_key = $meta_info->meta_key;
                    if( $meta_key == '_wp_old_slug' ) continue;
                    $meta_value = addslashes($meta_info->meta_value);
                    $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
                }
                $sql_query.= implode(" UNION ALL ", $sql_query_sel);
                $wpdb->query($sql_query);
            }
     
     
            /*
             * finally, redirect to the edit post screen for the new draft
             */
            wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
            exit;
        } else {
            wp_die('Post creation failed, could not find original post: ' . $post_id);
        }
    }
    add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
     
    /*
     * Add the duplicate link to action list for post_row_actions
     */
    function rd_duplicate_post_link( $actions, $post ) {
        if (current_user_can('edit_posts')) {
            $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
        }
        return $actions;
    }
     
    add_filter('page_row_actions', 'rd_duplicate_post_link', 10, 2);

    // Add Colour Palette to Gutenberg
    function disable_gutenberg_custom_colour_picker() {
        add_theme_support( 'disable-custom-colors' );
	}
    add_action( 'after_setup_theme', 'disable_gutenberg_custom_colour_picker' );
    
    function disable_gutenberg_custom_font_sizes() {
        add_theme_support('disable-custom-font-sizes');
	}
	add_action( 'after_setup_theme', 'disable_gutenberg_custom_font_sizes' );

	function techtrails_add_custom_gutenberg_color_palette() {
		add_theme_support(
			'editor-color-palette',
			[
				[
					'name'  => 'Yellow',
					'slug'  => 'yellow',
					'color' => '#F9ED31',
				],
				[
					'name'  => 'Aqua',
					'slug'  => 'aqua',
					'color' => '#00A9A3',
				],
				[
					'name'  => 'Orange',
					'slug'  => 'orange',
					'color' => '#F15A29',
				],
				[
					'name'  => 'Green',
					'slug'  => 'green',
					'color' => '#BED73B',
				],
				[
					'name'  => 'Maroon',
					'slug'  => 'maroon',
					'color' => '#BE1E2D',
                ],
                [
					'name'  => 'Purple',
					'slug'  => 'purple',
					'color' => '#6F2B8D',
                ],
				[
					'name'  => 'Black',
					'slug'  => 'black',
					'color' => '#000000',
                ],
                [
					'name'  => 'White',
					'slug'  => 'white',
					'color' => '#ffffff',
                ],
                [
					'name'  => 'Grey',
					'slug'  => 'grey',
					'color' => '#666666',
                ],
			]
		);
	}
	add_action( 'after_setup_theme', 'techtrails_add_custom_gutenberg_color_palette' );
    
?>