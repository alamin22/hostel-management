<?php
	include"header.php";
	include"AddSitController.php";
	include"addStudentController.php";

?>
<?php
	if(isset($_GET['studentupdate'])){
		$id=$_GET['studentupdate'];
		$getStudent=new admitStudentController();
		$getStudent->getStudentRecord($id);

?>
	<div class="card">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
				<div class="row">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="admitStudent-index.php" class="btn btn-primary">Back</a>&nbsp;&nbsp;&nbsp;<h4>Update Admit Student</h4>
				</div>
			</div>
		</div>
		<div class="card-body">
			<form method="POST" action="admitStudent-index.php">
				<div class="row mt-2">
					<div class="col-12 col-sm-12 col-md-3 col-lg-3">
						<label> Student ID</label>
						<input type="text" value="<?php echo $getStudent->getStudentRecord($id)['student_id']?>" class="form-control" name="student_id">
						<input type="hidden" value="<?php echo $getStudent->getStudentRecord($id)['admit_student_id']?>" name="hidden_id">
					</div>
					<div class="col-12 col-sm-12 col-md-3 col-lg-3">
						<label> Student Name</label>
						<input type="text" value="<?php echo $getStudent->getStudentRecord($id)['student_name']?>" class="form-control" name="student_name">
					</div>
					<div class="col-12 col-sm-12 col-md-3 col-lg-3">
						<label>Department Name</label>
						<input type="text" value="<?php echo $getStudent->getStudentRecord($id)['department']?>" class="form-control" name="department">
					</div>
					<div class="col-12 col-sm-12 col-md-3 col-lg-3">
						<label>Session / Year</label>
						<input type="text" value="<?php echo $getStudent->getStudentRecord($id)['session']?>" class="form-control" name="session">
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-12 col-sm-12 col-md-3 col-lg-3">
						<label>District Name</label>
						<input type="text" value="<?php echo $getStudent->getStudentRecord($id)['district_name']?>" class="form-control" name="district">
					</div>
					<div class="col-12 col-sm-12 col-md-3 col-lg-3">
						<label>Room Number</label>
						<select class="custom-select" name="room_no">
							<option value="">Select Room</option>
							<?php
								$getRoomNo=new addSitControoler();
								foreach($getRoomNo->getRoomNumber() as $eachRoom){
								if($eachRoom['room_id']==$getStudent->getStudentRecord($id)['student_room_no_id']){
							?>
							<option value="<?php echo $eachRoom['room_id'];?>" selected><?php echo $eachRoom['room_number'];?></option>
							<?php
								}
								else
								{
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
						<input type="text" value="1" class="form-control" name="sit_no" readonly>
					</div>
					<div class="col-12 col-sm-12 col-md-3 col-lg-3">
						<label>Valid Up</label>
						<input type="text" value="<?php echo $getStudent->getStudentRecord($id)['student_valid_up']?>" class="form-control" name="valid_up" required>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12">
						<div class="col-12 col-sm-12 col-md-1 col-lg-1 float-right">
							<input type="submit" class="btn btn-success" value="Save" name="updateAdmitStudent">
						</div>
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
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="admitStudent-index.php" class="btn btn-primary">Back</a>&nbsp;&nbsp;&nbsp;<h4>Admit Student in Room</h4>
				</div>
			</div>
		</div>
		<div class="card-body">
			<form method="POST" action="validation.php">
				<div class="row mt-2">
					<div class="col-12 col-sm-12 col-md-3 col-lg-3">
						<label> Student ID</label>
						<input type="text" class="form-control" name="student_id" required>
					</div>
					<div class="col-12 col-sm-12 col-md-3 col-lg-3">
						<label> Student Name</label>
						<input type="text" class="form-control" name="student_name" required>
					</div>
					<div class="col-12 col-sm-12 col-md-3 col-lg-3">
						<label>Department Name</label>
						<input type="text" class="form-control" name="department" required>
					</div>
					<div class="col-12 col-sm-12 col-md-3 col-lg-3">
						<label>Session / Year</label>
						<input type="text" class="form-control" name="session" required>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-12 col-sm-12 col-md-3 col-lg-3">
						<label>District Name</label>
						<input type="text" class="form-control" name="district" >
					</div>
					<div class="col-12 col-sm-12 col-md-3 col-lg-3">
						<label>Room Number</label>
						<select class="custom-select" name="room_no" required>
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
						<input type="text" value="1" class="form-control" name="sit_no" readonly>
					</div>
					<div class="col-12 col-sm-12 col-md-3 col-lg-3">
						<label>Valid Up</label>
						<input type="text" class="form-control" name="valid_up" required>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12">
						<div class="col-12 col-sm-12 col-md-1 col-lg-1 float-right">
							<input type="submit" class="btn btn-success" value="Save" name="admitStudent">
						</div>
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