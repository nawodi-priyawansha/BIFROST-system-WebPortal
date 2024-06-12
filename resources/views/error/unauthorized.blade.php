<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex items-center justify-center min-h-screen m-0 p-4 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('img/valhalla-bg.jpg') }}');">
    <div class="bg-black text-white text-center p-4 sm:p-10 w-full max-w-md rounded-3xl mb-12 sm:mb-44">
        <div class="flex justify-center mb-8">
            <img src="{{ asset('images/valhalla-logo.png') }}" alt="Logo" class='w-16 md:w-20' />
        </div>
        <div class=" mx-auto flex justify-center items-center px-4" id="container">
            <div class="text-center">
                <h2 class="text-8xl  md:text-9xl font-bold whitespace-nowrap text-gray-500">
                    <span class="tracking-wider">4</span>
                    <span class="tracking-wider">0</span>
                    <span class="tracking-wider">1</span>
                </h2>
                <p class="text-2xl md:text-4xl text-gray-600 mt-4">UNAUTHORIZED</p>
            </div>
          </div>
        <div class="rounded-md sm:w-44 w-1/2 h-10 flex items-center justify-center mx-auto mt-5  bg-gray-400 transition-colors duration-300" style="background-color: #676768,">
            <button class="text-black rounded-md text-xs sm:text-lg border hover:border-white hover:bg-black hover:text-white text-center font-bold w-full h-full">Back</button>
        </div>
        <div class="text-sm mt-4">
            &copy; 2024 Valhalla Performance. All rights reserved. System by JPLMS.
        </div>
    </div>
</body>

</html>
