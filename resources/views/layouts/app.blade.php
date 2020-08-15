<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @trixassets
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ config('app.name', 'HealthyKido') }}
    </title> 
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  
    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f33b4a3de52a0001208d814&product=inline-follow-buttons" async="async"></script>
</head>
<body>
    <div id="app">
       @include('inc.navbar')
          
            <div class="container indeximg">
             @include('inc.message')
             
            @yield('content')
           
            <div class="sharethis-inline-follow-buttons" style="font-size:20px; font-weight:bold; color:rgb(255, 255, 255);">
            </div><!-- ShareThis END -->
             </div>
             <br><br><br><br>
             
             
    </div>
    @include('inc.footer')  
   
</body>
</html>
