  <form action="" method="post">
   <div class="form-group">
     <label for="cat-title">Edit category</label>
     <?php
     //edit query
     if(isset($_GET['edit'])){
     $edit_id = $_GET['edit'];
    
     $sql = "SELECT * FROM categories WHERE cat_id = '{$edit_id}'";
     $result = $conn->query($sql);

      while($row = $result->fetch_assoc()){  
       $cat_id = $row["cat_id"];
       $cat_title = $row["cat_title"];
      ?>
      <input value="<?php if(isset($cat_title)) echo $cat_title ?>" class="form-control" type="text" name="cat_title" />
     <?php
     //update query
     if(isset($_POST['update_cat'])){
     $cat_title_update = $_POST['cat_title'];
     $sql = "UPDATE categories SET cat_title = '{$cat_title_update}' where cat_id= '{$cat_id}'";
     $update_cat_title = $conn->query($sql);
      if(!$update_cat_title){
       echo "Update failed!". $conn->error;
      }
     }}}
    ?>
     
   </div>
   <div class="form-group">
     <input type="submit" name="update_cat" class="btn btn-primary" value="Add Category" />
   </div>
   </form>