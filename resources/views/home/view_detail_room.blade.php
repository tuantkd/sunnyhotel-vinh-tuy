@extends('layout.layout_home')
@section('title1', 'Chi tiết phòng')
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
        .rate {
            float: left;
            height: 65px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            position:absolute;
            top:-9999px;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:50px;
            color:#ccc;
            margin-bottom: 30px;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #ffc700;
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }

        /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
    </style>


    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="{{ url('public/home/img/rooms-bg.jpg') }}">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Xem chi tiết phòng</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->



    <!-- Rooms Section Begin -->
    <section class="room-section spad">
        <div class="container">
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
                                    <p style="text-align:justify;">
                                        {!! $data ->room_describe !!}
                                    </p>
                                </div>
                            </div>

                            <form class="rating" id="myForm" method="POST" action="{{ url('post-rating-star/'.$data->id) }}">
                                {{ csrf_field() }}
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" onclick="document.getElementById('myForm').submit();"/>
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" onclick="document.getElementById('myForm').submit();"/>
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" onclick="document.getElementById('myForm').submit();"/>
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" onclick="document.getElementById('myForm').submit();"/>
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" onclick="document.getElementById('myForm').submit();"/>
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </form>

                            <div class="well well-sm" style="clear: left;">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6 text-center">
                                        <h1 class="rating-num">
                                            @php($avg_star = DB::table('rating_stars')->where('room_id',$data->id)->avg('number_star'))
                                            <?php echo number_format($avg_star,1); ?>/5 <span style="color: yellow">★</span>
                                        </h1>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="row rating-desc">
                                            <div class="col-xs-3 col-md-3 text-right">
                                                <span class="glyphicon glyphicon-star"></span>5
                                            </div>
                                            <div class="col-xs-8 col-md-9">
                                                <div class="progress progress-striped">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                                         aria-valuemin="0" aria-valuemax="100" style="width: 100%; background-color: yellow">
                                                        <span class="sr-only">100%</span><span style="color: black">
                                                            @php($count_five = DB::table('rating_stars')
                                                            ->where([['number_star','=',5],['room_id','=',$data->id]])->count())
                                                            <?php echo $count_five; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end 5 -->
                                            <div class="col-xs-3 col-md-3 text-right">
                                                <span class="glyphicon glyphicon-star"></span>4
                                            </div>
                                            <div class="col-xs-8 col-md-9">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                                         aria-valuemin="0" aria-valuemax="100" style="width: 80%; background-color: green">
                                                        <span class="sr-only">80%</span><span style="color: black">
                                                            @php($count_four = DB::table('rating_stars')
                                                            ->where([['number_star','=',4],['room_id','=',$data->id]])->count())
                                                            <?php echo $count_four; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end 4 -->
                                            <div class="col-xs-3 col-md-3 text-right">
                                                <span class="glyphicon glyphicon-star"></span>3
                                            </div>
                                            <div class="col-xs-8 col-md-9">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                                                         aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                                        <span class="sr-only">50%</span><span style="color: black">
                                                            @php($count_three = DB::table('rating_stars')
                                                            ->where([['number_star','=',3],['room_id','=',$data->id]])->count())
                                                            <?php echo $count_three; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end 3 -->
                                            <div class="col-xs-3 col-md-3 text-right">
                                                <span class="glyphicon glyphicon-star"></span>2
                                            </div>
                                            <div class="col-xs-8 col-md-9">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20"
                                                         aria-valuemin="0" aria-valuemax="100" style="width: 30%; background-color: orange">
                                                        <span class="sr-only">30%</span><span style="color: black">
                                                            @php($count_two = DB::table('rating_stars')
                                                            ->where([['number_star','=',2],['room_id','=',$data->id]])->count())
                                                            <?php echo $count_two; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end 2 -->
                                            <div class="col-xs-3 col-md-3 text-right">
                                                <span class="glyphicon glyphicon-star"></span>1
                                            </div>
                                            <div class="col-xs-8 col-md-9">
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
                                                         aria-valuemin="0" aria-valuemax="100" style="width: 10%; background-color: red">
                                                        <span class="sr-only">10%</span><span style="color: black">
                                                            @php($count_one = DB::table('rating_stars')
                                                            ->where([['number_star','=',1],['room_id','=',$data->id]])->count())
                                                            <?php echo $count_one; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end 1 -->
                                        </div>
                                        <!-- end row -->
                                    </div>
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

                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0" nonce="c55gpTxS"></script>
                <div class="fb-comments" data-href="http://localhost/sunnyhotel/view-detail-room/{{ $data->id }}" data-numposts="5" data-width="100%"></div>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->

    <script>
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
