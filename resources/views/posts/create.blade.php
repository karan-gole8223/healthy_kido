@extends('layouts.app')
@section('content')

<div class="jumbotron forms">
    <h3>create post here..</h3>
    {!! Form::open(['action'=> 'PostsController@store', 'method'=> 'POST', 'enctype'=> 'multipart/form-data']) !!}

    <div class="form-group">
    {{Form::label('title','Title',['class'=>'font-weight-bold'])}}
    {{Form::text('title', '',['class'=>'form-control','placeholder'=>'enter title'])}}
    </div>

    <div class="form-group">
        {{Form::label('body','Body',['class'=>'font-weight-bold'])}}
        
        {{Form::textarea('body', '',['class'=>'form-control','placeholder'=>'enter details or caption'])}}
        </div>

        <div class="form-group">
            {{Form::label('writer','Writer Name',['class'=>'font-weight-bold'])}}
            {{Form::text('writer', '',['class'=>'form-control','placeholder'=>'written by'])}}
            </div>
            
              <div class="form-group">
                {{Form::file('cover_image')}}
    
              </div>
            
            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
     {!! Form::close() !!}
    </div>
@endsection