<?php
require('db.php');
session_start();


  $email = $_SESSION['email'];


  $sql="SELECT * FROM users WHERE email='$email'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);


$url="https://uatrest.searchworks.co.za/credit/experian/consumerprofile/";

//Enquiry Reason
//==============
// (Credit Assessment
// SAPS or State Agency
// Employment Screening
// Account Limit Determination
// Application for Insurance
// Employment Verification
// Affordability Assessment
// Debt Review Applications)



$ref = $row['email'];
$token = $row['token'];
$EnquiryReason = $_SESSION['enquiryReason'];
$IDNumber = $_SESSION['idNumber'];
$FirstName = $_SESSION['firstName'];
$Surname = $_SESSION['surname'];
$PassportNumber = $_SESSION['passportNumber'];




$data=array('sessionToken'=> $token, 
            'reference'=> $ref, 
            'enquiryReason'=> $EnquiryReason,
            'iDNumber'=> $IDNumber,
            'firstName'=> $FirstName,
            'surname'=> $Surname,
            'passportNumber'=> $PassportNumber);


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
