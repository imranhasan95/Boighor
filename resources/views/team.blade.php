@extends('layouts.fontend_master')

@section('content')
  <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Our Team</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="{{ route('welcome') }}">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Our Team</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->

        <!-- Start Team Area -->
        <section class="wn__team__area pt--40 pb--75 bg--white">
        	<div class="container">
        		<div class="row">
            @foreach ($teamlists as $teamlist)
        			<!-- Start Single Team -->
        			<div class="col-lg-3">
        				<div class="wn__team text-center">
        					<div class="thumb">
        						<img src="{{ asset('uploads/team_photo') }}/{{ $teamlist->team_images }}" alt="Team images">
        					</div>
        					<div class="content">
        						<h4>{{ $teamlist->team_name }}</h4>
        						<p>{{ $teamlist->teamcategory_name }}</p>
        						<ul class="team__social__net">
        							<li><a href="">
                        <i class="icon-social-twitter icons"></i>
                      </a></li>
        							<li><a href="http://twitter.com/share?text={{ url()->full() }}" target="_blank"><i class="icon-social-twitter icons"></i></a></li>
        							<li><a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->full() }}" target="_blank">
                        <i class="icon-social-facebook icons"></i></a></li>
        							<li><a href="https://www.linkedin.com/shareArticle?mini=true&url={url}" target="_blank"><i class="icon-social-linkedin icons"></i></a></li>
        							<li><a href="https://www.tumblr.com/sharer.php?u={{ url()->full() }}"><i class="icon-social-tumblr icons"></i></a></li>
        						</ul>
        					</div>
        				</div>
        			</div>
        			<!-- End Single Team -->
            @endforeach
        		</div>
        	</div>
        </section>
        <!-- End Team Area -->
@endsection

@section('footer_script')

@endsection
