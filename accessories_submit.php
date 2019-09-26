<?php
	include('config.php');

		print("<pre>");
//print_r($_POST);
$sl_no = $_POST['sl_no'];
$mat_code = $_POST['mat_code'];
$mat_des = $_POST['mat_des'];
$hsn_code = $_POST['hsn_code'];
$quantity = $_POST['quantity'];
$rate = $_POST['rate'];
$discount = $_POST['discount'];
$amount = $_POST['amount'];
$tax_cost = $_POST['tax_cost'];
$pay_cost = $_POST['pay_cost'];




function insert_record($sl_no,$mat_code,$mat_des,$hsn_code,$quantity,$rate,$discount,$amount,$tax_cost,$pay_cost){
	global $mysqli;
	$date = date('Y-m-d');
	$stmt = $mysqli->prepare("INSERT INTO accessories_list(
		
		sl_no,
		company_name,
		model_no,
		hsn_code,
		quantity,
		rate_per_each,
		discount,
		amount,
		total_amount,
		total_pay,
		creation_date
		)
		VALUES (
			?,
			?,
			?,
			?,
			?,
			?,
			?,
			?,
			?,
			?,
			?
		)");
	$stmt->bind_param("sssssssssss",$sl_no,$mat_code,$mat_des,$hsn_code,$quantity,$rate,$discount,$amount,$tax_cost,$pay_cost,$date);
	$stmt->execute();
		$inserted_id = $mysqli->insert_id;
		$stmt->close();
		if($inserted_id>0)
		{
			return $inserted_id;
		}
		else
		{
			return false;
		}
}



if($_POST['pay_cost']!=""){
	for($i=0;$i<count($_POST['sl_no']);$i++){
		$sql = insert_record($sl_no[$i],$mat_code[$i],$mat_des[$i],$hsn_code[$i],$quantity[$i],$rate[$i],$discount[$i],$amount[$i],$tax_cost[$i],$pay_cost);
		print_r($sql);
	}
}


	?>

