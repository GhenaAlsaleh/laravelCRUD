@extends('layouts.app')
@section("title","show post")
@section("content")
  <div class="card mb-5 mt-5">
    @php 
    $x =$post->image;
    @endphp
     @foreach($x as $val)
     <img src="/images/posts/{{$val}}">
    @endforeach
    
    <h1>title:{{$post->title}}</h1>
    <p>description:{{$post->description}}</p>
    <p>added at:{{$post->created_at}}</p>
    <a href="{{route('posts.index')}}" class="btn btn-primary mb-5 mt-5">main page</a>
    <a href="{{route('posts.edit',$post)}}" class="btn btn-secondary mt-5 mb-5">edit post</a>
    @can('manageUser',Auth::user())
    <form method="POST" action="{{ route('posts.destroy', $post) }}" class="btn btn-danger mt-5 mb-5 pt-0 pb-0"> 
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">delete post</button>
    </form>
    @endcan
  </div>
  @endsection