@extends('layout.layout_home')
@section('title1')
Trang Chủ
@endsection

@section('content_home')


<script>
        var msg = '{{Session::get('add_regitration')}}';
        var exist = '{{Session::has('add_regitration')}}';
        if(exist){
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã đăng ký thành công',
            showConfirmButton: false,
            timer: 1800
          })
        }
    </script>

    <!-- Hero Slider Begin -->
    <div class="hero-slider">
        <div class="slider-item">
            <div class="single-slider-item set-bg" 
            data-setbg="{{ url('public/home/img/nen.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12" >
                            <h1 style="text-align: center; color: yellow">Chào mừng bạn đến với Sunny Hotel</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Slider End -->

    <!-- Rooms Section Begin -->
    <section class="room-section spad">
        <div class="container">
            
            @php($get_room_new = DB::table('rooms')->latest()->paginate(3))
            @foreach($get_room_new as $data)
            <div class="rooms-page-item">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="room-pic-slider owl-carousel">

                        @php($get_image_room = DB::table('image_rooms')
                        ->where('room_id',$data->id)->get())
                        @foreach($get_image_room as $value)
                            <div class="single-room-pic">
                                <img src="{{ url('public/upload_image_room/'.$value->room_image) }}">
                            </div>
                        @endforeach

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="room-text">
                            <div class="room-title">
                                <h2>{{ $data ->room_name }}</h2><br>
                                <div class="room-price">
                                    <span></span>
                                    <h2>Giá: {{ number_format($data ->room_price) }} VND/Ngày</h2>

                                    <br><br>
                                    <a href="">
                                        <p style="text-align:justify;">
                                            {!! $data ->room_describe !!}
                                        </p>
                                    </a>
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
                            @if($data->room_status == 0)
                            <button class="primary-btn"
                            onclick="bookroom({{ $data->id }} + ',' + 1);">
                                Đặt phòng <i class="lnr lnr-arrow-right"></i>
                            </button>
                            @else
                            <button class="primary-btn">
                                Phòng đã đặt
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </section>
    <!-- Rooms Section End -->


    <!-- Facilities Section Begin -->
    <div class="facilities-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h1>Dịch vụ</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            @php($get_services = DB::table('services')->latest()->paginate(3))
            @foreach($get_services as $value)
            

            <div class="facilities-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                        </div>
                    </div>
                    
                    
                    @php($image_services = DB::table('image_services')
                    ->where('service_id', $value->id)->get())
                    @foreach($image_services as $data)
                    @if($loop->first)
                    <div class="col-lg-6 p-0">
                        <div class="facilities-img set-bg" 
                        data-setbg="{{ url('public/upload_image_service/'.$data->service_image) }}">
                        </div>
                    </div>
                    <hr>
                    @endif
                    @endforeach

                    <div class="col-lg-6 p-0 ">
                        <div class="facilities-text-warp">
                            <div class="facilities-text">
                                <h2>{{ $value->service_title }}</h2>
                                {{-- <p>{!! $value->service_describe !!}</p> --}}
                                <p> {!! Str::limit($value->service_describe, 150, '...') !!}</p>
                                <a href="{{ url('view-service-detail/'.$value->id) }}" class="primary-btn fac-btn">
                                    Chi tiết <i class="lnr lnr-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                </div>
            </div>

            
            @endforeach
        </div>
    </div>
    <!-- Section Begin -->



    <script type="text/javascript">
        function bookroom(e) {
            var ele = e.split(",");
            var id_room = ele[0];
            //alert(id_room);
                $.ajax({
                    url: '{{ url('book-room') }}/' + id_room,
                    type: 'GET',
                    data: { id: ele[0] },
                    success: function (result) {
                        location.href = '{{ url('index-bookroom') }}';
                    }
                });  
            };
    </script>




@endsection