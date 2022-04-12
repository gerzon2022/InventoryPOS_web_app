<?php include('db_connect.php');
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
<h3 style="font-family:Times New Roman, Times, serif;">Product</h3>
	<p style="font-family:Times New Roman, Times, serif;color: red">(always open product form when editing product)</p>
<div class="container-fluid">
<button  class='btn btn-primary btn-sm' id='showTransForm'>
  <i class="fa fa-plus"></i> New Product</button><br><br>
 <div class="row collapse" id="newTransDiv">
                <!---div to display transaction form--->
                <div class="col-sm-12" id="salesTransFormDiv">
			<form action="" id="manage-product">
				<div class="card">
					<div class="card-header">
						    Product Form
				  	</div>
				
					<div class="card-body">
						<div class="row">
						<div class="col-sm-3 form-group-sm">
								<input type="hidden" name="id">
								<label class="control-label">Serial Number</label>
								<input type="text" class="form-control" name="sku" id="sku" value="<?php echo $sku ?>" readonly>
							</div>
							</div>
							<div class="row">
						
							  <div class="col-sm-4 form-group-sm">
								<label class="control-label">Category</label>
								<select name="category_id" id="" class="custom-select browser-default">
								<?php 

								$cat = $conn->query("SELECT * FROM category_list order by name asc");
								while($row=$cat->fetch_assoc()):
									$cat_arr[$row['id']] = $row['name'];
								?>
									<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
								<?php endwhile; ?>
								</select>
							</div>
						  <div class="col-sm-5 form-group-sm">
							<label class="control-label">Product Name</label>
							<input type="text" class="form-control" name="name" >
						</div>
					</div>
					<div class="row">
						 <div class="col-sm-7 form-group-sm">
				<label class="control-label">Description</label>
				<input class="form-control" cols="30" rows="3" name="description" id="description"required>
			</div>

						 <div class="col-sm-4 form-group-sm">
							<label class="control-label">Product Price</label>
							<input type="number" step="any" class="form-control" name="price" >
						</div>		
					</div>
				</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<button class="btn btn-sm btn-primary"> Save</button>
								<button class="btn btn-sm btn-danger" type="button" onclick="$('#manage-product').get(0).reset()"> Clear</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
	<br>
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">No.</th>
									<th class="text-center">Product Name</th>
									<th class="text-center">Category</th> 
									<th class="text-center">Price</th>
								<!-- 	<th class="text-center">Quantity</th> -->
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;

								$prod = $conn->query("SELECT * FROM product_list order by id asc");
								while($row=$prod->fetch_assoc()):
									
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="text-center"><?php echo $row['name'] ?></td>
								 	<td class="text-center"><?php echo $cat_arr[$row['category_id']] ?></td>  
									<td class="text-center"><?php echo number_format($row['price'],2) ?></td>
								<!-- 	<td class="text-center"><?php echo $row['qty'] ?></td> -->
									<td class="text-center">
											<button class="btn btn-sm btn-primary edit_product" type="button" data-name="<?php echo $row['sku'] ?>" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['name'] ?>" data-sku="<?php echo $row['sku'] ?>" data-category_id="<?php echo $row['category_id'] ?>" data-description="<?php echo $row['description'] ?>" data-price="<?php echo $row['price'] ?>" >Edit</button>
										<button class="btn btn-sm btn-danger delete_product" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
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
		margin:unset;
	}
</style>
<script>
	$('table').dataTable()
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
	$('.edit_product').click(function(){
		start_load()
		var cat = $('#manage-product')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='sku']").val($(this).attr('data-id'))
		cat.find("[name='name']").val($(this).attr('data-name'))
		cat.find("[name='sku']").val($(this).attr('data-sku'))
		cat.find("[name='category_id']").val($(this).attr('data-category_id'))
		cat.find("[name='description']").val($(this).attr('data-description'))
		cat.find("[name='price']").val($(this).attr('data-price'))
		end_load()
	})
	$('.delete_product').click(function(){
		_conf("Are you sure to delete this product?","delete_product",[$(this).attr('data-id')])
	})
	function delete_product($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_product',
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
<script>
	    $("#showTransForm").click(function(){
        $("#newTransDiv").toggleClass('collapse');
        
        if($("#newTransDiv").hasClass('collapse')){
            $(this).html("<i class='fa fa-plus'></i> New Product");
        }
        
        else{
            $(this).html("<i class='fa fa-minus'></i> New Product");
            
            //remove error messages
            $("#itemCodeNotFoundMsg").html("");
        }
    });

	     $("#hideTransForm").click(function(){
        $("#newTransDiv").toggleClass('collapse');
        
        //remove error messages
        $("#itemCodeNotFoundMsg").html("");
        
        //change main "new transaction" button back to default
        $("#showTransForm").html("<i class='fa fa-plus'></i> New Transaction");
    });


</script>