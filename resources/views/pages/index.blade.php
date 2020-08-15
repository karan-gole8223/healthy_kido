@extends('layouts.app')

     @section('content')
     
<div class="jumbotron text-center">
<h1 style="color: yellow">{{$title}}</h1>
<p style="color: rgb(102, 255, 242); font-size:20px; background-color:rgba(219, 82, 58, 0.479); ">Welcome to healthy kido's blog. Here we are posting some interesting and helpful posts <br> related to health and fitness 
     and also realted to the style and lil about fashion. <br>
     And do you know the best thing is we are allowing you guys to post some knowledgeable stuff.
     <br> So please guys Do read and post here. Your knowledge and post might work for others. 
     <br> so keep posting and let turn ourselves into a healthy community.......!!!
</p>
<p><a href="/login" class="btn btn-primary btn-lg" role="button">Login</a>
     <a href="/register" class="btn btn-success btn-lg" role="button">Register</a>
</p>
</div>

     @endsection
            s

