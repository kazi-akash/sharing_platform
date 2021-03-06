 <?php

 function svalid($data) {
   if($data) {
  ?>
     <div class="container">
  <div class="row">
    <div class="col-xs-6 col-xs-offset-3">
      <div class="alert">
        <span class="closebtn">&times;</span>  
        <strong><?php echo $data; ?></strong> 
      </div>
    </div>
  </div>
</div>

<?php
 }}


 ?>

