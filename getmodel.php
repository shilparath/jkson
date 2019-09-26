<?php include('config.php'); ?>
<?php
// if(isset($_POST['name'])){
// 	if($_POST['name']=="getcompanyid"){
// 		$companyid = $_POST['companyid'];
// 		echo('<option value="">Select Product Name</option>');
// 		$sql = mysqli_query($con,"SELECT DISTINCT `product_name` FROM `mobiledetails` WHERE `companyname`='$companyid'");
// 		while($rowdata = mysqli_fetch_assoc($sql)){
// 			$product_name_id = $rowdata['product_name'];
// 			$sql1 = mysqli_query($con,"SELECT `name` FROM `product_name` WHERE `id`='$product_name_id'");
// 			while($rowdata1 = mysqli_fetch_assoc($sql1)){
// 				$product_name = $rowdata1['name'];
// 			}
// 			echo('<option value="'.$product_name_id.'">'.$product_name.'</option>');
// 		}
		
// 	}
	
// 	if($_POST['name']=="get_model_no"){
// 		$companyid = $_POST['companyid'];
// 		$product_name = $_POST['product_name'];
// 		echo('<option value="">Select Model</option>');
// 		$sql = mysqli_query($con,"SELECT DISTINCT `modelname` FROM `mobiledetails` WHERE `companyname`='$companyid' AND `product_name`='$product_name'");
// 		while($rowdata = mysqli_fetch_assoc($sql)){
// 			echo('<option value="'.$rowdata['modelname'].'">'.$rowdata['modelname'].'</option>');
// 		}
// 	}
if(isset($_POST['name'])){
	if($_POST['name']=="getcompanyid"){
		$companyid = $_POST['companyid'];
		echo('<option value="">Select Product Name</option>');
		$sql = mysqli_query($con,"SELECT DISTINCT `product_name` FROM `mobiledetails` WHERE `companyname`='$companyid'");
		while($rowdata = mysqli_fetch_assoc($sql)){
			$product_name_id = $rowdata['product_name'];
			$sql1 = mysqli_query($con,"SELECT `name` FROM `product_name` WHERE `id`='$product_name_id'");
			while($rowdata1 = mysqli_fetch_assoc($sql1)){
				$product_name = $rowdata1['name'];
			}
			echo('<option value="'.$product_name_id.'">'.$product_name.'</option>');
		}
		
	}

	if($_POST['name']=="get_model_no"){
		$companyid = $_POST['companyid'];
		$product_name = $_POST['product_name'];
		echo('<option value="">Select Model</option>');
		$sql = mysqli_query($con,"SELECT DISTINCT `modelname` FROM `mobiledetails` WHERE `companyname`='$companyid' AND `product_name`='$product_name'");
		while($rowdata = mysqli_fetch_assoc($sql)){
			echo('<option value="'.$rowdata['modelname'].'">'.$rowdata['modelname'].'</option>');
		}
	}
	
	if($_POST['name']=="get_model_no2"){
		$companyid = $_POST['companyid'];
		$product_name = $_POST['product_name'];
		echo('<option value="">Select Model</option>');
		$sql = mysqli_query($con,"SELECT DISTINCT `modelname` FROM `mobiledetails` WHERE `companyname`='$companyid' AND `product_name`='$product_name'");
		while($rowdata = mysqli_fetch_assoc($sql)){
			$model = $rowdata['modelname'];
			$sql2 = mysqli_query($con,"SELECT DISTINCT `mat_des`,`mat_code`,`id` FROM `insertproduct` WHERE `mat_des`='$model' LIMIT 1 ");
			while($rowdata = mysqli_fetch_assoc($sql2)){
				$a = "///";
			echo('<option value="'.$rowdata['mat_des'].''.$a.''.$rowdata['mat_code'].''.$a.''.$rowdata['id'].'">'.$rowdata['mat_des'].'</option>');
			}
		}
	}
	
	if($_POST['name']=="get_product_name"){
		
		$product_name_id = $_POST['product_name'];
		
		$sql = mysqli_query($con,"SELECT `name` FROM `product_name` WHERE `id`='$product_name_id'");
		while($rowdata = mysqli_fetch_assoc($sql)){
			if($rowdata['name']=="MOBILE" || $rowdata['name']=="mobile"){
				echo(1);
			}else{
				echo(0);
			}
		}
	}
	
	
	if($_POST['name']=="get_hsn_code"){
		$companyid = $_POST['companyid'];
		$product_name = $_POST['product_name'];
		$mat_desc = $_POST['mat_desc'];
		
		$sql = mysqli_query($con,"SELECT `price`,`market_price`,`hsncode`, `gst` FROM `mobiledetails` WHERE `companyname`='$companyid' AND `product_name`='$product_name' AND `modelname`='$mat_desc'");
		while($rowdata = mysqli_fetch_assoc($sql)){
			echo(json_encode($rowdata));
		}
	}

}
?>

