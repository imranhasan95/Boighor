@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header text-center">Team List</div>
                  <div class="card-body table-responsive">
                        <table class="table table-bordered text-center " id="example">
                          <thead class="text-center">
                            <tr>
                              <th>SL NO</th>
                              <th>Team Name</th>
                              <th>Category Name</th>
                              <th>Team Photo</th>
                              <th>Created At</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody class="text-center">
                           @foreach ($teamlists as $teamlist)
                              <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $teamlist->team_name }}</td>
                                <td>{{ $teamlist->teamcategory_name }}</td>
                                <td> <img src="{{ asset('uploads/team_photo') }}/{{ $teamlist->team_images }}" alt="Not Found"> </td>
                                <td>{{ $teamlist->created_at }}</td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-header text-center ">Add Team</div>
                  <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                      <form method="post" action="{{  route('teamin.store') }}" enctype="multipart/form-data">
                        @csrf
                          <div class="form-group">
                            <label for="exampleInputName">Team Name</label>
                            <input type="text" class="form-control" placeholder="Enter Team Name" name="team_name" value="{{ old('team_name') }}">

                          </div>
                          <div class="form-group">
                            <label for="exampleInputName">Team Category</label>
                            <input type="text" class="form-control" placeholder="Enter Category Name" name="teamcategory_name" value="{{ old('teamcategory_name') }}">

                          </div>
                          <div class="form-group">
                            <label >Team Photo</label>
                            <input type="file" name="team_images">
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
