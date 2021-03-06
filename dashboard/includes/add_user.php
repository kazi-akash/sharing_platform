<?php
$usernameErr = $user_passwordErr = $user_firstnameErr = $user_lastnameErr = $emailErr = $mobileErr = $genderErr = $dobErr = "";
$username = $user_password = $user_firstname = $user_lastname = $email = $mobile = $gender =  $dob = "";

if(isset($_POST['create_user'])) {
    
  $username = ($_POST['username']);
  $user_password = ($_POST['user_password']);
  $user_firstname = ($_POST['user_firstname']);
  $user_lastname = ($_POST['user_lastname']);
  $email = ($_POST['email']);
  $mobile = ($_POST['mobile']);
  $gender = ($_POST['gender']);
  $user_image = $_FILES["image"]["name"];
  $post_image_temp = $_FILES["image"]["tmp_name"];
  $dob = ($_POST['dob']);
  $user_role = ($_POST['user_role']);

   $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));    

  // $query_ok = "INSERT INTO users (username, user_password) VALUES('{$username}','{$user_password}')"; 
  move_uploaded_file($post_image_temp, "../images/$user_image");

    include("validations/userValidation.php");

  $check_user = "SELECT* FROM users";
  $c_user = $conn->query($check_user);
  $db_users = "";
  $same_uname = false;

  while($orow = $c_user->fetch_assoc()){  
    $db_users = $orow["username"];
    if($db_users == $username){
      $same_uname = true;
    }
 }
  if($same_uname == true){
    
     ?>
    <div class="container">
    <div class="row">
    <div class="col-xs-6 col-xs-offset-3">
      <div class="alert">
        <span class="closebtn">&times;</span>  
        <strong><b>Username taken</b></strong>
      </div>
    </div>
    </div>
    </div>
    <?php
  }

  if(!empty($username && $user_password && $user_firstname && $user_lastname && $email && $mobile && $dob) && ($same_uname == false)){
  $query_ok = "INSERT INTO users (username, user_password, user_firstname,user_lastname,email, mobile, gender,user_image, dob, user_role) VALUES('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$email}', '{$mobile}','{$gender}', '{$user_image}', '{$dob}', '{$user_role}')"; 
    
  $create_user_query = $conn->query($query_ok); 
  
  if($create_user_query){
   ?>
    <div class="container">
    <div class="row">
    <div class="col-xs-6 col-xs-offset-3">
      <div class="alert">
        <span class="closebtn">&times;</span>  
        <strong>New User Created! <a href="users.php" style="color: black"> <b>Now click here to manage user!!!</b> </a></strong>
      </div>
    </div>
    </div>
    </div>
    <?php
  } else {
    echo "error: ". $conn->error;
  }
 }}
    // echo "User Created: " . " " . "<a href='users.php'>View Users</a> "; 

?>
<div class="container">
<section id="login">
<div class="container">
<div class="row">
<div class="col-xs-6 col-xs-offset-3">
<div class="form-wrap">
<h2 class="page-header">
 Add new user
</h2>
<form action="" method="post" enctype="multipart/form-data">    

   <div class="form-group">
   <label for="username">Username</label>
   <?php echo $usernameErr ?>
   <input type="text" class="form-control" name="username">
   </div>
   <div class="form-group">
   <label for="user_password">Password</label>
   <?php echo $user_passwordErr ?>
   <input type="password" class="form-control" name="user_password">
   </div>
   <div class="form-group">
   <label for="user_firstname">First Name</label>
    <?php echo $user_firstnameErr ?>
   <input type="text" class="form-control" name="user_firstname">
   </div>
   <div class="form-group">
   <label for="user_lastname">Last Name</label>
        <?php echo $user_lastnameErr ?>
   <input type="text" class="form-control" name="user_lastname">
   </div>
   <div class="form-group">
   <label for="email">Email</label>
      <?php echo $emailErr ?>
   <input type="email" class="form-control" name="email">
   </div>
   <div class="form-group">
   <label for="mobile">Mobile</label>
    <?php echo $mobileErr ?>
   <input type="text" class="form-control" name="mobile">
   </div>
  
  <div class="form-group">
   <label for="post_image">Gender</label> <br>
    <select name="gender" id="">
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Others</option>
    </select>
    <?php echo $genderErr ?>
 </div>

   <div class="form-group">
   <label for="user_image">User Image</label>
   <input type="file"  name="image">
  </div>

   <div class="form-group">
   <label for="dob">DOB</label>
   <?php echo $dobErr ?>
   <input type="date" class="form-control" name="dob">
   </div>

   <div class="form-group">
   <label for="user_role">User Role</label> <br>
    <select name="user_role" id="">
      <option value="admin">Admin</option>
      <option value="user">User</option>
    </select>
 </div>
    
   <div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
  </div>

</form>
</div>
</div> 
</div> 
</div> 
</section>
</div>
