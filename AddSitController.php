<?php

//controller for both room number and sit number

	class addSitControoler extends connectDB{
		protected $room_no_table="room_number";
		protected $sit_no_table="sit_number";
		protected $student_admit='admit_student';
		protected $sit_vacant='vacant_sit';

		public function getRoomNumber()
		{
			try{
				$sql="SELECT * FROM $this->room_no_table";
				$stmt=$this->DB->prepare($sql);
				$stmt->execute();
				$result=$stmt->fetchAll();
				return $result;
			}
			catch(Exception $e){
				$error=$e->getMessage();
			}
		}
		public function addSitNumber(){
			if(isset($_POST['add-sit'])){
				$room_number=$_POST['room_no'];
				$sit_number=$_POST['sit_no'];
				$sql="INSERT INTO $this->sit_no_table (room_number_id,sit_number) value(?,?)";
				$stmt=$this->DB->prepare($sql);
				$arr=array($room_number,$sit_number);
				$stmt->execute($arr);
				return "success";
			}	
		}
		public function getRoomAndSitNo(){
			$sql="SELECT * FROM $this->sit_no_table LEFT JOIN $this->room_no_table ON $this->room_no_table.room_id = $this->sit_no_table.room_number_id";
			$stmt=$this->DB->prepare($sql);
			$stmt->execute();
			$result=$stmt->fetchAll();
			return $result;
		}
		public function deleteSitNo(){
			try{
				if(isset($_GET['deleteid'])){
					$deleteId=$_GET['deleteid'];
					$sql="DELETE FROM $this->sit_no_table WHERE sit_id=?";
					$stmt=$this->DB->prepare($sql);
					$stmt->execute(array($deleteId));
					return "deleted";
				}
			}
			catch(Exception $e){
				$error=$e->getMessage();
			}
		}
		public function UpdateRetrieve($id){
			try{
				$sql="SELECT * FROM $this->sit_no_table WHERE sit_id=?";
				$stmt=$this->DB->prepare($sql);
				$arr=array($id);
				$stmt->execute($arr);
				$result=$stmt->fetch();
				return $result;
			}
			catch(Exception $e){
				$error=$e->getMessage();
			}
		}
		public function UpdateStore(){
			if(isset($_POST['update-sit'])){
				$room_number=$_POST['room_no'];
				$sit_number=$_POST['sit_no'];
				$hidden_id=$_POST['hidden_id'];
				$sql="UPDATE $this->sit_no_table SET room_number_id=?,sit_number=? WHERE sit_id=?";
				$stmt=$this->DB->prepare($sql);
				$arr=array($room_number,$sit_number,$hidden_id);
				$stmt->execute($arr);
				return "success";
			}
		}
		public function search(){
			if(isset($_POST['searchData'])){
				$search=$_POST['search'];
				if(isset($search)){
					$sql="SELECT * FROM room_number left join sit_number on sit_number.room_number_id=room_number.room_id where room_number like '%$search%';";
					$stmt=$this->DB->prepare($sql);
					$stmt->execute();
					$result=$stmt->fetchAll();
					return $result;
				}
				else if($search==''){
					$sql="SELECT * FROM room_number left join sit_number on sit_number.room_number_id=room_number.room_id;";
					$stmt=$this->DB->prepare($sql);
					$stmt->execute();
					$result=$stmt->fetchAll();
					return $result;
				}	
			}		
		}		
//add room number section

		public function addRoomNumber(){
			if(isset($_POST['roomNumberData'])){
				$roomNumber=$_POST['room_no'];
				$sql="INSERT INTO $this->room_no_table (room_number)value(?)";
				$stmt=$this->DB->prepare($sql);
				$stmt->execute(array($roomNumber));
				return 'success';
			}
			
		}
		public function deleteRoom(){
			if(isset($_GET['deleteRoom'])){
				$deleteRoom=$_GET['deleteRoom'];
				$sql="DELETE FROM $this->room_no_table WHERE room_id=?";
				$stmt=$this->DB->prepare($sql);
				$stmt->execute(array($deleteRoom));
				return 'deleted';
			}
		}
		public function getRoomUpdateData($id){
			$sql="SELECT * FROM $this->room_no_table WHERE room_id=?";
			$stmt=$this->DB->prepare($sql);
			$stmt->execute(array($id));
			$result=$stmt->fetch();
			return $result;
		}
		public function UpdateStoreRoom(){
			if(isset($_POST['roomNumberUpdate'])){
				$room_number=$_POST['room_no'];
				$room_number_id=$_POST['hidden_id'];
				$sql="UPDATE $this->room_no_table SET room_number=? WHERE room_id=?";
				$stmt=$this->DB->prepare($sql);
				$arr=array($room_number,$room_number_id);
				$stmt->execute($arr);
				return "success";
			}
		}
		public function getRoomFilterData(){
			if(isset($_POST['roomFiltering'])){
				$search=$_POST['room_search'];
				if(isset($search)){
					$sql="SELECT * FROM room_number where room_number like '%$search%';";
					$stmt=$this->DB->prepare($sql);
					$stmt->execute();
					$result=$stmt->fetchAll();
					return $result;
				}
				else if($search==''){
					$sql="SELECT * FROM room_number";
					$stmt=$this->DB->prepare($sql);
					$stmt->execute();
					$result=$stmt->fetchAll();
					return $result;
				}	
			}		
		}

	//For Dashboard count 
		public function totalSitCount(){
			try{
				$sql="SELECT sum(sit_number) as total_sit FROM $this->sit_no_table";
				$stmt=$this->DB->prepare($sql);
				$stmt->execute();
				$result=$stmt->fetch();
				return $result;
				
			}
			catch(Exception $e){
				$error=$e->getMessage();
			}
		}
		public function totalStudentCount(){
			try{
				$sql="SELECT sum(student_sit_no) as total_student FROM $this->student_admit";
				$stmt=$this->DB->prepare($sql);
				$stmt->execute();
				$result=$stmt->fetch();
				return $result;
				
			}
			catch(Exception $e){
				$error=$e->getMessage();
			}
		}
		public function totalVacantCount(){
			try{
				$sql="SELECT sum(vacant_sit_sit_number) as total_vacant FROM $this->sit_vacant";
				$stmt=$this->DB->prepare($sql);
				$stmt->execute();
				$result=$stmt->fetch();
				return $result;
				
			}
			catch(Exception $e){
				$error=$e->getMessage();
			}
		}




	}


?>