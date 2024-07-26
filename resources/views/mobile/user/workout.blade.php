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
                                    <th class="py-2"></th>
                                    <th class="px-2">Weight</th>
                                    <th class="px-2">Rep</th>
                                    <th class="col-span-2"></th>

                                </tr>
                            </thead>
                            <tbody class="table-body">
                                @foreach ($detailswarmup as $warmupdetail)
                                    <tr class="border-b border-gray-300">
                                        {{-- Category --}}
                                        <td class="py-4">{{ $warmupdetail->workouts->categoryOption->category_name }} -
                                            {{ $warmupdetail->workouts->workout }}</td>

                                        {{-- Workout --}}
                                        {{-- <td class="py-4 workouts">{{ $warmupdetail->workouts->workout }}</td> --}}
                                        {{-- Weight --}}
                                        <td class="py-4 text-center">{{ $warmupdetail->weight }}</td>
                                        {{-- Reps --}}
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- end warmup --}}

                    {{-- strengrh --}}
                    <div class="w-full bg-black text-xs bg-opacity-50 p-4 rounded-lg mb-6">
                        <div class="w-full flex justify-between items-center text-white text-lg">
                            <h1 class="font-bold mx-auto">Strength</h1>
                            <i class="fa fa-chevron-down toggle-icon" aria-hidden="true"></i>
                        </div>
                        <div class="content hidden">
                            @foreach ($detailsstrength as $strengthdetail)
                                <div class="flex w-full flex-col justify-center items-center gap-2.5 pt-5 text-white">
                                    <div class=" flex justify-between items-center text-base font-bold">
                                        <button class=" px-4 py-2 rounded primary-btn"
                                            data-target="#primary-strength-{{ $loop->index }}">{{ $strengthdetail->workouts->categoryOption->category_name }}
                                            - {{ $strengthdetail->workouts->workout }}</button>
                                        <button class=" px-4 py-2 border rounded alt-btn"
                                            data-target="#alt-strength-{{ $loop->index }}">ALT</button>
                                    </div>
                                </div>
                                <table class="w-full text-white tablee">
                                    <thead class="justify-between">
                                        <tr>
                                            <th class="py-2">Set</th>
                                            <th class="py-2">Weight</th>
                                            <th class="px-2">Rep</th>
                                            <th class="col-span-2"></th>

                                        </tr>
                                    </thead>
                                    <div>
                                        {{-- Primary --}}
                                        <tbody id="primary-strength-{{ $loop->index }}" class="table-body primary-body">
                                            <!-- Initially hidden table body -->
                                            @php
                                                $baseWeight = $strengthdetail->weight; // 80% of 1RM
                                                $totalPercentageIncrease = 0.7; // 70%
                                                $numberOfSets = $strengthdetail->sets;
                                                $percentageIncreasePerSet =
                                                    $totalPercentageIncrease / ($numberOfSets - 1);

                                                $percentages = [];
                                                for ($i = 0; $i < $numberOfSets; $i++) {
                                                    $percentages[] = 0.3 + $percentageIncreasePerSet * $i;
                                                }
                                            @endphp
                                            @for ($setNumber = 1; $setNumber <= $strengthdetail->sets; $setNumber++)
                                                @php
                                                    $setPercentage = $percentages[$setNumber - 1];
                                                    $calculatedWeight = $baseWeight * $setPercentage;
                                                @endphp
                                                <tr class="border-b border-gray-300">
                                                    <td class="py-4">{{ $setNumber }}</td>
                                                    <td class="py-4 workouts text-center">
                                                        {{ number_format($calculatedWeight, 2) }}</td>
                                                    <td class="py-4">
                                                        <div class="flex items-center justify-center space-x-4">
                                                            <button class="px-2 py-1 text-white"
                                                                onclick="decrementValue(this)">-</button>
                                                            <span
                                                                class="w-16 h-7 bg-white text-black text-center rounded border-none p-1">{{ $strengthdetail->reps }}</span>
                                                            <button class="px-2 py-1 text-white"
                                                                onclick="incrementValue(this)">+</button>
                                                        </div>
                                                    </td>
                                                    <td class="py-4">
                                                        <label class="inline-flex items-center me-5 cursor-pointer">
                                                            <input type="checkbox" value=""
                                                                class="sr-only peer timer-checkbox"
                                                                data-rest-time="{{ $strengthdetail->rest }}">
                                                            <div
                                                                class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                                            </div>
                                                        </label>
                                                    </td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                        {{-- Alternative --}}
                                        <tbody id="alt-strength-{{ $loop->index }}" class="table-body alt-body hidden">
                                            <!-- Initially hidden table body -->
                                            @php
                                                $altBaseWeight = $strengthdetail->altweight; // Alternative weight base
                                                $totalPercentageIncreasealt = 0.7; // 70%
                                                $numberOfAltSets = $strengthdetail->altsets;
                                                $percentageIncreasePerSetalt =
                                                    $totalPercentageIncreasealt / ($numberOfAltSets - 1);

                                                $altPercentages = [];
                                                for ($i = 0; $i < $numberOfAltSets; $i++) {
                                                    $altPercentages[] = 0.3 + $percentageIncreasePerSetalt * $i;
                                                }
                                            @endphp
                                            @for ($setNumberalt = 1; $setNumberalt <= $strengthdetail->altsets; $setNumberalt++)
                                                @php
                                                    $setPercentagealt = $altPercentages[$setNumberalt - 1];
                                                    $calculatedAltWeight = $altBaseWeight * $setPercentagealt;
                                                @endphp
                                                <tr class="border-b border-gray-300">
                                                    <td class="py-4">{{ $setNumber }}</td>
                                                    <td class="py-4 workouts text-center">
                                                        {{ number_format($calculatedAltWeight, 2) }}</td>
                                                    <td class="py-4">
                                                        <div class="flex items-center justify-center space-x-4">
                                                            <button class="px-2 py-1 text-white"
                                                                onclick="decrementValue(this)">-</button>
                                                            <span
                                                                class="w-16 h-7 bg-white text-black text-center rounded border-none p-1">{{ $strengthdetail->altreps }}</span>
                                                            <button class="px-2 py-1 text-white"
                                                                onclick="incrementValue(this)">+</button>
                                                        </div>
                                                    </td>
                                                    <td class="py-4">
                                                        <label class="inline-flex items-center me-5 cursor-pointer">
                                                            <input type="checkbox" value=""
                                                                class="sr-only peer timer-checkbox"
                                                                data-rest-time="{{ $strengthdetail->altrest }}">
                                                            <div
                                                                class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                                                            </div>
                                                        </label>
                                                    </td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </div>
                                </table>
                            @endforeach
                        </div>
                    </div>

                    {{-- end strengrh--}}

                    {{-- weight --}}
                    <div class="w-full bg-black text-xs bg-opacity-50 p-4 rounded-lg mb-6">
                        <div class="w-full flex justify-between items-center text-white text-lg">
                            <h1 class="font-bold mx-auto">Weightlifting</h1>
                            <i class="fa fa-chevron-down toggle-icon" aria-hidden="true"></i>
                        </div>
                        <div class="content hidden">
                            @foreach ($detailsweight as $weightdetail)
                                <div class="flex w-full flex-col justify-center items-center gap-2.5 pt-5 text-white">
                                    <div class="flex justify-between items-center text-base font-bold">
                                        <button class="px-4 py-2 rounded primary-btn" data-target="#primary-weight-{{ $loop->index }}">
                                            {{ $weightdetail->workouts->categoryOption->category_name }} - {{ $weightdetail->workouts->workout }}
                                        </button>
                                        <button class="px-4 py-2 border rounded alt-btn" data-target="#alt-weight-{{ $loop->index }}">ALT</button>
                                    </div>
                                </div>

                                <!-- Primary Table -->
                                @foreach ($weightdetail->sets as $setdetail)
                                <table class="w-full text-white tablee">
                                    <thead>
                                        <tr>
                                            <th class="py-2">Set</th>
                                            <th class="py-2">Weight</th>
                                            <th class="px-2">Rep</th>
                                            <th class="col-span-2"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="primary-weight-{{ $loop->index }}" class="table-body primary-body">

                                            @php
                                                $baseWeight = $weightdetail->weight; // Primary weight base
                                                $totalPercentageIncrease = 0.7; // 70%
                                                $numberOfSets = $setdetail->sets;
                                                $percentageIncreasePerSet = $numberOfSets >= 1 ? $totalPercentageIncrease / max(1, $numberOfSets - 1) : 0;
                                                $percentages = array_map(fn($i) => 0.3 + $percentageIncreasePerSet * $i, range(0, $numberOfSets - 1));
                                                //dd($percentages);
                                            @endphp
                                            @for ($setNumber = 1; $setNumber <= $numberOfSets; $setNumber++)
                                                @php
                                                    $setPercentage = $percentages[$setNumber - 1] ?? 0.3;
                                                    if($numberOfSets == 1){
                                                        $calculatedWeight = $baseWeight;
                                                    }else {
                                                        $calculatedWeight = $baseWeight * $setPercentage;
                                                    }
                                                @endphp
                                                <tr class="border-b border-gray-300">
                                                    <td class="py-4">{{ $setNumber }}</td>
                                                    <td class="py-4 text-center">{{ number_format($calculatedWeight, 2) }}</td>
                                                    <td class="py-4">
                                                        <div class="flex items-center justify-center space-x-4">
                                                            <button class="px-2 py-1 text-white" onclick="decrementValue(this)">-</button>
                                                            <span class="w-16 h-7 bg-white text-black text-center rounded border-none p-1">{{ $setdetail->reps }}</span>
                                                            <button class="px-2 py-1 text-white" onclick="incrementValue(this)">+</button>
                                                        </div>
                                                    </td>
                                                    <td class="py-4">
                                                        <label class="inline-flex items-center me-5 cursor-pointer">
                                                            <input type="checkbox" value="" class="sr-only peer timer-checkbox" data-rest-time="{{ $weightdetail->rest }}">
                                                            <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                                                        </label>
                                                    </td>
                                                </tr>
                                            @endfor
                                        @endforeach
                                    </tbody>

                                    <!-- Alternative Table -->
                                    <tbody id="alt-weight-{{ $loop->index }}" class="table-body alt-body hidden">

                                            @php
                                                $altBaseWeight = $weightdetail->alt_weight; // Alternative weight base
                                                $totalPercentageIncreasealt = 0.7; // 70%
                                                $numberOfAltSets = $setdetail->alt_sets;
                                                $percentageIncreasePerSetalt = $numberOfAltSets > 1 ? $totalPercentageIncreasealt / ($numberOfAltSets - 1) : 0;
                                                $altPercentages = array_map(fn($i) => 0.3 + $percentageIncreasePerSetalt * $i, range(0, $numberOfAltSets - 1));
                                            @endphp
                                            @for ($setNumberalt = 1; $setNumberalt <= $numberOfAltSets; $setNumberalt++)
                                                @php
                                                    $setPercentagealt = $altPercentages[$setNumberalt - 1] ?? 0.3;
                                                    $calculatedAltWeight = $altBaseWeight * $setPercentagealt;
                                                @endphp
                                                <tr class="border-b border-gray-300">
                                                    <td class="py-4">{{ $setNumberalt }}</td>
                                                    <td class="py-4 text-center">{{ number_format($calculatedAltWeight, 2) }}</td>
                                                    <td class="py-4">
                                                        <div class="flex items-center justify-center space-x-4">
                                                            <button class="px-2 py-1 text-white" onclick="decrementValue(this)">-</button>
                                                            <span class="w-16 h-7 bg-white text-black text-center rounded border-none p-1">{{ $setdetail->alt_reps }}</span>
                                                            <button class="px-2 py-1 text-white" onclick="incrementValue(this)">+</button>
                                                        </div>
                                                    </td>
                                                    <td class="py-4">
                                                        <label class="inline-flex items-center me-5 cursor-pointer">
                                                            <input type="checkbox" value="" class="sr-only peer timer-checkbox" data-rest-time="{{ $weightdetail->alt_rest }}">
                                                            <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                                                        </label>
                                                    </td>
                                                </tr>
                                            @endfor

                                    </tbody>
                                </table>
                            @endforeach
                        </div>
                    </div>


                    {{-- end weight--}}



                    {{-- table 2 conditioning --}}
                    {{-- <div class="w-full bg-black text-xs bg-opacity-50 p-4 rounded-lg mb-6">
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
                    </div> --}}

                    {{-- end table 2 --}}

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

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.primary-btn').forEach(function(button) {
                    button.addEventListener('click', function() {
                        const targetId = button.getAttribute('data-target');
                        const primaryBody = document.querySelector(targetId);
                        const altBody = primaryBody.parentElement.querySelector('.alt-body');
                        primaryBody.classList.remove('hidden');
                        altBody.classList.add('hidden');
                    });
                });

                document.querySelectorAll('.alt-btn').forEach(function(button) {
                    button.addEventListener('click', function() {
                        const targetId = button.getAttribute('data-target');
                        console.log(button);
                        const altBody = document.querySelector(targetId);
                        const primaryBody = altBody.parentElement.querySelector('.primary-body');
                        altBody.classList.remove('hidden');
                        primaryBody.classList.add('hidden');
                    });
                });
            });
        </script>
        <script>
            function toggleContent(icon) {
                const content = icon.closest('.w-full').querySelector('.content');
                content.classList.toggle('hidden');
                if (content.classList.contains('hidden')) {
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                } else {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                }
            }
        </script>
    @endsection
</body>

</html>
