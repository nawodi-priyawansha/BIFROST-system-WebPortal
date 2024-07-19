<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <title>Document</title>
    <style>
        .w-1\/3 {
            width: 40% !important;
        }
    </style>
</head>

<body>
    @extends('layout.layout')
    @section('content')
        <!-- Main content (Dashboard) -->
        <div class="container transition-width mt-24 flex-grow mx-4" id="container">
            <div class="breadcrumb text-sm mb-4">
                <div><a href="#" class="text-gray-500 no-underline hover:underline">Home</a> / <span><strong> Client
                        </strong></span></div>
                <div class="text-3xl mt-3">Class Manager</div>
            </div>
            <div class="border rounded-b-lg bg-white shadow-md mt-10 text-sm">
                <div>
                    {{-- Tab Names --}}
                    <div class="rounded w-11/12 mx-auto mt-4 mb-4">
                        <!-- Tabs -->
                        <ul id="tabs" class="inline-flex pt-2 px-1 w-full border-black border-b">
                            <li
                                class="tab-item px-4 text-black py-2 rounded-t hover:border-t hover:border-l hover:border-r hover:border-black">
                                <a href="#warmup">Warmup</a>
                            </li>
                            <li class="tab-item px-4 text-black py-2 rounded-t hover:border-t hover:border-l hover:border-r hover:border-black"
                                id="default-tab">
                                <a href="#strength">Strength</a>
                            </li>
                            <li
                                class="tab-item px-4 text-black py-2 rounded-t hover:border-t hover:border-l hover:border-r hover:border-black">
                                <a href="#conditioning">Conditioning</a>
                            </li>
                            <li
                                class="tab-item px-4 text-black py-2 rounded-t hover:border-t hover:border-l hover:border-r hover:border-black">
                                <a href="#weightlifting">Weightlifting</a>
                            </li>
                            <li
                                class="tab-item px-4 text-black py-2 rounded-t hover:border-t hover:border-l hover:border-r hover:border-black">
                                <a href="#Test">Test</a>
                            </li>
                        </ul>
                    </div>

                    {{-- Top Week and year display --}}
                    <div class="flex justify-center text-2xl font-semibold gap-4 mb-6">
                        <p class="cursor-pointer" id="prevWeek">&larr;</p>
                        <h2 id="weekDisplay"></h2>
                        <p class="cursor-pointer" id="nextWeek">&rarr;</p>
                    </div>
                </div>
                <div class="w-full flex mx-4">
                    {{-- side week calender --}}
                    <div class="w-1/4">
                        <div class="flex flex-col text-lg weekday">
                            <button
                                class="border-l border-t border-b border-r border-black w-2/3 px-2 py-3 rounded-t-md text-start hover:bg-black hover:text-white day"
                                id="1day">Day 1</button>
                            <button
                                class="weekday border-l border-t border-b border-r border-black w-2/3 px-2 py-3 text-start hover:bg-black hover:text-white day"
                                id="2day">Day 2</button>
                            <button
                                class="weekday border-l border-t border-b border-r border-black w-2/3 px-2 py-3 text-start hover:bg-black hover:text-white day"
                                id="3day">Day 3</button>
                            <button
                                class="weekday border-l border-t border-b border-r border-black w-2/3 px-2 py-3 text-start hover:bg-black hover-text-white day"
                                id="4day">Day 4</button>
                            <button
                                class="weekday border-l border-t border-b border-r border-black w-2/3 px-2 py-3 text-start hover:bg-black hover-text-white day"
                                id="5day">Day 5</button>
                            <button
                                class="weekday border-l border-t border-b border-r border-black w-2/3 px-2 py-3 text-start hover:bg-black hover-text-white day"
                                id="6day">Day 6</button>
                            <button
                                class="weekday border-l border-t border-b border-r border-black w-2/3 px-2 py-3 rounded-b-md text-start hover:bg-black hover-text-white day"
                                id="7day">Day 7</button>
                        </div>

                    </div>
                    <div class="w-3/4">
                        {{-- edit ui views display --}}
                        <div class="grid grid-cols-2 gap-2 bg-gray-50 mx-4 mr-20">
                            <div>
                                <h2 class="text-center mt-5 text-2xl">Primary Workout</h2>
                                <div id="primary"></div>
                            </div>
                            <div>
                                <h2 class="text-center mt-5 text-2xl">Alternate Workout</h2>
                                <div id="alternate"></div>
                            </div>
                        </div>

                        {{-- new add form view --}}
                        <form action="{{ route('clients.store') }}" method="POST">
                            @csrf
                            <div id="not-test" style="display:none;">
                                <div id="block-container" class="flex flex-col text-lg p-4  mr-8 rounded-md gap-4">
                                    <div class="ui-block flex flex-col text-lg p-4 bg-gray-50 mr-8 rounded-md gap-4 mb-4 ">
                                        <!-- Your UI block content here -->

                                        <div class="flex gap-5 justify-between">
                                            <div class="flex-col w-full ">
                                                <div class="flex items-center border-b">
                                                    <label for="category" class="w-60 block mb-1">Category <span
                                                            class="text-red-500">*</span></label>
                                                    <select id="category" name="category" onchange="getworkout(this)"
                                                        class="w-1/3 px-3 py-2 border flex rounded mb-2">
                                                        <option value="" selected disabled>-- Select Category --
                                                        </option>
                                                    </select>
                                                    <!-- This element will push the button to the right -->

                                                </div>
                                                <div class="flex items-center border-b">
                                                    <label for="workout" class="w-60 block mb-1">Workout <span
                                                            class="text-red-500">*</span></label>
                                                    <select id="workout" name="workout"
                                                        class="w-1/3 px-3 py-2 border flex rounded mb-2">
                                                        <option value="" selected disabled>-- Select Workout --
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="flex items-center border-b">
                                                    <label for="custom-number" class="w-60 block mb-1">SETS <span
                                                            class="text-red-500">*</span></label>
                                                    <div class="relative flex items-center max-w-[8rem]">
                                                        <button type="button"
                                                            class="decrement-custom bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                            <svg class="w-3 h-3 text-gray-900 dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 18 2">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M1 1h16" />
                                                            </svg>
                                                        </button>
                                                        <input type="text" id="sets" name="sets"
                                                            data-input-counter
                                                            class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                                            placeholder="0" readonly />
                                                        <button type="button"
                                                            class="increment-custom bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                            <svg class="w-3 h-3 text-gray-900 dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 18 18">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M9 1v16M1 9h16" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="flex items-center border-b">
                                                    <label for="reps" class="w-60 block mb-1">REPS <span
                                                            class="text-red-500">*</span></label>
                                                    <div class="relative flex items-center max-w-[8rem]">
                                                        <button type="button"
                                                            class="decrement-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                            <svg class="w-3 h-3 text-gray-900 dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 18 2">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M1 1h16" />
                                                            </svg>
                                                        </button>
                                                        <input type="text" id="reps" name="reps"
                                                            data-input-counter
                                                            class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                                            placeholder="0" readonly />
                                                        <button type="button"
                                                            class="increment-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                            <svg class="w-3 h-3 text-gray-900 dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 18 18">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M9 1v16M1 9h16" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="flex items-center border-b">
                                                    <label for="rest" class="w-60 block mb-1">Rest <span
                                                            class="text-red-500">*</span></label>
                                                    <div class="relative flex items-center max-w-[8rem]">
                                                        <button type="button"
                                                            class="decrement-rest bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                            <svg class="w-3 h-3 text-gray-900 dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 18 2">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M1 1h16" />
                                                            </svg>
                                                        </button>
                                                        <input type="text" id="rest" name="rest"
                                                            placeholder="00:00"
                                                            class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                                            readonly>
                                                        <button type="button"
                                                            class="increment-rest bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                            <svg class="w-3 h-3 text-gray-900 dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 18 18">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M9 1v16M1 9h16" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="flex items-center border-b">
                                                    <label for="intensity" class="w-60 block mb-1">Intensity <span
                                                            class="text-red-500">*</span></label>
                                                    <select id="intensity" name="intensity"
                                                        class="w-1/3 px-3 py-2 border flex rounded mb-2">
                                                        <option value=""selected disabled>-- Select Intensity --
                                                        </option>
                                                        <option value="low">Low</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="high">High</option>
                                                        <option value="extreme">Extreme</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="flex-col w-full">
                                                <div class="flex items-center border-b">
                                                    <label for="alt-category" class="w-60 block mb-1">Category <span
                                                            class="text-red-500">*</span></label>
                                                    <select id="alt-category" name="alt-category"
                                                        onchange="getworkout(this)"
                                                        class="w-1/3 px-3 py-2 border flex rounded mb-2">
                                                        <option value="" selected disabled>-- Select Category --
                                                        </option>
                                                    </select>
                                                    <!-- This element will push the button to the right -->
                                                </div>
                                                <div class="flex items-center border-b">
                                                    <label for="alt-workout" class="w-60 block mb-1">Workout <span
                                                            class="text-red-500">*</span></label>
                                                    <select id="alt-workout" name="alt-workout"
                                                        class="w-1/3 px-3 py-2 border flex rounded mb-2">
                                                        <option value="" selected disabled>-- Select Workout --
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="flex items-center border-b">
                                                    <label for="alt-sets" class="w-60 block mb-1">SETS <span
                                                            class="text-red-500">*</span></label>
                                                    <div class="relative flex items-center max-w-[8rem]">
                                                        <button type="button"
                                                            class="decrement-custom bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                            <svg class="w-3 h-3 text-gray-900 dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 18 2">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M1 1h16" />
                                                            </svg>
                                                        </button>
                                                        <input type="text" id="alt-sets" name="alt-sets"
                                                            data-input-counter
                                                            class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                                            placeholder="0" readonly />
                                                        <button type="button"
                                                            class="increment-custom bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                            <svg class="w-3 h-3 text-gray-900 dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 18 18">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M9 1v16M1 9h16" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="flex items-center border-b">
                                                    <label for="alt-reps" class="w-60 block mb-1">REPS <span
                                                            class="text-red-500">*</span></label>
                                                    <div class="relative flex items-center max-w-[8rem]">
                                                        <button type="button"
                                                            class="decrement-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                            <svg class="w-3 h-3 text-gray-900 dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 18 2">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M1 1h16" />
                                                            </svg>
                                                        </button>
                                                        <input type="text" id="alt-reps" name="alt-reps"
                                                            data-input-counter
                                                            class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                                            placeholder="0" readonly />
                                                        <button type="button"
                                                            class="increment-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                            <svg class="w-3 h-3 text-gray-900 dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 18 18">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M9 1v16M1 9h16" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="flex items-center border-b">
                                                    <label for="alt-rest" class="w-60 block mb-1">Rest <span
                                                            class="text-red-500">*</span></label>
                                                    <div class="relative flex items-center max-w-[8rem]">
                                                        <button type="button"
                                                            class="decrement-rest bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                            <svg class="w-3 h-3 text-gray-900 dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 18 2">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M1 1h16" />
                                                            </svg>
                                                        </button>
                                                        <input type="text" id="alt-rest" name="alt-rest"
                                                            placeholder="00:00"
                                                            class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                                            readonly>
                                                        <button type="button"
                                                            class="increment-rest bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                            <svg class="w-3 h-3 text-gray-900 dark:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 18 18">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M9 1v16M1 9h16" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="flex items-center border-b">
                                                    <label for="alt-intensity" class="w-60 block mb-1">Intensity <span
                                                            class="text-red-500">*</span></label>
                                                    <select id="alt-intensity" name="alt-intensity"
                                                        class="w-1/3 px-3 py-2 border flex rounded mb-2">
                                                        <option value="" selected disabled>-- Select Intensity --
                                                        </option>
                                                        <option value="low">Low</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="high">High</option>
                                                        <option value="extreme">Extreme</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="flex items-center border-b">
                                    <label for="intensity" class="w-60 block mb-1"></label>

                                    <div class="flex items-center justify-between">
                                        @if ($accessType == 'write')
                                            <button type="button" id="add-another"
                                                class="bg-black text-white py-2 px-4 rounded mb-2 mx-8 text-base">+
                                                Another</button>
                                        @else
                                            <button type="button" id="add-another"
                                                class="bg-black text-white py-2 px-4 rounded mb-2 mx-8 text-base"disabled>+
                                                Another</button>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div id="test" style="display:none;">Test</div>
                            {{-- hidden input field --}}
                            <input type="text" name="selectdate" id="selectdate" hidden>
                            <input type="text" name="selecttab" id="selecttab" hidden>


                            {{-- UI duplicate function --}}
                            <script>
                                let blockIndex = 1;

                                document.getElementById('add-another').addEventListener('click', function() {
                                    addNewBlock();
                                });

                                function addNewBlock() {
                                    // Clone the UI block
                                    var uiBlock = document.querySelector('.ui-block').cloneNode(true);

                                    // Clear input values and update IDs and names
                                    blockIndex++;
                                    uiBlock.querySelectorAll('input, select, button').forEach(input => {
                                        input.value = '';
                                        if (input.id) {
                                            input.id = input.id.split('_')[0] + '_' + blockIndex;
                                        }
                                        if (input.name) {
                                            input.name = input.name.split('_')[0] + '_' + blockIndex;
                                        }
                                    });

                                    // Add remove button to the new block
                                    var removeBtn = document.createElement('button');
                                    removeBtn.setAttribute('type', 'button');
                                    removeBtn.classList.add('bg-[#FB1018]', 'text-white', 'py-2', 'px-4', 'rounded', 'mb-2', 'remove-btn', 'w-24',
                                        'flex-shrink-0');
                                    removeBtn.textContent = 'Remove';
                                    removeBtn.addEventListener('click', function() {
                                        uiBlock.remove();
                                    });
                                    uiBlock.appendChild(removeBtn);

                                    // Append the cloned block to the container
                                    document.getElementById('block-container').appendChild(uiBlock);

                                    // Attach event listeners to the new increment and decrement buttons
                                    uiBlock.querySelectorAll('.decrement-reps').forEach(button => {
                                        button.addEventListener('click', function() {
                                            updateCounter(this, 'decrement');
                                        });
                                    });
                                    uiBlock.querySelectorAll('.increment-reps').forEach(button => {
                                        button.addEventListener('click', function() {
                                            updateCounter(this, 'increment');
                                        });
                                    });
                                    uiBlock.querySelectorAll('.decrement-custom').forEach(button => {
                                        button.addEventListener('click', function() {
                                            updateCustomCounter(this, 'decrement');
                                        });
                                    });
                                    uiBlock.querySelectorAll('.increment-custom').forEach(button => {
                                        button.addEventListener('click', function() {
                                            updateCustomCounter(this, 'increment');
                                        });
                                    });
                                    uiBlock.querySelectorAll('.decrement-rest').forEach(button => {
                                        button.addEventListener('click', function() {
                                            updaterestCounter(this, 'decrement');
                                        });
                                    });
                                    uiBlock.querySelectorAll('.increment-rest').forEach(button => {
                                        button.addEventListener('click', function() {
                                            updaterestCounter(this, 'increment');
                                        });
                                    });
                                }

                                function updateCounter(button, action) {
                                    const input = button.parentElement.querySelector('input');
                                    let currentValue = parseInt(input.value, 10);
                                    if (isNaN(currentValue)) {
                                        currentValue = 0;
                                    }
                                    if (action === 'increment') {
                                        input.value = currentValue + 1;
                                    } else if (action === 'decrement') {
                                        input.value = Math.max(0, currentValue - 1); // Ensure the value does not go below 0
                                    }
                                }

                                function updateCustomCounter(button, action) {
                                    const input = button.parentElement.querySelector('input');
                                    let currentValue = parseInt(input.value, 10);
                                    if (isNaN(currentValue)) {
                                        currentValue = 0;
                                    }
                                    if (action === 'increment') {
                                        input.value = currentValue + 1;
                                    } else if (action === 'decrement') {
                                        input.value = Math.max(0, currentValue - 1); // Ensure the value does not go below 0
                                    }
                                }

                                function updaterestCounter(button, action) {
                                    const input = button.parentElement.querySelector('input');
                                    let currentValue = parseInt(input.value.replace(':', ''), 10);
                                    if (isNaN(currentValue)) {
                                        currentValue = 0;
                                    }

                                    // Convert current value to minutes
                                    let totalMinutes = Math.floor(currentValue / 100) * 60 + (currentValue % 100);

                                    if (action === 'increment') {
                                        totalMinutes += 15;
                                    } else if (action === 'decrement') {
                                        totalMinutes = Math.max(0, totalMinutes - 15); // Ensure the value does not go below 0
                                    }

                                    // Convert total minutes back to hours and minutes
                                    const hours = Math.floor(totalMinutes / 60);
                                    const minutes = totalMinutes % 60;

                                    // Format the time as hh:mm
                                    const formattedTime = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}`;

                                    input.value = formattedTime;
                                }


                                // Attach event listeners to the initial increment and decrement buttons
                                document.querySelectorAll('.decrement-reps').forEach(button => {
                                    button.addEventListener('click', function() {
                                        updateCounter(this, 'decrement');
                                    });
                                });
                                document.querySelectorAll('.increment-reps').forEach(button => {
                                    button.addEventListener('click', function() {
                                        updateCounter(this, 'increment');
                                    });
                                });
                                document.querySelectorAll('.decrement-custom').forEach(button => {
                                    button.addEventListener('click', function() {
                                        updateCustomCounter(this, 'decrement');
                                    });
                                });
                                document.querySelectorAll('.increment-custom').forEach(button => {
                                    button.addEventListener('click', function() {
                                        updateCustomCounter(this, 'increment');
                                    });
                                });
                                document.querySelectorAll('.decrement-rest').forEach(button => {
                                    button.addEventListener('click', function() {
                                        updaterestCounter(this, 'decrement');
                                    });
                                });
                                document.querySelectorAll('.increment-rest').forEach(button => {
                                    button.addEventListener('click', function() {
                                        updaterestCounter(this, 'increment');
                                    });
                                });


                                //  Workout value get
                                function getworkout(selectElement) {
                                    const selecttab = document.getElementById('selecttab');
                                    const tab = selecttab.value;
                                    // checkTab(tab);
                                    const selectId = selectElement.value; // Get the value of the selected element

                                    const elementId = selectElement.id; // Get the ID of the selected element
                                    const lastChar = elementId.slice(-1); // Last character of the element ID
                                    const firstThreeChars = elementId.slice(0, 3); // First three characters of the element ID

                                    $.ajax({
                                        url: "/get-workout",
                                        type: "POST",
                                        data: {
                                            tab: tab,
                                            id: selectId,
                                            _token: $('meta[name="csrf-token"]').attr('content')
                                        },
                                        success: function(response) {

                                            if (!isNaN(lastChar)) {

                                                if (firstThreeChars === "alt") {
                                                    clearOptions(`alt-workout_${lastChar}`);
                                                    response.workouts.forEach(workout => {
                                                        setWorkout(`alt-workout_${lastChar}`, workout.id, workout.workout);
                                                    });
                                                } else {
                                                    clearOptions(`workout_${lastChar}`);
                                                    response.workouts.forEach(workout => {
                                                        setWorkout(`workout_${lastChar}`, workout.id, workout.workout);
                                                    });
                                                }

                                            } else {

                                                if (firstThreeChars === "alt") {
                                                    clearOptions('alt-workout');
                                                    response.workouts.forEach(workout => {
                                                        setWorkout('alt-workout', workout.id, workout.workout);
                                                    });
                                                } else {
                                                    clearOptions('workout');
                                                    response.workouts.forEach(workout => {
                                                        setWorkout('workout', workout.id, workout.workout);
                                                    });
                                                }
                                            }
                                        },
                                        error: function(xhr, status, error) {
                                            console.error(error);
                                        },
                                    });
                                }

                                // Workout value set
                                function setWorkout(identifier, id, workout) {

                                    const selectElement = document.getElementById(identifier);

                                    // Create a new option element
                                    const option = document.createElement('option');

                                    // Set the value and text content of the option element
                                    option.value = id;
                                    option.textContent = workout;

                                    // Append the option to the select element
                                    selectElement.appendChild(option);
                                }

                                // clear workout
                                function clearOptions(identifier) {
                                    const selectElement = document.getElementById(identifier);

                                    // Clear existing options first
                                    selectElement.innerHTML = '<option value="" selected disabled>-- Select Workout --</option>';
                                }
                            </script>

                            <div class="flex mt-12">
                                @if ($accessType == 'write')
                                    <button type="submit"
                                        class="bg-[#FB1018] text-white py-2 px-4 rounded mb-2 hover:bg-red-700">Save</button>
                                @else
                                    <button type="submit"
                                        class="bg-[#FB1018] text-white py-2 px-4 rounded mb-2 hover:bg-red-700"
                                        disabled>Save</button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    @endsection

    {{-- Date Script --}}
    <script>
        // Initialize variables
        let currentDate = new Date();
        let dayOfWeek = currentDate.getDay(); // Get the current day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
        // let selectedDate = "1day"; // Set default date to "1day"
        let selectedDate;
        let selectedTab = null;
        // Map the dayOfWeek to the corresponding selectedDate value
        switch (dayOfWeek) {
            case 0:
                selectedDate = "7day"; // Sunday
                break;
            case 1:
                selectedDate = "1day"; // Monday
                break;
            case 2:
                selectedDate = "2day"; // Tuesday
                break;
            case 3:
                selectedDate = "3day"; // Wednesday
                break;
            case 4:
                selectedDate = "4day"; // Thursday
                break;
            case 5:
                selectedDate = "5day"; // Friday
                break;
            case 6:
                selectedDate = "6day"; // Saturday
                break;
            default:
                selectedDate = "1day"; // Default to Monday if something goes wrong
        }

        // When the document content is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Update the week and dates display
            updateWeekAndDates();

            // Event listener for previous week button
            document.getElementById('prevWeek').addEventListener('click', function(event) {
                event.preventDefault();
                changeWeek(-1); // Change to previous week
            });

            // Event listener for next week button
            document.getElementById('nextWeek').addEventListener('click', function(event) {
                event.preventDefault();
                changeWeek(1); // Change to next week
            });

            // Event listeners for tab toggling
            let tabsContainer = document.querySelector("#tabs");
            let tabTogglers = tabsContainer.querySelectorAll("a");
            tabTogglers.forEach(function(toggler, index) {
                toggler.addEventListener("click", function(e) {
                    e.preventDefault();
                    let tabName = this.getAttribute("href");
                    selectedTab = tabName;
                    changeui(selectedTab, selectedDate);
                    date = document.getElementById(selectedDate);

                    // getcategory function call page load and change tab
                    getCategory(selectedTab);
                });

                // Activate default tab
                if (index === 0) {
                    toggler.click();
                }
            });

            // Event listeners for date selection
            let dateLinks = document.querySelectorAll(".day");
            dateLinks.forEach(function(link) {
                link.addEventListener("click", function(e) {
                    e.preventDefault();
                    let dateId = this.getAttribute("id");
                    selectedDate = dateId;
                    changeui(selectedTab, selectedDate);
                });
            });

            // Default select Current day
            document.getElementById(selectedDate).click();
        });

        // Function to change the week
        function changeWeek(weekChange) {
            currentDate.setDate(currentDate.getDate() + weekChange * 7);
            updateWeekAndDates();
            logSelection(selectedTab, selectedDate);
        }

        // Function to update the week and dates display
        function updateWeekAndDates() {
            const currentYear = currentDate.getFullYear();
            const weekNumber = getWeekNumber(currentDate);

            // Set week number and year
            document.getElementById('weekDisplay').innerText = `Week ${weekNumber} - ${currentYear}`;

            // Get the start date of the current week (Monday)
            const firstDayOfWeek = getStartOfWeek(currentDate);

            // Populate dates for the current week
            for (let i = 0; i < 7; i++) {
                const dayDate = new Date(firstDayOfWeek);
                dayDate.setDate(firstDayOfWeek.getDate() + i);

                const dayElement = document.getElementById(`${i + 1}day`);
                dayElement.innerText = `${formatDate(dayDate)} ${getDayName(dayDate)}`;
                dayElement.value = `${formatDate(dayDate)} ${getDayName(dayDate)}`;
            }
        }

        // Function to get the week number
        function getWeekNumber(date) {
            const startOfYear = new Date(date.getFullYear(), 0, 1);
            const pastDaysOfYear = (date - startOfYear) / 86400000 + startOfYear.getDay() + 1;
            return Math.ceil(pastDaysOfYear / 7);
        }

        // Function to get the start of the week
        function getStartOfWeek(date) {
            const day = date.getDay();
            const diff = date.getDate() - day + (day === 0 ? -6 : 1); // adjust when day is Sunday
            return new Date(date.setDate(diff));
        }

        // Function to format the date
        function formatDate(date) {
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = String(date.getFullYear()).slice(-2);
            return `${day}/${month}/${year}`;
        }

        // Function to get the day name
        function getDayName(date) {
            const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            return days[date.getDay()];
        }

        // set hidden input fields to values (use data store)
        function logSelection(tabId, dayId) {
            let tabName = document.querySelector(`#tabs a[href="${tabId}"]`).innerText;
            let dayName = document.getElementById(dayId).innerText;

            // hidden input field set value
            const selectdate = document.getElementById('selectdate');
            selectdate.value = dayName;
            const selecttab = document.getElementById('selecttab');
            selecttab.value = tabName;
            checkTab(tabName)
            getValues(dayName, tabName);
            // call ajax 
            // getdata(tabName, dayName)
        }

        function checkTab(value) {
            const selectTab = value;
            const notTestDiv = document.getElementById('not-test');
            const testDiv = document.getElementById('test');

            const categoryInput = document.getElementById('category');
            const workoutInput = document.getElementById('workout');
            const setsInput = document.getElementById('sets');
            const repsInput = document.getElementById('reps');
            const restInput = document.getElementById('rest');
            const intensityInput = document.getElementById('intensity');
            const altcategoryInput = document.getElementById('alt-category');
            const altworkoutInput = document.getElementById('alt-workout');
            const altsetsInput = document.getElementById('alt-sets');
            const altrepsInput = document.getElementById('alt-reps');
            const altrestInput = document.getElementById('alt-rest');
            const altintensityInput = document.getElementById('alt-intensity');


            if (selectTab !== 'Test') {
                notTestDiv.style.display = 'block';
                testDiv.style.display = 'none';
                // Set required to true
                categoryInput.required = true;
                workoutInput.required = true;
                setsInput.required = true;
                repsInput.required = true;
                restInput.required = true;
                intensityInput.required = true;
                altcategoryInput.required = true;
                altworkoutInput.required = true;
                altsetsInput.required = true;
                altrepsInput.required = true;
                altrestInput.required = true;
                altintensityInput.required = true;
            } else {
                notTestDiv.style.display = 'none';
                testDiv.style.display = 'block';
                // Set required to false
                categoryInput.required = false;
                workoutInput.required = false;
                setsInput.required = false;
                repsInput.required = false;
                restInput.required = false;
                intensityInput.required = false;
                altcategoryInput.required = false;
                altworkoutInput.required = false;
                altsetsInput.required = false;
                altrepsInput.required = false;
                altrestInput.required = false;
                altintensityInput.required = false;
            }
        }
        // Function to change the UI based on selected tab and date
        function changeui(tabName, selectedDate) {
            // set hiden fields to value
            // setHiddenData(tabName,selectedDate);
            let tabTogglers = document.querySelectorAll("#tabs a");

            // Remove active styles from all tabs
            tabTogglers.forEach(function(toggler) {
                toggler.parentElement.classList.remove("border-t", "border-r", "border-l", "-mb-px", "bg-white",
                    "border-black");
            });

            // Add active styles to the clicked tab
            let toggler = document.querySelector(`#tabs a[href="${tabName}"]`);
            toggler.parentElement.classList.add("border-t", "border-r", "border-l", "-mb-px", "bg-white", "border-black");

            // Remove active styles from all date links
            let dateLinks = document.querySelectorAll(".day");
            dateLinks.forEach(function(link) {
                link.classList.add("hover:bg-black", "hover:text-white", "border-r");
            });

            // Add active styles to the selected date link
            let selectedDateElement = document.getElementById(selectedDate);
            selectedDateElement.classList.remove("hover:bg-black", "hover:text-white", "border-r");
            // Log selected tab and date
            logSelection(tabName, selectedDate);
        }

        function increment(inputId) {
            const inputElement = document.getElementById(inputId);

            if (inputId.startsWith('rest_')) {
                updateTime(inputId, 'increment');
            } else {
                let currentValue = parseInt(inputElement.value) || 0;
                inputElement.value = currentValue + 1;
            }
        }

        function decrement(inputId) {
            const inputElement = document.getElementById(inputId);

            if (inputId.startsWith('rest_')) {
                updateTime(inputId, 'decrement');
            } else {
                let currentValue = parseInt(inputElement.value) || 0;
                if (currentValue > 0) {
                    inputElement.value = currentValue - 1;
                }
            }
        }

        function updateTime(inputId, action) {
            const inputElement = document.getElementById(inputId);
            let currentValue = inputElement.value || '00:00';

            // Extract hours and minutes from the current value
            let [hours, minutes] = currentValue.split(':').map(num => parseInt(num, 10));
            if (isNaN(hours)) hours = 0;
            if (isNaN(minutes)) minutes = 0;

            // Convert current value to minutes
            let totalMinutes = hours * 60 + minutes;

            // Adjust minutes based on action
            if (action === 'increment') {
                totalMinutes += 15;
            } else if (action === 'decrement') {
                totalMinutes = Math.max(0, totalMinutes - 15); // Ensure the value does not go below 0
            }

            // Convert total minutes back to hours and minutes
            const newHours = Math.floor(totalMinutes / 60);
            const newMinutes = totalMinutes % 60;

            // Format the time as hh:mm
            const formattedTime = `${String(newHours).padStart(2, '0')}:${String(newMinutes).padStart(2, '0')}`;

            // Update the input value
            inputElement.value = formattedTime;
        }
        // Workout value set write function ---> getworkout(selectElement)

        // Get Category
        function getCategory(selectedTab) {
            const selectTab = selectedTab.replace(/^#/, '');
            // Set the value of the hidden input element with id "selecttab"
            document.getElementById('selecttab').value = selectTab;

            $.ajax({
                url: "/getCategory",
                type: "POST",
                data: {
                    tab: selectTab,
                    _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                },
                success: function(response) {

                    // Extract the category_options array from the response
                    const categoryOptions = response.category_options || [];

                    // Clear existing options in both select elements before adding new ones
                    const categorySelect = document.getElementById('category');
                    const altCategorySelect = document.getElementById('alt-category');

                    // Clear old options
                    categorySelect.innerHTML =
                        '<option value="" selected disabled>-- Select Category --</option>';
                    altCategorySelect.innerHTML =
                        '<option value="" selected disabled>-- Select Category --</option>';

                    // Loop through each category_option and call the setCategory() function
                    categoryOptions.forEach(option => {
                        setCategory(option.id, option.category_name);
                    });

                    // Optional: Sort the options alphabetically if needed
                    sortSelectOptions(categorySelect);
                    sortSelectOptions(altCategorySelect);
                },
                error: function(xhr, status, error) {
                    console.error(error); // Handle error
                },
            });
        }

        function sortSelectOptions(selectElement) {
            const options = Array.from(selectElement.options);
            options.sort((a, b) => a.text.localeCompare(b.text));
            selectElement.innerHTML = '';
            options.forEach(option => selectElement.add(option));
        }

        // Set category select options
        function setCategory(id, categoryName) {
            // Add the category to the 'category' select element
            const categorySelect = document.getElementById('category');
            const newOption = document.createElement('option');
            newOption.value = id;
            newOption.textContent = categoryName;
            categorySelect.appendChild(newOption);

            // Add the category to the 'alt-category' select element
            const altCategorySelect = document.getElementById('alt-category');
            const altNewOption = document.createElement('option');
            altNewOption.value = id;
            altNewOption.textContent = categoryName;
            altCategorySelect.appendChild(altNewOption);

            // Optional: If you want to add a default option for the 'alt-category' if it's empty
            if (altCategorySelect.options.length === 1) {
                altCategorySelect.insertAdjacentHTML('beforeend',
                    '<option value="" disabled>-- Select Category --</option>');
            }
        }

        // Get data
        function getValues(dayName, tabName) {
            console.log(dayName);
            console.log(tabName);

            $.ajax({
                url: "/class-manager",
                type: "POST",
                data: {
                    tab: tabName,
                    date: dayName,
                    _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                },
                success: function(response) {
                    console.log(response);
                    populateWorkouts(response.workouts, response.details);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                },
            });
        }

        // already uploard data view
        function populateWorkouts(workouts, details) {
            console.log(workouts);
            var categorySelect = $('#category');
            categorySelect.empty();
            categorySelect.append('<option value="" selected disabled>-- Select Category --</option>');

            workouts.forEach(function(workouts) {
                if (workouts.category_option) {
                    categorySelect.append('<option value="' + workouts.category_option.id + '">' + workouts
                        .category_option.category_name + '</option>');
                }
            });

            if (details.length === 0) {
                var div = document.getElementById("primary");
                div.innerHTML = ''; // Clear existing content
                var div = document.getElementById("alternate");
                div.innerHTML = ''; // Clear existing content
            } else {
                var div = document.getElementById("primary");
                div.innerHTML = ''; // Clear existing content
                var div = document.getElementById("alternate");
                div.innerHTML = ''; // Clear existing content

                details.forEach(function(detail) {
                    var primaryDetail = document.createElement("div");
                    var alternateDetail = document.createElement("div");
                    var pcontent = '';
                    var acontent = '';

                    if (detail.type === "primary") {
                        pcontent = `
                            <div class="">
                                <form action="{{ route('clients.update') }}" method="POST">
                                    @csrf
                                    <div class="flex flex-col text-lg p-4 mr-8 rounded-md gap-4">
                                        <div class="flex flex-col text-lg bg-gray-50 mr-8 rounded-md gap-4 mb-4">
                                            <input type="hidden" name="detail_id_${detail.id}" id="detail_id_${detail.id}" value="${detail.id}">
                                        </div>
                                        <div class="flex items-center border-b">
                                            <label for="category_${detail.id}" class="w-60 block mb-1">Category <span class="text-red-500">*</span></label>
                                            <select id="category_${detail.id}" name="category_${detail.id}" onchange="getworkout(this)" class="w-1/3 px-3 py-2 border flex rounded mb-2" required>
                                                <option value="${detail.workouts.category_option.id}" selected hidden>${detail.workouts.category_option.category_name}</option>
                                                ${workouts.map(workout => `<option value="${workout.category_option.id}">${workout.category_option.category_name}</option>`).join('')}
                                            </select>
                                            <div class="flex-grow"></div>
                                            @if ($accessType == 'write')
                                                <button type="submit" class="bg-black text-white py-2 px-4 rounded mb-2">Edit</button>
                                            @else
                                                <button type="submit" class="bg-black text-white py-2 px-4 rounded mb-2"disabled>Edit</button>
                                            @endif
                                        </div>
                                        <div class="flex items-center border-b">
                                            <label for="workout_${detail.id}" class="w-60 block mb-1">Workout <span class="text-red-500">*</span></label>
                                            <select id="workout_${detail.id}" name="workout_${detail.id}" class="w-1/3 px-3 py-2 border flex rounded mb-2" required>
                                                <option value="${detail.workouts.id}" selected>${detail.workouts.workout}</option>
                                            </select>
                                        </div>
                                        <div class="flex items-center border-b">
                                            <label for="sets_${detail.id}" class="w-60 block mb-1">SETS <span class="text-red-500">*</span></label>
                                            <div class="relative flex items-center max-w-[8rem]">
                                                <button type="button" class="decrement-sets bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none" onclick="decrement('sets_input_${detail.id}')">
                                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                                    </svg>
                                                </button>
                                                <input type="text" id="sets_input_${detail.id}" name="sets_${detail.id}" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none" placeholder="0" value="${detail.sets}" required readonly/>
                                                <button type="button" class="increment-sets bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none" onclick="increment('sets_input_${detail.id}')">
                                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="flex items-center border-b">
                                            <label for="reps_${detail.id}" class="w-60 block mb-1">REPS <span class="text-red-500">*</span></label>
                                            <div class="relative flex items-center max-w-[8rem]">
                                                <button type="button" class="decrement-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none" onclick="decrement('reps_input_${detail.id}')">
                                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                                    </svg>
                                                </button>
                                                <input type="text" id="reps_input_${detail.id}" name="reps_${detail.id}" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none" placeholder="0" value="${detail.reps}" required readonly/>
                                                <button type="button" class="increment-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none" onclick="increment('reps_input_${detail.id}')">
                                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="flex items-center border-b">
                                            <label for="rest_${detail.id}" class="w-60 block mb-1">Rest <span class="text-red-500">*</span></label>
                                            <div class="relative flex items-center max-w-[8rem]">
                                                <button type="button" onclick="decrement('rest_${detail.id}')" class="decrement-rest bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                                    </svg>
                                                </button>
                                                <input type="text" id="rest_${detail.id}" name="rest_${detail.id}" value="${detail.rest}" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none" required readonly>
                                                <button type="button" onclick="increment('rest_${detail.id}')" class="increment-rest bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="flex items-center border-b">
                                            <label for="intensity_${detail.id}" class="w-60 block mb-1">Intensity <span class="text-red-500">*</span></label>
                                            <select id="intensity_${detail.id}" name="intensity_${detail.id}" class="w-1/3 px-3 py-2 border flex rounded mb-2" required>
                                                <option value="low" ${detail.intensity === 'low' ? 'selected' : ''}>low</option>
                                                <option value="moderate" ${detail.intensity === 'medium' ? 'selected' : ''}>medium</option>
                                                <option value="high" ${detail.intensity === 'high' ? 'selected' : ''}>High</option>
                                                <option value="high" ${detail.intensity === 'extreme' ? 'selected' : ''}>extreme</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>`;
                    } else if (detail.type === "alternate") {
                        acontent = `
                            <div class="">
                                <form action="{{ route('clients.update') }}" method="POST">
                                    @csrf
                                    <div class="flex flex-col text-lg p-4 mr-8 rounded-md gap-4">
                                        <div class="flex flex-col text-lg bg-gray-50 mr-8 rounded-md gap-4 mb-4">
                                            <input type="hidden" name="detail_id_${detail.id}" id="detail_id_${detail.id}" value="${detail.id}">
                                        </div>
                                        <div class="flex items-center border-b">
                                            <label for="category_${detail.id}" class="w-60 block mb-1">Category <span class="text-red-500">*</span></label>
                                            <select id="category_${detail.id}" name="category_${detail.id}" onchange="getworkout(this)" class="w-1/3 px-3 py-2 border flex rounded mb-2" required>
                                                <option value="${detail.workouts.category_option.id}" selected hidden>${detail.workouts.category_option.category_name}</option>
                                                ${workouts.map(workout => `<option value="${workout.category_option.id}">${workout.category_option.category_name}</option>`).join('')}
                                            </select>
                                            <div class="flex-grow"></div>
                                            @if ($accessType == 'write')
                                                <button type="submit" class="bg-black text-white py-2 px-4 rounded mb-2">Edit</button>
                                            @else
                                                <button type="submit" class="bg-black text-white py-2 px-4 rounded mb-2"disabled>Edit</button>
                                            @endif
                                        </div>
                                        <div class="flex items-center border-b">
                                            <label for="workout_${detail.id}" class="w-60 block mb-1">Workout <span class="text-red-500">*</span></label>
                                            <select id="workout_${detail.id}" name="workout_${detail.id}" class="w-1/3 px-3 py-2 border flex rounded mb-2" required>
                                                <option value="${detail.workouts.id}" selected>${detail.workouts.workout}</option>
                                            </select>
                                        </div>
                                        <div class="flex items-center border-b">
                                            <label for="sets_${detail.id}" class="w-60 block mb-1">SETS <span class="text-red-500">*</span></label>
                                            <div class="relative flex items-center max-w-[8rem]">
                                                <button type="button" class="decrement-sets bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none" onclick="decrement('sets_input_${detail.id}')">
                                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                                    </svg>
                                                </button>
                                                <input type="text" id="sets_input_${detail.id}" name="sets_${detail.id}" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none" placeholder="0" value="${detail.sets}" required readonly/>
                                                <button type="button" class="increment-sets bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none" onclick="increment('sets_input_${detail.id}')">
                                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="flex items-center border-b">
                                            <label for="reps_${detail.id}" class="w-60 block mb-1">REPS <span class="text-red-500">*</span></label>
                                            <div class="relative flex items-center max-w-[8rem]">
                                                <button type="button" class="decrement-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none" onclick="decrement('reps_input_${detail.id}')">
                                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                                    </svg>
                                                </button>
                                                <input type="text" id="reps_input_${detail.id}" name="reps_${detail.id}" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none" placeholder="0" value="${detail.reps}" required readonly/>
                                                <button type="button" class="increment-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none" onclick="increment('reps_input_${detail.id}')">
                                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="flex items-center border-b">
                                            <label for="rest_${detail.id}" class="w-60 block mb-1">Rest <span class="text-red-500">*</span></label>
                                            <div class="relative flex items-center max-w-[8rem]">
                                                <button type="button" onclick="decrement('rest_${detail.id}')" class="decrement-rest bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                                    </svg>
                                                </button>
                                                <input type="text" id="rest_${detail.id}" name="rest_${detail.id}" value="${detail.rest}" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none" required readonly>
                                                <button type="button" onclick="increment('rest_${detail.id}')" class="increment-rest bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="flex items-center border-b">
                                            <label for="intensity_${detail.id}" class="w-60 block mb-1">Intensity <span class="text-red-500">*</span></label>
                                            <select id="intensity_${detail.id}" name="intensity_${detail.id}" class="w-1/3 px-3 py-2 border flex rounded mb-2" required>
                                                <option value="low" ${detail.intensity === 'low' ? 'selected' : ''}>low</option>
                                                <option value="moderate" ${detail.intensity === 'medium' ? 'selected' : ''}>medium</option>
                                                <option value="high" ${detail.intensity === 'high' ? 'selected' : ''}>High</option>
                                                <option value="high" ${detail.intensity === 'extreme' ? 'selected' : ''}>extreme</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>`;
                    }

                    primaryDetail.innerHTML = pcontent;
                    document.getElementById('primary').appendChild(primaryDetail);
                    alternateDetail.innerHTML = acontent;
                    document.getElementById('alternate').appendChild(alternateDetail);
                });


            }
        }

        // Call this function to initially populate the workouts and details
        populateWorkouts(workouts, details);
    </script>

</body>

</html>
