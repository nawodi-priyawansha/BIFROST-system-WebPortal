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
                        <h2 class="text-black text-lg">Add New Profile</h2>
                    </div>

                    <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6 text-xs  rounded-lg shadow-lg bg-white p-2">
                        @csrf
                        <div class="text-xs">
                            {{-- Name and Nickname Row --}}
                            <div class="w-full h-full p-2 grid grid-cols-1 md:grid-cols-2 md:border-b gap-4">
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center w-full">
                                    <label for="name"
                                        class="block text-gray-700 font-bold w-full md:w-[38%] mb-1 md:mb-0 pr-4">Name <span
                                            class="text-red-500">*</span></label>
                                    <input type="text" id="name" name="name"
                                        class="form-control w-full md:w-3/4 rounded px-4 py-2 border" required>
                                </div>
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center w-full">
                                    <label for="nickname"
                                        class="block text-gray-700 font-bold w-full md:w-1/3 mb-1 md:mb-0 pr-4 md:ml-4">Nickname</label>
                                    <input type="text" id="nickname" name="nickname"
                                        class="form-control w-full md:w-3/4 border rounded px-4 py-2">
                                </div>
                            </div>
                            {{-- DOB , Gender and Age  --}}
                            <div class="w-full h-full p-2 grid grid-cols-1 md:grid-cols-6 gap-4 items-center md:border-b">
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center w-full md:col-span-1">
                                    <label for="dob"
                                        class="text-gray-700 font-bold w-full md:w-full mb-1 md:mb-0 pr-4 flex-nowrap">
                                        Date of birth <span class="text-red-500">*</span>
                                    </label>
                                </div>
                                <div class="w-full md:col-span-1">
                                    <input type="date" id="dob" name="dob" required
                                        class="form-control w-full border rounded px-4 py-2">
                                </div>
                                <div class="text-gray-700 font-bold w-full md:w-full mb-1 md:mb-0 md:ml-8 md:col-span-1">
                                    Gender
                                </div>
                                <div class="w-full md:col-span-1 flex items-center">
                                    <label class="mr-4">
                                        <input type="radio" id="gender-male" name="gender" value="Male" required
                                            class="mr-2"> Male
                                    </label>
                                    <label>
                                        <input type="radio" id="gender-female" name="gender" value="Female" required
                                            class="mr-2"> Female
                                    </label>
                                </div>
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center w-full md:col-span-1">
                                    <label for="age"
                                        class="block text-gray-700 font-bold w-full md:w-full mb-1 md:mb-0 pr-4 md:ml-8">
                                        Age
                                    </label>
                                </div>
                                <div class="w-full md:col-span-1">
                                    <input type="number" id="age" name="age" required
                                        class="form-control w-full border rounded px-4 py-2">
                                </div>
                            </div>
                            {{-- Phone Number , Email , Address --}}
                            <div class="w-full h-full p-2 grid grid-cols-1 md:grid-cols-6 gap-4 md:border-b">
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center w-full md:col-span-1">
                                    <label for="phone"
                                        class="text-gray-700 font-bold w-full md:w-full mb-1 md:mb-0 pr-4">
                                        Phone <span class="text-red-500">*</span>
                                    </label>
                                </div>
                                <div class="w-full md:col-span-1">
                                    <input type="tel" id="phone" name="phone" required
                                        class="w-full form-control border rounded px-4 py-2">
                                </div>
                                <div
                                    class="form-group flex flex-wrap md:flex-nowrap items-center w-full md:col-span-1 text-gray-700 font-bold">
                                    <label for="email" class="w-full md:w-full mb-1 md:mb-0 pr-4 ml-0 md:ml-8">
                                        Email <span class="text-red-500">*</span>
                                    </label>
                                </div>
                                <div class="w-full md:col-span-1">
                                    <input type="email" id="email" name="email" required
                                        class="w-full form-control border rounded px-4 py-2">
                                </div>
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center w-full md:col-span-1">
                                    <label for="address"
                                        class="text-gray-700 font-bold w-full md:w-1/4 mb-1 md:mb-0 pr-4 ml-0 md:ml-8">
                                        Address<span class="text-red-500">*</span>
                                    </label>
                                </div>
                                <div class="w-full md:col-span-1">
                                    <input type="text" id="address" name="address" required
                                        class="w-full form-control border rounded px-4 py-2">
                                </div>
                            </div>
                            {{-- Height , Weight and BMR --}}
                            <div class="w-full h-full p-2 grid grid-cols-1 md:grid-cols-6 gap-4 md:border-b">
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center md:col-span-1">
                                    <label for="height"
                                        class="text-gray-700 font-bold w-full md:w-full mb-1 md:mb-0 pr-4">
                                        Height (cm) <span class="text-red-500">*</span>
                                    </label>
                                </div>
                                <div class="w-full md:col-span-1">
                                    <input type="number" id="height" name="height" required
                                        class="form-control w-full border rounded px-4 py-2">
                                </div>
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center md:col-span-1">
                                    <label for="weight"
                                        class="text-gray-700 font-bold w-full md:w-full mb-1 md:mb-0 pr-4 md:ml-8">
                                        Weight (kg)<span class="text-red-500">*</span>
                                    </label>
                                </div>
                                <div class="w-full md:col-span-1">
                                    <input type="number" id="weight" name="weight" required
                                        class="form-control w-full border rounded px-4 py-2">
                                </div>
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center md:col-span-1">
                                    <label for="bmr"
                                        class="text-gray-700 font-bold w-full md:w-full mb-1 md:mb-0 pr-4 md:ml-8">
                                        BMR <span class="text-red-500">*</span>
                                    </label>
                                </div>
                                <div class="w-full md:col-span-1">
                                    <input type="number" id="bmr" name="bmr" required
                                        class="form-control w-full border rounded px-4 py-2 outline-none" readonly>
                                </div>
                            </div>
                            {{-- Primary Goal --}}
                            <div class="w-full h-full p-2 grid grid-cols-1 md:grid-cols-2 gap-4 md:border-b">
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center w-full">
                                    <label for="primary-goal"
                                        class="block text-gray-700 font-bold w-full md:w-1/3 mb-1 md:mb-0 pr-4">
                                        Primary Goal
                                        <span class="text-red-500">*</span>
                                    </label>
                                    <div class="w-full md:w-2/3">
                                        <select id="primary-goal" name="primary-goal"
                                            class="form-control w-full rounded px-4 py-2 border" required>
                                            <option value="Weight Loss">Weight Loss</option>
                                            <option value="Build Muscle">Build Muscle</option>
                                            <option value="Competitive Weightlifting">Competitive Weightlifting</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-control w-full md:w-2/3 rounded px-4 py-2">
                                    <!-- Add any additional content or form controls here if needed -->
                                </div>
                            </div>
                            {{-- Subscription Level --}}
                            <div
                                class="w-full h-full p-2 grid grid-cols-1 md:grid-cols-2 gap-4 whitespace-nowrap md:border-b">
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center w-full">
                                    <label for="subscription-level"
                                        class="block text-gray-700 font-bold w-full md:w-[34%] mb-1 md:mb-0 pr-4">
                                        Subscription Level<span class="text-red-500">*</span>
                                    </label>
                                    <div class="w-full md:w-[66%]">
                                        <input type="text" id="subscription-level" name="subscription-level" required
                                            class="form-control w-full border rounded px-4 py-2">
                                    </div>
                                </div>
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center w-full">
                                    <!-- Additional content can be added here -->
                                </div>
                            </div>
                            {{-- Progress Photo --}}
                            <div class="w-full h-full p-2 grid grid-cols-1 md:grid-cols-2 gap-4 md:border-b">
                                <div class="form-group flex flex-wrap md:flex-nowrap w-full">
                                    <label for="progress-photos" class="block text-gray-700 font-bold w-full md:w-[34%] mb-1 md:mb-0 pr-4">
                                        Progress Photos <span class="text-red-500">*</span>
                                    </label>
                                    <div class="progress-photos flex flex-col cursor-pointer items-center justify-center min-h-40 h-auto border bg-[#F8F9FA] rounded w-full md:w-[66%] px-4 py-6"
                                        id="progressPhotosDropArea">
                                        <div id="uploadedFiles" class="mt-4">
                                            <!-- Uploaded files will be shown here -->
                                        </div>
                                        <i class="fas fa-cloud-upload-alt text-3xl text-gray-600 mb-2"></i>
                                        <p class="text-gray-600">Drop files here or click to upload.</p>
                                        <input type="file" name="profile_image[]" id="fileInput" style="display:none;" multiple>
                                    </div>
                                </div>
                            </div>
                            {{-- Submint Button --}}
                            <div class="w-full h-full p-1 grid grid-cols-1 md:grid-cols-2 gap-4 whitespace-nowrap md:border-b">
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center w-full ">
                                    <label for=""
                                        class="block text-gray-700 font-bold w-full md:w-[34%] mb-1 md:mb-0 pr-4">
                                        <!-- Empty label left as it is -->
                                    </label>
                                    <div class="w-full md:w-[26%]">
                                        <button type="submit" id="submit" required
                                            class="form-control w-1/4 md:w-[50%] p-2 text-center border rounded px-4 py-2 bg-black text-white">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group flex flex-wrap md:flex-nowrap items-center w-full">
                                    <!-- Additional content can be added here -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Upload File Script  --}}
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const dropArea = document.getElementById('progressPhotosDropArea');
                const fileInput = document.getElementById('fileInput');
                const uploadedFilesContainer = document.getElementById('uploadedFiles');
                let selectedFiles = []; // Array to hold selected files
        
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
                    files.forEach(file => {
                        displayFile(file);
                        selectedFiles.push(file); // Store file in selectedFiles array
                    });
                    updateFileInput(); // Update the hidden file input with selected files
                }
        
                function displayFile(file) {
                    const fileReader = new FileReader();
                    fileReader.onload = function(e) {
                        const fileUrl = e.target.result;
                        const fileElement = document.createElement('div');
                        fileElement.classList.add('file-item', 'mt-2', 'flex', 'items-center', 'justify-between', 'w-full');
                        const imageName = `img_${selectedFiles.length}`; // Generate custom name for the image
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
        
                function removeFile(button) {
                    const fileItem = button.closest('.file-item');
                    const fileName = fileItem.querySelector('img').getAttribute('name');
                    const index = selectedFiles.findIndex(file => file.name === fileName);
                    if (index !== -1) {
                        selectedFiles.splice(index, 1); // Remove file from selectedFiles array
                        updateFileInput(); // Update the hidden file input with remaining selected files
                    }
                    fileItem.remove();
                }
        
                function updateFileInput() {
                    const fileList = new DataTransfer();
                    selectedFiles.forEach(file => {
                        fileList.items.add(file);
                    });
                    fileInput.files = fileList.files;
                }
            });
        </script>
        
        
        {{-- BMR Calculator Script --}}
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Function to calculate BMR
                function calculateBMR() {
                    const age = parseInt(document.getElementById('age').value) || 0;
                    const weight = parseFloat(document.getElementById('weight').value) || 0;
                    const height = parseFloat(document.getElementById('height').value) || 0;
                    const gender = document.querySelector('input[name="gender"]:checked');

                    if (gender && gender.value) {
                        if (gender.value === 'Male') {
                            return 88.362 + (13.397 * weight) + (4.799 * height) - (5.677 * age);
                        } else if (gender.value === 'Female') {
                            return 447.593 + (9.247 * weight) + (3.098 * height) - (4.330 * age);
                        }
                    }
                    return 0; // Default case, though gender should always be selected
                }

                // Update BMR when inputs change
                function updateBMR() {
                    const bmrInput = document.getElementById('bmr');
                    if (bmrInput) {
                        bmrInput.value = calculateBMR().toFixed(2);
                    }
                }

                // Event listeners for inputs
                document.getElementById('age').addEventListener('input', updateBMR);
                document.getElementById('weight').addEventListener('input', updateBMR);
                document.getElementById('height').addEventListener('input', updateBMR);
                document.querySelectorAll('input[name="gender"]').forEach(item => {
                    item.addEventListener('change', updateBMR);
                });
            });
        </script>
    @endsection
</body>

</html>
