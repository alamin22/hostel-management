<?php
include"ajaxConnect.php";
	class retrieveDataHistory{
		protected $student_admit='admit_student';
		protected $room_no_table="room_number";
		protected $sit_vacant="vacant_sit";

		public function getVacantHistory(){
			$DB=new connectDB();
			$sql="SELECT * FROM $this->sit_vacant LEFT JOIN $this->student_admit ON $this->sit_vacant.vacant_sit_room_id=$this->student_admit.student_room_no_id LEFT JOIN $this->room_no_table ON $this->room_no_table.room_id=$this->sit_vacant.vacant_sit_room_id WHERE student_is_deleted=1";
			$stmt=$DB->getConnection()->prepare($sql);
			$stmt->execute();
			$result=$stmt->fetchAll();
			return array('vacantData'=>$result);
		}



	}
?>