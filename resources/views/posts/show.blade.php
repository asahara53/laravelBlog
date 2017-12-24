@extends('layouts.default')

@section('title', $post->title)

@section('content')
<h1>
  <a href="{{ url('/') }}" class="header-menu">Back</a>
  {{ $post->title }}
</h1>
<p>
    {{ $post->body }}
</p>
<hr>
<p>
<ul>
    @foreach($comments as $comments)
    {{ $comments->body }}
    @endforeach
</ul>
</p>
<form action="/posts/{{$post->id}}/comments" method="post">
{{ csrf_field() }}
    <input type="text" name="body" placeholder="enter comment">
    <input type="submit" value="add comment">
</form>
@endsection
