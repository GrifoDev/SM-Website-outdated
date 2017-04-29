@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->name }}</h1>
    <p>
        <small>
            Category : <a href="{{ route('posts.category', ['slug' => $post->category->slug]) }}">{{ $post->category->name }}</a>
            by <a href="{{ route('posts.user', ['id' => $post->user->id]) }}">{{ $post->user->name }}</a>
            on {{ $post->created_at->format('M dS Y') }}
        </small>
    </p>

    {!! $post->html !!}
</div>
@endsection
