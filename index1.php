<?php 
ob_start();
session_start();
  require('php/db.php');
?>
<?php
            if(isset($_POST['login'])){
                $password=$_POST['password'];
                $username=$_POST['email'];
                $sql="SELECT * FROM users WHERE email='$username'";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_array($result);
                if($_POST['email']===''&&$_POST['password']===''){
                   header('Location: index.php'); //reload the index page
                }
                else{
                     if($row['email']==$username&&$row['password']==$password){

                        
                        $email = $row['email'];
                        $_SESSION['email'] = $email;




                          $token = $_POST['token'];

                           $sql = "UPDATE users SET token='$token' WHERE email='$username'";
                           $result=mysqli_query($conn,$sql);
                           header('Location:landing.php?id='.$_POST['email']); // pass the user to the index page       
                               
                      }
                      else{
                            header('Location: index.php'); //reload the index page
                      }
                }//end of if
            }//end of isset
?>





<html>
<head>
<meta charset="UTF-8">
        <title> J.CRED | LogIn</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="css/index.css" rel="stylesheet" type="text/css" media="all"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="icon" type="image/ico" href="images/jcred_logo.png">
</head>
<body>

<!-- <h2>Modal Login Form</h2> -->
<img src="./images/jcred_logo.png" alt="Avatar" class="avatar">

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" method="post" action="" enctype="multipart/form-data">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="./images/jcred_logo.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="email"><b>Username</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
      <input type=text name="token" id="token" hidden>
      <button type="submit" name="login">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        $(document).ready(function() {

        });

</script>

<script>

$(document).ready(function(){
 var data1 
        $.ajax({
        type:"GET",
        url:"php/get.php",
        data:data1,
        dataType: "json",
        success:function(result){
         //document.getElementById("demo2").innerHTML = result.ResponseMessage;
         document.getElementById("token").value = result.ResponseMessage;
         console.log('token: ' + result.ResponseMessage);
        }
        });

   });

</script>




</body>
</html>
