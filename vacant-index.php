<?php
	include"header.php";
	include"AddSitController.php";
	include"addStudentController.php";

  
	if(isset($_GET['vacantid'])){
		$vacantId=$_GET['vacantid'];
		$getSitVacant=new admitStudentController();
		$getSitVacant->getVacantData($vacantId);
?>
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<h5>Vacant Sit</h5>
				</div>
				<form action="validation.php" method="POST">
					<div class="row mt-3">
						<div class="col-12 col-sm-12 col-md-3 col-lg-3">
							<label>Student Id</label>
							<input type="text" value="<?php echo $getSitVacant->getVacantData($vacantId)['student_id']?>" class="form-control" name="student_id" readonly>
							<input type="hidden" value="<?php echo $getSitVacant->getVacantData($vacantId)['admit_student_id']?>" name="hidden_id" >
						</div>
						<div class="col-12 col-sm-12 col-md-3 col-lg-3">
							<label>Room Number</label>
							<select class="custom-select" name="room_no">
							<option value="">Select Room</option>
							<?php
								$getRoomNo=new addSitControoler();
								foreach($getRoomNo->getRoomNumber() as $eachRoom){
									if($eachRoom['room_id']==$getSitVacant->getVacantData($vacantId)['student_room_no_id']){
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
							<input type="text" value="1" class="form-control" name="sit_number"
							readonly>
						</div>

						<div class="col-12 col-sm-12 col-md-2 col-lg-2" style="margin-top: 30px;">
							<input type="submit" class="btn btn-success" name="vacantSit" value="Vacant">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
}
	include"footer.php";

?>
