@extends('layouts.dashboard')
@section('title', 'laboratorium FTKI')
@section('content')
<div class="container" id="laboratorium">
    <div class="d-flex justify-content-between mb-3">
        <h3 class="text-title">Laboratorium universitas nasional</h3>
        <input type="text" class="form-control w-25" placeholder="input keywords..." v-model="keywords">
    </div>
    <section class="laboratorium" data-aos="fade-up">
        <div v-if="results.length <= 0 || results === null">
            <carousel v-bind:per-page-custom=[[0,1],[780,2]] v-bind:navigation-enabled="true" :loop="true" :scroll-per-page="true" :mouse-drag="true">
                <slide v-for="(photo, i) in images" ::key="photo.id">
                    <img :src="photo.img" alt="Images" class="images-caraousel d-block mx-auto">
                    <div class="mx-auto d-block">
                        <span v-html="photo.title" class="d-flex justify-content-center"></span>
                    </div>
                    <div class="d-block">
                        <a :href="photo.url" class="btn btn-success d-flex justify-content-center mx-auto w-75">
                            View Details
                        </a>
                    </div>
                </slide>
            </carousel>
        </div>
        <div v-else>
            <carousel v-bind:per-page-custom=[[0,1],[780,2]] v-bind:navigation-enabled="true" :loop="true" :scroll-per-page="true" :mouse-drag="true">
                <slide v-for="(image, i) in results" ::key="image.id">
                    <img :src="'/storage/'+image.gallery[0].images" alt="Images" class="images-caraousel d-block mx-auto">
                    <div class="mx-auto d-block">
                        <span v-html="image.title" class="d-flex justify-content-center"></span>
                    </div>
                    <div class="d-block">
                        <a :href="image.url" class="btn btn-success d-flex justify-content-center mx-auto w-75">
                            View Details
                        </a>
                    </div>
                </slide>
            </carousel>
        </div>
    </section>
</div>
@endsection

@push('addon-script')
    <script src="{{ url('assets/libraries/vue/vue.js') }}"></script>
    <script src="{{ url('assets/libraries/vue/vue-carousel.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.10.2/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    <script>
        var gallery = new Vue({
            el: "#laboratorium",
            data(){
                return{
                    images: [
                        @foreach ($lab as $images) {
                                id: {{$images->id}},
                                title: "{{ $images->title }}",
                                img: "{{ isset($images->Gallery->first()->images) ? Storage::url($images->Gallery->first()->images) : ''  }}",
                                url: "{{ url('Laboratorium',$images->slug) }}"
                            },
                        @endforeach
                    ],
                    keywords: null,
                    results: []
                }
            },
            methods: {
                // fetchImages(){
                //     let params = _.isEmpty(this.search) ? 'all' : this.search
                //     axios.get('/api/laboratorium/' + params).then(({data}) => {
                //         this.image = data
                //         console.log(this.image);
                //     });
                    
                // },
                fetch() {
                    axios.get('/api/laboratorium', { params: { keywords: this.keywords } })
                        .then(response => this.results = response.data)
                        .catch(error => {});
                        console.log(this.results);
                }
            },
            watch:{
                keywords(after, before) {
                    this.fetch();
                }
            },
            mounted(){
                AOS.init({
                    once: false,
                });
            },
            components: {
                'carousel': VueCarousel.Carousel,
                'slide': VueCarousel.Slide
            },
            
        }) 
    </script>
@endpush