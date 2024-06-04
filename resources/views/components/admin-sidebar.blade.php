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
    <!-- Add custom scrollbar styles -->
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
        }

        /* Customize scrollbar width */
        .scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        /* Customize scrollbar track */
        .scrollbar::-webkit-scrollbar-track {
            background: #cae9ff;
        }

        /* Customize scrollbar thumb */
        .scrollbar::-webkit-scrollbar-thumb {
            background: #5fa8d3;
            border-radius: 4px;
        }

        /* Customize scrollbar thumb on hover */
        .scrollbar::-webkit-scrollbar-thumb:hover {
            background: #1b4965;
        }
    </style>

<!-- Sidebar -->
<aside id="sidebar" class="relative bg-white h-full transition-all duration-300 flex flex-col text-md font-semibold w-18 mt-20">
    <!-- Toggle button -->
    <button onclick="toggleSidebar()" class="absolute -right-3 top-9 cursor-pointer rounded-full border-2 border-black bg-white p-1">
      <!-- SVG icon -->
      <svg id="toggle-icon" class="h-6 w-6 transform rotate-90 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </button>
    <ul class="flex flex-col space-y-1 overflow-y-auto overflow-x-hidden scrollbar">
      <li>
        <a href="#" class="flex items-center space-x-2 py-2 px-4 rounded-md text-black transition-colors duration-300">
          <!-- Icon -->
          <i class="bi bi-grid-3x3-gap w-5 h-5 m-3"></i>
          <!-- Text -->
          <span class="sidebar-item-text" style="display: none;">Dashboard</span>
        </a>          
        <hr class="border-t border-black" />
      </li>
      <li>
        <a href="#" class="flex items-center space-x-2 py-2 px-4 rounded-md text-black transition-colors duration-300">
          <!-- Icon -->
          <i class="bi bi-key w-5 h-5 m-3"></i>
          <!-- Text -->
          <span class="sidebar-item-text" style="display: none;">Access</span>
        </a>
        <hr class="border-t border-black" />
      </li>
      <li>
        <a href="#" class="flex items-center space-x-2 py-2 px-4 rounded-md text-black transition-colors duration-300">
          <!-- Icon -->
          <i class="bi bi-people w-5 h-5 m-3"></i>
          <!-- Text -->
          <span class="sidebar-item-text" style="display: none;">Client Management</span>
        </a>
        <hr class="border-t border-black" />
      </li>
      <li>
        <a href="#" class="flex items-center space-x-2 py-2 px-4 rounded-md text-black transition-colors duration-300">
          <!-- Icon -->
          <i class="bi bi-person-gear w-5 h-5 m-3"></i>
          <!-- Text -->
          <span class="sidebar-item-text" style="display: none;">Workout Library</span>
        </a>
        <hr class="border-t border-black" />
      </li>
      <li>
        <a href="#" class="flex items-center space-x-2 py-2 px-4 rounded-md text-black transition-colors duration-300">
          <!-- Icon -->
          <i class="bi bi-list-check w-5 h-5 m-3"></i>
          <!-- Text -->
          <span class="sidebar-item-text" style="display: none;">Session/Class Module</span>
        </a>
        <hr class="border-t border-black" />
      </li>
      <li>
        <a href="#" class="flex items-center space-x-2 py-2 px-4 rounded-md text-black transition-colors duration-300">
          <!-- Icon -->
          <i class="bi bi-coin w-5 h-5 m-3"></i>
          <!-- Text -->
          <span class="sidebar-item-text" style="display: none;">Financial</span>
        </a>
        <hr class="border-t border-black" />
      </li>
      <li>
        <a href="#" class="flex items-center space-x-2 py-2 px-4 rounded-md text-black transition-colors duration-300">
          <!-- Icon -->
          <i class="bi bi-broadcast-pin w-5 h-5 m-3"></i>
          <!-- Text -->
          <span class="sidebar-item-text" style="display: none;">Communication</span>
        </a>
        <hr class="border-t border-black" />
      </li>
      <li>
        <a href="#" class="flex items-center space-x-2 py-2 px-4 rounded-md text-black transition-colors duration-300">
          <!-- Icon -->
          <i class="bi bi-bar-chart w-5 h-5 m-3"></i>
          <!-- Text -->
          <span class="sidebar-item-text" style="display: none;">Statistics</span>
        </a>
        <hr class="border-t border-black" />
      </li>
    </ul>
  </aside>


   
</body>

</html>
