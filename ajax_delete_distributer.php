<?php
include('config.php');
if(!empty($_POST['id'])){
  $id = $_POST['id'];

	
	$sql1 = mysqli_query($con,"DELETE FROM `distributer_payment` WHERE `distributer_id`='$id'");
  	$sql= mysqli_query($con,"DELETE FROM `distributer_details` WHERE `id`='$id'");
  if(!empty($sql)){
    echo "The data is deleted!!";
  }
} ?>
