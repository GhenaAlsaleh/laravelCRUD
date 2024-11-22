@extends('layouts.app')
@section("title","add post")
@section("content")
 <h1 class="mt-5 mb-5">add new post</h1>
 <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input class="form-control" type="text" name="title" placeholder="post title">
    <textarea class="form-control" name="description" placeholder="post placeholder" ></textarea>
    <input class="form-control" type="file" name="image">
    <input type="submit" value="send" class="btn btn-secondary mt-5">
 </form>
 @endsection