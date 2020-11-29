@extends('layout.layout_admin')
@section('title','Chỉnh sửa dịch vụ')

<!-- ========================================= -->
@section('content')
    <br><br><br>  
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <!--Những Phòng mới nhất -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    CHỈNH SỬA DỊCH VỤ
                </div>

                <div class="panel-body">

                    <form action="{{ url('update-service/'.$edit_services->id) }}" method="POST" name="myForm"
                    onsubmit="return validateForm()">

                        <!-- mã token bảo vệ dữ liệu -->
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="">Loại dịch vụ</label>
                            <select name="txt_category_service" class="form-control" required="required">

                                @php($get_categorys = DB::table('category_services')
                                ->where('id',$edit_services->category_service_id)->get())
                                @foreach($get_categorys as $value)
                                    <option value="{{ $value->id }}">
                                        {{ $value->category_name }}
                                    </option>
                                @endforeach


                                <option value="">- - Chọn - -</option>
                                @php($get_category_service = DB::table('category_services')->get())
                                @foreach($get_category_service as $value)
                                    <option value="{{ $value->id }}">
                                        {{ $value->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Tên dịch vụ</label>
                            <input type="text" class="form-control" 
                            value="{{ $edit_services->service_title }}" 
                            name="txt_service" id="txt_service">
                        </div>

                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea name="txt_describe_service"
                            class="form-control" rows="3" 
                            required="required">{{ $edit_services->service_describe }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">CẬP NHẬT</button>
                    </form>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>


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