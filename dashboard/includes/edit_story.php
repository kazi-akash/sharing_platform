<?php
  if(isset($_GET['p_id'])){
    $post_edit_id = $_GET['p_id'];
  }
   $post_titleErr = $post_category_idErr =  $post_tagsErr = $post_contentErr = $post_dateErr = "";

  $post_title = $post_category_id = $post_tags = $post_content = $post_date = "";

  $sql_edit = "SELECT * FROM post WHERE post_id = $post_edit_id";
  $result_sql_edit = $conn->query($sql_edit);
  if($result_sql_edit->num_rows > 0){
  while($row_sql_edit = $result_sql_edit->fetch_assoc()){  
    $post_id = $row_sql_edit["post_id"];
    $post_title = $row_sql_edit["post_title"];
    $post_category_id = $row_sql_edit["post_category_id"];
    $post_status = $row_sql_edit["post_status"];
    $post_image = $row_sql_edit["post_image"];
    $post_tags = $row_sql_edit["post_tags"];
    $post_comment_count = $row_sql_edit["post_comment_count"];
    $post_date = $row_sql_edit["post_date"];
    $post_content = $row_sql_edit["post_content"];
  }}

  if(isset($_POST['update_post'])){
    $post_title = $_POST["post_title"];
    $post_category_id = $_POST["post_category"];
    $post_status = $_POST["post_status"];
    $post_image = $_FILES["image"]["name"];
    $post_image_temp = $_FILES["image"]["tmp_name"];
    $post_tags = $_POST["post_tags"];
    $post_comment_count = 4;
    $post_content = $_POST["post_content"];

    move_uploaded_file($post_image_temp, "../images/$post_image");

    //checking empty image upload error
    if(empty($post_image)){
      $check_img = "SELECT * FROM post WHERE post_id = $post_id";
      $select_img = $conn->query($check_img);

      while($row =  $select_img->fetch_assoc()){
        $post_image = $row["post_image"];
      }
    }

    if(!empty($post_title && $post_category_id && $post_tags && $post_content && $post_date)){
    $query = "UPDATE post SET ";
    $query .="post_title  = '{$post_title}', ";
    $query .="post_category_id = '{$post_category_id}', ";
    $query .="post_date   =  now(), ";
    $query .="post_status = '{$post_status}', ";
    $query .="post_tags   = '{$post_tags}', ";
    $query .="post_content= '{$post_content}', ";
    $query .="post_image  = '{$post_image}' ";
    $query .= "WHERE post_id = {$post_id} ";

    $update_post = $conn->query($query);
    // confirm($update_post);

    ?>
    <div class="container">
    <div class="row">
    <div class="col-xs-6 col-xs-offset-3">
      <div class="alert">
        <span class="closebtn">&times;</span>  
        <strong> Updated! <a href="story.php" style= "color: black">Click here to manage your stories </a></strong>
      </div>
    </div>
    </div>
    </div>
    <?php
  }}
  else{
    // echo "error: ". $conn->error;
  }
?>
<div class="container">
<section id="login">
<div class="container">
<div class="row">
<div class="col-xs-6 col-xs-offset-3">
<div class="form-wrap">
<h2 class='page-header'>
  Edit Story
</h2>

<form action="" method="post" enctype="multipart/form-data">    
  <div class="form-group">
    <label for="title">Story Title</label>
    <input value=<?php echo $post_title ?> type="text" class="form-control" name="post_title">
  </div>  

  <div class="form-group">
    <label for="post_category">Story Categories</label> <br>
    <select name="post_category" id="post_category">
     <?php
    
        $sql_get_cat = "SELECT * FROM categories";
        $result_get_cat = $conn->query($sql_get_cat);
        
        while($row_get_cat = $result_get_cat->fetch_assoc()){  
        $cat_id_edit = $row_get_cat["cat_id"];
        $cat_title_edit = $row_get_cat["cat_title"];
        $cat_id_selected = $post_category_id == $cat_id_edit ? "selected" : "";

        echo "<option value='{$cat_id_edit}'  $cat_id_selected>{$cat_title_edit}</option>";
        }
      ?>
       </select>
  </div>
        <!-- <div class="form-group">
       <label for="users">Users</label>
       <select name="post_user" id="">
    </select>
  </div> -->


  <!-- <div class="form-group">
     <label for="title">Post Author</label>
      <input type="text" class="form-control" name="author">
  </div> -->

 <div class="form-group">
  <label for="post_category">Story Status</label> <br>
    <select name="post_status" id="">
     <option value=<?php echo $post_status ?>><?php echo $post_status ?></option>
      <?php
        switch($post_status){
          case "blocked":
            echo "<option value='published'>Publish</option>";        
            break;
          case "published":
             echo "<option value='blocked'>Block</option>";
            break;
        }
      ?>
      
    </select>
 </div>

  <div class="form-group">
   <img width="100" src="../images/<?php echo $post_image ?>"  alt="">
   <input type="file"  name="image">
  </div>

  <div class="form-group">
   <label for="post_tags">Story Tags</label>
   <textarea  class="form-control "name="post_tags" id="" cols="10" rows="1"><?php echo $post_tags ?>
   </textarea>
  </div>
  
  <div class="form-group">
   <label for="post_content">Story Content</label>
   <textarea  class="form-control "name="post_content" id="" cols="30" rows="10"><?php echo $post_content ?></textarea>
  </div>

   <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_post" value="Update Story">
  </div>

</form>
</div>
</div> 
</div> 
</div> 
</section>
</div>
