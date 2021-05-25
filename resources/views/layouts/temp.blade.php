<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
        
        <title>{{config('app.name', 'FYP Huzaifah')}}</title>

    </head>
    <body class="body">
        @include('include.navbar')
        <div class="container">
            {{-- <div>anak itik ni layout header</div> --}}
            <br>
            @include('include.messages')
            @yield('content')
            <br>
            
            <br>
            <br>
            <div class="footer">
                <p style="margin-top: 12px">Made by <a href="https://www.linkedin.com/in/muhammad-huzaifah-azman/">Muhammad Huzaifah Azman</a>.</p>
            </div>
        </div>
    </body>
</html>
