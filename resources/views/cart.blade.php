@extends('layouts.fontend_master')

@section('content')
  <!-- Start Bradcaump area -->
       <div class="ht__bradcaump__area bg-image--3">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="bradcaump__inner text-center">
                         <h2 class="bradcaump-title">Shopping Cart</h2>
                           <nav class="bradcaump-content">
                             <a class="breadcrumb_item" href="{{ route('welcome') }}">Home</a>
                             <span class="brd-separetor">/</span>
                             <span class="breadcrumb_item active">Shopping Cart</span>
                           </nav>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- End Bradcaump area -->
       <!-- cart-main-area start -->
       <div class="cart-main-area section-padding--lg bg--white">
           <div class="container">
               <div class="row">
                   <div class="col-md-12 col-sm-12 ol-lg-12">
                     @if (session('success'))
                         <div class="alert alert-success">
                           {{ session('success') }}
                         </div>
                     @endif
                           <div class="table-content wnro__table table-responsive">
                               <table>
                                   <thead>
                                       <tr class="title-top">
                                           <th class="product-thumbnail">Image</th>
                                           <th class="product-name">Product</th>
                                           <th class="product-price">Price</th>
                                           <th class="product-quantity">Quantity</th>
                                           <th class="product-subtotal">Total</th>
                                           <th class="product-remove">Remove</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                     <form action="{{ route('cartupdate') }}" method="post">
                                       @csrf
                                     @forelse (getcartaddproducts() as $getcartaddproduct)
                                       <tr>
                                           <td class="product-thumbnail"><a href="#"><img src="{{ asset('uploads/product_photos') }}/{{ $getcartaddproduct->relationproducttable->product_photo }}" alt="product img"></a></td>
                                           <td class="product-name"><a href="#">{{ $getcartaddproduct->relationproducttable->product_name }}</a></td>
                                           <td class="product-price"><span class="amount">${{ $getcartaddproduct->relationproducttable->product_price}}</span></td>
                                           <td class="product-quantity">
                                             <input type="hidden" name="cart_id[]" value="{{ $getcartaddproduct->id }}">
                                             <input type="number" name="cart_amount[]" value="{{ $getcartaddproduct->quantity }}">
                                           </td>
                                           <td class="product-subtotal">${{ $getcartaddproduct->relationproducttable->product_price * $getcartaddproduct->quantity  }}</td>
                                           <td class="product-remove"><a href="{{ route('cartremove', $getcartaddproduct->id) }}">X</a></td>
                                       </tr>
                                     @empty
                                       <tr>
                                           <td> Not Added Product </td>
                                       </tr>
                                     @endforelse
                                   </tbody>
                               </table>
                           </div>
                       <div class="cartbox__btn">
                           <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                               <li>
                                 <input id="coupon_name" type="text" name="" value="{{ $coupon_name }}" placeholder="Coupon Code">
                                 <br>
                                 @if ($errors->all())
                                         @foreach ($errors->all() as $error)
                                           <span class="text-danger">{{ $error }}</span>
                                         @endforeach
                                 @endif
                               </li>
                               <li><a id="apply_code" href="#">Apply Code</a></li>
                               <li>
                                 <button type="submit" name="button">Update Cart</button>
                               </li>
                              </form>
                               <li><a href="{{ route('checkout') }}/{{ $coupon_name }}">Check Out</a></li>
                           </ul>
                       </div>
                   </div>
               </div>
               <div class="row">
                   <div class="col-lg-6 offset-lg-6">
                       <div class="cartbox__total__area">
                           <div class="cartbox-total d-flex justify-content-between">
                               <ul class="cart__total__list">
                                   <li>Cart total</li>
                                   <li>Coupon Discount total</li>
                                   {{-- <li>Sub Total</li> --}}
                               </ul>
                               <ul class="cart__total__tk">
                                   <li>${{ getcartaddprice() }}</li>
                                   <li>
                                     @if (!Str::endsWith($coupon_discount, '%'))
                                       $
                                     @endif
                                     {{ $coupon_discount }}
                                   </li>
                                   {{-- <li>${{ getcartaddprice() }}</li> --}}
                               </ul>
                           </div>
                           <div class="cart__total__amount">
                               <span>Grand Total</span>
                               <span>$
                                 @if (Str::endsWith($coupon_discount, '%'))
                                   {{ getcartaddprice() - ((Str::before($coupon_discount, '%') / 100) * getcartaddprice()) }}
                                   @else
                                     @if ( getcartaddprice() > $coupon_discount )
                                       {{ getcartaddprice() - $coupon_discount }}
                                       @else
                                         Not Coupon value!
                                     @endif
                                 @endif
                               </span>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- cart-main-area end -->
@endsection

@section('footer_script')
  <script type="text/javascript">
      $(document).ready(function (){
        $('#apply_code').click(function(){
          var coupon_name = $('#coupon_name'). val();
          var go_to_link = "{{ route('cart') }}"+"/"+coupon_name;
          window.location.href = go_to_link;
        });
      });
  </script>
@endsection
