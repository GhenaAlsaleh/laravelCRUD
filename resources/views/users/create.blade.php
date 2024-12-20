@extends('layouts.app')
@section("title","add user")
@section("content")
 <h1 class="mt-5 mb-5">add new user</h1>
 <form action="{{route('users.store')}}" method="POST" >
    @csrf
    <input class="form-control" type="text" name="name" placeholder="enter user name">
    <br>
    <input class="form-control" type="email" name="email" placeholder="enter user email">
    <br>
    <input class="form-control" type="password" name="password" placeholder="enter user password" >
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