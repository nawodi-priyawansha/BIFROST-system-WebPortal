<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Header</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha384-uXf6sr8AaXNpfLE4u1jL1EB5Yc5zH06smif1RtZWm1sC2C2Mi41WIebh5q1Q0ynP" crossorigin="anonymous">
</head>

<body>
    <header class='fixed z-20 flex items-center w-full bg-white header md:mb-4 lg:h-20 md:h-20'>
        <div class="container bg-black w-full">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-between p-2 gap-x-3 sm:gap-x-8">
                    <!-- Logo -->
                    <div class='md:mt-2'>
                        <img src="{{ asset('images/valhalla-logo.png') }}" alt="Logo" class='w-16 md:w-20' />
                    </div>
                    <div class="text-white font-bold">
                        <!-- Toggle button -->
                        <button onclick="toggleSidebar()" class="cursor-pointer border-2 border-black ">
                            <i id="toggle-icon"
                                class="fa fa-bars text-2xl h-6 w-6 transform transition-transform duration-300"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </i>
                        </button>
                        <!-- Toggle button -->
                    </div>
                </div>
                @if (Request::is('user/dashboard'))
                    <!-- menu -->
                    <div class="flex items-center justify-center bg-black p-2 rounded-lg space-x-4 sm:space-x-1">
                        <div class="text-white text-2xl cursor-pointer  md:block"><i class="bi bi-chevron-left"></i>
                        </div>
                        <div class="flex items-center  flex-grow">
                            <div>
                                <div class="text-red-500 text-xs sm:text-xs">Day 2, WEEK 6</div>
                                {{-- <div class="text-white text-xs hidden">Today</div> --}}
                                <div class="text-white text-xs   sm:text-sm">Today 7th June, 2023</div>
                                {{-- <div class="text-white text-xs hidden">7th June, 2023</div> --}}
                            </div>
                        </div>
                        <div class="text-white text-2xl cursor-pointer w-2"><i class="bi bi-chevron-right"></i></div>
                    </div>
                @else
                    <div class="navigation  text-white text-2xl font-bold hidden md:block">
                        User Portal
                    </div>
                @endif

                <!-- nav-right -->
                <div class="flex items-center h-20 justify-center ">
                    <div class="flex items-center md:gap-2">
                        <!-- Container for displaying the logged-in user information -->
                        <div class="text-gray-800 mr-20 hidden md:block">
                            <!-- Inner container for the text, setting text color to gray -->
                            <div class="text-gray-400">
                                Logged in as |
                                <!-- Span to highlight the user's name in white color -->
                                <span class="text-white">
                                    @if (Auth::check())
                                        <!-- Check if the user is authenticated -->
                                        {{ Auth::user()->name }} <!-- Display the authenticated user's name -->
                                    @else
                                        Guest <!-- Display 'Guest' if no user is authenticated -->
                                    @endif
                                </span>
                            </div>
                        </div>
                        <a href="#" class=" text-gray-800">
                            <!-- component -->
                            <div class="flex justify-center items-center mr-10 mt-2">
                                <div class="relative md:mb-4 mb-4">
                                    <div class="bottom-4 absolute left-6">
                                        <p
                                            class="flex h-1 w-1 items-center justify-center rounded-full bg-red-500 p-3 text-xs text-white">
                                            0
                                        </p>
                                    </div>
                                    <img src="{{ asset('images/bell.png') }}" class="w-8 h-8"alt="">
                                    {{-- <i class="fa fa-bell text-white text-2xl" aria-hidden="true"></i> --}}
                                </div>
                            </div>
                        </a>
                        <!-- Link that triggers the logout form submission when clicked -->
                        <a href="#" class="text-gray-800"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <!-- Container for centering the logout icon -->
                            <div class="flex justify-center items-center mr-5 mt-2">
                                <!-- Inner container for the icon with margin adjustments for different screen sizes -->
                                <div class="relative md:mb-4 mb-4">
                                    <!-- Logout icon styled with Font Awesome -->
                                    <i class="fa fa-power-off text-red-500 text-2xl" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                        <!-- Hidden form for logging out, triggered by the above link -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf <!-- Laravel CSRF token for security -->
                            <input type="text" value="web" name="type" hidden>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

</body>

</html>
