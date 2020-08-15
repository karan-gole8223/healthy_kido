@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                <a href="/posts/create" class="btn btn-primary">Create Post</a>
                <hr>
                <h3>Your Blog's Post</h3>
                @if(count($posts)>0)
                <table class="table table-striped">
                  <tr>
                      <th>Title</th>
                      <th></th>
                       <th></th>
                  </tr>
                      @foreach ($posts as $post)
                         <tr>
                         <td>{{$post->title}}</td>
                         <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                         <td>{!! Form::open(['action'=> ['PostsController@destroy',$post->id], 'method'=> 'POST']) !!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class'=> 'float-right btn btn-danger'])}}
                            {!!Form::close()!!}</td>
                         </tr>
                          
                      @endforeach
                </table>
                @else
                <h4>You have no posts.....</h4>
                @endif
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
