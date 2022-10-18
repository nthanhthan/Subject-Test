<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="./public/images/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./public/css/bootstrap.css">
<!--===============================================================================================-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./public/css/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="./public/css/hamburgers.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./public/css/select2.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./public/css/util.css">
	<link rel="stylesheet" type="text/css" href="./public/css/main.css">
<!--===============================================================================================-->
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-12">
                
            </div>
        </div>
    </div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="./public/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="?url=login">
					<span class="login100-form-title">
						Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit" type="submit">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>



<!--Xóa message nếu load lại trang-->


<!-- 
    // Xóa message sau 3 phút -->



<!--===============================================================================================-->
    <script type="text/javascript" src="./public/js/jquery-3.6.0.min.js"></script>
<!--===============================================================================================-->
	<script src="./public/js/popper.js"></script>
    <script type="text/javascript" src="./public/js/bootstrap.js"></script>
<!--===============================================================================================-->
	<script src="./public/js/select2.js"></script>
<!--===============================================================================================-->
	<script src="./public/js/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="./public/js/main.js"></script>

</body>
</html>