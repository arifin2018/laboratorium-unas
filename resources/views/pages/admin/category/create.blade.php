@extends('layouts.admin.dashboard')
@section('title','Detail Category')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid category">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Detail Category Create</h1>
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
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control" name="name" id="name" required value="{{ old('name') }}">
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