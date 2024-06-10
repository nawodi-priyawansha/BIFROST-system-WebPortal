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
        <div class="container overflow-y-auto w-full bg-slate-50 flex-grow" id="container">
            <div class=" ">
                <div class="mt-24 mx-4">
                    <div>
                        <div class="justify-between flex">
                            <div><span class="text-gray-700">Home / </span>Add New Profile</div>
                            <div>
                                <a href="{{ route('userprofile') }}">
                                    <button class="bg-black text-white p-2 px-4 rounded-md">Back</button>
                                </a>
                            </div>
                        </div>
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
                                    <label for="name"
                                        class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Name <span class="text-red-500">*</span></label></label>
                                    <input type="text" id="name" name="name"
                                        class="form-control w-full md:w-3/4 border rounded px-4 py-2" required>
                                </div>
                                <div class="sm:hidden">
                                    {{-- PC view hidden part - this div are not showing PC --}}
                                    <!--Mobile View Nickname -->
                                    <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                                        <label for="nickname"
                                            class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Nickname</label>
                                        <input type="text" id="nickname" name="nickname"
                                            class="form-control w-full md:w-3/4 border rounded px-4 py-2">
                                    </div>
                                    <!-- Mobile View Date of Birth -->
                                    <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                                        <label for="dob"
                                            class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Date of
                                            Birth <span class="text-red-500">*</span></label>
                                        <input type="date" id="dob" name="dob" required
                                            class="form-control w-full md:w-3/4 border rounded px-4 py-2">
                                    </div>
                                    {{-- Mobile view Age --}}
                                    <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                                        <label for="age"
                                            class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Age</label>
                                        <input type="number" id="age" name="age"
                                            class="form-control w-full md:w-3/4 border rounded px-4 py-2">
                                    </div>
                                    {{-- Mobile View Phone and Email --}}
                                    <div>
                                        <label for="phone"
                                            class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Phone
                                            <span class="text-red-500">*</span></label>
                                        <input type="tel" id="phone" name="phone" required
                                            class="md:w-2/4 w-full form-control border rounded ml-1 px-4 py-2">
                                        <label for="email"
                                            class="block text-gray-700 font-bold md:w-1/4 mb-1 md:mb-0 ">Email
                                            <span class="text-red-500">*</span></label>
                                        <input type="email" id="email" name="email" required
                                            class="form-control w-full md:w-2/4 border rounded px-4 py-2">
                                    </div>
                                    {{-- Mobile view  Address --}}
                                    <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                                        <label for="address"
                                            class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Address
                                            <span class="text-red-500">*</span></label>
                                        <input type="text" id="address" name="address" required
                                            class="form-control w-full md:w-2/4 border rounded px-4 py-2">
                                    </div>
                                    {{-- Mobile view Height and Weight  --}}
                                    <div>
                                        <label for="height"
                                            class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Height
                                            <span class="text-red-500">*</span></label>
                                        <input type="number" id="height" name="height" required
                                            class="form-control w-full md:w-2/4 border rounded px-4 py-2 ">
                                        <label for="weight"
                                            class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Weight
                                            <span class="text-red-500">*</span></label>
                                        <input type="number" id="weight" name="weight" required
                                            class="form-control w-full md:w-2/4 border rounded px-4 py-2">
                                    </div>
                                    {{-- Mobile View BMR  --}}
                                    <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                                        <label for="bmr"
                                            class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">BMR
                                            <span class="text-red-500">*</span></label>
                                        <input type="number" id="bmr" name="bmr" required
                                            class="form-control w-full md:w-2/4 border rounded px-4 py-2">
                                    </div>
                                    {{-- PC View Hiddn is Closed  --}}
                                </div>
                                {{-- Date of Birth  --}}
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center hidden md:flex">
                                    <label for="dob"
                                        class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Date of
                                        Birth
                                        <span class="text-red-500">*</span></label>
                                    <input type="date" id="dob" name="dob" required
                                        class="form-control w-full md:w-3/4 border rounded px-4 py-2">
                                </div>
                                {{-- Phone label and input , Email Label only --}}
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center hidden md:flex">
                                    <label for="phone"
                                        class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Phone <span
                                            class="text-red-500">*</span></label>
                                    <input type="tel" id="phone" name="phone" required
                                        class="md:w-2/4  form-control border rounded px-4 py-2">
                                    <label for="email"
                                        class="block text-gray-700 font-bold md:w-1/4 mb-1 md:mb-0 ml-4">Email <span
                                            class="text-red-500">*</span></label>
                                </div>
                                {{-- Height label and input , Weight label only  --}}
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center hidden md:flex">
                                    <label for="height"
                                        class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Height
                                        <span class="text-red-500">*</span></label>
                                    <input type="number" id="height" name="height" required
                                        class="form-control w-full md:w-2/4 border rounded px-4 py-2 ml-1">
                                    <label for="weight"
                                        class="block hidden md:flex text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4 ml-4">Weight
                                        <span class="text-red-500">*</span></label>
                                </div>
                                <!-- Primary Goal -->
                                <div class="form-group flex flex-wrap items-center ">
                                    <label for="primary-goal"
                                        class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Primary
                                        Goal
                                        <span class="text-red-500">*</span></label>
                                    <select id="primary-goal" name="primary-goal" required
                                        class="form-control w-full md:w-3/4 border rounded px-4 py-2">
                                        <option value="Weight Loss">Weight Loss</option>
                                        <option value="Build Muscle">Build Muscle </option>
                                        <option value="Competitive Weightlifting">Competitive Weightlifting</option>
                                    </select>
                                </div>
                                <!-- Subscription Level -->
                                <div class="form-group flex flex-wrap items-center ">
                                    <label for="subscription-level"
                                        class="block text-gray-700 font-bold  w-full md:w-1/4 mb-1 md:mb-0 pr-4">Subscription
                                        Level<span class="text-red-500">*</span></label>
                                    <input type="text" id="subscription-level" name="subscription-level" required
                                        class="form-control w-full md:w-3/4 border rounded px-4 py-2">
                                </div>
                                <!-- Progress Photos -->
                                <div class="form-group flex flex-wrap cursor-pointer">
                                    <label for="progress-photos"
                                        class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">
                                        Progress Photos <span class="text-red-500">*</span>
                                    </label>
                                    <div class="progress-photos flex flex-col items-center justify-center min-h-40 h-auto border-2 border-dashed rounded w-full md:w-3/4 px-4 py-6"
                                        id="progressPhotosDropArea">
                                        <div id="uploadedFiles" class="mt-4">
                                            <!-- Uploaded files will be shown here -->
                                        </div>
                                        <i class="fas fa-cloud-upload-alt text-3xl text-gray-600 mb-2"></i>
                                        <p class="text-gray-600">Drop files here or click to upload.</p>
                                        <input type="file" id="fileInput" style="display:none;" multiple>
                                    </div>
                                </div>
                                {{-- Submit button --}}
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                                    <label for="name"
                                        class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4"></label>
                                    <button type="submit"
                                        class="bg-black text-white py-2 px-4 rounded  hover:bg-black">Submit</button>
                                </div>
                            </div>
                            <!-- Right Column -->
                            <div class="w-full md:w-1/2 pl-4 space-y-6 hidden md:block">
                                <!-- Nickname -->
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                                    <label for="nickname"
                                        class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Nickname</label>
                                    <input type="text" id="nickname" name="nickname"
                                        class="form-control w-full md:w-3/4 border rounded px-4 py-2">
                                </div>
                                {{-- Age --}}
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                                    <label for="age"
                                        class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4">Age</label>
                                    <input type="number" id="age" name="age"
                                        class="form-control w-full md:w-3/4 border rounded px-4 py-2">
                                </div>
                                {{-- Address --}}
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                                    <input type="email" id="email" name="email" required
                                        class="form-control w-full md:w-2/4 border rounded px-4 py-2">
                                    <label for="address"
                                        class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4 ml-4">Address
                                        <span class="text-red-500">*</span></label>
                                    <input type="text" id="address" name="address" required
                                        class="form-control w-full md:w-2/4 border rounded px-4 py-2">
                                </div>
                                {{-- BMR labal and input , weight input  --}}
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center ">
                                    <input type="number" id="weight" name="weight" required
                                        class="form-control w-full md:w-2/4 border rounded px-4 py-2">
                                    <label for="bmr"
                                        class="block text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4 ml-4">BMR
                                        <span class="text-red-500">*</span></label>
                                    <input type="number" id="bmr" name="bmr" required
                                        class="form-control w-full md:w-2/4 border rounded px-4 py-2">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const dropArea = document.getElementById('progressPhotosDropArea');
                const fileInput = document.getElementById('fileInput');
                const uploadedFilesContainer = document.getElementById('uploadedFiles');
                let imageCounter = 1; // Initialize counter for image names

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

                fileInput.addEventListener('change', function(e) {
                    const files = e.target.files;
                    handleFiles(files);
                });

                dropArea.addEventListener('click', function() {
                    fileInput.click();
                });

                function handleFiles(files) {
                    files = Array.from(files); // Convert FileList to Array
                    files.forEach(displayFile);
                }

                function displayFile(file) {
                    const fileReader = new FileReader();
                    fileReader.onload = function(e) {
                        const fileUrl = e.target.result;
                        const fileElement = document.createElement('div');
                        fileElement.classList.add('file-item', 'mt-2', 'flex', 'items-center', 'justify-between',
                            'w-full');
                        const imageName = `img_${imageCounter++}`; // Generate custom name for the image
                        fileElement.innerHTML = `
                            <div class="flex items-center">
                                <img src="${fileUrl}" alt="${file.name}" class="w-16 h-16 object-cover rounded mr-4" name="${imageName}">
                                <p class="text-gray-700">${file.name}</p>
                            </div>
                            <button class="text-red-500 hover:text-red-700" onclick="removeFile(this)">Remove</button>
                        `;
                        uploadedFilesContainer.appendChild(fileElement);
                    };
                    fileReader.readAsDataURL(file);
                }
            });

            function removeFile(button) {
                const fileItem = button.closest('.file-item');
                fileItem.remove();
            }
        </script>
    @endsection
</body>

</html>
