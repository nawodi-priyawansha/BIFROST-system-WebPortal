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
    <style>
        .w-1\/3 {
            width: 40% !important;
        }
    </style>
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
                                <a href="warmup">Warmup</a>
                            </li>
                            <li class="tab-item px-4 text-black py-2 rounded-t hover:border-t hover:border-l hover:border-r hover:border-black"
                                id="default-tab">
                                <a href="strength">Strength</a>
                            </li>
                            <li
                                class="tab-item px-4 text-black py-2 rounded-t hover:border-t hover:border-l hover:border-r hover:border-black">
                                <a href="weightlifting">Weightlifting</a>
                            </li>
                            <li
                                class="tab-item px-4 text-black py-2 rounded-t hover:border-t hover:border-l hover:border-r hover:border-black">
                                <a href="conditioning">Conditioning</a>
                            </li>
                            <li
                                class="tab-item px-4 text-black py-2 rounded-t hover:border-t hover:border-l hover:border-r hover:border-black">
                                <a href="test">Test</a>
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
                                id="1day">Day 1</button>
                            <button
                                class="weekday border-l border-t border-b border-r border-black w-2/3 px-2 py-3 text-start hover:bg-black hover:text-white day"
                                id="2day">Day 2</button>
                            <button
                                class="weekday border-l border-t border-b border-r border-black w-2/3 px-2 py-3 text-start hover:bg-black hover:text-white day"
                                id="3day">Day 3</button>
                            <button
                                class="weekday border-l border-t border-b border-r border-black w-2/3 px-2 py-3 text-start hover:bg-black hover-text-white day"
                                id="4day">Day 4</button>
                            <button
                                class="weekday border-l border-t border-b border-r border-black w-2/3 px-2 py-3 text-start hover:bg-black hover-text-white day"
                                id="5day">Day 5</button>
                            <button
                                class="weekday border-l border-t border-b border-r border-black w-2/3 px-2 py-3 text-start hover:bg-black hover-text-white day"
                                id="6day">Day 6</button>
                            <button
                                class="weekday border-l border-t border-b border-r border-black w-2/3 px-2 py-3 rounded-b-md text-start hover:bg-black hover-text-white day"
                                id="7day">Day 7</button>
                        </div>
                    </div>
                    <div class="w-3/4 tabs">
                        @include('admin.components.warmup')
                        @include('admin.components.strength')
                        @include('admin.components.conditioning')
                        @include('admin.components.weightlifting')
                        @include('admin.components.test')
                    </div>

                    <script>
                        // Function to update input names and ids
                        function updateInputNamesAndIds(element, index) {
                            element.querySelectorAll("input").forEach(function(input) {
                                var baseName = input.name.split('_')[0];
                                var baseId = input.id.split('_')[0];
                                input.name = baseName + '_' + index;
                                input.id = baseId + '_' + index;
                            });
                            element.querySelectorAll("select").forEach(function(input) {
                                var baseName = input.name.split('_')[0];
                                var baseId = input.id.split('_')[0];
                                input.name = baseName + '_' + index;
                                input.id = baseId + '_' + index;
                            });
                        }
                    
                        // Function to add a Remove button
                        function addRemoveButton(element) {
                            var removeButton = document.createElement("button");
                            removeButton.innerText = "Remove";
                            removeButton.classList.add('removeBtn', 'bg-[#FB1018]', 'text-white', 'py-2', 'px-4', 'rounded', 'mb-2',
                                'remove-btn', 'w-24',
                                'flex-shrink-0');
                            removeButton.addEventListener("click", function() {
                                element.remove();
                            });
                            element.appendChild(removeButton);
                        }
                    
                        // Function to duplicate the UI
                        function duplicateUI(event) {
                            var duplicateButton = event.target;
                            var duplicateUi = duplicateButton.previousElementSibling;
                    
                            // Check if dataset.index is null or undefined, and set it to 1 if true
                            var index = parseInt(duplicateUi.dataset.index) || 1;
                            console.log(index);
                    
                            // Increment the index
                            index += 1;
                    
                            // Update the dataset.index
                            duplicateUi.dataset.index = index;
                    
                            var clone = duplicateUi.cloneNode(true);
                    
                            // Reset the values of the inputs in the cloned element
                            clone.querySelectorAll("input").forEach(function(input) {
                                input.value = '';
                            });
                    
                            // Update names and ids in the cloned inputs
                            updateInputNamesAndIds(clone, index);
                    
                            // Remove old buttons and add new Remove button
                            clone.querySelectorAll(".duplicateBtn, .removeBtn").forEach(function(button) {
                                button.remove();
                            });
                            addRemoveButton(clone);
                    
                            // Insert the cloned element before the duplicate button
                            duplicateUi.parentElement.insertBefore(clone, duplicateButton);
                        }
                    
                        // Add event listeners to all duplicate buttons
                        document.querySelectorAll(".duplicateBtn").forEach(function(button) {
                            button.addEventListener("click", duplicateUI);
                        });
                    </script>
                    
                </div>
            </div>

        </div>
    @endsection

    {{-- Date Script --}}
    <script>
        // Initialize variables
        let currentDate = new Date();
        let dayOfWeek = currentDate.getDay(); // Get the current day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
        // let selectedDate = "1day"; // Set default date to "1day"
        let selectedDate;
        let selectedTab = null;
        // Map the dayOfWeek to the corresponding selectedDate value
        switch (dayOfWeek) {
            case 0:
                selectedDate = "7day"; // Sunday
                break;
            case 1:
                selectedDate = "1day"; // Monday
                break;
            case 2:
                selectedDate = "2day"; // Tuesday
                break;
            case 3:
                selectedDate = "3day"; // Wednesday
                break;
            case 4:
                selectedDate = "4day"; // Thursday
                break;
            case 5:
                selectedDate = "5day"; // Friday
                break;
            case 6:
                selectedDate = "6day"; // Saturday
                break;
            default:
                selectedDate = "1day"; // Default to Monday if something goes wrong
        }

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
                    date = document.getElementById(selectedDate);

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
                });
            });

            // Default select Current day
            document.getElementById(selectedDate).click();
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

        // Function to change the UI based on selected tab and date
        function changeui(tabName, selectedDate) {
            // set hiden fields to value
            // setHiddenData(tabName,selectedDate);
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
            changeTab(tabName, selectedDate);
        }

        function changeTab(tabName, selectedDate) {
            console.log(tabName, selectedDate);

            // Get all tabs
            var tabs = document.querySelectorAll(".tabs > div");

            // Hide all tabs
            tabs.forEach(function(tab) {
                tab.setAttribute("hidden", true);
            });

            // Show the selected tab
            var tab = document.getElementById(tabName);
            tab.removeAttribute("hidden");

            console.log(tab, selectedDate);
        }


        function logSelection(tabId, dayId) {
            // let tabName = document.querySelector(`#tabs a[href="${tabId}"]`).innerText;
            let dayName = document.getElementById(dayId).innerText;

            // // hidden input field set value Warmup
            const selectdatew = document.getElementById('selectdatew');
            selectdatew.value = dayName;
            const selecttabw = document.getElementById('selecttabw');
            selecttabw.value = tabId;

            // // hidden input field set value Strength
            const selectdates = document.getElementById('selectdates');
            selectdates.value = dayName;
            const selecttabs = document.getElementById('selecttabs');
            selecttabs.value = tabId;

            // // hidden input field set value Conditioning
            const selectdatec = document.getElementById('selectdatec');
            selectdatec.value = dayName;
            const selecttabc = document.getElementById('selecttabc');
            selecttabc.value = tabId;

            // // hidden input field set value Weightlifting
            const selectdatewe = document.getElementById('selectdatewe');
            selectdatewe.value = dayName;
            const selecttabwe = document.getElementById('selecttabwe');
            selecttabwe.value = tabId;

            // // hidden input field set value Test
            const selectdatet = document.getElementById('selectdatet');
            selectdatet.value = dayName;
            const selecttabt = document.getElementById('selecttabt');
            selecttabt.value = tabId;
            // call ajax 
            // getdata(tabName, dayName)
        }

        function setCategory(id, categoryName) {
            const categorySelectW = document.getElementById('categoryw');
            const option = document.createElement('option');
            option.value = id;
            option.text = categoryName;
            categorySelectW.add(option);
        }
    </script>

</body>

</html>
