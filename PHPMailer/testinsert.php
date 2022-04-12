<?php 
$connect = mysqli_connect('localhost','user','midorima','gwash');
if(!$connect){
    echo "error".mysqli_connect_error();
    exit();
    
}
 use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
       
       $mail->Mailer = "smtp";
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "clintonabesal@gmail.com"; //enter you email address
        $mail->Password = 'VEXANNA123'; //enter you email password

  $mail->SMTPDebug  = 0; 
  $mail->SMTPAuth   = TRUE;
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";
date_default_timezone_set('Asia/Manila');
$day=date('Y,m,d h:i:s');
$sensordat=$_POST['ID'];
$data;
echo $sensordat;
function itexmo($number,$message,$apicode,$passwd){
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

if($sensordat==!""){
if($sensordat>74){
    $data=0;
    $data2=100;
}
else if(($sensordat<=74)&&($sensordat>66)){
    $data=10;
    $data2=90;
}
else if(($sensordat<=66)&&($sensordat>58)){
    $data=20;
$data2=80;
}
else if(($sensordat<=58)&&($sensordat>50)){
    $data=30;
$data2=70;
}
else if(($sensordat<=50)&&($sensordat>42)){
    $data=40;
$data2=60;
}
else if(($sensordat<=42)&&($sensordat>34)){
    $data=50;
$data2=50;
}
else if(($sensordat<=34)&&($sensordat>26)){
    $data=60;
$data2=40;
}
else if(($sensordat<=26)&&($sensordat>18)){
    $data=70;
$data2=30;
}
else if(($sensordat<=18)&&($sensordat>10)){
    $data=80;
$data2=20;
}
else if(($sensordat<=10)&&($sensordat>6)){
    $data=90;
$data2=10;
}
else if(($sensordat<=6)){
    $data=100;
$data2=0;
}
else {
echo "no data";}
}
else{

    echo "no data";
}

$query="UPDATE water set remaining='$data',used='$data2' WHERE id=1 ";
if ($connect->query($query) === TRUE) {
    $action="The remaining water in Tank is:".$data."%";
$query2 = "INSERT into History (action_perf,time_perf) VALUES ('$action','$day')";
if ($connect->query($query2) === TRUE) {
$show = true;
     
} else {
    echo "Error: " . $query2. "<br>" . $connection->error;
}
}
$apicode="TR-GARYP563559_EK5ZQ";
		$passwd="$$}%t%)g9r";
if($data>20){
$sql="SELECT contact from user WHERE acctype='User' ";
$result = mysqli_query($connect,$sql);

$message="plant is watered";
		
      echo $message;
// output data of each row
 if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$contact=$row['contact'];
echo $contact;
 itexmo($contact,$message,$apicode,$passwd);
       }
   }
   $sql2="SELECT email from user ";
$result = mysqli_query($connect,$sql2);


        //Email Settings
        $mail->isHTML(true);

        $mail->SetFrom("clintonabesal@gmail.com", "G-wash");
        if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$email=$row['email'];
echo $email;
        $mail->addAddress($email); //enter you email address
       }
   }
        $mail->Subject = ("G-wash Notification");
        // $mail->Body = $body;
        // if(!$cancel)
        //     $mail->Body = file_get_contents('body.html');
        // else
        //     $mail->Body = file_get_contents('cancel.html');
        $content = "<h1>Plant is Watered.</h1>";

  $mail->MsgHTML($content); 
  if(!$mail->Send()) {
    echo "Error while sending Email.";
    var_dump($mail);
  } else {
    echo "Email sent successfully";
  }
    

}
if($data<=20){
$sql="SELECT contact from user WHERE acctype='User' ";
$result = mysqli_query($connect,$sql);

$message="Plant is Watered and Tank is getting low";
		
   echo $message;     
       
// output data of each row
 if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$contact=$row['contact'];
echo $contact;
 itexmo($contact,$message,$apicode,$passwd);
       }
   }

 
$sql2="SELECT email from user ";
$result = mysqli_query($connect,$sql2);


        //Email Settings
        $mail->isHTML(true);

        $mail->SetFrom("clintonabesal@gmail.com", "G-wash");
        if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$email=$row['email'];
echo $email;
        $mail->addAddress($email); //enter you email address
       }
   }
        $mail->Subject = ("G-wash Notification");
        // $mail->Body = $body;
        // if(!$cancel)
        //     $mail->Body = file_get_contents('body.html');
        // else
        //     $mail->Body = file_get_contents('cancel.html');
        $content = "<h1>Plant is watered and the Tank is getting Low please refill!!.</h1>";

  $mail->MsgHTML($content); 
  if(!$mail->Send()) {
    echo "Error while sending Email.";
    var_dump($mail);
  } else {
    echo "Email sent successfully";
  }
    

}
echo $data;
echo $data2;
?>