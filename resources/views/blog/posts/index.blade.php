@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Blog</h1>
    @if (isset($category))
        <p class="lead">The posts lists are filter by category : {{ $category->name }}</p>
    @elseif (isset($user))
        <p class="lead">The posts lists are filter by creator : {{ $user->name }}</p>
    @endif

    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('posts.show', ['slug' => $post->slug]) }}">{{ $post->name }}</a>
                        <small style="float: right;">
                            Category : <a href="{{ route('posts.category', ['slug' => $post->category->slug]) }}">{{ $post->category->name }}</a>
                            by <a href="{{ route('posts.user', ['id' => $post->user->id]) }}">{{ $post->user->name }}</a>
                            on {{ $post->created_at->diffForHumans() }}
                        </small>
                    </div>
                    <div class="panel-body">
                        <p>
                            {{ $post->getExcept() }}
                        </p>
                        <p class="text-right">
                            <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="btn btn-primary">Read more...</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="navigation">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
