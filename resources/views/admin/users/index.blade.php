@extends('layouts.admin')


@section('content')
	<h1>User</h1>
	<table class="table table-hover">
    <thead>
    	<tr>
    		<th>Id</th>
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
        	<td>{{$user->name}}</td>
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