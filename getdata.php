<?php include('config.php'); ?>
<?php
if(isset($_POST['name'])){
	if($_POST['name']=="getcompanyid"){
		$companyname = $_POST['companyid'];
		$sql = mysqli_query($con,"SELECT `id` FROM `mobilecompany` WHERE `name`='$companyname'");
		while($rowdata = mysqli_fetch_assoc($sql)){
			$compid = $rowdata['id'];
		}
		
		$sql = mysqli_query($con,"SELECT * FROM `mobiledetails` WHERE `companyname`='$compid'");
		echo('<option value="">Select Model</option>');
		while($rowdata = mysqli_fetch_assoc($sql)){
			echo('<option value="'.$rowdata['modelname'].'">'.$rowdata['modelname'].'</option>');
		}
	}
	//companyid:companyid,name:"getalldata",model:model},
	if($_POST['name']=="getalldata"){
		$companyname = $_POST['companyid'];
		$sql = mysqli_query($con,"SELECT `id` FROM `mobilecompany` WHERE `name`='$companyname'");
		while($rowdata = mysqli_fetch_assoc($sql)){
			$compid = $rowdata['id'];
		}
		$model = $_POST['model'];
		$sql = mysqli_query($con,"SELECT * FROM `mobiledetails` WHERE `companyname`='$compid' AND `modelname`='$model' LIMIT 1");
		while($rpwdata = mysqli_fetch_assoc($sql)){
			print_r(json_encode($rpwdata));
		}
	}
}
?>

