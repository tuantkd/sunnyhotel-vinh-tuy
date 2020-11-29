@extends('layout.layout_admin')
@section('title','Danh sách khách hàng')

<!-- ========================================= -->
@section('content')
    <br><br><br>
<div class="modal fade" id="modal-id-room">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">THÊM KHÁCH HÀNG</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('post-custome') }}" method="POST" name="myForm"
                    onsubmit="return validateForm()" enctype="multipart/form-data">


                        <!-- mã token bảo vệ dữ liệu -->
                        {{-- {{ csrf_field() }} --}}

                        {{-- <div class="form-group">
                            <label for="">Họ và tên</label>
                            <input type="text" class="form-control" 
                            placeholder="Nhập tên khách hàng...."
                            name="txt_name_customer" id="txt_name_customer"><br>

                            <label for="">SĐT</label>
                            <input type="text" class="form-control" placeholder="Nhập sđt...."
                            name="txt_sdt_customer" id="txt_sdt_customer">

                            <label for="">Địa chỉ</label>
                            <input type="text" class="form-control" placeholder="Nhập địa chỉ...."
                            name="txt_diachi_customer" id="txt_diachi_customer">
                        </div>
                        <button type="submit" class="btn btn-primary">THÊM</button> --}}
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
                    <i class="fas fa-users"></i> GÓP Ý CỦA KHÁCH HÀNG
                    <div class="pull-right">
                        {{-- <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs" 
                            data-toggle="modal" href='#modal-id-room'>
                                <i class="fas fa-plus"></i> THÊM
                            </button>
                        </div> --}}
                    </div>
                </div>

                <div class="panel-body">
                   <button style="margin-bottom: 10px;" class="btn btn-danger btn-sm delete_all"
                    data-url="{{ url('delete-customer') }}">
                        <i class="fa fa-trash-alt"></i>
                        &ensp;Xóa tất cả đã chọn
                    </button>
                   <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th><input type="checkbox" id="check_all"></th>
                        <th>STT</th>
                        <th>Tên khách hàng</th>
                        <th>SĐT khách hàng</th>
                        <th>Địa chỉ khách hàng</th>
                        <th>Góp ý</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($get_customer as $key=>$data6)
                      <tr id="tr_{{ $data6->id }}">
                            <td>
                                <input type="checkbox" class="sub_check" 
                                data-id="{{ $data6->id }}">
                            </td>
                            <td>{{ ++$key }}</td>
                            <td>{{ $data6->full_name }}</td>
                            <td>{{ $data6->customers_phone }}</td>
                            <td>{{ $data6->customers_address }}</td>
                            <td>{{ $data6->customes_comment }}</td>
                      </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
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
                            type: 'get',
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
          var txt_name_customer = document.forms["myForm"]["txt_name_customer"].value;
          if (txt_name_customer == "") {
            alert("Chưa nhập tên khách hàng");
            document.getElementById('txt_name_customer').focus();
            return false;
          }
          var txt_sdt_customer = document.forms["myForm"]["txt_sdt_customer"].value;
          if (txt_sdt_customer == "") {
            alert("Chưa nhập số điện thoại");
            document.getElementById('txt_sdt_customer').focus();
            return false;
          }
          var txt_diachi_customer = document.forms["myForm"]["txt_diachi_customer"].value;
          if (txt_diachi_customer == "") {
            alert("Chưa nhập địa chỉ");
            document.getElementById('txt_diachi_customer').focus();
            return false;
          }
        }
    </script> 
     
@endsection