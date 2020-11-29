@extends('layout.layout_admin')
@section('title','Danh sách khách hàng')

<!-- ========================================= -->
@section('content')
    <br><br><br>

    <div class="row">
        <div class="col-lg-12">
                        <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fas fa-users"></i> CHỈNH SỬA THÔNG TIN KHÁCH HÀNG
                    <div class="pull-right">
                    </div>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" role="form">
                        <div class="form-group">
                            <label for="">Họ và tên</label>
                            <input type="text" class="form-control" id="" placeholder="Nhập tên khách hàng....">
                            <label for="">SĐT</label>
                            <input type="text" class="form-control" id="" placeholder="Nhập sđt....">
                            <label for="">Địa chỉ</label>
                            <input type="text" class="form-control" id="" placeholder="Nhập địa chỉ....">
                        </div>
                        <button type="submit" class="btn btn-primary">CẬP NHẬT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
