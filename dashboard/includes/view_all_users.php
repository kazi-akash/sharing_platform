<h2 class="page-header">
 Add new user
</h2>
<table class="table table-bordered table">
    <thead>
     <tr>
      <th>Id</th>
      <th>Username</th>
      <th>Email</th>
      <th>Mobile</th>
      <th>Gender</th>
      <th>DOB</th>
      <th>Image</th>
      <th>User Role</th>
      <th>Admin/User</th>
      <th>Edit</th>
      <th>Delete</th>
    
     </tr>
    </thead>

  <tbody>
  <?php
   $sql = "SELECT * FROM users ORDER BY user_id DESC";
   $select_users = $conn->query($sql);
   
   if($select_users->num_rows > 0){
    while($row = $select_users->fetch_assoc()){  
     $user_id = $row["user_id"];
     $user_role = $row["user_role"];
     $username = $row["username"];
     $email = $row["email"];
     $mobile = $row["mobile"];
     $gender = $row["gender"];
     $user_image = $row["user_image"];
     $dob = $row["dob"];

     echo "<tr>";
     echo "<td>$user_id </td>";
     echo "<td>$username </td>";
     echo "<td>$email</td>";
     echo "<td>$mobile</td>";
     echo "<td>$gender</td>";
     echo "<td>$dob</td>";
      echo "<td><img width='50px' object-fit='cover' src='../images/$user_image' alt='image'> </td>";
     echo "<td>$user_role</td>";
     
     switch($user_role){
          case "admin":
            echo "<td><a href='users.php?make_user={$user_id}'>Make User</a></td>";       
            break;
          case "user":
             echo "<td><a href='users.php?make_admin={$user_id}'>Make Admin</a></td>";
            break;
          default:
          echo "<td><a href='users.php?make_user={$user_id}'>User</a></td>";  
          break;
        }
     // echo "<td><a href='users.php?make_admin={$user_id}'>Admin</a></td>";
     // echo "<td><a href='users.php?make_user={$user_id}'>User</a></td>";
     echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
     echo "<td><a href='users.php?delete_user={$user_id}'>Delete</a></td>";

     echo "<tr>";
     
    }}
?>
</tbody>
 </table>

  <?php
   if(isset($_GET['make_user'])){
   $make_user_id = ($_GET['make_user']);

   $query_user_id = "UPDATE users set user_role='user' WHERE user_id= $make_user_id";
   $sql__make_user_id = $conn->query($query_user_id);
   header("Location: users.php");
  }

   if(isset($_GET['make_admin'])){
   $make_admin_id = ($_GET['make_admin']);

   $query_admin_id = "UPDATE users set user_role='admin' WHERE user_id= $make_admin_id";
   $sql__make_admin_id = $conn->query($query_admin_id);
   header("Location: users.php");
  }

   if(isset($_GET['approve_comment'])){
   $approve_id = ($_GET['approve_comment']);

   $query = "UPDATE comments set comment_status='approved' WHERE comment_id= $approve_id";
   $sql_approve = $conn->query($query);
   header("Location: users.php");
   }
  
   if(isset($_GET['delete_user'])){
  
   $the_user_id = ($_GET['delete_user']);

   $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
   $delete_query_user = $conn->query($query);
   header("Location: users.php");
   
  }

 ?>