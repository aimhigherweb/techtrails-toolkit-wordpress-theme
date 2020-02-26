<?php

/**
 * This file contains all of the methods that are used in the rest api relating to the toolkit functionality.
 */


/**
  * Return a list of all of the careers in the database.
  */
function getCareers( ) {
  $data = array();
	$careersArgs = array(
    'numberposts' => -1,
    'post_status' => 'publish',
    'post_type' => 'career'
  );

	$careers = get_posts($careersArgs);
  $link_id = 1;
  foreach($careers as $career) {
    $obj = new stdClass();
    $obj->id = $career->ID;
    $obj->label = $career->post_title;
    $obj->code = get_post_meta($career->ID, "code", true);
    $obj->alignments = getAlignmentsData(get_post_meta($career->ID, "alignments", true));
    $obj->content = get_post_field('post_content', $career->ID);
    $obj->skills = get_post_meta($career->ID, "skills", true);
    $links = get_field("links", $career->ID);
    $link_arr = array();

    if (!empty($links)) {
      foreach($links as $link) {
        $temp = array(
          'id' => $link_id,
          'url' => $link['url'],
          'label' => $link['label'],
        );

        $link_id += 1;

        array_push($link_arr, $temp);
      }
    }

    $obj->resources = $link_arr;

    $careerFeaturedImage = get_field("featured_image", $career->ID);
    $obj->featured_image_thumbnail = $careerFeaturedImage['sizes']['thumbnail'];
    $obj->featured_image_large = $careerFeaturedImage['sizes']['large'];

    $videoURL = get_field("video_url", $career->ID);
    $obj->videoUrl = $videoURL;
    if ($videoURL) {
      $obj->videoThumbnail = get_field("video_thumbnail", $career->ID);
    } else {
      $obj->videoThumbnail = get_template_directory_uri() ."/img/blank.png";
    }

    array_push($data, $obj);
  }

	return new WP_REST_Response($data, 200);
}

/**
 * Return a data structure representing the career filter structure.
 */
function getCareerFilterStructure() {
  $data = array();
	$subjectArgs = array(
    'numberposts' => -1,
    'post_status' => 'publish',
    'post_type' => 'subject'
  );

	$subjects = get_posts($subjectArgs);

  foreach($subjects as $subject) {
    $obj = new stdClass();
    $obj->id = $subject->ID;
    $obj->label = $subject->post_title;
    $obj->code = get_post_meta($subject->ID, "code", true);
    $obj->description = $subject->post_content;
    $obj->sentences = getSentencesData(get_post_meta($subject->ID, "sentences", true));
    $obj->order = $subject->menu_order;
    $image = get_post_thumbnail_id($subject->ID);
    if (!empty($image)) {
      $obj->featured_image_thumbnail = wp_get_attachment_image_src($image, 'thumbnail')[0];
      $obj->featured_image_large = wp_get_attachment_image_src($image, 'large')[0];
    }
    array_push($data, $obj);
  }

	return new WP_REST_Response($data, 200);
}

function getSentencesData($sentences) {
  $data = array();
  foreach($sentences as $sentence) {
    $obj = new stdClass();
    $obj->label = get_the_title($sentence);
    $obj->code = get_post_meta($sentence, "code", true);
    $obj->alignments = getAlignmentsData(get_post_meta($sentence, "alignments", true));
    array_push($data, $obj);
  }
  return $data;
}

function getAlignmentsData($alignments) {
  $data = array();
  foreach($alignments as $alignment) {
    $obj = new stdClass();
    $obj->label = get_the_title($alignment);
    $obj->code = get_post_meta($alignment, "code", true);
    array_push($data, $obj);
  }
  return $data;
}

function getForms() {
  $forms = RGFormsModel::get_forms( null, 'title');
  $data = array();

  $choice_id = 1;
  foreach( $forms as $form ) {
    $form_data = RGFormsModel::get_form_meta($form->id);
    $field_arr = array();

    foreach( $form_data['fields'] as $field) {
      if(!empty($field['choices'])) {
        $choice_arr = array();

        foreach($field['choices'] as $choice) {
          $choice['id'] = $choice_id++;
          array_push($choice_arr, $choice);
        }

        $field['choices'] = $choice_arr;
        $field['countries'] = null;
      } else if ($field['type'] == "address") {
        foreach($field['inputs'] as $input) {
          if ($input['label'] == "Country" && $input['isHidden'] != true) {
            $countries = GF_Field_Address::get_countries();
            $ret_arr = array();
            foreach($countries as $key => $value) {
              $arr = array();
              $arr['id'] = $key;
              $arr['label'] = $value;
              array_push($ret_arr, $arr);
            }
          }
        }
        $field['countries'] = $ret_arr;
        $field['choices'] = array();
      } else {
        $field['countries'] = null;
        $field['choices'] = array();
      }
    }

    array_push($data, $form_data);
  }


  return new WP_REST_Response($data, 200);

}

?>
