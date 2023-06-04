<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>List of Complaints</b>
						<!-- <span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_tenant">
					<i class="fa fa-plus"></i> New Tenant
				</a></span> -->
					</div>
					<div class="card-body">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">User Name</th>
									<th class="">House No.</th>
									<th class="">Complaint</th>
                                    <th>Action</th>
								</tr>
							</thead>
                            <tbody>
								<?php 
								$i = 1;
								$tenant = $conn->query("SELECT * FROM complaints;");
								while($row=$tenant->fetch_assoc()):
									$sno = $row['sno'];
                                    // $username = $row['username'];
                                    // $house_no = $row['house_no'];
                                    // $complaint = $row['complaint'];
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td>
										<?php echo ucwords($row['username']) ?>
									</td>
                                    <td class="">
										 <p> <b><?php echo $row['house_no'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['complaint'] ?></b></p>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-outline-success delete_tenant" type="button" data-id="<?php echo $row['sno'] ?>" >Solved</button>
									</td>
								</tr>
								<?php endwhile; ?>
                                </tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	
	$('#new_tenant').click(function(){
		uni_modal("New Tenant","manage_tenant.php","mid-large")
		
	})

	$('.view_payment').click(function(){
		uni_modal("Tenants Payments","view_payment.php?id="+$(this).attr('data-id'),"large")
		
	})
	$('.edit_tenant').click(function(){
		uni_modal("Manage Tenant Details","manage_tenant.php?id="+$(this).attr('data-id'),"mid-large")
		
	})
	$('.delete_tenant').click(function(){
		_conf("Is the issue solved?","delete_tenant",[$(this).attr('data-id')])
	})
	
	function delete_tenant($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=solved',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Issue successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script