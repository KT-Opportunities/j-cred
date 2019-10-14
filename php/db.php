<?php
$servername = 'localhost';
$username = 'id10151380_jcred';
$password = 'jcred123';
$dbname = 'id10151380_jcred';

// $servername = 'localhost:3306';
// $username = 'binarjlg_jcred';
// $password = '7Iq%-Q7G@$qN';
// $dbname = 'binarjlg_admin';
//create connection to DB
$conn = new mysqli($servername,$username,$password,$dbname);
      // Check connection
		// if ($conn->connect_error) 
		// {
		// 	die("Failed To connect to database " . $conn->connect_error);
		// }
		// else
		// {
		// 	echo "Connection successfull";
		// }
?>