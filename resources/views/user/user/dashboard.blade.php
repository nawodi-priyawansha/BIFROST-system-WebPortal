<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation"></script>
</head>

<body class="bg-gray-100">

    @extends('layout.user-layout')
    @section('user-content')
    <main class="flex-grow p-4 overflow-y-auto mt-20">
        <div class="container mx-auto px-2">
            <div class="breadcrumb text-sm mb-4">
                <a href="#" class="text-gray-500 no-underline hover:underline">Home</a> / <span><strong> Access </strong></span>
            </div>
        </div>
        <div class="container mx-auto px-2">
            <div class="flex flex-wrap -mx-2">
                <!-- Profile Section -->
                <div class="w-full md:w-1/4 px-1 mb-4">
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="flex justify-between">
                            <a href="#" class="btn p-2 rounded-lg text-white bg-black mb-4">Profile</a>
                            <a href="#" class="btn text-red-500 mb-4">Edit</a>
                        </div>
                        <div class="flex items-center mt-4 space-x-4">
                            <img src="{{ asset('img/valhalla-bg.jpg') }}" alt="Profile Picture" class="w-20 h-20 rounded-full">
                            <div class="flex flex-col">
                                <h5 class="text-2xl font-semibold whitespace-nowrap overflow-hidden text-ellipsis">Richard Jones</h5>
                                <h6 class="text-gray-500 text-lg">Male, 28 years</h6>
                            </div>
                        </div>
                        <div class="flex justify-between border-t border-black items-center mt-6">
                            <div class="text-center">
                                <h6 class="text-black text-lg">HEIGHT</h6>
                                <p class="text-gray-800 text-3xl">185 cm</p>
                            </div>
                            <div class="border-l border-black h-12"></div> <!-- Divider -->
                            <div class="text-center">
                                <h6 class="text-black text-lg">WEIGHT</h6>
                                <p class="text-gray-800 text-3xl">125 kg</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Workout Section -->
                <div class="w-full md:w-3/4 px-2 mb-4">
                    <div class="bg-white shadow rounded-lg">
                        <div class="flex py-2">
                            <label for="text" class="bg-red-600 mt-4 pr-4 pl-4 rounded-md ml-4 text-lg p-1 text-white">Workout - Deadlift</label>
                        </div>
                        <div class="p-4 text-lg">
                            <table class="w-full">
                                <thead>
                                    <tr></tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-black">
                                        <td class="py-2 pb-4">Warm UP</td>
                                        <td class="py-2 pb-4">2 x 10 bar only</td>
                                        <td></td>
                                        <td class="py-2 pb-4"></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 pb-4">Strength</td>
                                        <td class="py-2 pb-4">2 x 10 bar only</td>
                                        <td class="py-2 pb-4 justify-end flex  sm:flex-row">
                                            <input type="text" class="form-input border rounded-md border-black mr-3 w-full sm:w-24">
                                            <button class="btn btn-outline-secondary hover:text-yellow-600 mt-2 sm:mt-0">Save</button>
                                        </td>
                                    </tr>
                                    </tr>
                                    <tr class="border-b border-black">
                                        <td class="py-2 pb-4"></td>
                                        <td class="py-2 pb-4">2 x 10 bar only</td>
                                        <td class="py-2 pb-4 justify-end flex  sm:flex-row">
                                            <input type="text" class="form-input border rounded-md border-black mr-3 w-full sm:w-24">
                                            <button class="btn btn-outline-secondary hover:text-yellow-600 mt-2 sm:mt-0">Save</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 pb-4">Conditioning</td>
                                        <td class="pb-4 py-2">5 sets</td>
                                        <td class="py-2 text-end pb-4"></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 pb-4"></td>
                                        <td class="pb-4 py-2">- 10 Goblet Squat</td>
                                        <td class="py-2 pb-4 justify-end flex  sm:flex-row">
                                            <input type="text" class="form-input border rounded-md border-black mr-3 w-full sm:w-24">
                                            <button class="btn btn-outline-secondary hover:text-yellow-600 mt-2 sm:mt-0">Save</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 pb-4"></td>
                                        <td class="py-2 pb-4">- 60 Sec Plank</td>
                                        <td class="py-2 pb-4 justify-end flex  sm:flex-row">
                                            <input type="text" class="form-input border rounded-md border-black mr-3 w-full sm:w-24">
                                            <button class="btn btn-outline-secondary hover:text-yellow-600 mt-2 sm:mt-0">Save</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 pb-4"></td>
                                        <td class="py-2 pb-4">- 10 Single Arm bent over row</td>
                                        <td class="py-2 pb-4 justify-end flex  sm:flex-row">
                                            <input type="text" class="form-input border rounded-md border-black mr-3 w-full sm:w-24">
                                            <button class="btn btn-outline-secondary hover:text-yellow-600 mt-2 sm:mt-0">Save</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Statistics Section -->
                <div class="md:w-1/4">
                </div>
                <div class="w-full md:w-3/4 px-2 mb-4 ">
                    <div class="bg-white shadow rounded-lg ">
                        <div class="flex py-2 bg-white sm:mb-4">
                            <label for="text" class="bg-red-600 mt-4 pr-4 pl-4 rounded-md ml-4 text-lg p-1 text-white">Statistics - Workout History</label>
                        </div>
                        <div class="pt-6 pb-14 w-full ">
                            <canvas id="myChart" class="sm:h-96 h-80"></canvas>
                        </div>
                        <script>
                            var ctx = document.getElementById('myChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: ['2018', '2019', '2020', '2021', '2022', '2023'],
                                    datasets: [
                                        {
                                            label: 'Weight',
                                            data: [1000, 1200, 800, 1500, 900, 1750],
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 2,
                                            fill: false,
                                            tension: 0.4
                                        },
                                        {
                                            label: 'Height',
                                            data: [500, 700, 600, 800, 500, 1200],
                                            borderColor: 'rgba(255, 99, 132, 1)',
                                            borderWidth: 2,
                                            fill: false,
                                            tension: 0.4
                                        },
                                        {
                                            label: 'Heading 1',
                                            data: [800, 600, 1200, 900, 1300, 500],
                                            borderColor: 'rgba(54, 162, 235, 1)',
                                            borderWidth: 2,
                                            fill: false,
                                            tension: 0.4
                                        },
                                        {
                                            label: 'Heading 2',
                                            data: [600, 900, 500, 700, 800, 1500],
                                            borderColor: 'rgba(255, 159, 64, 1)',
                                            borderWidth: 2,
                                            fill: false,
                                            tension: 0.4
                                        }
                                    ]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    },
                                    plugins: {
                                        annotation: {
                                            annotations: [
                                                {
                                                    type: 'point',
                                                    xValue: '2021',
                                                    yValue: 1500,
                                                    backgroundColor: 'rgba(0, 255, 0, 0.5)',
                                                    borderColor: 'rgb(0, 255, 0)',
                                                    borderWidth: 2,
                                                    radius: 5,
                                                },
                                                {
                                                    type: 'point',
                                                    xValue: '2023',
                                                    yValue: 1200,
                                                    backgroundColor: 'rgba(255, 0, 0, 0.5)',
                                                    borderColor: 'rgb(255, 0, 0)',
                                                    borderWidth: 2,
                                                    radius: 5,
                                                }
                                            ]
                                        }
                                    }
                                }
                            });

                        </script>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection

</body>

</html>
