<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body class=" overflow-y-auto">
    @extends('mobile.layout.mobile-layout')
    @section('content')
        <div class="w-full flex flex-col justify-between min-h-screen h-full ">
            <div class="flex-grow w-full flex items-center justify-center m-0 p-4 bg-cover bg-center bg-no-repeat"
                style="background-image: url('{{ asset('img/valhalla-bg.jpg') }}');">
                <div class="flex w-full flex-col justify-center items-center gap-2.5 pt-20 text-white">
                    <div class=" flex justify-between items-center text-xs">
                        <button class=" px-4 py-2 rounded">DEADLIFT</button>
                        <button class=" px-4 py-2 border rounded">ALT</button>
                    </div>
                    {{-- warmup  --}}


                    <div class="w-full bg-black text-xs bg-opacity-50 p-4 rounded-lg mb-6">
                        <div class="w-full flex justify-between items-center text-white text-lg">
                            <h1 class="font-bold mx-auto">Warmup</h1>
                            <i class="fa fa-chevron-down toggle-icon" aria-hidden="true"></i>

                        </div>

                        <table class="w-full text-white hidden tablee">
                            <thead class="justify-between">
                                <tr>
                                    <th class="py-2">Set</th>
                                    <th class="px-2">Reps</th>
                                    <th class="col-span-2"></th>

                                </tr>
                            </thead>
                            <tbody class="table-body">
                                @foreach ($detailswarmup as $warmupdetail)
                                    <tr class="border-b border-gray-300">
                                        <td class="py-4">{{ $warmupdetail->sets }}</td>
                                        <td class="py-4 workouts">{{ $warmupdetail->workouts->workout }}</td>
                                        <td class="py-4">
                                            <div class="flex items-center justify-center space-x-4">
                                                <button class="px-2 py-1 text-white"
                                                    onclick="decrementValue(this)">-</button>
                                                <span
                                                    class="w-16 bg-white text-black text-center rounded border-none p-1">{{ $warmupdetail->reps }}</span>
                                                <button class="px-2 py-1 text-white"
                                                    onclick="incrementValue(this)">+</button>
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            <label class="inline-flex items-center me-5 cursor-pointer">
                                                <input type="checkbox" value="" class="sr-only peer timer-checkbox" data-rest-time="{{ $warmupdetail->rest }}">
                                                <div
                                                    class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- end warmup --}}
                    {{-- table 1 strengrh --}}
                    <div class="w-full bg-black text-xs bg-opacity-50 p-4 rounded-lg mb-6">
                        <div class="w-full flex justify-between items-center text-white text-lg">
                            <h1 class="font-bold mx-auto">Strength</h1>
                            <i class="fa fa-chevron-down toggle-icon" aria-hidden="true"></i>
                        </div>
                        <table class="w-full text-white hidden tablee">
                            <thead class="justify-between">
                                <tr>
                                    <th class="py-2">Set</th>
                                    <th class="px-2">Reps</th>
                                    <th class="col-span-2"></th>

                                </tr>
                            </thead>
                            <tbody class="table-body"> <!-- Initially hidden table body -->
                                @foreach ($detailsstrength as $strengthdetail)
                                    <tr class="border-b border-gray-300">
                                        <td class="py-4">{{ $strengthdetail->sets }}</td>
                                        <td class="py-4 workouts">{{ $strengthdetail->workouts->workout }}</td>
                                        <td class="py-4">
                                            <div class="flex items-center justify-center space-x-4">
                                                <button class="px-2 py-1 text-white"
                                                    onclick="decrementValue(this)">-</button>
                                                <span
                                                    class="w-16 bg-white text-black text-center rounded border-none p-1">{{ $strengthdetail->reps }}</span>
                                                <button class="px-2 py-1 text-white"
                                                    onclick="incrementValue(this)">+</button>
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            <label class="inline-flex items-center me-5 cursor-pointer">
                                                <input type="checkbox" value="" class="sr-only peer timer-checkbox" data-rest-time="{{ $strengthdetail->rest }}">
                                                <div
                                                    class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach

                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>





                    {{-- end table 1 --}}




                    {{-- table 2 conditioning --}}
                    <div class="w-full bg-black text-xs bg-opacity-50 p-4 rounded-lg mb-6">
                        <div class="w-full flex justify-between items-center text-white text-lg">
                            <h1 class="font-bold mx-auto">Conditioning</h1>
                            <i class="fa fa-chevron-down toggle-icon" aria-hidden="true"></i>
                        </div>
                        <table class="w-full text-white hidden tablee">
                            <thead class="justify-between">
                                <tr>
                                    <th class="py-2">Set</th>
                                    <th class="px-2">Reps</th>
                                    <th class="col-span-2"></th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="table-body"> <!-- Initially hidden table body -->
                                @foreach ($detailsconditioning as $conditioningdetail)
                                    <tr class="border-b border-gray-300">
                                        <td class="py-4">{{ $conditioningdetail->sets }}</td>
                                        <td class="py-4 workouts">{{ $conditioningdetail->workouts->workout }}</td>
                                        <td class="py-4">
                                            <div class="flex items-center justify-center space-x-4">
                                                <button class="px-2 py-1 text-white"
                                                    onclick="decrementValue(this)">-</button>
                                                <span
                                                    class="w-16 bg-white text-black text-center rounded border-none p-1">{{ $conditioningdetail->reps }}</span>
                                                <button class="px-2 py-1 text-white"
                                                    onclick="incrementValue(this)">+</button>
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            <label class="inline-flex items-center me-5 cursor-pointer">
                                                <input type="checkbox" value="" class="sr-only peer timer-checkbox" data-rest-time="{{ $conditioningdetail->rest }}">
                                                <div
                                                    class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>

                    {{-- end table 2 --}}


                    {{-- table 3 weightlifting --}}
                    <div class="w-full bg-black text-xs bg-opacity-50 p-4 rounded-lg mb-6">
                        <div class="w-full flex justify-between items-center text-white text-lg">
                            <h1 class="font-bold mx-auto">Weightlifting</h1>
                            <i class="fa fa-chevron-down toggle-icon" aria-hidden="true"></i>
                        </div>
                        <table class="w-full text-white hidden tablee">
                            <thead class="justify-between">
                                <tr>
                                    <th class="py-2">Set</th>
                                    <th class="px-2">Reps</th>
                                    <th class="col-span-2"></th>
                                </tr>
                            </thead>
                            <tbody class="table-body"> <!-- Initially hidden table body -->
                                @foreach ($detailsweight as $weightdetail)
                                    <tr class="border-b border-gray-300">
                                        <td class="py-4">{{ $weightdetail->sets }}</td>
                                        <td class="py-4 workouts">{{ $weightdetail->workouts->workout }}</td>
                                        <td class="py-4">
                                            <div class="flex items-center justify-center space-x-4">
                                                <button class="px-2 py-1 text-white"
                                                    onclick="decrementValue(this)">-</button>
                                                <span
                                                    class="w-16 bg-white text-black text-center rounded border-none p-1">{{ $weightdetail->reps }}</span>
                                                <button class="px-2 py-1 text-white"
                                                    onclick="incrementValue(this)">+</button>
                                            </div>
                                        </td>
                                        <td class="py-4">
                                            <label class="inline-flex items-center me-5 cursor-pointer">
                                                <input type="checkbox" value="" class="sr-only peer timer-checkbox" data-rest-time="{{ $weightdetail->rest }}">
                                                <div
                                                    class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                                </div>
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- Additional rows for weightlifting -->


                                <!-- Repeat similar rows as needed -->
                            </tbody>
                        </table>
                    </div>

                    {{-- end table 3 --}}



                    <div class="notes text-xs mb-6 w-full">
                        <textarea placeholder="Notes" class="w-full h-20 text-black bg-white rounded-lg p-2 border-none"></textarea>
                    </div>

                    <button class=" px-4 py-2 rounded w-full mb-6">RESET TIMER</button>

                    <div id="timer" class="timer text-center w-full bg-orange-600 p-4 rounded-lg text-2xl mb-10">
                        00:00:00
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const sets = document.querySelectorAll('.set');

                sets.forEach(set => {
                    const plusButton = set.querySelector('.plus');
                    const minusButton = set.querySelector('.minus');
                    const input = set.querySelector('.quantity input');

                    plusButton.addEventListener('click', () => {
                        input.value = parseInt(input.value) + 1;
                    });

                    minusButton.addEventListener('click', () => {
                        if (parseInt(input.value) > 0) {
                            input.value = parseInt(input.value) - 1;
                        }
                    });
                });

                const resetButton = document.querySelector('.reset-timer');
                resetButton.addEventListener('click', () => {
                    // Timer reset logic goes here
                    console.log('Timer reset');
                });
            });
        </script>
        <script>
            function incrementValue(element) {
                var span = element.parentNode.querySelector('span');
                var value = parseInt(span.textContent, 10);
                value = isNaN(value) ? 0 : value;
                value++;
                span.textContent = value;
            }

            function decrementValue(element) {
                var span = element.parentNode.querySelector('span');
                var value = parseInt(span.textContent, 10);
                value = isNaN(value) ? 0 : value;
                value = value <= 0 ? 0 : value - 1;
                span.textContent = value;
            }
        </script>
        <script>
            document.querySelectorAll('.toggle-icon').forEach(icon => {
                icon.addEventListener('click', function() {
                    const table = this.parentElement.nextElementSibling;
                    if (table.classList.contains('hidden')) {
                        table.classList.remove('hidden');
                        this.classList.remove('fa-chevron-down');
                        this.classList.add('fa-minus');
                    } else {
                        table.classList.add('hidden');
                        this.classList.remove('fa-minus');
                        this.classList.add('fa-chevron-down');
                    }
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                const timerElement = document.getElementById('timer');
                let timerInterval;


                function startTimer(duration) {
                    clearInterval(timerInterval);
                    console.log(timerInterval)
                    let timer = duration,
                        minutes, seconds;
                    timerInterval = setInterval(function() {
                        minutes = parseInt(timer / 60, 10);
                        seconds = parseInt(timer % 60, 10);

                        minutes = minutes < 10 ? "0" + minutes : minutes;
                        seconds = seconds < 10 ? "0" + seconds : seconds;

                        timerElement.textContent = minutes + ":" + seconds;

                        if (--timer < 0) {
                            clearInterval(timerInterval);
                            timerElement.textContent = "00:00:00";
                        }
                    }, 1000);
                }

                document.querySelectorAll('.timer-checkbox').forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        if (this.checked) {
                            const restTime = this.getAttribute('data-rest-time');
                            console.log(restTime);
                            const [minutes, seconds] = restTime.split(':').map(Number);
                            const totalSeconds = (minutes * 60) + seconds;
                            console.log(totalSeconds);
                            startTimer(totalSeconds);
                        } else {
                            clearInterval(timerInterval);
                            timerElement.textContent = "00:00:00";
                        }
                    });
                });
            });
        </script>
    @endsection
</body>

</html>
