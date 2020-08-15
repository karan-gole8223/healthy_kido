@extends('layouts.app')
@section('content')
<a href="/posts/create"><button class="btn btn-primary">Create Post</button></a>
<hr>
    <h3>Posts</h3>
    @if (count($posts)>0)
        @foreach ($posts as $post)
            <div class="container p-3 my-3 bg-dark text-white">
            
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <img src="/storage/cover_images/{{$post->cover_image}}" style="width:100%">
                </div>
                <div class="col-md-8 col-sm-8">
                    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                    <h5>{{$post->body}}</h5>
            <small>written on-{{$post->created_at}}</small><br>
            <small>writer-{{$post->writer}}</small>
                </div>
                </div>
    
        @endforeach
        {{$posts->links()}} <!--helps to create pagination-->
    @else
        <h3>No Posts</h3>
    @endif
@endsection
