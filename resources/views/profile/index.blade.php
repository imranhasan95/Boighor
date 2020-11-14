@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 m-auto">
          <div class="card text-center">
              <div class="card-header">Profile Edit</div>
            <div class="card-body">
              <h5 class="card-title"> </h5>
            <form action="{{ route('passwordchange') }}" method="post">
              @csrf
                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-3 col-form-label"> Old Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputPassword" placeholder=" Enter Your old Password" name="old_password">
                    @error ('old_password')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-3 col-form-label"> New Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputPassword" placeholder=" Enter Your New Password" name="new_password">
                    @error ('new_password')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-3 col-form-label"> Confirm Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputPassword" placeholder=" Enter Your old Password" name="confirm_password">
                    @error ('confirm_password')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Password Change</button>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection
