@extends('layouts.admin.dashboard')
@section('title','Edit Visi Misi')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid Visi Misi">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Visi Misi Update</h1>
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
                    <form action="{{ route('visi-misi.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="visi">visi</label>
                            <textarea name="visi" class="textarea" required>
                                {{ $item->visi }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="misi">misi</label>
                            <textarea name="misi" class="textarea" required>
                                {{ $item->misi }}
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
            let classTextArea = document.getElementsByClassName('textarea');
            for (let i= 0; i< classTextArea.length; i++) {
                ClassicEditor.create($('.textarea').get()[i]);
            }
        });
    </script>
@endpush