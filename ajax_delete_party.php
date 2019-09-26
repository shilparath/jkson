<?php
include('config.php');
if(!empty($_POST['id'])){
  $id = $_POST['id'];

  $sql= mysqli_query($con,"DELETE from party_details where sl_no =".$id);
  if(!empty($sql)){
    echo "The data is deleted!!";
  }
} ?>
