<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- Sidebar -->
    <aside id="sidebar"
        class="relative bg-white h-full transition-all duration-300 flex flex-col text-md font-semibold mt-20 animate-slide-in-from-left">

        <ul class="flex flex-col space-y-1 overflow-y-auto overflow-x-hidden scrollbar">
            <li>
                <a href="#"
                    class="flex items-center space-x-2 py-2 px-4 rounded-md text-black transition-colors duration-300">
                    <!-- Icon -->
                    <i class="bi bi-grid-3x3-gap w-5 h-5 m-3" onclick="toggleSidebar()"></i>
                    <!-- Text -->
                    <span class="sidebar-item-text" style="display: none;">Dashboard</span>
                </a>
                <hr class="border-t border-black" />
            </li>
            <li>
                <a href="#"
                    class="flex items-center space-x-2 py-2 px-4 rounded-md text-black transition-colors duration-300">
                    <!-- Icon -->
                    <i class="bi bi-people w-5 h-5 m-3" onclick="toggleSidebar()"></i>
                    <!-- Text -->
                    <span class="sidebar-item-text" style="display: none;">Profile</span>
                </a>
                <hr class="border-t border-black" />
            </li>
            <li>
                <a href="#"
                    class="flex items-center space-x-2 py-2 px-4 rounded-md text-black transition-colors duration-300">
                    <!-- Icon -->
                    <i class="bi bi-flag w-5 h-5 m-3" onclick="toggleSidebar()"></i>
                    <!-- Text -->
                    <span class="sidebar-item-text" style="display: none;">Goals (SMART)</span>
                </a>
                <hr class="border-t border-black" />
            </li>
            <li>
                <a href="#"
                    class="flex items-center space-x-2 py-2 px-4 rounded-md text-black transition-colors duration-300">
                    <!-- Icon -->
                    <i class="bi bi-universal-access-circle w-5 h-5 m-3" onclick="toggleSidebar()"></i>
                    <!-- Text -->
                    <span class="sidebar-item-text" style="display: none;">Achievements</span>
                </a>
                <hr class="border-t border-black" />
            </li>
            <li>
                <a href="#"
                    class="flex items-center space-x-2 py-2 px-4 rounded-md text-black transition-colors duration-300">
                    <!-- Icon -->
                    <i class="bi bi-gear w-5 h-5 m-3" onclick="toggleSidebar()"></i>
                    <!-- Text -->
                    <span class="sidebar-item-text" style="display: none;">Settings</span>
                </a>
                <hr class="border-t border-black" />
            </li>
        </ul>
    </aside>
</body>
</html>
