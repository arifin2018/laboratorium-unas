@extends('layouts.admin.dashboard')
@section('title','transaksi-detail')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid transaksi-detail">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title font-weight-bold">transaksi Detail</h5>
                    </div>
                    <table class="table" id="crudTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">Transaksi Waktu</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            
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
                data: 'detail_ruangan.title',
                name: 'Ruangan'
            },
            {
                data: 'transaksi_waktu',
                name: 'Transaksi Waktu'
            },
            {
                data: 'jumlah',
                name: 'Jumlah'
            },
        ]
    })
</script>
@endpush