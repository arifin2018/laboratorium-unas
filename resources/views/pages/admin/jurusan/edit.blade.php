@extends('layouts.admin.dashboard')
@section('title','Jurusan')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid jurusan">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Jurusan Update</h1>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <form action="{{ route('jurusan.update' ,$data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="prodi_id">prodi name</label>
                            <select class="custom-select" name="prodi_id" id="prodi_id" required>
                                @foreach ($prodis as $prodis)
                                    <option value="{{ $prodis->id }}" {{ $prodis->id == $data->prodi_id ? 'selected' : '' }}>{{ $prodis->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control" name="name" id="name" required value="{{ $data->name }}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
