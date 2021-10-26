@extends('layouts.admin.dashboard')
@section('title','Detail Ruangan')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid detail-ruangan">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title font-weight-bold">Detail Ruangan</h5>
                        <a href="{{ route('detail-ruangan.create') }}" class="btn btn-warning card-title ml-auto">Create new </a>
                    </div>
                    
                    <table class="table" id="crudTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Kepala Jabatan</th>
                                <th scope="col">Details</th>
                                <th scope="col">Prodi</th>
                                <th scope="col">Action</th>
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
                data: 'title',
                name: 'Title'
            },
            {
                data: 'kepala_jabatan',
                name: 'kepala_jabatan'
            },
            {
                data: 'details',
                name: 'details'
            },
            {
                data: 'prodi.name',
                name: 'prodi.name'
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