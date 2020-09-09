<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test.eu</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('./css/main.css') }}" rel="stylesheet">
</head>
<body>
<div class="flex-center position-ref full-height">


    <div class="top-left links navbar">
        <?php
        use App\Menu;
        try {
            $results = DB::select('select * from menu');
            foreach ($results as $object) {
                echo "<a href=/" . $object->link . ">" . $object->name . "</a>";
            }} catch (\Illuminate\Database\QueryException $ex) {
            echo "<p> Es gab ein Problem mit der Datenbank: (" . $ex->getMessage() . ")</p>";
        }
        ?>
           @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="{{url('/logout')}}">Logout</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
            @endif
    </div>

@yield('content')

</body>
</html>
