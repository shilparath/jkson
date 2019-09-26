<?php
	include('config.php');
		$challan_no = $_POST['challan_no'];
		$challan_date = $_POST['challan_date'];
		$offer_no = $_POST['offer_no'];
		$order_no = $_POST['order_no'];
		$dispached = $_POST['dispached'];
		$remarks = $_POST['remarks'];
		$no_of_pkg = $_POST['no_of_pkg'];
		$nt_wt = $_POST['net_wt'];
		$challan_date = $_POST['challan_date'];
		$mat_des = $_POST['mat_des'];
		$pl_serial_no = $_POST['pl_serial_no'];
		$serial_no = $_POST['serial_no'];
		$hsn_code = $_POST['hsn_code'];
		$quantity = $_POST['quantity'];
		$unit = $_POST['unit'];
		$purchase_date = $_POST['purchase_date'];
		$material_code = $_POST['material_code'];



		print_r($_POST);


function dilevery_chalan($challan_no,$challan_date,$offer_no,$purchase_date,$order_no,$no_of_pkg,$dispached,$nt_wt,$remarks,&$serial_no,&$mat_des,&$pl_serial_no,&$material_code,&$hsn_code,&$unit,&$quantity){
	global $mysqli;
	$stmt = $mysqli->prepare("INSERT INTO dilevery_chalan(
		challan_no,
		challan_date,
		offer_no,
		purchase_date,
		order_no,
		no_of_pkg,
		dispatched,
		net_wt,
		remarks,
		serial_no,
		mat_des,
		pl_serial_no,
		material_code,
		hsn_code,
		unit,
		quantity
	)VALUES(
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
	$stmt->bind_param("ssssssssssssssss",$challan_no,$challan_date,$offer_no,$purchase_date,$order_no,$no_of_pkg,$dispached,$nt_wt,$remarks,$serial_no,$mat_des,$pl_serial_no,$material_code,$hsn_code,$unit,$quantity);
	$stmt->execute();
	$inserted_id = $mysqli->insert_id;
	$stmt->close();

	if($inserted_id>0)
	{
		return $inserted_id;
	}
	else
	{
		return "false";
	}
}

print_r(count($mat_des));
	for($i = 0; $i<count($mat_des); $i++) {
		$sql2 = dilevery_chalan($challan_no,$challan_date,$offer_no,$purchase_date,$order_no,$no_of_pkg,$dispached,$nt_wt,$remarks,$serial_no[$i],$mat_des[$i],$pl_serial_no[$i],$material_code[$i],$hsn_code[$i],$unit[$i],$quantity[$i]);
		print_r($sql2);
	}

	//	print_r($challan_no);
		//exit();

			/*	$rowc2 = mysqli_query($con, "SELECT * FROM  `party_details` where sl_no='$custmer_details'");
		$rowc2 = mysqli_fetch_array($rowc2);
		$party_name = $rowc2['party_name'];
		*/
		//print_r($party_name);exit();
// 		$row22 = mysqli_query($con, "SELECT * FROM  `ingredient_entry` ORDER BY id DESC LIMIT 1");
// 		$row222 = mysqli_fetch_array($row22);
//
//
// 		$bill_no = $row222['id'] + 100;
//
// 		//$bill_no = rand(10,10000000000000);
// 		//print_r($mat_des);
// 	//exit();
// //print_r($pay_cost);
// 	//	exit();
// 		$sqlss = mysqli_query($con,"INSERT INTO ingredient_entry(status) VALUES ('1')");
//
// 		//$sql = mysqli_query($con,"INSERT INTO sell_material_details(bill_no, customer_details,chk_in_date,transpotation_name, mat_des,pl_serial_no, hsn_code,quantity,unit,rate,item_value,discount,sgst,cgst,igst,amount,pay_cost,cur_date,bill_status) VALUES ('$bill_no', '$custmer_details','$chk_in_date','$transpotation_name', '$mat_des','$pl_serial_no','$hsn_code','$quantity','$unit','$rate','$item_value','$discount','$sgst','$cgst','$igst','$amount','$pay_cost', '$cur_date', '1')");
//
// 		//$sql3 = mysqli_query($con,"INSERT INTO payment(date,bill_no, pay_cost, status) VALUES ('$cur_date','$bill_no','$pay_cost',  '1')");
// //echo $sql3;
// 		for($i = 0; $i<count($mat_des); $i++) {
//
// 				if($mat_des[$i] != '' && $pl_serial_no[$i]!= '' && $material_code[$i]!= '' && $hsn_code[$i]!= '' && $quantity[$i]!= ''&&$unit[$i] != '') {
// 				$sqlm= mysqli_query($con,"select * from buy_material_details where id='$mat_des[$i]'");
// 				$rowm = mysqli_fetch_array($sqlm);
// 				$itemtype=$rowm['mat_des'];
// 				$mat_code=$rowm['mat_code'];
// 			//print_r($itemtype);
// 			//print_r($mat_code);
// 			//exit();
//
// 				$sql1 = mysqli_query($con,"INSERT INTO delivery_details(challan_no,offer_no,order_no,dispached,remarks,challan_date,purchase_date,no_of_pkg,net_wt,mat_des,pl_serial_no, material_code,hsn_code,unit,quantity) VALUES ('$challan_no', '$offer_no','$order_no','$dispached','$remarks','$challan_date','$purchase_date','$no_of_pkg','$net_wt', '$mat_des[$i]','$pl_serial_no[$i]','$material_code[$i]','$hsn_code[$i]','$unit[$i]','$quantity[$i]')");
//
// 								$sqlm1= mysqli_query($con,"select sum(stock_in) as stock_in from stock_entry where item_name='$itemtype' and material_code='$mat_code' ");
// 				$rowm1 = mysqli_fetch_array($sqlm1);
// 				$stock_in=$rowm1['stock_in'];
// 			//print_r($sql1);
// 			//print_r($quantity[$i]);
// 			//exit();
// 				//if($stock_in>$quantity[$i])
// 					//$sql11 = mysqli_query($con,"INSERT INTO stock_entry(entry_date,bill_no,item_name,material_code,stock_used,status) VALUES ('$cur_date','$bill_no', '$itemtype','$mat_code', '$quantity[$i]', '1')");
//
//
// 			   }
// 		}
// 		//echo $sql11;
// if ($sql1 == 1) {
//
// 			header('location:tax-invoice-archieve.php');
// }
// 			 else {
// 	header('location:tax-invoice.php');
//   //  $msg = "You left one or more of the required fields.";
//     //echo $msg;
// 		}
//
//
//
//


	?>
