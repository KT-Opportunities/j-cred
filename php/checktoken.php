<?php
ob_start();
// session_start();
require('db.php');

  


  $email = $_SESSION['email'];

// echo $email;

  $sql="SELECT * FROM users WHERE email='$email'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);



$url="https://uatrest.searchworks.co.za/auth/validatetoken/";

$token = $row['token'];

// $token2 = $_SESSION['token'];

// echo $token;

// $token = $result;

$data=array("SessionToken" => $token);

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