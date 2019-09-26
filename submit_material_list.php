<?php
	include('config.php');
print("<pre>");
print_r($_POST);

//exit();
		$gstno = $_POST['gstno'];
		$customer_details = "";
		//
		$address = $_POST['address'];
		$gstin = "0";
		$invoice_no = $_POST['invoice_no'];
		$challan_no = "";
		$po_no = "";
		$offer_no = "";
		$dispatched = '0';
		$remarks = "";
		$product_name = $_POST['product_name'];
		$code = $_POST['code'];
		$invoice_date = $_POST['invoice_date'];
		$challan_date = "";
		$state = $_POST['state'];
		$date = $_POST['invoice_date'];
		$serial_no = $_POST['serial_no'];
		$mat_des = $_POST['mat_des'];
		$pl_serial_no = "";
		$hsn_code = $_POST['hsn_code'];
		$imeino = $_POST['imeino'];
		$battery = $_POST['battery'];
		$charger = $_POST['charger'];
		$color = $_POST['color'];
		$quantity = $_POST['quantity'];
		$unit = $_POST['unit'];
		$rate = $_POST['rate'];
		$tax_amount = $_POST['tax_amount'];
		$total_cost = $_POST['total_cost'];
		$purchase_rate = $_POST['purchase_rate'];
		$item_value = $_POST['item_value'];
		$discount = $_POST['discount'];
		$sgst = $_POST['sgst'];
		$cgst = $_POST['cgst'];
		$igst = $_POST['igst'];
		$amount = $_POST['amount'];
		$pay_cost = $_POST['pay_cost'];
		$income = $_POST['income'];
		$stock = $_POST['stock'];
		$payamount = $_POST['payamount'];
		$payamount1 = $_POST['payamount'][0];
//$a = count($_POST['financeamt'])
$pending_amount = 0;
for($i=0;$i< count($_POST['financeamt']);$i++){
	$pending_amount = $pending_amount+$_POST['financeamt'][$i];
}

echo($pending_amount);
$check = $_POST['new_customer'];

if($check==""){
	$distributer_id = $_POST['distributer_id'];
	$sql = mysqli_query($con,"SELECT * FROM `distributer_details` WHERE `id`='$distributer_id'");
	while($rowdata = mysqli_fetch_assoc($sql)){
		$new_customer = $rowdata['name'];
		$distributer_status = 1;
	}
	
	$sql1 = mysqli_query($con,"SELECT * FROM `distributer_payment` WHERE `distributer_id`='$distributer_id'");
	while($rowdata = mysqli_fetch_assoc($sql1)){
		print_r($payamount1);
		$old_total = $rowdata['total_amount'];
		$old_due = $rowdata['due'];
		
		$new_total = $old_total+$pending_amount;
		$new_due = $old_due+$pending_amount;
	}
	$sql2 = mysqli_query($con,"UPDATE `distributer_payment` SET `total_amount`='$new_total',`due`='$new_due' WHERE `distributer_id`='$distributer_id'");
	
}else{
	$new_customer = $_POST['new_customer'];
	$distributer_status = 0;
}









$date = date('Y-m-d');
$details = "Item Sell";
$sql = mysqli_query($con,"INSERT INTO `expense`(`customername`, `details`, `mode`, `amount`, `paytype`, `date`) VALUES ('$new_customer','$details','1','$payamount1','1','$date')") or die(mysqli_error());

function fetchLastBill(){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT
	bill
	FROM sellItems
	ORDER BY id DESC LIMIT 1
	");
	$stmt->execute();
	$stmt->bind_result($bill);
	$stmt->store_result();
  $stmt->fetch();
  $stmt->close();
	return $bill;
}

// print_r($mat_des);
// print_r($stock);

function UpdateStockUsed(&$stock,&$mat_des,$imeino){
$a = $mat_des;
$b = explode("///",$a);
$mat_des = $b['0'];
	
	//echo($mat_des);
	
//$company = $b[1];
	global $mysqli;
	$stmt = $mysqli->prepare("UPDATE stockdetails SET
	avail = ?
	WHERE mat_des = ? AND 
	imeino = ?
	");
	$stmt->bind_param("sss",$stock,$mat_des,$imeino);
	$stmt->execute();
	$stmt->close();
	return true;
}

function insertSellingItem($customer_details,$po_no,$new_customer,$date,$address,$offer_no,$gstin,$dispatched,$invoice_no,$state,$invoice_date,$code,
$challan_no,$remarks,$challan_date,&$serial_no,&$mat_des,&$product_name,&$hsn_code,&$unit,&$purchase_rate,&$tax_amount,&$total_cost,&$rate,&$quantity,
&$item_value,&$discount,&$sgst,&$cgst,&$igst,&$amount,$pay_cost,$bill,&$income,&$imeino,&$color,$battery,$charger,$payamount,$distributer_status,$gstno){
	global $mysqli;
	$a = $mat_des;
$b = explode("///",$a);
$mat_des = $b[2];
$company = $b[1];
		
	$stmt = $mysqli->prepare("INSERT INTO sellItems(
		customer_details,
		po_no,
		new_customer,
		date,
		address,
		offer_no,
		gstin,
		dispatched,
		invoice_no,
		state,
		invoice_date,
		code,
		challan_no,
		remarks,
		challan_date,
		serial_no,
		mat_des,
		product_name,
		hsn_code,
		unit,
		purchase_rate,
		tax_amount,
		total_cost,
		rate,
		quantity,
		item_value,
		discount,
		sgst,
		cgst,
		igst,
		amount,
		pay_cost,
		bill,
		income,
		imeino,
		color,
		battery,
		charger,
		company,
		payamount,
		distributer_status,
		gstno
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
	$stmt->bind_param("ssssssssssssssssssssssssssssssssssssssssss",$customer_details,$po_no,$new_customer,$date,$address,$offer_no,$gstin,$dispatched,$invoice_no,$state,$invoice_date,$code,$challan_no,$remarks,$challan_date,$serial_no,$mat_des,$product_name,$hsn_code,$unit,$purchase_rate,$tax_amount,$total_cost,$rate,$quantity,$item_value,$discount,$sgst,$cgst,$igst,$amount,$pay_cost,$bill,$income,$imeino,$color,$battery,$charger,$company,$payamount,$distributer_status,$gstno);
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

$bill = fetchLastBill() + 1;


if(!empty($mat_des)){
	for($i = 0; $i<count($mat_des); $i++) {
		//echo($mat_des[$i]); echo("<br>");
		$sql = insertSellingItem($customer_details,$po_no,$new_customer,$date,$address,$offer_no,$gstin,
		$dispatched,$invoice_no,$state,$invoice_date,$code,$challan_no,$remarks,$challan_date,
		$serial_no[$i],$mat_des[$i],$product_name[$i],$hsn_code[$i],$unit[$i],$purchase_rate[$i],
		$tax_amount[$i],$total_cost[$i],$rate[$i],$quantity[$i],$item_value[$i],$discount[$i],$sgst[$i],
		$cgst[$i],$igst[$i],$amount[$i],$pay_cost,$bill,$income[$i],$imeino[$i],$color[$i],$battery[$i],$charger[$i],$payamount[$i],$distributer_status,$gstno);
	}
}



$matdata = $_POST['mat_des'];








if(!empty($stock)){
	for($i = 0; $i<count($stock); $i++) {
		//echo($mat_des[$i]); echo("<br>");
		$sql2 = UpdateStockUsed($stock[$i],$matdata[$i],$imeino[$i]);
		//echo $stock[$i],$matdata[$i],$imeino[$i];
		print_r($sql2);
	}
}

	?>
