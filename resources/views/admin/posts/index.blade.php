@extends('layouts.admin')

@section('content')
	<h1>Posts</h1>
	<table class="table table-hover">
	  <thead>
	    <tr>
	      <th>Id</th>
	      <th>User</th>
	      <th>Image</th>
	      <th>Category</th>
	      <th>Title</th>
	      <th>Content</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($posts as $post)
	    <tr>
	      <th scope="row">{{$post->id}}</th>
	      <td>{{$post->user ? $post->user->name : "No user"}}</td>
	      <td><img src="{{$post->photo ? $post->photo->file : "No user"}}" height="50"></td>
	      <td>{{$post->category ? $post->category->title : "No Cateory"}}</td>
	      <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></td>
	      <td>{{$post->body}}</td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>
@stop