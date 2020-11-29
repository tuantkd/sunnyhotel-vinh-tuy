@extends('layout.layout_admin')
@section('title','Danh sách dịch vụ')

<!-- ========================================= -->
@section('content')
    <br><br><br>

    <script>
        var msg = '{{Session::get('post_service_sesion')}}';
        var exist = '{{Session::has('post_service_sesion')}}';
        if(exist){
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã thêm dịch vụ mới',
            showConfirmButton: false,
            timer: 1800
          })
        }
    </script>

    <script>
        var msg = '{{Session::get('delete_service')}}';
        var exist = '{{Session::has('delete_service')}}';
        if(exist){
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã xóa dịch vụ',
            showConfirmButton: false,
            timer: 1800
          })
        }
    </script>

    <script>
        var msg = '{{Session::get('update')}}';
        var exist = '{{Session::has('update')}}';
        if(exist){
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã cập nhật dịch vụ',
            showConfirmButton: false,
            timer: 1800
          })
        }
    </script>

<div class="modal fade" id="modal-id-room">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">DỊCH VỤ</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('post-service') }}" method="POST" name="myForm"
                    onsubmit="return validateForm()">

                    	<!-- mã token bảo vệ dữ liệu -->
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="">Loại dịch vụ</label>
                            <select name="txt_category_service" class="form-control" required="required">
                                <option value="">- - Chọn - -</option>

                                @foreach($get_category_service as $value)
                                    <option value="{{ $value->id }}">
                                        {{ $value->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Tên dịch vụ</label>
                            <input type="text" class="form-control" placeholder="Nhập tên dịch vụ...."
                            name="txt_service" id="txt_service">
                        </div>

                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea name="txt_describe_service"
                            class="form-control" rows="3" required="required"></textarea>
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
                    DỊCH VỤ
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs" 
                            data-toggle="modal" href='#modal-id-room'>
                                <i class="fas fa-plus"></i> THÊM
                            </button>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <button style="margin-bottom: 10px;" class="btn btn-danger btn-sm delete_all"
                    data-url="{{ url('delete-service') }}">
                        <i class="fa fa-trash-alt"></i>
                        &ensp;Xóa tất cả đã chọn
                    </button>
                   
                   <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width:5%;"><input type="checkbox" id="check_all"></th>
                      	<th style="width:5%;">STT</th>
                        <th style="width:10%;">Loại</th>
                        <th style="width:15%;">Tên dịch vụ</th>
                        <th style="width:60%;">Mô tả</th>
                        <th style="width:5%;">Tùy chọn</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($get_service as $key=>$data2)
                      <tr id="tr_{{ $data2->id }}">

                        <td>
                            <input type="checkbox" class="sub_check" 
                            data-id="{{ $data2->id }}">
                        </td>

                  		<td>{{ ++$key }}</td>

                        <td>
                        @php($get_category_tables = DB::table('category_services')
                        ->where('id',$data2->category_service_id)->get())
                        @foreach($get_category_tables as $data)
                            {{ $data->category_name }}
                        @endforeach
                        </td>

                        <td>{{ $data2->service_title }}</td>

                        <td>{!! $data2->service_describe !!}</td>

                        <td>
                            <a class="btn btn-primary" href="{{ url('edit-service/'.$data2->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
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
          var txt_service = document.forms["myForm"]["txt_service"].value;
          if (txt_service == "") {
            alert("Chưa nhập dịch vụ");
            document.getElementById('txt_service').focus();
            return false;
          }

        }
    </script>


    <script>
        CKEDITOR.replace('txt_describe_service');
    </script>

@endsection