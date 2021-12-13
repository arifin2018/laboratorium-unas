@extends('layouts.admin.dashboard')
@section('title','Dashboard Caraousel')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid dashboard-caraosel">

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title font-weight-bold">Dashboard Caraosel</h5>
                        <a href="{{ route('dashboard-caraosel.create') }}" class="btn btn-warning card-title ml-auto">Create new </a>
                    </div>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Images</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($images as $image => $index)
                            <tr>
                                <th scope="row">{{ $image+1 }}</th>
                                <td>
                                    <img src="{{ Storage::url($index->image) }}" alt="image-caraosel" height="200" width="200">
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('dashboard-caraosel.edit', $index->id) }}" class="btn btn-primary mx-1"><i class="fas fa-pen-square"></i></a>
                                    <form action="{{ route('dashboard-caraosel.destroy', $index->id) }}" method="POST" class="mx-1">
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