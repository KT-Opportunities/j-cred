<?php
ob_start();
session_start();
require('db.php');

  // session_start();


  $email = $_SESSION['email'];


  $sql="SELECT * FROM users WHERE email='$email'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);


$url="https://uatrest.searchworks.co.za/cipc/company/";

// Cipc Search by
//=================
// (1 - Exact Match
// 2 - Contains
// 3 - Starts With
// 4 - By Registration Number)

$ref = $row['email'];
$token = $row['token'];
$CipcSearchBy = $_SESSION['CipcSearchBy'];
$CompanyName = $_SESSION['CompanyName'];
$regNum = $_SESSION['RegistrationNumber'];


$data=array('SessionToken'=> $token, 
            'CipcSearchBy'=> $CipcSearchBy, 
            'Reference'=> $ref, 
            'CompanyName'=> $CompanyName, 
            'RegistrationNumber'=> $regNum);

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
