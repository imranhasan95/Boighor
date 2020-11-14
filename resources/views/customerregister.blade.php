@extends('layouts.fontend_master')

@section('content')
  <!-- Start Bradcaump area -->
     <div class="ht__bradcaump__area bg-image--6">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="bradcaump__inner text-center">
                       <h2 class="bradcaump-title">My Account</h2>
                         <nav class="bradcaump-content">
                           <a class="breadcrumb_item" href="{{ route('welcome') }}">Home</a>
                           <span class="brd-separetor">/</span>
                           <span class="breadcrumb_item active">My Account</span>
                         </nav>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Bradcaump area -->
 <!-- Start My Account Area -->
 <section class="my_account_area pt--80 pb--55 bg--white">
   <div class="container">
     <div class="row">
       {{-- <div class="col-lg-6 col-12">
         <div class="my__account__wrapper">
           <h3 class="account__title">Login</h3>
           <form action="#">
             <div class="account__form">
               <div class="input__box">
                 <label>Username or email address <span>*</span></label>
                 <input type="text">
               </div>
               <div class="input__box">
                 <label>Password<span>*</span></label>
                 <input type="text">
               </div>
               <div class="form__btn">
                 <button>Login</button>
                 <label class="label-for-checkbox">
                   <input id="rememberme" class="input-checkbox" name="rememberme" value="forever" type="checkbox">
                   <span>Remember me</span>
                 </label>
               </div>
               <a class="forget_pass" href="#">Lost your password?</a>
             </div>
           </form>
         </div>
       </div> --}}
       <div class="col-lg-12 col-12">
         @if (session('status'))
             <div class="alert alert-success" role="alert">
                 {{ session('status') }}
             </div>
         @endif
         <div class="my__account__wrapper">
           <h3 class="account__title">Register</h3>
            <form class="" action="{{ route('customerregisterinsert') }}" method="post">
              @csrf
             <div class="account__form">
               <div class="input__box">
                 <label> Name <span>*</span></label>
                 <input type="text" name="name" value="" placeholder="Enter Name">
               </div>
               <div class="input__box">
                 <label>Email address <span>*</span></label>
                 <input type="email" name="email" placeholder="Enter Email address">
               </div>
               <div class="input__box">
                 <label>Password<span>*</span></label>
                 <input type="password" name="password">
               </div>
               <div class="form__btn">
                 <button>Register</button>
               </div>
               <br>
               <div class="form__btn text-center">
                      <a href="{{ url('login/github') }}" class="btn btn-secondary"><i class="fa fa-github"></i> Register With GitHub</a>
                     <a href="{{ url('login/google') }}" class="btn btn-danger"><i class="fa fa-google"></i> Register With Google</a>
               </div>
             </div>
           </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End My Account Area -->
@endsection
