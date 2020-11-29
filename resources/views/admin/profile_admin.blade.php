@extends('layout.layout_admin')
@section('title','Tramg thông tin cá nhân')

<!-- ========================================= -->
@section('content')

  <script>
    var msg = '{{Session::get('change_password_user')}}';
    var exist = '{{Session::has('change_password_user')}}';
    if(exist){
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Đã đã thay đổi mật khẩu mới',
        showConfirmButton: false,
        timer: 1800
      })
    }
  </script>

  <script>
    var msg = '{{Session::get('change_password_user_fail')}}';
    var exist = '{{Session::has('change_password_user_fail')}}';
    if(exist){
        Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Hai mật khẩu mới không khớp',
        showConfirmButton: false,
        timer: 1800
      })
    }
  </script>

  <script>
    var msg = '{{Session::get('old_pass_fail')}}';
    var exist = '{{Session::has('old_pass_fail')}}';
    if(exist){
        Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Mật khẩu cũ không đúng',
        showConfirmButton: false,
        timer: 1800
      })
    }
  </script>
  
    <div class="row">
        <div class="col-lg-12">
            <div class="container" 
            style="padding-top:10px;background-color:white;margin-top:60px;">
              <h1 class="page-header">THÔNG TIN CÁ NHÂN</h1>
              <div class="row">
                <!-- left column -->
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <div class="text-center">
                    <img src="{{ url('public/admin/assets/img/user.jpg') }}" class="avatar img-circle img-thumbnail" alt="avatar">
                  </div>
                </div>
                <!-- edit form column -->
                <div class="col-md-10 col-sm-6 col-xs-12 personal-info">




                  <form class="form-horizontal" role="form" name="myForm" 
                  action="{{ url('update-profile-user/'.Auth::id()) }}" method="POST"
                  onsubmit="return validateForm()">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Họ và tên:</label>
                      <div class="col-lg-8">
                        <input class="form-control" type="text" disabled
                        value="{{ Auth::user()->fullname }}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Địa chỉ:</label>
                      <div class="col-lg-8"> 
                        <input class="form-control" disabled
                        value="{{ Auth::user()->address }}" type="text">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 control-label">Chức vụ:</label>
                      <div class="col-lg-8">
                        @php($get_roles = DB::table('role_accesses')
                        ->where('id',Auth::user()->role_id)->get())
                        @foreach($get_roles as $get_role)
                          <input class="form-control" disabled
                          value="{{ $get_role->role_name }}" type="text">
                        @endforeach
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-3 control-label">Tên đăng nhập:</label>
                      <div class="col-md-8">
                        <input class="form-control" disabled
                        value="{{ Auth::user()->username }}" type="text">
                      </div>
                    </div>


                    <!-- ======================================================= -->

                    <input type="hidden" name="txt_user_id" value="{{ Auth::id() }}">

                    <div class="form-group">
                      <label class="col-md-3 control-label">Mật khẩu cũ:</label>
                      <div class="col-md-8">
                        <input class="form-control" type="password"
                         placeholder="Nhập mật khẩu cũ" name="txt_old_pass" id="txt_old_pass">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-3 control-label">Mật khẩu mới:</label>
                      <div class="col-md-8">
                        <input class="form-control" type="password"
                        name="txt_new_pass" id="txt_new_pass" placeholder="Nhập mật khẩu mới">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-3 control-label">Nhập lại mật khẩu mới:</label>
                      <div class="col-md-8">
                        <input class="form-control" type="password" name="txt_new_pass_confirm" id="txt_new_pass_confirm" placeholder="Nhập lại mật khẩu mới">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-3 control-label"></label>
                      <div class="col-md-8">

                        <input class="btn btn-primary" value="Lưu thay đổi" type="submit">
                        <span></span>

                        <a class="btn btn-default" href="{{ url('home-admin') }}" role="button">
                          Đóng
                        </a>
                      </div>
                    </div>

                  </form>



                </div>
              </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function validateForm() {
          var txt_old_pass = document.forms["myForm"]["txt_old_pass"].value;
          if (txt_old_pass == "") {
            alert("Chưa nhập mật khẩu cũ");
            document.getElementById('txt_old_pass').focus();
            return false;
          }
          var txt_new_pass = document.forms["myForm"]["txt_new_pass"].value;
          if (txt_new_pass == "") {
            alert("Chưa nhập mật khẩu mới");
            document.getElementById('txt_new_pass').focus();
            return false;
          }
          var txt_new_pass_confirm = document.forms["myForm"]["txt_new_pass_confirm"].value;
          if (txt_new_pass_confirm == "") {
            alert("Chưa nhập lại mật khẩu mới");
            document.getElementById('txt_new_pass_confirm').focus();
            return false;
          }
          
        }
    </script>

@endsection
