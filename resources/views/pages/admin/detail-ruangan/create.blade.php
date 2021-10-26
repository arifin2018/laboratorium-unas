@extends('layouts.admin.dashboard')
@section('title','Detail Ruangan')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid detail-ruangan">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Detail Ruangan Update</h1>
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
                    <form action="{{ route('detail-ruangan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" required value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="kepala_jabatan">Kepala Jabatan</label>
                            <input type="text" class="form-control" name="kepala_jabatan" id="kepala_jabatan" required value="{{ old('kepala_jabatan') }}">
                        </div>
                        <div class="form-group">
                            <label for="prodi">Prodi</label>
                            <select class="custom-select" name="prodi_id" id="prodi" required>
                                @foreach ($prodi as $prodis)
                                    <option value="{{ $prodis->id }}">{{ $prodis->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="details">Details</label>
                            <textarea name="details" id="details">
                            </textarea>
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
@push('addon-js')
    <script>
        $(document).ready(function(){
            ClassicEditor.create($('#details').get()[0]);
        });
    </script>
@endpush