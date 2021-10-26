@extends('layouts.admin.dashboard')
@section('title','Images Berita')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid images-berita">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Image Berita Create</h1>
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
                    <form action="{{ route('images-berita.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="berita_id">Berita</label>
                            <select class="custom-select" name="berita_id" id="berita_id" required>
                                @foreach ($datas as $data)
                                    <option value="{{ $data->id }}" {{ $selectBerita->first()->id == $data->id ? 'selected' : '' }}>{{ $data->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="images">Images</label>
                            <input type="file" class="form-control" name="images" id="images" value="{{ old('images') }}">
                            <p class="text-muted h6">*Jika tidak ingin mengubah foto silahkan dikosongkan saja</p>
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