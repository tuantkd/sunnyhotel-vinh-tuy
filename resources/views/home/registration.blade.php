@extends('layout.layout_home')
@section('title1')
Đăng ký
@endsection



@section('content_home')
    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="{{ url('public/home/img/contact-bg.jpg') }}">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Đ.KÝ & Đ.NHẬP</h1>
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
                {{-- <div class="col-lg-3">
                   
                </div> --}}
                <div class="col-lg-6">
                    <div class="contact-form">
                        <h5>Đăng Ký Thành Viên</h5>
                        <form action="{{ url('post-add-member') }}" method="POST">
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
                                    <p>Tên đăng nhập</p>
                                    <div class="input-group">
                                       <input type="text" placeholder="Nhập tên đăng nhập" 
                                        name="txt_user_name">
                                        <img src="{{ url('public/home/img/edit.png') }}">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <p>Password</p>
                                    <div class="input-group">
                                       <input type="Password" placeholder="Nhập Password" 
                                        name="txt_password">
                                        <img src="{{ url('public/home/img/edit.png') }}">
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
                                        <p>Email</p>
                                        <div class="input-group">
                                       <input type="text" placeholder="Nhập Email" 
                                        name="txt_email">
                                        <img src="{{ url('public/home/img/edit.png') }}">
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

                <div class="col-lg-6">
                    <div class="contact-form">
                        <h5>Đăng Nhập Thành Viên</h5>
                        <form action="{{ url('post-login') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                

                                <div class="col-lg-12">
                                    <p>Tên đăng nhập</p>
                                    <div class="input-group">
                                       <input type="text" placeholder="Nhập tên đăng nhập" 
                                        name="txt_username">
                                        <img src="{{ url('public/home/img/edit.png') }}">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <p>Password</p>
                                    <div class="input-group">
                                       <input type="Password" placeholder="Nhập Password" 
                                        name="txt_password">
                                        <img src="{{ url('public/home/img/edit.png') }}">
                                    </div>
                                </div>

                                    <p style="color:red;font-style:italic;">
                                        {{ $errors->first('txt_feedback') }}
                                    </p>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit">Đăng Nhập <i class="lnr lnr-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- <div class="col-lg-3">
                </div> --}}
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection