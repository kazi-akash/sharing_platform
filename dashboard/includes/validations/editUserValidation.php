<?php

  if (empty($username)) {
    $usernameErr = "<span style='color: red'><b> ***Username is required!</b></span>";
  } else {
    $username = test_input($username);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
      $usernameErr = "<span style='color: red'><b> ***Only letters and white space allowed!</b></span>";
    }
  }

    if (empty($user_firstname)) {
    $user_firstnameErr = "<span style='color: red'><b> ***Firstname is required!</b></span>";
  } else {
    $user_firstname = test_input($user_firstname);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$user_firstname)) {
      $user_firstnameErr = "<span style='color: red'><b> ***Only letters and white space allowed!</b></span>";
    }
  }

    if (empty($user_lastname)) {
    $user_lastnameErr = "<span style='color: red'><b> ***Lastname is required!</b></span>";
  } else {
    $user_lastname = test_input($user_lastname);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$user_lastname)) {
      $user_lastnameErr = "<span style='color: red'><b> ***Only letters and white space allowed!</b></span>";
    }
  }

  if (empty($user_password)) {
    $user_passwordErr = "<span style='color: red'><b> ***Password is required!</b></span>";
  } else {
   $user_password = test_input($user_password);
   if (strlen($_POST["user_password"]) <= '4') 
   {
       $user_passwordErr = "<span style='color: red'><b> ***Password is required!</b></span>";
    }}
  
  if (empty($email)) {
    $emailErr = "<span style='color: red'><b> ***Email is required!</b></span>";
  } else {
    $email = test_input($email);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "<span style='color: red'><b> ***Invalid email format!</b></span>";
    }
  }
    
  if (empty($mobile)) {
    $mobileErr = "<span style='color: red'><b> ***Mobile is required!</b></span>";
  } else {
    $mobile = test_input($mobile);
  }

   if (empty($gender)) {
    $genderErr = "<span style='color: red'><b> ***gender is required!</b></span>";
  } else {
    $gender = test_input($gender);
  }

  if (empty($dob)) {
    $dobErr = "<span style='color: red'><b> ***DOB is required!</b></span>";
  } else {
    
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
