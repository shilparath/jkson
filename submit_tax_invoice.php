<?php
//print_r($_POST);
include 'config.php';

$customer_details = $_POST['customer_details'];
$new_customer = $_POST['new_customer'];
$address = $_POST['address'];
$gstin = $_POST['gstin'];
$invoice_no = $_POST['invoice_no'];
$challan_no = $_POST['challan_no'];
$po_no = $_POST['po_no'];
$offer_no = $_POST['offer_no'];
$dispatched = $_POST['dispatched'];
$remarks = $_POST['remarks'];
$code = $_POST['code'];
$invoice_date = $_POST['invoice_date'];
$challan_date = $_POST['challan_date'];
$state = $_POST['state'];
$date = $_POST['date'];
$serial_no = $_POST['serial_no'];
$mat_des = $_POST['mat_des'];
$pl_serial_no = $_POST['pl_serial_no'];
$hsn_code = $_POST['hsn_code'];
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


print_r($mat_des);

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

$bill = fetchLastBill() + 1;



if(!empty($mat_des)){
	for($i = 0; $i<count($mat_des); $i++) {
		$sql = insertSellingItem($customer_details,$po_no,$new_customer,$date,$address,$offer_no,$gstin,
		$dispatched,$invoice_no,$state,$invoice_date,$code,$challan_no,$remarks,$challan_date,
		$serial_no[$i],$mat_des[$i],$pl_serial_no[$i],$hsn_code[$i],$unit[$i],$purchase_rate[$i],
		$tax_amount[$i],$total_cost[$i],$rate[$i],$quantity[$i],$item_value[$i],$discount[$i],$sgst[$i],
		$cgst[$i],$igst[$i],$amount[$i],$pay_cost,$bill);
		print_r($sql);
	}
}

// for($i = 0; $i<count($mat_des); $i++) {
//   $sqli = check($customer_details,$serial_no[$i],$mat_des[$i],$pl_serial_no[$i],$hsn_code[$i],$unit[$i]);
//   print_r($sqli);
// }
// print_r(count($serial_no));

// function check($customer_details,&$serial_no,&$mat_des,&$pl_serial_no,&$hsn_code,&$unit){
//   global $mysqli;
//   $stmt = $mysqli->prepare("INSERT INTO sellItems(
//     customer_details,
//     serial_no,
//     mat_des,
//     pl_serial_no,
//     hsn_code,
//     unit
//     )
//     VALUES(
//       ?,
//       ?,
//       ?,
//       ?,
//       ?,
//       ?
//     )");
//     $stmt->bind_param("ssssss",$customer_details,$serial_no,$mat_des,$pl_serial_no,$hsn_code,$unit);
//     $stmt->execute();
//     $inserted_id = $mysqli->insert_id;
//     $stmt->close();
//     if($inserted_id>0)
//     {
//       return $inserted_id;
//     }
//     else
//     {
//       return false;
//     }
//
// }

function insertSellingItem($customer_details,$po_no,$new_customer,$date,$address,$offer_no,$gstin,
$dispatched,$invoice_no,$state,$invoice_date,$code,$challan_no,$remarks,$challan_date,
&$serial_no,&$mat_des,&$pl_serial_no,&$hsn_code,&$unit,&$purchase_rate,
&$tax_amount,&$total_cost,&$rate,&$quantity,&$item_value,&$discount,&$sgst,
&$cgst,&$igst,&$amount,$pay_cost,$bill){
  global $mysqli;
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
    pl_serial_no,
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
    bill
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
    ?
  )");
  $stmt->bind_param("sssssssssssssssssssssssssssssssss",$customer_details,$po_no,$new_customer,$date,$address,$offer_no,$gstin,$dispatched,
  $invoice_no,$state,$invoice_date,$code,$challan_no,$remarks,$challan_date,$serial_no,$mat_des,$pl_serial_no,$hsn_code,
  $unit,$purchase_rate,$tax_amount,$total_cost,$rate,$quantity,$item_value,$discount,$sgst,$cgst,$igst,$amount,$pay_cost,$bill);
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


 ?>
