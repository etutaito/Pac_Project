@extends('layouts.layout')

@section('content')

 <!-- Header-->
 <header class="bg-dark py-5">
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5 text-center text-xl-start">
                    @auth
                    <h1 class="display-5 fw-bolder text-white mb-2">Welcome {{auth()->user()->name}}</h1>
                    <p class="lead fw-normal text-white-50 mb-4">Choose your options below</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="{{ url('/dictionary') }}">Dictionary</a>
                        <a class="btn btn-outline-light btn-lg px-4" href="{{ url('/translation') }}">Translator</a>
                    </div>
                    @else
                    <h1 class="display-5 fw-bolder text-white mb-2">Your Ultimate Dictionary and Translation Destination</h1>
                    <p class="lead fw-normal text-white-50 mb-4">Unlock a world of linguistic possibilities with Pacific Dictionary and Translate's cutting-edge features designed to sharpen your language skills.</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="{{ url('/logn') }}">Log In</a>
                        <a class="btn btn-outline-light btn-lg px-4" href="{{ url('/regst') }}">Register</a>
                    </div>
                    @endauth
                </div>
            </div>
            <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="{{ asset('/images/banner-image.png') }}" alt="..." /></div>
        </div>
    </div>
</header>
<!-- Features section-->
<section class="py-5" id="features">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            @auth
            <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Here is your word of the day</h2></div>
            @php
            $randomWord = app('App\Http\Controllers\WordController')->getRandomWord();
            @endphp
            <div class="col-lg-8">
                <div class="row gx-5 row-cols-1 row-cols-md-2">
                    <div class="col mb-15 h-100">
                        <h2 class="h5">{{$randomWord->word}}</h2>
                        <p class="mb-0">
                            Definition:
                            @if ($randomWord->definitions->isNotEmpty())
                                {{$randomWord->definitions->first()->definitions}}
                            @else
                                No definition available
                            @endif
                        </p>
                    </div>
            @else
            <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Elevate your language journey.</h2></div>
            <div class="col-lg-8">
                <div class="row gx-5 row-cols-1 row-cols-md-2">
                    <div class="col mb-5 h-100">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-file-word-fill"></i></div>
                        <h2 class="h5">Extensive Dictionary</h2>
                        <p class="mb-0">Dive into our cast collection of words, phrases and expressions spanning multiple languages.</p>
                    </div>
                    <div class="col mb-5 h-100">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                        <h2 class="h5">Professional Translation Tool</h2>
                        <p class="mb-0">For academics and businesses, our platform offers professional translation services, ensuring accurate communication in international contexts.</p>
                    </div>
                    <div class="col mb-5 mb-md-0 h-100">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h5">Audio Pronounciation</h2>
                        <p class="mb-0">Master the correct pronounciation with our audio guides. Hear speakers enunciate words and phrases, helping you sound like a local in no time.</p>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</section>

@endsection