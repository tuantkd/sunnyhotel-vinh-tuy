@extends('layout.layout_home')
@section('title1','Dịch vụ')


@section('content_home')

	<!-- Hero Section Begin -->
    <section class="hero-section set-bg" 
    data-setbg="{{ url('public/home/img/rooms-bg.jpg') }}">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach($categorys as $category)
                        <h1>{{ $category->category_name }}</h1>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
	<div class="col-xl-12">
        <div class="facilities-img set-bg" 
        data-setbg="{{ url('public/home/img/facilities-1.jpg') }}"></div>
    </div>


    <!-- About Room Section Begin -->
    <div class="about-us-room spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <h2>{{ $service_detail->service_title }}</h2>
                </div>
            </div>
            <div class="about-para">
                <div class="row">
                    <div class="col-lg-12">
                        <p>{!! $service_detail->service_describe !!}</p>
                    </div>
                </div>
            </div>


            <div class="footer-room-pic">
                <div class="container-fluid">
                    <div class="row">
                        @php($image_services = DB::table('image_services')
                        ->where('service_id', $service_detail->id)->get())
                        @foreach($image_services as $image_service)
                        <img src="{{ url('public/upload_image_service/'.$image_service->service_image) }}">
                        @endforeach
                    </div>
                </div>
            </div>
            <hr>
            <div class="footer-room-pic">
                <div class="container-fluid"><br>
                    <h2>Các Loại Dịch Vụ Khác</h2><br>
                    <div class="row">
                        @php($service_deferents = DB::table('category_services')->take(3)->get())
                        @foreach($service_deferents as $category_services)

                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center" 
                        style="margin-bottom:10px;">
                            <a href="{{ url('view-category-service/'.$category_services->id) }}">
                                <h3 style="color:orange;">{{ $category_services->category_name }}</h3>
                            </a>
                            <hr>

                            @php($services = DB::table('services')
                            ->where('category_service_id',$category_services->id)->get())
                            @foreach($services as $service)

                            @php($image_services = DB::table('image_services')
                            ->where('service_id',$service->id)->get())
                            @foreach($image_services as $image)
                            @if($loop->first)
                            
                            <a href="{{ url('view-category-service/'.$category_services->id) }}">
                            <img src="{{ url('public/image_service/'.$image->service_image) }}"
                            style="width:200px;height:120px;">
                            </a><hr>
                            
                            @endif
                            @endforeach
                            @endforeach
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Room Section End -->

@endsection