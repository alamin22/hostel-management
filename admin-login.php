<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body style="background: url(images/background.jpg);">
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-5">
		<div class="">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-4 col-lg-4"></div>
				<div class="col-12 col-sm-12 col-md-4 col-lg-4 text-center">
					<div class="mt-5">
						<img src="images/admin.jpg" width="80" height="80" class="rounded-circle mt-2">
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-4 col-lg-4"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-sm-12 col-md-4 col-lg-4"></div>
				<div class="col-12 col-sm-12 col-md-4 col-lg-4 text-center">
					<div class="card" style="background: #dddd;">
						<div class="card-header user-login" style="background: rgb(89, 132, 79);">
							<h5>ADMIN LOGIN</h5>
						</div>
						<form method="POST" action="validation.php">
							<div class="card-body text-left user-name">
								<label for="user_name">User Name</label>
								<input type="text" class="form-control" name="user_name">
								<label for="admin_password" class="mt-2">Password</label>
								<input type="password" class="form-control" name="admin_password">
								<input type="submit" class=" col-12 col-sm-12 col-md-12 col-lg-12 btn btn-success mt-3 float-center" value="LOGIN" name="admin-login">
							</div>
						</form>	
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-4 col-lg-4"></div>
			</div>
		</div>
	</div>
</body>
</html>