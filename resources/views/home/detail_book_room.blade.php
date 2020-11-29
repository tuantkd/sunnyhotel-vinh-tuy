@extends('layout.layout_home')
@section('title1')
Chi tiết đặt phòng
@endsection

@section('content_home')
    
    <script>
        var msg = '{{Session::get('add_book_room')}}';
        var exist = '{{Session::has('add_book_room')}}';
        if(exist){
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã đặt phòng',
            showConfirmButton: false,
            timer: 1800
          })
        }
    </script>

	<!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="{{ url('public/home/img/rooms-bg.jpg') }}">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Chi tiết đặt phòng</h1>
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
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                    @foreach($detail_book_room as $detail)

                    @php($get_customers = DB::table('book_rooms')
                    ->where('id',$detail->bookroom_id)->get())
                    @foreach($get_customers as $get_customer)

                        <div class="check-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 style="text-align: center;">THÔNG TIN CHI TIẾT</h2>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <p>Họ và tên: <b>{{ $get_customer->fullname_customer }}</b></p>
                                </div>

                                <div class="col-lg-6">
                                    <p>Điện thoại: <b>{{ $get_customer->phone_customer }}</b></p>
                                </div>
                            
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Địa chỉ: <b>{{ $get_customer->address_customer }}</b></p>
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="col-lg-6">
                                    <p>Ngày nhận: <b>{{ $get_customer->bookroom_date_received }}</b></p>
                                </div>

                                <div class="col-lg-6">
                                    <p>Ngày trả: <b>{{ $get_customer->bookroom_date_pay }}</b></p>
                                </div>
                            </div>

                            @php($get_rooms = DB::table('rooms')
                            ->where('id',$detail->room_id)->get())
                            @foreach($get_rooms as $get_room)
                            <div class="row">
                                <div class="col-lg-6">
                                    <p>Tên phòng: <b>{{ $get_room->room_name }}</b></p>
                                </div>
                            
                                <div class="col-lg-6">
                                    <p>Giá phòng: 
                                        <b>{{ number_format($get_room->room_price) }} VND</b>
                                    </p>
                                 </div>
                            </div>
                            @endforeach

                            <div class="row">
                                <div class="col-lg-6">
                                    <p>Số người: 
                                        <b>{{ $detail->number_person }}</b>
                                    </p>
                                </div>

                                <div class="col-lg-6">
                                    <p>Số lượng phòng: 
                                        <b>{{ $get_customer->bookroom_number_room }}</b>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <p>Tiền đặt cọc: 
                                        <b>
                                            {{ number_format($get_customer->bookroom_deposit_money) }} VND
                                        </b>
                                    </p>
                                </div>

                                <div class="col-lg-6">
                                    <p>Tổng tiền: 
                                        <b>
                                        {{ number_format($detail->book_details_total_price) }} VND
                                        </b>
                                    </p>
                                </div>
                            </div>

                            <a href="{{ url('/') }}" class="primary-btn">
                                Hoàn tất <i class="lnr lnr-arrow-right"></i>
                            </a>
                        </div>
                    @endforeach
                    @endforeach
                    </div>
                    <div class="col-lg-2"></div>   
                </div>
            </div>
        </div> 
    </section>





@endsection