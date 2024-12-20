@extends('layouts.app')
@section("title","users")
@section("content")
<a href="{{route('posts.index')}}" class="btn btn-primary mb-5 mt-5">main page</a>
<form method="POST" action="{{ route('logout') }}" class=""> 
  @csrf
  <input type="submit" value="logout" class="btn btn-secondary ">
</form>

 <a href="{{route('users.create')}}" class="btn btn-primary mt-5 mb-5">add new user</a>

 @forelse($users as $user)
  <div class="card">
    <h1>{{$user->name}}</h1>
    <p>email:{{$user->email}}</p>
    <p>password: {{$user->password}}</p>
    <p>is admin: {{$user->is_admin}}</p>
    <a href="{{route('users.edit',$user)}}" class="btn btn-secondary mt-5 mb-5">edit user</a>
    <form method="POST" action="{{ route('users.destroy', $user) }}" class="btn btn-danger mt-5 mb-5 pt-0 pb-0"> 
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">delete user</button>
    </form>
  </div>
  @empty
   <h1>there is no users</h1>
  @endforelse
  @endsection