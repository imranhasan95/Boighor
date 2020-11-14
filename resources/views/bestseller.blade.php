@extends('layouts.fontend_master')

@section('content')
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
        <!-- Start Single Product -->

        <div class="product product__style--3">
          @foreach ($userss as $users)
          <!-- Start Single Product -->
          <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="product__thumb">
             <a class="first__img" href="{{ route('product') }}/{{ $users->id }}/{{ Str::slug($users->product_name ) }}"><img src="{{ asset('uploads/product_photos') }}/{{ $users->product_photo }}" alt="product image"></a>
              <a class="second__img animation1" href="{{ route('product') }}/{{ $users->id }}/{{ Str::slug($users->product_name ) }}"><img src="{{ asset('uploads/product_photos') }}/{{ $users->product_photo }}" alt="product image"></a>
              <div class="hot__box">
                <span class="hot-label">BEST SALLER</span>
              </div>
            </div>
            <div class="product__content content--center">
              <h4><a href="single-product.html">{{ $users->product_name }}</a></h4>
              <ul class="prize d-flex">
                <li>${{ $users->product_price }}</li>
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
          <!-- Start Single Product -->
          @endforeach
        </div>

        <!-- Start Single Product -->
      </div>
      <!-- End Single Tab Content -->
    </div>
  </section>
<!-- Start BEst Seller Area -->
@endsection

@section('footer_script')

@endsection
