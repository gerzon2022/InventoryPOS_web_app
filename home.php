<style>
   
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<h3 style="font-family:Times New Roman, Times, serif;">Dashboard</h3>
	<div class="row">
		 <div class="col-sm-3">
				<div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
				<div class="card-header">
					Total Sales Today &emsp;&emsp;&emsp;&emsp;<i class="fa fa-money-bill-alt" ></i>
				</div>
				<div class="card-body">
					<p class="text-right"><b>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php 
					include 'db_connect.php';
					$sales = $conn->query("SELECT SUM(total_amount) as amount FROM sales_list where date(date_updated)= '".date('Y-m-d')."'");
					echo $sales->num_rows > 0 ? number_format($sales->fetch_array()['amount'],2) : "0.00";

					 ?></b></p>	
			</div>
		</div>
		</div>
		 <div class="col-sm-3">

			<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
				<div class="card-header">
					Users &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<i class="fa fa-user-circle" ></i>
				</div>
				<div class="card-body">
					<p class="text-right"><b>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php 
					include 'db_connect.php';
					$sql = "SELECT * FROM users";
					$query = $conn->query($sql);
                echo "".$query->num_rows."";
				

					 ?></b></p>
					
				</div>
			</div>
			</div>
			<div class="col-sm-3">
			<div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
				<div class="card-header">
					Categories &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<i class="fa fa-tasks text-left "></i>
				</div>
				<div class="card-body">
					<p class="text-right"><b><?php 
					include 'db_connect.php';
					$sql = "SELECT * FROM category_list";
					$query = $conn->query($sql);
                echo "".$query->num_rows."";
					 ?></b></p>
					
				</div>
			</div>
			</div>
					 <div class="col-sm-3">

			<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
				<div class="card-header">
					Customers &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <i class="fa fa-user-circle" ></i>
				</div>
				<div class="card-body">
				<?php 
				//echo '<script type="text/javascript">';
				//echo "Welcome back ".$_SESSION['login_name']."!"  
				//echo '</script>';
				//function_alert("Welcome back ".$_SESSION['login_name']."!");
				//function function_alert($msg) {
    			//echo "<script type='text/javascript'>alert('$msg');</script>";
				//}
				?>
				<p class="text-right"><b>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php 
					include 'db_connect.php';
					$sql = "SELECT * FROM customer_list";
					$query = $conn->query($sql);
                echo "".$query->num_rows."";
				

					 ?></b></p>
					
				</div>
			</div>
			</div>

			<div id="chartContainer" style="height: 300px; width: 98%;"></div>
	 <div class="col-sm-9">
        <div class="box">
            <div class="box-header" style="background-color:/*#33c9dd*/#333;">
              <h3 class="box-title" id="earningsTitle"></h3>
            </div>
        </div>
       
            <!--<div style="width: 500px;">-->
            <!--  <canvas id="myChart"></canvas>-->
            <!--</div>-->
     </div>
		</div>
	
<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($month) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'My First Dataset',
      data: <?php echo json_encode($amount) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Monthy Sales"
	},
	axisY: {
		// title: "Reserves(MMbbl)"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "Sales = Monthy",
		dataPoints: [      
			{ y: 300878, label: "January" },
			{ y: 266455,  label: "February" },
			{ y: 169709,  label: "March" },
			{ y: 158400,  label: "April" },
			{ y: 142503,  label: "May" },
			{ y: 101500, label: "June" },
			{ y: 97800,  label: "July" },
			{ y: 80000,  label: "August" }
			// { y: 80000,  label: "September" }
			// { y: 80000,  label: "October" }
			// { y: 80000,  label: "November" }
			// { y: 80000,  label: "December" }
		]
	}]
});
chart.render();

}
'use strict';

</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

