@extends('layout.layout_home')
@section('title1')
Giới Thiệu
@endsection



@section('content_home')

<!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="{{ url('public/home/img/about-us-bg.jpg') }}">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Giới Thiệu</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Room Section Begin -->
    <div class="about-us-room spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <h2>“Bạn sẽ cảm thấy hài lòng khi đến với Sunny Hotel”.</h2>
                </div>
            </div>
            <div class="about-para">
                <div class="row">
                    <div class="col-lg-6">
                        <p>Khách sạn Sunny được thành lập từ năm 2014, là một trong những khách sạn tiện nghi và được yêu thích nhất tại thành phố Cần Thơ, tọa lạc tại vị trí đắc địa của trung tâm thành phố với hai mặt tiền tiếp giáp hai dòng sông Cần Thơ và sông Hậu hiền hòa, ngay cạnh khuôn viên Bến Ninh Kiều thơ mộng và cầu đi bộ lộng lẫy về đêm, gần các siêu thị, trung tâm mua sắm hiện đại, bảo tàng thành phố và khu công viên cây xanh chỉ với 15 phút đi bộ.</p>
                    </div>
                    <div class="col-lg-6">
                        <p>Cùng với sự thay đổi thăng trầm theo thời gian của thủ phủ miền sông nước Tây Đô, khách sạn Sunny với diện tích 17.000m2 nay được đầu tư thiết kế hiện đại mang hình dáng của một con tàu vững chãi, uy nghi trên miền sông nước. Lối kiến trúc độc đáo, không gian rộng và ấm áp cùng với các trang thiết bị hiện đại, nội thất cao cấp nhập khẩu tiêu chuẩn 4 sao với 162 phòng nghỉ được thiết kế hơn 70% có hướng nhìn về dòng sông Hậu, cầu Cần Thơ và Cồn Ấu bốn mùa trĩu quả, đảm bảo mang lại cho hành trình của Quý khách và Gia đình sự thoải mái và tiện nghi. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Room Section End -->


    <!-- Gallery Section Begin -->
    <section class="gallery-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="gallery-text">
                        <h2>Tất Cả Các Dịch Vụ</h2>
                        <p>Tất cả các dịch vụ của chúng tôi luôn cải tiến để đáp ứng đầy đủ các nhu cầu thị hiếu của khách hàng, đặt mục tiêu sự hài lòng của khách hàng lên hàng đầu.Tất cả các dịch vụ sẽ mang đến cho khách hàng những không gian hoàn hảo nhất trong khoảng thời gian quý khách lưu trú tại Sunny Hotel.</p>
                        <a href="{{ url('list-service') }}" class="primary-btn">Chi Tiết <i class="lnr lnr-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-3 col-sm-6">
                            <div class="gallery-img">
                                <img src="{{ url('public/image_service/13.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-3 col-sm-6">
                            <div class="gallery-img">
                                <img src="{{ url('public/image_service/5.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-3 col-sm-6">
                            <div class="gallery-img">
                                <img src="{{ url('public/image_service/28.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-3 col-sm-6">
                            <div class="gallery-img">
                                <img src="{{ url('public/image_service/19.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery Section End -->


@endsection