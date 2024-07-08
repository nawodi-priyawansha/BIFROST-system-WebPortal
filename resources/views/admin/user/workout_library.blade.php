<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <title>Workout Library</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    @extends('layout.layout')
    @section('content')
        <div class="container mx-4 mt-24 flex-grow min-h-screen" id="container">
            <div class="breadcrumb text-sm mb-4">
                <a href="#" class="text-gray-500 hover:underline ml-4">Home</a> / <span><strong class="font-source-sans"> Workout
                        Library </strong></span>
                <div class="flex justify-between p-5">
                    <h1 class="text-2xl  font-medium mb-5 font-semibold font-source-sans"> Workout Library</h1>
                    <button id="openPopupBtn" class="bg-black h-10 px-6 text-white rounded-md">+ ADD</button>

                    {{-- pop up view start --}}
                    <div id="popupForm"
                        class="popup fixed inset-0 bg-gray-800 bg-opacity-50 items-center justify-center hidden">
                        <div class="popup-content inset-0 rounded-lg shadow-lg w-7/12 p-6">
                            <div class="bg-black text-white p-4 flex justify-between items-center rounded-t-lg flex-row">
                                <h4 class="text-xl font-semibold">Add Workout Library</h4>
                                <div class="flex items-center space-x-4">
                                    <a href="#" class="text-white hover:underline">Edit</a>
                                    <a class="text-white">|</a>
                                    <span class="close text-4xl cursor-pointer">&times;</span>
                                </div>
                            </div>
                            <div class="p-6 bg-white">
                                <form class="space-y-4" action="{{ route('save.workoutlibrary') }}" method="POST">
                                    @csrf
                                    <input type="hidden" id="workoutId" name="id">
                                    <div class="flex items-center space-x-4">
                                        <label for="category" class="w-32">Category <span
                                                class="text-red-500">*</span></label>
                                        <select id="category" name="category"
                                            class="p-2 border border-gray-300 rounded flex-1">
                                            @foreach ($categoryOptions as $categoryOption)
                                                <option value="{{ $categoryOption->id }}">
                                                    {{ $categoryOption->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="flex items-center space-x-4">
                                        <label for="type" class="w-32">Type <span
                                                class="text-red-500">*</span></label>
                                        <select id="type" name="type"
                                            class="p-2 border border-gray-300 rounded flex-1">
                                            <option value="warmup">Warmup</option>
                                            <option value="strength">Strength</option>
                                            <option value="conditioning">Conditioning</option>
                                            <option value="weightlifting">Weightlifting</option>
                                        </select>
                                    </div>

                                    <div class="flex items-center space-x-4">
                                        <label for="workout" class="w-32">Workout <span
                                                class="text-red-500">*</span></label>
                                        <input type="text" id="workout" name="workout"
                                            class="p-2 border border-gray-300 rounded flex-1">
                                    </div>

                                    <div class="flex items-center space-x-4">
                                        <label for="link" class="w-32">Link <span
                                                class="text-red-500">*</span></label>
                                        <input type="url" id="link" name="link"
                                            class="p-2 border border-gray-300 rounded flex-1">
                                    </div>

                                    <div class="p-4 bg-gray-100 text-center rounded-b-lg">
                                        <button class="bg-black text-white px-8 py-2 rounded mr-2"
                                            type="submit" id="addButton">Add</button>
                                        <button class="bg-black text-white px-8 py-2 rounded mr-2"
                                            type="submit" id="updateButton" hidden>Update</button>
                                        <button type="button"
                                            class="bg-gray-300 text-black px-8 py-2 rounded hover:bg-gray-400"
                                            onclick="closePopup()">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- pop up view end --}}
                </div>
.
                <div class="bg-white p-5 rounded-lg shadow-md">
                    <table class="w-full border-collapse mb-5 text-sm">
                        <thead>
                            <tr>
                                <th class="p-3 border-s-2 border-y-2 border-gray-300 bg-white text-left" dir="ltr">
                                    Category</th>
                                <th class="p-3 border-y-2 border-gray-300 bg-white text-left">Type</th>
                                <th class="p-3 border-y-2 border-gray-300 bg-white text-left">Workout</th>
                                <th class="p-3 border-y-2 border-gray-300 bg-white text-left">Link</th>
                                <th class="p-3 border-s-2 border-y-2 border-gray-300 bg-white text-left" dir="rtl">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($workoutLibraries as $index => $workoutLibrary)
                                <tr class="{{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-white' }}">
                                    <td dir="ltr" class="p-3 border-s-2 border-y-2 border-gray-300 text-left">
                                        {{ $workoutLibrary->categoryOption->category_name }}
                                    </td>
                                    <td class="p-3 border-y-2 border-gray-300 text-left">
                                        {{ $workoutLibrary->type }}
                                    </td>
                                    <td class="p-3 border-y-2 border-gray-300 text-left">
                                        {{ $workoutLibrary->workout }}
                                    </td>
                                    <td class="p-3 border-y-2 border-gray-300 text-left">
                                        {{ $workoutLibrary->link }}
                                    </td>
                                    <td dir="rtl" class="p-3 border-s-2 border-y-2 border-gray-300 ">
                                        <div class="flex space-x-3 ">
                                            <form action="{{ route('workout-library.delete', ['id' => $workoutLibrary->id]) }}" method="POST" dir="ltr">
                                                @csrf
                                                @method('DELETE')

                                                <a dir="ltr" href="#" onclick="edit({{ $workoutLibrary->id }}, '{{ $workoutLibrary->categoryOption->category_name }}', '{{ $workoutLibrary->type }}', '{{ $workoutLibrary->workout }}', '{{ $workoutLibrary->link }}')" class="mr-8">
                                                    <i class="text-[#fd8300] bi bi-pencil"></i>
                                                    <span class="text-black">Edit</span>
                                                </a>
                                                <button dir="ltr" type="submit" class="mr-7" onclick="return confirm('Are you sure you want to delete this entry?')">
                                                    <i class="text-[#fd8300] bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
    <script src="{{ asset('js/admin.js') }}" defer></script>
</body>

</html>
