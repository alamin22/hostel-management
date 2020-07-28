<?php
	include"header.php";

?>
<div class="card-body col-10 col-sm-10 col-md-10 col-lg-10 float-left">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-1 col-lg-1"></div>
		<div class="col-12 col-sm-12 col-md-10 col-lg-10 text-center">
			<div class="card-header">
				<h4>Change Profile</h4>	
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-sm-12 col-md-1 col-lg-1"></div>
		<div class="col-12 col-sm-12 col-md-10 col-lg-10">

			<form method="POST" action="validation.php" enctype="multipart/form-data">
				<?php
					$fetchData=new controller();
					foreach($fetchData->fetchAdminData() as $eachRow){

					?>

				<div class="card-header">
					<center>
						<div>
							<img src="images/<?php echo $eachRow['images']?>" width="100" height="100" class="rounded-circle">
						</div>
						<label for="photo">Add Photo</label>
					<input type="file" name="photo"><br>
					</center>
					<label for="user-name">User Name</label>
					<input type="text" class="form-control" value="<?php echo $eachRow['user_name'];?>" id="user_name" name="user_name">
					<label for="user-email">User Email</label>
					<input type="email" value="<?php echo $eachRow['admin_email'];?>" class="form-control" name="user_email">
					<label for="designation">Designation</label>
					<input type="text" value="<?php echo $eachRow['designation'];?>" class="form-control" name="designation">
					<label for="year">Year</label>
					<select class="custom-select" name="year">
						<option value="<?php echo $eachRow['year'];?>"><?php echo $eachRow['year'];?></option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						<option value="2024">2024</option>
						<option value="2025">2025</option>
						<option value="2026">2026</option>
						<option value="2027">2027</option>
					</select>
					<label for="password">Password</label>
					<input type="password" value="<?php echo $eachRow['password'];?>" class="form-control" name="password" placeholder="At least 4 charater">
					<label for="con_password">Confirm Password</label>
					<input type="password" class="form-control" name="con_password" placeholder="same as password">
					<label></label>
					<input type="submit" class="mt-3 btn btn-success" value="Send" name="admin-update">
				</div>
				<?php
					}
				?>
			</form>
		</div>
	</div>
</div>


<?php
	include"footer.php";
?>