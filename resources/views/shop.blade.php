@extends('layouts.fontend_master')

@section('content')
  <!-- Start Bradcaump area -->
<div class="ht__bradcaump__area bg-image--6">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bradcaump__inner text-center">
                  <h2 class="bradcaump-title">Shop</h2>
                    <nav class="bradcaump-content">
                      <a class="breadcrumb_item" href="{{ route('welcome') }}">Home</a>
                      <span class="brd-separetor">/</span>
                      <span class="breadcrumb_item active">Shop</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Shop Page -->
<div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
        <div class="shop__sidebar">
          <aside class="wedget__categories poroduct--cat">
            <h3 class="wedget__title">Product Categories</h3>
            <ul>
              @foreach ($categores as $categore)
                <li><a href="#"> {{ $categore->category_name }}
                <span>  ({{ App\Product::where('category_id',$categore->id)->count() }})</span>
                </a></li>
              @endforeach
            </ul>
          </aside>
          <aside class="wedget__categories sidebar--banner">
              @foreach ($new_products as $new_product)
                  <img src="{{ asset('uploads/product_photos') }}/{{  $new_product->product_photo}}" alt="banner images">
              @endforeach
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
              @foreach ($products as $product)
                <!-- Start Single Product -->
                <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                  <div class="product__thumb">
                <a class="first__img" href="{{ route('product') }}/{{ $product->id }}/{{ Str::slug($product->product_name ) }}"><img src="{{ asset('uploads/product_photos') }}/{{ $product->product_photo }}" alt="product image"></a>
                <a class="second__img animation1" href="{{ route('product') }}/{{ $product->id }}/{{ Str::slug($product->product_name ) }}"><img src="{{ asset('uploads/product_photos') }}/{{ $product->product_photo }}" alt="product image"></a>
                <div class="hot__box">
                  <span class="hot-label">BEST SALLER</span>
                </div>
              </div>
              <div class="product__content content--center">
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
            <!-- <ul class="wn__pagination">
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
            </ul> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Shop Page -->
@endsection

@section('footer_script')

@endsection
