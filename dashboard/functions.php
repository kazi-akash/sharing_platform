<?php include("../includes/db.php") ?>
<?php
//function confirm
function confirm($result){
  global $conn;
  if(!$result){
    die('query failed: '.  $conn->error );
   }
} 
function EditCat() { // input title data and store to database
 global $conn;
 if(isset($_POST['submit']))
  {
   $cat_title= $_POST['cat_title'];

   if($cat_title == "" || empty($cat_title)){
    echo "Field should not be empty!";
   }
   else{
    $sql = "INSERT INTO categories(cat_title) VALUE('{$cat_title}')";
    $result = $conn->query($sql);
   if(!$result)
    die('query failed: '.  $conn->error );
   }
  }
}

// Fetching catagories form databse and update
function all_catagories(){
  global $conn;
  $sql = "SELECT * FROM categories";
   $result = $conn->query($sql);
   if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){  
     $cat_id = $row["cat_id"];
     $cat_title = $row["cat_title"];
     echo "<tr>";
     echo "<td>$cat_id </td>";
     echo "<td>$cat_title</td>";
     echo "<td><a href='categories.php?delete={$cat_id}'>Delete</td>";
     echo "<td><a href='categories.php?edit={$cat_id}'>Edit</td>";
     echo "<tr>";
   }
   } else {
   echo "0 result found";
   }
}

//delete catagories
function delete_catagories(){
  global $conn;
  if(isset($_GET['delete'])){
    $cat_title = $_GET['delete'];
    $sql = "DELETE FROM categories where cat_id= '{$cat_title}'";
    $delete_cat = $conn->query($sql);
    header("location: categories.php");
   }
}
?>
