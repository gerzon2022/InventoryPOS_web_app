<?php 
include('db_connect.php');
if(isset($_GET['id'])){
$user = $conn->query("SELECT * FROM product_list where id =".$_GET['id']);
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
$sku = mt_rand(1,99999999);
	$sku = sprintf("%'.08d\n", $sku);
	$i = 1;
	while($i == 1){
		$chk = $conn->query("SELECT * FROM product_list where sku ='$sku'")->num_rows;
		if($chk > 0){
			$sku = mt_rand(1,99999999);
			$sku = sprintf("%'.08d\n", $sku);
		}else{
			$i=0;
		}
	}
?>

<div class="container-fluid">
	<form action="" id="manage-product">
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
			<div class="form-group">
				<label class="control-label">Serial Number</label>
				 <?php
						 $sql = "SELECT * FROM `product_list` ORDER BY id DESC LIMIT 1";
						 $result = $conn->query($sql);
						 $row = $result->fetch_assoc();
						 $serial = $row['id'];
						?>
				<input type="text" class="form-control" name="sku" id="sku" value="<?php echo $serial + 0000001; ?>" readonly>
			</div>
							
			<div class="form-group">
				<label class="control-label">Category</label>
				<select name="category_id" id="" class="custom-select browser-default" required>
				<?php 
					$cat = $conn->query("SELECT * FROM category_list order by name asc");
					while($row=$cat->fetch_assoc()):
					$cat_arr[$row['id']] = $row['name'];
					?>
				<!-- <option value="" disabled selected>Select Category</option> -->
				<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
				<?php endwhile; ?>
				</select>
			</div>

			<div class="form-group">
				<label class="control-label">Supplier</label>
				<select name="supplier" id="" class="custom-select browser-default" required>
					<?php 
					$cat1 = $conn->query("SELECT * FROM supplier_list order by supplier_name asc");
					while($row=$cat1->fetch_assoc()):
					$cat_arr[$row['id']] = $row['supplier_name'];
					?>	
				<!-- <option value="" disabled selected>Select Supplier</option> -->
				<option value="<?php echo $row['id'] ?>"><?php echo $row['supplier_name'] ?></option>
					<?php endwhile; ?>
				</select>
			</div>

			<div class="form-group">
				<label class="control-label">Product Name</label>
				<input type="text" class="form-control" name="name" id="name" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
			</div>

			<div class="form-group">
				<label class="control-label">Description</label>
				<input class="form-control" cols="30" rows="3" name="description" id="description" value="<?php echo isset($meta['description']) ? $meta['description']: '' ?>"required>
			</div>

		<!-- 	<div class="form-group">
				<label class="control-label">Product Quantity</label>
				<input type="number" class="form-control" name="qty" id="qty" value="<?php echo isset($meta['qty']) ? $meta['qty']: '' ?>"required>
			</div> -->

			<div class="form-group">
				<label class="control-label">Product Price</label>
				<input type="number" step="any" class="form-control " name="price" id="price" value="<?php echo isset($meta['price']) ? $meta['price']: '' ?>"required>
			</div>			
	</form>
</div>
<script>
	$('#manage-product').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_product',
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