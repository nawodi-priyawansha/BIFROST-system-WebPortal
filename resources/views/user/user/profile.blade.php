<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <title>Document</title>
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
                    <div>
                        <div class="justify-between flex mx-4">
                            <div><span class="text-gray-700">Home / </span>Profile</div>
                            <div>
                                <a href="{{ route('usernewprofile') }}">
                                    <button class="bg-black text-white p-2 px-4 rounded-md">Add New Profile</button>
                                </a>
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
                                        <img src="{{ asset('img/valhalla-bg.jpg') }}" alt="Profile Picture"
                                            class="w-12 h-12 rounded-[50%] lg:w-20 lg:h-20">
                                    </div>
                                    <div class="flex flex-col">
                                        <h5 class="text-lg font-semibold overflow-hidden text-ellipsis lg:text-2xl">Richard
                                            Jones</h5>
                                        <h6 class="text-gray-500 text-sm lg:text-lg">Male, 28 years</h6>
                                    </div>
                                </div>
                                <div class="flex justify-between border-t border-black items-center mt-6">
                                    <div class="text-center">
                                        <h6 class="text-black text-sm lg:text-lg">HEIGHT</h6>
                                        <p class="text-gray-800 text-xl lg:text-3xl">185 cm</p>
                                    </div>
                                    <div class="border-l border-black h-12"></div> <!-- Divider -->
                                    <div class="text-center">
                                        <h6 class="text-black text-sm lg:text-lg">WEIGHT</h6>
                                        <p class="text-gray-800 text-xl lg:text-3xl">125 kg</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Session dashboard section -->
                        <div class="mb-5 lg:w-[70%] mt-4 lg:mt-0">

                            <div class=" bg-white shadow rounded-lg p-6 mx-4 px-4">
                                <div class="mb-5">
                                    <label for=""
                                        class="text-white p-2 px-4 rounded-md bg-[#fb1018] whitespace-nowrap">Session
                                        Dashboard</label>
                                </div>
                                <!-- Table with session details -->
                                <div class="">
                                    <div class="overflow-y-auto md:overflow-y-visible max-h-screen md:max-h-full">
                                        <table class="table-auto w-full border-collapse text-xl">
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
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
