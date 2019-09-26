<?php
	include('config.php');
		?>
<?php
//print("<pre>");
//print_r($_POST);


$Suppliername = $_POST['Suppliername'];
$customername = $_POST['customername'];
$name = $_POST['name'];
$finance_agent= $_POST['finance'];
$invoice_no = $_POST['invoice_no'];
$details = $_POST['details'];
$mode = $_POST['mode'];
$amount = $_POST['amount'];
$payType = $_POST['payType'];
$date = date('Y-m-d');
$sql = mysqli_query($con,"INSERT INTO `expense`(`supplayername`, `customername`, `newcustomer`,`finance_agent`,`invoice_no`, `details`, `mode`, `amount`, `paytype`,`date`) VALUES ('$Suppliername','$customername','$name','$finance_agent','$invoice_no','$details','$mode','$amount','$payType','$date')");
?>

