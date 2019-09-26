<?php include('config.php'); ?>
<?php
//print_r($_POST);
// companyid:companyid,product_name:product_name,mat_des:mat_des
$companyid=$_POST['companyid'];
$product_name=$_POST['product_name'];
$mat_des="'".$_POST['mat_des']."'";
$query="SELECT distinct `insertproduct`.`imeino` FROM `insertproduct` WHERE 1 and `insertproduct`.`product_name` =$product_name and `insertproduct`.`mat_des`=$mat_des  and `insertproduct`.`mat_code` =(SELECT name FROM `mobilecompany` WHERE `id`='$companyid')";
//echo $query;
		$sql = mysqli_query($con,$query);
		echo('<option value="">Select IMEI/ S.N.</option>');
		while($rowdata = mysqli_fetch_assoc($sql)){
			echo('<option value="'.$rowdata['imeino'].'">'.$rowdata['imeino'].'</option>');
		}
?>