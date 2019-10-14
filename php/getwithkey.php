<?php
ob_start();
session_start();
$url="https://uatrest.searchworks.co.za/commtest/";

$text = $_SESSION['text'];

$test ="test";

//echo $text;

$data=array('testParam'=> $text);

$userN = 'uatapi@ktopportunities.co.za';
$passW = 'P@ssw0rd!';

$data_string=json_encode($data);
$ch=curl_init($url);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch,CURLOPT_USERNAME,$userN);
curl_setopt($ch,CURLOPT_PASSWORD, $passW);
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
//$result=json_encode($result, true);
print_r($result);



?>