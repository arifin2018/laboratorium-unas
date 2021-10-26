@extends('layouts.app')

@section('content')
<div class="container" id="register">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="npm" class="col-md-4 col-form-label text-md-right">NPM</label>

                            <div class="col-md-6">
                                <input id="npm" type="number" class="form-control @error('npm') is-invalid @enderror" name="username" value="{{ old('npm') }}" required autocomplete="npm">

                                @error('npm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prodi" class="col-md-4 col-form-label text-md-right">Prodi</label>

                            <div class="col-md-6">
                                <select class="form-control" name="prodi_id" id="prodi_id" v-if="prodi" v-model="prodi_id">
                                    <option v-for="prodis in prodi" :value="prodis.id">@{{ prodis.name }}</option>
                                </select>
                                @error('jurusan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jurusan" class="col-md-4 col-form-label text-md-right">jurusan</label>

                            <div class="col-md-6">
                                <select class="form-control" name="jurusan_id" id="jurusan_id" v-if="jurusan" v-model="jurusan_id">
                                    <option v-for="jurusans in jurusan" :value="jurusans.id">@{{ jurusans.name }}</option>
                                </select>
                                @error('jurusan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('addon-script')
<script src="{{ url('assets/libraries/vue/vue.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    var register = new Vue({
        el: "#register",
        mounted() {
            // AOS.init();
            this.getProdiData();
        },
        data:{
            jurusan_id: null,
            prodi_id: null,
            prodi: null,
            jurusan: null,
        },
        methods:{
            getJurusanData(){
                var self = this;
                console.log('ok');
                axios.get('{{ url('api/jurusan') }}/' + self.prodi_id)
                .then(function (response) {
                    self.jurusan = response.data;
                    console.log(self.jurusan);
                })
            },
            getProdiData(){
                var self = this;
                axios.get('{{ route('ProdiAPI') }}').then(function (response){
                    self.prodi = response.data;
                });
            }
        },
        watch:{
            prodi_id: function (val, oldVal) {
                this.jurusan_id = null;
                this.getJurusanData();
            },
        }
    })
</script>
@endpush
