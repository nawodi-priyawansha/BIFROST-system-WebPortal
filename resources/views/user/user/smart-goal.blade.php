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

<body>
    @extends('layout.user-layout')
    @section('user-content')
    <div class="container  bg-slate-50" id="container">
        <div class="mt-24 mx-4">
            <div><span class="text-gray-700">Home / </span>Goal (SMART)</div>
            <div class="flex flex-col gap-0 mt-4">
                <div class="flex  flex-row justify-center w-full">
                    <span class="text-4xl text-center w-[30%] md:w-[40%]"></span>
                    <span class="text-xl text-center w-[20%] md:w-[30%]"></span>
                    <span class="flex text-center w-[30%] md:w-[25%]">Add Goal</span>
                    <span class="flex text-center w-[30%] md:w-[15%]">View Goal</span>
                </div>
                <div class="flex flex-row space-x-4 md:space-y-0 md:space-x-4 w-full mt-8">
                    <span class="md:text-4xl  text-md text-center w-[40%] md:w-[60%]">SMART Goal</span>
                    <span class="md:text-xl text-md flex text-center w-[30%] md:w-[20%] ">+Goal Name</span>
                    <span class="md:text-xl text-md flex text-center w-[30%] md:w-[10%]">Test Goal</span>
                    <span class="md:text-xl text-md flex text-center w-[10%] md:w-[10%] flex-1">progress</span>
                </div>

                <!-- Specific -->
                <div class="flex flex-row  w-full items-center mt-8">
                    <div class="flex items-center md:w-[60%] flex-1">
                        <div class="w-16 h-20 hidden md:flex items-center justify-center md:rounded-tl-full bg-[#CFE8E1]">
                            <img src="{{ asset('img/target.png') }}" alt="Goal Icon" class="w-6 h-6">
                        </div>
                        <div class="hidden md:flex w-20 h-20 text-white text-6xl px-2 items-center justify-center font-bold bg-[#04AE88]">S</div>
                        <div class="w-11/12 md:w-full md:h-20 h-14 bg-[#94DBC3] flex flex-col items-center justify-center md:justify-start md:items-start">
                            <img src="{{ asset('img/target.png') }}" alt="Goal Icon" class="w-8 h-8 md:w-8 md:h-8 md:ml-9 md:hidden">
                            <span class="md:text-xl text-md md:ml-2 md:mt-3"><strong>Specific</strong></span>
                            <div class="ml-2 hidden md:block">
                                <span class="text-sm">The goal must be very specific and grounded in something that's significant to you.</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-16 h-20 hidden md:flex items-center justify-center rounded-tr-full bg-[#94DBC3]"></div>
                    <div class="ml-2 md:ml-5 flex items-center w-[25%]  md:w-[20%]">
                        <input type="text" placeholder="" class="border border-black flex-1 h-14 my-2 w-full">
                    </div>
                    <div class="ml-2 md:ml-5 flex text-center w-[40%] md:w-[20%] h-20 mt-2 md:mt-0">
                        <div class="border border-black flex items-center h-14 my-2 w-full md:w-2/3">
                            <div class="ml-2 mr-2 text-white md:text-4xl text-xs px-2 h-8 w-8 flex items-center justify-center font-bold bg-[#04AE88]">S</div>
                            <div class="text-xs">loose weight</div>
                        </div>
                        <div class="flex items-center h-14 my-2 w-1/3"></div>
                    </div>
                </div>

                <!-- Measurable -->
                <div class="flex flex-row  w-full items-center">
                    <div class="flex items-center md:w-[60%] flex-1">
                        <div class="w-16 h-20 hidden md:flex items-center justify-center bg-[#F8EAC7]">
                            <img src="{{ asset('img/progress.png') }}" alt="Goal Icon" class="w-6 h-6">
                        </div>
                        <div class="hidden md:flex w-20 h-20 text-white text-6xl px-2 items-center justify-center font-bold bg-[#F2C65C]">M</div>
                        <div class="w-11/12 md:w-full md:h-20 h-14 bg-[#F7D895] flex flex-col items-center justify-center md:justify-start md:items-start">
                            <img src="{{ asset('img/progress.png') }}" alt="Goal Icon" class="w-8 h-8 md:w-8 md:h-8 md:ml-9 md:hidden">
                            <span class="md:text-xl text-md md:ml-2 md:mt-3"><strong>Measurable</strong></span>
                            <div class="ml-2 hidden md:block">
                                <span class="text-sm">The goal must have some sort of measurement (days,pounds,miles,etc.).</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-16 h-20 hidden md:flex items-center justify-center  bg-[#F7D895]"></div>
                    <div class="ml-2 md:ml-5 flex items-center w-[25%]  md:w-[20%]">
                        <input type="text" placeholder="" class="border border-black flex-1 h-14 my-2 w-full">
                    </div>
                    <div class="ml-2 md:ml-5 flex text-center w-[40%] md:w-[20%] h-20 mt-2 md:mt-0">
                        <div class="border border-black flex items-center h-14 my-2 w-full md:w-2/3">
                            <div class="ml-2 mr-2 text-white md:text-4xl text-xs px-2 h-8 w-8 flex items-center justify-center font-bold bg-[#F2C65C]">M</div>
                            <div class="text-xs">Kilo lost</div>
                        </div>
                        <div class="flex items-center h-14 my-2 w-1/3"></div>
                    </div>
                </div>

                <!-- Achievable -->
                <div class="flex flex-row  w-full items-center">
                    <div class="flex items-center md:w-[60%] flex-1">
                        <div class="w-16 h-20 hidden md:flex items-center justify-center  bg-[#D8E8F0]">
                            <img src="{{ asset('img/achivement.png') }}" alt="Goal Icon" class="w-6 h-6">
                        </div>
                        <div class="hidden md:flex w-20 h-20 text-white text-6xl px-2 items-center justify-center font-bold bg-[#36B4E6]">A</div>
                        <div class="w-11/12 md:w-full md:h-20 h-14 bg-[#ABD9F3] flex flex-col items-center justify-center md:justify-start md:items-start">
                            <img src="{{ asset('img/achivement.png') }}" alt="Goal Icon" class="w-8 h-8 md:w-8 md:h-8 md:ml-9 md:hidden">
                            <span class="md:text-xl text-md md:ml-2 md:mt-3"><strong>Achievable</strong></span>
                            <div class="ml-2 hidden md:block">
                                <span class="text-sm">The goal must be realistic and reasonable.</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-16 h-20 hidden md:flex items-center justify-center  bg-[#ABD9F3]"></div>
                    <div class="ml-2 md:ml-5 flex items-center w-[25%]  md:w-[20%]">
                        <input type="text" placeholder="" class="border border-black flex-1 h-14 my-2 w-full">
                    </div>
                    <div class="ml-2 md:ml-5 flex text-center w-[40%] md:w-[20%] h-20 mt-2 md:mt-0">
                        <div class="border border-black flex items-center h-14 my-2 w-full md:w-2/3">
                            <div class="ml-2 mr-2 text-white md:text-4xl text-xs px-2 h-8 w-8 flex items-center justify-center font-bold bg-[#36B4E6]">A</div>
                            <div class="text-xs">-10kg</div>
                        </div>
                        <div class="border border-black flex text-center items-center h-14 my-2  w-1/3">
                            {{-- <div class="ml-2 mr-2 text-white md:text-4xl text-xs px-2 h-8 w-8 flex items-center justify-center font-bold"></div> --}}
                            <div class="text-xs ml-2">-1kg</div>
                        </div>
                    </div>
                </div>

                <!-- Relevant -->
                <div class="flex flex-row  w-full items-center">
                    <div class="flex items-center md:w-[60%] flex-1">
                        <div class="w-16 h-20 hidden md:flex items-center justify-center  bg-[#FBD1B1]">
                            <img src="{{ asset('img/human-brain.png') }}" alt="Goal Icon" class="w-6 h-6">
                        </div>
                        <div class="hidden md:flex w-20 h-20 text-white text-6xl px-2 items-center justify-center font-bold bg-[#ED4A28]">R</div>
                        <div class="w-11/12 md:w-full md:h-20 h-14 bg-[#FCBCA1] flex flex-col items-center justify-center md:justify-start md:items-start">
                            <img src="{{ asset('img/human-brain.png') }}" alt="Goal Icon" class="w-8 h-8 md:w-8 md:h-8 md:ml-9 md:hidden">
                            <span class="md:text-xl text-md md:ml-2 md:mt-3"><strong>Relevant</strong></span>
                            <div class="ml-2 hidden md:block">
                                <span class="text-sm">The goal must relate to what you're hoping to accomplish</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-16 h-20 hidden md:flex items-center justify-center bg-[#FCBCA1]"></div>
                    <div class="ml-2 md:ml-5 flex items-center w-[25%]  md:w-[20%]">
                        <input type="text" placeholder="" class="border border-black flex-1 h-14 my-2 w-full">
                    </div>
                    <div class="ml-2 md:ml-5 flex text-center w-[40%] md:w-[20%] h-20 mt-2 md:mt-0">
                        <div class="border border-black flex items-center h-14 my-2 w-full md:w-2/3">
                            <div class="ml-2 mr-2 text-white md:text-4xl text-xs px-2 h-8 w-8 flex items-center justify-center font-bold bg-[#EF492B]">R</div>
                            <div class="text-xs">Better Health</div>
                        </div>
                        <div class="flex items-center h-14 my-2 w-1/3"></div>
                    </div>
                </div>

                <!-- Time-bound -->
                <div class="flex flex-row  w-full items-center">
                    <div class="flex items-center md:w-[60%] flex-1">
                        <div class="w-16 h-20 hidden md:flex items-center justify-center md:rounded-bl-full bg-[#D4DAE6]">
                            <img src="{{ asset('img/clock.png') }}" alt="Goal Icon" class="w-6 h-6">
                        </div>
                        <div class="hidden md:flex w-20 h-20 text-white text-6xl px-2 items-center justify-center font-bold bg-[#481E70]">T</div>
                        <div class="w-11/12 md:w-full md:h-20 h-14 bg-[#D1C5D9] flex flex-col items-center justify-center md:justify-start md:items-start">
                            <img src="{{ asset('img/clock.png') }}" alt="Goal Icon" class="w-8 h-8 md:w-8 md:h-8 md:ml-9 md:hidden">
                            <span class="md:text-xl text-md md:ml-2 md:mt-3"><strong>Time-bound</strong></span>
                            <div class="ml-2 hidden md:block">
                                <span class="text-sm">The goal must have a timeframe and that timeframe must be reasonable.</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-16 h-20 hidden md:flex items-center justify-center rounded-br-full bg-[#D1C5D9]"></div>
                    <div class="ml-2 md:ml-5 flex items-center w-[25%]  md:w-[20%]">
                        <input type="time" placeholder="" class="border border-black flex-1 h-14 my-2 w-full">
                    </div>
                    <div class="ml-2 md:ml-5 flex text-center w-[40%] md:w-[20%] h-20 mt-2 md:mt-0">
                        <div class="border border-black flex items-center h-14 my-2 w-full md:w-2/3">
                            <div class="ml-2 mr-2 text-white md:text-4xl text-xs px-2 h-8 w-8 flex items-center justify-center font-bold bg-[#481E70]">T</div>
                            <div class="text-xs">10 weeks Start 1st June</div>
                        </div>
                        <div class="border border-black flex items-center h-14 my-2  w-1/3">
                            {{-- <div class="mr-2 text-white text-center text-xl px-2 h-10 w-10 flex items-center justify-center font-bold"></div> --}}
                            <div class="text-xs ml-2">200days left</div>
                        </div>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="flex justify-end mt-10 mb-4">
                    <button class="bg-black text-white p-2 px-4 rounded-md">Save</button>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>
