<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha384-uXf6sr8AaXNpfLE4u1jL1EB5Yc5zH06smif1RtZWm1sC2C2Mi41WIebh5q1Q0ynP" crossorigin="anonymous">


</head>

<body>
    @include('components.admin-header')


    {{-- <div class="flex h-screen overflow-hidden">
        @include('components.admin-sidebar')
    </div>
    <div class="flex-grow bg-gray-100 p-8 overflow-y-auto">
    </div> --}}
  
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
      
        <!-- Container for Sidebar and Main Content -->
        <div class="flex h-screen overflow-hidden ">
          @include("components.admin-sidebar")
          @yield('content')
         
        </div>
      
        <script>
          function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const sidebarTexts = document.querySelectorAll('.sidebar-item-text');
            const toggleIcon = document.getElementById('toggle-icon');
      
            if (sidebar.classList.contains('w-18')) {
              sidebar.classList.remove('w-18');
              sidebar.classList.add('w-80');
              toggleIcon.classList.remove('rotate-90');
              toggleIcon.classList.add('rotate-270');
              sidebarTexts.forEach(text => text.style.display = 'inline');
            } else {
              sidebar.classList.remove('w-80');
              sidebar.classList.add('w-18');
              toggleIcon.classList.remove('rotate-270');
              toggleIcon.classList.add('rotate-90');
              sidebarTexts.forEach(text => text.style.display = 'none');
            }
          }
        </script>
      </body>



{{-- <body>

    <body>
        <div class="w-full flex md:flex-row">
            <div class="md:w-full md:h-full">
                @include('components.admin-sidebar')
            </div>
            <div class="md:w-3/4">
                @include('components.admin-header')
                @yield('content')
                @yield('scripts')
            </div>
        </div>
    </body>

</body> --}}
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const sidebarTexts = document.querySelectorAll('.sidebar-item-text');
        const toggleIcon = document.getElementById('toggle-icon');

        if (sidebar.classList.contains('w-18')) {
            sidebar.classList.remove('w-18');
            sidebar.classList.add('w-80');
            toggleIcon.classList.remove('rotate-90');
            toggleIcon.classList.add('rotate-270');
            sidebarTexts.forEach(text => text.style.display = 'inline');
        } else {
            sidebar.classList.remove('w-80');
            sidebar.classList.add('w-18');
            toggleIcon.classList.remove('rotate-270');
            toggleIcon.classList.add('rotate-90');
            sidebarTexts.forEach(text => text.style.display = 'none');
        }
    }
</script>

</html>
