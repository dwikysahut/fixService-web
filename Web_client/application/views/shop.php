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
	<title>Fix Service Malang</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('asset/client/css/bootstrap.min.css')?>">
	<!-- style css -->
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('asset/client/css/style.css')?>">
	<!-- Responsive-->
	<link rel="stylesheet" href="<?php echo site_url('asset/client/css/responsive.css')?>">
	<!-- Scrollbar Custom CSS -->
	<link rel="stylesheet" href="<?php echo site_url('asset/client/css/jquery.mCustomScrollbar.min.css')?>">
	<!-- Tweaks for older IEs-->
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

</head>

<body>
	<header id="home" class="section">
		<div class="header_main">
			<!-- header inner -->
			<div class="header">
				<div class="container">
					<div class="row">
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
							<div class="full">
								<div class="center-desk">
									<div class="logo"><a href="#home"><img src="<?php echo site_url('asset/client/images/logo1.png')?>" style="max-width: 100%;"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
							<div class="menu-area">
								<div class="limit-box">
									<nav class="main-menu">
										<ul class="menu-area-main">
											<li><a href="<?php echo site_url('welcome/#home')?>">Home</a></li>
											<li><a href="<?php echo site_url('welcome/#about')?>">About</a></li>
											<li><a href="<?php echo site_url('welcome/#service')?>">Service</a></li>
											<li><a href="<?php echo site_url('welcome/shop')?>">Shop</a></li>
											<?php if (!$this->session->userdata('email')) : ?>
												<li><a href="<?php echo site_url('welcome/#member')?>">Member</a></li>
											<?php endif; ?>
											<?php if ($this->session->userdata('email')) : ?>
												<li>
													<div class="dropdown">
														<a href="#" data-toggle="dropdown"><?php echo $this->session->userdata('nama'); ?></a>
														<div class="dropdown-menu">
															<a style="color:black;" data-toggle="dropdown-item" href="<?php echo site_url('welcome/logout') ?>">Log Out</a>
														</div>
													</div>
												</li>
											<?php else : ?>
												<li><a href="<?php echo site_url('welcome/login') ?>">Login</a></li>
											<?php endif; ?>
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end header inner -->
			<section>
				<div class="bannen_inner">
					<div class="container">
						<div class="row marginii">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
								<div class="taital_main">

								</div>
								<h1 class="web_text"><strong>Fix Service Malang</strong></h1>
								<p class="donec_text">
									Fix Service Malang menyediakan jasa service laptop dan komputer yang bermasalah.
								</p>
								<a class="get_bg" href="#" role="button">Pesan Sekarang</a>
								<a class="btn btn-lg btn-dark" href="about.html" role="button">Hubungi Kami</a>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
								<div class="img-box">
									<figure><img src="<?php echo site_url('asset/client/images/woofer.png')?>" alt="img" style="max-width: 100%;"></figure>
								</div>
							</div>
						</div>
						<div class="emaim-bt">
							<div class="col-md-9 margin-0">
								<div class="input-group mb-3 margin-top-20">
									<input type="text" class="form-control" placeholder="Apa yang anda cari?">
									<div class="input-group-append">
										<button class="search_bt" type="Subscribe"><a href="#">Cari</a></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
	</header>
	<!-- banner end -->
	<!-- choose start -->
	<div id="" class="choose_section">
		<div class="container">
			<div class="col-sm-12">
				<h1 class="choose_text">Kenapa anda harus <span class="color">memilih kami</span></h1>
				<p class="lorem_text">Kami dapat mengatasi semua permasalahan anda terhadap komputer atau laptop yang bermasalah</p>
			</div>
		</div>
	</div>
	<div class="contact_section_2">
		<div class="container">
			<div class="row">
				<?php foreach($barang as $brg):?>
				<div class="col-sm-4">
					<div class="power">
						<div class="icon"><img src="<?php echo $brg->gambar?>" class="img-fluid" alt="Responsive image"></div>
						<h2 class="totaly_text"><?php echo $brg->nama?></h2>
						<p class="making"><?php echo "Rp." ." ".$brg->harga?></p>
					</div>
					<div class="btn_main">
						<a href="<?php echo $brg->link_tp?>" target="_blank"><button type="button" class="read_bt"><i class="fa fa-shopping-cart"></i> Buy</button></a>
					</div>
				</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>

	<div class="contact_section_3">
		<div class="container">
			<div class="contact_taital">
				<div class="row web">
					<div class="col-sm-12 col-md-12 col-lg-4">
						<div class="map_main">
							<img src="<?php echo site_url('asset/client/images/map-icon.png')?>">
							<span class="londan_text">Malang</span>
						</div>
					</div>
					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="map_main">
							<img src="<?php echo site_url('asset/client/images/phone-icon.png')?>">
							<span class="londan_text">+628383838383</span>
						</div>
					</div>
					<div class="col-sm-6 col-md-6 col-lg-4">
						<div class="map_main">
							<img src="<?php echo site_url('asset/client/images/email-icon.png')?>">
							<span class="londan_text">fixservice@gmail.com</span>
						</div>
					</div>
				</div>
			</div>

			<div class="icon_main">
				<div class="row">
					<div class="col-sm-12">
						<div class="menu_text">
							<p>
							<ul>
								<li><a href="#"><img src="<?php echo site_url('asset/client/images/fb-icon.png')?>"></a></li>
								<li><a href="#"><img src="<?php echo site_url('asset/client/images/twitter-icon.png')?>"></a></li>
								<li><a href="#"><img src="<?php echo site_url('asset/client/images/in-icon.png')?>"></a></li>
								<li><a href="#"><img src="<?php echo site_url('asset/client/images/google-icon.png')?>"></a></li>
							</ul>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright_main">
		<div class="container">
			<p class="copy_text">© 2018 All Rights Reserved. <a href="https://html.design">Fix Service</a></p>
		</div>
	</div>


	<!-- contact end -->
	<!-- Javascript files-->
	<script src="<?php echo site_url('asset/client/js/jquery.min.js')?>"></script>
	<script src="<?php echo site_url('asset/client/js/popper.min.js')?>"></script>
	<script src="<?php echo site_url('asset/client/js/bootstrap.bundle.min.js')?>"></script>


	<script src="<?php echo site_url('asset/client/js/jquery-3.0.0.min.js')?>"></script>
	<script src="<?php echo site_url('asset/client/js/plugin.js')?>"></script>
	<!-- sidebar -->
	<script src="<?php echo site_url('asset/client/js/jquery.mCustomScrollbar.concat.min.js')?>"></script>
	<script src="<?php echo site_url('asset/client/js/custom.js')?>"></script>
	<!-- javascript -->
	<script src="<?php echo site_url('asset/client/js/owl.carousel.js')?>"></script>
	<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
	<script>
		$(document).ready(function() {
			$(".fancybox").fancybox({
				openEffect: "none",
				closeEffect: "none"
			});

			// $('#kategori').niceSelect();

			$(".zoom").hover(function() {

				$(this).addClass('transition');
			}, function() {

				$(this).removeClass('transition');
			});
		});
	</script>

</body>

</html>