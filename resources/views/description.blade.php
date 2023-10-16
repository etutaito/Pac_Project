@extends('layouts.layout')
@section('content')

{{-- <header class="py-5">
    <div class="container px-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xxl-6">
                <div class="text-center my-5">
                    <h2 class="fw-bolder"> 
                        {{$word['word']}} 
                     </h2>
                    <p class="lead fw-normal text-muted mb-4">Definition:</p>
                    <p>{{ $definition->definitions }}</p>
                </div>
            </div>
        
        </div>
    </div>
</header> --}}

{{-- <div class="container">
    @if ($definition->imagesUrl)
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset($definition->imagesUrl) }}" alt="Image Description" class="card-img-top">
                </div>
            </div>
        </div>
    @else
        <p>No images available for this definition.</p>
    @endif
</div> --}}

<section class="py-5">
    <div class="container px-5 my-5">
        @if ($definition->imagesUrl)
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0" src="{{ asset($definition->imagesUrl) }}" alt="..." /></div>
            @else
                <p>No images available for this definition.</p>
            @endif
            <div class="col-lg-6">
                <h2 class="fw-bolder"> 
                    {{$word['word']}} 
                 </h2>
                <p class="lead fw-normal text-muted mb-4">Definition: {{ $definition->definitions }}</p>
            </div>
        </div>
    </div>
</section>

@endsection