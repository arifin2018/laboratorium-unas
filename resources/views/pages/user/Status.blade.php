@extends('layouts.dashboard')
@section('title', 'Status Transaksi')
@section('content')

<section class="transaksi-status container">
    <div class="row justify-content-center align-content-center">
        @forelse ($datas as $data)
        {{-- @dd($data->user->name) --}}
        <div class="col-md-4">
            <div class="my-3 card" style="width: 18rem;" >
                <img src="{{ Storage::url($data->detail_ruangans->Gallery->first()->images) }}" class="card-img-top" alt="{{ $data->detail_ruangans->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $data->detail_ruangans->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ isset($data->user->name) ? $data->user->name : '' }}</h6>
                    <div class="d-inline-block">
                        <h6 class="mb-0
                        @php
                            if ($data->status === 'Pending') {
                                echo 'text-warning';
                            }elseif ($data->status === 'Success') {
                                echo 'text-success';
                            }
                            else{
                                echo 'text-danger';
                            }
                        @endphp">Status = {{ $data->status }}</h6>
                        <h6 class="mb-0 text-primary">Jam = {{ $data->waktu }}</h6>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-6">
            <img src="{{ asset('assets/images/undraw_Transfer_files_re_a2a9.svg') }}" class="card-img-top mb-3" alt="Transfer images">
            <h3 class="mx-auto w-100">Status Kosong</h3>
            <h4 class="mx-auto w-100">{{ Auth::user()->name }} Belum Memesan Hari ini</h4>
        </div>
        @endforelse
    </div>
    <p class="text-muted">*Jikalau salah pemesanan silahkan hubungi admin</p>
</section>

@endsection
