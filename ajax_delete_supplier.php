<?php
ob_start();
include('config.php');
  $id = $_GET['name'];
echo "$id";
$sql = mysqli_query($con,"DELETE FROM `supplier_payment_log` WHERE `pdc_bayer_id`='$id'");
  $sql= mysqli_query($con,"DELETE FROM `pdc_buyer` WHERE `id`='$id'");
  

header("location:buyer-details.php");
 ?>
