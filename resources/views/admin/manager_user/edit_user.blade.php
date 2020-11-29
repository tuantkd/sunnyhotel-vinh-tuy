@extends('layout.layout_admin')
@section('title','Danh sách nhân viên')

<!-- ========================================= -->
@section('content')
    <br><br><br>

  

    <div class="row">
        <div class="col-lg-12">
            <!--Những Phòng mới nhất -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fas fa-users"></i> SỬA THÔNG TIN NGƯỜI DÙNG
                    <div class="pull-right"> 
                    </div>
                </div>

                <div class="panel-body">





<form action="" method="POST" role="form">
                    
                        <div class="form-group">
                            <label for="">Họ và tên</label>
                            <input type="text" class="form-control" id="" placeholder="Nhập tên....">
                            <label for="">Tên đăng nhập</label>
                            <input type="text" class="form-control" id="" placeholder="Nhập tên....">
                            <label for="">Mật khẩu</label>
                            <input type="text" class="form-control" id="" placeholder="Nhập mật khẩu....">
                            <label for="">Giới tính</label>
                            <label class="radio-inline"><input type="radio" name="optradio" checked>Nam
                            </label>
                            <label class="radio-inline"><input type="radio" name="optradio">Nữ</label>
                            <br>
                            <label for="">Số điện thoại</label>
                            <input type="text" class="form-control" id="" placeholder="Nhập sđt....">
                            <label for="">Địa chỉ</label>
                            <input type="text" class="form-control" id="" placeholder="Nhập địa chỉ....">
                        </div>
                    
                        
                    
                        <button type="submit" class="btn btn-primary">CẬP NHẬT</button>
                    </form>





                   
                  
                </div>
            </div>
            <!--End Những Phòng mới nhất -->
        </div>
    </div>

@endsection
