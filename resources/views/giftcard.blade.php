@extends('layouts.fontend_master')

@section('content')
  <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Gift Cards</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="{{ route('welcome') }}">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Giftcards</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="wishlist-area section-padding--lg bg__white">
            <div class="container">
                <div class="row">
                    @foreach ($card_infos as $card_info)
                    <div class="col-md-6 col-sm-6 col-xs-6">
                      <aside class="wedget__categories sidebar--banner">
                              <img src="{{ asset('uploads/giftcar_photo') }}/{{ $card_info->giftcar_images }}" alt="banner images">
                      </aside>
                      <div class="text">
                        <h2>{{ $card_info->giftcar_name }}</h2>
                        <ul class="prize d-flex">
                          <li>${{$card_info->giftcar_price }}</li>
                        </ul>
                      </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
@endsection

@section('footer_script')

@endsection
