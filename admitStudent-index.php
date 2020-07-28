<?php
	include"header.php";
	include"addStudentController.php";

?>
<div class="card">
	<div class="card-body">
		<?php
		$getStudent=new admitStudentController();
		if($getStudent->updateStudentStore()){
		?>
			<div class="alert alert-success text-center"><?php echo $getStudent->updateStudentStore();?></div>
		<?php
			}
		?>
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<h5>List of Admit Students</h5>
				</div>
				<form action="admitStudent-index.php" method="POST">
					<div class="row mt-3">
						<div class="col-12 col-sm-12 col-md-4 col-lg-4">
							<label>Student ID</label>
							<input type="text" class="form-control" name="student_id">
						</div>
						<div class="col-12 col-sm-12 col-md-4 col-lg-4">
							<label>Room No</label>
							<input type="text" class="form-control" name="room_num">
						</div>
						<div class="col-12 col-sm-12 col-md-1 col-lg-1" style="margin-top: 30px;">
							<input type="submit" class="btn btn-primary" name="searchStudentData" value="Search">
						</div>
						<div class="col-12 col-sm-12 col-md-2 col-lg-2" style="margin-top: 30px;">
							<a href="add-student.php" class="btn btn-warning">Admit Student</a>
						</div>
					</div>
				</form>
			</div>
		</div>

		<?php
			$getStudentFiltering=new admitStudentController();
			if(isset($_POST['searchStudentData'])){
				$studentId=$_POST['student_id'];
				$room_num=$_POST['room_num'];
				if($getStudentFiltering->getFilterData($studentId,$room_num)>0){
				
		?>

		<div class="row mt-3">
			<table class="table table-bordered text-center">
				<thead>
					<tr style="background: #afc159">
						<th>#</th>
						<th>Student ID</th>
						<th>Name</th>
						<th>Department</th>
						<th>Room No</th>
						<th>Valid Up</th>
						<th>Vacant</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$getAllStudent=new admitStudentController();
						$count=0;
						foreach($getStudentFiltering->getFilterData($studentId,$room_num) as $eachStudentData){
							$count++;

					?>
					<tr>
						<td><?php echo $count;?></td>
						<td><?php echo $eachStudentData['student_id'];?></td>
						<td><?php echo $eachStudentData['student_name'];?></td>
						<td><?php echo $eachStudentData['department'];?></td>
						<td><?php echo $eachStudentData['room_number'];?></td>
						<td><?php echo $eachStudentData['student_valid_up'];?></td>
						<td><a href="vacant-index.php?vacantid=<?php echo $eachStudentData['admit_student_id'];?>" class="btn btn-warning">Vacant</a></td>
						<td><a href="add-student.php?studentupdate=<?php echo $eachStudentData['admit_student_id']?>" class="btn btn-success">Update</a>&nbsp;<a href="validation.php?studentdeleteid=<?php echo $eachStudentData['admit_student_id']?>" class="btn btn-danger" onclick="return deleteStudentRecord()">Delete</a></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
		<?php
			}
			else{
		?>

		<div class="alert alert-danger text-center mt-3"><?php echo $getStudentFiltering->getFilterData($studentId,$room_num);?></div>

		<?php
		}
			}
			else{
		?>
		<div class="row mt-3">
			<table class="table table-bordered text-center">
				<thead>
					<tr style="background: #afc159">
						<th>#</th>
						<th>Student ID</th>
						<th>Name</th>
						<th>Department</th>
						<th>Room No</th>
						<th>Valid Up</th>
						<th>Vacant</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$getAllStudent=new admitStudentController();
						$count=0;
						foreach($getAllStudent->getAllStudent() as $eachStudentData){
							$count++;

					?>
					<tr>
						<td><?php echo $count;?></td>
						<td><?php echo $eachStudentData['student_id'];?></td>
						<td><?php echo $eachStudentData['student_name'];?></td>
						<td><?php echo $eachStudentData['department'];?></td>
						<td><?php echo $eachStudentData['room_number'];?></td>
						<td><?php echo $eachStudentData['student_valid_up'];?></td>
						<td><a href="vacant-index.php?vacantid=<?php echo $eachStudentData['admit_student_id'];?>" class="btn btn-warning">Vacant</a></td>
						<td><a href="add-student.php?studentupdate=<?php echo $eachStudentData['admit_student_id']?>" class="btn btn-success">Update</a>&nbsp;<a href="validation.php?studentdeleteid=<?php echo $eachStudentData['admit_student_id']?>" class="btn btn-danger" onclick="return deleteStudentRecord()">Delete</a></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>

		<?php
			}
		?>

	</div>
</div>
<script type="text/javascript">
	function deleteStudentRecord(){
		return confirm('Are You Sure Delete This Data ?');
	}
</script>

<?php
	include"footer.php";
?>
