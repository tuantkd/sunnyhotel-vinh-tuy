@extends('layout.layout_admin')
@section('title','Lịch sử đặt phòng')

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
                    LỊCH SỬ ĐẶT PHÒNG
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
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($history_book_room as $key=>$data7)
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
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
