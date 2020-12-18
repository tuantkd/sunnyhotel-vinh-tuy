@extends('layout.layout_admin')
@section('title','Danh sách phòng')

<!-- ========================================= -->
@section('content')
    <br><br><br>

    <script>
        var msg = '{{Session::get('add_room_new')}}';
        var exist = '{{Session::has('add_room_new')}}';
        if(exist){
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã thêm phòng',
            showConfirmButton: false,
            timer: 1800
          })
        }
    </script>

    <script>
        var msg = '{{Session::get('delete_room')}}';
        var exist = '{{Session::has('delete_room')}}';
        if(exist){
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã xóa phòng',
            showConfirmButton: false,
            timer: 1800
          })
        }
    </script>

    <script>
        var msg = '{{Session::get('updates')}}';
        var exist = '{{Session::has('updates')}}';
        if(exist){
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã cập nhật phòng',
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
                    <h4 class="modal-title">THÊM PHÒNG</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('post-room') }}" method="POST" name="myForm"
                    enctype="multipart/form-data">

                        <!-- mã token bảo vệ dữ liệu -->
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="">Tên loại phòng</label>
                            <select name="txt_category_id" class="form-control" required="required">
                                <option value="">- - Chọn - -</option>
                                @php($get_categorys = DB::table('categoryrooms')->get())
                                @foreach($get_categorys as $value)
                                <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                                @endforeach
                            </select><br>

                            <label for="">Tên phòng</label>
                            <input type="text" class="form-control"
                            placeholder="Nhập phòng...."
                            name="txt_name_room" id="txt_name_room"><br>

                            <label for="pwd">Hình ảnh:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"
                                    name="txt_img_room" id="txt_img_room">
                                 </div>
                            </div><br>

                            <label for="">Giá</label>
                            <input type="number" class="form-control"
                            placeholder="Nhập giá...."
                            name="txt_price_room" id="txt_price_room"><br>

                            <label for="">Mô tả</label>
                            <textarea name="txt_describe_room" class="form-control" rows="3"
                            required="required"></textarea>


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
                    <i class="fas fa-users"></i> DANH SÁCH PHÒNG
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

                    <div class="row">
                        <div class="col-sm-8 text-left">
                            <button style="margin-bottom: 10px;" class="btn btn-danger btn-sm delete_all"
                                    data-url="{{ url('delete-room') }}">
                                <i class="fa fa-trash-alt"></i>
                                &ensp;Xóa tất cả đã chọn
                            </button>
                        </div>
                        <div class="col-sm-4 text-right">
                            <select name="" class="form-control" onchange="javascript:handleSelect(this)">
                                <option value="">- - Sắp xếp loại phòng - -</option>
                                @php($get_category_rooms = DB::table('categoryrooms')->get())
                                @foreach($get_category_rooms as $get_category_room)
                                <option value="{{ $get_category_room->id }}">{{ $get_category_room->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{--<table class="table table-bordered">
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="check_all"></th>
                            <th>STT</th>
                            <th>Tên loại phòng</th>
                            <th>Tên phòng</th>
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Trạng thái</th>
                            <th>Tùy chọn</th>

                        </tr>
                        </thead>

                        <tbody>
                        @php($get_room = DB::table('rooms')->get())
                        @foreach($get_room as $key=>$data)
                            <tr id="tr_{{ $data->id }}">
                                <td>
                                    <input type="checkbox" class="sub_check"
                                           data-id="{{ $data->id }}">
                                </td>
                                <td>{{ ++$key }}</td>
                                <td>
                                    @php($get_category = DB::table('categoryrooms')
                                    ->where('id',$data->category_id)->get())
                                    @foreach($get_category as $value)
                                        {!! $value->category_name !!}
                                    @endforeach
                                </td>

                                <td>
                                    {{ $data->room_name }}
                                </td>

                                <td>
                                    <img src="{{ url('public/image_room/'.$data->room_image) }}"
                                         style="max-width:100%;height:100px;">
                                </td>

                                <td>
                                    {{ number_format($data->room_price) }} VND
                                </td>

                                <td>
                                    @if($data->room_status == 0)
                                        Trống
                                    @elseif($data->room_status == 1)
                                        Đã đặt phòng
                                    @endif
                                </td>

                                <td>
                                    <a class="btn btn-primary"
                                       href="{{ url('edit-room/'.$data->id) }}" role="button">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>--}}

                    @yield('table-data-room')

                </div>
            </div>
            <!--End Những Phòng mới nhất -->
        </div>
    </div>

    <script type="text/javascript">
        function handleSelect(elm)
        {
            window.location = '{{ url('view-category') }}' + '/' + elm.value;
        }
    </script>

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
          var txt_category_room = document.forms["myForm"]["txt_category_room"].value;
          if (txt_category_room == "") {
            alert("Chưa chọn loại phòng");
            document.getElementById('txt_category_room').focus();
            return false;
          }
          var txt_name_room = document.forms["myForm"]["txt_name_room"].value;
          if (txt_name_room == "") {
            alert("Chưa nhập tên phòng");
            document.getElementById('txt_name_room').focus();
            return false;
          }
          var txt_img_room = document.forms["myForm"]["txt_img_room"].value;
          if (txt_img_room == "") {
            alert("Chưa chọn hình ảnh");
            document.getElementById('txt_img_room').focus();
            return false;
          }
          var txt_price_room = document.forms["myForm"]["txt_price_room"].value;
          if (txt_price_room == "") {
            alert("Chưa nhập giá");
            document.getElementById('txt_price_room').focus();
            return false;
          }
          var txt_describe_room = document.forms["myForm"]["txt_describe_room"].value;
          if (txt_describe_room == "") {
            alert("Chưa nhập mô tả");
            document.getElementById('txt_describe_room').focus();
            return false;
          }
          var txt_status_room = document.forms["myForm"]["txt_status_room"].value;
          if (txt_status_room == "") {
            alert("Chưa nhập trạng thái");
            document.getElementById('txt_status_room').focus();
            return false;
          }
        }
    </script>

    <script>
            CKEDITOR.replace('txt_describe_room');
    </script>

@endsection
