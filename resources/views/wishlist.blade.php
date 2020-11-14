@extends('layouts.fontend_master')

@section('content')
  <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Wishlist</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="{{ route('welcome') }}">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Wishlist</span>
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
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table wnro__table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-remove"></th>
                                                <th class="product-thumbnail"></th>
                                                <th class="product-name"><span class="nobr">Product Name</span></th>
                                                <th class="product-price"><span class="nobr"> Unit Price </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Stock Status </span></th>
                                                <th class="product-add-to-cart"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach (getcartaddproducts() as $getcartaddproduct)
                                            <tr>
                                                <td class="product-remove"><a href="{{ route('cartremove', $getcartaddproduct->id) }}">X</a></td>
                                                <td class="product-thumbnail"><a href="#"><img src="{{ asset('uploads/product_photos') }}/{{ $getcartaddproduct->relationproducttable->product_photo }}" width="80" height="100" alt=""></a></td>
                                                <td class="product-name"><a href="#">{{ $getcartaddproduct->relationproducttable->product_name }}</a></td>
                                                <td class="product-price"><span class="amount">{{ $getcartaddproduct->relationproducttable->product_price}}</span></td>
                                                <td class="product-stock-status"><span class="wishlist-in-stock">In Stock</span></td>
                                                <td class="product-add-to-cart"><a href="{{ route('cart') }}"> Add to Cart</a></td>
                                            </tr>
                                          @endforeach
                                        </tbody>
                                    </table>
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
