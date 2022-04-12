<?php 
include('db_connect.php');
if(isset($_GET['id'])){
$user = $conn->query("SELECT * FROM customer_list where id =".$_GET['id']);
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>
<div class="container-fluid">
	<form action="" id="manage-customer" >
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<div class="form-group">
			<label class="control-label">Customer Name</label>
			<input type="text" class="form-control" id="name" name="name"  value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
		</div>
		<div class="form-group">
			<label class="control-label">Contact</label>
			<input type="number" class="form-control" id="contact" name="contact" value="<?php echo isset($meta['contact']) ? $meta['contact']: '' ?>" required>
		</div>
		<div class="form-group">
			<label class="control-label">Address</label>
			<input type="text" class="form-control" cols="30" rows="3" id="address" name="address" value="<?php echo isset($meta['address']) ? $meta['address']: '' ?>" required>
		</div>
    </form>
</div>
<script>
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