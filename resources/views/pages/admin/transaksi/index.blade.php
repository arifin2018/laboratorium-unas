@extends('layouts.admin.dashboard')
@section('title','Transaksi')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid Transaksi">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title font-weight-bold">Transaksi</h5>
                    </div>
                    
                    <table class="table" id="crudTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Waktu pemesanan</th>
                                <th scope="col">Waktu selesai</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">Status saat ini</th>
                                <th scope="col">Kegiatan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @forelse ($datas as $data => $index)
                            <tr>
                                <th scope="row">{{ $data+1 }}</th>
                                <td>{{ $index->user->name }}</td>
                                <td>{{ $index->waktu }}</td>
                                <td>{{ $index->detail_ruangans->title }}</td>
                                <td>{{ $index->status }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('transaksi.edit', $index->id) }}" class="btn btn-primary mx-1"><i class="fas fa-pen-square"></i></a>
                                    <form action="{{ route('transaksi.destroy', $index->id) }}" method="POST" class="mx-1">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">
                                    Data kosong
                                </td>
                            </tr>
                            @endforelse
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection

@push('addon-js')
    <script>
        var datatables = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'user.name',
                name: 'Nama'
            },
            {
                data: 'waktu',
                name: 'Waktu Pemesanan'
            },
            {
                data: 'waktu_selesai',
                name: 'Waktu Pemesanan'
            },
            {
                data: 'detail_ruangans.title',
                name: 'Ruangan'
            },
            {
                data: 'status',
                name: 'Status saat ini'
            },
            {
                data: 'kegiatan',
                name: 'Kegiatan'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
            ]
        })
    </script>
@endpush