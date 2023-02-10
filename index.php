<?php 
	include "includes/header.php";
	//include the main class
	include "services/shopping.php";
	//declare object of the class
	$shoppingObj = new Shopping();
	//display all items in the list
	$items = $shoppingObj->show();
?>
<div class="container">
	<div class="wrapper">
		<?php include "includes/sub-header.php"; ?>
		<div class="my-3 p-3 bg-white rounded shadow-sm">
			<div id="alerts-holder">
				<?php include "alerts.php"; ?>
			</div>
			<form class="form-inline my-2 my-lg-0 new_item_form" action="services/add-item.php" method="post">
				<input class="form-control mr-sm-2 item_name" name="item_name" type="text" placeholder="Add new item" aria-label="Add new item">
				<input class="btn btn-success my-2 my-sm-0 add_item_btn" type="submit" name="submit" disabled value="Submit">
				<span class="ajax_status"></span>
			</form>
		</div>
		<div class="my-3 p-3 bg-white rounded shadow-sm">
			<?php 
				//if there are items, display them
				if($items && count($items) > 0){ ?>
					<table class="ui table">
						<thead>
							<tr>
								<th class="thirteen wide">Items</th>
								<th class="three wide right aligned">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach($items as $row){ 
									echo "<tr>";
									echo "<td>" . $row['name'] . "</td>";?>
									<td class="right aligned">
										<span class="btn btn-success btn-sm update_status action_btns <?php echo $row['status'] == 1 ?'minus':'check';?>" data="<?php echo $row['status'] == 1 ?'minus':'check';?>" item="<?php echo $row['id']; ?>" <?php echo $row['status'] == 0 ? 'data-toggle="tooltip" data-placement="top" title="Mark as done"': ''; ?> >
											<i class="fa-solid <?php echo $row['status'] == 1 ?'fa-minus':'fa-check'; ?>"></i>
										</span>
										<a class="btn btn-primary btn-sm update_item action_btns" data-toggle="tooltip" data-placement="top" title="Edit" href="update.php?editId=<?php echo $row['id']; ?>">
											<i class="fa-solid fa-pen"></i>
										</a>
										<span class="btn btn-danger btn-sm trash_item action_btns danger" item="<?php echo $row['id']; ?>" data-toggle="tooltip" data-placement="top" title="Delete">
											<i class="fa-solid fa-trash"></i>
										</span>
									</td>
									<?php echo "</tr>";
								}
							?>
						</tbody>
					</table>
				<?php
				}else{
					echo '<div class="alert alert-danger">No records were found.</div>';
				}
			?>
		</div>
	</div>
</div>
<?php include "includes/footer.php";?>