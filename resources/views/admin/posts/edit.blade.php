@extends('layouts.admin')

@section('content')
	<h1>Edit Post</h1>
	{!! Form::model($post, ['method'=>'patch', 'action'=>['AdminPostsController@update', $post->id], 'files'=>'true']) !!}
	<div class="form-group">
		{!! Form::label('title', 'Title') !!}
		{!! Form::text('title', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('body', 'Content') !!}
		{!! Form::textarea('body', null, ['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('category_id', 'Category') !!}
		{!! Form::select('category_id', [''=>'Choose Category'] + $categories, null, ['class' =>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('photo', 'Photo') !!}
		{!! Form::file('photo', null, ['class'=>'form-control']) !!}
	</div>

	{!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
	
	{!! Form::close() !!}

	@include('includes.form_error')
@stop