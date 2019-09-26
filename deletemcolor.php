<?php include('config.php'); ?>
<?php
$id = $_GET['name'];
$sql = mysqli_query($con,"DELETE FROM `bobilecolor` WHERE `id`='$id'");
header("location:addmobilecolor.php");
?>