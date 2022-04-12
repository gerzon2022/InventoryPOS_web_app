<?php include('db_connect.php');?>

<style>
   
</style>

<h3 style="font-family:Times New Roman, Times, serif;">Supplier</h3>

<button type="button" class="btn btn-primary btn-sm" id="new_supplier">
  <i class="fa fa-plus"></i> New Supplier
</button><br><br>
		<div class="row">
			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Supplier Name</th>
									<th class="text-center">Contact</th>
									<th class="text-center">Address</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$cats = $conn->query("SELECT * FROM supplier_list order by id asc");
								while($row=$cats->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="text-center"><?php echo $row['supplier_name'] ?></td>
									<td class="text-center"><?php echo $row['contact'] ?></td>
									<td class="text-center"><?php echo $row['address'] ?></td>
									<td class="text-center">
										<a class="btn btn-sm edit_supplier btn-primary" type="button" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Edit</a>
										<button class="btn btn-sm btn-danger delete_supplier" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
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
	$('#new_supplier').click(function(){
		// location.href = "index.php?page=include/edit_customer"
		uni_modal('New Customer','edit_supplier.php')
	})

	$('.edit_supplier').click(function(){
	uni_modal('Edit Supplier','edit_supplier.php?id='+$(this).attr('data-id'))
	})

	$('.delete_supplier').click(function(){
		_conf("Are you sure to delete this supplier?","delete_supplier",[$(this).attr('data-id')])
	})
	function delete_supplier($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_supplier',
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