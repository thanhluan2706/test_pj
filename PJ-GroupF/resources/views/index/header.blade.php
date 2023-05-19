<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>TOP-E-Comerce</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />


	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/index/bootstrap.min.css') }}" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/index/slick.css') }}" />
	<link type="text/css" rel="stylesheet" href="{{ asset('css/index/slick-theme.css') }}" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/index/nouislider.min.css') }}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{ asset('css/index/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/index/fontawesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/fontawesome-web/css/all.min.css') }}">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/index/style.css') }}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"><i class="fa-solid fa-phone-volume"></i> +0987 633 254</a></li>
					<li><a href="#"><i class="fa-regular fa-envelope"></i> tdc@email.com</a></li>
					<li><a href="#"><i class="fa-sharp fa-solid fa-location-dot"></i> TP.HCM</a></li>
				</ul>
				<ul class="header-links pull-right">
					<li><a href="{{route('admin')}}"><i class="fa fa-dollar"></i> VNĐ </a></li>
					<li><a href="{{route('login')}}"><i class="fa-solid fa-user-tie"></i>Login </i>
				</ul>
			</div>
		</div>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="index.php" class="logo">
								<img src="" alt="">
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header-search">
							<form action="result.php" method="get">
								<select class="input-select">
									<option value="0">All Result</option>
									<option value="1">Category 1</option>
									<option value="1">Category 2</option>
								</select>
								<input name="keyword" class="input" placeholder="Search here">
								<button type="submit" class="search-btn">Search</button>
							</form>
						</div>
					</div>
					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							<!-- Wishlist -->
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa-regular fa-heart"></i>
									<span>Your Wishlist</span>
									<div class="qty"><span>{{ count((array) session('wish')) }}</span></div>
								</a>
								<div class="cart-dropdown">
									<div class="cart-list">
										@if(session('wish'))
										@foreach(session('wish') as $id => $value)
										<div class="product-widget">
											<div class="product-img">
												<img src="{{ asset('img') }}/{{ $value['image'] }}" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-name"> {{ $value['name'] }} <a href="#"></a></h3>
												<h4 class="product-price"><span class="qty" style="color: #000055"> {{ number_format($value['price']) }} VNĐ</span></h4>
											</div>
											<button class="delete"><a href="#" target="_self"><strong><i class="fa fa-close" style="color: red;"></i></strong></a></button>
										</div>
										@endforeach
										@endif
									</div>
									<div class="btn-wish-list">
										<a class="primary-btn cta-btn" style="text-align: center;" href="{{ route('wish') }}">View Wish List</a>
										<!-- <a href="">View Wish List</a> -->
									</div>
								</div>
							</div>
							<!-- /Wishlist -->

							<!-- Cart -->
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>Your Cart</span>
									<div class="qty"><span>{{ count((array) session('cart')) }}</span></div>
								</a>
								<div class="cart-dropdown">
									<div class="cart-list" id="cart">
										@if(session('cart'))
										@foreach(session('cart') as $id => $value)
										<div class="product-widget" data-id="{{ $id }}">
											<div class="product-img">
												<img src="{{ asset('img') }}/{{ $value['image'] }}" width="120px" height="55px" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-name"><a href="#">
														{{ $value['name'] }}
												</h3>
												<h4 class="product-price"><span class="qty" style="color: #000055"> {{ $value['quantity'] }}x</span>{{ number_format($value['price']) }} VNĐ</h4>
											</div>
											<div class="actions" data-th="">
												<button class="delete cart_remove"><a target="_self"><strong><i class="fa fa-close" style="color: red;"></i></strong></a></button>
												<!-- <button class="delete cart_remove"><i class="fa fa-close" style="color: red;"></i></button> -->
											</div>
										</div>
										@endforeach
										@endif
									</div>
									<div class="cart-summary">
										@php $total = 0 @endphp
										@foreach((array) session('cart') as $id => $value)
										@php $total += $value['price'] * $value['quantity'] @endphp
										@endforeach
										<h5>SUBTOTAL: {{ number_format( $total ) }} VNĐ</h5>
									</div>
									<div class="cart-btns">
										<a href="{{ route('cart') }}">View Cart</a>
										<a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
							</div>
							<!-- /Cart -->

							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<nav id="navigation">
		<!-- container -->
		<div class="container">
			<!-- responsive-nav -->
			<div id="responsive-nav">
				<!-- NAV -->
				<ul class="main-nav nav navbar-nav">
					<li class="active"><a href="{{ route('index') }}">Home</a></li>
					<li><a href="{{ route('aboutUs') }}">About Us</a></li>
					<li><a href="{{ route('contact') }}">Contact Us</a></li>
				</ul>
				<!-- /NAV -->
			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>
	<!-- /NAVIGATION -->

	@yield('content')
	@yield('about-us')
	<!-- FOOTER -->
	<footer id="footer">
		<!-- top footer -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">About Us</h3>
							<p>Web shop</p>
							<ul class="footer-links">
								<li><a href="#"><i class="fa fa-map-marker"></i>TP.HCM</a></li>
								<li><a href="#"><i class="fa fa-phone"></i>+0987 633 254</a></li>
								<li><a href="#"><i class="fa fa-envelope-o"></i>tdc@email.com</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Categories</h3>
							<ul class="footer-links">
								<li><a href="#">Hot deals</a></li>
								<li><a href="#">Laptops</a></li>
								<li><a href="#">Smartphones</a></li>
								<li><a href="#">Speakers</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>
						</div>
					</div>

					<div class="clearfix visible-xs"></div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Information</h3>
							<ul class="footer-links">
								<li><a href="{{route('aboutUs')}}">About Us</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Orders and Returns</a></li>
								<li><a href="#">Terms & Conditions</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Service</h3>
							<ul class="footer-links">
								<li><a href="#">My Account</a></li>
								<li><a href="{{route('cart')}}">View Cart</a></li>
								<li><a href="{{route('wish')}}">Wishlist</a></li>
								<li><a href="#">Track My Order</a></li>
								<li><a href="#">Help</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /top footer -->

		<!-- bottom footer -->
		<div id="bottom-footer" class="section">
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12 text-center">
						<ul class="footer-payments">
							<li><a href="#"><i class="fa-brands fa-cc-visa"></i></a></li>
							<li><a href="#"><i class="fa-regular fa-credit-card"></i></a></li>
							<li><a href="#"><i class="fa-brands fa-paypal"></i></a></li>
							<li><a href="#"><i class="fa-brands fa-cc-mastercard"></i></a></li>
							<li><a href="#"><i class="fa-brands fa-cc-discover"></i></i></a></li>
							<li><a href="#"><i class="fa-brands fa-cc-amex"></i></a></li>
						</ul>
						<span class="copyright">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script> All rights reserved
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</span>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bottom footer -->
	</footer>
	<!-- /FOOTER -->
	<!-- jQuery Plugins -->
	<script type="text/javascript">
		$(".cart_update").change(function(e) {
			e.preventDefault();

			var ele = $(this);

			$.ajax({
				url: '{{ route("update_cart") }}',
				method: "patch",
				data: {
					_token: '{{ csrf_token() }}',
					id: ele.parents("tr").attr("data-id"),
					quantity: ele.parents("tr").find(".quantity").val()
				},
				success: function(response) {
					window.location.reload();
				}
			});
		});

		$(".cart_remove").click(function(e) {
			e.preventDefault();

			var ele = $(this);

			if (confirm("Do you really want to remove?")) {
				$.ajax({
					url: '{{ route("remove_from_cart") }}',
					method: "DELETE",
					data: {
						_token: '{{ csrf_token() }}',
						id: ele.parents("tr").attr("data-id")
					},
					success: function(response) {
						window.location.reload();
					}
				});
			}
		});
	</script>
	<script src="{{ asset('js/index/jquery.min.js') }}"></script>
	<script src="{{ asset('js/index/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/index/slick.min.js') }}"></script>
	<script src="{{ asset('js/index/nouislider.min.js') }}"></script>
	<script src="{{ asset('js/index/jquery.zoom.min.js') }}"></script>
	<script src="{{ asset('js/index/main.js') }}"></script>
	@yield('scripts')
</body>

</html>