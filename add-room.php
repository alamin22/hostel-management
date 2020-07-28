<?php
	include"header.php";
	include"AddSitController.php";

?>
<div class="card">
	<?php
		if(isset($_GET['updateRoom'])){
			$updateRoom=$_GET['updateRoom'];
			$getRoomNumber=new addSitControoler();
			$getRoomNumber->getRoomUpdateData($updateRoom);
	?>
	<div class="card-body">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<a href="roomNumber-index.php" class="btn btn-primary">Back</a>&nbsp;&nbsp;&nbsp;<h5>Update Room Number</h5>
				</div>
				<form action="validation.php" method="POST">
					<div class="row mt-3">
						<div class="col-12 col-sm-12 col-md-4 col-lg-4">
						<label>Room No</label>
						<input type="text" value="<?php echo $getRoomNumber->getRoomUpdateData($updateRoom)['room_number']?>" class="form-control" name="room_no">
						<input type="hidden" value="<?php echo $getRoomNumber->getRoomUpdateData($updateRoom)['room_id']?>" name="hidden_id">
						</div>
						<div class="col-12 col-sm-12 col-md-2 col-lg-2" style="margin-top: 32px;">
							<input type="submit" class="btn btn-success" name="roomNumberUpdate" value="Save">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
		}
		else{
	?>
	<div class="card-body">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<a href="roomNumber-index.php" class="btn btn-primary">Back</a>&nbsp;&nbsp;&nbsp;<h5>Add Hostel Room</h5>
				</div>
				<form action="validation.php" method="POST">
					<div class="row mt-3">
						<div class="col-12 col-sm-12 col-md-4 col-lg-4">
						<label>Room No</label>
						<input type="text" class="form-control" name="room_no" id="room_no" required>
						</div>
						<div class="col-12 col-sm-12 col-md-2 col-lg-2" style="margin-top: 32px;">
							<input type="submit" class="btn btn-success" name="roomNumberData" value="Save">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php
		}
	?>
</div>

<?php
	include"footer.php";

?>