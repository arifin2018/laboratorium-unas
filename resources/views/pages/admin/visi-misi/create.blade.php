@extends('layouts.admin.dashboard')
@section('title','Detail Berita')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid berita">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Detail Berita Create</h1>
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
                    <form action="{{ route('berita.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" required value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="categories_id">Category</label>
                            <select class="custom-select" name="categories_id" id="categories_id" required>
                                @foreach ($datas as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="details">Details</label>
                            <textarea name="details" id="details" required>
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