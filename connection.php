<?php
	class connectDB{
		private $hostname='localhost';
		private $DBname='hostelmanagement';
		private $user='root';
		private $password='';
		public $DB;

		public function __construct(){
			$this->getConnection();
		}
		private function getConnection(){
			try{
				$this->DB=new PDO("mysql:dbname={$this->DBname};hostname={$this->hostname}",$this->user,$this->password);
			}
			catch(PDOException $e){
				echo'failed'.$e->getMessage();
			}
			
		}

	}

?>