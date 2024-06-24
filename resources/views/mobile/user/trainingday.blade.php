<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    @extends('mobile.layout.mobile-layout')

    @section('content')
    <div class="w-full flex flex-col justify-between min-h-screen h-full">
        <div class="flex-grow items-center justify-center m-0 p-4 bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('img/valhalla-bg.jpg') }}');">
            <div class="flex flex-col justify-center items-center gap-2.5 pt-32 text-white">

                {{-- Monday Button  --}}
                <button id="monday-btn">
                    <div class="day bg-transparent border w-72 border-black hover:border-white text-white p-5 rounded-lg flex justify-between items-center transition duration-300 ease-in-out">
                        <span class="day-name text-lg font-bold">Monday</span>
                        <span class="date text-sm" id="monday-date"></span>
                    </div>
                </button>
                {{-- Tuesday Button  --}}
                <button id="tuesday-btn">
                    <div class="day bg-transparent border w-72 border-black hover:border-white p-5 rounded-lg flex justify-between items-center transition duration-300 ease-in-out">
                        <span class="day-name text-lg font-bold">Tuesday</span>
                        <span class="date text-sm" id="tuesday-date"></span>
                    </div>
                </button>
                {{-- Wednesday Button  --}}
                <button id="wednesday-btn">
                    <div class="day bg-transparent border w-72 border-black hover:border-white p-5 rounded-lg flex justify-between items-center transition duration-300 ease-in-out">
                        <span class="day-name text-lg font-bold">Wednesday</span>
                        <span class="date text-sm" id="wednesday-date"></span>
                    </div>
                </button>
                {{-- Thursday Button  --}}
                <button id="thursday-btn">
                    <div class="day bg-transparent border w-72 border-black hover:border-white p-5 rounded-lg flex justify-between items-center transition duration-300 ease-in-out">
                        <span class="day-name text-lg font-bold">Thursday</span>
                        <span class="date text-sm" id="thursday-date"></span>
                    </div>
                </button>
                {{-- Friday Button  --}}
                <button id="friday-btn">
                    <div class="day bg-transparent border w-72 border-black hover:border-white p-5 rounded-lg flex justify-between items-center transition duration-300 ease-in-out">
                        <span class="day-name text-lg font-bold">Friday</span>
                        <span class="date text-sm" id="friday-date"></span>
                    </div>
                </button>
                {{-- Saturday Button  --}}
                <button id="saturday-btn">
                    <div class="day bg-transparent border w-72 border-black hover:border-white p-5 rounded-lg flex justify-between items-center transition duration-300 ease-in-out">
                        <span class="day-name text-lg font-bold">Saturday</span>
                        <span class="date text-sm" id="saturday-date"></span>
                    </div>
                </button>
                {{-- Sunday Button  --}}
                <button id="sunday-btn">
                    <div class="day bg-transparent border w-72 border-black hover:border-white p-5 rounded-lg flex justify-between items-center transition duration-300 ease-in-out">
                        <span class="day-name text-lg font-bold">Sunday</span>
                        <span class="date text-sm" id="sunday-date"></span>
                    </div>
                </button>
                
            </div>
        </div>
    </div>
    {{-- Local storage Date Set Script  --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            const today = new Date();
            let todayDay = today.getDay();

            // Adjust todayDay to be in the range 0-6 where Monday is 0 and Sunday is 6
            todayDay = (todayDay === 0 ? 6 : todayDay - 1);

            const weekStart = new Date(today);
            weekStart.setDate(today.getDate() - todayDay);

            const buttons = document.querySelectorAll('button[id$="-btn"]');
            buttons.forEach((button, index) => {
                const dateElement = button.querySelector('.date');
                const dayDate = new Date(weekStart);
                dayDate.setDate(weekStart.getDate() + index);
                const formattedDate = dayDate.toLocaleDateString('en-GB');
                dateElement.textContent = formattedDate;

                if (index === todayDay) {
                    button.querySelector('.day').classList.add('border-white');
                }

                button.addEventListener('click', function () {
                    buttons.forEach(btn => {
                        btn.querySelector('.day').classList.remove('border-white');
                    });
                    this.querySelector('.day').classList.add('border-white');

                    // Save selected day and date to local storage
                    localStorage.setItem('selectedDay', days[index]);
                    localStorage.setItem('selectedDate', formattedDate);
                });
            });
        });
    </script>

    @endsection
</body>

</html>
