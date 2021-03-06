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
    $sql = "SELECT * FROM post WHERE post_tags LIKE '%$search%'";
    $result = $conn->query($sql);
    
    if($conn->connect_errno){
    die("connection failed!<br>".$conn->connect_errno);
    }
    else{
    if($result->num_rows > 0){
    
    $sql = "SELECT * FROM post";
    $result = $conn->query($sql);

    if($conn->connect_errno){
    die("connection failed!<br>".$conn->connect_errno);
    }
    else{
        if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
        // echo "<li> <a href='#'>".$row["cat_title"]."</a> </li>";
         $post_title = $row['post_title'];
         $post_author = $row['post_author'];
         $post_date = $row['post_date'];
         $post_image = $row['post_image'];
         $post_content = $row['post_content'];
       
    ?>
    <h1 class="page-header">
    Page Heading
    <small>Secondary Text</small>
    </h1>
    <h2>
        <a href="#"><?php echo $post_title; ?></a>
    </h2>
    <p class="lead">
        by <a href="index.php"><?php echo $post_author; ?></a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
    <hr>
    <img class="img-responsive" src="images/<?php echo $post_image; ?>" height="150" width="300" alt="">
    <hr>
    <p><?php echo $post_content ?></p>
    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
    <hr>
    <?php  } }}  
    } else {
      echo "Error searching record: " . $conn->error;
    }}}
?>
  
     
</div>

<!-- Blog Sidebar Widgets Column -->


    <!-- Blog Categories Well -->
    <?php include("includes/sidebar.php") ?>

</div>
<!-- /.row -->

<hr>

<?php include("includes/footer.php") ?>