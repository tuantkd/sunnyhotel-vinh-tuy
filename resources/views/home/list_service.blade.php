@extends('layout.layout_home')
@section('title1')
Dịch vụ
@endsection

@section('content_home')

	<!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="{{ url('public/home/img/rooms-bg.jpg') }}">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Tất cả dịch vụ</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
	<div class="col-xl-12">
        <div class="facilities-img set-bg" 
        data-setbg="{{ url('public/home/img/facilities-1.jpg') }}">
        </div>
    </div>


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
            @php($get_services = DB::table('services')->latest()->paginate(5))
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
                                <p>{!! Str::limit($value->service_describe, 150, '...') !!}</p>
                                <a href="{{ url('view-service-detail/'.$value->id) }}" 
                                class="primary-btn fac-btn">
                                    Chi tiết <i class="lnr lnr-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                </div>
            </div>

            
            @endforeach

            <br><br>

            {{ $get_services->links() }}
        </div>

        
    </div>
    <!-- Facilities Section Begin -->

    
@endsection