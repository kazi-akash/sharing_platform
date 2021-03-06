<? session_start(); ?>


<!-- Blog Search Well -->
<div class="col-md-4">
<?php 
  // if(isset($_POST['submit']))
  // {
  //   $search= $_POST['search'];
  //   $sql = "SELECT * FROM post WHERE post_tags LIKE '%$search%'";
  //   $result = $conn->query($sql);
    
  //   if($conn->connect_errno){
  //   die("connection failed!<br>".$conn->connect_errno);
  //   }
  //   else{
  //   if($result->num_rows > 0){
  //     echo "found!";
  //   } else {
  //     echo "" . $conn->error;
  //   }}}
?>

<div class="well">
<h4>Blog Search</h4>
<form action="search.php" method="post">
<div class="input-group">
    <input name="search" type="text" class="form-control">
    <span class="input-group-btn">
        <button class="btn btn-default" type="submit" name="submit">
        <span class="glyphicon glyphicon-search"></span>
    </button>
    </span>
</div>
</form>
</div>

<?php 
   if(!isset($_SESSION['username'])){
?>

<div class="well">
  <h4>Login</h4>
  <form method="post" action="includes/login.php">
    <div class="form-group">
      <input name="username" type="text" class="form-control" placeholder="Enter Username">
    </div>
    <div class="form-group">
      <input name="password" type="password" class="form-control" placeholder="Enter Password">
    </div>
    <div>
    <br>
    </div>

    <div class="form-group">
     <button class="btn btn-primary" name="login" type="submit">Login </button>
     <a class="btn btn-primary" href="registration.php">Crate New Accoount</a>
    </div>
    
  </form><!--search form-->
</div>
<a href="logout.php"></a>
<?php
   } else {
     ?>
      <div class='well'>
      <h4><a href='dashboard/includes/logout.php'>Logout</a></h4>
      </div>
    <?php

   }
?>

<div class="well">
<h4>Blog Categories</h4>
<div class="row">
 <div class="col-md-3">
  <ul class="list-unstyled">
  <?php 
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){   
        $cat_id= $row['cat_id'];
        $cat_title= $row['cat_title'];
      
        echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>"; 
        
      }
    } else {
      
    }
  ?>
 </ul> 
 </div>

</div>

</div>

</div>