<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation"></script>
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    @extends('layout.user-layout')
    @section('user-content')
        <!-- Container with overflow for scrolling and full width -->
        <div class="container overflow-y-auto w-full bg-[#fafafa] flex-grow" id="container">
            <!-- Main content area with top margin for large screens and smaller margin for medium screens -->
            <div class="w-full mt-36 lg:mt-24 md:mt-24">
                <!-- Content section with gray background -->
                <div class="mx-4 ">
                    <!-- Header with breadcrumb and add new profile button -->
                    <div class="text-sm">
                        <div class="justify-between flex mx-4">
                            <div><span class="text-gray-700">Home / </span><strong>Dashboard</strong></div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Profile and session dashboard section -->
            <div class="w-full lg:flex mt-5">

                <div class="lg:w-[30%] flex-col w-full">
                    <div class="bg-white shadow rounded-lg p-6 mx-4 px-4">
                        <div class="flex justify-between">
                            <a href="#"
                                class="btn p-2 rounded-lg text-white bg-black mb-4 text-sm lg:text-base">Profile</a>
                            <a href="#" class="btn text-red-500 mb-4 text-sm lg:text-base">Edit</a>
                        </div>
                        <div class="flex items-center mt-4 space-x-4 ">
                            <div>
                                <img src="{{ asset($profileImage) }}" alt="Profile Picture"
                                    class="w-12 h-12 rounded-[50%] lg:w-20 lg:h-20">
                            </div>
                            <div class="flex flex-col">
                                {{-- here name dispaly below ajex trough --}}
                                <h5 id="nameDisplay"
                                    class="text-lg font-semibold overflow-hidden text-ellipsis lg:text-2xl">
                                    <!-- User's name will be displayed here -->
                                    {{ $user->name }}
                                </h5>
                                <h6 class="text-gray-500 text-sm lg:text-lg"><span>{{ $member->gender }}</span>,
                                    <span>{{ $member->age }}</span> years
                                </h6>
                            </div>
                        </div>
                        <div class="flex justify-between border-t border-black items-center mt-6">
                            <div class="text-center">
                                <h6 class="text-black text-sm lg:text-lg">HEIGHT</h6>
                                <p class="text-gray-800 text-xl lg:text-3xl">{{ $member->height }} cm</p>
                            </div>
                            <div class="border-l border-black h-12"></div> <!-- Divider -->
                            <div class="text-center">
                                <h6 class="text-black text-sm lg:text-lg">WEIGHT</h6>
                                <p class="text-gray-800 text-xl lg:text-3xl">{{ $member->weight }} kg</p>
                            </div>
                        </div>
                    </div>
                    <!-- Session dashboard section -->
                    <div class="mb-5 mt-4 lg:mt-0  text-xs">

                        <div class=" bg-white shadow rounded-lg p-6 mx-4 px-4">
                            <div class="mb-5 ">
                                <label for=""
                                    class="text-white p-2 px-4 rounded-md bg-[#fb1018] whitespace-nowrap font-semibold">Session
                                    Dashboard</label>
                            </div>
                            <!-- Table with session details -->
                            <div class="">
                                <div class=" max-h-screen md:max-h-full overflow-y-hidden">
                                    <table class="table-auto   text-xs w-full border-collapse ">
                                        <thead class="">
                                            <tr>
                                                <th class="border-b-2 border-black px-4 py-2"></th>
                                                <th class="border-b-2 border-black px-4 py-2">BENCH</th>
                                                <th class="border-b-2 border-black px-4 py-2">DEAD LIFT</th>
                                                <th class="border-b-2 border-black px-4 py-2">BACK SQUAT</th>
                                                <th class="border-b-2 border-black px-4 py-2">FRONT SQUAT</th>
                                                <th class="border-b-2 border-black px-4 py-2">C+J</th>
                                                <th class="border-b-2 border-black px-4 py-2">SNATCH</th>
                                                <th class="border-b-2 border-black px-4 py-2">P. CLEAN</th>
                                            </tr>
                                        </thead>
                                        <tbody class=" divide-y divide-gray-100 text-center ">
                                            <tr>
                                                <th class="border-b-1 border-gray-300 px-4 py-2"
                                                    style="border-right: 2px solid black;">LAITO</th>

                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                            </tr>
                                            <tr>
                                                <th class="border-b-1 border-gray-300 px-4 py-2"
                                                    style="border-right: 2px solid black;">LAITO</th>

                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                            </tr>
                                            <tr>
                                                <th class="border-b-1 border-gray-300 px-4 py-2"
                                                    style="border-right: 2px solid black;">LAITO</th>

                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1  border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1  border-gray-300 px-4 py-2">230</td>
                                            </tr>
                                            <tr>
                                                <th class="border-b-1 border-gray-300 px-4 py-2"
                                                    style="border-right: 2px solid black;">LAITO</th>

                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                            </tr>
                                            <tr>
                                                <th class="border-b-1 border-gray-300 px-4 py-2"
                                                    style="border-right: 2px solid black;">LAITO</th>

                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                            </tr>
                                            <tr>
                                                <th class="border-b-1 border-gray-300 px-4 py-2"
                                                    style="border-right: 2px solid black;">LAITO</th>

                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                            </tr>
                                            <tr>
                                                <th class="border-b-1 border-gray-300 px-4 py-2"
                                                    style="border-right: 2px solid black;">LAITO</th>

                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                            </tr>
                                            <tr>
                                                <th class="border-b-1 border-gray-300 px-4 py-2"
                                                    style="border-right: 2px solid black;">LAITO</th>

                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                                <td class="border-b-1 border-gray-300 px-4 py-2">230</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Session dashboard section -->
                <div class="mb-5 lg:w-[70%] mt-4 lg:mt-0">
                    <div>
                        <div>
                            <div class=" flex bg-white shadow rounded-lg p-6 mx-4 px-4">
                                <div class="mb-5 justify-between w-1/2">
                                    <label for=""
                                        class="text-white p-1 px-4 rounded-md bg-[#fb1018] whitespace-nowrap text-sm">Workout-
                                        Deadlift</label>
                                    <label for=""
                                        class="text-white p-1 px-4 rounded-md bg-black whitespace-nowrap text-sm">12 july
                                        2024</label>


                                </div>
                                <div class="w-1/2 flex items-center justify-end">
                                    <a href="{{ route('mobile.trainingday') }}"
                                        class="text-white p-1 px-4 rounded-md bg-black whitespace-nowrap text-sm">
                                        Training App
                                    </a>
                                </div>
                            </div>
                            <!-- Table with session details -->
                            <div class="mx-4 mt-4">
                                <div class="overflow-y-auto md:overflow-y-visible max-h-screen md:max-h-full">
                                    <table class="table-auto w-full border-collapse text-md">
                                        <thead>
                                            <tr></tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-b border-black">
                                                <td class="py-2 pb-4">Warm UP</td>
                                                <td class="py-2 pb-4">2 x 10 bar only</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 pb-4">Strength</td>
                                                <td class="py-2 pb-4">3 Rep MAX</td>
                                            </tr>
                                            </tr>
                                            <tr class="border-b border-black">
                                                <td class="py-2 pb-4"></td>
                                                <td class="py-2 pb-4">2 x 10 bar only</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 pb-4">Conditioning</td>
                                                <td class="pb-4 py-2">5 sets</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 pb-4"></td>
                                                <td class="pb-4 py-2">- 10 Goblet Squat</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 pb-4"></td>
                                                <td class="py-2 pb-4">- 60 Sec Plank</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 pb-4"></td>
                                                <td class="py-2 pb-4">- 10 Single Arm bent over row</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class=" bg-white shadow rounded-lg p-6 mx-4 px-4">
                            <div class="mb-5">
                                <label for=""
                                    class="text-white p-2 px-4 rounded-md bg-[#fb1018] whitespace-nowrap">Statistics
                                    - Workout History</label>
                            </div>
                            <!-- Table with session details -->
                            <div class="">
                                <div class="overflow-y-auto md:overflow-y-visible max-h-screen md:max-h-full">
                                    <div class="pt-6 pb-14 w-full ">
                                        <canvas id="myChart" class="sm:h-96 h-80"></canvas>
                                    </div>
                                    <script>
                                        var ctx = document.getElementById('myChart').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'line',
                                            data: {
                                                labels: ['2018', '2019', '2020', '2021', '2022', '2023'],
                                                datasets: [{
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
                                                        annotations: [{
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
                </div>


            </div>
        </div>
        </div>
        </div>
    @endsection
</body>

</html>
