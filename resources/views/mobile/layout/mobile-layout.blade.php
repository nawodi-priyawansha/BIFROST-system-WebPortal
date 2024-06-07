<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha384-uXf6sr8AaXNpfLE4u1jL1EB5Yc5zH06smif1RtZWm1sC2C2Mi41WIebh5q1Q0ynP" crossorigin="anonymous">
</head>
<body>
    <div>
        @include("mobile.components.mobile-header")
        <div class="flex  overflow-hidden  ">
            @yield('content')
        </div>
    </div>
    <div>@include('mobile.components.mobile-footer')</div>
    
</body>
</html>