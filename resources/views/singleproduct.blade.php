@extends('layouts.fontend_master')

@section('content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Start Bradcaump area -->
 <div class="ht__bradcaump__area bg-image--4">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="bradcaump__inner text-center">
                   <h2 class="bradcaump-title">Shop Single</h2>
                     <nav class="bradcaump-content">
                       <a class="breadcrumb_item" href="{{ route('welcome') }}">Home</a>
                       <span class="brd-separetor">/</span>
                       <span class="breadcrumb_item active">Shop Single</span>
                     </nav>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- End Bradcaump area -->
 {{-- {{ print_r($product_info->relationproductsgallerytable) }} --}}
 <!-- Start main Content -->
 <div class="maincontent bg--white pt--80 pb--55">
   <div class="container">
     <div class="row">
       <div class="col-lg-9 col-12">
         <div class="wn__single__product">
           <div class="row">
             <div class="col-lg-6 col-12">
               <div class="wn__fotorama__wrapper">
                 <div class="fotorama wn__fotorama__action" data-nav="thumbs">
                        <a href="{{ asset('1.jpg') }}"><img src="{{ asset('uploads/product_photos') }}/{{ $product_info->product_photo }}" alt=""></a>
                        {{-- <a href="{{ asset('uploads/product_photos') }}/{{ $product_info->product_photo }}"><img src="{{ asset('uploads/product_photos') }}/{{ $product_info->product_photo }}" alt=""></a> --}}
                    @foreach ($product_info->relationproductsgallerytable as $single_galler_product)
                      <a href="{{ asset('1.jpg') }}"><img src="{{ asset('uploads/product_gallery') }}/{{ $single_galler_product->galler_images }}" alt=""></a>
                    @endforeach
                 </div>
               </div>
             </div>
             <div class="col-lg-6 col-12">
               @if (session('succssstatus'))
                   <div class="alert alert-success" role="alert">
                       {{ session('succssstatus') }}
                   </div>
               @endif
               @if (session('errorstatus'))
                   <div class="alert alert-danger" role="alert">
                       {{ session('errorstatus') }}
                   </div>
               @endif
               <div class="product__info__main">
                 <h1>{{ $product_info->product_name }}</h1>
                 <div class="product-reviews-summary d-flex">
                   <ul class="rating-summary d-flex">
                   <li><i class="zmdi zmdi-star-outline"></i></li>
                   <li><i class="zmdi zmdi-star-outline"></i></li>
                   <li><i class="zmdi zmdi-star-outline"></i></li>
                   <li class="off"><i class="zmdi zmdi-star-outline"></i></li>
                   <li class="off"><i class="zmdi zmdi-star-outline"></i></li>
                   </ul>
                 </div>
                 <div class="price-box">
                   <span>${{ $product_info->product_price}}</span>
                 </div>
             <div class="product__overview">
                   <p>{{ $product_info->products_shot_details ?? "NO Products Shot Details"}}</p>
                 </div>
                 <form class="" action="{{ route('addtocart') }}" method="post">
                 <div class="box-tocart d-flex">
                   <input type="hidden" name="product_id" value="{{ $product_info->id }}">
                     @csrf
                   <span>Qty</span>
                   <input id="qty" class="input-text qty" name="quantity" min="1" value="1" title="Qty" type="number">
                   <div class="addtocart__actions">
                        <button class="tocart" type="submit" title="Add to Cart">Add to Cart</button>
                   </div>
                   <!-- {{ route('wishlist') }} -->
                   </form>
               <div class="product-addto-links clearfix" value="{{ $product_info->id }}">
                  <input id="product_id" type="hidden" name="product_id" value="{{ $product_info->id }}">
                 <a class="wishlist" type="radio" id="wishList" onclick="newDoc()" href=""></a>
               </div>
                 </div>
             <div class="product_meta">
               <span class="posted_in">Categories:
                 <a href="#">{{  $product_info->relationcategorytable->category_name }}</a>
                 {{-- <a href="#">Kids' Music</a> --}}
               </span>
             </div>
             <div class="product-share">
               <ul>
                 <li class="categories-title">Share :</li>
                 <li>
                   <a href="http://twitter.com/share?text={{ url()->full() }}" target="_blank">
                     <i class="icon-social-twitter icons"></i>
                   </a>
                 </li>
                 <li>
                   <a href="https://www.tumblr.com/sharer.php?u={{ url()->full() }}" target="_blank">
                     <i class="icon-social-tumblr icons"></i>
                   </a>
                 </li>
                 <li>
                   <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->full() }}" target="_blank">
                     <i class="icon-social-facebook icons"></i>
                   </a>
                 </li>
                 <li>
                   <a href="https://www.linkedin.com/shareArticle?mini=true&url={url}" target="_blank">
                     <i class="icon-social-linkedin icons"></i>
                   </a>
                 </li>
               </ul>
             </div>
               </div>
             </div>
           </div>
         </div>
         <div class="product__info__detailed">
       <div class="pro_details_nav nav justify-content-start" role="tablist">
                       <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">Details</a>
                       <a class="nav-item nav-link" data-toggle="tab" href="#nav-review" role="tab">Reviews</a>
                   </div>
                   <div class="tab__container">
                     <!-- Start Single Tab Content -->
                     <div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
                       <div class="description__attribute">
                         <p>{{ $product_info->products_long_details ?? "NO Products Long Details" }}</p>
                         <ul>
                           <li>• Two-tone gray heather hoodie.</li>
                           <li>• Drawstring-adjustable hood. </li>
                           <li>• Machine wash/dry.</li>
                         </ul>
                       </div>
                     </div>
                     <!-- End Single Tab Content -->
                     <!-- Start Single Tab Content -->
                     <div class="pro__tab_label tab-pane fade" id="nav-review" role="tabpanel">
           <div class="review__attribute">
             <h1>Customer Reviews</h1>
             <h2>Hastech</h2>
             <div class="review__ratings__type d-flex">
               <div class="review-ratings">
                 <div class="rating-summary d-flex">
                   <span>Quality</span>
                     <ul class="rating d-flex">
                     <li><i class="zmdi zmdi-star"></i></li>
                     <li><i class="zmdi zmdi-star"></i></li>
                     <li><i class="zmdi zmdi-star"></i></li>
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     </ul>
                 </div>

                 <div class="rating-summary d-flex">
                   <span>Price</span>
                     <ul class="rating d-flex">
                     <li><i class="zmdi zmdi-star"></i></li>
                     <li><i class="zmdi zmdi-star"></i></li>
                     <li><i class="zmdi zmdi-star"></i></li>
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     </ul>
                 </div>
                 <div class="rating-summary d-flex">
                   <span>value</span>
                     <ul class="rating d-flex">
                     <li><i class="zmdi zmdi-star"></i></li>
                     <li><i class="zmdi zmdi-star"></i></li>
                     <li><i class="zmdi zmdi-star"></i></li>
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     </ul>
                 </div>
               </div>
               <div class="review-content">
                 <p>Hastech</p>
                 <p>Review by Hastech</p>
                 <p>Posted on 11/6/2018</p>
               </div>
             </div>
           </div>
           <div class="review-fieldset">
             <h2>You're reviewing:</h2>
             <h3>Chaz Kangeroo Hoodie</h3>
             <div class="review-field-ratings">
               <div class="product-review-table">
                 <div class="review-field-rating d-flex">
                   <span>Quality</span>
                   <ul class="rating d-flex">
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     </ul>
                 </div>
                 <div class="review-field-rating d-flex">
                   <span>Price</span>
                   <ul class="rating d-flex">
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     </ul>
                 </div>
                 <div class="review-field-rating d-flex">
                   <span>Value</span>
                   <ul class="rating d-flex">
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     <li class="off"><i class="zmdi zmdi-star"></i></li>
                     </ul>
                 </div>
               </div>
             </div>
             <div class="review_form_field">
               <div class="input__box">
                 <span>Nickname</span>
                 <input id="nickname_field" type="text" name="nickname">
               </div>
               <div class="input__box">
                 <span>Summary</span>
                 <input id="summery_field" type="text" name="summery">
               </div>
               <div class="input__box">
                 <span>Review</span>
                 <textarea name="review"></textarea>
               </div>
               <div class="review-form-actions">
                 <button>Submit Review</button>
               </div>
             </div>
           </div>
                     </div>
                     <!-- End Single Tab Content -->
                   </div>
         </div>
     <div class="wn__related__product pt--80 pb--50">
       <div class="section__title text-center">
         <h2 class="title__be--2">Related Products</h2>
       </div>
       <div class="row mt--60">
         <div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
           @foreach ($releted_products as $releted_product)
           <!-- Start Single Product -->
           <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
             <div class="product__thumb">
               <a class="first__img" href="{{ route('product') }}/{{ $releted_product->id }}/{{ Str::slug($releted_product->product_name ) }}"><img src="{{ asset('uploads/product_photos') }}/{{ $releted_product->product_photo }}" alt="product image"></a>
               <a class="second__img animation1" href="{{ route('product') }}/{{ $releted_product->id }}/{{ Str::slug($releted_product->product_name ) }}"><img src="{{ asset('images/books/2.jpg" alt="product image') }}"></a>
               <div class="hot__box">
                 <span class="hot-label">BEST SALLER</span>
               </div>
             </div>
             <div class="product__content content--center">

               <h4><a href="single-product.html">{{ $releted_product->product_name }}</a></h4>
               <ul class="prize d-flex">
                 <li>${{ $releted_product->product_price }}</li>
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
           <!-- Start Single Product -->
           @endforeach
         </div>
       </div>
     </div>
     <div class="wn__related__product">
       <div class="section__title text-center">
         <h2 class="title__be--2">upsell products</h2>


       </div>
       <div class="row mt--60">
         <div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
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
       </div>
     </div>
       </div>
       <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
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
           <h6>save up to <br> <strong>10%</strong>off</h6>
         </div>
           </aside>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- End main Content -->
<!-- Start Search Popup -->
<div class="box-search-content search_active block-bg close__top">
<form id="search_mini_form--2" class="minisearch" action="#">
 <div class="field__search">
   <input type="text" placeholder="Search entire store here...">
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
@endsection

@section('footer_script')

  <script type="text/javascript">

        // $document.getElementById('#wishList').click(function(){
        //   var go_to_link = "{{ route('wishlist') }}";
        //   window.location.href = go_to_link;
        // });
        document.getElementById("wishList").innerHTML =
    "Page hostname is: " + window.location.hostname;
  </script>

@endsection
