<?php include("../includes/db.php") ?>
<?php include("includes/admin_header.php") ?>
<?php include("functions.php") ?>
<?php ob_start() ?>

<div id="wrapper">

<!-- Navigation -->
<?php include("includes/admin_navigation.php") ?>
<!-- /#page-wrapper -->

<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
  <h2 class="page-header">
      Add or Edit new categories
  </h2>

  <dvi class="col-xs-6">

  <!-- input data and store to database -->
  <?php EditCat(); ?>

   <form action="" method="post">
    <div class="form-group">
      <label for="cat-title">Add category</label>
      <input class="form-control" type="text" name="cat_title" />
    </div>
    <div class="form-group">
      <input type="submit" name="submit" class="btn btn-primary" value="Add Category" />
    </div>
   </form>

  
   <!-- update and include -->
   <?php
    if(isset($_GET['edit'])){
     $cat_id = $_GET['edit'];
     include "includes/update_categories.php";
    }
   ?>

  </dvi>

  <div class="col-xs-6">

 <!-- category form -->
 <table class="table table-bordered table">
  <thead>
   <tr>
    <th>Id</th>
    <th>Category Title</th>
   </tr>
  </thead>
  <tbody>

  <!-- Fetching catagories form databse and update -->
  <?php
   all_catagories();
  ?>

  <!-- delete catagories -->
  <?php
   delete_catagories();
  ?>

  </tbody>


 </table>
</div>

</div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>

<?php include("includes/admin_footer.php") ?>