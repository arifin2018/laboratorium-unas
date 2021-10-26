@extends('layouts.dashboard')
@section('title', 'laboratorium FTKI')
@section('content')
    <div class="container visi-misi">
        <div class="box-text">
            <h3>Visi</h3>
            <div class="px-3">
                <p>
                    @if (isset($data->visi))
                        {!! $data->visi !!}
                    @endif
                </p>
            </div>
        </div>
        <div class="box-text">
            <h3>Misi</h3>
            <div class="px-3">
                <p>
                    @if (isset($data->visi))
                        {!! $data->misi !!}
                    @endif
                <p>
            </div>
        </div>
    </div>
@endsection
