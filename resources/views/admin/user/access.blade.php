<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <title>Access</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Access Page</title>
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include your custom JavaScript file -->
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>


<body class="font-sans antialiased bg-gray-100">
    @extends('layout.layout')
    @section('content')
        <!-- Main content (Dashboard) -->
        <div class="container transition-width mt-24 flex-grow mx-4" id="container">
            <div class="breadcrumb text-sm mb-4">
                <a href="#" class="text-gray-500 no-underline hover:underline">Home</a> / <span><strong> Access
                    </strong></span>
            </div>
            @foreach ($users as $user)
            <div class="card bg-white p-4 rounded-lg shadow-md border mb-4">
                <table class="w-full">
                    <tr class="border-b flex text-sm flex-col sm:table-row">
                        <td class="py-2 pr-6 text-gray-700 sm:w-1/4">Name</td>
                        <td class="py-2  sm:pl-0 sm:w-3/4"><input type="text" name="name" id="name"
                                value="{{$user->name}}" class="bg-transparent" disabled></td>
                    </tr>
                    <tr class="border-b flex text-sm flex-col sm:table-row">
                        <td class="py-2 pr-6 text-gray-700 sm:w-1/4">Email</td>
                        <td class="py-2  sm:pl-0 sm:w-3/4"><input type="text" name="email" id="email"
                                value="{{$user->email}}" class="bg-transparent" disabled></td>
                    </tr>

                    <tr class="border-b flex text-sm flex-col sm:table-row">
                        <td class="py-2 pr-6 text-gray-700 sm:w-1/4">Pin Number</td>
                        <td class="py-2  sm:pl-0 sm:w-3/4">{{$user->pin}}</td>
                    </tr>
                    <tr class="border-b flex flex-col sm:table-row">
                        <td class="py-2 pr-6 text-gray-700 sm:w-1/5">Access</td>
                        <td class="py-2 pl-2 sm:pl-0 sm:w-full">
                            <div class="access-buttons text-xs flex flex-wrap gap-1 sm:gap-2">
                                <div class="input-container">
                                    <input type="checkbox" id="dashboard" name="dashboard" {{ $user->dashboard == 'enable' ? 'checked' : '' }} />
                                    <label for="dashboard">Dashboard</label>
                                </div>                                
                                <div class="input-container">
                                    <input type="checkbox" id="access" name="access" {{ $user->access == 'enable' ? 'checked' : '' }}/>
                                    <label for="access">Access</label>
                                </div>
                                <div class="input-container">
                                    <input type="checkbox" id="clientManagement" name="clientManagement" {{ $user->client_management == 'enable' ? 'checked' : '' }}/>
                                    <label for="clientManagement">Client Management</label>
                                </div>
                                <div class="input-container">
                                    <input type="checkbox" id="workoutLibrary" name="workoutLibrary" {{ $user->workout_library == 'enable' ? 'checked' : '' }}/>
                                    <label for="workoutLibrary">Workout Library</label>
                                </div>
                                <div class="input-container">
                                    <input type="checkbox" id="session" name="session" {{ $user->session == 'enable' ? 'checked' : '' }}/>
                                    <label for="session">Session</label>
                                </div>
                                <div class="input-container">
                                    <input type="checkbox" id="financial" name="financial" {{ $user->financial == 'enable' ? 'checked' : '' }}/>
                                    <label for="financial">Financial</label>
                                </div>
                                <div class="input-container">
                                    <input type="checkbox" id="communication" name="communication" {{ $user->communication == 'enable' ? 'checked' : '' }}/>
                                    <label for="communication">Communication</label>
                                </div>
                                <div class="input-container">
                                    <input type="checkbox" id="statistics" name="statistics" {{ $user->statistics == 'enable' ? 'checked' : '' }}/>
                                    <label for="statistics">Statistics</label>
                                </div>
                            </div>

                            <div class="access-buttons flex flex-wrap gap-2 mt-2">
                                <label
                                    class="ml-2 text-sm border rounded-lg px-2 py-1 bg-yellow-300 border-yellow-400"><strong>User</strong></label>
                            </div>
                            <div class="access-buttons text-xs flex flex-wrap gap-1 sm:gap-2 mt-2 ">
                                <div class="input-container">
                                    <input type="checkbox" id="user_dashboard" name="user_dashboard" {{ $user->user_dashboard == 'enable' ? 'checked' : '' }}/>
                                    <label for="user_dashboard"
                                        class="border text-gray-500 border-gray-800 bg-white px-4 py-2 rounded-md md:w-auto">Dashboard</label>
                                </div>
                                <div class="input-container">
                                    <input type="checkbox" id="profile" name="profile" {{ $user->profile == 'enable' ? 'checked' : '' }}/>
                                    <label for="profile"
                                        class="border text-gray-500 border-gray-300 bg-white px-4 py-2 rounded-md md:w-auto">Profile</label>
                                </div>
                                <div class="input-container">
                                    <input type="checkbox" id="goals" name="goals" {{ $user->goals == 'enable' ? 'checked' : '' }}/>
                                    <label for="goals"
                                        class="border text-gray-500 border-gray-300 bg-white px-4 py-2 rounded-md md:w-auto">Goals</label>
                                </div>
                                <div class="input-container">
                                    <input type="checkbox" id="achievements" name="achievements" {{ $user->achievements == 'enable' ? 'checked' : '' }}/>
                                    <label for="achievements"
                                        class="border text-gray-500 border-gray-800 bg-white px-2 py-1 sm:px-4 sm:py-2 rounded-md md:w-auto">Achievements</label>
                                </div>
                                <div class="input-container">
                                    <input type="checkbox" id="settings" name="settings" {{ $user->settings == 'enable' ? 'checked' : '' }}/>
                                    <label for="settings"
                                        class="border text-gray-500 border-gray-300 bg-white px-4 py-2 rounded-md md:w-auto">Settings</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b flex flex-col sm:table-row">
                        <td class="py-2 pr-6  text-gray-700 sm:w-1/4">Access Type</td>
                        <td class="access-type flex items-center py-2  sm:pl-0 sm:w-3/4">
                            <input type="checkbox" id="readOnly" class="mr-2" {{ $user->access_type == 'read' ? 'checked' : '' }}>
                            <label for="readOnly">Read Only</label>
                        </td>
                    </tr>
                    <tr class="border-b flex flex-col sm:table-row">
                        <td class="py-2 pr-6  text-gray-700 sm:w-1/4"></td>
                        <td class="access-type flex items-center py-2  sm:pl-0 sm:w-3/4">
                            <div class="flex gap-6">

                                <button id="editAction" class="text-black flex items-center">
                                    <i class="fas fa-edit mr-1"></i>
                                    <span>Edit</span>
                                </button>
                                <button id="saveAction" class="text-black  items-center hidden">
                                    <i class="fas fa-save mr-1"></i>
                                    <span>Save</span>
                                </button>

                                <button id="deleteAction" class=" text-black flex items-center">
                                    <i class="fa-solid fa-trash mr-1"></i>
                                    <i>Delete</i>
                                </button>
                                
                                <button id="resetPinAction" class=" text-black flex items-center">
                                    <i class="fa-solid fa-rotate-right mr-1"></i>
                                    <i>Reset Pin</i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            @endforeach
            {{-- Pagination --}}
            <div class="flex justify-center mt-4">
                <!-- Previous Button -->
                <a href="#"
                    class="flex items-center justify-center px-3 h-8 me-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg>
                    Previous
                </a>
                <a href="#"
                    class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    Next
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>

        </div>

    @endsection

</body>

</html>
