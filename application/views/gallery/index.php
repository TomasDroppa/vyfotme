<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $title; ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap library -->
		<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bootstrap.min.css'); ?>">

		<!-- Stylesheet file -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

		<!-- jQuery library -->
		<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>

	</head>
	<body>
		
		<header class="header">
			<div class="container">
				<div class="row justify-content-between align-items-center">
					<div class="brand-name">
						<a href="<?php echo base_url(); ?>">Sabina Běhávková</a>
					</div>
				<div class="nav-toggle">
					<span></span>
				</div>	
					<nav class="nav">
						<ul>
							<li><a href="#home">Domů</a></li>
							<li><a href="#about">O mně</a></li>
							<li><a href="#services">Koho fotím?</a></li>
							<li><a href="#works">Galerie</a></li>
							<li><a href="http://localhost/vyfotme/zobraz_cenik">Ceník</a></li>
							<li><a href="http://localhost/vyfotme/bookingsystem/rezervace_terminu.php">rezervace termínů</a></li>
							<li><a href="#contact">Kontakty</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
			<!-- Header End -->

			<!-- Home Section Start -->	
		<section class="home-section" id="home">
			<!-- shape -->
			<!-- <div class="shape-01">
			</div> -->
			<div class="container">
				<div class="row align-items-center">
					<div class="home-content">
						<h4>Sabina Běhávková</h4>
						<h1>Photographer</h1>
					</div>
				</div>
			</div>
			<!-- scroll down -->
			<a href="#about" class="scroll-down">
				<img src="assets/img/icons/arrow-down.svg" alt="scroll Down">
			</a>
			
			</section>
			<!-- Home Section End -->

			<!-- About Section Start -->
		<section class="about-section" id="about">
			<div class="container">
				<div class="row">
					<div class="about-img">
						<div class="img-box">
							<img src="assets/img/omne.jpg" alt="about me">
						</div>
					</div>
					<div class="about-content">
					<div class="row">
						<div class="section-title">
						<h1>O mně</h1>
						</div>
					</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
						ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
						exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
						Duis aute irure dolor in reprehenderit in voluptate velit esse cillum 
						dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
					</div>
				</div>
			</div>
		</section>
		<!-- About Section End -->

		<!-- Service Section Start -->
		<section class="service-section" id="services">
			<div class="container">
				<div class="row">
					<div class="section-title">
						<h1>Koho fotím?</h1>
					</div>
				</div>
				<div class="row">
					<!-- service Item Start -->
					<div class="service-item">
						<div class="service-item-inner">
							<img src="assets/img/kohofoti/1.jpg" alt="service">
							<div class="overlay">
								<h4>Děti</h4>
							</div>
						</div>
						<p>popis focení dané kategorie, možná ceník</p>
					</div>
					<!-- service Item End -->
					<!-- service Item Start -->
					<div class="service-item">
						<div class="service-item-inner">
							<img src="assets/img/kohofoti/2.jpg" alt="service">
							<div class="overlay">
								<h4>Novorozenci</h4>
							</div>
						</div>
					</div>
					<!-- service Item End -->
					<!-- service Item Start -->
					<div class="service-item">
						<div class="service-item-inner">
							<img src="assets/img/kohofoti/3.jpg" alt="service">
							<div class="overlay">
								<h4>Portréty</h4>
							</div>
						</div>
					</div>
					<!-- service Item End -->
					<!-- service Item Start -->
					<div class="service-item">
						<div class="service-item-inner">
							<img src="assets/img/kohofoti/4.jpg" alt="service">
							<div class="overlay">
								<h4>Rodina</h4>
							</div>
						</div>
					</div>
					<!-- service Item End -->
					<!-- service Item Start -->
					<div class="service-item">
						<div class="service-item-inner">
							<img src="assets/img/kohofoti/5.jpg" alt="service">
							<div class="overlay">
								<h4>Svatba</h4>
							</div>
						</div>
					</div>
					<!-- service Item End -->
					<!-- service Item Start -->
					<div class="service-item">
						<div class="service-item-inner">
							<img src="assets/img/kohofoti/6.jpg" alt="service">
							<div class="overlay">
								<h4>Těhu</h4>
							</div>
						</div>
					</div>
					<!-- service Item End -->
				</div>
			</div>
		</section>
		<!-- Service Section End -->

		<!---galerie-->
		<section class="work-section" id="works">
				<div class="container">
					<div class="row">
						<div class="section-title">
							<h1>Galerie</h1>
						</div>
					</div>
					<div class="row">
						<div class="work-item">
							<div class="work-item-inner">
							<?php
								if (!empty($gallery)) {
									$row = $gallery[0]; // get the first image in the gallery

									
										$uploadDir = base_url().'uploads/images/';
										$imageURL = $uploadDir.$row["file_name"];
										
										echo '<a href="'.$imageURL.'" data-fancybox="gallery" data-caption="'.$row["title"].'" >';
										echo '<img src="'.$imageURL.'" alt="" />';
										echo '</a>';
									
								}
								?>
							</div>
						</div>
						
						<div class="work-item">
							<div class="work-item-inner">
							<?php
								if (!empty($gallery)) {
									$row = $gallery[1]; // get the first image in the gallery

									
										$uploadDir = base_url().'uploads/images/';
										$imageURL = $uploadDir.$row["file_name"];
										
										echo '<a href="'.$imageURL.'" data-fancybox="gallery" data-caption="'.$row["title"].'" >';
										echo '<img src="'.$imageURL.'" alt="" />';
										echo '</a>';
									
								}
								?>
							</div>
						</div>

						<div class="work-item">
							<div class="work-item-inner">
							<?php
								if (!empty($gallery)) {
									$row = $gallery[2]; // get the first image in the gallery

									
										$uploadDir = base_url().'uploads/images/';
										$imageURL = $uploadDir.$row["file_name"];
										
										echo '<a href="'.$imageURL.'" data-fancybox="gallery" data-caption="'.$row["title"].'" >';
										echo '<img src="'.$imageURL.'" alt="" />';
										echo '</a>';
									
								}
								?>
							</div>
						</div>

						<div class="work-item">
							<div class="work-item-inner">
							<?php
								if (!empty($gallery)) {
									$row = $gallery[3]; // get the first image in the gallery

									
										$uploadDir = base_url().'uploads/images/';
										$imageURL = $uploadDir.$row["file_name"];
										
										echo '<a href="'.$imageURL.'" data-fancybox="gallery" data-caption="'.$row["title"].'" >';
										echo '<img src="'.$imageURL.'" alt="" />';
										echo '</a>';
									
								}
								?>
							</div>
						</div>

						<div class="work-item">
							<div class="work-item-inner">
							<?php
								if (!empty($gallery)) {
									$row = $gallery[4]; // get the first image in the gallery

									
										$uploadDir = base_url().'uploads/images/';
										$imageURL = $uploadDir.$row["file_name"];
										
										echo '<a href="'.$imageURL.'" data-fancybox="gallery" data-caption="'.$row["title"].'" >';
										echo '<img src="'.$imageURL.'" alt="" />';
										echo '</a>';
									
								}
								?>
							</div>
						</div>

						<div class="work-item">
							<div class="work-item-inner">
							<?php
								if (!empty($gallery)) {
									$row = $gallery[5]; // get the first image in the gallery

									
										$uploadDir = base_url().'uploads/images/';
										$imageURL = $uploadDir.$row["file_name"];
										
										echo '<a href="'.$imageURL.'" data-fancybox="gallery" data-caption="'.$row["title"].'" >';
										echo '<img src="'.$imageURL.'" alt="" />';
										echo '</a>';
									
								}
								?>
							</div>
						</div>
								
					</div>
				</div>
		</section>
			<!-- Fancybox CSS library -->
				<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fancybox/jquery.fancybox.css'); ?>">

				<!-- Fancybox JS library -->
				<script src="<?php echo base_url('assets/fancybox/jquery.fancybox.js'); ?>"></script>

				<!-- Initialize fancybox -->
				<script>
					$("[data-fancybox]").fancybox();
				</script>
		<!---/galerie-->

		<!-- Contact Section Start -->
		<section class="contact-section" id="contact"> <!--musí tam být id aby když se klikne např. na contact tak to sjede a contact-->
			<div class="container">
				<div class="row">
					<div class="contact-img">
						<div class="img-box">
							<div class="section-title">
								<h1>Kontakty</h1>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="contact-form">
						
					</div>
				</div>
				<div class="row">
					<div class="contact-info">
						<div class="row">
							<!-- info item start -->
							<div class="info-item">
								<h5>Adresa</h5>
								<p>Uherské Hradiště, Štefanikova 454</p>
							</div>
							<!-- info item end -->
							<!-- info item start -->
							<div class="info-item">
								<h5>Telefon</h5>
								<p>548 681 348</p>
							</div>
							<!-- info item end -->
							<!-- info item start -->
							<div class="info-item">
								<h5>Email</h5>
								<p>email@gmail.com</p>
							</div>
							<!-- info item end -->
						</div>
					</div>
				</div>

				<div class="row">
					<div class="social-links">
						<a href="https://www.facebook.com/PhotographySabina" title="facebook"><img src="assets/img/icons/facebook.svg" alt="facebook"></a>
						<a href="https://www.instagram.com/photographysabinabehavkova/" title="instagram"><img src="assets/img/icons/instagram.svg" alt="instagram"></a>
					</div>
				</div>

				<div class="mapa">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d388.56576357434176!2d17.468417079260675!3d49.068614331864914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4713144708bb1a4b%3A0x71d96cdc2a4b4016!2zxaB0ZWbDoW5pa292YSA0NTQsIDY4NiAwMSBVaGVyc2vDqSBIcmFkacWhdMSb!5e0!3m2!1scs!2scz!4v1675605038367!5m2!1scs!2scz" width="1140" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>

			</div>
		</section>
		<!-- Contact Section End -->
		
			<script src="js/jquery.min.js"></script>
			<script src="js/main.js"></script>

	</body>
</html>