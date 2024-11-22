@extends('layouts.app')
@section("title","show post")
@section("content")
 <a href="{{route('posts.create')}}" class="btn btn-primary mb-5 mt-5">add new post</a>

  <div class="card">
    <img src="/images/posts/{{$post->image}}" alt="">
    <h1>{{$post->title}}</h1>
    <p>{{$post->description}}</p>
    <a href="{{route('posts.index')}}" class="btn btn-primary mb-5 mt-5">main page</a>
    <a href="{{route('posts.edit',$post)}}" class="btn btn-secondary mt-5 mb-5">edit post</a>
    <form method="POST" action="{{ route('posts.destroy', $post) }}"> 
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger mt-5 mb-5">Delete post</button>
  </form>
  </div>
  @endsection