<?php session_start(); ?>
<?php
  $_SESSION["username"] =  null;
  $_SESSION["user_id"] =  null;
  $_SESSION["user_role"] = null;
  // $_SESSION["username"] =  null;
  // $_SESSION["username"] =  null;
 // // remove all session variables
 // session_unset();

 // // destroy the session
 // session_destroy();

 header("location: ../index.php");
?>
