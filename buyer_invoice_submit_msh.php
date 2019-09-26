<?php include('config.php'); ?>
<?php
	
print("<pre>");
print_r($_POST);

//exit();

$customer_details = $_POST['customer_details'];
$order_no = $_POST['order_no'];
$start_date = $_POST['start_date'];
$so_no = $_POST['so_no'];
$invoice_no = $_POST['invoice_no'];
$place_of_supply = $_POST['place_of_supply'];
$pay_cost = $_POST['pay_cost'];


		$customer_details = $_POST['customer_details'];
		$date = $_POST['start_date'];
		$date = date("y-m-h",strtotime($date));
		$order_no = $_POST['order_no'];
		$so_no = $_POST['so_no'];
		$invoice_no = $_POST['invoice_no'];
		$place_of_supply = $_POST['place_of_supply'];
		$serial_no = $_POST['sl_no'];
		//$mat_code3 = $_POST['mat_code'];
		//$mat_code1 = implode("",$mat_code3);
		$mat_des =$_POST['mat_des'];
		$customer_drg_no = "0";
		$quantity = $_POST['quantity'];
		$discount = $_POST['discount'];
		$amount = $_POST['amount'];
		$pay_cost = $_POST['pay_cost'];
		$freight = "0";
		$hsn_code = $_POST['hsn_code'];
		$imeino = $_POST['imeino'];
		$color = $_POST['color'];
		$rate = $_POST['rate'];
		$cgst=$_POST['cgst'] ;
		$sgst = $_POST['sgst'];
		$igst ="0";// $_POST['igst'];
		$tax_cost = $_POST['tax_cost'];
		$quantity_avail = $_POST['quantity'];
		//$mat_code = $_POST['mat_code'];


		$bill_no = fetchLastBill()+1;

function insertProduct($customer_details,$order_no,$date,$so_no,$invoice_no,$place_of_supply,&$serial_no,$mat_code,&$mat_des,&$hsn_code,$freight,&$cgst,&$sgst,&$igst,$customer_drg_no,&$quantity,&$rate,&$discount,&$amount,&$tax_cost,$pay_cost,$bill_no,&$quantity_avail,&$imeino,&$color,$taxamount_insert){
	global $con;
	
	$sql = mysqli_query($con,"INSERT INTO `insertproduct`(`id`, `customer_details`, `order_no`, `rdate`, `so_no`, `invoice_no`, `place_of_supply`, `sl_no`, `mat_code`, `mat_des`, `hsn_code`, `freight`, `cgst`, `sgst`, `igst`, `customer_drg_no`, `quantity`, `rate`, `discount`, `amount`, `finance_amount`, `tax_cost`, `pay_cost`, `bill`, `quantity_avail`, `imeino`, `color`,`taxamount_insert`) VALUES ('','$customer_details','$order_no','$date','$so_no','$invoice_no','$place_of_supply','$serial_no','$mat_code','$mat_des','$hsn_code','$freight','$cgst','$sgst','$igst','$customer_drg_no','$quantity','$rate','$discount','$amount','','$tax_cost','$pay_cost','$bill_no','$quantity_avail','$imeino','$color','$taxamount_insert')");
	

}

function stockDetails($invoice_no,$mat_code,$mat_des,$hsn_code,$quantity,$date,$avail,$imeino){
	global $con;
	
	$sql = mysqli_query($con,"INSERT INTO `stockdetails`(`invoice_no`, `mat_code`, `mat_des`, `hsn_code`, `quantity`, `rdate`, `avail`, `imeino`) VALUES ('$invoice_no','$mat_code','$mat_des','$hsn_code','$quantity','$date','$avail','$imeino')");
}


function updateStock($invoice_no,$mat_code,$mat_des,$hsn_code,$new_quantity,$date,$new_avail,$imeino){
	global $con;
	
	$sql = mysqli_query($con,"UPDATE `stockdetails` SET `invoice_no`='$invoice_no',`mat_code`='$mat_code',`mat_des`='$mat_des',`hsn_code`='$hsn_code',`quantity`='$new_quantity',`rdate`='$date',`avail`='$new_avail' WHERE `imeino`='$imeino'");
	
    
}

function fetchCompany($mat_code){
	global $con;
	$sql = mysqli_query($con,"SELECT * FROM `mobilecompany` WHERE `id`='$mat_code1'");
	while($rowdata = mysqli_fetch_assoc($sql)){
		return($rowdata['name']);
	}
	
	
	
	
	
			
		}
$mat_code_come = $_POST['mat_code'];
//echo($mat_code[1]);
	for($i = 0; $i<count($serial_no); $i++) {
		//echo($mat_code[$i]);
		$mat_code = $mat_code_come[$i];
		//echo $mat_code;
		$sql = mysqli_query($con,"SELECT * FROM `mobilecompany` WHERE `id`='$mat_code'");
		while($rowdata = mysqli_fetch_assoc($sql)){
			
			$mat_code = $rowdata['name'];
		}
		
		$taxamount_insert = $tax_cost[$i]-$amount[$i];
		//echo($mat_code);
		$sql = insertProduct($customer_details,$order_no,$date,$so_no,$invoice_no,$place_of_supply,$serial_no[$i],$mat_code,$mat_des[$i],$hsn_code[$i],$freight,$cgst[$i],$sgst[$i],$igst,$customer_drg_no,
		$quantity[$i],$rate[$i],$discount[$i],$amount[$i],$tax_cost[$i],$pay_cost,$bill_no,$quantity_avail[$i],$imeino[$i],$color[$i],$taxamount_insert);
		
		print_r($sql);
		
		$check =fetchstockDetails($imeino[$i]);
		//print_r($check);
		
		if(!empty($check)){
		  foreach($check as $v1){
		  	$new_quantity = $v1['quantity']+$quantity[$i];
			  $new_avail = $v1['avail']+$quantity[$i];
		  updateStock($invoice_no,$mat_code,$mat_des[$i],$hsn_code[$i],$new_quantity,$date,$new_avail,$imeino[$i]);
		  }
		
		}else{
				$avail= $quantity[$i];
				$sql1 = stockDetails($invoice_no,$mat_code,$mat_des[$i],$hsn_code[$i],$quantity[$i],$date,$avail,$imeino[$i]);
				print_r($sql1);
		}
	}








function fetchLastBill(){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT
	bill
	FROM insertproduct
	ORDER BY id DESC LIMIT 1
	");
	$stmt->execute();
	$stmt->bind_result($bill);
	$stmt->store_result();
  $stmt->fetch();
  $stmt->close();
	return $bill;
}






function fetchstockDetails($mat_des){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT
	quantity,
	avail
	FROM stockdetails WHERE imeino = ?
	");
	$stmt->bind_param("s",$mat_des);
	$stmt->execute();
	$stmt->bind_result($quantity,$avail);
	while($stmt->fetch()){
		$row[] = array('quantity'=>$quantity,'avail'=>$avail);
	}
	$stmt->close();
	if(!empty($row))
	{
		return ($row);
	}
	else
	{
		return "";
	}
}




 	?>

