<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Website Pelamar Pekerjaan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Appraise Register Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs Sign up Web Templates, 
 Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design">
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!-- Custom Theme files -->
	<link href="<?php echo base_url() ?>assets/awal/css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/awal/css/style.css" rel='stylesheet' type='text/css' />
	<!--fonts-->
	<link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">

	<style type="text/css">
	.btnsudah{
		background-color: #189e1c;
	}
	.btnbelum{
		background-color: #dbd521;
	}
	</style>
	<!--//fonts-->
</head>

<body>
	<!-- login -->
	<h1 class="wthree">Website Pelamar Pekerjaan</h1>
	<div class="login-section-agileits">
		<h3 class="form-head">Apakah Sudah Punya Akun?</h3>
			<div class="w3ls-icon">
				<a href="<?php echo base_url() ?>index/tampil_login"><input type="submit" value="Sudah Punya"></a>
			</div>
			<div class="w3ls-icon">
				<a href="<?php echo base_url() ?>index/tampil_signup"><input type="submit" value="Belum Punya"></a>
			</div>
			
			
	</div>
	<p class="footer-agile">
		<a href="http://w3layouts.com/"> </a>
	</p>


	<script type="text/javascript">
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords do not Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>

</body>

</html>