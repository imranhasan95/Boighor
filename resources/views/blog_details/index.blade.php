@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header text-center">List Products</div>
                  <div class="card-body table-responsive">
                      <!-- @if (session('edit_status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('edit_status') }}
                          </div>
                      @endif -->

                        <table class="table table-bordered text-center " id="example">
                          <thead class="text-center">
                            <tr>
                              <th>SL NO</th>
                              <th>Category Name</th>
                              <th>Blog Name</th>
                              <th>Blog Title</th>
                              <th>Shot Details</th>
                              <th>Long Title</th>
                              <th>Long Details</th>
                              <th>Blog Photo</th>
                              <th>Created At</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody class="text-justify">
                                @foreach ($blog_dts as $blog_dt)
                                  <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $blog_dt->blogcategory_id }}</td>
                                    <td>{{ $blog_dt->blog_name }}</td>
                                    <td>{{ $blog_dt->blog_title }}</td>
                                    <td>{{ $blog_dt->blog_shot_details }}</td>
                                    <td>{{ $blog_dt->blog_long_title }}</td>
                                    <td>{{ $blog_dt->blog_long_details }}</td>
                                    <td><img src="{{ asset('uploads/blog_photo') }}/{{ $blog_dt->blog_images }}" alt="Not Found"> </td>
                                    <td>{{ $blog_dt->created_at->diffForhumans() }}</td>
                                    <td>
                                      -
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
                  <div class="card-header text-center ">Add Blog</div>
                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
                      <form method="post" action="{{ route('bloginsert') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                              <label>Category Name</label>
                              <select class="form-control" name="blogcategory_id">
                                <option value=""> Select One </option>
                                @foreach ($blogcategorys as $blogcategor)
                                  <option value="{{ $blogcategor->id }}"> {{ $blogcategor->blogcategory_name }} </option>
                                @endforeach
                              </select>
                          </div>
                        <div class="form-group">
                            <label for="exampleInputName">Blog Name</label>
                            <input type="text" class="form-control" placeholder="Enter Blog Name" name="blog_name" value="">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName">Blog Title</label>
                            <input type="text" class="form-control" placeholder="Enter Blog Title" name="blog_title" value="">
                            <!-- @error ('product_name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror -->
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName">Blog Shot Details</label>
                            <textarea type="text" class="form-control" rows="3" placeholder="Enter Blog Shot Details" name="blog_shot_details" value=""></textarea>
                            <!-- @error ('product_name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror -->
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName">Blog Long Title </label>
                            <textarea type="text" class="form-control" rows="2" placeholder="Enter Blog Long Title" name="blog_long_title" value=""></textarea>
                            <!-- @error ('product_name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror -->
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName">Blog Long Details</label>
                            <textarea type="text" class="form-control" rows="4" placeholder="Enter Blog Long Details" name="blog_long_details" value=""></textarea>
                            <!-- @error ('product_name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror -->
                          </div>
                          <div class="form-group">
                            <label >Blog Photo</label>
                            <input type="file" name="blog_images">
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
