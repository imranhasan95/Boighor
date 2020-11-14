@extends('layouts.fontend_master')

@section('content')
        <!-- Start Slider area -->
        <div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
          @foreach ($sliders as $slider)
            <!-- Start Single Slide -->
            <div class="slide animation__style10 bg-image--1 fullscreen align__center--left" style="background-image: url({{ asset('uploads/slider_imegrs') }}/{{ $slider->slider_imegrs }})">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="slider__content">
                        <div class="contentbox">
                          <h2><span>{{ $slider->slider_title }}</span></h2>
                              <a class="shopbtn" href="{{ route('shop') }}">shop now</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Single Slide -->
          @endforeach
        </div>
        <!-- End Slider area -->
		<!-- Start BEst Seller Area -->
		<section class="wn__product__area brown--color pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">New <span class="color--theme">Products</span></h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
						</div>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">

          @foreach ($products as $product)
            <!-- Start Single Product -->
            <div class="product product__style--3">
  						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
  							<div class="product__thumb">
  								<a class="first__img" href="{{ route('product') }}/{{ $product->id }}/{{ Str::slug($product->product_name ) }}"><img src="{{ asset('uploads/product_photos') }}/{{ $product->product_photo }}" alt="product image"></a>
  								<a class="second__img animation1" href="{{ route('product') }}/{{ $product->id }}/{{ Str::slug($product->product_name ) }}"><img src="{{ asset('font_end/images/books/2.jpg') }}" alt="product image"></a>
  								<!-- <div class="hot__box">
  									<span class="hot-label">BEST SALLER</span>
  								</div> -->
  							</div>
  							<div class="product__content content--center">
  								<h4><a href="{{ route('product') }}/{{ $product->id }}/{{ Str::slug($product->product_name ) }}">{{ $product->product_name}}</a></h4>
  								<ul class="prize d-flex">
  									<li>${{ $product->product_price}}.00</li>
  									<!-- <li class="old_prize">$35.00</li> -->
  								</ul>
  								<div class="action">
  									<div class="actions_inner">
  										<ul class="add_to_links">
  											<li><a class="cart" href="{{ route('cart') }}"><i class="bi bi-shopping-bag4"></i></a></li>
  											<li><a class="wishlist" href="{{ route('wishlist') }}"><i class="bi bi-shopping-cart-full"></i></a></li>
  											<li><a class="compare" href="{{ route('campaign') }}"><i class="bi bi-heart-beat"></i></a></li>
  										</ul>
  									</div>
  								</div>
  								<div class="product__hover--content">
  									<ul class="rating d-flex">
  										<li class="on"><i class="fa fa-star-o"></i></li>
  										<li class="on"><i class="fa fa-star-o"></i></li>
  										<li class="on"><i class="fa fa-star-o"></i></li>
  										<li><i class="fa fa-star-o"></i></li>
  										<li><i class="fa fa-star-o"></i></li>
  									</ul>
  								</div>
  							</div>
  						</div>
  					</div>
          @endforeach

					<!-- Start Single Product -->
				</div>
				<!-- End Single Tab Content -->
			</div>
		</section>
		<!-- Start BEst Seller Area -->
		<!-- Start NEwsletter Area -->
		<section class="wn__newsletter__area bg-image--2">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 offset-lg-5 col-md-12 col-12 ptb--150">
						<div class="section__title text-center">
							<h2>Stay With Us</h2>
						</div>
						<div class="newsletter__block text-center">
							<p>Subscribe to our newsletters now and stay up-to-date with new collections, the latest lookbooks and exclusive offers.</p>
							<form action="#">
								<div class="newsletter__box">
									<input type="email" placeholder="Enter your e-mail">
									<button>Subscribe</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End NEwsletter Area -->
		<!-- Start Best Seller Area -->
		<section class="wn__bestseller__area bg--white pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">All <span class="color--theme">Products</span></h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
						</div>
					</div>
				</div>
				<div class="row mt--50">
					<div class="col-md-12 col-lg-12 col-sm-12">
						<div class="product__nav nav justify-content-center" role="tablist">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#nav-all" role="tab">ALL</a>
                    @foreach ($categores as $category)
                      <a class="nav-item nav-link" data-toggle="tab" href="#nav-{{ $category->id }}" role="tab">{{ $category->category_name }}</a>
                    @endforeach
              </div>
					</div>
				</div>
				<div class="tab__container mt--60">
					<!-- Start Single Tab Content -->
					<div class="row single__tab tab-pane fade show active" id="nav-all" role="tabpanel">
						<div class="product__indicator--4 arrows_style owl-carousel owl-theme">
                @foreach ($products as $product)
                  <div class="single__product">
                  <!-- Start Single Product -->
                  <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="product product__style--3">
                      <div class="product__thumb">
                        <a class="first__img" href="{{ route('product') }}/{{ $product->id }}/{{ Str::slug($product->product_name ) }}"><img src="{{ asset('uploads/product_photos') }}/{{ $product->product_photo }}" alt="product image"></a>
                        <a class="second__img animation1" href="{{ route('product') }}/{{ $product->id }}/{{ Str::slug($product->product_name ) }}"><img src="{{ asset('images/books/2.jpg') }}" alt="product image"></a>
                        <div class="hot__box">
                          <span class="hot-label">BEST SALER</span>
                        </div>
                      </div>
                      <div class="product__content content--center content--center">
                        <h4><a href="{{ route('product') }}/{{ $product->id }}/{{ Str::slug($product->product_name ) }}">{{ $product->product_name }}</a></h4>
                        <ul class="prize d-flex">
                          <li>${{ $product->product_price }}</li>
                          {{-- <li class="old_prize">$35.00</li> --}}
                        </ul>
                        <div class="action">
                          <div class="actions_inner">
                            <ul class="add_to_links">
                              <li><a class="cart" href="{{ route('cart') }}"><i class="bi bi-shopping-bag4"></i></a></li>
                              <li><a class="wishlist" href="{{ route('wishlist') }}"><i class="bi bi-shopping-cart-full"></i></a></li>
                              <li><a class="compare" href="{{ route('campaign') }}"><i class="bi bi-heart-beat"></i></a></li>

                            </ul>
                          </div>
                        </div>
                        <div class="product__hover--content">
                          <ul class="rating d-flex">
                            <li class="on"><i class="fa fa-star-o"></i></li>
                            <li class="on"><i class="fa fa-star-o"></i></li>
                            <li class="on"><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Start Single Product -->
                </div>
                @endforeach
						</div>
					</div>
					<!-- End Single Tab Content -->
          @foreach ($categores as $category)
            <!-- Start Single Tab Content -->
            <div class="row single__tab tab-pane fade" id="nav-{{ $category->id }}" role="tabpanel">
              <div class="product__indicator--4 arrows_style owl-carousel owl-theme">
                @php
                  $categor_products = App\Product::where('category_id', $category->id)->get();
                @endphp
                @foreach ($categor_products as $categor_product)
                  <div class="single__product">
                  <!-- Start Single Product -->
                  <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="product product__style--3">
                      <div class="product__thumb">
                        <a class="first__img" href="{{ route('product') }}/{{ $product->id }}/{{ Str::slug($product->product_name ) }}"><img src="{{ asset('uploads/product_photos') }}/{{ $categor_product->product_photo }}" alt="product image"></a>
                        <a class="second__img animation1" href="{{ route('product') }}/{{ $product->id }}/{{ Str::slug($product->product_name ) }}"><img src="{{ asset('images/books/1.jpg') }}" alt="product image"></a>
                        <div class="hot__box">
                          <span class="hot-label">BEST SALLER</span>
                        </div>
                      </div>
                      <div class="product__content content--center">
                        <h4><a href="{{ route('product') }}/{{ $product->id }}/{{ Str::slug($product->product_name ) }}">{{ $categor_product->product_name }}</a></h4>
                        <ul class="prize d-flex">
                          <li>${{ $categor_product->product_price }}</li>
                          {{-- <li class="old_prize">$35.00</li> --}}
                        </ul>
                        <div class="action">
                          <div class="actions_inner">
                            <ul class="add_to_links">
                              <li><a class="cart" href="cart.html"><i class="bi bi-shopping-bag4"></i></a></li>
                              <li><a class="wishlist" href="wishlist.html"><i class="bi bi-shopping-cart-full"></i></a></li>
                              <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>

                            </ul>
                          </div>
                        </div>
                        <div class="product__hover--content">
                          <ul class="rating d-flex">
                            <li class="on"><i class="fa fa-star-o"></i></li>
                            <li class="on"><i class="fa fa-star-o"></i></li>
                            <li class="on"><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Start Single Product -->
                </div>
                @endforeach
              </div>
            </div>
            <!-- End Single Tab Content -->
          @endforeach
				</div>
			</div>
		</section>
		<!-- Start BEst Seller Area -->
		<!-- Start Recent Post Area -->
		<section class="wn__recent__post bg--gray ptb--80">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">Our <span class="color--theme">Blog</span></h2>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
						</div>
					</div>
				</div>
				<div class="row mt--50">
            @foreach ($blogalls as $bloga)
					       <div class="col-md-6 col-lg-4 col-sm-12">
						<div class="post__itam">
							<div class="content">
								<h3><a href="{{ url('blogdetails') }}/{{ $bloga->id }}/{{ Str::slug($bloga->blog_title ) }}">{{ $bloga->blog_title }}</a></h3>
								<p>{{ $bloga->blog_shot_details }}.</p>
								<div class="post__time">
									<span class="day">{{ $bloga->created_at->format('M-d-Y ') }}</span>
									<div class="post-meta">
										<ul>
                      <li>
                      @foreach ($Likes as $Like)
                      <span id="likes-count-{{ $Like->id }}">{{ $Like->likes_count }}</span>
                        <button onclick="actOnlike(event);" data-like-id="{{ $Like->id }}">Like</button>
                      </li>
                      @endforeach

											<li><a href="#"><i class="bi bi-chat-bubble"></i> {{ $count_info }} coment</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
           @endforeach
				</div>
			</div>
		</section>
		<!-- End Recent Post Area -->
		<!-- Best Sale Area -->
    <section class="wn__product__area brown--color pt--80  pb--30">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section__title text-center">
              <h2 class="title__be--2">New <span class="color--theme">Products</span></h2>
              <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
            </div>
          </div>
        </div>
        <!-- Start Single Tab Content -->
        <div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
          <!-- Start Single Product -->
          @foreach ($invoices as $invoice)
          <div class="product product__style--3">
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
              <div class="product__thumb">
                <a class="first__img" href="{{ route('product') }}/{{ $invoice->id }}/{{ Str::slug($invoice->product_photo )  }}"><img src="{{ asset('uploads/product_photos') }}/{{ $invoice->product_photo }}" alt="product image"></a>
                <a class="second__img animation1" href="{{ route('product') }}/{{ $invoice->id }}/{{ Str::slug($invoice->product_photo )  }}"><img src="{{ asset('uploads/product_photos') }}/{{ $invoice->product_photo }}" alt="product image"></a>
                <div class="hot__box">
                  <span class="hot-label">BEST SALLER</span>
                </div>
              </div>
              <div class="product__content content--center">
                <h4><a href="{{ route('product') }}/{{ $invoice->id }}/{{ Str::slug($invoice->product_name ) }}">{{ $invoice->product_name }}</a></h4>
                <ul class="prize d-flex">
                  <li>${{ $invoice->product_price }} </li>
                  <!-- <li class="old_prize">$35.00</li> -->
                </ul>
                <div class="action">
                  <div class="actions_inner">
                    <ul class="add_to_links">
                      <li><a class="cart" href="{{ route('cart') }}"><i class="bi bi-shopping-bag4"></i></a></li>
                      <li><a class="wishlist" href="{{ route('wishlist') }}"><i class="bi bi-shopping-cart-full"></i></a></li>
                      <li><a class="compare" href="{{ route('campaign') }}"><i class="bi bi-heart-beat"></i></a></li>

                    </ul>
                  </div>
                </div>
                <div class="product__hover--content">
                  <ul class="rating d-flex">
                    <li class="on"><i class="fa fa-star-o"></i></li>
                    <li class="on"><i class="fa fa-star-o"></i></li>
                    <li class="on"><i class="fa fa-star-o"></i></li>
                    <li><i class="fa fa-star-o"></i></li>
                    <li><i class="fa fa-star-o"></i></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          <!-- Start Single Product -->
        </div>
        <!-- End Single Tab Content -->
      </div>
    </section>
		<!-- Best Sale Area Area -->
@endsection

@section('footer_script')
<script>
        var updateLikeStats = {
            Like: function (likeId) {
                document.querySelector('#likes-count-' + likeId).textContent++;
            },

            Unlike: function(likeId) {
                document.querySelector('#likes-count-' - likeId).textContent--;
            }
        };


        var toggleButtonText = {
            Like: function(button) {
                button.textContent = "Unlike";
            },

            Unlike: function(button) {
                button.textContent = "Like";
            }
        };

        var actOnlike = function (event) {
            var likeId = event.target.dataset.likeId;
            var action = event.target.textContent;
            toggleButtonText[action](event.target);
            updateLikeStats[action](likeId);
            axios.post('/like/' + likeId + '/act',
                { action: action });
        };

    </script>
@endsection
