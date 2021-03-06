<?php

  if (empty($post_title)) {
    $post_titleErr = "<span style='color: red'><b> ***Title is required!</b></span>";
  } else {
    $post_title = test_input($post_title);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$post_title)) {
      $post_titleErr = "<span style='color: red'><b> ***Only letters and white space allowed!</b></span>";
    }
  }

  if (empty($post_category_id)) {
    $post_category_idErr = "<span style='color: red'><b> ***Category is required!</b></span>";
  } else {
    $post_category_id = test_input($post_category_id);
  }

    if (empty($post_tags)) {
    $post_tagsErr = "<span style='color: red'><b> ***Tags are required!</b></span>";
  } else {
    $post_tags = test_input($post_tags);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$post_tags)) {
      $post_tagsErr = "<span style='color: red'><b> ***Only letters and white space allowed!</b></span>";
    }
  }

    if (empty($post_content)) {
    $post_contentErr = "<span style='color: red'><b> ***Category is required!</b></span>";
  } else {
    $post_content = test_input($post_content);
  }

  if (empty($post_date)) {
    $post_dateErr = "<span style='color: red'><b> ***DOB is required!</b></span>";
  } else {
    
  }

   if (empty($post_image)) {
    $post_imageErr = "<span style='color: red'><b> ***Image is required!</b></span>";
  } else {
    
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
