<?php
    include "includes/header.php";
    //include the main class
	include "services/shopping.php";
	//declare object of the class
	$shoppingObj = new Shopping();
    $item = ""; 
    $editId = "";
    if(isset($_GET['editId']) && !empty($_GET['editId'])) {
        $editId = $_GET['editId'];
        $item = $shoppingObj->getRecordById($editId);
    }
?>
<div class="container">
	<div class="wrapper">
        <?php include "includes/sub-header.php"; ?>
		<div class="my-3 p-3 bg-white rounded shadow-sm">
			<div class="back-btn" style="margin: 0 0 10px 0;">
				<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a>
			</div>
			<form class="form-inline my-2 my-lg-0 new_item_form" action="services/update-item.php" method="post">
				<input class="form-control mr-sm-2 item_name" name="item_name" type="text" placeholder="Update item" value="<?php echo $item['name']; ?>">
				<input type="hidden" name="id" value="<?php echo $editId; ?>">
                <input type="hidden" name="baseurl" id="baseurl" value="<?php echo BASE_URL; ?>">
				<input class="btn btn-success my-2 my-sm-0 add_item_btn" type="submit" name="update" disabled value="Update">
				<!-- <span class="ajax_status"></span> -->
			</form>
		</div>
	</div>
</div>
<?php include "includes/footer.php";?>