@extends('layouts.fontend_master')

@section('content')
  <!-- Start Bradcaump area -->
       <div class="ht__bradcaump__area bg-image--4">
           <div class="container">
               <div class="row">
                   <div class="col-lg-12">
                       <div class="bradcaump__inner text-center">
                         <h2 class="bradcaump-title">Blog Page</h2>
                           <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="{{ route('welcome') }}">Home</a>
                             <span class="brd-separetor">/</span>
                             <span class="breadcrumb_item active">Blog</span>
                           </nav>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- End Bradcaump area -->
       <!-- Start Blog Area -->
       <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
         <div class="container">
           <div class="row">
             <div class="col-lg-12 col-12">
               <div class="blog-page">
                 <div class="page__header">
                   <h2>Blogs</h2>
                 </div>
                 <!-- Start Single Post -->
                  @foreach ($users as $user)
                  <article class="blog__post d-flex flex-wrap">
                   <div class="thumb">
                     <a href="{{ url('blogdetails') }}/{{ $user->id }}/{{ Str::slug($user->blog_images ) }}">
                       <img src="{{ asset('uploads/blog_photo') }}/{{ $user->blog_images }}" alt="blog images">
                     </a>
                   </div>
                   <div class="content">
                     <h4><a href="{{ url('blogdetails') }}/{{ $user->id }}/{{ Str::slug($user->blog_title ) }}">{{ $user->blog_title }}</a></h4>
                     <ul class="post__meta">
                       <li>Posts by : <a href="{{ url('blogdetails') }}/{{ $user->id }}/{{ Str::slug($user->blog_name ) }}">{{ $user->blog_name }}</a></li>
                       <li class="post_separator">/</li>
                       <li>{{ $user->created_at->format('M-d-Y ') }}</li>
                     </ul>
                     <p>{{ $user->blog_shot_details }}</p>
                     <div class="blog__btn">
                       <a href="{{ url('blogdetails') }}/{{ $user->id }}/{{ Str::slug($user->id ) }}">read more</a>
                     </div>
                   </div>
                 </article>
                  @endforeach
                 <!-- End Single Post -->
               </div>
             </div>
           </div>
         </div>
       </div>
       <!-- End Blog Area -->
@endsection

@section('footer_script')

@endsection
