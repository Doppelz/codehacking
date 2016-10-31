@extends('layouts.admin')

@section('content')
	{{-- expr --}}
	<h1>Create User</h1>
	{{Form::open(['method'=>'post', 'action'=>'AdminUsersController@store', 'files'=>'true'])}}
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
		{!! Form::select('is_active', ['1'=>'Active','0'=>'Not Active'], 0, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('password', 'Password') !!}
		{!! Form::text('password', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('file', 'File') !!}
		{!! Form::file('file', null, ['class'=>'form-control']) !!}
	</div>


	<div class="form-group">
		{!! Form::submit('Create User', ['class'=> 'btn btn-primary']) !!}
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

	{{Form::close()}}

@stop