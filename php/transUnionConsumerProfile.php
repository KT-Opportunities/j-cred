<?php

require('db.php');

  session_start();


  $email = $_SESSION['email'];


  $sql="SELECT * FROM users WHERE email='$email'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);


$url="https://uatrest.searchworks.co.za/credit/transunion/consumerprofile/";

//Enquiry Reason
//==============
// (Fraud, Corruption, or Theft Investigation
// Fraud Detection and Fraud Prevention
// Setting limit for Goods / Utility / Service
// Unclaimed Funds Distribution)



$ref = $row['email'];
$token = $row['token'];
$ContactName = $_SESSION['ContactName'];
$ContactNumber = $_SESSION['ContactNumber'];
$EnquiryReason = $_SESSION['EnquiryReason'];
$IDNumber = $_SESSION['IDNumber'];
$FirstName = $_SESSION['FirstName'];
$Surname = $_SESSION['Surname'];
$PassportNumber = $_SESSION['passportNumber1'];
$DateOfBirth = $_SESSION['DateOfBirth'];


$data=array('SessionToken'=> $token, 
            'Reference'=> $ref, 
            'ContactName'=> $ContactName, 
            'ContactNumber'=> $ContactNumber,
            'EnquiryReason'=> $EnquiryReason,
            'IDNumber'=> $IDNumber,
            'FirstName'=> $FirstName,
            'Surname'=> $Surname,
            'PassportNumber'=> $PassportNumber,
            'DateOfBirth'=> $DateOfBirth);

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
