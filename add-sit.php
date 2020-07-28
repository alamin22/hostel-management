<?php
	include"header.php";
	include"AddSitController.php";

?>
<?php
	if(isset($_GET['update'])){
		$id=$_GET['update'];
		$getRoomNo=new addSitControoler();
		$getRoomNo->UpdateRetrieve($id);
?>
	<div class="card">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
				<div class="row">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="addSit-index.php" class="btn btn-primary">Back</a>&nbsp;&nbsp;&nbsp;<h4>Update Sit In Each Room</h4>
				</div>
			</div>
		</div>
		<div class="card-body">
			<form method="POST" action="validation.php">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-3 col-lg-3">
						<label>Room Number</label>
						<select class="custom-select" name="room_no">
							<option value="">Select Room</option>
							<?php
								foreach($getRoomNo->getRoomNumber() as $eachRoom){
									if($eachRoom['room_id']==$getRoomNo->UpdateRetrieve($id)['room_number_id']){
							?>
							<option value="<?php echo $eachRoom['room_id'];?>" selected><?php echo $eachRoom['room_number'];?></option>
							<?php
								}
								else{
							?>
							<option value="<?php echo $eachRoom['room_id'];?>"><?php echo $eachRoom['room_number'];?></option>
							<?php
									}
								}
							?>
						</select>
					</div>
					<div class="col-12 col-sm-12 col-md-3 col-lg-3">
						<label>Sit Number</label>
						<input type="text" value="<?php echo $getRoomNo->UpdateRetrieve($id)['sit_number'];?>" class="form-control" name="sit_no">
						<input type="hidden" value="<?php echo $getRoomNo->UpdateRetrieve($id)['sit_id'];?>" name="hidden_id">
					</div>
					<div class="col-12 col-sm-12 col-md-1 col-lg-1" style="margin-top: 30px;">
						<input type="submit" class="btn btn-success" value="Save" name="update-sit">
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
	}
	else{
?>

<div class="card">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="addSit-index.php" class="btn btn-primary">Back</a>&nbsp;&nbsp;&nbsp;<h4>Add Sit In Each Room</h4>
				</div>
			</div>
		</div>
		<div class="card-body">
			<form method="POST" action="validation.php">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-3 col-lg-3">
						<label>Room Number</label>
						<select class="custom-select" name="room_no">
							<option value="">Select Room</option>
							<?php
								$getRoomNo=new addSitControoler();
								foreach($getRoomNo->getRoomNumber() as $eachRoom){
							?>
							<option value="<?php echo $eachRoom['room_id'];?>"><?php echo $eachRoom['room_number'];?></option>
							<?php
								}
							?>
						</select>
					</div>
					<div class="col-12 col-sm-12 col-md-3 col-lg-3">
						<label>Sit Number</label>
						<input type="text" class="form-control" name="sit_no">
					</div>
					<div class="col-12 col-sm-12 col-md-1 col-lg-1" style="margin-top: 30px;">
						<input type="submit" class="btn btn-success" value="Save" name="add-sit">
					</div>
				</div>
			</form>
		</div>
	</div>


<?php
	}
?>

<?php
	include"footer.php";

?>