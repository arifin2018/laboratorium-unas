@extends('layouts.app')

@section('content')
<div class="container login-pages">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <img src="{{ url('assets/images/login.jpg') }}" alt="image-login" class="image-login">
        </div>
        <div class="col-md-6">
            <h3 class="text-header">Belajar menyenangkan di dalam, Lab Kampus</h3>
            <form method="POST" action="{{ route('login') }}" class="mt-4">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email atau NPM</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <small id="emailHelp" class="form-text text-muted">Kita tidak akan pernah membagikan email atau npm anda ke orang lain</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
