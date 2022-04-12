<?php include('db_connect.php');?>
<style>
   
</style>

<h3 style="font-family:Times New Roman, Times, serif;">Category</h3>

<button type="button" class="btn btn-primary btn-sm" id="new_category">
  <i class="fa fa-plus"></i> New Category
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
									<th class="text-center">Name</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$cats = $conn->query("SELECT * FROM category_list order by id asc");
								while($row=$cats->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<?php echo $row['name'] ?>
									</td>
									<td class="text-center">
										<a class="btn btn-sm edit_category btn-primary" type="button" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Edit</a>
										<button class="btn btn-sm btn-danger delete_cat" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			</div>
			<!-- Table Panel -->
	
<style>
	
	td{
		vertical-align: middle !important;
	}
</style>
<script>
	$('table').dataTable()
	
	$('#new_category').click(function(){
		// location.href = "index.php?page=include/edit_customer"
		uni_modal('New Category','edit_category.php')
	})

	$('.edit_category').click(function(){
	uni_modal('Edit Category','edit_category.php?id='+$(this).attr('data-id'))
	})
	$('.delete_cat').click(function(){
		_conf("Are you sure to delete this category?","delete_cat",[$(this).attr('data-id')])
	})
	function delete_cat($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_category',
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