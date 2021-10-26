@extends('layouts.admin.dashboard')
@section('name','Edit category')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid category">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Category Update</h1>
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
                    <form action="{{ route('category.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control" name="name" id="name" required value="{{ $item->name }}">
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