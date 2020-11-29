@extends('layout.layout_admin')
@section('title','Danh sách đặt phòng')

<!-- ========================================= -->
@section('content')
    <br><br><br>

    <script>
        var msg = '{{Session::get('delete_book_room_temps')}}';
        var exist = '{{Session::has('delete_book_room_temps')}}';
        if(exist){
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã xuất hóa đơn',
            showConfirmButton: false,
            timer: 1800
          })
        }
    </script>

    <script>
        var msg = '{{Session::get('delete_book_room')}}';
        var exist = '{{Session::has('delete_book_room')}}';
        if(exist){
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã xóa đặt phòng',
            showConfirmButton: false,
            timer: 1800
          })
        }
    </script>


    <script>
        var msg = '{{Session::get('check_complete')}}';
        var exist = '{{Session::has('check_complete')}}';
        if(exist){
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã duyệt',
            showConfirmButton: false,
            timer: 1800
          })
        }
    </script>

    <div class="row">
        <div class="col-lg-12">
            <!--Những Phòng mới nhất -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    DANH SÁCH ĐẶT PHÒNG CHƯA DUYỆT
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
                                <a class="btn btn-primary btn-sm" title="Xem chi tiết"
                                href="{{ url('list-book-detail/'.$data7->id) }}" role="button">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>

                            <td>
                                <a class="btn btn-danger btn-sm" title="Xóa"
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
            </div>
        </div>
    </div>


    <!-- =========================================================================== -->


    <div class="row">
        <div class="col-lg-12">
            <!--Những Phòng mới nhất -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-8">
                            DANH SÁCH ĐẶT PHÒNG ĐÃ DUYỆT
                        </div>
                        <div class="col-sm-4 text-right">
                            <a class="btn btn-info btn-sm" title="Xem chi tiết"
                               href="{{ url('view-history-book-room') }}" role="button">
                                <i class="fas fa-history"></i> Lịch sử đặt phòng
                            </a>
                        </div>
                    </div>
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
                        <th>Tùy chọn</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($get_book_room_temp as $key=>$data7)
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
                                href="{{ url('list-book-detail-temp/'.$data7->id) }}" role="button">
                                    <i class="fas fa-eye"></i>
                                </a>
                                {{-- <button type="button" class="btn btn-success"
                                onclick="window.print()">
                                    <i class="fab fa-amazon-pay" style="font-size:25px;"></i>
                                </button> --}}
                            </td>

                        </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>


@endsection
