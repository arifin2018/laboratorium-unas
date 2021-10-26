@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')

<section class="container dashboard-caraosel">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($DashboardCaraosel as $item)
            @php
                $i = 0
            @endphp
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : ''}}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @php $i = 0 @endphp @foreach ($DashboardCaraosel as $item)
            <div class="carousel-item {{ $i == 0 ? 'active' : ''}}">
                <img src="{{ Storage::url($item->image) }}" class="d-block w-100" alt="Image Caraosel">
            </div>
            @php $i++ @endphp
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>

<section class="container online-system">
    <div class="row">
        <div class="col-md-6">
            <h3 class="online-text">On-Line Systems Universitas Nasional</h3>
        </div>
        <div class="col-md-6">
            <img src="{{ url('assets/images/online.png') }}" alt="Online system logo">
        </div>
    </div>
</section>

<section class="container ruangan">
    <h3 class="text-center">RUANGAN TERPOPULAR</h3>
    <div class="row">
        @php $dataAosDelay = 0 @endphp
        @if (isset($DetailsGallery))
            @foreach ($DetailsGallery as $Details)
                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="card-images-frame text-center position-relative" style="background-image: url('{{ isset($Details->Gallery->first()->images) ? Storage::url($Details->Gallery->first()->images) : '' }}')" data-aos="fade-up" data-aos-delay="{{$dataAosDelay += 100}}">
                        <div class="ruangan-title position-absolute">{{ $Details->title }}</div>
                        {{-- <a href="{{ route('details-lab',$Details->slug) }}" class="btn btn-success position-absolute"> --}}
                        <a href="{{ url('Laboratorium',$Details->slug) }}" class="btn btn-success position-absolute">
                            View Details
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            @foreach ($TransaksiGallery as $Details)
                <div class="col-md-3">
                    <div class="card-images-frame text-center position-relative" style="background-image: url('{{ isset($Details->detail_ruangan->Gallery->first()->images) ? Storage::url($Details->detail_ruangan->Gallery->first()->images) : '' }}')" data-aos="fade-up" data-aos-delay="{{$dataAosDelay += 100}}">
                        <div class="ruangan-title position-absolute">{{ $Details->detail_ruangan->title }}</div>
                        {{-- <a href="{{ route('details-lab',$Details->slug) }}" class="btn btn-success position-absolute"> --}}
                        <a href="{{ url('Laboratorium',$Details->detail_ruangan->slug) }}" class="btn btn-success position-absolute">
                            View Details
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>

<section class="container berita">
    <h3 class="text-center">BERITA TERBARU</h3>
    <div class="row berita-images">
        @php $dataAosDelay = 0 @endphp
        @foreach ($BeritaImages as $berita)
        <div class="col-md-4 mb-3 h-100">
            <a href="{{route('details-berita',$berita->slug)}}">
                <img src="{{ isset($berita->BeritaImage->first()->images) ? Storage::url($berita->BeritaImage->first()->images) : '' }}" alt="berita images" data-aos="fade-up" data-aos-delay="{{$dataAosDelay += 100}}">
                <h5 data-aos="fade-up" data-aos-delay="{{$dataAosDelay += 100}}">{{ $berita->title }}</h5>
            </a>
        </div>
        @endforeach
    </div>
</section>

@endsection
