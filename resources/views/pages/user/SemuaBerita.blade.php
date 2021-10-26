@extends('layouts.dashboard')
@section('title', 'semua berita')
@section('content')

<section class="semua-berita container">
    <h3>Berita</h3>
    <div class="row">
        @php $dataAosDelay = 0 @endphp
        @forelse ($datas as $data)
        <div class="col-md-4 mb-3">
            <img src="{{ isset($data->BeritaImage->first()->images) ? Storage::url($data->BeritaImage->first()->images) : '' }}" alt="berita images" data-aos="fade-up" data-aos-delay="{{$dataAosDelay += 100}}">
            <a href="{{route('details-berita',$data->slug)}}">
                <h5 data-aos="fade-up" data-aos-delay="{{$dataAosDelay += 100}}">{{ $data->title }}</h5>
            </a>
        </div>
        @empty
        <div class="col-md-6">
            <img src="{{ asset('assets/images/undraw_Transfer_files_re_a2a9.svg') }}" class="card-img-top mb-3" alt="Transfer images">
            <h3 class="mx-auto w-100">Berita Kosong</h3>
            <h4 class="mx-auto w-100">Tidak ada berita Hari ini</h4>
        </div>
        @endforelse
    </div>
    <div class="d-flex justify-content-end">
        {{ $datas->links() }}
    </div>
    
</section>

@endsection
