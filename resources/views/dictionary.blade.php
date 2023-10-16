@extends('layouts.layout')
@section('content')

<main>
    <!-- Header-->
    <header class="py-5">
        <div class="container px-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xxl-6">
                    <div class="text-center my-5">
                        <h1 class="fw-bolder mb-3">Dictionary</h1>
                        <p class="lead fw-normal text-muted mb-4">Why not begin by searching for a term that piques your curiosity?</p>
                    </div>
                </div>
            
            </div>
        </div>
    </header>

    <section class="py-5 bg-light" id="scroll-target">
        <div class="container px-5 my-5 h-100">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">@include('partials._search')</div>
                <div class="col-lg-6">
                        {{-- @foreach($words as $word)
                        <h6 class="fw-bolder"> 
                            <a href="/dictionary/{{$word['id']}}">{{$word['word']}}</a>   
                           <a href="/dictionary/{{ $word->word }}/{{ $definition->id }}">{{ $word->word }}</a> 
                           <a href="/dictionary/{{ $word->word }}/{{ $word->definitions->first()->id }}">{{ $word->word }}</a>

                        </h6>
                         @endforeach --}}
                         @foreach($words as $word)
                            <span class="fw-bolder">
                                @foreach($word->definitions as $definition)
                                <a href="/dictionary/{{ $word->word }}/{{ $definition->id }}">{{ $word->word }}</a>
                                @endforeach
                            </span>
                        @endforeach
                </div>
            </div>
        </div>
    </section>
</main>

{{-- <script>
    $(document).ready(function(){
        $('#search').on('keyup',function(){
            var query= $(this).val(); 
            //alert(query)
            $.ajax({
                url:"/dictionary",
                type:"GET",
                data:{'search':query},
                success:function(data){ 
                    $('#search_list').html(data);
                }
            });
             end of ajax call
        });
    });
</script> --}}

@endsection

