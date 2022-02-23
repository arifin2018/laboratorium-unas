@extends('layouts.dashboard')
@section('title', 'Transaksi Lab')
@section('content')
@include('sweetalert::alert')


<section class="container breadcrumb-transaksi">
    <div class="row">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ route('details-lab', $DetailRuangan->slug) }}">Details Laboratorium</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="container transaksi">
    <div class="row">
        <div class="col-md-4 d-block d-md-none">
            <img src="{{ asset('assets/images/undraw_Transfer_files_re_a2a9.svg') }}" alt="Ilustrator-images-done" class="Ilustrator-images-done pl-2">
        </div>
        <div class="card col-md-9">
            <div class="card-body">
                <h5 class="card-title">Siapa ingin memesan ruangan?</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $DetailRuangan->title }}</h6>
                <p class="card-text">
                    <form action="{{ route('transaksi', $DetailRuangan->slug) }}" method="post" class="table-responsive">
                        @csrf
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Npm</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Waktu Mulai Peminjaman</th>
                                <th scope="col">Waktu Selesai Peminjaman</th>
                                <th scope="col">Kegunaan</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ Auth::user()->name }}</td>
                                    <td>{{ Auth::user()->username }}</td>
                                    <td>{{ Auth::user()->jurusan->name }}</td>
                                    <td>
                                        <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="detail_ruangans_id" value="{{ $DetailRuangan->id }}">
                                        <select class="form-control" id="exampleFormControlSelect1" name="waktu">
                                            <option value="08:00">08:00</option>
                                            <option value="09:00">09:00</option>
                                            <option value="10:00">10:00</option>
                                            <option value="11:00">11:00</option>
                                            <option value="12:00">12:00</option>
                                            <option value="13:00">13:00</option>
                                            <option value="14:00">14:00</option>
                                            <option value="15:00">15:00</option>
                                            <option value="16:00">16:00</option>
                                            <option value="17:00">17:00</option>
                                            <option value="18:00">18:00</option>
                                            <option value="19:00">19:00</option>
                                            <option value="20:00">20:00</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" id="exampleFormControlSelect1" name="waktu_selesai">
                                            <option value="08:00">08:00</option>
                                            <option value="09:00">09:00</option>
                                            <option value="10:00">10:00</option>
                                            <option value="11:00">11:00</option>
                                            <option value="12:00">12:00</option>
                                            <option value="13:00">13:00</option>
                                            <option value="14:00">14:00</option>
                                            <option value="15:00">15:00</option>
                                            <option value="16:00">16:00</option>
                                            <option value="17:00">17:00</option>
                                            <option value="18:00">18:00</option>
                                            <option value="19:00">19:00</option>
                                            <option value="20:00">20:00</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" id="exampleFormControlSelect1" name="kegiatan">
                                            <option value="Belajar">Belajar</option>
                                            <option value="Penelitian">Penelitian</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-success float-right top">Pesan</button>
                    </form>
                </p>
            </div>
        </div>
        <div class="col-md-3 h-100 d-none d-md-block">
            <img src="{{ asset('assets/images/undraw_Transfer_files_re_a2a9.svg') }}" alt="Ilustrator-images-done" class="Ilustrator-images-done pl-2 h-100">
        </div>
    </div>
</section>
@endsection

