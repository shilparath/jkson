<?php
	include('config.php');
print("<pre>");
print_r($_POST);


$mat_des = $_POST['mat_des'];
$stock = $_POST['stock'];
function UpdateStockUsed($stock,$mat_des){
global $con;
$a = $mat_des;
$b = explode("///",$a);
$mat_des = $b['2'];
	$sql = mysqli_query($con,"UPDATE `stockdetails` SET `avail`='$stock' WHERE `id`='$mat_des'");
	

}







if(!empty($stock)){
	for($i = 0; $i<count($stock); $i++) {
		//echo($mat_des[$i]); echo("<br>");
		$sql2 = UpdateStockUsed($stock[$i],$mat_des[$i]);
		print_r($sql2);
	}
}








		$customer_details = "";
		$new_customer = $_POST['new_customer'];
		$address = $_POST['address'];
		$gstin = "0";
		$invoice_no = $_POST['invoice_no'];
		$challan_no = "";
		$po_no = "";
		$offer_no = "";
		$dispatched = '0';
		$remarks = "";
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
		$sgst = "";
		$cgst = "";
		$igst = "";
		$amount = $_POST['amount'];
		$pay_cost = $_POST['pay_cost'];
		$income = $_POST['income'];
		$stock = $_POST['stock'];
		$payamount = $_POST['payamount'];
		$payamount1 = $_POST['payamount'][0];
//exit();
$date = date('Y-m-d');
$details = "Item Sell";
$sql = mysqli_query($con,"INSERT INTO `expense`(`customername`, `details`, `mode`, `amount`, `paytype`, `date`) VALUES ('$new_customer','$details','1','$payamount1','1','$date')") or die(mysqli_error());

function fetchLastBill(){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT
	bill
	FROM sellitems_without_gst
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



function insertSellingItem($customer_details,$po_no,$new_customer,$date,$address,$offer_no,$gstin,$dispatched,$invoice_no,$state,$invoice_date,$code,
$challan_no,$remarks,$challan_date,&$serial_no,&$mat_des,&$hsn_code,&$unit,&$purchase_rate,&$tax_amount,&$total_cost,&$rate,&$quantity,
&$item_value,&$discount,$sgst,$cgst,$igst,&$amount,$pay_cost,$bill,&$income,&$imeino,&$color,$battery,$charger,$payamount){
	global $mysqli;
	$a = $mat_des;
$b = explode("///",$a);
$mat_des = $b[2];
$company = $b[1];
		
	$stmt = $mysqli->prepare("INSERT INTO sellitems_without_gst(
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
		payamount
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
		?
	)");
	$stmt->bind_param("sssssssssssssssssssssssssssssssssssssss",$customer_details,$po_no,$new_customer,$date,$address,$offer_no,$gstin,$dispatched,$invoice_no,$state,$invoice_date,$code,$challan_no,$remarks,$challan_date,$serial_no,$mat_des,$hsn_code,$unit,$purchase_rate,$tax_amount,$total_cost,$rate,$quantity,$item_value,$discount,$sgst,$cgst,$igst,$amount,$pay_cost,$bill,$income,$imeino,$color,$battery,$charger,$company,$payamount);
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
		$serial_no[$i],$mat_des[$i],$hsn_code[$i],$unit[$i],$purchase_rate[$i],
		$tax_amount[$i],$total_cost[$i],$rate[$i],$quantity[$i],$item_value[$i],$discount[$i],$sgst,
		$cgst,$igst,$amount[$i],$pay_cost,$bill,$income[$i],$imeino[$i],$color[$i],$battery[$i],$charger[$i],$payamount[$i]);
	}
}



	?>
