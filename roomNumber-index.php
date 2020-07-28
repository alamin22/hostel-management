<?php
	include"header.php";
	include"AddSitController.php";
?>


<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<h5>Add Hostel Room</h5>
				</div>
				<form action="roomNumber-index.php" method="POST">
					<div class="row mt-3">
						<div class="col-12 col-sm-12 col-md-4 col-lg-4">
							<label>Room No</label>
							<input type="text" class="form-control" name="room_search" id="room_no">
						</div>
						<div class="col-12 col-sm-12 col-md-2 col-lg-2" style="margin-top: 30px;">
							<input type="submit" class="btn btn-primary" name="roomFiltering" value="Search">
						</div>
						<div class="col-12 col-sm-12 col-md-2 col-lg-2" style="margin-top: 30px;">
							<a href="add-room.php" class="btn btn-warning">Add New</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
		if(isset($_POST['roomFiltering'])){
	?>
	<div class="card-body">
		<table class="table table-bordered text-center">
			<thead>
				<tr style="background: #afc159">
				<th>#</th>
				<th>Room Number</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$count=0;
					$getRoomNumber=new addSitControoler();
					foreach($getRoomNumber->getRoomFilterData() as $eacheachData){	
						$count++;
				?>
				<tr>
					<td><?php echo $count;?></td>
					<td><?php echo $eacheachData['room_number'];?></td>
					<td><a href="add-room.php?updateRoom=<?php echo $eacheachData['room_id']?>" class="btn btn-success">Update</a>&nbsp;<a href="validation.php?deleteRoom=<?php echo $eacheachData['room_id']?>" class="btn btn-danger" onclick="return deleteRoom()">Delete</a></td>
				</tr>
				<?php
				 	}
				?>
			</tbody>	
		</table>
	</div>	
<?php
	}
	else
	{
?>
	<div class="card-body">
		<table class="table table-bordered text-center">
			<thead>
				<tr style="background: #afc159">
				<th>#</th>
				<th>Room Number</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$count=0;
					$getRoomNumber=new addSitControoler();
					foreach($getRoomNumber->getRoomNumber() as $eachRoom){	
						$count++;
				?>
				<tr>
					<td><?php echo $count;?></td>
					<td><?php echo $eachRoom['room_number'];?></td>
					<td><a href="add-room.php?updateRoom=<?php echo $eachRoom['room_id']?>" class="btn btn-success">Update</a>&nbsp;<a href="validation.php?deleteRoom=<?php echo $eachRoom['room_id']?>" class="btn btn-danger" onclick="return deleteRoom()">Delete</a></td>
				</tr>
				<?php
				 	}
				?>
			</tbody>	
		</table>
	</div>
	<?php
	}	
?>	
</div>



<script type="text/javascript">
	function deleteRoom(){
		return confirm('Are You Sure Delete This Data ?');
	}
</script>

<?php
	include"footer.php";

?>