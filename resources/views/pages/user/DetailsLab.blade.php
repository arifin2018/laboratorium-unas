@extends('layouts.dashboard')
@section('title', 'Details Lab')
@section('content')
@include('sweetalert::alert')

<section class="container breadcrumb-transaksi">
    <div class="row">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Details Lab</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="container details-lab" id="imagesDetailsLab">
    @php $dataAosDelay = 0 @endphp
    <div class="row">
        <div class="col-md-9 mb-3 mb-md-0">
            <div class="images-left" data-aos="fade-up">
                <transition name="fade" mode="out-in">
                    <img 
                        :src="Images[activeImage].url" 
                        :key="Images[activeImage].id"
                        class="w-100 main-image"
                        alt="">
                </transition>
            </div>
        </div>
        <div class="col-md-3">
            <div class="images-right" v-for="(photo,index) in Images" :key="photo.id" data-aos="fade-up">
                <a href="#" v-on:click="changeActive(index)">
                    <img 
                        :src="photo.url"
                        class="w-100 thumbnail-image"
                        :class="{active: index == activeImage}" alt="">
                </a>
            </div>
        </div>
    </div>
</section>

<section class="container Berita-details">
        <div class="row">
            <div class="col-md-9">
                <div class="my-3">
                    <h3 data-aos="fade-up" data-aos-delay="200">{{ $slug->title }}</h3>
                    <h5 data-aos="fade-up" data-aos-delay="250">{{ $slug->prodi->name }}</h5>
                    <h6 class="text-muted" data-aos="fade-up" data-aos-delay="300">
                        {{ $slug->kepala_jabatan }}
                    </h6>
                </div>
                <p data-aos="fade-up" data-aos-delay="300"> {!! $slug->details !!}</p>
            </div>
            <div class="col-md-3">
                    @auth
                    <a href="{{ route('transaksiLab', $slug->slug) }}" class="btn btn-success" data-aos="fade-up" data-aos-delay="500">Pesan sekarang</a>
                    @endauth
                    @guest
                    <a href="{{ route('login') }}" class="btn btn-success"  data-aos="fade-up" data-aos-delay="500">Sign-in</a>
                    @endguest
            </div>
            
        </div>
    </section>
@endsection

@push('addon-script')
    <script src="{{ url('assets/libraries/vue/vue.js') }}"></script>
    <script>
        var gallery = new Vue({
            el: "#imagesDetailsLab",
            data() {
                return{
                    activeImage:0,
                    Images:[
                        @foreach ($slug->Gallery as $item)
                            {
                                id: {{$item->id}},
                                url: "{{ Storage::url($item->images) }}"
                            },
                        @endforeach
                    ],
                }
            },
            mounted() {
                AOS.init({
                    once: false,
                });
            },
            methods: {
                changeActive(id) {
                    this.activeImage = id;
                },
            },
        });
    </script>
@endpush