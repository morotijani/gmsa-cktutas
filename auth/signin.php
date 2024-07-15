<?php

	// SIGN IN PAGE
	require_once ("./../db_connection/conn.php");


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register -GMSA . CKTUAS</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="GMSA.org">
	<meta name="description" content="GMSA - Ghana Muslim Student Society on CKTUTAS">

	<!-- Dark mode -->
	<script>
		const storedTheme = localStorage.getItem('theme')
 
		const getPreferredTheme = () => {
			if (storedTheme) {
				return storedTheme
			}
			return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
		}

		const setTheme = function (theme) {
			if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
				document.documentElement.setAttribute('data-bs-theme', 'dark')
			} else {
				document.documentElement.setAttribute('data-bs-theme', theme)
			}
		}

		setTheme(getPreferredTheme())

		window.addEventListener('DOMContentLoaded', () => {
		    var el = document.querySelector('.theme-icon-active');
			if(el != 'undefined' && el != null) {
				const showActiveTheme = theme => {
				const activeThemeIcon = document.querySelector('.theme-icon-active use')
				const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
				const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

				document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
					element.classList.remove('active')
				})

				btnToActive.classList.add('active')
				activeThemeIcon.setAttribute('href', svgOfActiveBtn)
			}

			window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
				if (storedTheme !== 'light' || storedTheme !== 'dark') {
					setTheme(getPreferredTheme())
				}
			})

			showActiveTheme(getPreferredTheme())

			document.querySelectorAll('[data-bs-theme-value]')
				.forEach(toggle => {
					toggle.addEventListener('click', () => {
						const theme = toggle.getAttribute('data-bs-theme-value')
						localStorage.setItem('theme', theme)
						setTheme(theme)
						showActiveTheme(theme)
					})
				})

			}
		})
		
	</script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?= PROOT; ?>assets/media/logo/logo-1.jpeg">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/bootstrap-icons.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?= PROOT; ?>dist/css/bootstrap.min.css">

</head>

<body>

<!-- **************** MAIN CONTENT START **************** -->
	<main>
		
		<section class="vh-xxl-100">
			<div class="container h-100 d-flex px-0 px-sm-4">
				<div class="row justify-content-center align-items-center m-auto">
					<div class="col-12">
						<div class="bg-mode shadow rounded-3 overflow-hidden">
							<div class="row g-0">
								<div class="col-lg-6 d-flex align-items-center order-2 order-lg-1">
									<div class="p-3 p-lg-5">
										<img src="<?= PROOT; ?>assets/media/signin.svg" alt="">
									</div>
									<div class="vr opacity-1 d-none d-lg-block"></div>
								</div>
				
								<!-- Information -->
								<div class="col-lg-6 order-1">
									<div class="p-4 p-sm-7">
										<!-- Logo -->
										<a href="index.html">
											<img class="h-50px mb-4" src="<?= PROOT; ?>assets/media/logo/logo-1.jpeg" alt="logo">
										</a>
										<!-- Title -->
										<h1 class="mb-2 h3">Welcome back</h1>
										<p class="mb-0">New here?<a href="sign-up.html"> Create an account</a></p>
				
										<!-- Form START -->
										<form class="mt-4 text-start">
											<!-- Email -->
											<div class="mb-3">
												<label class="form-label">Enter email id</label>
												<input type="email" class="form-control">
											</div>
											<!-- Password -->
											<div class="mb-3 position-relative">
												<label class="form-label">Enter password</label>
												<input class="form-control fakepassword" type="password" id="psw-input">
												<span class="position-absolute top-50 end-0 translate-middle-y p-0 mt-3">
													<i class="fakepasswordicon fas fa-eye-slash cursor-pointer p-2"></i>
												</span>
											</div>
											<!-- Remember me -->
											<div class="mb-3 d-sm-flex justify-content-between">
												<div>
													<input type="checkbox" class="form-check-input" id="rememberCheck">
													<label class="form-check-label" for="rememberCheck">Remember me?</label>
												</div>
												<a href="forgot-password.html">Forgot password?</a>
											</div>
											<!-- Button -->
											<div><button type="submit" class="btn btn-primary w-100 mb-0">Login</button></div>
				
				
											<!-- Copyright -->
											<div class="text-primary-hover text-body mt-3 text-center" id="copyright"> Copyrights &copy;2013 - <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script> GMSA-CKTUTAS. <br>Build by <a href="https://www.webestica.com/" class="text-body">IT & Publicity Committe.</a>. </div>
										</form>
										<!-- Form END -->
									</div>		
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	</main>

	<div class="back-top"></div>

    <script type="text/javascript" src="<?= PROOT; ?>dist/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="<?= PROOT; ?>dist/js/popper.min.js"></script>
    <script type="text/javascript" src="<?= PROOT; ?>dist/js/bootstrap.min.js"></script>
	<script src="<?= PROOT; ?>dist/js/functions.js"></script>

</body>
</html>