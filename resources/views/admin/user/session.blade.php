<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <title>Document</title>

    {{-- Bullet Style css --}}
    <style>
        .bullet-a {
            display: list-item;
            list-style-type: disc;
            margin-left: 20px;
            /* Adjust as needed */
        }

        /* tab content styles */

        /* .tab {
            padding: 16px;
            cursor: pointer;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        } */
    </style>

</head>

<body>
    @extends('layout.layout')
    @section('content')
        <!-- Main content (Dashboard) -->
        <div class="container transition-width mt-24 flex-grow mx-4" id="container">
            <div class="breadcrumb text-sm mb-4">
                <a href="#" class="text-gray-500 no-underline hover:underline">Home</a> / <span><strong> Session/
                        Class Module</strong></span>
            </div>
            <div>
                <h1 class="text-2xl font-bold mt-6"> Class Manager</h1>
            </div>
            <div class="border rounded-b-lg  bg-white shadow-md mt-10 text-sm">

                {{-- Tab Names --}}
                <div class="rounded w-11/12 mx-auto mt-4 mb-4">
                    <!-- Tabs -->
                    <ul id="tabs" class="inline-flex gap-2 pt-2 px-1 w-full border-black border-b">
                        <li class="px-4 text-black  py-2 rounded-t hover:border-t hover:border-l hover:border-black">
                            <a href="#warmup">Warmup</a>
                        </li>
                        <li class="px-4 text-black  py-2 rounded-t hover:border-t hover:border-l hover:border-black">
                            <a id="default-tab" href="#strength">Strength</a>
                        </li>
                        <li class="px-4 text-black  py-2 rounded-t hover:border-t hover:border-l hover:border-black">
                            <a href="#conditioning">Conditioning</a>
                        </li>
                        <li class="px-4 text-black  py-2 rounded-t hover:border-t hover:border-l hover:border-black">
                            <a href="#weightlifting">Weightlifting</a>
                        </li>
                    </ul>
                </div>

                <div id="tab-contents">

                    {{-- Warmup Tab  --}}

                    <div id="warmup" class="tab-content">
                        <div class="w-full flex flex-row">
                            {{-- Week details --}}
                            <div class="w-1/3 h-full">
                                {{-- left side bullet points  --}}
                                <div class="ml-8">
                                    <ul class="flex flex-col">
                                        <a href="#" class="text-lg font-semibold ">&larr; Week 2 - 2024 &rarr;</a>
                                        <a class="px-4 cursor-pointer bullet-a mt-6">10/6/24 Monday</a>
                                        <a class="px-4 cursor-pointer bullet-a">11/6/24 Tuesday</a>
                                        <a class="px-4 cursor-pointer bullet-a">12/6/24 Wednesday</a>
                                        <a class="px-4 cursor-pointer bullet-a">13/6/24 Thursday</a>
                                        <a class="px-4 cursor-pointer bullet-a">14/6/24 Friday</a>
                                        <a class="px-4 cursor-pointer bullet-a">15/6/24 Saturday</a>
                                        <a class="px-4 cursor-pointer bullet-a">16/6/24 Sunday</a>
                                    </ul>
                                </div>
                            </div>
                            {{-- Form UI --}}
                            <div class="w-9/12 h-full flex mt-12">
                                <form class="px-4 py-4 space-y-4  w-full ">
                                    <div class="flex items-center">
                                        <label for="category" class="w-60 block mb-1">Category <span class="text-red-500"> *
                                            </span></label>
                                        <input type="text" id="category" name="category"
                                            class="w-1/3 px-3 py-2 border flex rounded">
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex items-center">
                                        <label for="workout" class="w-60 block mb-1">Workout<span class="text-red-500"> *
                                            </span></label>
                                        <input type="text" id="workout" name="workout"
                                            class="w-1/3 px-3 py-2 border flex rounded">
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex items-center">
                                        <label for="reps" class="w-60 block mb-1">Reps per set <span
                                                class="text-red-500"> * </span></label>
                                        <input type="number" id="reps" name="reps"
                                            class="w-1/3 px-3 py-2 border flex rounded">
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex items-center">
                                        <label for="custom-number" class="w-60 block mb-1">Custom number <span
                                                class="text-red-500"> * </span></label>
                                        <select id="custom-number" name="custom-number"
                                            class="w-1/3 px-3 py-2 border flex rounded">
                                            <option value="">Select</option>
                                            <!-- options -->
                                        </select>
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex items-center">
                                        <label for="rest" class="w-60 block mb-1">Rest<span class="text-red-500"> *
                                            </span></label>
                                        <input type="time" id="rest" name="rest"
                                            class="w-1/3 px-3 py-2 border flex rounded">
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex items-center">
                                        <label for="intensity" class="w-60 block mb-1">Intensity <span class="text-red-500">
                                                * </span></label>
                                        <select id="intensity" name="intensity" class="w-1/3 px-3 py-2 border flex rounded">
                                            <option value="">Select</option>
                                            <!-- options -->
                                        </select>
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex items-center">
                                        <label for="category" class="w-60 block mb-1"></span></label>
                                        <button type="button" class="bg-black  text-white py-2 px-4 rounded ">+
                                            Another</button>
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex mt-12">
                                        <button type="submit"
                                            class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700">Save</button>
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                </form>
                            </div>
                            {{-- Save Button UI --}}
                            <div class="w-2/12 justify-end h-full ">
                                <div class="flex justify-end mt-16 mr-4">
                                    <button class="bg-black text-white py-2 px-4 rounded ">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Strenght Tab  --}}

                    <div id="strength" class="tab-content">
                        <div class="flex justify-center text-2xl font-semibold gap-4  mb-6">
                            <a href="" class="">&larr;</a>
                            <h2 class=""> Week 2 - 2024
                            </h2>
                            <a href="">&rarr;</a>
                        </div>
                        <div class="h-full flex">
                            <div class="w-1/4 flex flex-col  text-lg p-4 ">
                                <a class="border-l border-t border-b border-r border-black w-2/3 px-2 py-3 rounded-t-md text-start hover:bg-black hover:text-white"
                                    href="">10/6/24 Monday</a>
                                <a class="border-l border-t border-b border-r border-black w-2/3 px-2 py-3  text-start hover:bg-black hover:text-white"
                                    href="">10/6/24 Monday</a>
                                <a class="border-l border-t border-b border-r border-black w-2/3 px-2 py-3  text-start hover:bg-black hover:text-white"
                                    href="">10/6/24 Monday</a>
                                <a class="border-l border-t border-b border-r border-black w-2/3 px-2 py-3  text-start hover:bg-black hover:text-white"
                                    href="">10/6/24 Monday</a>
                                <a class="border-l border-t border-b border-r border-black w-2/3 px-2 py-3  text-start hover:bg-black hover:text-white"
                                    href="">10/6/24 Monday</a>
                                <a class="border-l border-t border-b border-r border-black w-2/3 px-2 py-3  text-start hover:bg-black hover:text-white"
                                    href="">10/6/24 Monday</a>
                                <a class="border-l border-t border-b border-r border-black w-2/3 px-2 py-3 rounded-b-md text-start hover:bg-black hover:text-white"
                                    href="">10/6/24 Monday</a>

                            </div>
                            <div class="w-3/4 px-5">
                                {{-- div start --}}
                                <form action="">
                                    <div class="space-y-4  bg-gray-50 border-t border-r border-l p-4 rounded-md">
                                        <div class="flex items-center my-4">
                                            <label for="category" class="w-60 block mb-1">Category <span
                                                    class="text-red-500"> * </span></label>
                                            <input type="text" id="category" name="category"
                                                class="w-1/3 px-3 py-2 border flex rounded">
                                            <a href=""
                                                class="bg-black  text-white p-2 rounded-md flex left-0 mx-2 px-4">Edit</a>
                                        </div>
                                        <div class="flex items-center  border-b">
                                        </div>
                                        <div class="flex items-center">
                                            <label for="workout" class="w-60 block mb-1">Workout<span
                                                    class="text-red-500">
                                                    * </span></label>
                                            <input type="text" id="workout" name="workout"
                                                class="w-1/3 px-3 py-2 border flex rounded">
                                        </div>
                                        <div class="flex items-center  border-b">
                                        </div>
                                        <div class="flex items-center">
                                            <label for="reps" class="w-60 block mb-1">Reps per set <span
                                                    class="text-red-500"> * </span></label>
                                            <input type="number" id="reps" name="reps"
                                                class="w-1/3 px-3 py-2 border flex rounded">
                                        </div>
                                        <div class="flex items-center  border-b">
                                        </div>
                                        <div class="flex items-center">
                                            <label for="custom-number" class="w-60 block mb-1">Custom number <span
                                                    class="text-red-500"> * </span></label>
                                            <select id="custom-number" name="custom-number"
                                                class="w-1/3 px-3 py-2 border flex rounded">
                                                <option value="">Select</option>
                                                <!-- options -->
                                            </select>
                                        </div>
                                        <div class="flex items-center  border-b">
                                        </div>
                                        <div class="flex items-center">
                                            <label for="rest" class="w-60 block mb-1">Rest<span class="text-red-500">
                                                    *
                                                </span></label>
                                            <input type="time" id="rest" name="rest"
                                                class="w-1/3 px-3 py-2 border flex rounded">
                                        </div>
                                        <div class="flex items-center  border-b">
                                        </div>
                                        <div class="flex items-center">
                                            <label for="intensity" class="w-60 block mb-1">Intensity <span
                                                    class="text-red-500"> * </span></label>
                                            <select id="intensity" name="intensity"
                                                class="w-1/3 px-3 py-2 border flex rounded">
                                                <option value="">Select</option>
                                                <!-- options -->
                                            </select>
                                        </div>
                                        <div class="flex items-center  border-b">
                                        </div>
                                    </div>
                                    {{-- div closed --}}
                                    <div class="flex items-center bg-gray-50 border-l border-r border-b">
                                        <label for="category" class="w-60 block mb-1"></span></label>
                                        <button type="button" class="bg-black  text-white py-2 px-4 rounded ">+
                                            Another</button>
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                            </div>
                            {{-- Save Button UI --}}

                            </form>

                        </div>
                    </div>


                    {{-- Conditioning Tab  --}}

                    <div id="conditioning" class="tab-content">
                        <div class="w-full flex flex-row">
                            {{-- Week details --}}
                            <div class="w-1/3 h-full">
                                {{-- left side bullet points  --}}
                                <div class="ml-8">
                                    <ul class="flex flex-col">
                                        <a href="#" class="text-lg font-semibold ">&larr; Week 2 - 2024 &rarr;</a>
                                        <a class="px-4 cursor-pointer bullet-a mt-6">10/6/24 Monday</a>
                                        <a class="px-4 cursor-pointer bullet-a">11/6/24 Tuesday</a>
                                        <a class="px-4 cursor-pointer bullet-a">12/6/24 Wednesday</a>
                                        <a class="px-4 cursor-pointer bullet-a">13/6/24 Thursday</a>
                                        <a class="px-4 cursor-pointer bullet-a">14/6/24 Friday</a>
                                        <a class="px-4 cursor-pointer bullet-a">15/6/24 Saturday</a>
                                        <a class="px-4 cursor-pointer bullet-a">16/6/24 Sunday</a>
                                    </ul>
                                </div>
                            </div>
                            {{-- Form UI --}}
                            <div class="w-9/12 h-full flex mt-12">
                                <form class="px-4 py-4 space-y-4  w-full ">
                                    <div class="flex items-center">
                                        <label for="category" class="w-60 block mb-1">Category <span
                                                class="text-red-500"> * </span></label>
                                        <input type="text" id="category" name="category"
                                            class="w-1/3 px-3 py-2 border flex rounded">
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex items-center">
                                        <label for="workout" class="w-60 block mb-1">Workout<span class="text-red-500">
                                                * </span></label>
                                        <input type="text" id="workout" name="workout"
                                            class="w-1/3 px-3 py-2 border flex rounded">
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex items-center">
                                        <label for="reps" class="w-60 block mb-1">Reps per set <span
                                                class="text-red-500"> * </span></label>
                                        <input type="number" id="reps" name="reps"
                                            class="w-1/3 px-3 py-2 border flex rounded">
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex items-center">
                                        <label for="custom-number" class="w-60 block mb-1">Custom number <span
                                                class="text-red-500"> * </span></label>
                                        <select id="custom-number" name="custom-number"
                                            class="w-1/3 px-3 py-2 border flex rounded">
                                            <option value="">Select</option>
                                            <!-- options -->
                                        </select>
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex items-center">
                                        <label for="rest" class="w-60 block mb-1">Rest<span class="text-red-500"> *
                                            </span></label>
                                        <input type="time" id="rest" name="rest"
                                            class="w-1/3 px-3 py-2 border flex rounded">
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex items-center">
                                        <label for="intensity" class="w-60 block mb-1">Intensity <span
                                                class="text-red-500"> * </span></label>
                                        <select id="intensity" name="intensity"
                                            class="w-1/3 px-3 py-2 border flex rounded">
                                            <option value="">Select</option>
                                            <!-- options -->
                                        </select>
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex items-center">
                                        <label for="category" class="w-60 block mb-1"></span></label>
                                        <button type="button" class="bg-black  text-white py-2 px-4 rounded ">+
                                            Another</button>
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex mt-12">
                                        <button type="submit"
                                            class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700">Save</button>
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                </form>
                            </div>
                            {{-- Save Button UI --}}
                            <div class="w-2/12 justify-end h-full ">
                                <div class="flex justify-end mt-16 mr-4">
                                    <button class="bg-black text-white py-2 px-4 rounded ">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Weightlifting Tab  --}}

                    <div id="weightlifting" class="tab-content">
                        <div class="w-full flex flex-row">
                            {{-- Week details --}}
                            <div class="w-1/3 h-full">
                                {{-- left side bullet points  --}}
                                <div class="ml-8">
                                    <ul class="flex flex-col">
                                        <a href="#" class="text-lg font-semibold ">&larr; Week 2 - 2024 &rarr;</a>
                                        <a class="px-4 cursor-pointer bullet-a mt-6">10/6/24 Monday</a>
                                        <a class="px-4 cursor-pointer bullet-a">11/6/24 Tuesday</a>
                                        <a class="px-4 cursor-pointer bullet-a">12/6/24 Wednesday</a>
                                        <a class="px-4 cursor-pointer bullet-a">13/6/24 Thursday</a>
                                        <a class="px-4 cursor-pointer bullet-a">14/6/24 Friday</a>
                                        <a class="px-4 cursor-pointer bullet-a">15/6/24 Saturday</a>
                                        <a class="px-4 cursor-pointer bullet-a">16/6/24 Sunday</a>
                                    </ul>
                                </div>
                            </div>
                            {{-- Form UI --}}
                            <div class="w-9/12 h-full flex mt-12">
                                <form class="px-4 py-4 space-y-4  w-full ">
                                    <div class="flex items-center">
                                        <label for="category" class="w-60 block mb-1">Category <span
                                                class="text-red-500"> * </span></label>
                                        <input type="text" id="category" name="category"
                                            class="w-1/3 px-3 py-2 border flex rounded">
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex items-center">
                                        <label for="workout" class="w-60 block mb-1">Workout<span class="text-red-500">
                                                * </span></label>
                                        <input type="text" id="workout" name="workout"
                                            class="w-1/3 px-3 py-2 border flex rounded">
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex items-center">
                                        <label for="reps" class="w-60 block mb-1">Reps per set <span
                                                class="text-red-500"> * </span></label>
                                        <input type="number" id="reps" name="reps"
                                            class="w-1/3 px-3 py-2 border flex rounded">
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex items-center">
                                        <label for="custom-number" class="w-60 block mb-1">Custom number <span
                                                class="text-red-500"> * </span></label>
                                        <select id="custom-number" name="custom-number"
                                            class="w-1/3 px-3 py-2 border flex rounded">
                                            <option value="">Select</option>
                                            <!-- options -->
                                        </select>
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex items-center">
                                        <label for="rest" class="w-60 block mb-1">Rest<span class="text-red-500"> *
                                            </span></label>
                                        <input type="time" id="rest" name="rest"
                                            class="w-1/3 px-3 py-2 border flex rounded">
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex items-center">
                                        <label for="intensity" class="w-60 block mb-1">Intensity <span
                                                class="text-red-500"> * </span></label>
                                        <select id="intensity" name="intensity"
                                            class="w-1/3 px-3 py-2 border flex rounded">
                                            <option value="">Select</option>
                                            <!-- options -->
                                        </select>
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex items-center">
                                        <label for="category" class="w-60 block mb-1"></span></label>
                                        <button type="button" class="bg-black  text-white py-2 px-4 rounded ">+
                                            Another</button>
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                    <div class="flex mt-12">
                                        <button type="submit"
                                            class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700">Save</button>
                                    </div>
                                    <div class="flex items-center  border-b">
                                    </div>
                                </form>
                            </div>
                            {{-- Save Button UI --}}
                            <div class="w-2/12 justify-end h-full ">
                                <div class="flex justify-end mt-16 mr-4">
                                    <button class="bg-black text-white py-2 px-4 rounded ">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>
{{-- Tab Script  --}}

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', function () {
                const target = this.getAttribute('data-tab');

                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                tabContents.forEach(tc => {
                    if (tc.id === target) {
                        tc.classList.add('active');
                    } else {
                        tc.classList.remove('active');
                    }
                });
            });
        });
    });
</script> --}}

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let tabsContainer = document.querySelector("#tabs");
        let tabTogglers = tabsContainer.querySelectorAll("a");

        tabTogglers.forEach(function(toggler) {
            toggler.addEventListener("click", function(e) {
                e.preventDefault();

                let tabName = this.getAttribute("href");

                let tabContents = document.querySelector("#tab-contents");

                for (let i = 0; i < tabContents.children.length; i++) {
                    tabTogglers[i].parentElement.classList.remove("border-t", "border-r",
                        "border-l", "-mb-px", "bg-white");
                    tabContents.children[i].classList.add("hidden");
                    if ("#" + tabContents.children[i].id === tabName) {
                        tabContents.children[i].classList.remove("hidden");
                        tabTogglers[i].parentElement.classList.add("border-t", "border-r",
                            "border-l", "-mb-px", "bg-white", "border-black");
                    }
                }
                // for (let i = 0; i < tabContents.children.length; i++) {
                //     tabTogglers[i].classList.add("text-[#4393FE]"); // Set all tabs to blue text color
                //     tabContents.children[i].classList.add("hidden");

                //     if ("#" + tabContents.children[i].id === tabName) {
                //         tabContents.children[i].classList.remove("hidden");
                //         tabTogglers[i].classList.remove("text-[#4393FE]");
                //         tabTogglers[i].classList.add("text-black");
                //     }
                // }
            });
        });

        // Activate default tab
        document.querySelector("#default-tab").click();
    });
</script>

</html>
