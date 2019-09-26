<?php
include('config.php');


$name = $_POST['name'];
$contact = $_POST['contact'];
$gstin = $_POST['gstin'];
$pan = $_POST['pan'];
$cin = $_POST['cin'];
$address = $_POST['address'];
$id = $_POST['sl_no'];
$bank = $_POST['bank'];

function editParty($id,$name,$contact,$gstin,$pan,$cin,$address,$bank){
  global $mysqli;
  $stmt = $mysqli->prepare("UPDATE buyerDetails
  SET
  name = ?,
  contact = ?,
  gstin = ?,
  pan = ?,
  cin = ?,
  address = ?,
  bank = ?
  WHERE id = ?
   ");
   $stmt->bind_param("ssssssss",$name,$contact,$gstin,$pan,$cin,$address,$bank,$id);
   $stmt->execute();
   $stmt->close();
   return true;
}


$sql = editParty($id,$name,$contact,$gstin,$pan,$cin,$address,$bank);
