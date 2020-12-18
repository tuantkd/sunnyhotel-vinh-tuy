@extends('layout.layout_home')
@section('title1')
Liên Hệ
@endsection



@section('content_home')


    <script>
        var msg = '{{Session::get('add_customer_feedback')}}';
        var exist = '{{Session::has('add_customer_feedback')}}';
        if(exist){
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã góp ý thành công',
            showConfirmButton: false,
            timer: 1800
          })
        }
    </script>

 <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="{{ url('public/home/img/contact-bg.jpg') }}">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Liên Hệ</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-left">
                        <div class="contact-information">
                            <h2>Thông Tin Liên Lạc</h2>
                            <ul>
                                <li>
                                    <img src="{{ url('public/home/img/placeholder-copy.png') }}">
                                    <span>5-7 Hai Bà Trưng, An Lạc, Ninh Kiều,Cần Thơ</span>
                                </li>
                                <li>
                                    <img src="{{ url('public/home/img/phone-copy.png') }}">
                                    <span>+(0292) 3 95 95 95</span>
                                </li>
                                <li>
                                    <img src="{{ url('public/home/img/envelop.png') }}">
                                    <span>Vinhtuy@gmail.com</span>
                                </li>
                                <li>
                                    <img src="{{ url('public/home/img/clock-copy.png') }}">
                                    <span>Giờ làm việc: 24/24h </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <h5>Đóng góp ý kiến ...</h5>
                        <form action="{{ url('post-customer-feedback') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Họ và tên</p>
                                    <div class="input-group">
                                        <input type="text" placeholder="Nhập họ và tên"
                                        name="txt_fullname">
                                        <img src="{{ url('public/home/img/edit.png') }}">

                                        <p style="color:red;font-style:italic;">
                                            {{ $errors->first('txt_fullname') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <p>Điện thoại</p>
                                    <div class="input-group phone-num">
                                        <input type="number" placeholder="Nhập số điện thoại"
                                        name="txt_phone">
                                        <img src="{{ url('public/home/img/phone-copy.png') }}">

                                        <p style="color:red;font-style:italic;">
                                            {{ $errors->first('txt_phone') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <p>Địa chỉ</p>
                                    <div class="input-group phone-num">
                                        <input type="text" placeholder="Nhập địa chỉ cư trú"
                                        name="txt_address">
                                        <img src="{{ url('public/home/img/placeholder-copy.png') }}">

                                        <p style="color:red;font-style:italic;">
                                            {{ $errors->first('txt_address') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="message">
                                        <p>Góp ý</p>
                                        <div class="textarea">
                                            <textarea placeholder="Nhập góp ý ..."
                                            name="txt_feedback"></textarea>
                                            <img src="{{ url('public/home/img/speech-copy.png') }}">
                                        </div>
                                    </div>

                                    <p style="color:red;font-style:italic;">
                                        {{ $errors->first('txt_feedback') }}
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit">Gửi <i class="lnr lnr-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->


@endsection
