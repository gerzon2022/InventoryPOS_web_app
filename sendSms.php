<?php include 'db_connect.php';

       $sql='SELECT inventory.qty,inventory.product_id,product_list.description from inventory, product_list where inventory.product_id = product_list.id';

		$result = $conn->query($sql);

		$row = $result->fetch_assoc();

		$item_name= $row['description'];

		$available_qty = $row['qty'];

		$query5="Select * from users where type =1 ";

		$result1 = $conn->query($query5);

		$row1 = $result1->fetch_assoc();

		$number = $row1['contact'];

		$message = "";

		$lowStocks = [];

		$outStocks = [];

		$msgArr = [];

		$sqlLow = 'SELECT inventory.qty,inventory.product_id,product_list.description,product_list.name from inventory, product_list where inventory.product_id = product_list.id and inventory.qty <= 30 and inventory.qty !=0 GROUP by product_list.id';

		$sqlOut = 'SELECT inventory.qty,inventory.product_id,product_list.description,product_list.name from inventory, product_list where inventory.product_id = product_list.id and inventory.qty <=0 GROUP by product_list.id';

		

		$resultLow = $conn->query($sqlLow);

		$resultOut = $conn->query($sqlOut);

		

		while($rowLow=$resultLow->fetch_assoc()){

		  //  echo json_encode($rowLow);

		    $lowStocks[] = $rowLow['name'];

		}

        if($resultOut->num_rows>0)

        {

		while($rowOut=$resultOut->fetch_assoc()){

		  //  echo json_encode($rowOut);

		    $outStocks[] = $rowOut['name'];

		}

		

		$msg1 = ucwords(implode(',',$outStocks)) . " has no inventory stock.";

		$msg2 = str_split($msg1,90);

		foreach($msg2 as $arr )

        {

            itexmo($number,$message,$arr);

        }

        }

		else

		{

		    $msg2 = "No out of stock product";

		}



		$message = ucwords(implode(',',$lowStocks)) . " has low inventory stock.";

		$msgArr = str_split($message,90);

        

        foreach($msgArr as $arr )

        {

            itexmo($number,$message,$arr);

        }

        

         

       

		function itexmo($number,$message,$lowStocks){

			$apicode = "TR-DEZIB312988_BTNH5";

			$passwd = "p3nkh5e3lt";

			$url = 'https://www.itexmo.com/php_api/api.php';

			$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);

			$param = array(

				'http' => array(

					'header'  => "Content-type: application/x-www-form-urlencoded\r\n",

					'method'  => 'POST',

					'content' => http_build_query($itexmo),

				),

			);

			$context  = stream_context_create($param);

			return file_get_contents($url, false, $context);

	}



?>
