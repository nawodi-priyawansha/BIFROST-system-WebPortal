<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>
    @extends('mobile.layout.mobile-layout')

    @section('content')
        <div class="w-full flex flex-col justify-between h-screen h-100%">
            <div class="flex-grow items-center justify-center m-0 p-4 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('img/valhalla-bg.jpg') }}');">
                <div class="justify-center items-center text-white text-center h-full pt-20">
                    <div class="container mx-auto px-4 py-20">
                        <div class="section">
                            <h2 class="text-2xl font-bold mb-4">DEADLIFT</h2>
                            <table class="w-full text-white">
                                <thead>
                                    <tr>
                                        <th class="bg-opacity-20 bg-white p-4">Rep</th>
                                        <th class="bg-opacity-20 bg-white p-4">Oct</th>
                                        <th class="bg-opacity-20 bg-white p-4">Nov</th>
                                        <th class="bg-opacity-20 bg-white p-4">Dec</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-4">1</td>
                                        <td class="p-4">150kg</td>
                                        <td class="p-4">130kg</td>
                                        <td class="p-4">100kg</td>
                                    </tr>
                                    <tr>
                                        <td class="p-4">3</td>
                                        <td class="p-4">120kg</td>
                                        <td class="p-4">100kg</td>
                                        <td class="p-4">80kg</td>
                                    </tr>
                                    <tr>
                                        <td class="p-4">5</td>
                                        <td class="p-4">100kg</td>
                                        <td class="p-4">80kg</td>
                                        <td class="p-4">60kg</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="section mt-8">
                            <h2 class="text-2xl font-bold mb-4">AMRAP 5</h2>
                            <table class="w-full text-white">
                                <thead>
                                    <tr>
                                        <th class="bg-opacity-20 bg-white p-4"></th>
                                        <th class="bg-opacity-20 bg-white p-4">Oct</th>
                                        <th class="bg-opacity-20 bg-white p-4">Nov</th>
                                        <th class="bg-opacity-20 bg-white p-4">Dec</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-4">Rounds</td>
                                        <td class="p-4">8</td>
                                        <td class="p-4">6</td>
                                        <td class="p-4">5</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>


</html>
