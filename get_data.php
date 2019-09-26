<?php include('config.php'); ?>
<?php 
if(isset($_POST['name'])){
	if($_POST['name']=="get_distributer_data"){
		$distributer_id = $_POST['distributer_id'];
		$sql = mysqli_query($con,"SELECT * FROM `distributer_details` WHERE `id`='$distributer_id'");
		while($rowdata = mysqli_fetch_assoc($sql)){
			echo(json_encode($rowdata));
		}
	}
}
?>