@extends('layouts.dashboard')
@section('title', 'Berita')
@section('content')

<section class="container breadcrumb-transaksi">
    <div class="row">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Berita</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="container Berita-caraosel">
    <div class="row">
        <div class="col-md-8">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-aos="fade-up" data-aos-delay="100">
                <ol class="carousel-indicators">
                    @foreach ($image as $item)
                    @php
                        $i = 0
                    @endphp
                        <li data-target="#carouselExampleIndicators" data-slide-to="@php $i @endphp" class="{{ $i == 0 ? 'active' : ''}}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @php $i = 0 @endphp @foreach ($image as $item)
                    
                    <div class="carousel-item {{ $i == 0 ? 'active' : ''}}">
                        <img src="{{ Storage::url($item->images) }}" class="d-block w-100" alt="Image Caraosel">
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
        </div>
        <div class="col-md-4">
            <div class="d-flex mt-3" data-aos="fade-up" data-aos-delay="200">
                <div class="time d-inline-flex">
                    <i class="far fa-clock d-flex align-items-center"></i>
                    <p class="h-100 d-flex align-items-center mb-0">{{ $slug->created_at->format('D - d M Y') }}</p>
                </div>
                <div class="category d-inline-flex">
                    <i class="fas fa-tag d-flex align-items-center"></i>
                    <p class="h-100 d-flex align-items-center mb-0">{{ $category->name }}</p>
                </div>
            </div>
        </div>
    </div>
    
</section>

<section class="container Berita-details">
    <h3 class="my-4" data-aos="fade-up" data-aos-delay="250">{{ $slug->title }}</h3>
    <div data-aos="fade-up" data-aos-delay="350">
        {!! $slug->details !!}
    </div>
</section>

@endsection
