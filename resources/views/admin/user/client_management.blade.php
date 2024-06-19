<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <title>Document</title>
</head>

<body>
    @extends('layout.layout')
    @section('content')
        <!-- Main content (Dashboard) -->
        <div class="container transition-width mt-24 flex-grow mx-4" id="container">
            <div class="breadcrumb text-sm mb-4">
                <div><a href="#" class="text-gray-500 no-underline hover:underline">Home</a> / <span><strong> Client
                        </strong></span></div>
                <div class="text-3xl mt-3">Class Manager</div>
            </div>
            <div class="border rounded-b-lg bg-white shadow-md mt-10 text-sm">
                <div>
                    {{-- Tab Names --}}
                    <div class="rounded w-11/12 mx-auto mt-4 mb-4">
                        <!-- Tabs -->
                        <ul id="tabs" class="inline-flex pt-2 px-1 w-full border-black border-b">
                            <li
                                class="tab-item px-4 text-black py-2 rounded-t hover:border-t hover:border-l hover:border-r hover:border-black">
                                <a href="#warmup">Warmup</a>
                            </li>
                            <li class="tab-item px-4 text-black py-2 rounded-t hover:border-t hover:border-l hover:border-r hover:border-black"
                                id="default-tab">
                                <a href="#strength">Strength</a>
                            </li>
                            <li
                                class="tab-item px-4 text-black py-2 rounded-t hover:border-t hover:border-l hover:border-r hover:border-black">
                                <a href="#conditioning">Conditioning</a>
                            </li>
                            <li
                                class="tab-item px-4 text-black py-2 rounded-t hover:border-t hover:border-l hover:border-r hover:border-black">
                                <a href="#weightlifting">Weightlifting</a>
                            </li>
                        </ul>
                    </div>

                    {{-- Top Week and year display --}}
                    <div class="flex justify-center text-2xl font-semibold gap-4 mb-6">
                        <p class="cursor-pointer" id="prevWeek">&larr;</p>
                        <h2 id="weekDisplay"></h2>
                        <p class="cursor-pointer" id="nextWeek">&rarr;</p>
                    </div>
                </div>
                <div class="w-full flex mx-4">
                    {{-- side week calender --}}
                    <div class="w-1/4">
                        <div class="flex flex-col text-lg weekday">
                            <button
                                class="border-l border-t border-b border-r border-black w-2/3 px-2 py-3 rounded-t-md text-start hover:bg-black hover:text-white day"
                                id="1day" onclick="test(this)">Day 1</button>
                            <button
                                class="weekday border-l border-t border-b border-r border-black w-2/3 px-2 py-3 text-start hover:bg-black hover:text-white day"
                                id="2day" onclick="test(this)">Day 2</button>
                            <button
                                class="weekday border-l border-t border-b border-r border-black w-2/3 px-2 py-3 text-start hover:bg-black hover:text-white day"
                                id="3day" onclick="test(this)">Day 3</button>
                            <button
                                class="weekday border-l border-t border-b border-r border-black w-2/3 px-2 py-3 text-start hover:bg-black hover-text-white day"
                                id="4day" onclick="test(this)">Day 4</button>
                            <button
                                class="weekday border-l border-t border-b border-r border-black w-2/3 px-2 py-3 text-start hover:bg-black hover-text-white day"
                                id="5day" onclick="test(this)">Day 5</button>
                            <button
                                class="weekday border-l border-t border-b border-r border-black w-2/3 px-2 py-3 text-start hover:bg-black hover-text-white day"
                                id="6day" onclick="test(this)">Day 6</button>
                            <button
                                class="weekday border-l border-t border-b border-r border-black w-2/3 px-2 py-3 rounded-b-md text-start hover:bg-black hover-text-white day"
                                id="7day" onclick="test(this)">Day 7</button>
                        </div>

                    </div>
                    <div class="w-3/4 ">
                        {{-- edit ui views display --}}
                        <div id="forearch"></div>
                        {{-- new add form view --}}
                        <form action="{{ route('clients.store') }}" method="POST">
                            @csrf
                            <div id="block-container" class="flex flex-col text-lg p-4  mr-8 rounded-md gap-4">
                                <div
                                    class="ui-block flex flex-col text-lg p-4 bg-gray-50 mr-8 rounded-md gap-4 mb-4 ">
                                    <!-- Your UI block content here -->
                                    <div class="flex items-center border-b">
                                        <label for="category" class="w-60 block mb-1">Category <span
                                                class="text-red-500">*</span></label>
                                        <select id="category" name="category" onchange="getworkout(this)"
                                            class="w-1/3 px-3 py-2 border flex rounded mb-2" required>
                                            <option value="" selected disabled>-- Select Category --</option>
                                        </select>
                                        <div class="some-other-class"></div>

                                        <div class="some-other-class"></div>
                                        <div class="flex-grow"></div>
                                        <!-- This element will push the button to the right -->
                                       
                                    </div>
                                    <div class="flex items-center border-b">
                                        <label for="workout" class="w-60 block mb-1">Workout <span
                                                class="text-red-500">*</span></label>
                                        <select id="workout" name="workout"
                                            class="w-1/3 px-3 py-2 border flex rounded mb-2" required>
                                            <option value="" selected disabled>-- Select Workout --</option>
                                        </select>
                                    </div>
                                    <div class="flex items-center border-b">
                                        <label for="reps" class="w-60 block mb-1">Reps per set <span
                                                class="text-red-500">*</span></label>
                                        <div class="relative flex items-center max-w-[8rem]">
                                            <button type="button"
                                                class="decrement-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                            <input type="text" id="reps-input" name="custom" data-input-counter
                                                class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="0" value="0" required />
                                            <button type="button"
                                                class="increment-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 18 18">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex items-center border-b">
                                        <label for="custom-number" class="w-60 block mb-1">REPES <span
                                                class="text-red-500">*</span></label>
                                        <div class="relative flex items-center max-w-[8rem]">
                                            <button type="button"
                                                class="decrement-custom bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                            <input type="text" id="custom-input" name="reps" data-input-counter
                                                class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="0" value="0" required />
                                            <button type="button"
                                                class="increment-custom bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 18 18">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex items-center border-b">
                                        <label for="rest" class="w-60 block mb-1">Rest <span
                                                class="text-red-500">*</span></label>
                                        <input type="time" id="rest" name="rest"
                                            class="w-1/3 px-3 py-2 border rounded mb-2" required>
                                    </div>
                                    <div class="flex items-center border-b">
                                        <label for="intensity" class="w-60 block mb-1">Intensity <span
                                                class="text-red-500">*</span></label>
                                        <select id="intensity" name="intensity"
                                            class="w-1/3 px-3 py-2 border flex rounded mb-2" required>
                                            <option value=""selected disabled>-- Select Intensity --</option>
                                            <option value="low">Low</option>
                                            <option value="medium">Medium</option>
                                            <option value="high">High</option>
                                            <option value="extreme">Extreme</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="flex items-center border-b">
                                <label for="intensity" class="w-60 block mb-1"></label>
                                <div class="flex items-center justify-between">
                                    <button type="button" id="add-another"
                                        class="bg-black text-white py-2 px-4 rounded mb-2 mx-8 text-base">+
                                        Another</button>
                                </div>
                            </div>
                            {{-- hidden input field --}}
                            <input type="text" name="selectdate" id="selectdate" hidden>
                            <input type="text" name="selecttab" id="selecttab" hidden>


                            {{-- UI duplicate function --}}
                            <script>
                                let blockIndex = 1;

                                document.getElementById('add-another').addEventListener('click', function() {
                                    addNewBlock();
                                });

                                function addNewBlock() {
                                    // Clone the UI block
                                    var uiBlock = document.querySelector('.ui-block').cloneNode(true);

                                    // Clear input values and update IDs and names
                                    blockIndex++;
                                    uiBlock.querySelectorAll('input, select, button').forEach(input => {
                                        input.value = '';
                                        if (input.id) {
                                            input.id = input.id.split('_')[0] + '_' + blockIndex;
                                        }
                                        if (input.name) {
                                            input.name = input.name.split('_')[0] + '_' + blockIndex;
                                        }
                                    });

                                    // Add remove button to the new block
                                    var removeBtn = document.createElement('button');
                                    removeBtn.setAttribute('type', 'button');
                                    removeBtn.classList.add('bg-red-500', 'text-white', 'py-2', 'px-4', 'rounded', 'mb-2', 'remove-btn', 'w-24');
                                    removeBtn.textContent = 'Remove';
                                    removeBtn.addEventListener('click', function() {
                                        uiBlock.remove();
                                    });
                                    uiBlock.appendChild(removeBtn);

                                    // Append the cloned block to the container
                                    document.getElementById('block-container').appendChild(uiBlock);

                                    // Attach event listeners to the new increment and decrement buttons
                                    uiBlock.querySelectorAll('.decrement-reps').forEach(button => {
                                        button.addEventListener('click', function() {
                                            updateCounter(this, 'decrement');
                                        });
                                    });
                                    uiBlock.querySelectorAll('.increment-reps').forEach(button => {
                                        button.addEventListener('click', function() {
                                            updateCounter(this, 'increment');
                                        });
                                    });
                                    uiBlock.querySelectorAll('.decrement-custom').forEach(button => {
                                        button.addEventListener('click', function() {
                                            updateCustomCounter(this, 'decrement');
                                        });
                                    });
                                    uiBlock.querySelectorAll('.increment-custom').forEach(button => {
                                        button.addEventListener('click', function() {
                                            updateCustomCounter(this, 'increment');
                                        });
                                    });
                                }

                                function updateCounter(button, action) {
                                    const input = button.parentElement.querySelector('input');
                                    let currentValue = parseInt(input.value, 10);
                                    if (isNaN(currentValue)) {
                                        currentValue = 0;
                                    }
                                    if (action === 'increment') {
                                        input.value = currentValue + 1;
                                    } else if (action === 'decrement') {
                                        input.value = Math.max(0, currentValue - 1); // Ensure the value does not go below 0
                                    }
                                }

                                function updateCustomCounter(button, action) {
                                    const input = button.parentElement.querySelector('input');
                                    let currentValue = parseInt(input.value, 10);
                                    if (isNaN(currentValue)) {
                                        currentValue = 0;
                                    }
                                    if (action === 'increment') {
                                        input.value = currentValue + 1;
                                    } else if (action === 'decrement') {
                                        input.value = Math.max(0, currentValue - 1); // Ensure the value does not go below 0
                                    }
                                }

                                // Attach event listeners to the initial increment and decrement buttons
                                document.querySelectorAll('.decrement-reps').forEach(button => {
                                    button.addEventListener('click', function() {
                                        updateCounter(this, 'decrement');
                                    });
                                });
                                document.querySelectorAll('.increment-reps').forEach(button => {
                                    button.addEventListener('click', function() {
                                        updateCounter(this, 'increment');
                                    });
                                });
                                document.querySelectorAll('.decrement-custom').forEach(button => {
                                    button.addEventListener('click', function() {
                                        updateCustomCounter(this, 'decrement');
                                    });
                                });
                                document.querySelectorAll('.increment-custom').forEach(button => {
                                    button.addEventListener('click', function() {
                                        updateCustomCounter(this, 'increment');
                                    });
                                });


                                //  Workout value set
                                function getworkout(selectElement) {
                                    const selecttab = document.getElementById('selecttab');
                                    const tab = selecttab.value;
                                    const selectId = selectElement.value;

                                    const workoutId = selectElement.id.replace('category', 'workout');
                                    console.log('Selected Value:', workoutId);

                                    $.ajax({
                                        url: "/get-workout",
                                        type: "POST",
                                        data: {
                                            tab: tab,
                                            id: selectId,
                                            _token: $('meta[name="csrf-token"]').attr('content')
                                        },
                                        success: function(response) {
                                            console.log(response);
                                            var workoutSelect = $('#' + workoutId);
                                            workoutSelect.empty();
                                            workoutSelect.append('<option value="" selected disabled>-- Select Workout --</option>');
                                            response.workouts.forEach(function(workout) {
                                                workoutSelect.append('<option value="' + workout.id + '">' + workout.workout +
                                                    '</option>');
                                            });
                                        },
                                        error: function(xhr, status, error) {
                                            console.error(error);
                                        },
                                    });
                                }
                            </script>

                            <div class="flex mt-12">
                                <button type="submit"
                                    class="bg-red-600 text-white py-2 px-4 rounded mb-2 hover:bg-red-700">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    @endsection

    {{-- Date Script --}}
    <script>
        // Initialize variables
        let currentDate = new Date();
        let selectedDate = "1day"; // Set default date to "1day"
        let selectedTab = null;

        // When the document content is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Update the week and dates display
            updateWeekAndDates();

            // Event listener for previous week button
            document.getElementById('prevWeek').addEventListener('click', function(event) {
                event.preventDefault();
                changeWeek(-1); // Change to previous week
            });

            // Event listener for next week button
            document.getElementById('nextWeek').addEventListener('click', function(event) {
                event.preventDefault();
                changeWeek(1); // Change to next week
            });

            // Event listeners for tab toggling
            let tabsContainer = document.querySelector("#tabs");
            let tabTogglers = tabsContainer.querySelectorAll("a");
            tabTogglers.forEach(function(toggler, index) {
                toggler.addEventListener("click", function(e) {
                    e.preventDefault();
                    let tabName = this.getAttribute("href");
                    selectedTab = tabName;
                    changeui(selectedTab, selectedDate);
                    // logSelection(selectedTab, selectedDate);
                });

                // Activate default tab
                if (index === 0) {
                    toggler.click();
                }
            });

            // Event listeners for date selection
            let dateLinks = document.querySelectorAll(".day");
            dateLinks.forEach(function(link) {
                link.addEventListener("click", function(e) {
                    e.preventDefault();
                    let dateId = this.getAttribute("id");
                    selectedDate = dateId;
                    changeui(selectedTab, selectedDate);
                    // logSelection(selectedTab, selectedDate);
                });
            });

            // Default select first day
            document.getElementById("1day").click();
        });

        // Function to change the week
        function changeWeek(weekChange) {
            currentDate.setDate(currentDate.getDate() + weekChange * 7);
            updateWeekAndDates();
            logSelection(selectedTab, selectedDate);
        }

        // Function to update the week and dates display
        function updateWeekAndDates() {
            const currentYear = currentDate.getFullYear();
            const weekNumber = getWeekNumber(currentDate);

            // Set week number and year
            document.getElementById('weekDisplay').innerText = `Week ${weekNumber} - ${currentYear}`;

            // Get the start date of the current week (Monday)
            const firstDayOfWeek = getStartOfWeek(currentDate);

            // Populate dates for the current week
            for (let i = 0; i < 7; i++) {
                const dayDate = new Date(firstDayOfWeek);
                dayDate.setDate(firstDayOfWeek.getDate() + i);

                const dayElement = document.getElementById(`${i + 1}day`);
                dayElement.innerText = `${formatDate(dayDate)} ${getDayName(dayDate)}`;
                dayElement.value = `${formatDate(dayDate)} ${getDayName(dayDate)}`;
            }
        }

        // Function to get the week number
        function getWeekNumber(date) {
            const startOfYear = new Date(date.getFullYear(), 0, 1);
            const pastDaysOfYear = (date - startOfYear) / 86400000 + startOfYear.getDay() + 1;
            return Math.ceil(pastDaysOfYear / 7);
        }

        // Function to get the start of the week
        function getStartOfWeek(date) {
            const day = date.getDay();
            const diff = date.getDate() - day + (day === 0 ? -6 : 1); // adjust when day is Sunday
            return new Date(date.setDate(diff));
        }

        // Function to format the date
        function formatDate(date) {
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = String(date.getFullYear()).slice(-2);
            return `${day}/${month}/${year}`;
        }

        // Function to get the day name
        function getDayName(date) {
            const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            return days[date.getDay()];
        }

        // Function to log the selected tab and date
        function logSelection(tabId, dayId) {
            let tabName = document.querySelector(`#tabs a[href="${tabId}"]`).innerText;
            let dayName = document.getElementById(dayId).innerText;
            console.log("Selected Tab:", tabId, "Tab Name:", tabName, "Selected Day ID:", dayId, "Selected Day Name:",
                dayName);

            // hidden input field set value
            const selectdate = document.getElementById('selectdate');
            selectdate.value = dayName;
            const selecttab = document.getElementById('selecttab');
            selecttab.value = tabName;

            // call ajax 
            getdata(tabName, dayName)
        }

        // Function to change the UI based on selected tab and date
        function changeui(tabName, selectedDate) {
            let tabTogglers = document.querySelectorAll("#tabs a");

            // Remove active styles from all tabs
            tabTogglers.forEach(function(toggler) {
                toggler.parentElement.classList.remove("border-t", "border-r", "border-l", "-mb-px", "bg-white",
                    "border-black");
            });

            // Add active styles to the clicked tab
            let toggler = document.querySelector(`#tabs a[href="${tabName}"]`);
            toggler.parentElement.classList.add("border-t", "border-r", "border-l", "-mb-px", "bg-white", "border-black");

            // Remove active styles from all date links
            let dateLinks = document.querySelectorAll(".day");
            dateLinks.forEach(function(link) {
                link.classList.add("hover:bg-black", "hover:text-white", "border-r");
            });

            // Add active styles to the selected date link
            let selectedDateElement = document.getElementById(selectedDate);
            selectedDateElement.classList.remove("hover:bg-black", "hover:text-white", "border-r");

            // Log selected tab and date
            logSelection(tabName, selectedDate);
        }

        // Function for testing
        function test(button) {
            console.log(button.value);
        }

        //  populateWorkouts (already uploard data view) finction-> pass values (Selected Tab & Selected Date)
        function getdata(tab, date) {
            // Your code to process tab and date
            console.log("Selected Tab:", tab);
            console.log("Selected Date:", date);
            $.ajax({
                url: "/class-manager",
                type: "POST",
                data: {
                    tab: tab,
                    date: date,
                    _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                },
                success: function(response) {
                    console.log(response); // Log the entire response object to see its structure

                    // console.log(response.details.workout);

                    populateWorkouts(response.workouts, response.details);
                },
                error: function(xhr, status, error) {
                    console.error(error); // Handle error
                },
            });
        }

        // Define the increment and decrement functions globally
        function increment(inputId) {
            const inputElement = document.getElementById(inputId);
            let currentValue = parseInt(inputElement.value) || 0;
            inputElement.value = currentValue + 1;
        }

        function decrement(inputId) {
            const inputElement = document.getElementById(inputId);
            let currentValue = parseInt(inputElement.value) || 0;
            if (currentValue > 0) {
                inputElement.value = currentValue - 1;
            }
        }

        // get workout in select category for edit
        function handleCategoryChange(selectElement) {
            console.log('Selected category:', selectElement);
            const selecttab = document.getElementById('selecttab');
            const tab = selecttab.value;
            const selectId = selectElement.value;

            const workoutId = selectElement.id.replace('category', 'workout');
            console.log('Selected Value:', workoutId);

            $.ajax({
                url: "/get-workout",
                type: "POST",
                data: {
                    tab: tab,
                    id: selectId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    var workoutSelect = $('#' + workoutId);
                    workoutSelect.empty();
                    workoutSelect.append('<option value="" selected disabled>-- Select Workout --</option>');
                    response.workouts.forEach(function(workout) {
                        workoutSelect.append('<option value="' + workout.id + '">' + workout.workout +
                            '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                },
            });
        }

        // already uploard data view
        function populateWorkouts(workouts, details) {
            console.log(workouts);
            var categorySelect = $('#category');
            categorySelect.empty();
            categorySelect.append('<option value="" selected disabled>-- Select Category --</option>');

            workouts.forEach(function(workout) {
                if (workout.category_option) {
                    categorySelect.append('<option value="' + workout.category_option.id + '">' + workout
                        .category_option.category_name + '</option>');
                }
            });

            if (details.length === 0) {
                var div = document.getElementById("forearch");
                div.innerHTML = ''; // Clear existing content
            } else {
                var div = document.getElementById("forearch");
                div.innerHTML = ''; // Clear existing content

                details.forEach(function(detail) {
                    var divDetail = document.createElement("div");
                    divDetail.innerHTML = `
                    <form action="{{ route('clients.update') }}" method="POST">
                        @csrf
                <div class="flex flex-col text-lg p-4 mr-8 rounded-md gap-4">
                    <div class="flex flex-col text-lg p-4 bg-gray-50 mr-8 rounded-md gap-4 mb-4">
                        <input type="hidden" name="detail_id_${detail.id}" id="detail_id_${detail.id}" value="${detail.id}">
                        
                      <div class="flex items-center border-b">
                        <label for="category_${detail.id}" class="w-60 block mb-1">Category <span class="text-red-500">*</span></label>
                        <select id="category_${detail.id}" name="category_${detail.id}" onchange="handleCategoryChange(this)" class="w-1/3 px-3 py-2 border flex rounded mb-2" required>
                            <option value="${detail.workout.category_option.id}" selected hidden>${detail.workout.category_option.category_name}</option>
                            ${workouts.map(workout => `<option value="${workout.category_option.id}">${workout.category_option.category_name}</option>`).join('')}
                        </select>
                        <div class="flex-grow"></div>
                        <button type="submit" class="bg-black text-white py-2 px-4 rounded mb-2">Edit</button>
                    </div>
                        <div class="flex items-center border-b">
                            <label for="workout_${detail.id}" class="w-60 block mb-1">Workout <span class="text-red-500">*</span></label>
                            <select id="workout_${detail.id}" name="workout_${detail.id}" class="w-1/3 px-3 py-2 border flex rounded mb-2" required>
                                <option value="${detail.workout.id}" selected>${detail.workout.workout}</option>
                            </select>
                        </div>

                        <div class="flex items-center border-b">
                            <label for="reps_per_set_${detail.id}" class="w-60 block mb-1">Reps per Set <span class="text-red-500">*</span></label>
                            <div class="relative flex items-center max-w-[8rem]">
                                <button type="button" class="decrement-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none" onclick="decrement('reps_per_set_input_${detail.id}')">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                    </svg>
                                </button>
                                <input type="text" id="reps_per_set_input_${detail.id}" name="reps_per_set_${detail.id}" data-input-counter class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" value="${detail.reps_per_set}" required />
                                <button type="button" class="increment-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none" onclick="increment('reps_per_set_input_${detail.id}')">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center border-b">
                            <label for="reps_${detail.id}" class="w-60 block mb-1">REPES <span class="text-red-500">*</span></label>
                            <div class="relative flex items-center max-w-[8rem]">
                                <button type="button" class="decrement-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none" onclick="decrement('reps_input_${detail.id}')">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                    </svg>
                                </button>
                                <input type="text" id="reps_input_${detail.id}" name="reps_${detail.id}" data-input-counter class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" value="${detail.reps}" required />
                                <button type="button" class="increment-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none" onclick="increment('reps_input_${detail.id}')">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center border-b">
                            <label for="rest_${detail.id}" class="w-60 block mb-1">Rest <span class="text-red-500">*</span></label>
                            <input type="time" id="rest_${detail.id}" name="rest_${detail.id}" value="${detail.rest}" class="px-3 py-2 border flex rounded mb-2" required>
                        </div>

                        <div class="flex items-center border-b">
                            <label for="intensity_${detail.id}" class="w-60 block mb-1">Intensity <span class="text-red-500">*</span></label>
                            <select id="intensity_${detail.id}" name="intensity_${detail.id}" class="w-1/3 px-3 py-2 border flex rounded mb-2" required>
                                <option value="low" ${detail.intensity === 'low' ? 'selected' : ''}>Low</option>
                                <option value="moderate" ${detail.intensity === 'moderate' ? 'selected' : ''}>Moderate</option>
                                <option value="high" ${detail.intensity === 'high' ? 'selected' : ''}>High</option>
                            </select>
                        </div>
                    </div>
                </div>
                </form>
            `;
                    div.appendChild(divDetail);
                });
            }
        }

        // Call this function to initially populate the workouts and details
        populateWorkouts(workouts, details);


        // Workout value set write function ---> getworkout(selectElement)
    </script>
</body>

</html>
