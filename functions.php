<?php

    require_once(__DIR__ . '/functions/acf.php');
    // require_once(__DIR__ . '/functions/wordpress.php');
    require_once(__DIR__ . '/functions/custom_posts.php');

    //Trigger Gatsby build when saving post
    // add_action('save_post', 'trigger_build');
    // function trigger_build($post_id) {
    //     if(wp_is_post_revision($post_id)) {
    //         return;
    //     }
		
	// 	$token = '';

    //     $curlAuth = curl_init();

    //     curl_setopt_array($curlAuth, array(
    //     CURLOPT_URL => "https://app.buddy.works/yowconf/yow-gatsby-frontend/pipelines/pipeline/188760/trigger-webhook?token=5d3e0709336b39ca91e4ee443c01380cbec25cec304151a0422fddb8012af1cc9e96507761457a9d03c3d620c586a58d",
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => "",
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 30,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "POST",
    //     CURLOPT_HTTPHEADER => array(
    //         "Accept: application/json",
    //         "Content-Type: application/json",
    //     ),
    //     ));

    //     $response = curl_exec($curlAuth);
    //     $err = curl_error($curlAuth);

    //     if($err) {
    //         add_option('my_notice_text', 'Something broke, talk to Amy');
    //     };
		
	// 	$data = json_decode($response);
		
	// 	$token = $data->access_token;

    //     curl_close($curlAuth);
		
    //     $curlPost = curl_init();
		
	// 	$auth = "Authorization: " . $token;

    //     curl_setopt_array($curlPost, array(
    //     CURLOPT_URL => "https://api.codeship.com/v2/organizations/8c4821a0-5db1-0136-f51e-1aa0af374bd1/projects/695e3690-2052-0137-d825-2670f6f305ce/builds",
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => "",
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 30,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "POST",
    //     CURLOPT_POSTFIELDS => "{\"ref\":\"heads/master\"}",
    //     CURLOPT_HTTPHEADER => array(
    //         "Accept: application/json",
	// 		"Content-Type: application/json",
    //         $auth,
    //     ),
    //     ));

    //     $response = curl_exec($curlPost);
    //     $err = curl_error($curlPost);

    //     curl_close($curlPost);

    //     if($err) {
    //         add_option('my_notice_text', 'Something broke, talk to Amy');
    //     }

        

    // }

    // add_action('admin_notices', 'my_admin_notices');
    
    // function my_admin_notices() {
    //     // If a notice exists then echo it as a notice.
    //     if ( get_option('my_notice_text') ) {
    //         echo get_option( 'my_notice_text' );
    //         delete_option('my_notice_text');
    //     }
    // }
    
?>