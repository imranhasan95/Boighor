
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Home | Bookshop </title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="{{ asset('font_end/images/favicon.ico') }}">
	<link rel="apple-touch-icon" href="{{ asset('font_end/images/icon.png') }}">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('font_end/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('font_end/css/plugins.css') }}">
	<link rel="stylesheet" href="{{ asset('font_end/style.css') }}">

	<!-- Cusom css -->
   <link rel="stylesheet" href="{{ asset('font_end/css/custom.css') }}">

	<!-- Modernizer js -->
	<script src="{{ asset('font_end/js/vendor/modernizr-3.5.0.min.js') }}"></script>
	{{-- css select2 js --}}
		<link rel="stylesheet" href="{{  asset('css/select2.min.css')  }}">
</head>
<body>


	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<header id="wn__header" class="header__area header__absolute sticky__header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<div class="logo">
							<a href="index.html">
								<img src="{{ asset('font_end/images/logo/logo.png') }}" alt="logo images">
							</a>
						</div>
					</div>
					<div class="col-lg-8 d-none d-lg-block">
						<nav class="mainmenu__nav">
							<ul class="meninmenu d-flex justify-content-start">
								<li class="drop with--one--item"><a href="{{ route('welcome') }}">Home</a></li>
								<li class="drop"><a href="{{ route('shop') }}">Shop</a></li>
								<li class="drop"><a href="{{ route('campaign') }}">Campaign</a></li>
								<li class="drop"><a href="{{ route('giftcards') }}">Gift Cards</a></li>
								<li class="drop"><a href="{{ route('blog') }}">Blog</a></li>
								<li><a href="{{ route('contact') }}">Contact</a></li>
							</ul>
						</nav>
					</div>
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
							<li class="shop_search"><a class="search__active" href="{{ route('shop') }}"></a></li>
							<li class="wishlist"><a href="{{ route('wishlist') }}"></a></li>
							<li class="shopcart"><a class="cartbox_active" href="{{ route('cart') }}"><span class="product_qun">{{ getcartadded() }}</span></a>
								<!-- Start Shopping Cart -->
								<div class="block-minicart minicart__active">
									<div class="minicart-content-wrapper">
										<div class="micart__close">
											<span>close</span>
										</div>
										<div class="items-total d-flex justify-content-between">
											<span> {{ getcartadded() }}
												@if (getcartadded() <= 1)
													item
													@else
														items
												@endif

											</span>
											<span>Cart Subtotal</span>
										</div>
										<div class="total_amount text-right">
											<span>${{ getcartaddprice() }}</span>
										</div>
										<div class="mini_action checkout">
											<a class="checkout__btn" href="{{ route('checkout') }}">Go to Checkout</a>
										</div>
										<div class="single__items">
											<div class="miniproduct">
												@foreach (getcartaddproducts() as $getcartaddproduct)
													<div class="item01 d-flex">
														<div class="thumb">
															<a href="product-details.html"><img src="{{ asset('uploads/product_photos') }}/{{ $getcartaddproduct->relationproducttable->product_photo }}" alt="product images"></a>
														</div>
														<div class="content">
															<h6><a href="product-details.html">{{ $getcartaddproduct->relationproducttable->product_name }}</a></h6>
															<span class="prize">${{ $getcartaddproduct->relationproducttable->product_price * $getcartaddproduct->quantity  }}</span>
															<div class="product_prize d-flex justify-content-between">
																<span class="qun">Qty: {{ $getcartaddproduct->quantity }}</span>
																<ul class="d-flex justify-content-end">
																	<li><a href="#"><i class="zmdi zmdi-settings"></i></a></li>
																	<li><a href="#"><i class="zmdi zmdi-delete"></i></a></li>
																</ul>
															</div>
														</div>
													</div>
												@endforeach
											</div>
										</div>
										<div class="mini_action cart">
											<a class="cart__btn" href="{{ route('cart') }}">View and edit cart</a>
										</div>
									</div>
								</div>
								<!-- End Shopping Cart -->
							</li>
							<li class="setting__bar__icon"><a class="setting__active" href="#"></a>
								<div class="searchbar__content setting__block">
									<div class="content-inner">

										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>My Account</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">
														<span><a href="{{ route('login') }}">My Account</a></span>
														<span><a href="{{ route('wishlist') }}">My Wishlist</a></span>
														<span><a href="{{ route('login') }}">Sign In</a></span>
														<span><a href="{{ route('customerregister') }}">Create An Account</a></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!-- Start Mobile Menu -->
				<div class="row d-none">
					<div class="col-lg-12 d-none">
						<nav class="mobilemenu__nav">
							<ul class="meninmenu">
								<li><a href="{{ route('welcome') }}">Home</a></li>
								<li><a href="{{ route('shop') }}">Shop</a></li>
								<li><a href="{{ route('blog') }}">Blog</a></li>
								<li><a href="{{ route('contact') }}">Contact</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- End Mobile Menu -->
	            <div class="mobile-menu d-block d-lg-none">
	            </div>
	            <!-- Mobile Menu -->
			</div>
		</header>
		<!-- //Header -->
		<!-- Start Search Popup -->
		<div class="brown--color box-search-content search_active block-bg close__top">
			<form id="search_mini_form" class="minisearch" action="{{ url('search-results') }}"  method="get">
				<div class="field__search">
					<input type="text" placeholder="Search entire store here..." name="filter[product_name]">
					<div class="action">
						<a href="#"><i class="zmdi zmdi-search"></i></a>
					</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>close</span>
			</div>
		</div>
		<!-- End Search Popup -->

      @yield('content')

    <!-- Footer Area -->
    <footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
      <div class="footer-static-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="footer__widget footer__menu">
                <div class="ft__logo">
                  <a href="index.html">
                    <img src="{{ asset('font_end/images/logo/3.png') }}" alt="logo">
                  </a>
                  <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered duskam alteration variations of passages</p>
                </div>
                <div class="footer__content">
                  <ul class="social__net social__net--2 d-flex justify-content-center">
                    <li><a href="  https://web.facebook.com/imran.hasan.3152 " target="_blank"><i class="bi bi-facebook"></i></a></li>
                    <li><a href=" https://googleblog.blogspot.com/2009/12/making-urls-shorter-for-google-toolbar.html " target="_blank"><i class="bi bi-google"></i></a></li>
                    <li><a href=" https://twitter.com/md_imranhasan " target="_blank"><i class="bi bi-twitter"></i></a></li>
                    <li><a href=" https://www.linkedin.com/in/md-imran-hasan-081275177/ " target="_blank"><i class="bi bi-linkedin"></i></a></li>
                    <li><a href=" https://www.youtube.com/channel/UCc5rTkIwz_7qhmrB6Lpvsmw?guided_help_flow=3 " target="_blank"><i class="bi bi-youtube"></i></a></li>
                  </ul>
                  <ul class="mainmenu d-flex justify-content-center">
                    <li><a href="{{ route('team') }}">Trending</a></li>
                    <li><a href="{{ route('bestseller') }}">Best Seller</a></li>
                    <li><a href="{{ route('shop') }}">All Product</a></li>
                    <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright__wrapper">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="copyright">
                <div class="copy__right__inner text-left">
                  <p>Copyright <i class="fa fa-copyright"></i> <a href="">Free themes Cloud.</a> All Rights Reserved</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="payment text-right">
                <img src="{{ asset('font_end/images/icons/payment.png') }}" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- //Footer Area -->

  </div>
  <!-- //Main wrapper -->

  <!-- JS Files -->
  <script src="{{ asset('font_end/js/vendor/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('font_end/js/popper.min.js') }}"></script>
  <script src="{{ asset('font_end/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('font_end/js/plugins.js') }}"></script>
  <script src="{{ asset('font_end/js/active.js') }}"></script>
	<script src="{{ asset('js/select2.min.js') }}"></script>
	 <script src="{{ asset('js/app.js') }}"></script>
    @yield('footer_script')
		<!--Start of Tawk.to Script-->
		<script type="text/javascript">
				var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
				(function(){
				var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
				s1.async=true;
				s1.src='https://embed.tawk.to/5e622011c32b5c191739ebfe/default';
				s1.charset='UTF-8';
				s1.setAttribute('crossorigin','*');
				s0.parentNode.insertBefore(s1,s0);
				})();
		</script>
		<!--End of Tawk.to Script-->
</body>
</html>
