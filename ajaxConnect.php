<?php
	class connectDB{
		private $hostname='localhost';
		private $DBname='hostelmanagement';
		private $user='root';
		private $password='';

		public function getConnection(){
			try{
				$DB=new PDO("mysql:dbname={$this->DBname};hostname={$this->hostname}",$this->user,$this->password);

				return $DB;
			}
			catch(PDOException $e){
				echo'failed'.$e->getMessage();
			}
			
		}

	}

?>