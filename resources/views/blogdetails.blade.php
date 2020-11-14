@extends('layouts.fontend_master')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
@section('content')
  <!-- Start Bradcaump area -->
         <div class="ht__bradcaump__area bg-image--6">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="bradcaump__inner text-center">
                         	<h2 class="bradcaump-title">Blog Details</h2>
                             <nav class="bradcaump-content">
                               <a class="breadcrumb_item" href="{{ route('welcome') }}">Home</a>
                               <span class="brd-separetor">/</span>
                               <span class="breadcrumb_item active">Blog-Details</span>
                             </nav>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- End Bradcaump area -->
 		<div class="page-blog-details section-padding--lg bg--white">
 			<div class="container">
 				<div class="row">
 					<div class="col-lg-9 col-12">
 						<div class="blog-details content">

 							<article class="blog-post-details">
 								<div class="post-thumbnail">
 									<img src="{{ asset('uploads/blog_photo') }}/{{ $blog_info->blog_images }}" alt="blog images">
 								</div>
 								<div class="post_wrapper">
 									<div class="post_header">
 										<h2>{{ $blog_info->blog_title }}</h2>
 										<div class="blog-date-categori">
 											<ul>
 												<li>{{ $blog_info->created_at->format('M-d-Y ') }}</li>
 												<li><a href="#" title="Posts by boighor" rel="author">boighor</a></li>
 											</ul>
 										</div>
 									</div>
 									<div class="post_content">
 										<p>{{ $blog_info->blog_shot_details }}</p>

 										<blockquote>{{ $blog_info->blog_long_title }}</blockquote>

										 <p>{{ $blog_info->blog_long_details }}</p>
 									</div>
 									<ul class="blog_meta">
 										<li><a href="">{{ $count_info }} comment</a></li>
 										<li> / </li>
 										<li>Tags:<span>fashion</span> <span>t-shirt</span> <span>white</span></li>
 									</ul>

 								</div>
 							</article>

 							<div class="comments_area">
 								<h3 class="comment__title">comment</h3>
 								<ul class="comment__list">

 									<li>
 										<div class="wn__comment">
 											<div class="thumb">
 												<img src="{{ asset('font_end/images/blog/comment/1.jpeg') }}" alt="comment images">
 											</div>
 											<div class="content">
                        @foreach($commen_info as $commen_inf)
 												<div class="comnt__author d-block d-sm-flex">
 													<span><a href="">admin</a> Post author</span>
   													<span>{{ $commen_inf->created_at }}</span>
   												</div>
                          <p>{{ $commen_inf->comment_body }}</p>
                          @endforeach
 											</div>
 										</div>
 									</li>

 								</ul>
 							</div>
 							<div class="comment_respond">
                @foreach($posts as $post)
 								   <h3 class="reply_title"> Reply <small><a href="{{ route('post.show', $post->id) }}">Comment reply</a></small></h3>
                @endforeach
 								<!-- <form class="comment__form" action="#">
 									<p>Your email address will not be published.Required fields are marked </p>
 									<div class="input__box">
 										<textarea name="comment" placeholder="Your comment here"></textarea>
 									</div>
 									<div class="input__wrapper clearfix">
 										<div class="input__box name one--third">
 											<input type="text" placeholder="name">
 										</div>
 										<div class="input__box email one--third">
 											<input type="email" placeholder="email">
 										</div>
 										<div class="input__box website one--third">
 											<input type="text" placeholder="website">
 										</div>
 									</div>
 									<div class="submite__btn">
 										<a href="#">Post Comment</a>
 									</div>
 								</form> -->
 							</div>
 						</div>
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

@endsection

@section('footer_script')

@endsection
