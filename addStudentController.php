<?php

class admitStudentController extends connectDB{
	protected $student_admit='admit_student';
	protected $room_no_table="room_number";
	protected $sit_vacant="vacant_sit";


	public function addStudent(){
		try{
			if(isset($_POST['admitStudent'])){
				$student_id=$_POST['student_id'];
				$student_name=$_POST['student_name'];
				$department=$_POST['department'];
				$session=$_POST['session'];
				$district=$_POST['district'];
				$room_no=$_POST['room_no'];
				$sit_no=$_POST['sit_no'];
				$valid_up=$_POST['valid_up'];
				$admit_date=date('Y-m-d');

				$sql="SELECT * FROM admit_student where student_room_no_id=".$room_no." AND student_is_deleted=0;";
				$stmt=$this->DB->prepare($sql);
				$stmt->execute();
				$totalBokingSit=$stmt->fetchAll();

				$sql="SELECT * FROM vacant_sit where vacant_sit_room_id=".$room_no.";";
				$stmt=$this->DB->prepare($sql);
				$stmt->execute();
				$totalVacantSit=$stmt->fetchAll();

				$ExistSit=count($totalBokingSit)-count($totalVacantSit);

				$sql="SELECT * FROM room_number left join sit_number on room_number.room_id=sit_number.room_number_id where room_number_id=".$room_no.";";
				$stmt=$this->DB->prepare($sql);
				$stmt->execute();
				$totalSitInRoom=$stmt->fetch();

				$sitForBooking=0;
				$sitForBooking=$totalSitInRoom['sit_number']-$ExistSit;
				if($sitForBooking-count($totalVacantSit)>0){
					$sql="INSERT INTO $this->student_admit (student_id,student_name,department,session,district_name,student_room_no_id,student_sit_no,student_valid_up,admit_date) value(?,?,?,?,?,?,?,?,?)";
					$stmt=$this->DB->prepare($sql);
					$arr=array($student_id,$student_name,$department,$session,$district,$room_no,$sit_no,$valid_up,$admit_date);
					$stmt->execute($arr);
					return 'success';
				}
				else{
					return 'No Vacancy In This Room';
				}
			}
			
		}
		catch(Exception $e){
			$error=$e->getMessage();
		}
	}
	public function getAllStudent(){
		try{
			$sql="SELECT * FROM $this->student_admit LEFT JOIN $this->room_no_table ON $this->student_admit.student_room_no_id=$this->room_no_table.room_id WHERE student_is_deleted=0";
			$stmt=$this->DB->prepare($sql);
			$stmt->execute();
			$result=$stmt->fetchAll();
			return $result;
		}
		catch(Exception $e){
			$error=$e->getMessage();
		}
	}
	public function deleteStudentRecord(){
		if(isset($_GET['studentdeleteid'])){
			$getstudentId=$_GET['studentdeleteid'];
			$sql="UPDATE $this->student_admit SET student_is_deleted=1 WHERE admit_student_id=?";
			$stmt=$this->DB->prepare($sql);
			$stmt->execute(array($getstudentId));
			return'deleted';
		}
	}
	public function getStudentRecord($id){
		$sql="SELECT * FROM $this->student_admit LEFT JOIN $this->room_no_table ON $this->student_admit.student_room_no_id=$this->room_no_table.room_id WHERE admit_student_id=?";
		$stmt=$this->DB->prepare($sql);
		$stmt->execute(array($id));
		$result=$stmt->fetch();
		return $result;
	}
	public function updateStudentStore(){
		try{
			if(isset($_POST['updateAdmitStudent'])){
				$student_id=$_POST['student_id'];
				$student_name=$_POST['student_name'];
				$department=$_POST['department'];
				$session=$_POST['session'];
				$district=$_POST['district'];
				$room_no=$_POST['room_no'];
				$sit_no=$_POST['sit_no'];
				$valid_up=$_POST['valid_up'];
				$hidden_id=$_POST['hidden_id'];

				$sql="UPDATE $this->student_admit SET student_id=?,student_name=?,department=?,session=?,district_name=?,student_room_no_id=?,student_sit_no=?,student_valid_up=? WHERE admit_student_id=?";
				$stmt=$this->DB->prepare($sql);
				$arr=array($student_id,$student_name,$department,$session,$district,$room_no,$sit_no,$valid_up,$hidden_id);
				$stmt->execute($arr);
				return 'Data Updated Successfully';
			}
			
		}
		catch(Exception $e){
			$error=$e->getMessage();
		}
	}

	public function getFilterData($studentId,$room_num){
		if($studentId=='' &&  $room_num==''){
			$sql="SELECT * FROM $this->student_admit LEFT JOIN $this->room_no_table ON $this->student_admit.student_room_no_id=$this->room_no_table.room_id AND student_is_deleted=0";
			$stmt=$this->DB->prepare($sql);
			$stmt->execute();
			$result=$stmt->fetchAll();
			$count=COUNT($result);
			if($count>0){
				return $result;
			}else{
				return'Data Not Found';
			}
			
		}
		else if(isset($studentId) && $room_num==''){
			$sql="SELECT * FROM $this->student_admit LEFT JOIN $this->room_no_table ON $this->student_admit.student_room_no_id=$this->room_no_table.room_id WHERE student_id LIKE '%$studentId%' AND student_is_deleted=0;";
			$stmt=$this->DB->prepare($sql);
			$stmt->execute();
			$result=$stmt->fetchAll();
			$count=COUNT($result);
			if($count>0){
				return $result;
			}else{
				return'Data Not Found';
			}
		}
		else if($studentId=='' && isset($room_num)){
			$sql="SELECT * FROM $this->student_admit LEFT JOIN $this->room_no_table ON $this->student_admit.student_room_no_id=$this->room_no_table.room_id WHERE room_number LIKE '%$room_num%' AND student_is_deleted=0;";
			$stmt=$this->DB->prepare($sql);
			$stmt->execute();
			$result=$stmt->fetchAll();
			$count=COUNT($result);
			if($count>0){
				return $result;
			}else{
				return'Data Not Found';
			}
		}
		else if(isset($studentId) && isset($room_num)){
			$sql="SELECT * FROM $this->student_admit LEFT JOIN $this->room_no_table ON $this->student_admit.student_room_no_id=$this->room_no_table.room_id WHERE student_id LIKE '$studentId%' AND room_number LIKE '%$room_num%' AND student_is_deleted=0;";
			$stmt=$this->DB->prepare($sql);
			$stmt->execute();
			$result=$stmt->fetchAll();
			$count=COUNT($result);
			if($count>0){
				return $result;
			}else{
				return'Data Not Found';
			}
		}
	}

	public function sitVacant(){
		try{
			if(isset($_POST['vacantSit'])){
				$student_id=$_POST['student_id'];
				$room_no=$_POST['room_no'];
				$sit_number=$_POST['sit_number'];
				$hidden_id=$_POST['hidden_id'];
				$vacant_date=date('Y-m-d');

				$sql="INSERT INTO $this->sit_vacant (vacant_sit_student_id,vacant_sit_room_id,vacant_sit_sit_number,vacant_date) value(?,?,?,?)";
				$stmt=$this->DB->prepare($sql);
				$arr=array($student_id,$room_no,$sit_number,$vacant_date);
				$stmt->execute($arr);

				$sql="UPDATE $this->student_admit SET student_is_deleted=1 WHERE admit_student_id=?";
				$stmt=$this->DB->prepare($sql);
				$arr=array($hidden_id);
				$stmt->execute($arr);

				return 'success';
			}
			
		}
		catch(Exception $e){
			$error=$e->getMessage();
		}
	}

	public function getVacantData($vacnatId){
		try{
			$sql="SELECT * FROM $this->student_admit LEFT JOIN $this->room_no_table ON $this->student_admit.student_room_no_id=$this->room_no_table.room_id where admit_student_id=?";
			$stmt=$this->DB->prepare($sql);
			$stmt->execute(array($vacnatId));
			$result=$stmt->fetch();
			return $result;
		}
		catch(Exception $e){
			$error=$e->getMessage();
		}
	}




}

?>