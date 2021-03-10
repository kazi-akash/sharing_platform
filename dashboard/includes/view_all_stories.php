 <?php
  if(isset($_SESSION['username'])){
 $suname = $_SESSION['username'];
 $surole = $_SESSION['user_role'];
?>

<h2 class="page-header"> Manage all stories
<?php
 if($surole == 'admin'){
 ?>
<a class="btn btn-primary" href='story.php?source=admin_stories'>Admin Stories</a></td>
 <?php
 }
 ?>
<a class="btn btn-primary" href="story.php?source=add_story">Add New</a>

</h2>
<!-- <div class="col-xs-4">
            <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
        </div> -->
<form action="" method='post'>
    <table class="table table-bordered table-hover">
      
    <thead >
     <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Title</th>
      <th>Category</th>
      <th>Image</th>
      <th>Tags</th>
      <th>Comments</th>
      <th>Date</th>
      <th>Status</th>
      <?php
     
      if($surole == 'admin'){
        echo "<th>Approve/Block</th>";
      }
      ?>

      <th>View Stories</th>
      <th>Edit</th>
      <th>Delete</th>     
     </tr>
    </thead>

  <tbody>
  <?php 
      if($surole == 'admin'){
           $sql = "SELECT * FROM post ORDER BY post_id DESC";
      } else {
          
        $sql = "SELECT * FROM post where post_author = '{$suname}' ORDER BY post_id DESC";
      } 
    }
   
   $result = $conn->query($sql);
   if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){  
     $post_id = $row["post_id"];
     $post_author = $row["post_author"];
     $post_title = $row["post_title"];
     $post_category_id = $row["post_category_id"];
     $post_status = $row["post_status"];
     $post_image = $row["post_image"];
     $post_tags = $row["post_tags"];
     $post_comment_count = $row["post_comment_count"];
     $post_date = $row["post_date"];
     echo "<tr>";
     echo "<td>$post_id </td>";
     echo "<td>$post_author </td>";
     echo "<td>$post_title </td>";
     
     $sql_cat_show = "SELECT * FROM categories WHERE cat_id = '{$post_category_id}' ";
     $result_cat_show = $conn->query($sql_cat_show);

     while($row = $result_cat_show->fetch_assoc()){  
     $cat_id_tm = $row["cat_id"];
     $cat_title_tm = $row["cat_title"];

     echo "<td>{$cat_title_tm} </td>";
     }    
     echo "<td><img width='50px' object-fit='cover' src='../images/$post_image' alt='image'> </td>";
     echo "<td>$post_tags </td>";
     echo "<td>$post_comment_count </td>";
     echo "<td>$post_date </td>";
     echo "<td>$post_status </td>";
     if($surole == 'admin'){
     
    switch($post_status){
      case "blocked":
        echo "<td><a href='story.php?publish_id={$post_id}'>Publish</a></td>";       
        break;
      case "published":
          echo "<td><a href='story.php?block_id={$post_id}'>Block</a></td>";
        break;
      default:
      echo "<td><a href='story.php?publish_id={$post_id}'>Publish</a></td>";   
      break;
    } }
    echo "<td><a href='../story.php?p_id={$post_id}'>View Stories</a></td>";
     echo "<td><a href='story.php?source=edit_story&p_id={$post_id}'>Edit</a></td>";
     echo "<td><a href='story.php?delete={$post_id}'>Delete</a></td>";
     echo "<tr>";
   }
   } 

 
  ?>
 
  </tbody>
 </table>
</form>


 <?php
 
  if(isset($_GET['block_id'])){
   $block_id = ($_GET['block_id']);

   $block_sql = "UPDATE post set post_status='blocked' WHERE post_id= $block_id";
   $block_result = $conn->query($block_sql);
   header("Location: story.php");
  }

  if(isset($_GET['publish_id'])){
   $approve_post_id = ($_GET['publish_id']);

   $sql_approve_post_id = "UPDATE post set post_status='published' WHERE post_id= $approve_post_id";
   $result_approve_post_id = $conn->query($sql_approve_post_id);
   header("Location: story.php");
  }

   if(isset($_GET['delete'])){
     $post_delete_id= $_GET['delete'];

     $sql_dlt = "DELETE FROM post WHERE post_id = {$post_delete_id}";
     $dlt_result = $conn->query($sql_dlt);
     header("location: story.php");
   }

   
 ?>