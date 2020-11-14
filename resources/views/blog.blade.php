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
             <div class="col-lg-9 col-12">
               <div class="blog-page">
                 <div class="page__header">
                   <h2>All Blogs</h2>
                 </div>
                 <!-- Start Single Post -->
                  @foreach ($blogalls as $blogall)
                  <article class="blog__post d-flex flex-wrap">
                   <div class="thumb">
                     <a href="{{ url('blogdetails') }}/{{ $blogall->id }}/{{ Str::slug($blogall->blog_images ) }}">
                       <img src="{{ asset('uploads/blog_photo') }}/{{ $blogall->blog_images }}" alt="blog images">
                     </a>
                   </div>
                   <div class="content">
                     <h4><a href="{{ url('blogdetails') }}/{{ $blogall->id }}/{{ Str::slug($blogall->blog_title ) }}">{{ $blogall->blog_title }}</a></h4>
                     <ul class="post__meta">
                       <li>Posts by : <a href="{{ url('blogdetails') }}/{{ $blogall->id }}/{{ Str::slug($blogall->blog_name ) }}">{{ $blogall->blog_name }}</a></li>
                       <li class="post_separator">/</li>
                       <li>{{ $blogall->created_at->format('M-d-Y ') }}</li>
                     </ul>
                     <p>{{ $blogall->blog_shot_details }}</p>
                     <div class="blog__btn">
                       <a href="{{ url('blogdetails') }}/{{ $blogall->id }}/{{ Str::slug($blogall->id ) }}">read more</a>
                     </div>
                   </div>
                 </article>
                  @endforeach
                 <!-- End Single Post -->
               </div>
               <ul class="wn__pagination">
                 <li class="active"><a href="#">1</a></li>
                 <li><a href="#">2</a></li>
                 <li><a href="#">3</a></li>
                 <li><a href="#">4</a></li>
                 <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
               </ul>
             </div>
             <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
               <div class="wn__sidebar">
                 <!-- Start Single Widget -->
                 <aside class="widget search_widget">
                   <h3 class="widget-title">Search</h3>
                   <form action="{{ url('search') }}"  method="get">
                     <div class="form-input">
                       <input type="text" placeholder="Search..." name="filter[blog_name]">
                       <button><i class="fa fa-search"></i></button>
                     </div>
                   </form>
                 </aside>
                 <!-- End Single Widget -->
                 <!-- Start Single Widget -->
                 <aside class="widget recent_widget">
                  <h3 class="widget-title">Recent</h3>
                  <div class="recent-posts">
                    <ul>
                      @foreach($new_blog as $new_blo)
                      <li>
                        <div class="post-wrapper d-flex">
                          <div class="thumb">
                            <a href="{{ url('blogdetails') }}/{{ $new_blo->id }}/{{ Str::slug($new_blo->blog_images ) }}"><img src="{{ asset('uploads/blog_photo') }}/{{ $new_blo->blog_images }}" alt="blog images"></a>
                          </div>
                          <div class="content">
                            <h4><a href="{{ url('blogdetails') }}/{{ $new_blo->id }}/{{ Str::slug($new_blo->blog_title ) }}">{{ $new_blo->blog_title }}</a></h4>
                            <p>	{{ $new_blo->created_at->format('M-d-Y ') }}</p>
                          </div>
                        </div>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </aside>
                 <!-- End Single Widget -->
                 <!-- Start Single Widget -->
                 <aside class="widget comment_widget">
    								<h3 class="widget-title">Comments</h3>
    								<ul>
                     @foreach($commen as $comme)
                     <li>
                       <div class="post-wrapper">
                         <div class="thumb">
                           <img src="{{ asset('font_end/images/blog/comment/1.jpeg') }}" alt="Comment images">
                         </div>
                         <div class="content">
                           <p>{{ $comme->user->name }}:</p>
                           <a href="#">{{ $comme->comment_body }}</a>
                         </div>
                       </div>
                     </li>
                   @endforeach
    								</ul>
    							</aside>
                 <!-- End Single Widget -->
                 <!-- Start Single Widget -->
                 <aside class="widget category_widget">
                   <h3 class="widget-title">Categories</h3>
                   <ul>
                    @foreach($blogcategor as $blogcategy)
                    <li><a href="#">{{ $blogcategy-> blogcategory_name}}</a></li>
                    @endforeach
                   </ul>
                 </aside>
                 <!-- End Single Widget -->

               </div>
             </div>
           </div>
         </div>
       </div>
       <!-- End Blog Area -->
@endsection

@section('footer_script')

@endsection
