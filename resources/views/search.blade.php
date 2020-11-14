@extends('layouts.fontend_master')

@section('content')

{{-- <!-- Start Bradcaump area -->
     <div class="ht__bradcaump__area bg-image--6">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="bradcaump__inner text-center">
                       <h2 class="bradcaump-title">My Account</h2>
                         <nav class="bradcaump-content">
                           <a class="breadcrumb_item" href="{{ route('welcome') }}">Home</a>
                           <span class="brd-separetor">/</span>
                           <span class="breadcrumb_item active">My Account</span>
                         </nav>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Bradcaump area --> --}}
<!-- Start Shop Page -->
    <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
            <div class="shop__sidebar">
              <aside class="wedget__categories poroduct--cat">
                <h3 class="wedget__title">Product Categories</h3>
                <ul>
                  <li><a href="#">Biography <span>(3)</span></a></li>
                  <li><a href="#">Business <span>(4)</span></a></li>
                  <li><a href="#">Cookbooks <span>(6)</span></a></li>
                  <li><a href="#">Health & Fitness <span>(7)</span></a></li>
                  <li><a href="#">History <span>(8)</span></a></li>
                  <li><a href="#">Mystery <span>(9)</span></a></li>
                  <li><a href="#">Inspiration <span>(13)</span></a></li>
                  <li><a href="#">Romance <span>(20)</span></a></li>
                  <li><a href="#">Fiction/Fantasy <span>(22)</span></a></li>
                  <li><a href="#">Self-Improvement <span>(13)</span></a></li>
                  <li><a href="#">Humor Books <span>(17)</span></a></li>
                  <li><a href="#">Harry Potter <span>(20)</span></a></li>
                  <li><a href="#">Land of Stories <span>(34)</span></a></li>
                  <li><a href="#">Kids' Music <span>(60)</span></a></li>
                  <li><a href="#">Toys & Games <span>(3)</span></a></li>
                  <li><a href="#">hoodies <span>(3)</span></a></li>
                </ul>
              </aside>


              <aside class="wedget__categories sidebar--banner">
            {{-- <img src="{{ asset('frontend_assets/images/others/banner_left.jpg') }}" alt="banner images"> --}}
            <img src="{{ asset('frontend_assets/images/others/banner_left.jpg') }}" alt="banner images">
            <div class="text">
              <h2>new products</h2>
            </div>
              </aside>
            </div>
          </div>
          <div class="col-lg-9 col-12 order-1 order-lg-2">
            <div class="row">
              <div class="col-lg-12">
            <div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
              </div>
            </div>
            <div class="tab__container">
              <div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
                <div class="row">
                  @foreach ($search_products as $search_product)
                  <!-- Start Single Product -->
                  <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="product__thumb">
                  <a class="first__img" href="single-product.html"><img src="{{ asset('uploads/product_photos') }}/{{ $search_product->product_photo }}" alt="product image"></a>
                  {{-- <a class="second__img animation1" href="single-product.html"><img src="{{ asset('frontend_assets/images/books/2.jpg') }}" alt="product image"></a> --}}
                  <div class="hot__box">
                    <span class="hot-label">BEST SALLER</span>
                  </div>
                </div>
                <div class="product__content content--center">
                  <h4><a href="single-product.html">{{ $search_product->product_name }}</a></h4>
                  <ul class="prize d-flex">
                    <li>${{ $search_product->product_price }}</li>
                    <li class="old_prize">$35.00</li>
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
                  <!-- End Single Product -->
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Shop Page -->

@endsection
