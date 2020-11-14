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
                              <th>Giftcar Name</th>
                              <th>Giftcar Price</th>
                              <th>Giftcar Photo</th>
                              <th>Created At</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody class="text-center">
                                @foreach ($card_info as $card_in)
                                  <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $card_in->giftcar_name }}</td>
                                    <td>{{ $card_in->giftcar_price }}</td>
                                    <td> <img src="{{ asset('uploads/giftcar_photo') }}/{{ $card_in->giftcar_images }}" alt="Not Found"> </td>
                                    <td>{{ $card_in->created_at }}</td>
                                  </tr>
                                @endforeach
                          </tbody>
                        </table>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-header text-center ">Add Giftcar</div>
                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
                      <form method="post" action="{{ route('giftcarinsurt') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName">Giftcar Name</label>
                            <input type="text" class="form-control" placeholder="Enter Giftcar Name" name="giftcar_name" value="">
                          </div>
                        <div class="form-group">
                            <label for="exampleInputName">Giftcar Price</label>
                            <input type="text" class="form-control" placeholder="Enter Price Name" name="giftcar_price" value="">
                          </div>
                          <div class="form-group">
                            <label >Giftcar Photo</label>
                            <input type="file" name="giftcar_images">
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
