<!doctype html>
<html lang="en">
    <head>
        <title>Boighor</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- font-awesome CSS -->
        <link rel="stylesheet" href="{{ asset('font_end/assets/css/font-awesome.min.css') }}">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('font_end/assets/css/bootstrap.min.css') }}">
        <!-- animate CSS -->
        <link rel="stylesheet" href="{{ asset('font_end/assets/css/animate.css') }}">
        <!-- style CSS -->
        <link rel="stylesheet" href="{{ asset('font_end/assets/css/style.css') }}">
        <!-- responsive CSS -->
        <link rel="stylesheet" href="{{ asset('font_end/assets/css/responsive.css') }}">
    </head>
    <body>
        <!--
        ======================
        header_top stard
        ======================
         -->
        <header>
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="logo wow slideInLeft">
                        <a class="navbar-brand" href="#"><img src="{{ asset('font_end/images/logo/logo.png') }}"alt=""></a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse main-manus" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto wow slideInDown">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('welcome') }}">HOME <span class="sr-only">(current)</span></a>
                            </li>
                        </ul>
                        <div class="form wow slideInRight">
                            <form class="d-flex">
                                <div class="login">
                                    {{ Carbon\Carbon::now()->format('d M Y ') }}
                                </div>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>

        </header>
        <!--
        ======================
        header_top end
        ======================
        -->
        <!--
        ======================
        hero_area stard
        ======================
         -->

        <!--
        ======================
        hero_area end
        ======================
        -->
        <!--
        ======================
        Find a Jobs_area Stard
        ======================
         -->
        <section class="jobs-area">
            <div class="container">
                <div class="row">
                    <div class="col">
                    <div class="all-jobs">
                      @foreach ($info_alls as $info_all)
                        <div class="single-jobs wow flip" data-wow-delay="0s">
                          	<a class="first__img" href="{{ route('campaign') }}/{{ $info_all->id }}/{{ Str::slug($info_all->campaign_images ) }}"><img src="{{ asset('uploads/campaign_images') }}/{{ $info_all->campaign_images }}" alt="product image"></a>
                            <!-- <p>Zebra</p> -->
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- <div class="title wow slideInUp">
                </div> -->
            </div>
          </div>
      </section>
        <!--
        ======================
        Find a Jobs_area end
        ======================
         -->
        <!--
        ======================
        Connecting-area Stard
        ======================
         -->
         <section class="Connecting-area" style="background-image:url({{ asset('font_end/assets/img/Connecting-bg.jpg') }})">
             <div class="container">
                 <div class="row justify-content-center">
                    <div class="col-lg-6 text-center wow slideInUp">
                        <h2>Connecting the <br> Lict workforce</h2>
                        <p>Pellentesque vehicula fermentum turpis eu cursus. Cras convallis tellus et elit aliquet, vitae dignissim ligula sodales. </p>
                    </div>
                 </div>
             </div>
         </section>
         <!--
        ======================
        Connecting-area end
        ======================
         -->
        <!--
        ======================
        Smarter-area Stard
        ======================
         -->
        <section class="Smarter-area">
            <div class="container">
                <div class="row justify-content-center s-align">
                    <div class="col-lg-6 text-center wow slideInUp">
                    <h2>Smarter. Faster. Better</h2>
                    <p>Millions of small businesses use Freelancer to turn their ideas into reality</p>
                    <a href="" class="big-btn">Join lict Today</a>
                    </div>
                </div>
            </div>
        </section>
        <!--
        ======================
        Smarter-area end
        ======================
         -->
        <!-- jqurey JS -->

        <script src="{{ asset('font_end/assets/js/jQuery.js') }}"></script>
        <!-- popper JS -->
        <script src="{{ asset('font_end/assets/js/popper.min.js') }}"></script>
        <!-- bootstrap JS -->
        <script src="{{ asset('font_end/assets/js/bootstrap.min.js') }}"></script>
        <!-- wow JS -->
        <script src="{{ asset('font_end/assets/js/wow.min.js') }}"></script>
        <!-- main JS -->
        <script src="{{ asset('font_end/assets/js/main.js') }}"></script>
    </body>
</html>
