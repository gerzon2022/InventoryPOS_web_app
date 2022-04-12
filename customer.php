<?php 
include('db_connect.php');
?>
<style>
   
</style>

<h3 style="font-family:Times New Roman, Times, serif;">Customers</h3>

<button type="button" class="btn btn-primary btn-sm" id="new_customer">
  <i class="fa fa-plus"></i> New Customers
</button><br><br>

		<div class="row">

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">No.</th>
									<th class="text-center">Customer Name</th>
									<th class="text-center">Contact No.</th>
									<th class="text-center">Address</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$customer = $conn->query("SELECT * FROM customer_list order by id asc");
								while($row=$customer->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="text-center"><?php echo $row['name'] ?></td>
									<td class="text-center"><?php echo $row['contact'] ?></td>
									<td class="text-center"><?php echo $row['address'] ?></td>
									<td class="text-center">
										<a class="btn btn-sm edit_customer btn-primary" type="button" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Edit</a>
										<button class="btn btn-sm btn-danger delete_customer" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin:unset;
	}
</style>
<script>
	$('table').dataTable()
	$('#new_customer').click(function(){
		// location.href = "index.php?page=include/edit_customer"
		uni_modal('New Customer','edit_customer.php')
	})
	$('.edit_customer').click(function(){
	uni_modal('Edit Customer','edit_customer.php?id='+$(this).attr('data-id'))
	})
	$('.delete_customer').click(function(){
		_conf("Are you sure to delete this customer?","delete_customer",[$(this).attr('data-id')])
	})
	function delete_customer($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_customer',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>