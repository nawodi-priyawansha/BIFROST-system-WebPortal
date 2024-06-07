<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UI Design</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class=" overflow-y-auto">
    @extends('mobile.layout.mobile-layout')
    @section('content')
        <div class="w-full flex flex-col justify-between h-screen  overflow-y-auto">
            <div class="flex-grow items-center justify-center m-0 p-4 bg-cover bg-center  bg-no-repeat"
                style="background-image: url('{{ asset('img/valhalla-bg.jpg') }}');">
                <div class="bg-transparent p-6 rounded-lg shadow-md pt-24">
                    <div class="mb-4 flex flex-col text-center"> <!-- Change flex direction to column -->
                        <div class="w-full mb-2 text-white text-center items-center justify-center flex">Hrs of Sleep</div> <!-- Move this div here -->
                        <div class="flex flex-grow h-8 rounded overflow-hidden">
                            <button class="flex-1 bg-red-500 text-white text-center focus:outline-none">&lt;5</button>
                            <button class="flex-1 bg-orange-500 text-white text-center focus:outline-none">5-6</button>
                            <button class="flex-1 bg-yellow-500 text-white text-center focus:outline-none">6-7</button>
                            <button class="flex-1 bg-green-500 text-white text-center focus:outline-none">7-8</button>
                            <button class="flex-1 bg-green-700 text-white text-center focus:outline-none">8+</button>
                        </div>
                    </div>
                    <div class="mb-4 flex flex-col"> <!-- Change flex direction to column -->
                        <div class="w-full mb-2 text-white text-center items-center justify-center">Alertness</div> <!-- Move this div here -->
                        <div class="flex flex-grow h-8 rounded overflow-hidden">
                            <button class="flex-1 bg-red-500 text-white text-center focus:outline-none">&lt;5</button>
                            <button class="flex-1 bg-orange-500 text-white text-center focus:outline-none">5-6</button>
                            <button class="flex-1 bg-yellow-500 text-white text-center focus:outline-none">6-7</button>
                            <button class="flex-1 bg-green-500 text-white text-center focus:outline-none">7-8</button>
                            <button class="flex-1 bg-green-700 text-white text-center focus:outline-none">8+</button>
                        </div>
                        <div class="w-full mb-2 text-white text-xs text-center items-center justify-center">1= lights are on but no one is home.</div> <!-- Move this div here -->
                    </div>
                    <div class="mb-4 flex flex-col"> <!-- Change flex direction to column -->
                        <div class="w-full text-center items-center justify-center mb-2 text-white">Excitement</div> <!-- Move this div here -->
                        <div class="flex flex-grow h-8 rounded overflow-hidden">
                            <button class="flex-1 bg-red-500 text-white text-center focus:outline-none">&lt;5</button>
                            <button class="flex-1 bg-orange-500 text-white text-center focus:outline-none">5-6</button>
                            <button class="flex-1 bg-yellow-500 text-white text-center focus:outline-none">6-7</button>
                            <button class="flex-1 bg-green-500 text-white text-center focus:outline-none">7-8</button>
                            <button class="flex-1 bg-green-700 text-white text-center focus:outline-none">8+</button>
                        </div>
                        <div class="w-full text-center items-center justify-center mb-2 text-white text-xs">1= Not interested in weights today.</div> <!-- Move this div here -->
                    </div>
                    <div class="mb-4 flex flex-col"> <!-- Change flex direction to column -->
                        <div class="w-full text-center items-center justify-center mb-2 text-white">Stress</div> <!-- Move this div here -->
                        <div class="flex flex-grow h-8 rounded overflow-hidden">
                            <button class="flex-1 bg-red-500 text-white text-center focus:outline-none">&lt;5</button>
                            <button class="flex-1 bg-orange-500 text-white text-center focus:outline-none">5-6</button>
                            <button class="flex-1 bg-yellow-500 text-white text-center focus:outline-none">6-7</button>
                            <button class="flex-1 bg-green-500 text-white text-center focus:outline-none">7-8</button>
                            <button class="flex-1 bg-green-700 text-white text-center focus:outline-none">8+</button>
                        </div>
                        <div class="w-full text-center items-center justify-center mb-2 text-white text-xs">1= Pulling my hair out.</div> <!-- Move this div here -->
                    </div>
                    <div class="mb-4 flex flex-col"> <!-- Change flex direction to column -->
                        <div class="w-full text-center items-center justify-center mb-2 text-white">Soreness</div> <!-- Move this div here -->
                        <div class="flex flex-grow h-8 rounded overflow-hidden">
                            <button class="flex-1 bg-red-500 text-white text-center focus:outline-none">&lt;5</button>
                            <button class="flex-1 bg-orange-500 text-white text-center focus:outline-none">5-6</button>
                            <button class="flex-1 bg-yellow-500 text-white text-center focus:outline-none">6-7</button>
                            <button class="flex-1 bg-green-500 text-white text-center focus:outline-none">7-8</button>
                            <button class="flex-1 bg-green-700 text-white text-center focus:outline-none">8+</button>
                        </div>
                        <div class="w-full text-center items-center justify-center mb-2 text-white text-xs">1= Crippled..</div>
                    </div>
                    <div class="text-center text-xl font-bold mb-4">SCORE: 75%</div>
                    <button
                        class="block mx-auto py-2 px-4 bg-blue-500 text-white rounded mb-4 hover:bg-blue-700 focus:outline-none">SAVE</button>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
