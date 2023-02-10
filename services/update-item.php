<?php
    //include the main class
	include "shopping.php";
	//declare object of the class
	$shoppingObj = new Shopping();
    if(isset($_POST['update'])) {
        $shoppingObj->updateRecord($_POST);
    }
?>