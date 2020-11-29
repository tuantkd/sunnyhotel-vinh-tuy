<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Core CSS - Include with every page -->
    <link rel="icon" href="{{ url('public/admin/image_logo/sunnyhotel/logo-sunnyhotel.png') }}" type="image/icon type">

    <link href="{{ url('public/admin/assets/plugins/bootstrap/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ url('public/admin/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ url('public/admin/assets/plugins/pace/pace-theme-big-counter.css') }}" rel="stylesheet" />
    <link href="{{ url('public/admin/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ url('public/admin/assets/css/main-style.css') }}" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="{{ url('public/admin/assets/plugins/morris/morris-0.4.3.min.css') }}" 
    rel="stylesheet" />


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

   </head>
<body>


    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h2>Bạn có muốn thoát khỏi hệ thống không ?</h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Đóng
                    </button>
                    <a class="btn btn-primary" href="{{ url('logout') }}" role="button">
                        Đăng xuất
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('home-admin') }}">
                    <img src="{{ url('public/admin/image_logo/sunnyhotel/logo-sunnyhotel-text.png')}}" 
                    style="max-width: 100%; height: 50px;"/>
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                

                

                <li class="dropdown">
                    <a class="dropdown-toggle" href="{{ url('list-book-room') }}">
                        <span class="top-label label label-warning">
                            @php($count_book_room = DB::table('book_rooms')->count())
                            {{ $count_book_room }}
                        </span> 
                        <i class="fa fa-bell fa-3x"></i>
                    </a>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="{{ url('profile-admin') }}"><i class="fa fa-user fa-fw"></i>
                                Thông tin cá nhân
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a data-toggle="modal" href='#modal-id'>
                                <i class="fas fa-sign-out-alt"></i>
                                Đăng Xuất
                            </a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        @if(Auth::check())
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="{{ url('public/admin/assets/img/user.jpg') }}">
                            </div>
                            <div class="user-info">
                                <div><strong>{{ Auth::user()->username }}</strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle ">     
                                    </span>&nbsp;Đang truy cập
                                </div>
                            </div>
                        </div>
                        @else
                        <script type="text/javascript">
                            location.replace("{{ url('login') }}");
                        </script>
                        @endif
                        <!--end user image section-->
                    </li>
                    <li>
                        <a href="{{ url('list-role-access') }}"><i class="fas fa-key"></i> Quyền Truy cập</a>
                    </li>
                    
                    <li>
                        <a href="{{ url('list-user') }}"><i class="fas fa-users"></i> Người dùng</a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fas fa-hotel"></i> Quản lý Phòng
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            
                            <li>
                                <a href="{{ url('list-category-room') }}"><i class="fas fa-angle-right"></i> Loại</a>
                            </li>
                            <li>
                                <a href="{{ url('list-room') }}"><i class="fas fa-angle-right"></i> Danh sách</a>
                            </li>
                            <li>
                                <a href="{{ url('list-image-room') }}"><i class="fas fa-angle-right"></i> Hình ảnh</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>


                    <li>
                        <a href="{{ url('list-customer') }}"><i class="fa fa-user fa-fw"></i> Hộp Thư Góp Ý</a>
                    </li>
                    <li>
                        <a href="{{ url('list-book-room') }}"><i class="far fa-check-square"></i> Đặt Phòng</a>
                    </li>
                    
                    <li>
                        <a href="#">
                            <i class="fas fa-hotel"></i> Quản lý dịch vụ
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            
                            <li>
                                <a href="{{ url('list-category-service') }}">
                                    <i class="fas fa-angle-right"></i> Loại
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('list-service-admin') }}">
                                    <i class="fas fa-angle-right"></i> Danh sách
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('list-image-service') }}">
                                    <i class="fas fa-angle-right"></i> Hình ảnh
                                </a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            @yield('content')
            

        </div>
        <!-- end page-wrapper -->
    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="{{ url('public/admin/assets/plugins/jquery-1.10.2.js') }}"></script>
    <script src="{{ url('public/admin/assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ url('public/admin/assets/plugins/pace/pace.js') }}"></script>
    <script src="{{ url('public/admin/assets/scripts/siminta.js') }}"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="{{ url('public/admin/assets/plugins/morris/raphael-2.1.0.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/plugins/morris/morris.js') }}"></script>
    <script src="{{ url('public/admin/assets/scripts/dashboard-demo.js') }}"></script>

</body>

</html>
