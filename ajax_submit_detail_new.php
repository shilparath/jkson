<?php
include('config.php');

function addBuyer($name,$contact,$gstin,$pan,$cin,$address,$status){
  GLOBAL $mysqli;
  $stmt = $mysqli->prepare("INSERT INTO pdc_Buyer(
    name,
    contact,
    gstin,
    pan,
    cin,
    address,
    status
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
$stmt->bind_param("sssssss",$name,$contact,$gstin,$pan,$cin,$address,$status);
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

print_r($_POST);


$name = $_POST['name'];
$contact = $_POST['contact'];
$gstin = $_POST['gstin'];
$pan = $_POST['pan'];
$cin = $_POST['cin'];
$address = $_POST['address'];
$status =1;

if(!empty($name)){
  $sql = addBuyer($name,$contact,$gstin,$pan,$cin,$address,$status);
}


$sql = mysqli_query($con,"INSERT INTO `supplier_payment_log`(`pdc_bayer_id`, `total_amount`, `total_paid_amount`, `total_due`) VALUES ('$sql','0','0','0')");

?>
