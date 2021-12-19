<?php

    include('../../../config.php');
    
    $id= $_POST['id'];
  $statement =$db_con->prepare("DELETE FROM `users` WHERE `id` ='$id'");
  $statement->execute();

  if($statement) {
      echo "Yes";
   } else {
      echo "No";
   }
 ?>