<?php
ob_start();
session_start();
require('php/db.php');
?>
<?php
            if(isset($_POST['login'])){
                $password=$_POST['password'];
                $username=$_POST['username'];
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
                           header('Location:landing.php?id='.$username); // pass the user to the index page       
                               
                      }
                      else{
                            header('Location: index.php'); //reload the index page
                      }
                }//end of if
            }//end of isset
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>J-Cred</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
   <link rel="icon" type="image/png" href="css/L_assets/images/j-Cred_ico.png">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/L_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/L_assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/L_assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="css/L_assets/css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/assets/css/fpwdmodal.css">

</head>
<body style="background-color: #666666;">	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 login">
				<form class="login100-form validate-form" method="post" role="form" enctype="multipart/form-data" >
                   <div id="logo_p"> 
                    <img id="logo_i" src="images/jcred_logo.png" alt="logo">
                   
					</div> 
                    <span class="login100-form-title p-b-43">
						Login to continue
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<input type=text name="token" id="token" hidden>
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<!-- <div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="rememberme">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div> -->
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>
						<br>
					<a class="login100-form-title p-b-43" onclick="Modal.open('#modal02')"><h6>Forgot Password</h6></a>


<!-- MODALS -->
				</form>

				<div class="login100-more" style="background-image: url('images/side_img.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="overlay" id="modal02" data-backdrop>
  <button class="button" data-type="icon" onclick="Modal.close(event)" data-modal-close><svg class="icon icon-clear" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg></button>
  <form class="modal" method="post" >
    <header class="modal--header">
      <h3 class="modal--title">Forget password</h3>
    </header>
    <div class="modal--content">
      <p>
        <label class="btnemail" for="email">Email</label><br>
        <input id="fp-input" type="email" name="emailP">
      </p>
    </div>
    <footer class="modal--footer">
      <button type="submit" name="sendmail">Submit</button>
    </footer>
  </form>
</div>

<?php
 if(isset($_POST['sendmail'])){
                
	$emailP=$_POST['emailP'];
	

//	is_numeric($item['quantity'])



	$sqlP="SELECT * FROM users WHERE email='$emailP'";
	$resultP=mysqli_query($conn,$sqlP);
	$rowP=mysqli_fetch_array($resultP);

				if($emailP == ""){
		 
			 
				}elseif ($emailP == $rowP['email']) {
						$mail = new PHPMailer;

						// $mail->SMTPDebug = 4;                               // Enable verbose debug output
			
						$mail->isSMTP();                                      // Set mailer to use SMTP
						$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
						$mail->SMTPAuth = true;                               // Enable SMTP authentication
						$mail->Username = EMAIL;                 // SMTP username
						$mail->Password = PASS;                           // SMTP password
						$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
						$mail->Port = 587;                                    // TCP port to connect to
			
						$mail->setFrom(EMAIL, 'PEOSA');
						$mail->addAddress($_POST['emailP']);     // Add a recipient
										 // Name is optional
						// $mail->addReplyTo('info@example.com', 'Information');
						// $mail->addCC('cc@example.com');
						// $mail->addBCC('bcc@example.com');
			
						// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
						// $mail->addAttachment('/tmp/imag e.jpg', 'new.jpg');    // Optional name
						$mail->isHTML(true);                                  // Set email format to HTML
			
						$mail->Subject = "Password Recovery";
						$mail->Body    = "<a href='localhost/main/dash-J_Cred/recoverypwd.php?id=" . $emailP . "'>
																	<p>Link</p>
															 </a>";
						 
					
			
								if(!$mail->send()) {
										echo 'Message could not be sent.';
										echo 'Mailer Error: ' . $mail->ErrorInfo;
							} else {
										echo 'Message has been sent';
							}
					}
}
		
?>

	
	
<!--===============================================================================================-->
	<script src="css/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="css/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="css/vendor/bootstrap/js/popper.js"></script>
	<script src="css/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="css/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="css/vendor/daterangepicker/moment.min.js"></script>
	<script src="css/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="css/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="css/L_assets/js/main.js"></script>
	<script src="css/assets/js/fpwdmodal.js"></script>

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