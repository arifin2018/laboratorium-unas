@extends('layouts.admin.dashboard')
@section('title','Users')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid users">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title font-weight-bold">Users</h5>
                        <a href="{{ route('users.create') }}" class="btn btn-warning card-title ml-auto">Create new </a>
                    </div>
                    
                    <table class="table" id="crudTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Npm</th>
                                <th scope="col">Prodi</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Roles</th>
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
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'username',
                name: 'username'
            },
            {
                data: 'prodi.name',
                name: 'prodi.name'
            },
            {
                data: 'jurusan.name',
                name: 'jurusan.name'
            },
            {
                data: 'roles',
                name: 'roles'
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