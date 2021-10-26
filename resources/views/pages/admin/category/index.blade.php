@extends('layouts.admin.dashboard')
@section('title','Detail Category')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid Category">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title font-weight-bold">Detail Category</h5>
                        <a href="{{ route('category.create') }}" class="btn btn-warning card-title ml-auto">Create new </a>
                    </div>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($datas as $data => $index)
                            <tr>
                                <th scope="row">{{ $data+1 }}</th>
                                <td>{{ $index->name }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('category.edit', $index->id) }}" class="btn btn-primary mx-1"><i class="fas fa-pen-square"></i></a>
                                    <form action="{{ route('category.destroy', $index->id) }}" method="POST" class="mx-1">
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