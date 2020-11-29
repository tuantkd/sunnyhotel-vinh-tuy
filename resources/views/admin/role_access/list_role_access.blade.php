@extends('layout.layout_admin')
@section('title','Quyền truy cập')

<!-- ========================================= -->
@section('content')
<br><br><br>

    <div class="modal fade" id="modal-role">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">THÊM QUYỀN TRUY CẬP</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('post-list-role-access') }}" method="POST" role="form">
                        <!-- mã token bảo vệ dữ liệu -->
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Tên quyền</label>
                            <input type="text" class="form-control" name="txt_role_name" 
                            placeholder="Nhập tên quyền...." required="required">
                        </div>
                        <button type="submit" class="btn btn-primary">THÊM</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <!--Những Phòng mới nhất -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fas fa-users"></i> THÊM QUYỀN TRUY CẬP
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs" 
                            data-toggle="modal" href='#modal-role'>
                                <i class="fas fa-plus"></i> THÊM
                            </button>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                   
                   <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Tên quyền</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach($get_roles as $key=>$data)
                      <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $data->role_name }}</td>
                      </tr>
                    @endforeach
                      
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>


    
@endsection