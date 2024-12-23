@extends('layouts.app')
@section("title","edit post")
@section("content")
 <h1 class="mt-5 mb-5">edit {{ $post->title }} post</h1>
 <form action="{{route('posts.update',$post)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input class="form-control" type="text" name="title" placeholder="post title" value="{{ $post->title }}">
    <br>
    <textarea class="form-control" name="description" placeholder="post placeholder" >{{$post->description}}</textarea>
    <br>
    <input class="form-control" type="file" name="image[]" id="image" multiple>
    <lable for="image">
    @php 
    /*$x = explode ("|", $post->image);*/
    $x=$post->image;
    @endphp
     @foreach($x as $val)
     <img src="/images/posts/{{$val}}">
    @endforeach
    </lable>
    <br>
    <input type="submit" value="send" class="btn btn-secondary mt-5">
 </form>
 @endsection