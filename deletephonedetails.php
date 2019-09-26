<?php include('config.php'); ?>
<?php
$id = $_GET['name'];
$sql = mysqli_query($con,"DELETE FROM `mobiledetails` WHERE `id`='$id'");
header("location:addphonedetails.php");
?>