<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <title>Document</title>
</head>

<body class="font-sans">
    @extends('layout.user-layout')
    @section('user-content')
    <div class="container mx-auto mt-24 px-4 overflow-y-auto" id="container">
        <div class=" bg-slate-50 ">
            <div class="breadcrumb text-sm mb-4 mt-16 md:mt-0 flex items-center">
                <a href="#" class="text-gray-400 hover:underline">Home /</a>
                <span class="mx-2"><strong>Add Profile</strong></span> <!-- Adjusted the spacing -->
                <button class="bg-black text-lg text-white ml-auto p-1 rounded-md pl-4 pr-4">Back</button> <!-- ml-auto pushes the button to the end -->
            </div>
            <div>
                <h2 class="text-balck text-lg">Add New Profile</h2>
            </div>

            <form action="#" method="POST" class="space-y-6 text-xs p-8 rounded-lg shadow-lg bg-white">
                <div class="flex flex-wrap md:flex-nowrap">
                    <!-- Left Column -->
                    <div class="w-full md:w-1/2 pr-4 space-y-6 ">
                        <!-- Name -->
                        <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                            <label for="name" class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Name</label>
                            <input type="text" id="name" name="name" class="form-control w-full md:w-3/4 border rounded px-4 py-2">
                        </div>
                        <div class="sm:hidden">
                            {{-- PC view hidden part - this div are not showing PC --}}
                            <!--Mobile View Nickname -->
                            <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                                <label for="nickname" class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Nickname</label>
                                <input type="text" id="nickname" name="nickname" class="form-control w-full md:w-3/4 border rounded px-4 py-2">
                            </div>
                            <!-- Mobile View Date of Birth -->
                            <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                                <label for="dob" class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Date of Birth <span class="text-red-500">*</span></label>
                                <input type="date" id="dob" name="dob" required class="form-control w-full md:w-3/4 border rounded px-4 py-2">
                            </div>
                            {{--Mobile view Age --}}
                            <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                                <label for="age" class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Age</label>
                                <input type="number" id="age" name="age" class="form-control w-full md:w-3/4 border rounded px-4 py-2">
                            </div>
                            {{--Mobile View Phone and Email --}}
                            <div >
                                <label for="phone" class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Phone <span class="text-red-500">*</span></label>
                                <input type="tel" id="phone" name="phone" required class="md:w-2/4 w-full form-control border rounded ml-1 px-4 py-2">
                                 <label for="email" class="block text-gray-700 font-bold md:w-1/4 mb-1 md:mb-0 ">Email <span class="text-red-500">*</span></label>
                                 <input type="email" id="email" name="email" required class="form-control w-full md:w-2/4 border rounded px-4 py-2">
                            </div>
                            {{-- Mobile view  Address --}}
                            <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                                <label for="address" class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Address <span class="text-red-500">*</span></label>
                                <input type="text" id="address" name="address" required class="form-control w-full md:w-2/4 border rounded px-4 py-2">
                            </div>
                            {{-- Mobile view Height and Weight  --}}
                            <div>
                                <label for="height" class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Height <span class="text-red-500">*</span></label>
                                <input type="number" id="height" name="height" required class="form-control w-full md:w-2/4 border rounded px-4 py-2 ">
                                <label for="weight" class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Weight <span class="text-red-500">*</span></label>
                                <input type="number" id="weight" name="weight" required class="form-control w-full md:w-2/4 border rounded px-4 py-2">
                            </div>
                            {{-- Mobile View BMR  --}}
                            <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                                <label for="bmr" class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">BMR <span class="text-red-500">*</span></label>
                                <input type="number" id="bmr" name="bmr" required class="form-control w-full md:w-2/4 border rounded px-4 py-2">
                            </div>
                            {{-- PC View Hiddn is Closed  --}}
                        </div>
                        {{-- Date of Birth  --}}
                        <div class="form-group flex flex-wrap md:flex-nowrap items-center hidden md:flex">
                            <label for="dob" class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Date of Birth <span class="text-red-500">*</span></label>
                            <input type="date" id="dob" name="dob" required class="form-control w-full md:w-3/4 border rounded px-4 py-2">
                        </div>
                            {{--Phone label and input , Email Label only --}}
                            <div class="form-group flex flex-wrap md:flex-nowrap items-center hidden md:flex">
                                <label for="phone" class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Phone <span class="text-red-500">*</span></label>
                                    <input type="tel" id="phone" name="phone" required class="md:w-2/4  form-control border rounded px-4 py-2">
                                    <label for="email" class="block text-gray-700 font-bold md:w-1/4 mb-1 md:mb-0 ml-4">Email <span class="text-red-500">*</span></label>
                            </div>
                            {{-- Height label and input , Weight label only  --}}
                            <div class="form-group flex flex-wrap md:flex-nowrap items-center hidden md:flex">
                                <label for="height" class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Height <span class="text-red-500">*</span></label>
                                <input type="number" id="height" name="height" required class="form-control w-full md:w-2/4 border rounded px-4 py-2 ml-1">
                                <label for="weight" class="block hidden md:flex text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4 ml-4">Weight <span class="text-red-500">*</span></label>
                            </div>
                            <!-- Primary Goal -->
                            <div class="form-group flex flex-wrap items-center ">
                                <label for="primary-goal" class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Primary Goal <span class="text-red-500">*</span></label>
                                <select id="primary-goal" name="primary-goal" required class="form-control w-full md:w-3/4 border rounded px-4 py-2">
                                    <option value="Weight Loss">Weight Loss</option>
                                    <option value="Build Muscle">Build Muscle </option>
                                    <option value="Competitive Weightlifting">Competitive Weightlifting</option>
                                </select>
                            </div>
                            <!-- Subscription Level -->
                            <div class="form-group flex flex-wrap items-center ">
                                <label for="subscription-level" class="block text-gray-700 font-bold  w-full md:w-1/4 mb-1 md:mb-0 pr-4">Subscription Level<span class="text-red-500">*</span></label>
                                <input type="text" id="subscription-level" name="subscription-level" required class="form-control w-full md:w-3/4 border rounded px-4 py-2">
                            </div>
                            <!-- Progress Photos -->
                            <div class="form-group flex flex-wrap ">
                                <label for="progress-photos" class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Progress Photos <span class="text-red-500">*</span></label>
                                <div class="progress-photos flex flex-col items-center justify-center h-40 border-2 border-dashed rounded w-full md:w-3/4 px-4 py-6" id="progressPhotosDropArea">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-600 mb-2"></i>
                                    <p class="text-gray-600">Drop files here or click to upload.</p>
                                    <input type="file" id="fileInput" style="display:none;" multiple>
                                </div>
                            </div>
                            {{-- Submit button --}}
                            <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                                <label for="name" class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4"></label>
                                <button type="submit" class="bg-black text-white py-2 px-4 rounded  hover:bg-black">Submit</button>
                            </div>
                    </div>
                    <!-- Right Column -->
                    <div class="w-full md:w-1/2 pl-4 space-y-6 hidden md:block">
                        <!-- Nickname -->
                        <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                            <label for="nickname" class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Nickname</label>
                            <input type="text" id="nickname" name="nickname" class="form-control w-full md:w-3/4 border rounded px-4 py-2">
                        </div>
                        {{-- Age --}}
                        <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                            <label for="age" class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Age</label>
                            <input type="number" id="age" name="age" class="form-control w-full md:w-3/4 border rounded px-4 py-2">
                        </div>
                        {{-- Address --}}
                        <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                            <input type="email" id="email" name="email" required class="form-control w-full md:w-2/4 border rounded px-4 py-2">
                            <label for="address" class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4 ml-4">Address <span class="text-red-500">*</span></label>
                            <input type="text" id="address" name="address" required class="form-control w-full md:w-2/4 border rounded px-4 py-2">
                        </div>
                        {{-- BMR labal and input , weight input  --}}
                        <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                            <input type="number" id="weight" name="weight" required class="form-control w-full md:w-2/4 border rounded px-4 py-2">
                            <label for="bmr" class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4 ml-4">BMR <span class="text-red-500">*</span></label>
                            <input type="number" id="bmr" name="bmr" required class="form-control w-full md:w-2/4 border rounded px-4 py-2">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
         document.addEventListener("DOMContentLoaded", function() {
                            const dropArea = document.getElementById('progressPhotosDropArea');

                            dropArea.addEventListener('dragover', function(e) {
                                e.preventDefault();
                                dropArea.classList.add('border-blue-500'); // Add border highlight when dragging over
                            });

                            dropArea.addEventListener('dragleave', function() {
                                dropArea.classList.remove('border-blue-500'); // Remove border highlight when leaving
                            });

                            dropArea.addEventListener('drop', function(e) {
                                e.preventDefault();
                                dropArea.classList.remove('border-blue-500'); // Remove border highlight when dropping
                                const files = e.dataTransfer.files;
                                handleFiles(files);
                            });

                            document.getElementById('fileInput').addEventListener('change', function(e) {
                                const files = e.target.files;
                                handleFiles(files);
                            });

                            function handleFiles(files) {
                                // Handle the uploaded files here, you can use FileReader API or FormData
                                console.log(files);
                            }

                            dropArea.addEventListener('click', function() {
                                document.getElementById('fileInput').click();
                            });
                        });
    </script>
    @endsection
</body>

</html>
