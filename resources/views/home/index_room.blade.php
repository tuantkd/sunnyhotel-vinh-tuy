@extends('layout.layout_home')
@section('title1', 'Phòng')
@section('content_home')
    <br><br><br>

    <script>
        var msg = '{{Session::get('post_rating_star')}}';
        var exist = '{{Session::has('post_rating_star')}}';
        if(exist){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Đã đánh giá thành công',
                showConfirmButton: false,
                timer: 3000
            })
        }
    </script>

    <style>
        .hover-color #hover-color:hover{
            color: orangered;
        }
    </style>


    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="{{ url('public/home/img/rooms-bg.jpg') }}">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Tất cả phòng</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->



    <!-- Rooms Section Begin -->
    <section class="room-section spad">
        <div class="container">
            @php($get_room_new = DB::table('rooms')->latest()->paginate(5))
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
                                <a href="{{ url('view-detail-room/'.$data->id) }}" class="hover-color">
                                    <h2 id="hover-color">{{ $data ->room_name }}</h2>
                                </a><br>
                                <div class="room-price">
                                    <span></span>
                                    <h2>Giá: {{ number_format($data ->room_price) }} VND/Ngày</h2>

                                    <br><br>
                                    <p style="text-align:justify;">
                                        {!! $data ->room_describe !!}
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
            {{ $get_room_new->links() }}
            <br>
        </div>
    </section>
    <!-- Rooms Section End -->


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
