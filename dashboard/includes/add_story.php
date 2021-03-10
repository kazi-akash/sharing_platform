<?php
  if(isset($_SESSION['username'])){
      $suname = $_SESSION['username'];
    }
  $post_titleErr = $post_category_idErr =  $post_tagsErr = $post_contentErr = $post_dateErr = $post_imageErr = "";

  $post_title = $post_category_id = $post_tags = $post_content = $post_date = $post_image =  "";

 if(isset($_POST['create_post'])){
  
  $post_author = $suname;
  $post_title = $_POST["post_title"];
  $post_category_id = $_POST["post_category"];
  $post_status = "blocked";
  $post_image = $_FILES["image"]["name"];
  $post_image_temp = $_FILES["image"]["tmp_name"];
  $post_tags = $_POST["post_tags"];
  // $post_comment_count = 4;
  $post_content = $_POST["post_content"];
  $post_date = date('d-m-y');
  
  move_uploaded_file($post_image_temp, "../images/$post_image");

  include("validations/addStory_v.php");

 if(!empty($post_title && $post_category_id && $post_image && $post_tags && $post_content && $post_date)){
  $query = "INSERT INTO post(post_category_id, post_title, post_date,post_image,post_author,post_content,post_tags,post_status) ";
             
  $query .= "VALUES({$post_category_id},'{$post_title}',now(),'{$post_image}','{$post_author}','{$post_content}','{$post_tags}', '{$post_status}') "; 

  $result_add_post = $conn->query($query);
  if($result_add_post){
   ?>
    <div class="container">
    <div class="row">
    <div class="col-xs-6 col-xs-offset-3">
      <div class="alert">
        <span class="closebtn">&times;</span>  
        <strong> New story added! <a href="story.php" style= "color: black">Click here to manage your stories </a></strong>
      </div>
    </div>
    </div>
    </div>
    <?php
    $post_title = "";
    $post_image = "";
    $post_tags = "";
    // $post_comment_count = 4;
    $post_content = "";
  } else {
   confirm($result_add_post);
  }
  
  }
 }
?>
<div class="container">
<section id="login">
<div class="container">
<div class="row">
<div class="col-xs-6 col-xs-offset-3">
<div class="form-wrap">
<h2 class="page-header">
 Add new story
</h2>

<form action="" method="post" enctype="multipart/form-data">    
  <div class="form-group">
    <label for="title">Story Title</label>
    <?php echo $post_titleErr ?>
    <input type="text" class="form-control" name="post_title" value="<?php echo $post_title;?>" placeholder="Your story Title...">
  </div>

  <div class="form-group">
    <label for="post_category">Story Categories</label>
    <?php echo $post_category_idErr ?>
    <select name="post_category" id="post_category">
      <?php
    
        $sql_get_cat = "SELECT * FROM categories";
        $result_get_cat = $conn->query($sql_get_cat);
        
        while($row_get_cat = $result_get_cat->fetch_assoc()){  
        $cat_id_ok = $row_get_cat["cat_id"];
        $cat_title_ok = $row_get_cat["cat_title"];

        echo "<option value='{$cat_id_ok}'>{$cat_title_ok}</option>";
        }
      ?>
       </select>
  </div>

<div class="form-group">
   <label for="post_image">Story Image</label>
    <?php echo $post_imageErr ?>
   <input type="file"  name="image">
  </div>

  <div class="form-group">
   <label for="post_tags">Story Tags</label>
   <?php echo $post_tagsErr ?>
   <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags;?>" placeholder="Yout story tags...">
  </div>
  
  <div class="form-group">
   <label for="post_content">Story Content</label>
   <?php echo $post_contentErr ?>
   <textarea  class="form-control "name="post_content" id="" cols="30" rows="10" value="<?php echo $post_content;?>" placeholder="Your story content..."><?php echo $post_content;?></textarea>
  </div>

   <div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
  </div>

</form>
</div>
</div> 
</div> 
</div> 
</section>
</div>
