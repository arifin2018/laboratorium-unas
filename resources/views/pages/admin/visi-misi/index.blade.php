@extends('layouts.admin.dashboard')
@section('title','Detail Visi Misi')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid Visi Misi">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title font-weight-bold">Detail Visi Misi</h5>
                    </div>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Visi</th>
                                <th scope="col">Misi</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($datas as $data => $index)
                            <tr>
                                <th scope="row">{{ $data+1 }}</th>
                                <td>{{ $index->visi }}</td>
                                <td>{{ $index->misi }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('visi-misi.edit', $index->id) }}" class="btn btn-primary mx-1"><i class="fas fa-pen-square"></i></a>
                                </td>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">
                                    Data kosong
                                </td>
                            </tr>
                            @endforelse
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection