<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header class='fixed z-20 flex items-center w-full bg-white header md:mb-4 lg:h-20 md:h-20'>
        <div class="container bg-black w-full">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-between p-2 gap-x-8">
                    <!-- Logo -->
                    <div class='md:mt-2'>
                        <img src="{{ asset('images/valhalla-mobile-logo.png') }}" alt="Logo" class='w-16 md:w-20' />
                    </div>
                </div>
                <!-- menu -->
                <div class="navigation  text-white text-2xl font-bold ">
                    TRAINING DAY
                </div>
                <!-- nav-right -->
                <div class="flex items-center h-20 justify-center ">
                    <div class="flex items-center md:gap-2">
            
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>
</html>