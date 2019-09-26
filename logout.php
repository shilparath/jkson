<?php
	//$no_visible_elements=true;
	ob_start();
	include('header.php'); 
    if(!isset($_SESSION)) 
    { 
    	session_start(); 
    }//to ensure you are using same session
	
	session_destroy(); //destroy the session
	header("location:index.php"); //to redirect back to "index.php" after logging out
	//exit();
	
?>


	
<?php include('footer.php'); ?>
