@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Coupon List</div>
                <div class="card-body table-responsive">
                      <table class="table table-bordered text-center " id="example">
                        <thead class="text-center">
                          <tr>
                            <th>SL NO</th>
                            <th>Coupon Name</th>
                            <th>Discount  Amount</th>
                            <th>Coupon Validation</th>
                            <th>Created At</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                              @foreach ($carbons as $carbon)
                                <tr>
                                  <td>{{ $loop->index + 1 }}</td>
                                  <td>{{ $carbon->coupon_name }}</td>
                                  <td>{{ $carbon->discount_amount }}</td>
                                  <td>{{ $carbon->coupon_validation }}</td>
                                  <td>{{ $carbon->created_at }}</td>
                                  <td>-</td>
                                  {{-- <td>
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

                                  </td> --}}
                                </tr>
                              @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center ">Add Coupon</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->all())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <form method="post" action="{{  route('couponstore') }}" >
                      @csrf
                        <div class="form-group">
                          <label for="exampleInputName">Coupon Name</label>
                          <input type="text" class="form-control" placeholder="Enter Coupon Name" name="coupon_name">
                          @error ('coupon_name')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName">Discount  Amount</label>
                          <input type="text" class="form-control" placeholder="Enter Coupon Name" name="discount_amount">
                          {{-- @error ('alert_uantity')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror --}}
                        </div>
                        <div class="form-group">
                          <label for="exampleInputName">Coupon Validation</label>
                          <div class="row">
                            <div class="col-md-6">
                            <input type="date" class="form-control" name="coupon_validation_date">
                            </div>
                            <div class="col-md-6">
                            <input type="time" class="form-control" name="coupon_validation_time">
                            </div>
                          </div>
                          {{-- @error ('alert_uantity')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror --}}
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
            </div>
        </div>
      </div>
  </div>
@endsection
