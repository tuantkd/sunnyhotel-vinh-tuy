<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang đăng nhập</title>
    <!-- Core CSS - Include with every page -->
    <link rel="icon" href="{{ url('public/admin/image_logo/sunnyhotel/logo-sunnyhotel-text.png') }}" type="image/icon type">
    <link href="{{url('public/admin/assets/plugins/bootstrap/bootstrap.css')}} " rel="stylesheet" />
    <link href="{{ url('public/admin/assets/font-awesome/css/font-awesome.css') }} " rel="stylesheet" />
    <link href="{{ url('public/admin/assets/plugins/pace/pace-theme-big-counter.css') }}" rel="stylesheet" />
   <link href="{{ url('public/admin/assets/css/style.css') }}" rel="stylesheet" />
      <link href="{{ url('public/admin/assets/css/main-style.css') }}" rel="stylesheet" />

</head>

<body class="body-Login-back">

    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <img src="{{ url('public/admin/image_logo/sunnyhotel/logo-sunnyhotel-text.png') }}" 
              alt="" style="max-width:100%; height:90px;" />
                </div>
            <div class="col-md-4 col-md-offset-4">

                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">Đăng nhập</h3>
                    </div>

                    <div class="panel-body">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        <form role="form" action="{{ url('post-login') }}" method="POST">
                            {{ csrf_field() }}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" 
                                    placeholder="Tên đăng nhập" name="txt_username" 
                                    type="text" autofocus>
                                    <p style="font-style:italic;color:red;">
                                        {{ $errors->first('txt_username') }}
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" 
                                    placeholder="Mật khẩu" name="txt_password" type="password">

                                    <p style="font-style:italic;color:red;">
                                        {{ $errors->first('txt_password') }}
                                    </p>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">
                                        Ghi nhớ
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-success btn-block">
                                    Đăng nhập
                                </button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="{{ url('public/admin/assets/plugins/jquery-1.10.2.js') }}"></script>
    <script src="{{ url('public/admin/assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/plugins/metisMenu/jquery.metisMenu.js') }}"></script>

</body>

</html>
