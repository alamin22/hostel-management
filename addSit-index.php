<?php
	include"header.php";
	include"AddSitController.php";

?>
<div class="card">
	<div class="card-body">
		<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
				<h5>Sit Number</h5>
			</div>
			<form action="addSit-index.php" method="POST">
				<div class="row mt-3">
					<div class="col-12 col-sm-12 col-md-4 col-lg-4">
						<label>Room No</label>
						<input type="text" class="form-control" name="search" id="search">
					</div>
					<div class="col-12 col-sm-12 col-md-2 col-lg-2" style="margin-top: 30px;">
						<input type="submit" class="btn btn-primary" name="searchData" value="Search">
					</div>
					<div class="col-12 col-sm-12 col-md-2 col-lg-2" style="margin-top: 30px;">
						<a href="add-sit.php" class="btn btn-warning">Add Sit</a>
					</div>
				</div>
			</form>
		</div>
	</div>
		<?php
			if(isset($_POST['search'])){
				$getsitAndRoom=new addSitControoler();
		?>
		<div class="row mt-3">
			<table class="table table-bordered text-center">
				<thead>
					<tr style="background: #afc159">
						<th>#</th>
						<th>Room Number</th>
						<th>Number Of Sit</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$count=0;
						foreach($getsitAndRoom->search() as $eachSearchData){
							$count++;

					?>
					<tr>
						<td><?php echo $count;?></td>
						<td><?php echo $eachSearchData['room_number'];?></td>
						<td><?php echo $eachSearchData['sit_number'];?></td>
						<td><a href="add-sit.php?update=<?php echo $eachSearchData['sit_id']?>" class="btn btn-success">Update</a>&nbsp;<a href="validation.php?deleteid=<?php echo $eachSearchData['sit_id']?>" class="btn btn-danger" onclick="return deleteData()">Delete</a></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	<?php
		}
		else{
	?>
	<div class="row mt-3">
		<table class="table table-bordered text-center">
			<thead>
				<tr style="background: #afc159">
					<th>#</th>
					<th>Room Number</th>
					<th>Number Of Sit</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$getsitAndRoom=new addSitControoler();
					$count=0;
					foreach($getsitAndRoom->getRoomAndSitNo() as $eachSitAndRoom){
						$count++;
				?>
				<tr>
					<td><?php echo $count;?></td>
					<td><?php echo $eachSitAndRoom['room_number'];?></td>
					<td><?php echo $eachSitAndRoom['sit_number'];?></td>
					<td><a href="add-sit.php?update=<?php echo $eachSitAndRoom['sit_id']?>" class="btn btn-success">Update</a>&nbsp;<a href="validation.php?deleteid=<?php echo $eachSitAndRoom['sit_id']?>" class="btn btn-danger" onclick="return deleteData()">Delete</a></td>
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
	function deleteData(){
		return confirm('Are You Sure Delete This Data ?');
	}
</script>

<?php
	include"footer.php";

?>