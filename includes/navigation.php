
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="index.php">Sharing Platform</a>
</div>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav">
    <!-- <li> <a href="#">About</a> </li>
    <li>
        <a href="#">Services</a>
    </li>
    <li>
        <a href="#">Contact</a>
    </li> -->
 <?php 
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){   
        $cat_id= $row['cat_id'];
        $cat_title= $row['cat_title'];

        //active links
        $cat_class = '';
        $reg_class = '';
        $pageName= basename(($_SERVER['PHP_SELF']));
        $reg= "registration.php";

        if(isset($_GET['category']) && $_GET['category'] == $cat_id){
          $cat_class = 'active';
        }
        else if ($pageName == $reg){
          $reg_class = 'active';
        }
      
        echo "<li class='{$cat_class}'><a href='category.php?category=$cat_id'>{$cat_title}</a></li>"; 
        
      }
    } else {
      echo "";
    }
  ?>
  <li>
    <?php
      if(isset($_SESSION['username'])){
        echo "<a href='dashboard'>Dashboard</a>";
    }
    ?>

  </li>
  </ul>
</div>
<!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>