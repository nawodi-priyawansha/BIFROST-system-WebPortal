<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen m-0 p-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('img/JuanCholo-CC-BY-SA-4.0.jpeg') }}');">
    <div class="bg-black text-white text-center p-10 rounded-lg w-max h-auto rounded rounded-3xl mb-44">
        <div class="mb-6">
            <div class="flex justify-center mb-8">
                <img src="img/valhalla-logo.png" alt="logo" class="h-24">
            </div>
            <div class="flex justify-center space-x-4">
                <label class="flex items-center">
                    <input type="radio" name="portal" value="admin" class="mr-2">
                    Admin Portal
                </label>
                <label class="flex items-center">
                    <input type="radio" name="portal" value="user" class="mr-2">
                    User Portal
                </label>
            </div>
        </div>
        <h2 class="text-4xl font-bold mb-8">Sign In</h2>
        <div class="flex justify-center gap-4 mb-8 ">
            <input type="text" maxlength="1" class="w-20 h-20 text-black text-center bg-white rounded">
            <input type="text" maxlength="1" class="w-20 h-20 text-black text-center bg-white rounded">
            <input type="text" maxlength="1" class="w-20 h-20 text-black text-center bg-white rounded">
            <input type="text" maxlength="1" class="w-20 h-20 text-black text-center bg-white rounded">
        </div>
        <a href="#" class="text-white underline mb-4 block">Forget Pin?</a>
        <div class="text-sm">
            &copy; 2024 Valhalla Performance. All rights reserved. System by JPLMS.
        </div>
    </div>
</body>
</html>
