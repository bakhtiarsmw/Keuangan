<?php 
session_start();
if(@$_SESSION['username']==''){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title id="titlePage">Keuangan Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="assets/images/logo-money.png"/>
	<link rel="stylesheet" type="text/css" href="dist/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="dist/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="dist/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="dist/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="dist/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="dist/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="dist/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="dist/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="dist/css/util.css">
	<link rel="stylesheet" type="text/css" href="dist/css/main.css">
  <link href="dist/css/style.min.css" rel="stylesheet">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(dist/images/bg-02.jpeg);">
					<span class="login100-form-title-1">
						Login Administrator
					</span>
				</div>

				<form class="login100-form validate-form" action="" id="form_login" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Masukan username" id="usernameTxt">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Masukan password" id="passwordTxt">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							
						</div>

						<div>
							<a href="#" class="txt1">
								Silahkan mengisi dengan benar untuk masuk.
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="btn_login">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<script src="dist/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="dist/vendor/animsition/js/animsition.min.js"></script>
	<script src="dist/vendor/bootstrap/js/popper.js"></script>
	<script src="dist/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="dist/vendor/select2/select2.min.js"></script>
	<script src="dist/vendor/daterangepicker/moment.min.js"></script>
	<script src="dist/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="dist/vendor/countdowntime/countdowntime.js"></script>
  <script src="dist/js/main.js"></script>
  <script src="assets/libs/hullabaloo.min.js"></script>

	<script type="text/javascript">
    var hulla = new hullabaloo();
    
		$(document).ready(function() {
      
      $('#form_login').on('submit',function(e) {  
        
        var usernameText=$("#usernameTxt").val();
        var passwordText=$("#passwordTxt").val();
        if (usernameText==''){
          e.preventDefault();
        }else if(passwordText==''){
          e.preventDefault();
        }else{
          $.ajax({
            url:"_inc_ajax/login.php",
            data:$(this).serialize(),
            type:'POST',
            success:function(data){
                if(data == 'failed_login'){
                  hulla.send('Login Gagal!', 'danger');
                  $("#btn_login").html('Login');

                }else if(data == 'pass_failed'){
                  hulla.send('Maaf Password Salah!', 'danger');
                  $("#btn_login").html('Login');

                }
                else if(data == 'username_failed'){
                  hulla.send('Maaf Username Salah!', 'danger');
                  $("#btn_login").html('Login');

                }else if(data == 'success'){
                  $("#btn_login").html('Redirecting...');
                  hulla.send('Login Sukses....', 'success');
                  document.title ='Redirecting....';
                  setTimeout(function(){ window.location.href='dashboard.php'; }, 2000);
                  
                }else{
                  hulla.send('Login Gagal!', 'danger');
                }
            }
          });
        }        
        e.preventDefault();
      });
    });

	</script>

</body>
</html>
<?php
}else{
    echo "<script>window.location='dashboard.php'; </script>";
} ?>