<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @extends('mobile.layout.mobile-layout')

    @section('content')
        <div class="w-full flex flex-col justify-between min-h-screen h-full">
            <div class="flex-grow items-center justify-center m-0 p-4 bg-cover bg-center bg-no-repeat"
                style="background-image: url('{{ asset('img/valhalla-bg.jpg') }}');">
                <div class="flex flex-col justify-center items-center gap-2.5 pt-32 text-white">
                    <div
                        class="day bg-black bg-transparent border w-72 border-white text-white p-5 rounded-lg  flex justify-between items-center transition duration-300 ease-in-out">
                        <span class="day-name text-lg font-bold">Monday</span>
                        <span class="date text-sm">02/02/2024</span>
                    </div>
                    <div
                        class="day bg-black bg-transparent border w-72 border-white p-5 rounded-lg  flex justify-between items-center transition duration-300 ease-in-out">
                        <span class="day-name text-lg font-bold">Tuesday</span>
                        <span class="date text-sm">02/02/2024</span>
                    </div>
                    <div
                        class="day bg-black bg-transparent border w-72 border-white p-5 rounded-lg  flex justify-between items-center transition duration-300 ease-in-out">
                        <span class="day-name text-lg font-bold">Wednesday</span>
                        <span class="date text-sm">02/02/2024</span>
                    </div>
                    <div
                        class="day bg-black bg-transparent border w-72 border-white p-5 rounded-lg  flex justify-between items-center transition duration-300 ease-in-out">
                        <span class="day-name text-lg font-bold">Thursday</span>
                        <span class="date text-sm">02/02/2024</span>
                    </div>
                    <div
                        class="day bg-black bg-transparent border w-72 border-white p-5 rounded-lg  flex justify-between items-center transition duration-300 ease-in-out">
                        <span class="day-name text-lg font-bold">Friday</span>
                        <span class="date text-sm">02/02/2024</span>
                    </div>
                    <div
                        class="day bg-black bg-transparent border w-72 border-white p-5 rounded-lg  flex justify-between items-center transition duration-300 ease-in-out">
                        <span class="day-name text-lg font-bold">Saturday</span>
                        <span class="date text-sm">02/02/2024</span>
                    </div>
                </div>
            </div>
          
        </div>
        </div>
    </div>
    {{-- Local storage Date Set Script --}}
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
