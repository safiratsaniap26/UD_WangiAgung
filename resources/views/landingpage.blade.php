<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags --> 
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>WangiAgung | Welcome</title>
		<link rel="stylesheet" href="{{asset('template/landing/materialdesignicons.min.css')}}">
		<link rel="stylesheet" href="{{asset('template/landing/owl.carousel.css')}}">
		<link rel="stylesheet" href="{{asset('template/landing/owl.theme.default.min.css')}}">
		<link rel="stylesheet" href="{{asset('template/landing/aos.css')}}">
		<link rel="stylesheet" href="{{asset('template/landing/jquery.flipster.css')}}">
		<link rel="stylesheet" href="{{asset('template/landing/style.css')}}">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@500&display=swap" rel="stylesheet">
		<style>
		.services-box img{
			width : 240px !important;
			height : 180px !important;
		}
		.font-weight-medium{
			font-family: 'Bebas Neue', cursive;
			font-size : 44px !important;
		}
			
		.subtitle{
			font-family: 'Yanone Kaffeesatz', sans-serif;
			font-size : 24px !important;

		}
		.main-banner .banner-title {
			width: 100%;
		}
		</style>
	</head>
	<body data-spy="scroll" data-target=".navbar" data-offset="50">
		<div id="mobile-menu-overlay"></div>
		<nav class="navbar navbar-expand-lg fixed-top">
			<div class="container">
				<a class="navbar-brand" href="#">UD Wangi Agung</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"><i class="mdi mdi-menu"> </i></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
					<div class="d-lg-none d-flex justify-content-between px-4 py-3 align-items-center">
						<img src="https://i.ibb.co/DpbskFt/Ud-Wangi-Agung.png" class="logo-mobile-menu" alt="logo">
						<a href="javascript:;" class="close-menu"><i class="mdi mdi-close"></i></a>
					</div>
					<ul class="navbar-nav ml-auto align-items-center">
					<li class="nav-item active">
							<a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#produk">Produk</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="#alamat">Alamat</a>
						</li>

						<li class="nav-item">
							<a class="nav-link btn btn-success" href="/login">Login</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="page-body-wrapper">
			<section id="home" class="home h-100">
				<div class="container">
					<div class="row  py-5">
						<div class="col-sm-12">
							<div class="main-banner">
								<div class="d-sm-flex justify-content-between">
									<div data-aos="zoom-in-up">
										<div class="banner-title">
												<h3 class="font-weight-medium">Selamat Datang!</h3>
										</div>
										<p class="mt-3 subtitle">Website Stok Barang 

											<br>
											UD Wangi Agung Banyuwangi
										</p>
									</div>
									<div class="mt-5 mt-lg-0">
										<img src="https://i.ibb.co/DpbskFt/Ud-Wangi-Agung.png" alt="marsmello" class="img-fluid" data-aos="zoom-in-up">
									</div>
                                   
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="our-services" id="produk">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							
							<h3 class="font-weight-medium" style="color: #dee2e6">Produk Barang</h3>
							<h5 class="mb-5" style="color: #dee2e6">Macam Produk Ikan</h5>
						</div>
					</div>
					<div class="row" data-aos="fade-up">
						<div class="col-sm-4 text-center text-lg-left">
							<div class="services-box" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
								<img src="{{asset('image/layangpeda.png')}}" alt="integrated-marketing" data-aos="zoom-in">
								<h6 class="mb-3 mt-4 font-weight-medium" style="color: #dee2e6">
									Ikan Layang / Peda
								</h6>
								<p style="color: #dee2e6"> Ikan-ikan berukuran kecil hingga sedang ini merupakan ikan konsumsi yang cukup penting, 
								dipasarkan dalam keadaan segar atau diolah sebagai ikan pindang, ikan asin, dan lain-lain. 
								</p>
							</div>
						</div>
						<div class="col-sm-4 text-center text-lg-left">
							<div class="services-box"   data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
								<img src="{{asset('image/grago.png')}}"  alt="design-development" data-aos="zoom-in">
								<h6 class="mb-3 mt-4 font-weight-medium" style="color: #dee2e6">Rebon / 
									Grago Udang
								</h6>
								<p style="color: #dee2e6">Rebon dibuat dari udang yang sangat kecil dan dikeringkan sehingga bentuknya mirip udang kecil segar. 
								Rebon juga bisa dijadikan campuran tumisan sayur atau perkedel atau dibuat rempeyek dan sambal.
								</p>
							</div>
						</div>
						<div class="col-sm-4 text-center text-lg-left">
							<div class="services-box" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
								<img src="{{asset('image/teri.png')}}" alt="digital-strategy" data-aos="zoom-in">
								<h6 class="mb-3 mt-4 font-weight-medium" style="color: #dee2e6">
									Ikan Teri Kering / Tawar
								</h6>
								<p style="color: #dee2e6">Ikan teri memiliki bentuk tubuh lebih panjang dan umumnya tidak sebesar ikan lain. 
								Biasanya, orang mengolah ikan teri menjadi sambal teri, capcai sayur dan teri, dan bakwan teri.
								</p>
							</div>
						</div>
					</div>
					
				</div>
			</section>
			
			<section class="alamat" id="alamat">
				<div class="container col-mb-5">
					<div class="row">
						<div class="col-sm-12">
							<h2 class="text-center" style="color: #dee2e6">Alamat</h2>
							<hr>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<p class ="text-center" style="color: #dee2e6">Jl. Cokroningrat, Kelurahan Sumberrejo, Kecamatan Banyuwangi, Kabupaten Banyuwangi, Jawa Timur
						(Belakang Kantor Satpas Polres Banyuwangi)</p>
						</div>
						<div id="maps" class="container">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.6273720624367!2d114.34186831451368!3d-8.24017268502764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x78c45c1b87023186!2zOMKwMTQnMjQuNiJTIDExNMKwMjAnMzguNiJF!5e0!3m2!1sid!2sid!4v1641266305291!5m2!1sid!2sid" 
						width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						</div>
					</div>
				</div>
			</section>

			<footer>
				<div class="container text-center">
					<div class="row">
						<div class="col-sm-12 col-mt-20">
							<p>built by. <a href="http://instagram.com/fanialfarizy">Mohammad Fany Alfarizy</a></p>
						</div>
					</div>
			</footer>

		</div>

		<script src="{{asset('template/landing/vendor.bundle.base.js')}}"></script>
		<script src="{{asset('template/landing/owl.carousel.js')}}"></script>
		<script src="{{asset('template/landing/aos.js')}}"></script>
		<script src="{{asset('template/landing/jquery.flipster.min.js')}}"></script>
	
		<script src="{{asset('template/landing/template.js')}}"></script>

	</body>
</html>