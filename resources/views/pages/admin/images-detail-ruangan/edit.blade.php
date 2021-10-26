@extends('layouts.admin.dashboard')
@section('title','Images Detail Ruangan')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid images-detail-ruangan">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Image Detail Ruangan Create</h1>
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
                    <form action="{{ route('images-detail-ruangan.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="detail_ruangans_id">Ruangan</label>
                            <select class="custom-select" name="detail_ruangans_id" id="detail_ruangans_id">
                                @foreach ($datas as $item)
                                    <option option value="{{ $item->id }}"  {{ $DetailRuangan->first()->id == $item->id ? 'selected' : '' }}>{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="images">Images</label>
                            <input type="file" class="form-control" name="images" id="images" >
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