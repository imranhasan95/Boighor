@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header text-center">List Products</div>
                  <div class="card-body table-responsive">
                      @if (session('edit_status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('edit_status') }}
                          </div>
                      @endif
                      {{-- <table class="table table-bordered" id="sources"> --}}
                        <table class="table table-bordered text-center " id="example">
                          <thead class="text-center">
                            <tr>
                              <th>SL NO</th>
                              <th>Product Name</th>
                              <th>Category Name</th>
                              <th>Product Price</th>
                              <th>Product Quantity</th>
                              <th>Alert Qantity</th>
                              <th>Product Photo</th>
                              <th>Created At</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody class="text-center">
                                @foreach ($products as $product)
                                  <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->relationcategorytable->category_name }}</td>
                                    <td>{{ $product->product_price }}</td>
                                    <td>{{ $product->product_quantity }}</td>
                                    <td>{{ $product->alert_uantity }}</td>
                                    <td> <img src="{{ asset('uploads/product_photos') }}/{{ $product->product_photo }}" alt="Not Found"> </td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                      @if ($product->deleted_at)
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                          <a type="button" class="btn btn-info text-center" href="{{ url('product/restor') }}/{{ $product->id }}">Restor</a>
                                          <a type="button" class="btn btn-danger text-center" href="{{ url('product/force/delete') }}/{{ $product->id }}">Force</a>
                                        </div>
                                      @else
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                          <a type="button" class="btn btn-warning text-center" href="{{ url('product/edit') }}/{{ $product->id }}">Edit</a>
                                          <button type="button" class="btn btn-danger text-center deleted_btn" value="{{ url('product/delete') }}/{{ $product->id }}">Delete</button>
                                        </div>
                                      @endif

                                    </td>
                                  </tr>
                                @endforeach
                          </tbody>
                        </table>
                        {{-- {{ $products->links() }} --}}
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-header text-center ">Add Products</div>
                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
                      <form method="post" action="{{  route('productinsert') }}" enctype="multipart/form-data">
                        @csrf
                          <div class="form-group">
                              <label>Category Name</label>
                              <select class="form-control" name="category_id">
                                <option value=""> Select One </option>
                                @foreach ($categoreis as $category)
                                  <option value="{{ $category->id }}"> {{ $category->category_name }} </option>
                                @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName">Products Name</label>
                            <input type="text" class="form-control" placeholder="Enter Products Name" name="product_name" value="{{ old('product_name') }}">
                            @error ('product_name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName">Products Shot Details</label>
                            <textarea name="products_shot_details" rows="3" class="form-control"  placeholder="Enter Products Shot Details"></textarea>
                            @error ('products_shot_details')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName">Products Long Details</label>
                            <textarea name="products_long_details" rows="3" class="form-control"  placeholder="Enter Products Long Details"></textarea>
                            @error ('products_long_details')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName">Products Price</label>
                            <input type="text" class="form-control" placeholder="Enter Products Price" name="product_price" value="{{ old('product_price') }}">
                            @error ('product_price')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName">Products Quantity</label>
                            <input type="text" class="form-control" placeholder="Enter Products Quantity" name="product_quantity" value="{{ old('product_quantity') }}">
                            @error ('product_quantity')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName">Alert Quantity</label>
                            <input type="text" class="form-control" placeholder="Enter Alert Quantity" name="alert_uantity" value="{{ old('alert_uantity') }}">
                            @error ('alert_uantity')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label >Products Photo</label>
                            <input type="file" name="product_photo">
                          </div>
                          <div class="form-group">
                            <label >Products Gallery</label>
                            <input type="file" name="product_gallery[]" multiple>
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

@section('footer_script')
  <script type="text/javascript">
        $(document).ready(function (){
           $('#example').DataTable();
           $('.deleted_btn').click (function(){
             var link_to_go = $(this).val();

             Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.value) {
                    window.loction.href = link_to_go;
                    }
                  })
           });
      });
  </script>
@endsection
