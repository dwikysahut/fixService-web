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
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('asset/client/css/bootstrap.min.css?');echo date('l jS \of F Y h:i:s A'); ?>" />
	<!-- style css -->
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('asset/client/css/style.css') ?>">
	<!-- Responsive-->
	<link rel="stylesheet" href="<?php echo site_url('asset/client/css/responsive.css') ?>">
	<!-- Scrollbar Custom CSS -->
	<link rel="stylesheet" href="<?php echo site_url('asset/client/css/jquery.mCustomScrollbar.min.css') ?>">
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
									<div class="logo"><a href="#home"><img src="<?php echo site_url('asset/client/images/logo1.png') ?>" style="max-width: 100%;"></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
							<div class="menu-area">
								<div class="limit-box">
									<nav class="main-menu">
										<ul class="menu-area-main">
											<li><a href="#home">Home</a></li>
											<li><a href="#about">About</a></li>
											<li><a href="#service">Service</a></li>
											<li><a href="<?php echo site_url('welcome/shop') ?>">Shop</a></li>
											<?php if (!$this->session->userdata('email')) : ?>
												<li><a href="#member">Member</a></li>
											<?php endif; ?>
											<?php if ($this->session->userdata('email')) : ?>
												<li>
													<div class="dropdown" style="color:black">
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
			<?php if (!$this->session->userdata('email')) : ?>
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
										<figure><img src="<?php echo site_url('asset/client/images/woofer.png') ?>" alt="img" style="max-width: 100%;"></figure>
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
	<div id="about" class="choose_section">
		<div class="container">
			<div class="col-sm-12">
				<h1 class="choose_text">Kenapa anda harus <span class="color">memilih kami</span></h1>
				<p class="lorem_text">Kami dapat mengatasi semua permasalahan anda terhadap komputer atau laptop yang bermasalah</p>
			</div>
		</div>
	</div>
	<div class="choose_section_2">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="power_full">
						<div class="icon"><a href="#"><img src="<?php echo site_url('asset/client/images/service.png') ?>"></a></div>
						<h2 class="powerful_text">Pemesanan Service</h2>
						<p class="making_tetx">Dengan teknisi service yang berpengalaman dan handal dapat membantu anda untuk memperbaiki masalah yang ada pada komputer atau laptop anda</p>
					</div>
					<div class="btn_main">
						<a href="#"><button type="button" class="read_bt">Lebih Lanjut</button></a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="power">
						<div class="icon"><a href="#"><img src="<?php echo site_url('asset/client/images/software.png') ?>"></a></div>
						<h2 class="totaly_text">Software</h2>
						<p class="making">Kami menyediakan software 100% original dan aman untuk anda gunakan. Jadi anda tak perlu khawatir ataupun bingung untuk memilih software yang cocok dengan komputer maupun laptop anda

						</p>
					</div>
					<div class="btn_main">
						<a href="#"><button type="button" class="read_bt">Lebih Lanjut</button></a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="power">
						<div class="icon"><a href="#"><img src="<?php echo site_url('asset/client/images/headfone-icon.png') ?>"></a></div>
						<h2 class="totaly_text">Daftar Member</h2>
						<p class="making">Banyak keuntungan yang anda dapatkan jika menjadi member setia kami. Kami menawarkan pelayanan dan harga khusus bagi anda yang telah menjadi member kami</p>
					</div>
					<div class="btn_main">
						<a href="#member"><button type="button" role="button" class="read_bt">Lebih Lanjut</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- choose start -->
	<!-- about start -->
	<div class="about_main layout_padding">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="images">
						<img src="<?php echo site_url('asset/client/images/img-1.png') ?>" style="max-width: 100%;">
					</div>
				</div>
				<div class="col-md-6">
					<div class="right_section_main">
						<h1 class="dolar_tetx"><strong style="color: #2ba879;">Penawaran Spesial !</strong></h1>
						<h2 class="special_text">Khusus Bagi Anda Member Baru Kami, Akan Mendapatkan Diskon 30%</h2>
						<p class="donec_text">khusus untuk member baru yang mendaftar sampai dengan tanggal 3 April 2021. Kami menawarkan diskon yang menarik setiap pemesanan dan pembelian software yang akan anda beli.</p>
						<div class="right_aero"><img src="<?php echo site_url('asset/client/images/right-aerow.png') ?>"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<!-- service end -->
<?php if ($this->session->userdata('email')) : ?>
	<div id="track" class="track_section">
		<div class="container">
			<div class="col-sm-12">
				<h1 class="choose_text">Track Service</h1>
			</div>
		</div>
	</div>
	<div class="track_section_2">
		<div class="col-md-6 offset-md-3">
			<table class="table table-borderless table-dark table-responsive">
				<thead>
					<tr>
						<th scope="col">nama service</th>
						<th width="30%" scope="col">deskripsi</th>
						<th scope="col">tanggal service</th>
						<th scope="col">petugas</th>
						<th scope="col">status</th>
						<th scope="col">Opsi</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($track as $trc) : ?>
						<tr>
							<td><?php echo $trc->Nama_service ?></td>
							<td><?php echo $trc->deskripsi ?></td>
							<td><?php echo $trc->waktu_service ?></td>
							<td><?php echo $trc->pegawai ?></td>
							<td><?php echo $trc->status ?></td>
							<?php if (empty($trc->pegawai)) : ?>
								<td>
									<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#batal<?php echo $trc->ID_order ?>">Batal</button>
								</td>
							<?php endif; ?>
							<?php if (!empty($trc->pegawai)) : ?>
								<td>
									
								</td>
							<?php endif; ?>
							<td>
							<button class="btn btn-dark"onclick="location.href='<?php echo site_url('invoicePdf/') ?>'">Print</button>
							</td>
						</tr>
						<div class="modal fade" id="batal<?php echo $trc->ID_order ?>" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Batal Order</h5>
									</div>
									<div class="modal-body">
										Apakah Anda Yakin Membatalkan Orderan service ?
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
										<a href="<?php echo site_url('welcome/hapus_order/' . $trc->ID_order) ?>" class="btn btn-danger">Ya, Saya Yakin</a>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
<?php endif; ?>
<!-- contact start -->
<div id="service" class="contact_section">
	<div class="container">
		<div class="col-sm-12">
			<h1 class="choose_text">Daftar Service Sekarang Juga</h1>
			<p class="lorem_text">Pelayanan yang memuaskan</p>
		</div>
	</div>
</div>
<div class="contact_section_2">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="input_main">
					<form action="<?php echo site_url('welcome/service_daftar') ?>" method="post">
						<div class="container">
							<div class="form-group">
								<input type="text" class="email-bt" placeholder="Nama" name="name" value="<?php echo $this->session->userdata('nama') ?>">
							</div>
							<div class="form-group">
								<input type="text" class="email-bt" placeholder="Email" name="email" value="<?php echo $this->session->userdata('email') ?>">
							</div>
							<div class="form-group">
								<input type="tel" class="email-bt" placeholder="No Whatsapp" name="nohp" value="<?php echo $this->session->userdata('notelp') ?>">
							</div>
							<div class="form-group">
								<textarea name="alamat" id="alamat" cols="30" rows="10" class="massage-bt" placeholder="Alamat"></textarea>
							</div>
							<div class="form-group">
								<input type="datetime-local" class="email-bt" placeholder="Waktu" name="waktu">
							</div>
							<div class="form-group">
								<select name="kategori" id="kategori" class="">
									<option value="">Pilih Service</option>
									<?php foreach ($kategori as $ktg) : ?>
										<option value="<?php echo $ktg->ID_service ?>"><?php echo $ktg->Nama_service . " (Rp. " . $ktg->Biaya_service . ")" ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<input type="text" class="email-bt" placeholder="Deskripsi" name="deskripsi">
							</div>
						</div>
						<div class="send_btn">
							<input type="submit" class="main_bt" name="kirim" value="Kirim">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php if (!$this->session->userdata('email')) : ?>
	<div id="member" class="contact_section">
		<div class="container">
			<div class="col-sm-12">
				<h1 class="choose_text">Daftar Sekarang</h1>
				<p class="lorem_text">Dapatkan harga khusus</p>
			</div>
		</div>
	</div>
	<div class="contact_section_2">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="input_main">
						<form action="<?php echo site_url('welcome/member_daftar') ?>" method="post">
							<div class="container">
								<div class="form-group">
									<input type="text" class="email-bt" placeholder="Nama" name="name">
								</div>
								<div class="form-group">
									<input type="text" class="email-bt" placeholder="Email" name="email">
								</div>
								<div class="form-group">
									<input type="password" class="email-bt" placeholder="Password" name="password">
								</div>
								<div class="form-group">
									<input type="tel" class="email-bt" placeholder="No Whatsapp" name="nohp">
								</div>
							</div>
							<div class="send_btn">
								<input type="submit" class="main_bt" name="kirim" value="Kirim">
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-6">
					<div class="section_right">
						<img src="<?php echo site_url('asset/client/images/img-2.png') ?>" style="max-width: 100%;">
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<div class="contact_section_3">
	<div class="container">
		<div class="contact_taital">
			<div class="row web">
				<div class="col-sm-12 col-md-12 col-lg-4">
					<div class="map_main">
						<img src="<?php echo site_url('asset/client/images/map-icon.png') ?>">
						<span class="londan_text">Malang</span>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-4">
					<div class="map_main">
						<img src="<?php echo site_url('asset/client/images/phone-icon.png') ?>">
						<span class="londan_text">+628383838383</span>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-4">
					<div class="map_main">
						<img src="<?php echo site_url('asset/client/images/email-icon.png') ?>">
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
							<li><a href="#"><img src="<?php echo site_url('asset/client/images/fb-icon.png') ?>"></a></li>
							<li><a href="#"><img src="<?php echo site_url('asset/client/images/twitter-icon.png') ?>"></a></li>
							<li><a href="#"><img src="<?php echo site_url('asset/client/images/in-icon.png') ?>"></a></li>
							<li><a href="#"><img src="<?php echo site_url('asset/client/images/google-icon.png') ?>"></a></li>
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
<script src="<?php echo site_url('asset/client/js/jquery.min.js') ?>"></script>
<script src="<?php echo site_url('asset/client/js/popper.min.js') ?>"></script>
<script src="<?php echo site_url('asset/client/js/bootstrap.bundle.min.js') ?>"></script>


<script src="<?php echo site_url('asset/client/js/jquery-3.0.0.min.js') ?>"></script>
<script src="<?php echo site_url('asset/client/js/plugin.js') ?>"></script>
<!-- sidebar -->
<script src="<?php echo site_url('asset/client/js/jquery.mCustomScrollbar.concat.min.js') ?>"></script>
<script src="<?php echo site_url('asset/client/js/custom.js') ?>"></script>
<!-- javascript -->
<script src="<?php echo site_url('asset/client/js/owl.carousel.js') ?>"></script>
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