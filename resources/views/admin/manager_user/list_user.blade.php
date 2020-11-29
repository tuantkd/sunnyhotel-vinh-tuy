@extends('layout.layout_admin')
@section('title','Danh sách nhân viên')

<!-- ========================================= -->
@section('content')
    <br><br><br>

    <script>
        var msg = '{{Session::get('add_user_new')}}';
        var exist = '{{Session::has('add_user_new')}}';
        if(exist){
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã thêm người dùng',
            showConfirmButton: false,
            timer: 1800
          })
        }
    </script>

    <script>
        var msg = '{{Session::get('delete_user')}}';
        var exist = '{{Session::has('delete_user')}}';
        if(exist){
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã xóa người dùng',
            showConfirmButton: false,
            timer: 1800
          })
        }
    </script>

    
    <div class="modal fade" id="modal-id-add-user">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">THÊM NGƯỜI DÙNG</h4>
                </div>
                <div class="modal-body">

                    <form action="{{ url('post-list-user') }}" method="POST" name="myForm"
                    onsubmit="return validateForm()">

                        <!-- mã token bảo vệ dữ liệu -->
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Họ và tên</label>
                            <input type="text" class="form-control"
                            placeholder="Nhập tên...."
                            name="txt_fullname_user" id="txt_fullname_user"><br>

                            <label for="">Tên đăng nhập</label>
                            <input type="text" class="form-control"placeholder="Nhập tên...."
                            name="txt_username_user" id="txt_username_user"><br>

                            <label for="">Mật khẩu</label>
                            <input type="password" class="form-control" placeholder="Nhập mật khẩu...." name="txt_password_user" id="txt_password_user"><br>

                            <label for="">Giới tính</label>
                            <label class="radio-inline">
                                <input type="radio"checked 
                                name="txt_sex_user" id="txt_sex_user" value="Nam">Nam
                            </label>

                            <label class="radio-inline">
                                <input type="radio"
                                name="txt_sex_user" id="txt_sex_user" value="Nữ">Nữ
                            </label>
                            <br><br>

                            <label for="">Số điện thoại</label>
                            <input type="text" class="form-control" placeholder="Nhập sđt...."       name="txt_sdt_user" id="txt_sdt_user"><br>

                            <label for="">Địa chỉ</label>
                            <input type="text" class="form-control" placeholder="Nhập địa chỉ...."
                            name="txt_diachi_user" id="txt_diachi_user"><br>

                            <label for="">Quyền truy cập</label>
                            <select name="txt_role_id" class="form-control" required="required">
                                <option value="">- - Chọn - -</option>

                                @php($get_roles = DB::table('role_accesses')->get())
                                @foreach($get_roles as $value)
                                <option value="{{ $value->id }}">{{ $value->role_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">THÊM</button>
                    </form>



                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!--Những Phòng mới nhất -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fas fa-users"></i> DANH SÁCH NGƯỜI DÙNG
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs" 
                            data-toggle="modal" href='#modal-id-add-user'>
                                <i class="fas fa-plus"></i> THÊM
                            </button>
                        </div>
                    </div>
                </div>

                <div class="panel-body">

                    <button style="margin-bottom: 10px;" class="btn btn-danger btn-sm delete_all"
                    data-url="{{ url('delete-user') }}">
                        <i class="fa fa-trash-alt"></i>
                        &ensp;Xóa tất cả đã chọn
                    </button>

                   
                   <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th><input type="checkbox" id="check_all"></th>
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Tên tài khoản</th>
                        <th>Giới tính</th>
                        <th>Điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Quyền truy cập</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach($get_users as $key=>$data1)

                        <tr id="tr_{{ $data1->id }}">
                            @if($data1->role_id == 1)
                                <td>
                                    <input type="checkbox" class="sub_check" disabled>
                                </td>
                            @else
                                <td>
                                    <input type="checkbox" class="sub_check" 
                                    data-id="{{ $data1->id }}">
                                </td>
                            @endif

                            <td>{{ ++$key }}</td>
                            <td>{{ $data1->fullname }}</td>
                            <td>{{ $data1->username }}</td>
                            <td>{{ $data1->sex }}</td>
                            <td>{{ $data1->phone }}</td>
                            <td>{{ $data1->address }}</td>

                            <td>
                                @php($get_roles = DB::table('role_accesses')
                                ->where('id',$data1->role_id)->get())
                                @foreach($get_roles as $value)
                                    {{ $value->role_name }}
                                @endforeach
                            </td>

                        </tr>

                    @endforeach
                      
                    </tbody>
                  </table>

                </div>
            </div>
            <!--End Những Phòng mới nhất -->
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function () {

            //Click chọn tất cả các checkbox
            $('#check_all').on('click', function(e) {
             if($(this).is(':checked',true))  
             {
                $(".sub_check").prop('checked', true);  
             } else {  
                $(".sub_check").prop('checked',false);  
             }  
            });


            //Click xóa tất cả đã chọn
            $('.delete_all').on('click', function(e) {

                var allVals = [];  
                $(".sub_check:checked").each(function() {  
                    allVals.push($(this).attr('data-id'));
                });  


                if(allVals.length <= 0)  
                {  
                    alert("Vui lòng chọn hàng!");  
                } else {  


                    var check = confirm("Bạn có chắc chắn muốn xóa?");  
                    if(check == true){  


                        var join_selected_values = allVals.join(","); 


                        $.ajax({
                            url: $(this).data('url'),
                            type: 'GET',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids=' + join_selected_values,

                            success: function (data) {
                                if (data['success']) {
                                    $(".sub_checkk:checked").each(function() {  
                                        $(this).parents("tr").remove();
                                    });
                                    location.reload();
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'Đã xóa thành công',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }else {
                                    alert('Rất tiếc, đã xảy ra lỗi!!');
                                }
                            },
                            error: function (data) {
                                alert(data.responseText);
                            }
                        });


                      $.each(allVals, function( index, value ) {
                          $('table tr').filter("[data-row-id='" + value + "']").remove();
                      });
                    }  
                }  
            });


        });
    </script>





    <script type="text/javascript">
        function validateForm() {
          var txt_fullname_user = document.forms["myForm"]["txt_fullname_user"].value;
          if (txt_fullname_user == "") {
            alert("Chưa nhập họ và tên");
            document.getElementById('txt_fullname_user').focus();
            return false;
          }
          var txt_username_user = document.forms["myForm"]["txt_username_user"].value;
          if (txt_username_user == "") {
            alert("Chưa nhập tên đăng nhập");
            document.getElementById('txt_username_user').focus();
            return false;
          }
          var txt_password_user = document.forms["myForm"]["txt_password_user"].value;
          if (txt_password_user == "") {
            alert("Chưa nhập mật khẩu");
            document.getElementById('txt_password_user').focus();
            return false;
          }
          var txt_sex_user = document.forms["myForm"]["txt_sex_user"].value;
          if (txt_sex_user == "") {
            alert("Chưa chọn giới tính");
            document.getElementById('txt_sex_user').focus();
            return false;
          }
          var txt_sdt_user = document.forms["myForm"]["txt_sdt_user"].value;
          if (txt_sdt_user == "") {
            alert("Chưa nhập số điện thoại");
            document.getElementById('txt_sdt_user').focus();
            return false;
          }
          var txt_diachi_user = document.forms["myForm"]["txt_diachi_user"].value;
          if (txt_diachi_user == "") {
            alert("Chưa nhập địa chỉ");
            document.getElementById('txt_diachi_user').focus();
            return false;
          }
        }
    </script>




@endsection
