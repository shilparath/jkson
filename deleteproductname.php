<?php include('config.php'); ?>
<?php
$id = $_GET['id'];
$sql = mysqli_query($con,"DELETE FROM `product_name` WHERE `id`='$id'");
header("location:addproductname.php");
?>