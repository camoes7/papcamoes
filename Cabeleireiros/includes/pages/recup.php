<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- mobile metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<!-- site metas -->
		<title>pcoint</title>
		<meta name="keywords" content="">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- bootstrap css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- style css -->
		<link rel="stylesheet" href="css/style.css">
		<!-- Responsive-->
		<link rel="stylesheet" href="css/responsive.css">
		<!-- fevicon -->
		<link rel="icon" href="images/fevicon.png" type="image/gif" />
		<!-- Scrollbar Custom CSS -->
		<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
		<!-- Tweaks for older IEs-->
		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
	</head>
	<!-- body -->
	<body class="main-layout">
		<!-- loader  -->
		<div class="loader_bg">
			<div class="loader"><img src="images/loading.gif" alt="#" /></div>
		</div>
		<!-- end loader -->
		<!-- header -->
		<header>
			<!-- header inner -->
			<div  class="head_top">
				<div class="header">
					<div class="container">
						<div class="row">
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
								<div class="full">
									<div class="center-desk">
										<div class="logo">
											<a href="index.html"><img src="images/imagem.png" alt="#" /></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
								<nav class="navigation navbar navbar-expand-md navbar-dark ">
									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
										<span class="navbar-toggler-icon"></span>
									</button>
									<div class="collapse navbar-collapse" id="navbarsExample04">
										<ul class="navbar-nav mr-auto">
											<li class="nav-item">
												<a class="nav-link" href="index.html"> Ínicio </a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#about">Sobre</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#contact">Contacte-nos</a>
											</li>
										</ul>
										<div class="sign_btn">
											<a href="#">Entar</a></div>
									</div>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div id="contact" class="request">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="titlepage">
							<h2>Recuperar</h2>
							<span>Recupere a sua conta escrevendo o seu e-mail e mude a password no sei próprio e-mail</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="black_bg">
							<div class="row">
								<div class="col-md-7 ">
									<?php
									if (!isset($_SESSION['login'])) {
									?>
									<form method="POST" action="confirm_recup.php" class="main_form">
										<div class="row">
											<div class="col-md-12 ">
												<input class="contactus" placeholder="E-mail" type="email" name="email" required>
											</div>
											<div class="col-sm-12">
												<input class="send_btn" type="submit" value="Recuperar">
											</div>
										</div>
									</form>
									<?php
								} else {
									echo "<h1>Não pode fazer recuperação com sessão iniciada</h1>";
								}
									?>
								</div>
								<div class="col-md-5">
									<div class="mane_img">
										<figure><img src="images/mane_img.jpg" alt="#"/></figure>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<div class="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="cont">
								<h3>
									<strong class="multi"> Loja online</strong><br>
									Criado em 2021
								</h3>
							</div>
						</div>
						<div class="col-md-6">
							<div class="cont_call">
								<h3>
									<strong class="multi"> Ligue agora</strong><br>
									(+1) 12345667890
								</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="copyright">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								