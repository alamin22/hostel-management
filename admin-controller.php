<?php

	include"connection.php";

	class controller extends connectDB{
		protected $table='admin_table';
		public function getAdminData(){
			if(isset($_POST['admin-login'])){
				try{
					$user_name=$_POST['user_name'];
					$password=$_POST['admin_password'];
					$encodePass=md5($password);
					$sql="select * from $this->table where user_name = ? AND password = ?";
					$stmt=$this->DB->prepare($sql);
					$arr=array($user_name,$encodePass);
					$stmt->execute($arr);
					$result=$stmt->fetchAll();
					$count=COUNT($result);
					return $count;	
				}
				catch(Exception $e){
					$error=$e->getMessage();
				}
				
			}
		}

		public function fetchAdminData(){
			try{
				$sql="SELECT * FROM $this->table";
				$stmt=$this->DB->prepare($sql);
				$stmt->execute();
				$result=$stmt->fetchAll();
				return $result;
			}
			catch(Exception $e){
				$error = $e->getMessage();
			}
		}

		public function adminUpdate(){
			if(isset($_POST['admin-update'])){
				try{
					$user_name=$_POST['user_name'];
					$user_email=$_POST['user_email'];
					$designation=$_POST['designation'];
						$filename= time().$_FILES["photo"]["name"];
			            $filetmp= $_FILES["photo"]["tmp_name"];
			            $folder="images/". $filename;
			            move_uploaded_file($filetmp,$folder);
					$year=$_POST['year'];
					$password=$_POST['password'];
					$encodePass=md5($password);
					$con_password=$_POST['con_password'];
					$encodeConPass=md5($con_password);
					if($encodePass==$encodeConPass){
						$sql="UPDATE $this->table SET user_name=?,admin_email=?,designation=?,year=?,password=?,images=? WHERE admin_id=1";
						$stmt=$this->DB->prepare($sql);
						$arr=array($user_name,$user_email,$designation,$year,$encodePass,$filename);
						$stmt->execute($arr);
						return"success";
					}
					else{
						return"wrong";
					}
				}
				catch(Exception $e){
					$error= $e->getMessage();
				}
			}
		}
		
	}

	
?>