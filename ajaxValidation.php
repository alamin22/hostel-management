<?php
	include"ajaxDataController.php";
//retrive for vacant history
	$getVacantData=new retrieveDataHistory();
	if($getVacantData->getVacantHistory()['vacantData']){
		if(count($getVacantData->getVacantHistory()['vacantData'])>0){
		$count=0;
			foreach($getVacantData->getVacantHistory()['vacantData'] as $eachVacantData){
				$count++;
				echo"<tr><td>".$count."</td>";
				echo "<td>".$eachVacantData['vacant_sit_student_id']."</td>";
				echo "<td>".$eachVacantData['department']."</td>";
				echo "<td>".$eachVacantData['room_number']."</td>";
				echo "<td>".$eachVacantData['vacant_date']."</td></tr>";
			}
		}
		else{
			echo"<div class=alert alert-danger> No Data Found </div>";
		}
	}

?>
