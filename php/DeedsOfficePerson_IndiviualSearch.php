<?php

require('db.php');

  session_start();


  $email = $_SESSION['email'];


  $sql="SELECT * FROM users WHERE email='$email'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);


$url="https://uatrest.searchworks.co.za/deedsoffice/person/";

//,m Sequestration
//==============
//boolean value
//
//default value = false

//DeedsOffice
//===========
//(Bloemfontein = 1
//CapeTown = 2
//Johannesburg = 3
//Kimberley = 4
//KingWilliamsTown = 5
//Pietermaritzburg = 6
//Pretoria = 7
//Vryburg = 8
//Umtata = 9
//Mpumalanga = 11
//Limpopo = 12)


$ref = $row['email'];
$token = $row['token'];
$DeedsOffice = $_SESSION['DeedsOffice'];
$Surname = $_SESSION['Surname'];
$Firstname = $_SESSION['Firstname'];
$IDNumber = $_SESSION['IDNumber'];
$Sequestration = $_SESSION['Sequestration'];




$data=array('SessionToken'=> $token, 
            'Reference'=> $ref, 
            'DeedsOffice'=> $DeedsOffice,
            'Surname'=> $Surname,
			'Firstname'=> $Firstname,
			'IDNumber'=> $IDNumber,
			'Sequestration'=> $Sequestration);
			

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
