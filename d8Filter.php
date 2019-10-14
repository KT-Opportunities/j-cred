<?php

ob_start();
session_start();
require('php/db.php');
$return ="";
$cu_email = $email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$cu_id = $row['id'];
$cu_type = $row['Type'];
$cu_org = $row['Org'];



if(isset($_POST['data'])){
    $data = $_POST['data'];
if($cu_type == 'Super-Super-Admin'){
    $sql =  "SELECT * FROM logs,users WHERE logs.Date = '$data'AND users.id=logs.user_ID";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $return .= "<tr>
                        <td>".$row['ID']."</td>
                        <td>".$row['Date']."</td>
                        <td>".$row['Time']."</td>
                        <td>".$row['Page']."</td>
                        <td>".$row['Action']."</td>
                        <td>".$row['user_ID']."</td>
                        <td>".$row['Fullname']."</td>
                        </tr>";
        
        }}else{
        echo "<tr><td></td><td>No results found</td><td></td></tr>";
    }
    $d8 = date('Y-m-d');
    $time = date('H:i:s');
    $action = "Searched : For logs by Date=$data";
    $logs = "INSERT INTO logs (Date,Time,Page,Action,user_ID,User) VALUES"."('$d8','$time','Logs','$action','$cu_id','$cu_email')";
    $result1 = mysqli_query($conn,$logs);
                    if($result1){
    $return = json_encode($return);
    echo $return;}
}
else  if($cu_type == 'Super-Admin'){
    $sql =  "SELECT * FROM logs,users WHERE Date = '$data' AND users.id=logs.user_ID AND users.Org=$cu_org AND users.Type != 'Super-Super-Admin'";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $return .= "<tr>
                        <td>".$row['ID']."</td>
                        <td>".$row['Date']."</td>
                        <td>".$row['Time']."</td>
                        <td>".$row['Page']."</td>
                        <td>".$row['Action']."</td>
                        <td>".$row['user_ID']."</td>
                        <td>".$row['Fullname']."</td>
                        </tr>";
        
        }}else{
        echo "<tr><td></td><td>No results found</td><td></td></tr>";
    }
    $d8 = date('Y-m-d');
    $time = date('H:i:s');
    $action = "Searched : For logs by Date=$data";
    $logs = "INSERT INTO logs (Date,Time,Page,Action,user_ID,User) VALUES"."('$d8','$time','Logs','$action','$cu_id','$cu_email')";
    $result1 = mysqli_query($conn,$logs);
                    if($result1){
    $return = json_encode($return);
    echo $return;}
}
else if($cu_type == 'Admin'){
    $sql =  "SELECT * FROM logs,users WHERE Date = '$data' AND users.id=logs.user_ID AND users.Org=$cu_org AND users.Type != 'Super-Super-Admin' AND users.Type != 'Super-Admin'";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $return .= "<tr>
                        <td>".$row['ID']."</td>
                        <td>".$row['Date']."</td>
                        <td>".$row['Time']."</td>
                        <td>".$row['Page']."</td>
                        <td>".$row['Action']."</td>
                        <td>".$row['user_ID']."</td>
                        <td>".$row['Fullname']."</td>
                        </tr>";
        
        }}else{
        echo "<tr><td></td><td>No results found</td><td></td></tr>";
    }
    $d8 = date('Y-m-d');
    $time = date('H:i:s');
    $action = "Searched : For logs by Date=$data";
    $logs = "INSERT INTO logs (Date,Time,Page,Action,user_ID,User) VALUES"."('$d8','$time','Logs','$action','$cu_id','$cu_email')";
    $result1 = mysqli_query($conn,$logs);
                    if($result1){
    $return = json_encode($return);
    echo $return;}
    
}
else{
   $sql =  "SELECT * FROM logs,users WHERE Date = '$data' AND users.id=$cu_id  AND logs.user_ID =$cu_id  AND users.Org=$cu_org AND users.Type NOT LIKE '%Admin'"; 
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $return .= "<tr>
                        <td>".$row['ID']."</td>
                        <td>".$row['Date']."</td>
                        <td>".$row['Time']."</td>
                        <td>".$row['Page']."</td>
                        <td>".$row['Action']."</td>
                        <td>".$row['user_ID']."</td>
                        <td>".$row['Fullname']."</td>
                        </tr>";
        
        }}else{
        echo "<tr><td></td><td>No results found</td><td></td></tr>";
    }
    $d8 = date('Y-m-d');
    $time = date('H:i:s');
    $action = "Searched : For logs by Date=$data";
    $logs = "INSERT INTO logs (Date,Time,Page,Action,user_ID,User) VALUES"."('$d8','$time','Logs','$action','$cu_id','$cu_email')";
    $result1 = mysqli_query($conn,$logs);
                    if($result1){
    $return = json_encode($return);
    echo $return;}
}
    
}
