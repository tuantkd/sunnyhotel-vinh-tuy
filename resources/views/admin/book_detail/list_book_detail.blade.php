@extends('layout.layout_admin')
@section('title','Danh sách chi tiết đặt phòng')

<!-- ========================================= -->
@section('content')
    <br><br><br>

     <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fas fa-users"></i> CHI TIẾT ĐẶT PHÒNG
                </div>

                <div class="panel-body">
                   
                   <table class="table table-bordered">
                    <tbody>

                    @php($book_details = DB::table('book_details')
                    ->where('bookroom_id',$get_book_room->id)->get())
                    @foreach($book_details as $book_detail)

                      <tr>
                          <td>Họ và tên</td>
                          <td><b>{{ $get_book_room->fullname_customer }}</b></td>
                      </tr>

                      <tr>
                          <td>Số điện thoại</td>
                          <td><b>0{{ $get_book_room->phone_customer }}</b></td>
                      </tr>

                      <tr>
                          <td>Địa chỉ</td>
                          <td><b>{{ $get_book_room->address_customer }}</b></td>
                      </tr>

                      <tr>
                          <td>Ngày nhận</td>
                          <td><b>{{ $get_book_room->bookroom_date_received }}</b></td>
                      </tr>

                      <tr>
                          <td>Ngày trả</td>
                          <td><b>{{ $get_book_room->bookroom_date_pay }}</b></td>
                      </tr>
                    
                    @php($get_rooms = DB::table('rooms')
                    ->where('id',$book_detail->room_id)->get())
                    @foreach($get_rooms as $get_room)

                    @php($get_categorys = DB::table('categoryrooms')
                    ->where('id',$get_room->category_id)->get())
                    @foreach($get_categorys as $get_category)
                      <tr>
                          <td>Tên loại phòng</td>
                          <td><b>{{ $get_category->category_name }}</b></td>
                      </tr>
                    @endforeach

                      <tr>
                          <td>Giá phòng</td>
                          <td><b>{{ number_format($get_room->room_price) }}VND</b></td>
                      </tr>

                    @endforeach

                      <tr>
                          <td>Số người</td>
                          <td><b>{{ $book_detail->number_person }}</b></td>
                      </tr>

                      <tr>
                          <td>Số lượng phòng</td>
                          <td><b>{{ $get_book_room->bookroom_number_room }}</b></td>
                      </tr>

                      <tr>
                          <td>Tiền đặt cọc</td>
                          <td><b>{{ number_format($get_book_room->bookroom_deposit_money) }} VND</b></td>
                      </tr>

                      <tr>
                          <td>Tổng tiền</td>
                          <td><b>{{ number_format($book_detail->book_details_total_price) }} VND</b></td>
                      </tr>

                      <tr>
                          <td>Xác nhận</td>
                          <td>
                            <a class="btn btn-success" 
                            href="{{ url('check-book-room/'.$get_book_room->id.'/'.$book_detail->id) }}">
                              <i class="fas fa-check"></i> Duyệt
                            </a>
                          </td>
                      </tr>

                    @endforeach

                    </tbody>
                  </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>  
@endsection