<?php  session_start(); ?>
<?php
 include("db.php");
 if(isset($_POST['login'])){
  $u_name = $conn -> real_escape_string($_POST['username']);
  $pass = $conn -> real_escape_string($_POST['password']);
  $login_query = "SELECT * FROM users where username= '{$u_name}' ";

  $result = $conn -> query($login_query);
  
    while($row = $result -> fetch_assoc()){
    $hashPass = $row['user_password'];
    $user_id = $row["user_id"];
    $user_role = $row["user_role"];
    $username = $row["username"];
    $fname = $row["user_firstname"];
    $lname = $row["user_lastname"];
    $gender = $row["gender"];
    $dob = $row["dob"];  
    } }

    if ($username == $u_name) {
     if (password_verify($pass, $hashPass)) {
      
      $_SESSION["username"] =  $username;
      $_SESSION["user_id"] =  $user_id;
      $_SESSION["user_role"] =  $user_role;
      // $_SESSION["user_firstname"] =  $fname;
      // $_SESSION["user_firstname"] =  $lname;

      header("location: ../dashboard");

    } else {
    echo $conn->error;

    echo "<script language='javascript'>";
    echo 'window.location.replace("../index.php");';
    echo 'alert("Wrong password!");';
    echo "</script>";
        
    //  header("location: ../index.php");
     
    }
    } else {
      echo "<script language='javascript'>";
      echo 'window.location.replace("../index.php");';
      echo 'alert("User does not exist!");';
      echo "</script>";
    //  echo "no  user found!";
    //  echo "<script type='text/javascript'>alert('Wrong password');</script>";
    //  header("location: ../index.php");
    }


?>