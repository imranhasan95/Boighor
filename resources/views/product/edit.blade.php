@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-5 m-auto">
              <div class="card">
                  <div class="card-header text-center ">Edit Products  - {{ $product_info->product_name }}</div>
                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
                      <form method="post" action="{{  route('producupdate') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Category Name</label>
                            <select class="form-control" name="category_id">
                              <option value=""> Select One </option>
                              @foreach ($categoreis as $category)
                                <option value="{{ $category->id }}" {{ ($product_info->category_id == $category->id ) ? "selected":"" }}> {{ $category->category_name }} </option>
                              @endforeach
                            </select>
                        </div>
                          <div class="form-group">
                            <label for="exampleInputName">Products Name</label>
                            <input type="text" class="form-control" placeholder="Enter Products Name" name="product_name" value="{{ $product_info->product_name }}">
                            <input type="hidden" class="form-control" name="product_id" value="{{ $product_info->id }}">
                            @error ('product_name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName">Products Price</label>
                            <input type="text" class="form-control" placeholder="Enter Products Price" name="product_price" value="{{ $product_info->product_price }}">
                            @error ('product_price')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName">Products Quantity</label>
                            <input type="text" class="form-control" placeholder="Enter Products Quantity" name="product_quantity" value="{{ $product_info->product_quantity }}">
                            @error ('product_quantity')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName">Alert Quantity</label>
                            <input type="text" class="form-control" placeholder="Enter Alert Quantity" name="alert_uantity" value="{{ $product_info->alert_uantity }}">
                            @error ('alert_uantity')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label >Current Photo</label>
                            <img src="{{ asset('uploads/product_photos') }}/{{ $product_info->product_photo }}" alt="">
                          </div>
                          <div class="form-group">
                            <label >New Photo</label>
                            <input type="file" name="new_photo" class="form-control" onchange="readURL(this);">
                            <img class="hidden" id="tenant_photo_viewer" src="#" alt="your image" />
                            <script>
                             function readURL(input) {
                               if (input.files && input.files[0]) {
                                 var reader = new FileReader();
                                 reader.onload = function (e) {
                                   $('#tenant_photo_viewer').attr('src', e.target.result).width(150).height(195);
                                 };
                                 $('#tenant_photo_viewer').removeClass('hidden');
                                 reader.readAsDataURL(input.files[0]);
                               }
                             }
                             </script>
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
