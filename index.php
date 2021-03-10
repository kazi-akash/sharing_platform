<?php include("includes/db.php") ?>
<?php session_start(); ?>
<?php include("includes/header.php") ?>
 <!-- Navigation -->
 <?php include("includes/navigation.php") ?>

<!-- Page Content -->
<div class="container">
<div class="row">
    <?php 
        $per_page = 5;
            if(isset($_GET['page'])) {
            $page = $_GET['page'];
            } else {
                $page = "";
            }
            if($page == "" || $page == 1) {
                $page_1 = 0;
            } else {
                $page_1 = ($page * $per_page) - $per_page;
            }
    ?>

    <!-- Stories -->
    <div class="col-md-8">
    <h2>Recent Stories</h2>
    <?php
        $sql_for_count = "SELECT * FROM post WHERE post_status= 'published'";
        $result_count = $conn->query($sql_for_count);
        $count_num = $result_count->num_rows;
        if($count_num < 1) {
        echo "<h1 class='text-center'>No stories available</h1>";
        } else {
        $count  = ceil($count_num /$per_page);

        $sql = "SELECT * FROM post WHERE post_status= 'published' ORDER BY post_id DESC LIMIT $page_1, $per_page";
        $result = $conn->query($sql);

        if($conn->connect_errno){
        die("connection failed!<br>".$conn->connect_errno);
        }
        else{
            
            while($row = $result->fetch_assoc()){
            // echo "<li> <a href='#'>".$row["cat_title"]."</a> </li>";
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'],0,120);
            
        ?>
 
        </h1>
        <h2>
            <a href="story.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
        </h2>
        <p class="lead">
            by <a href="index.php"><?php echo $post_author; ?></a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
        <hr>
        <a href="story.php?p_id=<?php echo $post_id; ?>">
        <img class="img-responsive" src="images/<?php echo $post_image; ?>" height="150" width="300" alt="">
        </a>
        <hr>
        <p><?php echo $post_content ?></p>
        <a class="btn btn-primary" href="story.php?p_id=<?php echo $post_id; ?>">Read More<span class="glyphicon glyphicon-chevron-right"></span></a>
        <hr>
        <?php  }}
    } ?>
         
    </div>

    <!-- Sidebar -->
    <?php include("includes/sidebar.php") ?>

</div>

<hr>
    <!-- pagination count -->
    <ul class="pager">
    <?php
        for($i =1; $i <= $count; $i++) {
            echo "<li '><a href='index.php?page={$i}'>{$i}</a></li>";
        }
    ?>
    </ul>

<?php include("includes/footer.php") ?>