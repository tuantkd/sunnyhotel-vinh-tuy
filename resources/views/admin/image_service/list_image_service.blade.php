@extends('layout.layout_admin')
@section('title','Danh sách hình ảnh dịch vụ ')

<!-- ========================================= -->
@section('content')
    <br><br><br>


    <script>
        var msg = '{{Session::get('post_image_service_sesion')}}';
        var exist = '{{Session::has('post_image_service_sesion')}}';
        if(exist){
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã thêm hình ảnh dịch vụ',
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
                    <h4 class="modal-title">HÌNH ẢNH DỊCH VỤ</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('post-image-service') }}" method="POST" name="myForm"
                    onsubmit="return validateForm()" enctype="multipart/form-data">

                    	<!-- mã token bảo vệ dữ liệu -->
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="pwd">Hình ảnh:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"
                                    name="txt_img_service" id="txt_img_service">
                                </div>
                            </div><br>
                        </div>

                        <div class="form-group">
                            <label for="pwd">Chọn dịch vụ:</label>
                            <select name="txt_service_id" class="form-control" required="required">
                                <option value="">- - Chọn dịch vụ - -</option>

                                @php($get_services = DB::table('services')->get())
                                @foreach($get_services as $value)
                                <option value="{{ $value->id }}">
                                    {{ $value->service_title }}
                                </option>
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
                    <i class="fas fa-users"></i> HÌNH ẢNH DỊCH VỤ
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
                    data-url="{{ url('delete-image-service') }}">
                        <i class="fa fa-trash-alt"></i>
                        &ensp;Xóa tất cả đã chọn
                    </button>
                   
                   <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th><input type="checkbox" id="check_all"></th>
                      	<th>STT</th>
                        <th>Tên dịch vụ</th>
                        <th>Hình ảnh</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach($get_image_service as $key=>$data3)
                            <tr id="tr_{{ $data3->id }}">
                                <td>
                                <input type="checkbox" class="sub_check" 
                                data-id="{{ $data3->id }}">
                            </td>
                      	        <td>{{ ++$key }}</td>
                                <td>
                                @php($get_services = DB::table('services')
                                ->where('id',$data3->service_id)->get())
                                @foreach($get_services as $value)
                                    {{ $value->service_title }}
                                @endforeach
                                </td>
                                <td>
                                    <img src="{{ url('public/upload_image_service/'.$data3->service_image) }}"
                                    style="max-width:100%;height:100px;">
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
          var txt_img_service = document.forms["myForm"]["txt_img_service"].value;
          if (txt_img_service == "") {
            alert("Chưa chọn hình ảnh dịch vụ");
            document.getElementById('txt_img_service').focus();
            return false;
          }
        }
    </script>


@endsection