<?php
    //Register Google Maps API Key
    function my_acf_init() {
	
        acf_update_setting('google_api_key', 'AIzaSyBgyeZyl38HHReuj5g1Ylcrj565uD0Kj0Q');
    }
    
    add_action('acf/init', 'my_acf_init');

    if( function_exists('acf_add_local_field_group') ):

		// Career Fields
		acf_add_local_field_group(array(
			'key' => 'group_5a6fde576421f',
			'title' => 'Career Fields',
			'fields' => array(
				array(
					'key' => 'field_5a6fde7f32c8a',
					'label' => 'Featured Image',
					'name' => 'featured_image',
					'type' => 'image',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5a6fdeb732c8b',
					'label' => 'Skills',
					'name' => 'skills',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 0,
					'delay' => 0,
				),
				array(
					'key' => 'field_5a6fdee432c8c',
					'label' => 'Links',
					'name' => 'links',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => 'field_5a6fdefa32c8d',
					'min' => 0,
					'max' => 0,
					'layout' => 'table',
					'button_label' => '',
					'sub_fields' => array(
						array(
							'key' => 'field_5a6fdefa32c8d',
							'label' => 'Label',
							'name' => 'label',
							'type' => 'text',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5a6fdf1332c8e',
							'label' => 'URL',
							'name' => 'url',
							'type' => 'url',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
						),
					),
				),
				array(
					'key' => 'field_5aded2f0a117c',
					'label' => 'Video url',
					'name' => 'video_url',
					'type' => 'url',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5adee178bb07c',
					'label' => 'Video Thumbnail',
					'name' => 'video_thumbnail',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'career',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'acf_after_title',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));
		
		// Common Wheel Properties
		acf_add_local_field_group(array(
			'key' => 'group_5a6fc51e8deb7',
			'title' => 'Common Wheel Properties',
			'fields' => array(
				array(
					'key' => 'field_5a6fc527f92a6',
					'label' => 'code',
					'name' => 'code',
					'type' => 'text',
					'instructions' => 'Enter a code in kebab-case to represent this alignment.',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'alignment',
					),
				),
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'career',
					),
				),
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'subject',
					),
				),
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'sentence',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'side',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));
		
		// Helpful Links Resources
		acf_add_local_field_group(array(
			'key' => 'group_5a726dea4c0f3',
			'title' => 'Helpful Links Resources',
			'fields' => array(
				array(
					'key' => 'field_5a726df74949c',
					'label' => 'Resources',
					'name' => 'resources',
					'type' => 'repeater',
					'instructions' => 'Enter the text and file that you would like to download',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => 'field_5a726e254949d',
					'min' => 0,
					'max' => 0,
					'layout' => 'table',
					'button_label' => '',
					'sub_fields' => array(
						array(
							'key' => 'field_5a726e254949d',
							'label' => 'Resource Name',
							'name' => 'resource_name',
							'type' => 'text',
							'instructions' => 'This is the text that will appear on the resource card.',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => 'Resource Name',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5a879e3d20b56',
							'label' => 'Resource Image',
							'name' => 'resource_image',
							'type' => 'image',
							'instructions' => 'This is the image which will show on the resource card.',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'url',
							'preview_size' => 'thumbnail',
							'library' => 'all',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '',
						),
						array(
							'key' => 'field_5a87eabbb4b98',
							'label' => 'Resource Link',
							'name' => 'resource_link',
							'type' => 'text',
							'instructions' => 'Add the url reference for the link. If it is a file hosted by this wordpress instance, please enter the RELATIVE url.',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5a87eafdb4b99',
							'label' => 'Resource Type',
							'name' => 'resource_type',
							'type' => 'select',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'file' => 'File',
								'video' => 'Video',
								'link' => 'Link',
							),
							'default_value' => array(
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'return_format' => 'value',
							'placeholder' => '',
						),
						array(
							'key' => 'field_5d05dd887d5cb',
							'label' => 'Image',
							'name' => 'image',
							'type' => 'url',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
						),
					),
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'page',
						'operator' => '==',
						'value' => '410',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'acf_after_title',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));
		
		// Subjects
		acf_add_local_field_group(array(
			'key' => 'group_5a6fc5d418dea',
			'title' => 'Subjects',
			'fields' => array(
				array(
					'key' => 'field_5a6fc5de5d838',
					'label' => 'sentences',
					'name' => 'sentences',
					'type' => 'post_object',
					'instructions' => 'Select the sentences that this object relates to',
					'required' => 1,
					'conditional_logic' => 0,
					'show_in_graphql' => 1,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array(
						0 => 'sentence',
					),
					'taxonomy' => array(
					),
					'allow_null' => 0,
					'multiple' => 1,
					'return_format' => 'object',
					'ui' => 1,
				),
				array(
					'key' => 'field_5e8a953b9411c',
					'label' => 'Area Colours',
					'name' => 'colour',
					'type' => 'select',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'show_in_graphql' => 1,
					'choices' => array(
						'#F9ED31' => 'Yellow',
						'#00A9A3' => 'Aqua',
						'#F15A29' => 'Orange',
						'#BED73B' => 'Green',
						'#BE1E2D' => 'Maroon',
						'#6F2B8D' => 'Purple',
					),
					'default_value' => array(
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'subject',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'side',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
			'graphql_field_name' => 'subject',
		));
		
		// Alignments
		acf_add_local_field_group(array(
			'key' => 'group_5a6fc57e52fed',
			'title' => 'Those With Alignments',
			'fields' => array(
				array(
					'key' => 'field_5a6fc584f2e5b',
					'label' => 'alignments',
					'name' => 'alignments',
					'type' => 'post_object',
					'instructions' => 'Select all the alignments that this object relates to',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array(
						0 => 'alignment',
					),
					'taxonomy' => array(
					),
					'allow_null' => 0,
					'multiple' => 1,
					'return_format' => 'object',
					'ui' => 1,
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'career',
					),
				),
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'sentence',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'side',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));

		//Add social icons to social menu
        acf_add_local_field_group(array(
            'key' => 'group_5c9ad2a1d1415',
            'title' => 'Menu Icons',
            'fields' => array(
                array(
                    'key' => 'field_5c9ad2cb3f1f4',
                    'label' => 'Social Icon',
                    'name' => 'icon',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'url',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
            ),
            'location' => array(
				array(
					array(
						'param' => 'nav_menu_item',
						'operator' => '==',
						'value' => 'location/social',
					),
				),
			),
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
		));
		
		endif;
?>