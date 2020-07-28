<?php
	include"admin-controller.php";
	include"AddSitController.php";
	include"addStudentController.php";

	$myDBConnect=new controller();
	$getSitNo=new addSitControoler();
	$getAdmitStudent=new admitStudentController();

// ***************** Admin Section *****************

	if(isset($_POST['admin-login'])){
		if($myDBConnect->getAdminData() > 0){
		session_start();
		$_SESSION['validation'] = "adminValidation";
		header("location:dashboard.php");
		}
		else{
			header("location:admin-login.php");
		}
	}

	if(isset($_POST['admin-update'])){	
		if($myDBConnect->adminUpdate()=="success"){
			header("location:dashboard.php");
		}
		else{
			header("location:user-profile.php");
		}
	    
	}

// ***************** Add Room Section *****************
	if(isset($_POST['roomNumberData'])){
		if($getSitNo->addRoomNumber()){
			header('location:roomNumber-index.php');
		}
		else{
			header('location:add-room.php');
		}
	}

	if(isset($_GET['deleteRoom'])){
		if($getSitNo->deleteRoom()=='deleted'){
			header('location:roomNumber-index.php');
		}
	}
	if(isset($_POST['roomNumberUpdate'])){	
		if($getSitNo->UpdateStoreRoom()=="success"){
			header('location:roomNumber-index.php');
		}
		else{
			header('location:add-room.php');
		}
	    
	}


// ***************** Add Sit Section *****************

	if(isset($_POST['add-sit'])){	
		if($getSitNo->addSitNumber()=="success"){
			header("location:addSit-index.php");
		}
		else{
			header("location:add-sit.php");
		}
	    
	}
	
	if(isset($_GET['deleteid'])){	
		if($getSitNo->deleteSitNo()=="deleted"){
			header("location:addSit-index.php");
		}    
	}

	if(isset($_POST['update-sit'])){	
		if($getSitNo->UpdateStore()=="success"){
			header("location:addSit-index.php");
		}
		else{
			header("location:add-sit.php");
		}
	    
	}
// ***************** Admit Student Section *****************
	if(isset($_POST['admitStudent'])){
		if($getAdmitStudent->addStudent()=='success'){
			header("location:admitStudent-index.php");
		}
		else if($getAdmitStudent->addStudent()=='No Vacancy In This Room'){
			header("location:add-student.php");
		}
	}

	if(isset($_GET['studentdeleteid'])){
		if($getAdmitStudent->deleteStudentRecord()=='deleted'){
			header("location:admitStudent-index.php");
		}
	}

	if(isset($_POST['vacantSit'])){
		if($getAdmitStudent->sitVacant()=='success'){
			header("location:admitStudent-index.php");
		}
	}

	


?>