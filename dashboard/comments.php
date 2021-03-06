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

<?php
if(isset($_GET['source'])){
    $source = $_GET['source'];
    } else {
    $source = '';
}

switch($source) {  
    case 'add_post';
    include "includes/add_comment.php";
    break; 
    case 'edit_post';
    include "includes/edit_comment.php";
    break;
    case 'admin_comment';
    include "includes/admin_comment.php";
    break;
    default:
    include "includes/view_all_comments.php";
    break;
}
?>

</div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>

<?php include("includes/admin_footer.php") ?>