@extends('layouts.landing')


@section('content')
    <!-- Banner Section -->
    <div class="banner-section">
        <div class="main-slider-carousel owl-carousel owl-theme">

            

            <div class="slide" data-bg-image="{{ asset('assets-landing/images/main-slider/intro-1.jpg') }}">
                <div class="auto-container w-100">
                    <div class="row clearfix">

                        <!-- Content Column -->
                        <div class="content-column col-lg-7 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="title" style="color: #fff">SIPRAKTIF</div>
                                <h1 style="color: #fff">Tentang Restorative Justice </h1>
                                <div class="text" style="color: #fff">Penjelasan Detail Terkait Apa Itu Restorative Justice ...</div>
                                <div class="btn-box" style="color: #fff">
                                    <a href="{{ route('tentangRj') }}" class="btn btn-light btn-style-one"><span class="txt">Pelajari Selengkapnya</span></a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="slide" data-bg-image="{{ asset('assets-landing/images/main-slider/intro-1.jpg') }}">
                <div class="auto-container w-100">
                    <div class="row clearfix">

                        <!-- Content Column -->
                        <div class="content-column col-lg-7 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="title" style="color: #fff">
                                    SIPRAKTIF
                                </div>
                                <h1 style="color: #fff">Sistem Informasi Penanganan Penghentian Penuntutan Berdasarkan Keadilan <span>Restoratif</span></h1>
                                <div class="text" style="color: #fff"></div>
                                <div class="btn-box">
                                    <a href="{{ route('tentangRj') }}" class="btn btn-light btn-style-one"><span class="txt">Pelajari Selengkapnya</span></a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>


        </div>
    </div>
    <!-- End Banner Section -->

    <!-- CTA Section Start -->
    {{-- <div class="cta-section" data-bg-image="{{ asset('assets-landing/images/background/cta-bg.jpg') }}">
        <div class="auto-container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <!-- CTA Content Start -->
                    <div class="cta-content">
                        <h3 class="title">Book an appoitment quickly? <span class="text-bold">Call us now!</span>
                        </h3>
                        <p>We prodive a dedicated support 24/7 for any your question</p>
                    </div>
                    <!-- CTA Content End -->
                </div>
                <div class="col-lg-5">
                    <!-- CTA Phone Number Start -->
                    <div class="cta-phone text-lg-end text-strat">
                        <h2 class="title">+0962-58-58-258</h2>
                    </div>
                    <!-- CTA Phone Number Start -->
                </div>
            </div>
        </div>
    </div> --}}
    <!-- CTA Section End -->

    <div class="blog-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <div class="title">Vidio</div>
                <h2>Vidio <span>Restorative </span>Justice Terbaru</h2>
            </div>
            <div class="inner-container">
                <div class="row">
                    @foreach ($kasus as $data)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $data->vidio }}" allowfullscreen></iframe>
                            </div>
                        </div>
                        
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Project Section -->
    <div class="project-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title">
                <div class="clearfix">
                    <div class="pull-left">
                        <h2>Jumlah Penghentian Penuntutan Berdasarkan Keadilan Restoratif di Wilayan Hukum Kejaksaan Tinggi Bengkulu sebanyak <span>+{{ $kasusCount }} </span> Perkara </h2>
                    </div>
                    <div class="">
                    </div>
                    <div class="pull-right">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Project Section -->

   
    
    <!-- Blog Section -->
    <div class="blog-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2>Perkara <span>Restorative </span>Justice Terbaru</h2>
            </div>
            <div class="inner-container">
                <div class="row">
                    @foreach ($kasus as $data)
                    <div class="col-md-4">
                        <div class="card" style="">
                            <img src="{{ asset('storage/gambar_sampul/' . $data->gambar_sampul) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <p><i class="bi bi-back"></i> Divisi {{ $data->division->name }} </p>
                                    </div>
                                    <div class="col-6">
                                        <p><i class="bi bi-calendar-week"></i> {{ $data->tanggal_publish }} </p>
                                    </div>
                                </div>
                                <h5 class="card-title">{{ $data->judul_berita }}</h5>
                                <br>
                                <a href="{{ route('detailPerkara', ['slug' => $data->slug]) }}" class="theme-btn btn-sm btn-style-one">Detail</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Section -->
@endsection
