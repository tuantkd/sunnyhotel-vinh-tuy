@extends('layout.layout_admin')
@section('title','Danh sách loại phòng')

<!-- ========================================= -->
@section('content')
    <br><br><br>


    <script>
        var msg = '{{Session::get('delete_category_room')}}';
        var exist = '{{Session::has('delete_category_room')}}';
        if(exist){
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã xóa loại phòng',
            showConfirmButton: false,
            timer: 1800
          })
        }
    </script>

    <script>
        var msg = '{{Session::get('add_category_room')}}';
        var exist = '{{Session::has('add_category_room')}}';
        if(exist){
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã thêm loại phòng',
            showConfirmButton: false,
            timer: 1800
          })
        }
    </script>

    
    <div class="modal fade" id="modal-id-room">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">THÊM LOẠI PHÒNG</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('post-category-room') }}" method="POST">
                        
                        <!-- mã token bảo vệ dữ liệu -->
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="">Tên loại phòng</label>
                            <input type="text" name="txt_category_room" class="form-control"
                            placeholder="Nhập tên loại phòng">
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
                    <i class="fas fa-users"></i> DANH SÁCH LOẠI PHÒNG
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
                    data-url="{{ url('delete-category-room') }}">
                        <i class="fa fa-trash-alt"></i>
                        &ensp;Xóa tất cả đã chọn
                    </button>
                   
                   <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th><input type="checkbox" id="check_all"></th>
                        <th>STT</th>
                        <th>Tên loại phòng</th>
                        <th>Số lượng phòng trống</th>
                      </tr>
                    </thead>
                    
                    <tbody>

                    @foreach($get_category_room as $key => $value)
                        <tr id="tr_{{ $value->id }}">
                            <td>
                                <input type="checkbox" class="sub_check" 
                                data-id="{{ $value->id }}">
                            </td>
                            <td>
                                {!! ++$key !!}
                            </td>

                            <td>
                                {!! $value->category_name !!}
                            </td>

                            <td style="text-align:center;">
                                @php($count_rooms = DB::table('rooms')
                                ->where(
                                [
                                    ['category_id',$value->id], 
                                    ['room_status',0], 
                                ])->count())
                                
                                {{ $count_rooms }}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                  </table>

                </div>
            </div>
            <!--End Những Phòng mới nhất -->
        </div>
        <div class="col-lg-3"></div>
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

@endsection
