@extends('layouts.app')
@section("title","posts")
@section("content")
<form method="POST" action="{{ route('logout') }}" class="mt-5 mb-5"> 
  @csrf
  <input type="submit" value="logout" class="btn btn-secondary mt-5">
</form>

 <a href="{{route('posts.create')}}" class="btn btn-primary mb-5">add new post</a>
 <br>
 @can('manageUser',Auth::user())
 <a href="{{route('users.index')}}" class="btn btn-primary mb-5">show all users</a>
 @endcan

 @forelse($posts as $post)
  <div class="card">
    @php 
    /*$x=json_decode(json_encode($post->image,true));*/
    $x=$post->image;
    /*$x = explode ("|", $post->image);*/
    @endphp
    <div class="d-flex ">
     @foreach($x as $val)
     <img style="width:50%" class="rounded float-start" src="/images/posts/{{$val}}">
    @endforeach
    </div>
    <h1>{{$post->title}}</h1>
    <p>{{$post->description}}</p>
    <a href="{{route('posts.show',$post)}}" class="btn btn-primary mt-5 mb-5">show post</a>
    <a href="{{route('posts.edit',$post)}}" class="btn btn-secondary mt-5 mb-5">edit post</a>
    @can('manageUser',Auth::user())
    <form method="POST" action="{{ route('posts.destroy', $post) }}" class="btn btn-danger mt-5 mb-5 pt-0 pb-0"> 
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">delete post</button>
    </form>
   @endcan
  </div>
  @empty
   <h1>there is no posts</h1>
  @endforelse
  @endsection