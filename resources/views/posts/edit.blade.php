@extends('layouts.app')
@section("title","edit post")
@section("content")
 <h1 class="mt-5 mb-5">edit post</h1>
 <form action="{{route('posts.update',$post)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input class="form-control" type="text" name="title" placeholder="post title" value="{{ $post->title }}">
    <textarea class="form-control" name="description" placeholder="post placeholder" >{{$post->description}}</textarea>
    <input class="form-control" type="file" name="image" href="asset(images/posts/{{$post->image}})">
    <input type="submit" value="send" class="btn btn-secondary mt-5">
 </form>
 @endsection