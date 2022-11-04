<?php if(isset($_SESSION['email'])): ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact</title>
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
    <link rel="stylesheet" type="text/css" href="./public/css/contact/util.css">
    <link rel="stylesheet" type="text/css" href="./public/css/contact/main.css">
    <!--===============================================================================================-->
</head>
<body>
	<div class="bg-contact100">
		<div class="container-contact100">
			<div class="wrap-contact100">
                <div class="return-home"><a href="?url=home"><i class="fal fa-angle-left"></i> Quay về trang chủ</a></div>
				<div class="contact100-pic js-tilt" data-tilt>
					<img src="./public/images/contact.png" alt="IMG">
				</div>

				<form class="contact100-form validate-form" action="?url=contact" method="POST">
					<span class="contact100-form-title">
						Liên hệ với chúng tôi
					</span>
					<input type="hidden" name="id" value="<?= $_SESSION['id'] ?>" />
					<div class="wrap-input100 validate-input" data-validate = "Name is required">
						<input class="input100" type="text" name="name" value='<?= $_SESSION['fullname'] ?>' readonly>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" value='<?= $_SESSION['email'] ?>' readonly>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Title is required">
						<input class="input100" type="text" name="title" placeholder="Tiêu đề">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Message is required">
						<textarea class="input100" name="message" placeholder="     Nội dung"></textarea>
						<span class="focus-input100"></span>
					</div>

					<div class="container-contact100-form-btn">
						<button class="contact100-form-btn" type="submit" name="submit">
							Gửi
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>




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

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
<?php else: ?>
    <script>
        alert('Vui lòng đăng nhập');
        window.location.href = '?url=login';
    </script>
<?php endif; ?>
