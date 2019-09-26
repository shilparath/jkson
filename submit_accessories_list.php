<?php
	include('config.php');
		
	//	print("<pre>");
//print_r($_POST);


$new_customer = $_POST['new_customer'];
$date = $_POST['date'];
$address = $_POST['address'];
$gstin = $_POST['gstin'];
$dispatched = $_POST['dispatched'];
$invoice_no = $_POST['invoice_no'];
$state = $_POST['state'];
$invoice_date = $_POST['invoice_date'];
$code = $_POST['code'];
$serial_no = $_POST['serial_no'];
$mat_des = $_POST['mat_des'];
$pl_serial_no = $_POST['pl_serial_no'];
$hsn_code = $_POST['hsn_code'];
$unit = $_POST['unit'];
$total_cost = $_POST['total_cost'];
$rate = $_POST['rate'];
$quantity = $_POST['quantity'];
$item_value = $_POST['item_value'];
$discount = $_POST['discount'];
$amount = $_POST['amount'];
$income = $_POST['income'];
 $stock = $_POST['stock'];
$pay_cost = $_POST['pay_cost'];

function insertSellingItem($new_customer,$date,$address,$gstin,$dispatched,$invoice_no,$state,$invoice_date,$code,$serial_no,$mat_des,$pl_serial_no,$hsn_code,$unit,$total_cost,$rate,$quantity,$item_value,$discount,$amount,$income,$stock,$pay_cost){	
	global $mysqli;
	$stmt = $mysqli->prepare("INSERT INTO accessories_sell(
		new_customer,
		date,
		address,
		gstin,
		dispatched,
		invoice_no,
		state,
		invoice_date,
		code,
		serial_no,
		mat_des,
		pl_serial_no,
		hsn_code,
		unit,
		total_cost,
		rate,
		quantity,
		item_value,
		discount,
		amount,
		income,
		stock,
		pay_cost
	)
	VALUES(
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
		?,
		?,
		?
	)");
	$stmt->bind_param("sssssssssssssssssssssss",$new_customer,$date,$address,$gstin,$dispatched,$invoice_no,$state,$invoice_date,$code,$serial_no,$mat_des,$pl_serial_no,$hsn_code,$unit,$total_cost,$rate,$quantity,$item_value,$discount,$amount,$income,$stock,$pay_cost);
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

function UpdateStockUsed($stock,$mat_des){
	global $mysqli;
	$stmt = $mysqli->prepare("UPDATE accessories_list SET
	quantity = ?
	WHERE id = ?
	");
	$stmt->bind_param("ss",$stock,$mat_des);
	$stmt->execute();
	$stmt->close();
	return true;
}


if(!empty($mat_des)){
	for($i = 0; $i<count($mat_des); $i++) {
		$sql = insertSellingItem($new_customer,$date,$address,$gstin,$dispatched,$invoice_no,$state,$invoice_date,$code,$serial_no[$i],$mat_des[$i],$pl_serial_no[$i],$hsn_code[$i],$unit[$i],$total_cost[$i],$rate[$i],$quantity[$i],$item_value[$i],$discount[$i],$amount[$i],$income[$i],$stock[$i],$pay_cost);
	}
}


if(!empty($stock)){
	for($i = 0; $i<count($stock); $i++) {
		$sql2 = UpdateStockUsed($stock[$i],$mat_des[$i]);
		print_r($sql2);
	}
}




	?>
