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


print("<pre>");
print_r($_POST);




$total_bal = $_POST['total_bal'];
$pending_bal = $_POST['pending_bal'];
$paying_amount = $_POST['paying_amount'];
$mode = $_POST['mode'];
$ref_no = $_POST['ref_no'];
$name = $_POST['name'];
$cid = $_POST['cid'];

$date = date('Y-m-d');
$details = "Distributer Payment";
$sql = mysqli_query($con,"INSERT INTO `expense`(`supplayername`, `details`, `mode`,`ref_no`, `amount`, `paytype`, `date`) VALUES ('$name','$details','$mode','$ref_no','$paying_amount','1','$date')") or die(mysqli_error());


$sql = mysqli_query($con,"INSERT INTO `distributer_payment_history`(`distributer_id`, `distributer_name`, `total_amount`, `due_amount`, `paid_amount`, `payment_mode`, `payment_type`, `reference_no`, `date`) VALUES ('$cid','$name','$total_bal','$pending_bal','$paying_amount','$mode','1','$ref_no','$date')");


$sql = mysqli_query($con,"SELECT * FROM `distributer_payment` WHERE `distributer_id`='$cid'");
while($rowdata = mysqli_fetch_assoc($sql)){
	$old_due = $rowdata['due'];
	$old_paid = $rowdata['paid'];
	
	$new_due = $old_due-$paying_amount;
	$new_paid = $old_paid+$paying_amount;
}
$sql = mysqli_query($con,"UPDATE `distributer_payment` SET `due`='$new_due',`paid`='$new_paid' WHERE `distributer_id`='$cid'");






header('Location:distributer_wise.php');
?>