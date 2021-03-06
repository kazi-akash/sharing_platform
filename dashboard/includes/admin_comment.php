 <?php
       if(isset($_SESSION['username'])){
      $suname = $_SESSION['username'];
      $surole = $_SESSION['user_role'];

      ?>
<h2 class="page-header"> Manage Comments
<?php
 if($surole == 'admin'){
 ?>
<a class="btn btn-primary" href='comments.php'>All comments</a></td>
 <?php
 }
 ?>

</h2>
<table class="table table-bordered table">
    <thead>
     <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Comment</th>
      <th>Status</th>
      <th>In Response To</th>
      <th>Date</th>
     <?php
      if($surole == 'admin'){
        echo "<th>Approve</th>";
        echo "<th>Unapprove</th>";  
      }
      ?>
      <th>Delete</th>
     </tr>
    </thead>

  <tbody>
  <?php
      if($surole == 'admin'){
         $sql_comment = "SELECT * FROM comments WHERE comment_author = '{$suname}' ORDER BY comment_id DESC";
         
      } 
    }
  
   $select_comments = $conn->query($sql_comment);
   
   if($select_comments->num_rows > 0){
    while($row = $select_comments->fetch_assoc()){  
     $comment_id = $row["comment_id"];
     $comment_post_id = $row["comment_post_id"];
     $comment_author = $row["comment_author"];
     $comment_email = $row["comment_email"];
     $comment_content = $row["comment_content"];
     $comment_status = $row["comment_status"];
     $comment_date = $row["comment_date"];

     echo "<tr>";
     echo "<td>$comment_id </td>";
     echo "<td>$comment_author </td>";
     echo "<td>$comment_content </td>";

     //  $sql_cat_show = "SELECT * FROM categories WHERE cat_id = '{$post_category_id}'";
     // $result_cat_show = $conn->query($sql_cat_show);

     // while($row = $result_cat_show->fetch_assoc()){  
     // $cat_id_tm = $row["cat_id"];
     // $cat_title_tm = $row["cat_title"];

     // echo "<td>{$cat_title_tm} </td>";
     // }
   
     echo "<td>$comment_status </td>";

      $query = "SELECT * FROM post WHERE post_id = $comment_post_id ";
      $select_post_id_query = $conn->query($query) or die($conn->error);

      while($row_select_post_id = $select_post_id_query->fetch_assoc()){
      $post_id = $row_select_post_id['post_id'];
      $post_title = $row_select_post_id['post_title'];
          
      echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
      }
     echo "<td>$comment_date </td>";

      if($surole == 'admin'){
          echo "<td><a href='comments.php?approve_comment=$comment_id'>Approve</a></td>";
          echo "<td><a href='comments.php?unapprove_comment=$comment_id'>Unapprove</a></td>";
      }
     // echo "<td><a href='posts.php?source=edit_post&p_id={}'>Edit</a></td>";
     echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";

     echo "<tr>";
   }
   } else {
   echo "0 result found";
   }

  ?>
  </tbody>
 </table>

 <?php
   if(isset($_GET['unapprove_comment'])){
   $unapprove_id = ($_GET['unapprove_comment']);

   $query = "UPDATE comments set comment_status='unapprove' WHERE comment_id= $unapprove_id";
   $sql_unapprove = $conn->query($query);
   header("Location: comments.php");
  }

    if(isset($_GET['approve_comment'])){
   $approve_id = ($_GET['approve_comment']);

   $query = "UPDATE comments set comment_status='approved' WHERE comment_id= $approve_id";
   $sql_approve = $conn->query($query);
   header("Location: comments.php");
   }
  
   if(isset($_GET['delete'])){
   $the_comment = ($_GET['delete']);

   $query = "DELETE FROM comments WHERE comment_id = {$the_comment} ";
   $delete_query = $conn->query($query);
   header("Location: comments.php");
  }

 ?>