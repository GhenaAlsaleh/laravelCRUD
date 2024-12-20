@extends('layouts.app')
@section("title","edit user")
@section("content")
 <h1 class="mt-5 mb-5">edit {{ $user->name }} user</h1>
 <form action="{{route('users.update',$user)}}" method="POST">
    @csrf
    @method('PUT')
    <input class="form-control" type="text" name="name" placeholder="user name" value="{{ $user->name }}">
    <br>
    <input class="form-control" type="text" name="email" placeholder="user email" value="{{ $user->email }}">
    <br>
    <input class="form-control" type="password" name="password" placeholder="user password" value="{{ $user->password }}">
    <br>
    <p>user is admin:{{ $user->is_admin }}</p>
    <br>
    <label for="role">chose new user role:</label>
    <select class="form-control" name="is_admin" id="role" >
      <option value="0">User</option>
      <option value="1">Admin</option>
    </select>
    <br>
    <input type="submit" value="send" class="btn btn-secondary mt-5">
 </form>
 @endsection