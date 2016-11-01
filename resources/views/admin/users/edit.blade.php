@extends('layouts.admin')

@section('content')
	{{-- expr --}}
	<h1>Edit User</h1>
	<div class="col-sm-3">
		<img src="{{$user->photo ? $user->photo->file : "https://dummyimage.com/400x400/000/fff"}}" width="100%">
	</div>
	<div class="col-sm-9">

	{!!Form::model($user, ['method'=>'patch', 'action'=>['AdminUsersController@update',$user->id], 'files'=>'true'])!!}
	<div class="form-group">
		{!! Form::label('name', 'Name') !!}
		{!! Form::text('name', null, ['class'=>'form-control']) !!}
	</div>

	@if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif

	<div class="form-group">
		{!! Form::label('email', 'Email') !!}
		{!! Form::text('email', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('role_id', 'Status') !!}
		
		{!! Form::select('role_id', [''=>'Choose Option']+$roles,null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('is_active', 'Status') !!}
		{!! Form::select('is_active', ['1'=>'Active','0'=>'Not Active'], null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('password', 'Password') !!}
		{!! Form::text('password', '', ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('file', 'File') !!}
		{!! Form::file('file', null, ['class'=>'form-control']) !!}
	</div>

	<div class="clearfix">
	<div class="form-group pull-left">
		{!! Form::submit('Create User', ['class'=> 'btn btn-primary']) !!}
	</div>

	
	

	
	{!! Form::close() !!}
	{!! Form::open(['method'=>'delete', 'action'=>['AdminUsersController@destroy', $user->id], 'class'=>'pull-right']) !!}
		<div class="form-group">
			{!! Form::submit('Delete user',['class'=>'btn btn-danger']) !!}
		</div>
	{!! Form::close() !!}
	</div>
	@if(count($errors)>0)
	<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)
	<li>{{$error}}</li>
	@endforeach
	</ul>
	</div>
	@endif
</div>		
@stop