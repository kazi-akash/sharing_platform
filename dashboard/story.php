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
    case 'add_story';
    include "includes/add_story.php";
    break; 
    case 'edit_story';
    include "includes/edit_story.php";
    break;
    case 'admin_stories';
    include "includes/admin_stories.php";
    break;
    default:
    include "includes/view_all_stories.php";
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