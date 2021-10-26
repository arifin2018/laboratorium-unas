@extends('layouts.admin.dashboard')
@section('title','Detail Berita')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid berita">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title font-weight-bold">Detail Berita</h5>
                        <a href="{{ route('berita.create') }}" class="btn btn-warning card-title ml-auto">Create new </a>
                    </div>
                    
                    <table class="table" id="crudTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Categories</th>
                                <th scope="col">Details</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @forelse ($datas as $data => $index)
                            <tr>
                                <th scope="row">{{ $data+1 }}</th>
                                <td>{{ $index->title }}</td>
                                <td>{{ $index->category->name }}</td>
                                <td>{{ $index->details }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('berita.edit', $index->id) }}" class="btn btn-primary mx-1"><i class="fas fa-pen-square"></i></a>
                                    <form action="{{ route('berita.destroy', $index->id) }}" method="POST" class="mx-1">
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
                data: 'title',
                name: 'Title'
            },
            {
                data: 'category.name',
                name: 'Categories'
            },
            {
                data: 'details',
                name: 'Details'
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