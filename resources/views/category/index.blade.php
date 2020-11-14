@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header text-center"> Category List </div>
                  <div class="card-body table-responsive">
                      @if (session('edit_status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('edit_status') }}
                          </div>
                      @endif
                        <table class="table table-bordered text-center " id="example">
                          <thead class="text-center">
                            <tr>
                              <th>SL NO</th>
                              <th>Category Name</th>
                              <th>Added By</th>
                              <th>Created At</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody class="text-center">
                                @foreach ($categorys as $category)
                                  <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ App\User::find($category->added_by)->name  }}</td>
                                    <td>{{ $category->created_at }}</td>
                                      {{-- @if ($product->deleted_at)
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                          <a type="button" class="btn btn-info text-center" href="{{ url('product/restor') }}/{{ $product->id }}">Restor</a>
                                          <a type="button" class="btn btn-danger text-center" href="{{ url('product/force/delete') }}/{{ $product->id }}">Force</a>
                                        </div>
                                      @else
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                          <a type="button" class="btn btn-warning text-center" href="{{ url('product/edit') }}/{{ $product->id }}">Edit</a>
                                          <button type="button" class="btn btn-danger text-center deleted_btn" value="{{ url('product/delete') }}/{{ $product->id }}">Delete</button>
                                        </div>
                                      @endif --}}

                                    </td>
                                  </tr>
                                @endforeach
                          </tbody>
                        </table>
                  </div>
              </div>
          </div>

          <div class="col-md-4">
              <div class="card">
                  <div class="card-header text-center ">Add Category</div>
                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
                      <form method="post" action="{{  route('category.store') }}">
                        @csrf
                          <div class="form-group">
                            <label for="exampleInputName">Category Name</label>
                            <input type="text" class="form-control" placeholder="Enter Category Name" name="category_name">
                            {{-- @error ('product_name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror --}}
                          </div>
                          <button type="submit" class="btn btn-success text-center">Add</button>
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
