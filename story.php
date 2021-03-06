<?php include("includes/db.php") ?>
<?php session_start(); ?>
<?php include("includes/header.php") ?>
<!-- Navigation -->
<?php include("includes/navigation.php") ?>

<!-- Page Content -->
<div class="container">
<div class="row">

<!-- Blog Entries Column -->
<div class="col-md-8">
<h1>Selected story</h1>
<!-- First Blog Post -->
<?php
if(isset($_GET['p_id'])){
$each_post_id = $_GET['p_id'];
}
$sql_each_post = "SELECT * FROM post WHERE post_id = $each_post_id";
$result = $conn->query($sql_each_post);

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
    <!-- <h1 class="page-header">
    Page Heading
    <small>Secondary Text</small>
    </h1> -->
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
    <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->
    <hr>
<?php  } }}  ?>

<!-- Blog Comments -->
<?php

    if(isset($_SESSION['username'])){
        $comment_author = $_SESSION['username'];
        $comment_contentErr="";
        $comment_content ="";
        
    if(isset($_POST['create_comment'])){
        $the_post_id = $_GET['p_id'];
    
        $comment_content = $_POST['comment_content'];
        

        if (empty($comment_content)) {
        $comment_contentErr = "***Plase type your comment before submiting!";
        } else {
        $comment_content = $comment_content;
        }

        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
       }

        if (!empty($comment_content)) {
        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_content, comment_status,comment_date)";
        $query .= "VALUES ($the_post_id, '{$comment_author}', '{$comment_content }', 'unapproved',now())";

        $create_comment_query = $conn->query($query);
        ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                <div class="alert">
                <span class="closebtn">&times;</span>  
                <strong><a href="story.php" style= "color: black"> Comment submited! wait for admin approval </a></strong>
                </div>
                </div>
            </div>
        </div>
        <?php
        if (!$create_comment_query) {
            die('QUERY FAILED' .$conn->error);
        }
    }
    $countpost_comment=("UPDATE post SET post_comment_count = post_comment_count + 1 WHERE post_id = $the_post_id");
    $result_count = $conn->query($countpost_comment);
}
?>

<!-- Comments Form -->
<div class="well">
<h4>Leave a Comment:</h4>
<form role="form" action="" method="post">
<!-- <div class="form-group">
    <label for="Author">Author</label>
    <input type="text" class="form-control" name="comment_author">
</div>
<div class="form-group">
    <label for="Email">Email</label>
    <input type="email" class="form-control" name="comment_email" required>
</div> -->

<div class="form-group">
    <label for="Email">Your Comment</label>
    <?php echo $comment_contentErr ?>
    <textarea class="form-control" rows="3" name="comment_content"></textarea>
</div>
<button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
</form>
</div>
<?php  ?>

<hr>
<!-- Posted Comments -->
	<?php 
    $theppp = $_GET['p_id'];
	$query = "SELECT * FROM comments WHERE comment_post_id = $theppp AND comment_status = 'approved' ORDER BY comment_id DESC";
	
	$select_comment_query = $conn->query($query);
	if(!$select_comment_query) {

	die('Query Failed' . $conn->error);
	}
     if($select_comment_query->num_rows > 0){
        while ($row = $select_comment_query->fetch_assoc()) {
        $comment_date   = $row['comment_date']; 
        $comment_content= $row['comment_content'];
        $comment_author = $row['comment_author'];
        ?>
        <!-- Comment -->
        
        <div class="media">
        <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
        <h4 class="media-heading"><?php echo $comment_author;   ?>
        <small><?php echo $comment_date;   ?></small>
        </h4>
        <?php echo $comment_content;   ?>
        </div>
       </div>

       <?php }} }
            else {
            ?>
                <div class="well">
                <h4>You need to login to view/add comments!</h4>
                </div>
                
            <?php
            }
       ?>

   
</div> 

<!-- Blog Sidebar Widgets Column -->


<!-- Blog Categories Well -->
<?php include("includes/sidebar.php") ?>

</div>
<!-- /.row -->

<hr>

<?php include("includes/footer.php") ?>