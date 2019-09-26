<?php 


include('config.php');
    if(!isset($_SESSION))
    {
        session_start();
    }
	if(!$_SESSION)
	{
		header('location:index.php');
	}

$customer_details = $_POST['cid'];
$total_amount = $_POST['total_bal'];
$supplyer_name = $_POST['name'];
$pending_amount = $_POST['pending_bal'];
$paid_amount = $_POST['paying_amount'];
$pay_mode = $_POST['mode'];
$ref_no = $_POST['ref_no'];
$date = date('Y-m-d');
print("<pre>");
print_r($_POST);
$sql = mysqli_query($con,"SELECT * FROM `pdc_buyer` WHERE `id`");
while($rowdata = mysqli_fetch_assoc($sql)){
	$supplyer_name = $rowdata['name'];
}


$sql = mysqli_query($con,"INSERT INTO `supplier_payment_history`(`distributer_id`, `distributer_name`, `total_amount`, `due_amount`, `paid_amount`, `payment_mode`, `payment_type`, `reference_no`, `date`) VALUES ('$customer_details','$supplyer_name','$total_amount','$pending_amount','$paid_amount','$pay_mode','0','$ref_no','$date')");


$date = date('Y-m-d');
$details = "Supplier Payment";
$sql = mysqli_query($con,"INSERT INTO `expense`(`supplayername`, `details`, `mode`,`ref_no`, `amount`, `paytype`, `date`) VALUES ('$supplyer_name','$details','$pay_mode','$ref_no','$paid_amount','0','$date')") or die(mysqli_error());

$sql = mysqli_query($con,"SELECT * FROM `supplier_payment_log` WHERE `pdc_bayer_id`='$customer_details'");
while($rowdaat = mysqli_fetch_assoc($sql)){
	$old_total_paid_amount = $rowdaat['total_paid_amount'];
	$old_total_due = $rowdaat['total_due'];
	
	$new_total_paid_amount = $old_total_paid_amount+$paid_amount;
	$new_total_due = $old_total_due-$paid_amount;
}
$sql1 = mysqli_query($con,"UPDATE `supplier_payment_log` SET `total_paid_amount`='$new_total_paid_amount',`total_due`='$new_total_due' WHERE `pdc_bayer_id`='$customer_details'");






header('Location:supplierwise.php');
?>