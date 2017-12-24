@extends('layouts.default')

{{--
@section('title')
Blog Posts
@endsection
--}}

@section('title', 'Blog Posts')

@section('content')
	<h1>
	<a href="{{ url('/posts/create')}}" class="header-menu">New Post</a>
	Blog Posts</h1>
	<ul>
		@forelse($all_posts as $post)
		<li>
		<a href="/posts/show/{{ $post->id }}">{{$post->title }}</a>
		<a href="/posts/edit/{{ $post->id }}" class="edit">[edit]</a>
		<a href="/posts/delete/{{ $post->id }}" class="del">[x]</a>
		</li>
		@empty
		<li> No posts yet</li>
		@endforelse
	</ul>
@endsection

