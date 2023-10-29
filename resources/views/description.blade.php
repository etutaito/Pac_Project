@extends('layouts.layout')
@section('content')

<section class="py-5">
    <div class="container px-5 my-5">
        @if ($definition->imagesUrl)
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="{{ asset($definition->imagesUrl) }}" alt="..." /></div>
            @else
                <p>No images available for this definition.</p>
            @endif
            <div class="col-lg-6">
                <h2 class="fw-bolder"> 
                    {{$word['word']}} 
                    <span>
                        <i id="sound-icon" class="fa fa-volume-up fa-4" style="color: grey; opacity: 0.5;"></i>
                    </span>
                    <audio id="audio-element" hidden>
                        <source src="{{ asset($definition->audioUrl) }}" type="audio/mp3">
                    </audio>
                 </h2>
                <p class="lead fw-normal text-muted mb-4">Definition: {{ $definition->definitions }}</p>

                <form method="POST" action="{{ route('favorite.toggle', $word) }}">
                    @csrf
                    @if (auth()->check() && auth()->user()->favorites->contains($word))
                        <button type="submit" class="btn btn-danger">Remove from Favorites</button>
                    @else
                        <button type="submit" class="btn btn-primary">Add to Favorites</button>
                    @endif
                </form>

            </div>



        </div>
    </div>
</section>

@endsection