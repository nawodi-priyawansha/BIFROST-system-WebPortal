<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('{{ asset('img/JuanCholo-CC-BY-SA-4.0.jpeg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .login-container {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="flex justify-between mb-4">
            <label class="flex items-center">
                <img src="{{ asset('img/valhalla-logo.png') }}" alt="logo" class="justify-center flex">
                <input type="radio" name="portal" value="admin" class="mr-2">
                Admin Portal
            </label>
            <label class="flex items-center">
                <input type="radio" name="portal" value="user" class="mr-2">
                User Portal
            </label>
        </div>
        <h2 class="text-xl font-bold mb-4">Sign In</h2>
        <div class="flex justify-between mb-8">
            <input type="text" maxlength="1" class="w-14 h-14 text-white text-center bg-gray-700 rounded">
            <input type="text" maxlength="1" class="w-14 h-14 text-white text-center bg-gray-700 rounded">
            <input type="text" maxlength="1" class="w-14 h-14 text-white text-center bg-gray-700 rounded">
            <input type="text" maxlength="1" class="w-14 h-14 text-white text-center bg-gray-700 rounded">
        </div>
        <a href="#" class="text-white underline mb-4">Forget Pin?</a>
        <div class="text-sm">
            &copy; 2024 Valhalla Performance. All rights reserved. System by JPLMS.
        </div>
    </div>
</body>
</html>
