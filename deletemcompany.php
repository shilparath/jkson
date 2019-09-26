<?php include('config.php'); ?>
<?php
$id = $_GET['name'];
$sql = mysqli_query($con,"DELETE FROM `mobilecompany` WHERE `id`='$id'");
header("location:addcmobilecompany.php");
?>