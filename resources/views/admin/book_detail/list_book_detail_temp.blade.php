<!DOCTYPE html>
<html lang="vi">
<head>
  <title>Hóa đơn thanh toán</title>
  <meta charset="utf-8">
  <link rel="icon" href="{{ url('public/admin/image_logo/sunnyhotel/logo-sunnyhotel.png') }}" type="image/icon type">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Muli', sans-serif;">

  <div class="container text-center"><br><br>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <div class="panel panel-default">

          <div class="panel-heading" style="height:85px;">
              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <img src="{{ url('public/admin/image_logo/sunnyhotel/logo-sunnyhotel-text.png')}}"
                style="max-width: 100%; height:60px;"/>
              </div>

              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-left">
                <p style="font-size:12px;">
                  <i class="fas fa-map-marker-alt" style="color:orange;"></i>
                  &emsp;5-7 Hai Bà Trưng, An Lạc, Ninh Kiều,Cần Thơ <br>

                  <i class="fas fa-phone" style="color:orange;"></i>
                  &emsp;+(84) 3 95 95 95 <br>

                  <i class="fas fa-envelope" style="color:orange;"></i>
                  &emsp;sunnyhotel@gmail.com <br>
                </p>

              </div>

              <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right">
                <span style="font-size:20px;">Số:</span>
                &ensp;<b style="font-size:25px;color:red;"><p id="demo"></p></b>
              </div>
          </div>


          @php($book_details = DB::table('book_detail_temps')
          ->where('bookroom_temp_id',$get_book_room_temp->id)->get())
          @foreach($book_details as $book_detail)

          <div class="panel-body" style="padding:5px;">
          <h3><b>HÓA ĐƠN THANH TOÁN</b></h3>
          <p style="font-size:20px;padding:10px;text-align:left;">
            <span>Họ và tên:</span> <b>{{ $get_book_room_temp->fullname_customer }}</b> <br>
            <span>Số điện thoại:</span> <b>0{{ $get_book_room_temp->phone_customer }}</b> <br>
            <span>Địa chỉ:</span> <b>{{ $get_book_room_temp->address_customer }}</b> <br>
          </p>

            <table style="font-size:15px;padding:10px;" class="table table-bordered">
              <tbody>

                <tr>
                    <td>Ngày nhận</td>
                    <td><b>{{ $get_book_room_temp->bookroom_date_received }}</b></td>
                </tr>

                <tr>
                    <td>Ngày trả</td>
                    <td><b>{{ $get_book_room_temp->bookroom_date_pay }}</b></td>
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
                    <td><b>{{ $get_book_room_temp->bookroom_number_room }}</b></td>
                </tr>

                <tr>
                    <td>Tiền đặt cọc</td>
                    <td><b>{{ number_format($get_book_room_temp->bookroom_deposit_money) }} VND</b></td>
                </tr>

                <tr>
                    <td>Tổng tiền</td>
                    <td><b>{{ number_format($book_detail->book_details_total_price) }} VND</b></td>
                </tr>

                <tr id="pay">
                    <td>THANH TOÁN: </td>
                    <td>
                      <button class="btn btn-success" type="button"
                      onclick="click_print_delete();">
                        <i class="fab fa-amazon-pay" style="font-size:25px;"></i>
                      </button>
                    </td>
                </tr>



              </tbody>
            </table>
          </div>

          @endforeach
        </div>
        <!-- panel-default -->
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function click_print_delete() {

      $("#pay").hide();
      window.print();

      location.href = "{{ url('delete-book-room-temps/'.$get_book_room_temp->id) }}";

    }
  </script>

  <script>
    document.getElementById("demo").innerHTML = Math.floor(Math.random() * 10000);
  </script>

</body>
</html>
