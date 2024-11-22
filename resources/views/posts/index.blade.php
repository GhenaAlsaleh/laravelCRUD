@extends('layouts.app')
@section("title","posts")
@section("content")
 <a href="{{route('posts.create')}}" class="btn btn-primary mt-5 mb-5">add new post</a>
 @forelse($posts as $post)
  <div class="card">
    <img src="/images/posts/{{$post->image}}" alt="">
    <h1>{{$post->title}}</h1>
    <p>{{$post->description}}</p>
    <a href="{{route('posts.show',$post)}}" class="btn btn-primary mt-5 mb-5">show post</a>
    <a href="{{route('posts.edit',$post)}}" class="btn btn-secondary mt-5 mb-5">edit post</a>
    <form method="POST" action="{{ route('posts.destroy', $post) }}" class="btn btn-danger mt-5 mb-5"> 
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">delete post</button>
    </form>
  </div>
  @empty
   <h1>there is no posts</h1>
  @endforelse
  @endsection