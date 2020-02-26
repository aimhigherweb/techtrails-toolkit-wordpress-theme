<?php

/**
 * register all of the rest endpoints that are required in the system.
 */
add_action( 'rest_api_init', function () {
    $version = 'v1';
    register_rest_route('rest/' . $version, 'filterStructure', array(
      'methods' => 'GET',
      'callback' => 'getCareerFilterStructure',
    ));
    register_rest_route( 'rest/' . $version, 'career', array(
        'methods' => 'GET',
        'callback' => 'getCareers',
    ));
    register_rest_route( 'rest/' . $version, 'form', array(
        'methods' => 'GET',
        'callback' => 'getForms',
    ));
});

?>