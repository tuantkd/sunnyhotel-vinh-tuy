@extends('layout.layout_admin')
@section('title','Danh sách phòng')

<!-- ========================================= -->
@section('content')
    <br><br><br>

    <div class="row">
        <div class="col-lg-12">
            <!--Những Phòng mới nhất -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fas fa-edit"></i> CHỈNH SỬA PHÒNG
                </div>

                <div class="panel-body">


                    <form action="{{ url('update-room/'.$get_room_id->id) }}" 
                    method="POST" name="myForm" enctype="multipart/form-data">

                        <!-- mã token bảo vệ dữ liệu -->
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="">Tên loại phòng</label>
                            <select name="txt_category_id" class="form-control" 
                            required="required">
                                
                                <!-- Lấy id hiện tại  -->
                                @php($get_category_ids = DB::table('categoryrooms')
                                ->where('id',$get_room_id->category_id)->get())
                                @foreach($get_category_ids as $data)
                                    <option value="{{ $data->id }}">
                                        {{ $data->category_name }}
                                    </option>
                                @endforeach
                                <!-- Lấy id hiện tại  -->
                                
                                <!-- Thay đổi cái khác thì chọn nó  -->
                                <option value="">- - Chọn - -</option>
                                @php($get_categorys = DB::table('categoryrooms')->get())
                                @foreach($get_categorys as $value)
                                    <option value="{{ $value->id }}">
                                        {{ $value->category_name }}
                                    </option>
                                @endforeach
                                <!-- Thay đổi cái khác thì chọn nó  -->
                            </select><br>

                            <label for="">Tên phòng</label>
                            <input type="text" class="form-control"
                            value="{{ $get_room_id->room_name }}" 
                            name="txt_name_room" id="txt_name_room"><br>
                                
                            <label for="pwd">Hình ảnh:</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input"
                                    value="{{ $get_room_id->room_image }}"
                                    name="txt_img_room" id="txt_img_room">
                                 </div>
                            </div><br>

                            <label for="">Giá</label>
                            <input type="number" class="form-control" 
                            value="{{ $get_room_id->room_price }}"
                            name="txt_price_room" id="txt_price_room"><br>
                            
                            <label for="">Mô tả</label>
                            <textarea name="txt_describe_room" class="form-control" rows="3" 
                            required="required">{{ $get_room_id->room_describe }}</textarea>
                        

                        </div>
                        <button type="submit" class="btn btn-primary">CẬP NHẬT</button>
                    </form>


                </div>
            </div>
            <!--End Những Phòng mới nhất -->
        </div>
    </div>

    <script>
        CKEDITOR.replace('txt_describe_room');
    </script>

@endsection
