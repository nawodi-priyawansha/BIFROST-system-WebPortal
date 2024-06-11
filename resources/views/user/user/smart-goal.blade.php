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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body class="h-screen">
    @extends('layout.user-layout')
    @section('user-content')
    <div class="container  w-full bg-slate-50" id="container">
            <div class="mt-24 mx-4">
                <div><span class="text-gray-700">Home / </span>Goal (SMART)</div>
                    <div class="flex flex-col gap-0">
                        <div class="flex flex-row justify-center  w-full">
                            <span class="text-4xl text-center w-[40%]"></span>
                            <span class="text-xl text-center w-[25%]"></span>
                            <span class="flex text-center w-[20%]">Add Goal</span>
                            <span class="flex text-center w-[15%]">View Goal</span>
                        </div>
                        <div class="flex flex-row space-x-4 w-full mt-8">
                            <span class="text-4xl text-center w-[60%]">SMART Goal</span>
                            <span class="text-xl text-center w-[20%]">+Goal Name</span>
                            <span class="text-xl text-center w-[10%]">Test Goal</span>
                            <span class="text-xl text-center w-[10%]">progress</span>
                        </div>
                        <!-- Specific -->
                        <div class="flex w-full items-center mt-8">
                            <div class="flex items-center w-[60%]  flex-1">
                                <div class="w-16 h-20 flex items-center justify-center rounded-tl-full bg-[#CFE8E1]">
                                    <img src="{{ asset('img/target.png') }}" alt="Goal Icon" class="w-6 h-6">
                                </div>
                                <div class="w-20 h-20 text-white text-6xl px-2 flex items-center justify-center font-bold bg-[#04AE88]">S</div>
                                <div class="w-full h-20 bg-[#94DBC3]">
                                    <span class="text-xl ml-2"><strong>Specific</strong></span><br>
                                    <div class="ml-2">
                                        <span class="text-sm">The goal must be very specific and grounded in something that's significant to you.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w-16 h-20 flex items-center justify-center rounded-tr-full bg-[#94DBC3]">
                                {{-- <img src="{{ asset('img/target.png') }}" alt="Goal Icon" class="w-6 h-6"> --}}
                            </div>
                            <div class="ml-5 flex items-center w-[20%]">
                                <input type="text" placeholder="" class="border border-black flex-1 h-14 my-2">
                            </div>
                            <div class="ml-5 flex text-center w-[20%] h-20 mt-2">
                                <div class="border border-black flex items-center h-14 my-2 w-2/3">
                                    <div class="ml-2 mr-2 text-white text-4xl px-2 h-10 w-10 flex items-center justify-center font-bold bg-[#04AE88]">S</div>
                                    <div>loose weight</div>
                                </div>
                                <div class="flex items-center h-14 my-2 w-1/3">
                                    {{-- <div class="ml-14 text-sm px-2 h-10 flex items-center">-1kg</div> --}}
                                </div>
                            </div>
                        </div>

                        <!-- Measurable -->
                        <div class="flex w-full items-center">
                            <div class="flex items-center w-[60%] flex-1">
                                <div class="w-16 h-20 flex items-center justify-center bg-[#F6EAC3]">
                                    <img src="{{ asset('img/progress.png') }}" alt="Goal Icon" class="w-6 h-6">
                                </div>
                                <div class="w-20 h-20 text-white text-6xl px-2 flex items-center justify-center font-bold bg-[#F6C653]">A</div>
                                <div class="w-full h-20 bg-[#F7D895]">
                                    <span class="text-xl ml-2"><strong>Measurable:</strong></span><br>
                                    <div class="ml-2">
                                        <span class="text-sm">The goal must have some sort of measurement (days,pounds,miles,etc.).</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w-16 h-20 flex items-center justify-center bg-[#F7D895]">
                                {{-- <img src="{{ asset('img/progress.png') }}" alt="Goal Icon" class="w-6 h-6"> --}}
                            </div>
                            <div class="ml-5 flex items-center w-[20%]">
                                <input type="text" placeholder="" class="border border-black flex-1 h-14 my-2">
                            </div>
                            <div class="ml-5 flex text-center w-[20%] h-20 mt-2">
                                <div class="border border-black flex items-center h-14 my-2 w-2/3">
                                    <div class="ml-2 mr-2 text-white text-4xl px-2 h-10 w-10 flex items-center justify-center font-bold bg-[#F6C653]">M</div>
                                    <div>Kilos lost</div>
                                </div>
                                <div class="flex items-center h-14 my-2 w-1/3">
                                    {{-- <div class="ml-14 text-sm px-2 h-10 flex items-center">-1kg</div> --}}
                                </div>
                            </div>
                        </div>

                        <!-- Achievable -->
                        <div class="flex  w-full items-center">
                            <div class="flex items-center w-[60%] flex-1">
                                <div class="w-16 h-20 flex items-center justify-center bg-[#D3EEF9]">
                                    <img src="{{ asset('img/achivement.png') }}" alt="Goal Icon" class="w-6 h-6">
                                </div>
                                <div class="w-20 h-20 text-white text-6xl px-2 flex items-center justify-center font-bold bg-[#36B4E6]">A</div>
                                <div class="w-full h-20 bg-[#ABD9F3]">
                                    <span class="text-xl ml-2"><strong>Achievable:</strong></span><br>
                                    <div class="ml-2">
                                        <span class="text-sm">The goal must be realistic and reasonable.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w-16 h-20 flex items-center justify-center bg-[#ABD9F3]">
                                {{-- <img src="{{ asset('img/achivement.png') }}" alt="Goal Icon" class="w-6 h-6"> --}}
                            </div>
                            <div class="ml-5 flex items-center w-[20%]">
                                <input type="text" placeholder="" class="border border-black flex-1 h-14 my-2">
                            </div>
                            <div class="ml-5 flex text-center w-[20%] h-20 mt-2">
                                <div class="border border-black flex items-center h-14 my-2 w-2/3">
                                    <div class="ml-2 mr-2 text-white text-4xl px-2 h-10 w-10 flex items-center justify-center font-bold bg-[#36B4E6]">A</div>
                                    <div>-10kg</div>
                                </div>
                                <div class="border border-black flex items-center h-14 my-2 w-1/3">
                                    <div class="ml-2 text-sm px-2 h-10 flex items-center">-1kg</div>
                                </div>
                            </div>
                        </div>

                        <!-- Relevant -->
                        <div class="flex  w-full items-center">
                            <div class="flex items-center w-[60%] flex-1">
                                <div class="w-16 h-20 flex items-center justify-center bg-[#FDC9BD]">
                                    <img src="{{ asset('img/achievement.png') }}" alt="Goal Icon" class="w-6 h-6">
                                </div>
                                <div class="w-20 h-20 text-white text-6xl px-2 flex items-center justify-center font-bold bg-[#EE492D]">R</div>
                                <div class="w-full h-20 bg-[#FABCA7]">
                                    <span class="text-xl ml-2"><strong>Relevant:</strong></span><br>
                                    <div class="ml-2">
                                        <span class="text-sm">The goal must relate to what yor're hoping to accomplish</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w-16 h-20 flex items-center justify-center bg-[#FABCA7]">
                                {{-- <img src="{{ asset('img/achievement.png') }}" alt="Goal Icon" class="w-6 h-6"> --}}
                            </div>
                            <div class="ml-5 flex items-center w-[20%]">
                                <input type="text" placeholder="" class="border border-black flex-1 h-14 my-2">
                            </div>
                            <div class="ml-5 flex text-center w-[20%] h-20 mt-2">
                                <div class="border border-black flex items-center h-14 my-2 w-2/3">
                                    <div class="ml-2 mr-2 text-white text-4xl px-2 h-10 w-10 flex items-center justify-center font-bold bg-[#EE492D]">R</div>
                                    <div>Better Health</div>
                                </div>
                                <div class="flex items-center h-14 my-2 w-1/3">
                                    {{-- <div class="ml-14 text-sm px-2 h-10 flex items-center">-1kg</div> --}}
                                </div>
                            </div>
                        </div>

                        <!-- Time-bound -->
                        <div class="flex w-full items-center">
                            <div class="flex items-center w-[60%] flex-1">
                                <div class="w-16 h-20 flex items-center justify-center bg-[#D9DADD] rounded-bl-full">
                                    <img src="{{ asset('img/clock.png') }}" alt="Goal Icon" class="w-6 h-6">
                                </div>
                                <div class="w-20 h-20 text-white text-6xl px-2 flex items-center justify-center font-bold bg-[#481F6E]">T</div>
                                <div class="w-full h-20 bg-[#D0C5DB] ">
                                    <span class="text-xl ml-2"><strong>Time-bound:</strong></span><br>
                                    <div class="ml-2">
                                        <span class="text-sm">The goal must have a timeframe and that time frame must be reasonable</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w-16 h-20 flex items-center justify-center bg-[#D0C5DB] rounded-br-full">
                                {{-- <img src="{{ asset('img/clock.png') }}" alt="Goal Icon" class="w-6 h-6"> --}}
                            </div>
                            <div class="ml-5 flex items-center w-[20%]">
                                <input type="time" placeholder="" class="border border-black flex-1 h-14 my-2">
                            </div>
                            <div class="ml-5 flex text-center w-[20%] h-20 mt-2">
                                <div class="border border-black flex items-center h-14 my-2 w-2/3">
                                    <div class="ml-2 mr-2 text-white text-4xl px-2 h-10 w-10 flex items-center justify-center font-bold bg-[#481F6E]">T</div>
                                    <div>10 weeks Start 1st June</div>
                                </div>
                                <div class="border border-black flex items-center h-14 my-2 w-1/3">
                                    <div class="text-sm px-2 h-10 flex items-center">200 days left</div>
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
