<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>力文文理補習班</title>

    <!--Favicon-->
    <link rel="icon" href="{{ asset('assets/img/favicon.png')}}" type="image/jpg"/>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('static/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome CSS-->
    <link href="{{ asset('static/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Line Awesome CSS -->
    <link href="{{ asset('static/css/line-awesome.min.css')}}" rel="stylesheet">
    <!-- Animate CSS-->
    <link href="{{ asset('static/css/animate.css')}}" rel="stylesheet">
    <!-- Magnific Popup Video -->
    <link href="{{ asset('static/css/magnific-popup.css')}}" rel="stylesheet">
    <!-- Flaticon CSS -->
    <link href="{{ asset('static/css/flaticon.css')}}" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link href="{{ asset('static/css/owl.carousel.css')}}" rel="stylesheet">
    <!-- Style CSS -->
    <link href="{{ asset('static/css/style.css')}}" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="{{ asset('static/css/responsive.css')}}" rel="stylesheet">
    <!-- Course CSS -->
    <link href="{{ asset('static/css/course.css')}}" rel="stylesheet">

    <!-- jquery -->
    <script src="{{ asset('static/js/jquery-1.12.4.min.js')}}"></script>

    @livewireStyles
</head>

<body>

<!-- Pre-Loader -->
<div id="loader">
    <div class="loading">
        <div class="sk-circle">
            <div class="sk-circle1 sk-child"></div>
            <div class="sk-circle2 sk-child"></div>
            <div class="sk-circle3 sk-child"></div>
            <div class="sk-circle4 sk-child"></div>
            <div class="sk-circle5 sk-child"></div>
            <div class="sk-circle6 sk-child"></div>
            <div class="sk-circle7 sk-child"></div>
            <div class="sk-circle8 sk-child"></div>
            <div class="sk-circle9 sk-child"></div>
            <div class="sk-circle10 sk-child"></div>
            <div class="sk-circle11 sk-child"></div>
            <div class="sk-circle12 sk-child"></div>
        </div>
    </div>
</div>

<!-- Header Top Area -->
<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="contact-info">
                    <i class="las la-envelope"></i> liwen@gmail.com
                    <i class="las la-map-marker"></i> 桃園市中壢區龍東路310號
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 text-right">
                <div class="site-info">
                    營業時間（暑期）: 週一～週五 - 下午１：３０ ～ 下午　５：００<br>

                    營業時間（學期）: 週一～週五 - 下午２：００ ～ 下午　９：３０
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Header Area -->
<header id="header-2" class="header-area absolute-header pt-50">
    <div class="sticky-area">
        <div class="navigation">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-12">
                        <div class="logo">
                            <a class="navbar-brand" href="/"><img
                                    src="{{ asset('static/picture/logo-white.png')}}"
                                    alt=""></a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                    <span class="navbar-toggler-icon"></span>
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse justify-content-center"
                                     id="navbarSupportedContent">
                                    <ul class="navbar-nav m-auto">

                                        @if(Route::has('login'))
                                            @auth
                                                @if(Auth::user()->utype === 'TEA')

                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">課程
                                                            <span class="sub-nav-toggler">
 													</span>
                                                        </a>
                                                        <ul class="sub-menu">
                                                            <li><a href="{{route('course.course-list')}}">瀏覽課程</a></li>
                                                            <li><a href="{{route('course.my-course')}}">我的課程</a></li>
                                                        </ul>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">帳戶管理
                                                            <span class="sub-nav-toggler">
 													</span>
                                                        </a>
                                                        <ul class="sub-menu">
                                                            <li><a href="{{route('teacher.dashboard')}}">我的資料</a></li>
                                                            <li><a href="{{route('logout')}}"
                                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">登出</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                @elseif(Auth::user()->utype === 'ADM')

                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">課程管理
                                                            <span class="sub-nav-toggler">
 													</span>
                                                        </a>
                                                        <ul class="sub-menu">
                                                            <li><a href="{{route('course.course-list')}}">瀏覽課程</a></li>
                                                            <li><a href="{{route('course.my-course')}}">我的課程</a></li>
                                                        </ul>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">帳戶管理
                                                            <span class="sub-nav-toggler">
 													</span>
                                                        </a>
                                                        <ul class="sub-menu">
                                                            <li><a href="{{route('admin.dashboard')}}">我的資料</a></li>
                                                            <li><a href="{{route('logout')}}"
                                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">登出</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                @else
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">課程
                                                            <span class="sub-nav-toggler">
 													</span>
                                                        </a>
                                                        <ul class="sub-menu">
                                                            <li><a href="{{route('course.course-list')}}">瀏覽課程</a></li>
                                                            <li><a href="{{route('course.my-course')}}">我的課程</a></li>
                                                        </ul>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">帳戶管理
                                                            <span class="sub-nav-toggler">
 													</span>
                                                        </a>
                                                        <ul class="sub-menu">
                                                            <li><a href="{{route('student.dashboard')}}">我的資料</a></li>
                                                            <li><a href="{{route('logout')}}"
                                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">登出</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                @endif
                                                <form id="logout-form" method="post" action="{{route('logout')}}"
                                                      style="display: none;">
                                                    @csrf
                                                </form>
                                            @else
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{route('login')}}">登入
                                                        <span class="sub-nav-toggler">
 													</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{route('register')}}">註冊
                                                        <span class="sub-nav-toggler">
 													</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="/contact">聯絡我們
                                                    </a>
                                                </li>

                                            @endif
                                        @endif


                                    </ul>

                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 col-12 text-right">
                        <div class="header-right-content">
                            <a href="contact.html" class="main-btn">免費試聽</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

{{$slot}}

<!-- Footer Area -->
<footer class="footer-area dark-bg wow fadeIn" data-wow-delay=".3s">
    <div class="container">
        <div class="footer-up">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="logo">
                        <img src="{{ asset('static/picture/logo-white.png')}}" alt="expoint-logo">
                    </div>
                    <p>加入力文，變成神人！</p>
                    <div class="social-area">
                        <a href=""><i class="lab la-facebook-f"></i></a>
                        <a href=""><i class="lab la-instagram"></i></a>
                        <a href=""><i class="lab la-twitter"></i></a>
                        <a href=""><i class="la la-skype"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>

<!-- Footer Bottom Area -->
<div class="footer-bottom">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <p class="copyright-line">Copyright &copy; 2021.版權所有　翻盜必究</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <p class="privacy">力文文教機構 | （０３）－４６６４７８９</p>
                <p class="privacy">力文文教機構（東安分部） | （０３）－４６６４７８９</p>
                <p class="privacy">力文文教機構 （東東安親班）| （０３）－４６６４７８９</p>
            </div>
        </div>
    </div>
</div>

<!-- Scroll Top Area -->
<a href="#top" class="go-top"><i class="las la-angle-up"></i></a>


<!-- Popper JS -->
<script src="{{ asset('static/js/popper.min.js') }} "></script>
<!-- Bootstrap JS -->
<script src="{{ asset('static/js/bootstrap.min.js') }} "></script>
<!-- Wow JS -->
<script src="{{ asset('static/js/wow.min.js') }} "></script>
<!-- Way Points JS -->
<script src="{{ asset('static/js/jquery.waypoints.min.js') }} "></script>
<!-- Counter Up JS -->
<script src="{{ asset('static/js/jquery.counterup.min.js') }} "></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('static/js/owl.carousel.min.js') }} "></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('static/js/magnific-popup.min.js') }} "></script>
<!-- Sticky JS -->
<script src="{{ asset('static/js/jquery.sticky.js') }} "></script>
<!-- Main JS -->
<script src="{{ asset('static/js/main.js') }} "></script>

@livewireScripts
</body>

</html>
