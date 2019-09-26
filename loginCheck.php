<?php
session_start();
include('config.php');
$username = $_POST['username'];
$password = $_POST['password'];



function checkLogin($username,$password){
  global $mysqli;
  $stmt = $mysqli->prepare("SELECT
  id
  FROM users
  WHERE username= ? AND password = ?
  ");
  $stmt->bind_param("ss",$username,$password);
  $stmt->execute();
	$stmt->store_result();
	$num_returns = $stmt->num_rows;
	$stmt->close();

	if ($num_returns > 0)   //Active is 1
	{
		return true;
	}
	else
	{
		return false;
	}
}



if(checkLogin($username,$password)){

header('Location:dashboard.php');
  $_SESSION['login_user'] = "admin";
} else {
header('Location:index.php');
}
?>
