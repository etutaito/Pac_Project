@extends('layouts.layout')

@section('content')
    <div class="container vh-100">
        <h1>Your Favorite Words</h1>
        @if($favoriteWords->isEmpty())
            <p>You haven't favorited any words yet.</p>
        @else
            <ul>
                @foreach($favoriteWords as $favorite)
                <li>
                    <a href="{{ route('word.show', ['word' => $favorite->word->word, 'definition' => $favorite->word->definitions->first()->id]) }}">
                        {{ $favorite->word->word }}
                    </a>

                </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection