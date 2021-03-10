<?php session_start(); ?>
<?php include("includes/db.php") ?>
<?php include("includes/header.php") ?>
<!-- Navigation -->
<?php include("includes/navigation.php") ?>

<!-- Page Content -->
<div class="container">
<div class="row">


<!-- Blog Entries Column -->
<div class="col-md-8">
  <!-- First Blog Post -->
  
<?php 
  if(isset($_POST['submit']))
  {
    $search= $_POST['search'];
    $sql = "SELECT * FROM post WHERE post_tags  LIKE '%$search%' or post_title LIKE '%$search%' or post_content LIKE '%$search%'";

    $result = $conn->query($sql);
    
    if($conn->connect_errno){
    die("connection failed!<br>".$conn->connect_errno);
    }
    else{
    if(!empty($search) && $result->num_rows > 0){

      ?>
  <div class="">
    <div class="row">
    <div class="col-xs-6 col-xs-offset-3">
      <div class="alert">
        <span class="closebtn">&times;</span>  
        <strong style="color: black"><?php echo $result->num_rows." result found!!!" ?></strong>
      </div>
    </div>
    </div>
    </div>
    <h2>
    <h2>Searched Stories</h2>
    <hr>
      <?php
      
      while($row = $result->fetch_assoc()){
      // echo "<li> <a href='#'>".$row["cat_title"]."</a> </li>";
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = substr($row['post_content'],0,120);
       
    ?>

    <H2><a href="story.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></H2> 
    </h2>
    <p class="lead">
        by <a href="index.php"><?php echo $post_author; ?></a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
    <hr>
    <img class="img-responsive" src="images/<?php echo $post_image; ?>" height="150px" width="300px" alt="">
    <hr>
    <p><?php echo $post_content ?></p>
    <a class="btn btn-primary" href="story.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
    <hr>
    <?php   
  } 
    } else {
      
       ?>
    <div class="">
    <div class="row">
    <div class="col-xs-6 col-xs-offset-3">
      <div class="alert">
        <span class="closebtn">&times;</span>  
        <strong>No result found! <a href="index.php" style="color: black">Go back!</a></strong>
      </div>
    </div>
    </div>
    </div>
    <?php
    }}}
?>
  
     
</div>

<?php include("includes/sidebar.php") ?>

</div>
<hr>

<?php include("includes/footer.php") ?>