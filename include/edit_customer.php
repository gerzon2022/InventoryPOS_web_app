<?php 

?>

<div class="container-fluid">
<!-- 	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4>Edit Customer</h4>
			</div>
					<div class="card-body">
						<form action="" id="manage-customer">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Customer Name</label>
								<input type="text" class="form-control" name="name">
							</div>
							<div class="form-group">
								<label class="control-label">Contact</label>
								<input type="text" class="form-control" name="contact">
							</div>
							<div class="form-group">
								<label class="control-label">Address</label>
								<textarea class="form-control" cols="30" rows="3" name="address"></textarea>
							</div>
							
     						  <button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>	
     					</form>

					</div>
				</div>
			</div> -->

			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="manage-customer">
				<div class="card">
					
					<div class="card-body">
							<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
							<div class="form-group">
								<label class="control-label">Customer Name</label>
								<input type="text" class="form-control" id="name" name="name" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
							</div>
							<div class="form-group">
								<label class="control-label">Contact</label>
								<input type="text" class="form-control" name="contact">
							</div>
							<div class="form-group">
								<label class="control-label">Address</label>
								<textarea class="form-control" cols="30" rows="3" name="address"></textarea>
							</div>
							
					</div>
							
					
				</div>


      <div class="modal-footer">
       <button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#manage-customer').get(0).reset()"> Cancel</button>
       <button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
      </div>
      </form>
    </div>
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
	$('#manage-customer').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_customer',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})

</script>