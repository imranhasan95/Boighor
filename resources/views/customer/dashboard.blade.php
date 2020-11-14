@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header text-center">Dashboard</div>
                      <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="text-center">
                              <tr>
                                <th>SL NO</th>
                                <th>Total Order</th>
                                <th>Coupon Name</th>
                                <th>Payment Method</th>
                                <th>Purchased Time</th>
                                <th>Download PDF</th>
                              </tr>
                            </thead>
                            <tbody class="text-center">
                                  @foreach ($sales as $sale)
                                    <tr>
                                      <td>{{ $loop->index + 1 }}</td>
                                      <td>{{ $sale->total__amount }}</td>
                                      <td>{{ $sale->coupon_name ?? "No Coupon Used!"}}</td>
                                      <td>{{ $sale->payment_method }}</td>
                                      <td>{{ $sale->created_at->diffForhumans() }}</td>
                                      <td>
                                        <a class="btn btn-success btn-sm" href="{{ url('download/pdf') }}/{{ $sale->id }}" name="button">PDF</a>
                                      </td>
                                    </tr>
                                  @endforeach
                            </tbody>
                          </table>
                      </div>
                </div>
            </div>
        </div>
    </div>

@endsection
