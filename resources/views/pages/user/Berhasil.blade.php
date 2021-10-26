@extends('layouts.dashboard')
@section('title', 'Transaksi Berhasil')
@section('content')

<section class="transaksi-berhasil m-auto d-flex flex-column justify-content-center align-items-center">
    <img src="{{ asset('assets/images/Done.svg') }}" alt="Ilustrator-images-done" class="d-block mb-4">
    <h5 class="text-center d-flex justify-content-center align-items-center">Pemesanan berhasil silahkan tunggu pesan Whatsapp atau Email dari pihak lab</h5>
</section>

@endsection
