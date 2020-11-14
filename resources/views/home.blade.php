@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Dashboard</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    {{-- You are logged in! --}}
                    <table class="table table-bordered">
                        <thead class="text-center">
                          <tr>
                            <th>SL NO</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Time At</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                              @foreach ($users as $user)
                                <tr>
                                  <td>{{ $loop->index + 1 }}</td>
                                  <td>{{ $user->name }}</td>
                                  <td>{{ $user->email }}</td>
                                  <td>{{ $user->created_at->diffForhumans() }}</td>
                                </tr>
                              @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
    <div class="col-md-8">
      {!! $chart->container() !!}
      {!! $chart->script() !!}
  </div>
</div>
</div>
@endsection
