<?php include('config.php'); ?>
<?php
//print_r($_POST);
if(isset($_POST['name'])){
	if($_POST['name']=="get_color_name"){
		$sql = mysqli_query($con,"SELECT * FROM `bobilecolor` WHERE 1");
		echo('<option value="">Select Color</option>');
		while($rowdata = mysqli_fetch_assoc($sql)){
			echo('<option value="'.$rowdata['id'].'">'.$rowdata['colorname'].'</option>');
		}
	}
}
?>