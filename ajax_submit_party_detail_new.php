<?php
include('config.php');

function insertBuyer($name,$contact,$gstin,$pan,$cin,$address,$bank){
  global $mysqli;
  $stmt = $mysqli->prepare("INSERT INTO buyerDetails(
    name,
    contact,
    gstin,
    pan,
    cin,
    address,
    bank
  ) VALUES(
    ?,
    ?,
    ?,
    ?,
    ?,
    ?,
    ?
  )");
  $stmt->bind_param("sssssss",$name,$contact,$gstin,$pan,$cin,$address,$bank);
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

$name = $_POST['name'];
$contact = $_POST['contact'];
$gstin = $_POST['gstin'];
$pan = $_POST['pan'];
$cin = $_POST['cin'];
$address = $_POST['address'];
$bank = $_POST['bank'];


if(!empty($name)){
$sql= insertBuyer($name,$contact,$gstin,$pan,$cin,$address,$bank);
}
?>
