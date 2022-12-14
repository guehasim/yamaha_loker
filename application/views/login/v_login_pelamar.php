<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Website Pelamar Pekerjaan</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Validate Login & Register Forms Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta tag Keywords -->

	<!-- css files -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/login/css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="<?php echo base_url() ?>assets/login/css/font-awesome.min.css" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Magra:400,700&amp;subset=latin-ext" rel="stylesheet">
	<!-- //web-fonts -->
</head>

<body>
	<!-- title -->
	<h1>
		Website Pelamar Pekerjaan
	</h1>
	<!-- //title -->

<!-- content -->
	<div class="container-agille">
		<div class="formBox level-login">
			<div class="box boxShaddow"></div>
			<div class="box loginBox">
				<h3>Login Here</h3>
				<form class="form" action="<?php echo base_url(); ?>index/aksi_login" method="post">
					<div class="f_row-2">
						<input type="text" class="input-field" placeholder="Username" name="user" required>
					</div>
					<div class="f_row-2 last">
						<input type="password" name="pass" placeholder="Password" class="input-field" required>
					</div>
					<input class="submit-w3" type="submit" value="Login">
					<div class="f_link">
						<?php echo $this->session->flashdata('msg'); ?>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- //content -->	

		<!-- js files -->
	<!-- Jquery -->
	<script src="<?php echo base_url() ?>assets/login/js/jquery-2.2.3.min.js"></script>
	<!-- //Jquery -->
	<!-- input fields js -->
	<script src="<?php echo base_url() ?>assets/login/js/input-field.js"></script>
	<!-- //input fields js -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->
	<!-- //js files -->


</body>

</html>
