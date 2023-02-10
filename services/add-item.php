<?php 
	//include the main class
	include "shopping.php";
	//declare object of the class
	$shoppingObj = new Shopping();

	// Insert Record
	if(isset($_POST['submit'])) {
		$shoppingObj->insert($_POST);
	}
?>