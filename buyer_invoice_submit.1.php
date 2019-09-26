<?php
	include('config.php');

		$customer_details = $_POST['customer_details'];
		$date = $_POST['start_date'];
		$date = date("y-m-h",strtotime($date));
		$order_no = $_POST['order_no'];
		$so_no = $_POST['so_no'];
		$invoice_no = $_POST['invoice_no'];
		$place_of_supply = $_POST['place_of_supply'];
		$serial_no = $_POST['sl_no'];
		//$mat_code1 = $_POST['mat_code'];
		$mat_code = $_POST['mat_code'];
		$mat_des = $_POST['mat_des'];
		$customer_drg_no = "0";
		$quantity = $_POST['quantity'];
		//$item_value = $_POST['item_value'];
		$discount = $_POST['discount'];
		$amount = $_POST['amount'];
		$pay_cost = $_POST['pay_cost'];
		//$pl_serial_no = $_POST['pl_serial_no'];
		$freight = "0";
		$hsn_code = $_POST['hsn_code'];
		$imeino = $_POST['imeino'];
		$color = $_POST['color'];
		//if($order_no==0)  $order_no=0;
		$rate = $_POST['rate'];
		$cgst=$_POST['cgst'] ;
		$sgst = $_POST['sgst'];
		$igst ="0";
		$tax_cost = $_POST['tax_cost'];
		$quantity_avail = $_POST['quantity'];

		function fetchCompany($mat_code1){
			global $mysqli;
			$stmt = $mysqli->prepare("SELECT
			name
			FROM mobilecompany
			WHERE id = ?
			");
			$stmt->bind_param("s",$mat_code1);
			$stmt->execute();
			$stmt->bind_result($name);
			$stmt->store_result();
		  $stmt->fetch();
		  $stmt->close();
			return $name;
		}

		$mat_code = fetchCompany($mat_code1);
print_r($mat_code);
function fetchLastBill(){
	global $mysqli;
	$stmt = $mysqli->prepare("SELECT
	bill
	FROM insertProduct
	ORDER BY id DESC LIMIT 1
	");
	$stmt->execute();
	$stmt->bind_result($bill);
	$stmt->store_result();
  $stmt->fetch();
  $stmt->close();
	return $bill;
}


function insertProduct($customer_details,$order_no,$date,$so_no,$invoice_no,$place_of_supply,&$serial_no,&$mat_code,&$mat_des,&$hsn_code,&$freight,&$cgst,&$sgst,&$igst,&$customer_drg_no,&$quantity,&$rate,&$discount,&$amount,&$tax_cost,$pay_cost,$bill_no,&$quantity_avail,&$imeino,&$color){
	global $mysqli;
	$stmt = $mysqli->prepare("INSERT INTO insertproduct(
		customer_details,
		order_no,
		rdate,
		so_no,
		invoice_no,
		place_of_supply,
		sl_no,
		mat_code,
		mat_des,
		hsn_code,
		freight,
		cgst,
		sgst,
		igst,
		customer_drg_no,
		quantity,
		rate,
		discount,
		amount,
		tax_cost,
		pay_cost,
		bill,
		quantity_avail,
		imeino,
		color
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
		$stmt->bind_param("sssssssssssssssssssssssss",$customer_details,$order_no,$date,$so_no,$invoice_no,$place_of_supply,$serial_no,$mat_code,$mat_des,$hsn_code,$freight,$cgst,$sgst,$igst,$customer_drg_no,$quantity,$rate,$discount,$amount,$tax_cost,$pay_cost,$bill_no,$quantity_avail,$imeino,$color);
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

function stockDetails($invoice_no,&$mat_code,&$mat_des,&$hsn_code,&$quantity,$date,&$used){
	global $mysqli;
	$stmt = $mysqli->prepare("INSERT INTO stockdetails(
	invoice_no,
	mat_code,
	mat_des,
	hsn_code,
	quantity,
	rdate,
	avail
	)
	VALUES(
		?,
		?,
		?,
		?,
		?,
		?,
		?
	)");
	$stmt->bind_param("sssssss",$invoice_no,$mat_code,$mat_des,$hsn_code,$quantity,$date,$used);
	$stmt->execute();
	$inserted_id = $mysqli->insert_id;
	$stmt->close();
	if($inserted_id>0)
	{
		return true;
	}
	else
	{
		return false;
	}
}

$bill_no = fetchLastBill()+1;


if(!empty($pay_cost)){
	print("<pre>");
	print_r($_POST);
	//exit();
	for($i = 0; $i<count($serial_no); $i++) {
		$sql = insertProduct($customer_details,$order_no,$date,$so_no,$invoice_no,$place_of_supply,$serial_no[$i],$mat_code,$mat_des[$i],$hsn_code[$i],$freight,$cgst[$i],$sgst[$i],$igst,$customer_drg_no,
		$quantity[$i],$rate[$i],$discount[$i],$amount[$i],$tax_cost[$i],$pay_cost,$bill_no,$quantity_avail[$i],$imeino[$i],$color[$i]);
		print_r($sql);
	}
}
if(!empty($quantity)){
	for($j = 0; $j<count($quantity); $j++){
		$sql1 = stockDetails($invoice_no,$mat_code,$mat_des[$j],$hsn_code[$j],$quantity[$j],$date,$used[$j]);
	}
}


// 		$rowc2 = mysqli_query($con, "SELECT * FROM  `party_details` where sl_no='$customer_details'");
// 		$rowc2 = mysqli_fetch_array($rowc2);
// 		$party_name = $rowc2['party_name'];
//
// 		//print_r($party_name);exit();
// 		$row22 = mysqli_query($con, "SELECT * FROM  `ingredient_entry` ORDER BY id DESC LIMIT 1");
// 		$row222 = mysqli_fetch_array($row22);
// 		$bill_no = $row222['id'] + 100;
// 				//print_r($amount);exit();
//
// 		//$bill_no = rand(10,10000000000000);
// 		//print_r(count($mat_des));
// //exit();
// //print_r($pay_cost);
// 	//	exit();
// 		$sqlss = mysqli_query($con,"INSERT INTO ingredient_entry(status) VALUES ('1')");
//
// 		//$sql = mysqli_query($con,"INSERT INTO sell_material_details(bill_no, customer_details,chk_in_date,transpotation_name, mat_des,pl_serial_no, hsn_code,quantity,unit,rate,item_value,discount,sgst,cgst,igst,amount,pay_cost,cur_date,bill_status) VALUES ('$bill_no', '$custmer_details','$chk_in_date','$transpotation_name', '$mat_des','$pl_serial_no','$hsn_code','$quantity','$unit','$rate','$item_value','$discount','$sgst','$cgst','$igst','$amount','$pay_cost', '$cur_date', '1')");
//
// 		$sql3 = mysqli_query($con,"INSERT INTO payment(date,bill_no, pay_cost,status) VALUES ('$date','$bill_no','$pay_cost', '1')");
// //echo $sql3;
// 				  for($i = 0; $i<count($mat_des); $i++) {
//
// 				//if($mat_des[$i] != '' && $hsn_code[$i]!= '' && $pf[$i]!= '' && $freight[$i]!= '' && $igst[$i]!= ''&& $sgst[$i]!= ''&& $cgst[$i]!= '' && $quantity[$i]!= '' && $rate[$i]!= '' && $discount[$i]!= ''&& $amount[$i]!= '' ) {
//
// 				//if($customer_drg_no[$i]=='')  $customer_drg_no=0;
// //if($cgst==0)  $cgst=0;
// //if($igst==0)  $igst=0;
// //if($sgst==0)  $sgst=0;
//
// 				/*
// 				 $sqlq1="select mat_code from buy_material_details where mat_code='".$mat_code[$i]."'";
//  //print_r($sqlq1);exit();
//
//  $billResult1 = $con->query($sqlq1);
// //$class_name1=	$resultf1['class_name1'];
//  //$query = mysqli_query("SELECT username FROM Users WHERE username='$username'");
// $r1=mysqli_fetch_row($billResult1);
//
// //print_r(count($r1));exit();
//   if (count($r1) > 0){
//
// 		$quantity_sql = mysqli_query($con, "SELECT * FROM  `buy_material_details` where mat_code='".$mat_code[$i]."'");
// 		$quantity_sql1 = mysqli_fetch_array($quantity_sql);
// 		$quantity_old = $quantity_sql1['quantity'] ;
// 			$quantity_new=$quantity_old+$quantity[$i];
//   			$sqlmfd2="UPDATE  buy_material_details SET quantity='".$quantity_new."' where mat_code='".$mat_code[$i]."'";
// //$result2 = mysqli_query($sql2);
// //echo $sqlmfd2;
//   //print_r($sqlmfd2);exit();
//
// 	//$sql2="UPDATE  fees_details SET admit_class='".$admit_class."' where stud_name ='".$stud_id."'";
// //$result2 = mysqli_query($sql2);
// if ($con->query($sqlmfd2) === TRUE  ) 			header('location:buyer_invoice_report.php?printid='.$bill_no);
// 			else
// 						//header('location:shop2.php?printid='.$bill_no);
//
// 			header('location:supplier_invoice_form.php');
//
//
//
// 	}
// 	else
// 	{*/
// 	if($mat_des[$i] != '' && $hsn_code[$i]!= '' && $pf[$i]!= '' && $freight[$i]!= '' && $quantity[$i]!= '' && $rate[$i]!= '' && $discount[$i]!= ''&& $amount[$i]!= '' ) {
// $sqlm= mysqli_query($con,"select * from material_detail_list where sl_no='$mat_des[$i]'");
// 				$rowm = mysqli_fetch_array($sqlm);
// 				$itemtype=$rowm['item_type'];
// 				//print_r($itemtype);exit();
//
// 				$sql1 = mysqli_query($con,"INSERT INTO buy_material_details(bill_no, customer_details,date,order_no,so_no,invoice_no,place_of_supply,serial_no,mat_code,mat_des,hsn_code,pf,freight,cgst,sgst,igst,customer_drg_no,quantity,rate,discount,amount) VALUES ('$bill_no', '$customer_details','$date','$order_no','$so_no','$invoice_no','$place_of_supply','$serial_no','$mat_code[$i]', '$mat_des[$i]','$hsn_code[$i]', '$pf[$i]', '$freight[$i]', '$cgst[$i]', '$sgst[$i]', '$igst[$i]','$customer_drg_no[$i]','$quantity[$i]','$rate[$i]','$discount[$i]','$amount[$i]')");
// 					$sql11 = mysqli_query($con,"INSERT INTO stock_entry(entry_date,bill_no,item_name,item_type,material_code, stock_in,status) VALUES ('$date','$bill_no', '$mat_des[$i]', '$itemtype','$mat_code[$i]', '$quantity[$i]', '1')");
//  }
// 		}
// 		//echo $sql11;
// 		if($sql11 && $sql1 && $sql3)
// 			header('location:invoice-archive.php');
// 			else
// 						//header('location:shop2.php?printid='.$bill_no);
//
// 			header('location:supplier-invoice-form.php');
//
//
//
// 	//}
//
//
// 	?>
<!-- // 	<html>
