<?php include('config.php'); ?>
<?php
//print_r($_POST);
if(isset($_POST['name1'])){
	if($_POST['name1']=="getcompanyname"){
		$sql = mysqli_query($con,"SELECT * FROM `mobilecompany` WHERE 1");
		echo('<option value="">Select Company</option>');
		while($rowdata = mysqli_fetch_assoc($sql)){
			echo('<option value="'.$rowdata['id'].'">'.$rowdata['name'].'</option>');
		}
	}
}
?>