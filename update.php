<?php
include ('connection.php');
$id= $_POST['id'];
$right = $_POST['rights'];
 $data =implode(",",$right);
  $query="UPDATE `data` SET `pernission`='$data' WHERE `data`.`id`= '$id'";
  if(mysqli_query($conn,$query)){
    header('location:index.php');
  }
?>