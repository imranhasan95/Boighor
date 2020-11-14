@extends('layouts.fontend_master')

@section('content')
  <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach ($releted_campaign as $releted_campa)
                        <div class="bradcaump__inner text-center">
                            <nav class="bradcaump-content">
                                <img src="{{ asset('uploads/campaign_images') }}/{{ $releted_campa->campaign_images }}" alt="Not Found">
                            </nav>
                        </div>
                          @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="wishlist-area section-padding--lg bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table wnro__table table-responsive">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
@endsection

@section('footer_script')

@endsection
