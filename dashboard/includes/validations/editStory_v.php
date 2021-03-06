<?php

  if (empty($post_title)) {
    $post_titleErr = " ***Title is required!";
  } else {
    $post_title = test_input($post_title);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$post_title)) {
      $post_titleErr = " ***Only letters and white space allowed!";
    }
  }

  if (empty($post_category_id)) {
    $post_category_idErr = " ***Category is required!";
  } else {
    $post_category_id = test_input($post_category_id);
  }

    if (empty($post_tags)) {
    $post_tagsErr = " ***Tags are required!";
  } else {
    $post_tags = test_input($post_tags);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$post_tags)) {
      $post_tagsErr = " ***Only letters and white space allowed!";
    }
  }

    if (empty($post_content)) {
    $post_contentErr = " ***Category is required!";
  } else {
    $post_content = test_input($post_content);
  }

  if (empty($post_date)) {
    $post_dateErr = " ***DOB is required!";
  } else {
    
  }

  //  if (empty($post_image)) {
  //   $post_imageErr = " ***Image is required!";
  // } else {
    
  // }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
