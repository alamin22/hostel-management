<?php
	include"header.php";
?>
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<h5>Hostel Sit Vacant History</h5>
				</div>
			</div>
		</div>
		<div>
			<table class="table table-bordered text-center mt-2">
				<thead>
					<tr style="background: #afc159">
						<th>#</th>
						<th>Student Id</th>
						<th>Department</th>
						<th>Room Number</th>
						<th>Vacant Date</th>
					</tr>
				</thead>
				<tbody id="tbody">
					
				</tbody>
			</table>
		</div>
	</div>
</div>
		
<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			url:"ajaxValidation.php",
			type:"GET",
			data:{},
			datatype:"JSON",
			success:function(data){
				console.log(data);	
				$("#tbody").html(data);
			},
			error:function(data){
				console.log(data);
			}
		});
	});
</script>
<?php
	include"footer.php";

?>