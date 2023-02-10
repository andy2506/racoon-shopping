<?php 
    //include the main class
	include "shopping.php";
	//declare object of the class
	$shoppingObj = new Shopping();
    if(isset($_POST['editId']) && !empty($_POST['editId']) && isset($_POST['status']) && !empty($_POST['status'])) {
        $item = $shoppingObj->updateRecordStatus($_POST);
    }
?>