@extends('layouts.admin')


@section('content')
	<h1>User</h1>
	@if(Session::get('info'))
		<div class="bg-danger">{{session('info')}}</div>
	@endif
	<table class="table table-hover">
    <thead>
    	<tr>
    		<th>Id</th>
    		<th>Photo</th>
        	<th>Firstname</th>
        	<th>Email</th>
        	<th>Role</th>
        	<th>Status</th>
        	<th>Created</th>
        	<th>Updated</th>
      	</tr>
    </thead>
    <tbody>
    @if($users)
    	@foreach($users as $user)
      	<tr>
      		<td>{{$user->id}}</td>
      		<td><img src="{{$user->photo ? $user->photo->file : "https://dummyimage.com/400x400/000/fff"}}" height="50"></td>
        	<td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
        	<td>{{$user->email}}</td>
        	<td>{{$user->role ? $user->role->name : "User has no role"}}</td>
        	<td>{{$user->is_active ? "Active" : "Inactive"}}</td>
        	<td>{{$user->created_at->diffForHumans()}}</td>
        	<td>{{$user->updated_at->diffForHumans()}}</td>
      	</tr>
      	@endforeach
    @endif
    </tbody>
  </table>
@stop