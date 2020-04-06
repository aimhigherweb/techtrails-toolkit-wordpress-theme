<?php

    //Custom post type for conferences
    function create_post_type() {
        register_post_type('career',
            array(
                'labels' => array(
                    'name' => _('Careers'),
                    'singular_name' => _('Career'),
                ),
                'public' => true,
                'show_in_rest' => true,
                'show_in_graphql' => true,
                'has_archive' => true,
                'menu_icon' => 'dashicons-welcome-learn-more',
                'publicly_queryable' => true,
                'public' => true,
                'graphql_single_name' => 'Career',
                'graphql_plural_name' => 'Careers'
            )
		);
		register_post_type('subject',
            array(
                'labels' => array(
                    'name' => _('Subjects'),
                    'singular_name' => _('Subject'),
                ),
                'public' => true,
                'show_in_rest' => true,
                'show_in_graphql' => true,
                'has_archive' => true,
                'menu_icon' => 'dashicons-book',
                'publicly_queryable' => true,
                'public' => true,
                'graphql_single_name' => 'Subject',
                'graphql_plural_name' => 'Subjects'
            )
		);
		register_post_type('alignment',
            array(
                'labels' => array(
                    'name' => _('Alignments'),
                    'singular_name' => _('Alignment'),
                ),
                'public' => true,
                'show_in_rest' => true,
                'show_in_graphql' => true,
                'has_archive' => true,
                'menu_icon' => 'dashicons-forms',
                'publicly_queryable' => true,
                'public' => true,
                'graphql_single_name' => 'Alignment',
                'graphql_plural_name' => 'Alignments'
            )
		);
		register_post_type('sentence',
            array(
                'labels' => array(
                    'name' => _('Sentences'),
                    'singular_name' => _('Sentence'),
                ),
                'public' => true,
                'show_in_rest' => true,
                'show_in_graphql' => true,
                'has_archive' => true,
                'menu_icon' => 'dashicons-slides',
                'publicly_queryable' => true,
                'public' => true,
                'graphql_single_name' => 'Sentence',
                'graphql_plural_name' => 'Sentences'
            )
        );
    }
    add_action('init', 'create_post_type');

    /*
    * Disable Gutenberg for Custom Conference Post Type
    */

    add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
    function prefix_disable_gutenberg($current_status, $post_type)
    {
        // Use your post type key instead of 'product'
        if ($post_type === 'wpconf') return false;
        return $current_status;
    }

?>