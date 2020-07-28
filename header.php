<?php
include"admin-controller.php";

ob_start();
session_start();
if($_SESSION['validation']!='adminValidation'){
	header("location:admin-login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dashboard</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="images/icon.jpg"/>
</head>
<body>
	<div class="card">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
			<div class="card-body vertical-line col-12 col-sm-12 col-md-2 col-lg-2 float-left" >
				<a href="dashboard.php"><img src="images/hostel.jpg" style="max-width: 190px;max-height: 35px;"></a>
			</div>
			<?php
				$myDBConnect=new controller();
				foreach($myDBConnect->fetchAdminData() as $eachRow){
					?>

			<div class="card-body col-12 col-sm-12 col-md-8 col-lg-8 float-left" >
				<b><?php echo $eachRow['user_name']?></b> ( <?php echo $eachRow['designation']?> )
			</div>
			<div class="card-body col-2 col-sm-2 col-md-2 col-lg-2 float-left text-center">
				<a><img src="images/<?php echo $eachRow['images']?>" class="rounded-circle" width="40" height="35">
					<!-- <div class="card profile-menu" >
						<li class="available">
							<a>Availabe</a>
						</li>
						<li>
							<a href="">Change</a>
						</li>
						<li>
							<a href="">Logout</a>
						</li>
					</div> -->
				</a>
			<?php
				}
			?>
				<a style="float: right;text-decoration: none" href="logout.php">Logout</a>
			</div>
		</div>
	</div>
	<div class="horizontal-line"></div>
	<div class="card">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12">
			<div class="card-body vertical-line col-12 col-sm-12 col-md-2 col-lg-2 float-left">
				<div class="menu">
					<h4><b>M E N U</b></h4>
				</div>
				<div class="menubar">
					<ul>
						<li onclick="menutoggle()" class="resmenu" >
							<button class="btn btn-primary">MENU</button>
						</li>
						<li class="togglemenu" >
							<a href="roomNumber-index.php">ADD ROOM</a>
						</li>
						<li class="togglemenu">
							<a href="addSit-index.php">ADD SIT</a>
						</li>
						<li class="togglemenu">
							<a href="admitStudent-index.php">ADMIT STUDENT</a>
						</li>
						<li class="togglemenu">
							<a href="#">HISTORY</a>
						</li>
						<li class="togglemenu">
							<a href="#">VACANT</a>
						</li>
						<li class="togglemenu">
							<a href="#">NEXT</a>
						</li>
						<li class="togglemenu">
							<a href="#">NEXT</a>
						</li>
						<li class="togglemenu">
							<a href="#">NEXT</a>
						</li>
					</ul>
				</div>
			</div>

<script type="text/javascript">
	function menutoggle(){
		$('.togglemenu').toggle();
	}
</script>
			
