@extends('layout.layout_admin')
@section('title','Trang chủ')

<!-- ========================================= -->
@section('content')



	<div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Bảng Điều Khiển</h1>
        </div>
        <!--End Page Header -->
    </div>





    <div class="row">
        <!--quick info section -->
        <div class="col-lg-3">
            <div class="alert alert-danger text-center">
                <i class="fas fa-envelope-open-text fa-3x"></i>&nbsp;
                <b>
                    @php($count_customer_feedback = DB::table('customers')->count())
                    {{ $count_customer_feedback }}
                </b>Khách hàng góp ý
            </div>
        </div>
        <div class="col-lg-3">
            <div class="alert alert-success text-center">
                <i class="fas fa-house-damage fa-3x"></i>&nbsp;
                <b> 
                    @php($count_room_all = DB::table('rooms')->count())
                    {{ $count_room_all }}
                </b>Tất cả phòng  
            </div>
        </div>
        <div class="col-lg-3">
            <div class="alert alert-info text-center">
                <i class="fas fa-file-invoice fa-3x"></i>&nbsp;
                <b>
                    @php($count_book_room = DB::table('book_rooms')->count())
                    {{ $count_book_room }}
                </b> Đơn đặt phòng
            </div>
        </div>
        <div class="col-lg-3">
            <div class="alert alert-warning text-center">
                <i class="fas fa-user fa-3x"></i>&nbsp;
                <b>
                    @php($count_user = DB::table('users')->count())
                    {{ $count_user }}
                </b>
                Nhân viên
            </div>
        </div>
        <!--end quick info section -->
    </div>



    <div class="row">
        <div class="col-lg-12">
            <!--danh sách đặt phòng mới nhất-->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fas fa-file-invoice"></i> Danh sách đặt phòng mới nhất
                </div>

                <div class="panel-body">
           <table class="table table-bordered">
            <thead>
              <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
                <th>Ngày nhận</th>
                <th>Ngày trả</th>
                <th>Số người</th>
                <th>Số lượng phòng</th>
                <th>Tiền cọc</th>
                <th colspan="2">Tùy chọn</th>
              </tr>
            </thead>
            <tbody>
                @php($get_book_room = DB::table('book_rooms')->latest()->take(5)->get())
                @foreach($get_book_room as $key=>$data7)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $data7->fullname_customer }}</td>
                    <td>{{ $data7->phone_customer }}</td>
                    <td>{{ $data7->address_customer }}</td>
                    <td>{{ $data7->bookroom_date_received }}</td>
                    <td>{{ $data7->bookroom_date_pay }}</td>
                    <td>{{ $data7->bookroom_number_person }}</td>
                    <td>{{ $data7->bookroom_number_room }}</td>
                    <td>{{ number_format($data7->bookroom_deposit_money) }}VND</td>

                    <td>
                        <a class="btn btn-primary" title="Xem chi tiết" 
                        href="{{ url('list-book-detail/'.$data7->id) }}" role="button">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>

                    <td>
                        <a class="btn btn-danger" title="Xóa" 
                        onclick="return confirm('Bạn có chắc chắn xóa?');"
                        href="{{ url('delete-book-room/'.$data7->id) }}" role="button">
                            <i class="fa fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
              @endforeach
              
            </tbody>
          </table>
        </div>
            <!--End danh sách đặt phong mới nhất -->
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!--Những Phòng mới nhất -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fas fa-hotel"></i> Những phòng mới nhất
                    </div>

                    <div class="panel-body">
                        <button style="margin-bottom: 10px;" class="btn btn-danger btn-sm delete_all"
                        data-url="{{ url('delete-room') }}">
                        <i class="fa fa-trash-alt"></i>
                        &ensp;Xóa tất cả đã chọn
                        </button>
               
                       <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th><input type="checkbox" id="check_all"></th>
                            <th>STT</th>
                            <th>Tên loại phòng</th>
                            <th>Tên phòng</th>
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Trạng thái</th>
                            
                          </tr>
                        </thead>
                        
                        <tbody>
                        @php($get_rooms = DB::table('rooms')->latest()->paginate(5))
                        @foreach($get_rooms as $key=>$data)
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
                            </tr>
                        @endforeach 

                        </tbody>
                      </table>

                    </div>

                </div>
                <!--End Những Phòng mới nhất -->
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


@endsection
