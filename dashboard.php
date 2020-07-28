<?php
	include"header.php";
	include"AddSitController.php";

	$getDashData=new addSitControoler();

?>

	<div class="card-body col-10 col-sm-10 col-md-10 col-lg-10 float-left">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-3">
				<div class="card p-4">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12">
						<div class="row">
							<div class="col-6 col-sm-6 col-md-6 col-lg-6 text-center">
								<h4><b>Total Sit</b></h4>
								<h3><?php echo $getDashData->totalSitCount()['total_sit'];?></h3>
							</div>
							<div class="col-6 col-sm-6 col-md-6 col-lg-6 text-center">
								<h4><b>Total Vacant Sit</b></h4>
								<h3>
									<?php
										$vacant_sit=$getDashData->totalSitCount()['total_sit']-$getDashData->totalStudentCount()['total_student'];
										echo $vacant_sit+$getDashData->totalVacantCount()['total_vacant'];
									?>
								</h3>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-12 col-md-6 col-lg-6 mt-3">
				<div class="card p-4 ">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
						<h4><b>Total Student Exist</b></h4>
						<h3><?php echo $getDashData->totalStudentCount()['total_student'];?></h3>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-sm-12 col-md-7 col-lg-7 mt-3">
				<div class="card">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12">
						<div class="row">
							<?php
							foreach($myDBConnect->fetchAdminData() as $eachRow){
							?>
							<div class="col-3 col-sm-3 col-md-4 col-lg-4 p-4">
								<img src="images/<?php echo $eachRow['images'];?>" style="max-width: 140px;max-height: 160px;" >
							</div>
							<div class="col-12 col-sm-12 col-md-8 col-lg-8 p-4 mt-2 " style="font-size: 1rem;">
								<b>Name : </b><?php echo $eachRow['user_name']?> <br>
								<b>Designation : </b><?php echo $eachRow['designation']?> <br>
								<b>Email : </b><?php echo $eachRow['admin_email']?> <br>
								<b>District : </b>Joypurhat <br>
								<b>Year : </b><?php echo $eachRow['year']?>
							</div>
							<?php
								}
							?>
						</div>
						<div class="row">
							<div class="col-12 col-sm-12 col-md-12 col-lg-12 p-3 text-right">
								<a href="user-profile.php" class="btn btn-primary">Change</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-12 col-md-5 col-lg-5 mt-3">
				<div class="card">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12">
						<h3>Coming Soon.......</h3>
						<?php
							echo rand();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
	include"footer.php";
?>