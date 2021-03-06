<?php include("includes/admin_header.php") ?>

<div id="wrapper">
<?php 
    // if($conn){
    //     echo "connected";
    // }
?>

    <!-- Navigation -->
    <?php include("includes/admin_navigation.php") ?>
    <!-- /#page-wrapper -->
<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
    <h2 class="page-header">
        <?php 
        if(isset($_SESSION['user_role'])){
            $role = $_SESSION['user_role'];
            if($role == 'admin'){
                echo "Welcome to admin panel";
            } else {
                 echo "Welcome to user panel";
            } }
        ?>
        <small><?php echo $_SESSION['username'] ?></small>
    </h2>

</div>
</div>
<!-- /.row -->

       
 <!-- /.row -->
 <?php
    //post count
    if(isset($_SESSION['username'])){
        $suname = $_SESSION['username'];
        $surole = $_SESSION['user_role'];
        if($_SESSION['user_role'] == 'admin'){
        $sql_post = "SELECT * FROM post";
        $sql_comm = "SELECT * FROM comments";
      } else {
         $sql_comm = "SELECT * FROM comments WHERE comment_author = '{$suname}'";
         $sql_post = "SELECT * FROM post where post_author = '{$suname}'";
      } }
 
    $select_all_posts = $conn->query($sql_post);
    $post_counts = $select_all_posts->num_rows;
    //comment count
   
    $select_all_comment = $conn->query($sql_comm);
    $comment_counts = $select_all_comment->num_rows;
    //users count
    $query = "SELECT * FROM users";
    $select_all_users = $conn->query($query);
    $users_counts = $select_all_users->num_rows;
    //category count
    $query = "SELECT * FROM categories";
    $select_all_cat = $conn->query($query);
    $cat_counts = $select_all_cat->num_rows;
 ?>
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class='huge'><?php echo $post_counts ?></div>
                        <div>Stories</div>
                    </div>
                </div>
            </div>
            <a href="story.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'><?php echo $comment_counts ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <?php 
      if(isset($_SESSION['user_role'])){
          if($_SESSION['user_role'] == 'admin'){
            include("includes/manage_all_users.php");
          }
         
      }
    ?>
    <?php 
        if(isset($_SESSION['user_role'])){
            if($_SESSION['user_role'] == 'admin'){
            ?>
            
    <div class="col-lg-3 col-md-6">
    <div class="panel panel-red">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-list fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class='huge'><?php echo $cat_counts ?></div>
                        <div>Categories</div>
                </div>
            </div>
        </div>
        <a href="categories.php">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
    </div>
    <?php   
        }}
    ?>
</div>
                <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>

<?php include("includes/admin_footer.php") ?>