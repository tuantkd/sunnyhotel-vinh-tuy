@extends('layout.layout_home')
@section('title1')
Đặt phòng
@endsection

@section('content_home')

	<!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="{{ url('public/home/img/rooms-bg.jpg') }}">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Đặt phòng</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->


	<section class="room-availability spad">
        <div class="container">
            <div class="room-check">
                <div class="row">

                    @if(session('buy_now'))
                    <?php $total = 0; ?>
                    @foreach(session('buy_now') as $id => $data)
                    @if($loop->last)

                    <div class="col-lg-6">
                        <div class="room-item">
                            <div class="room-pic-slider room-pic-item owl-carousel">
                                <div class="room-pic">
                                    <img src="{{ url('public/upload_image_room/'.$data['room_image']) }}">
                                </div>
                            </div>
                            <div class="room-text">
                                <div class="room-title">
                                    <h2>{{ $data['room_name'] }}</h2>
                                    <div class="room-price">
                                        <h2>Giá: {{ number_format($data['room_price']) }} VNĐ/Ngày</h2>
                                    </div>
                                </div>
                                <div class="room-features">
                                    <div class="room-info">
                                        <i class="flaticon-019-television"></i>
                                        <span>Tivi</span>
                                    </div>
                                    <div class="room-info">
                                        <i class="flaticon-029-wifi"></i>
                                        <span>Wi-fi</span>
                                    </div>
                                    <div class="room-info">
                                        <i class="flaticon-003-air-conditioner"></i>
                                        <span>Máy lạnh</span>
                                    </div>
                                    <div class="room-info">
                                        <i class="flaticon-036-parking"></i>
                                        <span>Bãi đỗ xe</span>
                                    </div>
                                    <div class="room-info last">
                                        <i class="flaticon-007-swimming-pool"></i>
                                        <span>Hồ bơi</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endif
                    @endforeach
                    @endif

                    <div class="col-lg-6">
                        <div class="check-form">
                            <h2>Đặt phòng</h2>


                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            <form action="{{ url('post-checkout-bookroom') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="datepicker">
                                    <div class="date-select">
                                        <p>Ngày nhận</p>
                                        <input type="text" class="datepicker-1"
                                        name="txt_date_start">
                                        <img src="{{ url('public/home/img/calendar.png') }}">

                                    </div>
                                    <div class="date-select to">
                                        <p>Ngày trả</p>
                                        <input type="text" class="datepicker-2"
                                        name="txt_date_end">
                                        <img src="{{ url('public/home/img/calendar.png') }}">
                                    </div>
                                </div>
                                <div class="room-quantity">
                                    <div class="single-quantity">
                                        <p>Số người</p>
                                        <div class="pro-qty">
                                            <input type="text" value="1" name="txt_number_person">
                                        </div>
                                    </div>
                                    <div class="single-quantity last">
                                        <p>Phòng</p>
                                        <div class="pro-qty">
                                            <input type="text" value="1" name="txt_number_room">
                                        </div>
                                    </div>
                                </div>
                                <div class="room-selector">
                                    <p>Tiền đặt cọc</p>
                                    <select class="suit-select" name="txt_money_deposit">
                                        <option value="">- - - Chọn - - -</option>
                                        <option value="500000">500.000 VND</option>
                                        <option value="1000000">1.000.000 VND</option>
                                    </select>
                                    <p style="color: red;">xin quý khách vui lòng chuyển khoản trước để đặt phòng. Cảm ơn!</p>
                                </div>

                                <div class="datepicker">
                                    <div class="date-select">
                                        <p>Họ tên khách hàng</p>
                                        <input type="text" placeholder="Nhập họ và tên"
                                        name="txt_fullname_customer">
                                    </div>
                                </div>
                                <div class="datepicker">
                                    <div class="date-select">
                                        <p>Điện thoại</p>
                                        <input type="number" placeholder="Nhập điện thoại"
                                        name="txt_phone" id="mobile" onblur="Test_number_phone();">
                                    </div>
                                </div>
                                <div class="datepicker">
                                    <div class="date-select">
                                        <p>Email</p>
                                        <input type="email" placeholder="Nhập email"
                                        name="txt_email">
                                    </div>
                                </div>

                                <div class="datepicker">
                                    <div class="date-select">
                                        <p>Địa chỉ</p>
                                        <input type="text" placeholder="Nhập địa chỉ"
                                        name="txt_address">
                                    </div>
                                </div>


                                <button type="submit">
                                   Đặt phòng <i class="lnr lnr-arrow-right"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        function Test_number_phone() {
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            var mobile = $('#mobile').val();
            if(mobile !==''){
                if (vnf_regex.test(mobile) == false)
                {
                    alert('Số điện thoại của bạn không đúng định dạng!');
                    document.getElementById('mobile').value = "";
                    document.getElementById('mobile').focus();
                }
            }
        }
    </script>



@endsection
