<?php
$usernameErr = $user_passwordErr = $user_firstnameErr = $user_lastnameErr = $emailErr = $mobileErr = $genderErr = $dobErr = "";
$username = $user_password = $user_firstname = $user_lastname = $email = $mobile = $gender =  $dob = "";

 if(isset($_GET['edit_user'])){
   $edit_user_id = $_GET['edit_user'];
 }
  $sql_user_id = "SELECT * FROM users WHERE user_id= $edit_user_id";
  $select_users = $conn->query($sql_user_id);
   
   if($select_users->num_rows > 0){
    while($row = $select_users->fetch_assoc()){ 
     $user_id = $row["user_id"]; 
     $username = $row["username"];
     $user_password = $row["user_password"];
     $user_firstname = $row["user_firstname"];
     $user_lastname = $row["user_lastname"];
     $email = $row["email"];
     $mobile = $row["mobile"];
     $gender = $row["gender"];
     $user_image = $row["user_image"];
     $dob = $row["dob"];
     $user_role = $row["user_role"];
    }}

    // echo "User Created: " . " " . "<a href='users.php'>View Users</a> "; 

    //update
    if(isset($_POST['edit_user'])){
     $username = $_POST["username"];
     $user_password = $_POST["user_password"];
     $user_firstname = $_POST["user_firstname"];
     $user_lastname = $_POST["user_lastname"];
     $email = $_POST["email"];
     $mobile = $_POST["mobile"];
     $gender = $_POST["gender"];
     $user_image = $_FILES["image"]["name"];
     $user_image_temp = $_FILES["image"]["tmp_name"];
     $dob = $_POST["dob"];
     $user_role = $_POST["user_role"];

    move_uploaded_file($user_image_temp, "../images/$user_image");

     include("validations/userValidation.php");

    if(!empty($username && $user_password && $user_firstname && $user_lastname && $email && $mobile && $dob)){
    $query = "UPDATE users SET username  = '{$username}', user_password = '{$user_password}', user_firstname   = '{$user_firstname}', user_lastname = '{$user_lastname}', email = '{$email}', mobile = '{$mobile}', gender= '{$gender}',user_image  = '{$user_image}', dob  = '{$dob}' WHERE user_id = {$user_id} ";

    // $query = "UPDATE post SET ";
    // $query .="username  = '{$username}', ";
    // $query .="user_password = '{$user_password}', ";
    // $query .="user_firstname   = '{$user_firstname}', ";
    // $query .="user_lastname = '{$user_lastname}', ";
    // $query .="email = '{$email}', ";
    // $query .="mobile = '{$mobile}', ";
    // $query .="gender= '{$gender}', ";
    // $query .="user_image  = '{$user_image}', ";
    // $query .="dob  = '{$dob}' ";
    // $query .= "WHERE user_id = {$edit_user_id} ";

    $update_user = $conn->query($query);
    if($update_user){
     ?>
    <div class="container">
    <div class="row">
    <div class="col-xs-6 col-xs-offset-3">
      <div class="alert">
        <span class="closebtn">&times;</span>  
        <strong>User Updated! <a href="users.php" style="color: black"> <b>Now click here to manage user!!!</b> </a></strong>
      </div>
    </div>
    </div>
    </div>
    <?php
    }
    else {
     echo "error: ". $conn->error;
    }}
    // confirm($update_post);
  }
  else{
    // echo "error: ". $conn->error;
  }
?>
 <div class="container">
<section id="login">
<div class="container">
<div class="row">
<div class="col-xs-6 col-xs-offset-3">
<div class="form-wrap">
<h2 class="page-header">
 Update user
</h2>
<form action="" method="post" enctype="multipart/form-data">    
   <div class="form-group">
   <label for="username">Username</label>
   <input type="text" value=<?php echo $username ?> class="form-control" name="username">
   </div>
   <div class="form-group">
   <label for="username">Password</label>
   <input type="password" value=<?php echo $user_password ?> class="form-control" name="user_password">
   </div>
   <div class="form-group">
   <label for="user_firstname">First Name</label>
   <input type="text" value=<?php echo $user_firstname ?> class="form-control" name="user_firstname">
   </div>
   <div class="form-group">
   <label for="user_lastname">Last Name</label>
   <input type="text" value=<?php echo $user_lastname ?> class="form-control" name="user_lastname">
   </div>
   <div class="form-group">
   <label for="email">Email</label>
   <input type="email" value=<?php echo $email ?> class="form-control" name="email">
   </div>
   <div class="form-group">
   <label for="mobile">Mobile</label>
   <input type="text" value=<?php echo $mobile ?> class="form-control" name="mobile">
   </div>
  
  <div class="form-group">
   <label for="gender">Gender</label> <br>
    <select name="gender" id="">
    
      <option value=<?php echo $gender ?>><?php echo $gender ?></option>
      <?php
      if($gender == "male"){
        echo "<option value='female'>Female</option>";
        echo "<option value='other'>Other</option>";
      } else {
        echo "<option value='male'>Male</option>";
        echo "<option value='other'>Other</option>";
      }
      ?>
    </select>
 </div>

<div class="form-group">
   <label for="dob">DOB</label>
   <input value=<?php echo $dob ?> type="date" class="form-control" name="dob">
   </div>

   <div class="form-group">
   <img width="100" src="../images/<?php echo $user_image ?>"  alt="">
   <input type="file"  name="image">
  </div>


  <div class="form-group">
   <label for="user_role">User Role</label> <br>
    <select name="user_role" id="">
      <option value=<?php echo $user_role ?>><?php echo $user_role ?></option>
      <?php
      if($user_role == "admin"){
        echo "<option value='user'>Admin</option>";
      } else {
        echo "<option value='admin'>User</option>";
      }
      ?>
    </select>
 </div>
    
   <div class="form-group">
    <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
  </div>
</form>
</div>
</div> 
</div> 
</div> 
</section>
</div>

