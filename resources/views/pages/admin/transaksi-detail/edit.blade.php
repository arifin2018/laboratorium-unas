@extends('layouts.admin.dashboard')
@section('title','transaksi Edit')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h1 class="h3 mb-0 text-gray-800">transaksi update</h1>
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
                    <form action="{{ route('transaksi.update' , $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group d-flex">
                            <label for="name">Name </label>
                            <span> =  {{ $data->user->name }}</span>
                        </div>
                        <div class="form-group d-flex">
                            <label for="waktu">Waktu </label>
                            <span> =  {{ $data->waktu }}</span>
                        </div>
                        <div class="form-group d-flex">
                            <label for="detail_ruangan">Ruangan </label>
                            <span> =  {{ $data->detail_ruangans->title }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="custom-select" name="status" id="status">
                                <option value="Pending">Pending</option>
                                <option value="Success">Success</option>
                                <option value="Expired">Expired</option>
                            </select>
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