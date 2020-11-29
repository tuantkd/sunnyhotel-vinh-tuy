<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Hotel Template">
    <meta name="keywords" content="Hotel, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title1')</title>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Taviraj:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- Css Styles -->
    <link rel="icon" href="{{ url('public/admin/image_logo/sunnyhotel/logo-sunnyhotel.png') }}" type="image/icon type">
    <link rel="stylesheet" href="{{ url('public/home/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('public/home/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('public/home/css/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('public/home/css/linearicons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('public/home/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('public/home/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('public/home/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('public/home/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('public/home/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('public/home/css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="./index.html"><img src="{{ url('public/admin/image_logo/sunnyhotel/logo-sunnyhotel-text.png') }}" alt=""  ></a>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <nav class="main-menu mobile-menu">
                                <ul>
                                    <li><a href="{{ url('/') }}">Trang Chủ</a></li>
                                    <li><a href="{{ url('index-about') }}">Giới Thiệu</a></li>

                                    <li>
                                        <a href="{{ url('room') }}">Phòng</a>

                                        <ul class="drop-menu">
                                        <li>
                                        <a href="{{ url('room') }}">Tất cả phòng</a></li>
                                        @php($get_category_romm = DB::table('categoryrooms')->get())
                                        @foreach($get_category_romm as $value)
                                            <li>
                                                <a href="{{ url('view-category-room/'.$value->id) }}">
                                                    {{ $value->category_name }}
                                                </a>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="{{ url('list-service') }}">Dịch Vụ</a>
                                        <ul class="drop-menu">
                                        <li>
                                            <a href="{{ url('list-service') }}">Tất cả dịch vụ</a>
                                        </li>
                                        @php($category_services = DB::table('category_services')->get())
                                        @foreach($category_services as $value1)
                                            <li>
                                                <a href="{{ url('view-category-service/'.$value1->id) }}">
                                                    {{ $value1->category_name }}
                                                </a>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="{{ url('index-contact') }}">Liên Hệ</a></li>

                                    @if(!Auth::check())
                                    <a href="{{ url('registration') }}" style="font-size: 20px; color: #000;
                                    background: white;padding: 0 5px; border-radius: 10px;
                                    border: 1px solid yellow">Đăng Ký</a>
                                    @else
                                        <li>
                                            <a href="#"style="font-size: 20px; color: #000;
                                    background: white;padding: 0 5px; border-radius: 10px;
                                    border: 1px solid yellow">
                                                Chào: {{ Auth::user()->username }}
                                            </a>
                                            <ul class="drop-menu">
                                                <li>
                                                    <a href="{{ url('logout') }}"
                                                    onclick="return confirm('Bạn có muốn đăng xuất không ?');">Đăng xuất</a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->


    @yield('content_home')





    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-logo">
                        <a href="#"><img src="{{ url('public/admin/image_logo/sunnyhotel/logo-sunnyhotel-text.png') }}" alt="" ></a>
                    </div>
                </div>
            </div>
            <div class="row pb-50">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h5>Địa chỉ</h5>
                        <div class="widget-text">
                            <i class="lnr lnr-map-marker"></i>
                            <p>5-7 Hai Bà Trưng, <br />An Lạc, Ninh Kiều, Cần Thơ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h5>Liên Hệ</h5>
                        <div class="widget-text">
                            <i class="lnr lnr-phone-handset"></i>
                            <p>+(0292) 3 95 95 95</p>
                        </div>

                        <div class="widget-text">
                            <i class="lnr lnr-envelope"></i>
                            <p>sunnyhotel@gmail.com</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>

                    <div class="fb-page" data-href="https://www.facebook.com/LVTsunnyhotel/?modal=admin_todo_tour" data-tabs="timeline" data-width="500" data-height="70" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/LVTsunnyhotel/?modal=admin_todo_tour" class="fb-xfbml-parse-ignore">
                            <a href="https://www.facebook.com/LVTsunnyhotel/?modal=admin_todo_tour">
                                SUNNY HOTEL
                            </a>
                        </blockquote>
                    </div>
                </div>

            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div style="text-align: center; color:white;Video Hotel Tour">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> : 2020 Copyright: Sunnyhotel.com
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->



    <!-- Js Plugins -->
    <script src="{{url('public/home/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{url('public/home/js/bootstrap.min.js')}}"></script>
    <script src="{{url('public/home/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{url('public/home/js/jquery-ui.min.js')}}"></script>
    <script src="{{url('public/home/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{url('public/home/js/jquery.slicknav.js')}}"></script>
    <script src="{{url('public/home/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('public/home/js/main.js')}}"></script>


</body>

</html>
