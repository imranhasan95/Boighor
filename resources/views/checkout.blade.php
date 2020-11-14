@extends('layouts.fontend_master')

@section('content')
  <!-- Start Bradcaump area -->
       <div class="ht__bradcaump__area bg-image--4">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="bradcaump__inner text-center">
                         <h2 class="bradcaump-title">Checkout</h2>
                           <nav class="bradcaump-content">
                             <a class="breadcrumb_item" href="{{ route('welcome') }}">Home</a>
                             <span class="brd-separetor">/</span>
                             <span class="breadcrumb_item active">Checkout</span>
                           </nav>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- End Bradcaump area -->
       <!-- Start Checkout Area -->
       <section class="wn__checkout__area section-padding--lg bg__white">
         <div class="container">
           @guest
           <div class="row">
           <div class="col-lg-12">
             <div class="wn_checkout_wrap">
               <div class="checkout_info">
                 <span>Please Register to continue customer@</span>
                 <a class="login" href="{{ route('customerregister') }}">Click here to  Register</a>
               </div>
             </div>
             <div class="wn_checkout_wrap">
               <div class="checkout_info">
                 <span>Please Login to continue customer@ </span>
                 <a class="login" href="{{ url('login')  }}">Click here to  Login</a>
               </div>
             </div>
           </div>
         </div>
           @endguest
           @auth
           <div class="row">
             <div class="col-lg-6 col-12">
               <div class="customer_details">
                <form class="" action="{{ url('stripe/payment') }}" method="post">
                 <h3>Billing details</h3>
                 <div class="customar__field">
                   <div class="margin_between">
                     <div class="input_box space_between">
                       <label>Name <span>*</span></label>
                       <input type="text" value="{{ Auth::user()->name ?? ""}}" name="name">
                     </div>
                   </div>
                   <div class="input_box">
                     <label>Country<span>*</span></label>
                     <select class="select__option" id="country_dropdown" name="country_id">
                   <option value="">Select a country…</option>
                   @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                   @endforeach
                     </select>
                   </div>
                   <div class="input_box">
                     <label>Address <span>*</span></label>
                     <input type="text" placeholder="Street address" name="address">
                   </div>
                   <div class="input_box">
                     <input type="text" placeholder="Apartment, suite, unit etc. (optional)">
                   </div>
                   <div class="input_box">
                     <label>City<span>*</span></label>
                     <select class="select__option" id="city_dropdown" name="city_id">

                     </select>
                   </div>
               <div class="input_box">
                 <label>Postcode / ZIP <span>*</span></label>
                 <input type="text" name="postcode">
               </div>
               <div class="margin_between">
                 <div class="input_box space_between">
                   <label>Phone <span>*</span></label>
                   <input type="text" name="phon_number">
                 </div>

                 <div class="input_box space_between">
                   <label>Email address <span>*</span></label>
                   <input type="email" value="{{ Auth::user()->email ?? ""}}" name="email">
                 </div>
               </div>
                 </div>
               </div>
               <div class="customer_details mt--20">
                 <div class="differt__address">
                   <input name="ship_to_different_address" value="1" type="checkbox">
                   <span>Ship to a different address ?</span>
                 </div>
                 <div class="customar__field differt__form mt--40">
                   <div class="margin_between">
                     <div class="input_box space_between">
                       <label>First name <span>*</span></label>
                       <input type="text">
                     </div>
                     <div class="input_box space_between">
                       <label>last name <span>*</span></label>
                       <input type="text">
                     </div>
                   </div>
                   <div class="input_box">
                     <label>Company name <span>*</span></label>
                     <input type="text">
                   </div>
                   <div class="input_box">
                     <label>Country<span>*</span></label>
                     <select class="select__option">
                   <option>Select a country…</option>
                   <option>Afghanistan</option>
                   <option>American Samoa</option>
                   <option>Anguilla</option>
                   <option>American Samoa</option>
                   <option>Antarctica</option>
                   <option>Antigua and Barbuda</option>
                     </select>
                   </div>
                   <div class="input_box">
                     <label>Address <span>*</span></label>
                     <input type="text" placeholder="Street address">
                   </div>
                   <div class="input_box">
                     <input type="text" placeholder="Apartment, suite, unit etc. (optional)">
                   </div>
                   <div class="input_box">
                     <label>District<span>*</span></label>
                     <select class="select__option">
                   <option>Select a country…</option>
                   <option>Afghanistan</option>
                   <option>American Samoa</option>
                   <option>Anguilla</option>
                   <option>American Samoa</option>
                   <option>Antarctica</option>
                   <option>Antigua and Barbuda</option>
                     </select>
                   </div>
               <div class="input_box">
                 <label>Postcode / ZIP <span>*</span></label>
                 <input type="text">
               </div>
               <div class="margin_between">
                 <div class="input_box space_between">
                   <label>Phone <span>*</span></label>
                   <input type="text">
                 </div>
                 <div class="input_box space_between">
                   <label>Email address <span>*</span></label>
                   <input type="email">
                 </div>
               </div>
                 </div>
               </div>
             </div>
             <div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
               <div class="wn__order__box">
                 <h3 class="onder__title">Your order</h3>
                 <ul class="order__total">
                   <li>Product</li>
                   <li>Total</li>
                 </ul>
                 <ul class="order_product">
                   @foreach (getcartaddproducts() as $getcartaddproduct)
                     <li>{{ $getcartaddproduct->relationproducttable->product_name }} × {{ $getcartaddproduct->quantity }}<span>${{ $getcartaddproduct->relationproducttable->product_price * $getcartaddproduct->quantity }}</span></li>
                   @endforeach
                 </ul>
                 <ul class="shipping__method">
                   <li>Cart Subtotal <span>${{ getcartaddprice() }}</span></li>
                   <li>Flash Sale <span>{{ $discount_amount }}</span>
                     <input type="hidden" name="coupon_name" value="{{ $coupon_name }}">
                   </li>
                   <li>Discount (-) <span>$
                     <span id="discount">
                       @if (Str::endsWith($discount_amount, '%'))
                         @php
                           echo $discount_sale = getcartaddprice() - ((Str::before($discount_amount, '%') / 100) * getcartaddprice());
                         @endphp
                         @else
                           @if ( getcartaddprice() > $discount_amount )
                             @php
                              echo $discount_sale = getcartaddprice() - $discount_amount;
                             @endphp
                             @else
                               Not Coupon value!
                           @endif
                       @endif
                     </span>
                   </span></li>
                   <li>Shipping (+)
                     <ul>
                       <li>
                         <input name="shipping_rate" data-index="0" value="legacy_flat_rate" checked="checked" type="radio" id="shipping_rate60">
                         <label>Flat Rate: $60.00</label>
                       </li>
                       <li>
                         <input name="shipping_rate" data-index="0" value="legacy_flat_rate" type="radio" id="shipping_rate120">
                         <label>Outsite Rate: $120.00</label>
                       </li>
                     </ul>
                   </li>
                 </ul>
                 <ul class="total__amount">
                   <input type="hidden" name="order_total" value="{{ $discount_sale + 60}}" id="order_total_input">
                   <li>Order Total <span>$
                      <span id="order__total_amount">
                        {{ $discount_sale + 60 }}
                      </span>
                   </span></li>
                 </ul>
               </div>
             <div id="accordion" class="checkout_accordion mt--30" role="tablist">
               <div class="payment">
                   <div class="che__header" role="tab" id="headingOne">
                       <a class="checkout__title" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           <span>Direct Bank Transfer</span>
                       </a>
                   </div>
                   <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                       <div class="payment-body">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</div>
                   </div>
               </div>
               <div class="payment">
                   <div class="che__header" role="tab" id="headingTwo">
                       <a class="collapsed checkout__title" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                         <span>Cheque Payment</span>
                       </a>
                   </div>
                   <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                       <div class="payment-body">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</div>
                   </div>
               </div>
               <div class="payment">
                   <div class="che__header" role="tab" id="headingThree">
                       <a class="collapsed checkout__title" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                         <span>Cash on Delivery</span>
                       </a>
                   </div>
                   <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                       <div class="payment-body">Pay with cash upon delivery.</div>
                   </div>
               </div>
               <div class="payment">
                   <div class="che__header" role="tab" id="headingFour">
                       <a class="collapsed checkout__title" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                         <span> Payment  <img src="{{ asset('font_end/images/icons/payment.png') }}" alt="payment images"> </span>
                       </a>
                   </div>
                   <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordion">
                     <div class="payment-body">
                         @csrf
                         <input type="hidden" name="ultimate_final_amount" value="  {{ $discount_sale + 60}}" id="ultimate_final_amount">
                         <button type="submit" class="btn bg-info text-light">Pay with stripe</button>
                       </form>
                     </div>
                   </div>
               </div>
             </div>
             </div>
           </div>
             @endauth
         </div>
       </section>
       <!-- End Checkout Area -->
@endsection

@section('footer_script')
  <script>
  $(document).ready(function() {
    $('#country_dropdown').select2();
    $('#city_dropdown').select2();
    $('#country_dropdown').change(function() {
      var country_id = $(this).val();
      // ajax State here
      $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            type:'POST',
            url:'/getcitylist',
            data:{country_id:country_id},
            success:function(data) {
              $('#city_dropdown').html(data);
            }
          });
      // ajax end here
    });
    // delivery rete amount
    $('#shipping_rate60').click(function() {
      var discount = parseFloat($('#discount').html()) + 60;
      $('#order__total_amount').html(discount);
      $('#order_total_input').val(discount);
      $('#ultimate_final_amount').vla(discount);
    });
    $('#shipping_rate120').click(function() {
      var discount = parseFloat($('#discount').html()) + 120;
      $('#order__total_amount').html(discount);
      $('#order_total_input').val(discount);
      $('#ultimate_final_amount').vla(discount);
    });
    });
  </script>
@endsection
