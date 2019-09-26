<?php
include('config.php');

function editDetails($id,$name,$contact,$gstin,$pan,$cin,$address){
  global $mysqli;
  $stmt = $mysqli->prepare("UPDATE distributer_details
  SET
  name = ?,
  contact = ?,
  gstin = ?,
  pan = ?,
  cin = ?,
  address = ?
  WHERE
  id = ?
  LIMIT 1
   ");
  $stmt->bind_param("sssssss",$name,$contact,$gstin,$pan,$cin,$address,$id);
  $result = $stmt->execute();
  $stmt->close();
  return $result;
}

print_r($_POST);

$name = $_POST['name'];
$contact = $_POST['contact'];
$gstin = $_POST['gstin'];
$pan = $_POST['pan'];
$cin = $_POST['cin'];
$address = $_POST['address'];
$id = $_POST['sl_no'];

print_r($id);

if(!empty($id)){
  $sql = editDetails($id,$name,$contact,$gstin,$pan,$cin,$address);
}
