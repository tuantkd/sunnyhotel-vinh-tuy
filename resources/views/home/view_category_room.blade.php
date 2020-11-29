@extends('layout.layout_home')
@section('title1')
    Xem loại phòng
@endsection

@section('content_home')

	<!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="{{ url('public/home/img/rooms-bg.jpg') }}">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>{{ $finds_rooms->category_name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->


	<section class="room-availability spad">
        <div class="container">
            @php($rooms = DB::table('rooms')->where('category_id',$finds_rooms->id)->paginate(5))
            @foreach($rooms as $get_room_categorys)

            <div class="rooms-page-item">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="room-pic-slider owl-carousel">

                        @php($get_image_room = DB::table('image_rooms')
                        ->where('room_id',$get_room_categorys->id)->get())
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
                                <h2>{{ $get_room_categorys ->room_name }}</h2><br>
                                <div class="room-price">
                                    <span></span>
                                    <h2>Giá: {{ number_format($get_room_categorys ->room_price) }} VND/Ngày</h2>

                                    <br><br>
                                    <p style="text-align:justify;">
                                        {!! Str::limit($get_room_categorys->room_describe, 150, '...') !!}
                                    </p>
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
                            @if($get_room_categorys->room_status == 0)
                            <button class="primary-btn"
                            onclick="bookroom({{ $get_room_categorys->id }} + ',' + 1);">
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
            

            
            <br>
            {{ $rooms->links() }}
        </div> 
    </section>


    <script type="text/javascript">
        function bookroom(e) {
            var ele = e.split(",");
            var id_room = ele[0];
            //alert(id);
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