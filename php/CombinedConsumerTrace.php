<?php
ob_start();
session_start();
require('db.php');

  


  $email = $_SESSION['email'];


  $sql="SELECT * FROM users WHERE email='$email'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);


$url="https://uatrest.searchworks.co.za/credit/combinedreport/trace/";


$token = $row['token'];
$IdNu1 = $_SESSION['IDnum'];

$IdNu2 = "9303195109086";

$data=array('SessionToken'=> $token, 
            'Reference'=> $email, 
            'IDNumber'=> $IdNu1);

$data_string=json_encode($data);
$ch=curl_init($url);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch,CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
        'Content-type: application/json',
        'Content-Length: '.strlen($data_string)
    )
);

curl_setopt($ch,CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);
$result=curl_exec($ch);
curl_close($ch);
//$result=json_decode($result, true);

print_r($result);

?>
