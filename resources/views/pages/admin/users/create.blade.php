@extends('layouts.admin.dashboard')
@section('title','Users Create')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid" id="users">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Users Create</h1>
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
                    <form action="{{ url('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" required value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label for="NPM">NPM</label>
                            <input type="text" class="form-control" name="username" id="NPM" required value="{{ old('username') }}">
                        </div>
                        <div class="form-group">
                            <label for="prodi">Prodi</label>

                            <select class="form-control" name="prodi_id" id="prodi_id" v-if="prodi" v-model="prodi_id">
                                <option v-for="prodis in prodi" :value="prodis.id">@{{ prodis.name }}</option>
                            </select>
                            @error('jurusan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jurusan">jurusan</label>

                            <select class="form-control" name="jurusan_id" id="jurusan_id" v-if="jurusan" v-model="jurusan_id">
                                <option v-for="jurusans in jurusan" :value="jurusans.id">@{{ jurusans.name }}</option>
                            </select>
                            @error('jurusan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Password Confirmed</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <label for="roles">roles</label>
                            <select class="custom-select" name="roles" id="roles">
                                <option value="mahasiswa">Mahasiswa</option>
                                <option value="admin">Admin</option>
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
@push('addon-js')
<script src="{{ url('assets/libraries/vue/vue.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    var register = new Vue({
        el: "#users",
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
                axios.get('{{ url('api/jurusan') }}/' + self.prodi_id)
                .then(function (response) {
                    self.jurusan = response.data;
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