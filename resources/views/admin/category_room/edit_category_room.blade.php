@extends('layout.layout_admin')
@section('title','Danh sách loại phòng')

<!-- ========================================= -->
@section('content')
    <br><br><br>

    <div class="row">
        <div class="col-lg-12">
            <!--Những Phòng mới nhất -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fas fa-users"></i> DANH SÁCH LOẠI PHÒNG
                    <div class="pull-right">
                    </div>
                </div>

                <div class="panel-body">
                    <form action="" method="POST" role="form">  <div class="form-group">
                            <label for="">Tên loại phòng</label>
                            <label class="radio-inline"><input type="radio" name="optradio" checked>Phòng Đơn
                            </label>
                            <label class="radio-inline"><input type="radio" name="optradio">Phòng Đôi</label>
                            <label class="radio-inline"><input type="radio" name="optradio">Phòng GĐ</label>
                            <br>   
                        </div>
                        <button type="submit" class="btn btn-primary">CẬP NHẬT</button>
                    </form>
                </div>
            </div>
            <!--End Những Phòng mới nhất -->
        </div>
    </div>

@endsection
