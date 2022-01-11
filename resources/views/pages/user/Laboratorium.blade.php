@extends('layouts.dashboard')
@section('title', 'laboratorium FTKI')
@section('content')
<div class="container" id="laboratorium">
    <div class="d-flex justify-content-between mb-3">
        <h3 class="text-title pt-2 w-title">Laboratorium universitas nasional</h3>
        <input type="text" class="form-control w-input" placeholder="input keywords..." v-model="keywords">
        {{-- <p v-text="lastResponse + ' ms'"></p> --}}
    </div>
    <section class="laboratorium">
        <div v-if="keywords == null || keywords <= 0">
            <carousel v-bind:per-page-custom=[[0,1],[780,2]] v-bind:navigation-enabled="true" :loop="true" :scroll-per-page="true" :mouse-drag="true">
                <slide v-for="(photo, i) in images" ::key="photo.id" :style="{'height': `100%`}">
                    <a :href="photo.url">
                        <img :src="photo.img" alt="Images" class="images-caraousel d-block mx-auto" :style="{'height': `280px`}">
                    </a>
                    <div class="mx-auto d-block desc">
                        <h5>
                            <a v-html="photo.title" :href="photo.url" class="d-flex justify-content-center my-1 text-bold mt-2"></a>
                        </h5>
                        {{-- <div class="d-block mt-3">
                            <a :href="photo.url" class="btn btn-success d-flex justify-content-center mx-auto w-75">
                                View Details
                            </a>
                        </div> --}}
                        <span v-html="photo.details"></span>
                    </div>
                   
                </slide>
            </carousel>
        </div>
        <div v-else>
            <carousel v-bind:per-page-custom=[[0,1],[780,2]] v-bind:navigation-enabled="true" :loop="true" :scroll-per-page="true" :mouse-drag="true">
                <slide v-for="(image, i) in results" ::key="image.id" :style="{'height': `100%`}">
                    <a :href="'/Laboratorium/' + image.slug">
                        <img :src="'/storage/'+image.gallery[0].images" alt="Images" class="images-caraousel d-block mx-auto" :style="{'height': `280px`}">
                    </a>
                    <div class="mx-auto d-block desc">
                        <h5 class="w-100 text-center mt-2">
                            <a v-html="$options.filters.highlight(image.title, keywords)" class=" my-1 text-bold p-3" :href="'/Laboratorium/' + image.slug"></a>
                        </h5>
                        {{-- <div class="d-block">
                            <a :href="'/Laboratorium/' + image.slug" class="btn btn-success d-flex justify-content-center mx-auto w-75">
                                View Details
                            </a>
                        </div> --}}
                        <span v-html="$options.filters.highlight(image.details, keywords)"></span>
                    </div>
                    
                </slide>
            </carousel>
        </div>
    </section>
</div>
@endsection
@push('addon-link')
    <style>
        .highlight {
            background-color: yellow;
        }
    </style>
@endpush

@push('addon-script')
    <script src="{{ url('assets/libraries/vue/vue.js') }}"></script>
    <script src="{{ url('assets/libraries/vue/vue-carousel.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.10.2/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    {{-- <script>
        let fisrtResponse = performance.now();
                    this.lastResponse = performance.now() - fisrtResponse;
                    console.log(this.lastResponse + " ms");
    </script> --}}
    <script>
        Vue.filter('highlight', function(word, query){
            var check = new RegExp(query, "ig");
            return word.toString().replace(check, function(matchedText,a,b){
                return ('<span class="highlight">' + matchedText + '</span>');
            });
        });

        var gallery = new Vue({
            el: "#laboratorium",
            data(){
                return{
                    images: [
                        @foreach ($lab as $images) {
                                id: {{$images->id}},
                                title: "{{ $images->title }}",
                                details: "{!! $images->details !!}",
                                img: "{{ isset($images->Gallery->first()->images) ? Storage::url($images->Gallery->first()->images) : ''  }}",
                                url: "{{ url('Laboratorium',$images->slug) }}"
                            },
                        @endforeach
                    ],
                    keywords: null,
                    results: [],
                    lastResponse:''
                }
            },
            methods: {
                fetch() {
                    // this.fisrtResponse = console.time('response');
                    let fisrtResponse = performance.now();
                    // console.log(this.results.length);
                    axios.get('/api/laboratorium', { params: { keywords: this.keywords } })
                        .then(response => this.results = response.data)
                        .catch(error => {});
                    // this.lastResponse = console.timeEnd('response');
                    this.lastResponse = performance.now() - fisrtResponse;
                    // console.log(this.lastResponse + " ms");
                },
            },
            watch:{
                keywords(after, before) {
                    this.fetch();
                }
            },
            components: {
                'carousel': VueCarousel.Carousel,
                'slide': VueCarousel.Slide,
            },
        }) 
    </script>
@endpush