@extends('layouts.app')

@section('content')
<div class="jumbotron fonts">
<a href="/posts" class="btn btn-success">Go Back</a>
<hr>
<div>
<h1>This is post {{$post->title}}</h1>
<br>

<img src="/storage/cover_images/{{$post->cover_image}}" style="width:100%">
<hr>
<p style="background-color: black; padding:10px; text-align:center;">{{$post->body}}
    
</p>
</div>
<small>written on {{$post->created_at}} & written by {{$post->writer}}</small>

<hr>
@if(!Auth::guest())
@if(Auth::user()->id==$post->user_id)
    <section>
<a href="/posts/{{$post->id}}/edit" class=" float-left btn btn-primary">Edit</a>


{!! Form::open(['action'=> ['PostsController@destroy',$post->id], 'method'=> 'POST']) !!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete', ['class'=> 'float-right btn btn-danger'])}}
{!!Form::close()!!}
</section>
@endif
@endif
</div>
@endsection
