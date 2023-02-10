<?php
    //include the main class
	include "shopping.php";
	//declare object of the class
	$shoppingObj = new Shopping();
    if(isset($_POST['deleteId']) && !empty($_POST['deleteId'])) {
        $deleteId = $_POST['deleteId'];
        $shoppingObj->deleteRecord($deleteId);
    }
?>