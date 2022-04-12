
<style>
</style>
<style href="public/ext/datetimepicker/bootstrap-datepicker.min.css" rel="stylesheet"></style>
<nav id="sidebar" class='mx-lt-5'>
		
		<div class="sidebar-list">
			<center><img src="assets/img/jimar.png" style="width: 150px; height: 150px; border-radius: 50%; "/></center>
				<!-- <h3><?php echo $_SESSION['login_name'] ?></h1> -->
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>

				<a href="index.php?page=inventory" class="nav-item nav-inventory"><span class='icon-field'><i class="fa fa-list"></i></span> Inventory</a>

				<a href="index.php?page=sales" class="nav-item nav-sales"><span class='icon-field'><i class="fa fa-coins"></i></span> Transaction</a>

				<a href="index.php?page=receiving" class="nav-item nav-receiving nav-manage_receiving"><span class='icon-field'><i class="fa fa-file-alt"></i></span> Receive Products</a>

				<!-- <a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-list"></i></span> Category </a> -->

				<!-- <a href="index.php?page=product" class="nav-item nav-product"><span class='icon-field'><i class="fa fa-boxes"></i></span> Product </a> -->

				<a href="index.php?page=supplier" class="nav-item nav-supplier"><span class='icon-field'><i class="fa fa-truck-loading"></i></span> Supplier</a>

				<a href="index.php?page=customer" class="nav-item nav-customer"><span class='icon-field'><i class="fa fa-user-friends"></i></span> Customer</a>

				<a href="#config" class="nav-item nav-settings" data-toggle="modal"><i class="fa fa-cog"></i> <span>Settings</span></a>

				<a href="ajax.php?action=logout" class="nav-item nav-logout"><span class='icon-field'><i class="fa fa-power-off"></i></span> Logout</a>

				
				
				<?php if($_SESSION['login_type'] == 1): ?>
				
			
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
<!-- <script src="public/js/transactions.js"></script>
<script src="public/ext/datetimepicker/bootstrap-datepicker.min.js"></script>
<script src="public/ext/datetimepicker/jquery.timepicker.min.js"></script>
<script src="public/ext/datetimepicker/datepair.min.js"></script>
<script src="public/ext/datetimepicker/jquery.datepair.min.js"></script> -->

<?php if($_SESSION['login_type'] != 1): ?>
	<style>
		.nav-item{
			display: none!important;
		}
		.nav-sales ,.nav-home ,.nav-inventory ,.nav-logout ,.nav-customer{
			display: block!important;
		}
	</style>
<?php endif ?>
<?php include 'config_modal.php'; ?>