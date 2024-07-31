<div id="conditioning" hidden>
    {{-- hidden input field --}}
    <input type="text" name="selecttabc" id="selecttabc">
    <div id="info-conditioning" class="info-conditioning"></div>
    <form id="conditioning-form" action="/store-conditioning" method="POST">
        @csrf
        <input type="text" name="selectdatec" id="selectdatec">
        <div class="ui-block flex flex-col text-lg pt-4 px-4 bg-gray-50 mr-8 rounded-md">
            <div class="flex-col w-full">
                <div class="flex items-center border-b">
                    <label for="rounds" class="w-60 block ">Rounds </label>
                    <div class="relative flex items-center max-w-[8rem] mb-2 w-1/2">
                        <button type="button" onclick="decrement(this.parentNode.querySelector('input').id)"
                            class="decrement-rounds bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                            <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 1h16" />
                            </svg>
                        </button>
                        <input type="text" id="rounds" name="rounds" data-input-counter
                            class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                            placeholder="0" readonly />
                        <button type="button" onclick="increment(this.parentNode.querySelector('input').id)"
                            class="increment-rounds bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                            <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 1v16M1 9h16" />
                            </svg>
                        </button>
                    </div>
                    <div class="ml-10 flex items-center w-1/2">
                        <label for="amrapCheckbox" class="w-24 block">AMRAP</label>
                        <input type="checkbox" id="amrapCheckbox" name="amrap"
                            class="h-11 w-11 px-3 py-3 border border-gray-300 rounded mb-2 checked:bg-blue-600 checked:border-transparent">
                    </div>
                </div>
            </div>
        </div>
        <div class="duplicateUiC" data-index="1">
            <div class="ui-block flex flex-col text-lg pt-2 px-4 pb-4 bg-gray-50 mr-8 rounded-md gap-4 mb-4">
                <div class="flex-col w-full">
                    {{-- <div class="flex items-center border-b">
                        <label for="rounds_1" class="w-60 block mb-1">Rounds <span class="text-red-500">*</span></label>
                        <div class="relative flex items-center max-w-[8rem] mb-2">
                            <button type="button" onclick="decrement(this.parentNode.querySelector('input').id)"
                                class="decrement-rounds bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h16" />
                                </svg>
                            </button>
                            <input type="text" id="rounds_1" name="rounds_1" data-input-counter
                                class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                placeholder="0" readonly />
                            <button type="button" onclick="increment(this.parentNode.querySelector('input').id)"
                                class="increment-rounds bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                            </button>
                        </div>
                    </div> --}}
                    <div class="flex items-center border-b">
                        <label for="categoryc_1" class="w-60 block mb-1">Category <span
                                class="text-red-500">*</span></label>
                        <select id="categoryc_1" name="categoryc_1" onchange="getworkoutC(this)"
                            class="w-1/3 px-3 py-3 border flex rounded mb-2 ">
                            <option value="" selected disabled>-- Select Category --</option>
                        </select>
                    </div>
                    <div class="flex items-center border-b">
                        <label for="workoutc_1" class="w-60 block mb-1">Workout <span
                                class="text-red-500">*</span></label>
                        <select id="workoutc_1" name="workoutc_1" class="w-1/3 px-3 py-3 border flex rounded mb-2 mt-2">
                            <option value="" selected disabled>-- Select Workout --</option>
                        </select>
                    </div>
                    <div class="flex items-center border-b mt-2">
                        <label for="repsc_1" class="w-60 block mb-1">REPS <span class="text-red-500">*</span></label>
                        <div class="relative flex items-center max-w-[8rem] mb-2">
                            <button type="button" onclick="decrement(this.parentNode.querySelector('input').id)"
                                class="decrement-repsc bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h16" />
                                </svg>
                            </button>
                            <input type="text" id="repsc_1" name="repsc_1" data-input-counter
                                class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                placeholder="0" readonly />
                            <button type="button" onclick="increment(this.parentNode.querySelector('input').id)"
                                class="increment-repsc bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center border-b mt-2">
                        <label for="weigthc_1" class="w-60 block mb-1">
                            Weight <span class="text-red-500">*</span>
                        </label>
                        <input type="number" id="weigthc_1" name="weigthc_1"
                            class="w-1/3 px-3 py-3 border rounded mb-2" required>
                        <select id="unit_1" name="unit_1" class="border bg-white py-3 px-3 mb-2 rounded">
                            <option value="%">%</option>
                            <option value="kg">Kg</option>
                        </select>
                    </div>

                    <button class=" bg-black text-white py-2 px-4 rounded mb-2 mt-2 text-base "
                        onclick="addAnotherClick()" id="idfake_1">Another</button>
                    <div class="flex items-center border-b mt-2">
                        <label for="timeTC_1" class="w-60 block mb-1">Time To Complete<span
                                class="text-red-500">*</span></label>
                        <div class="relative flex items-center max-w-[8rem] mb-2">
                            <button type="button"
                                onclick="adjustRestTime(this.parentNode.querySelector('input').id, -1)"
                                class="decrement-timeTC bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h16" />
                                </svg>
                            </button>
                            <input type="text" id="timeTC_1" name="timeTC_1" data-input-counter
                                placeholder="00:00"
                                class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                placeholder="0" readonly required/>
                            <button type="button"
                                onclick="adjustRestTime(this.parentNode.querySelector('input').id, 1)"
                                class="increment-timeTC bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="showUIC"></div>

    </form>
    <button id="save-button" type="submit"
        class="bg-[#FB1018] text-white py-2 px-4 rounded mb-2 hover:bg-red-700">Save</button>
    <button class="bg-black text-white py-2 px-4 rounded mb-2 mt-2 text-base hidden" id="another"
        type="button">Another</button>
</div>

{{-- click Button --}}
<script>
     document.getElementById('save-button').addEventListener('click', function(event) {
        // Get the original and cloned elements
        const rounds = document.getElementById('rounds').value.trim();
        const amrapCheckbox = document.getElementById('amrapCheckbox').checked;
        let isValid = false;

        // Validate original elements
        if (rounds || amrapCheckbox) {
            isValid = true; // Original fields are valid
        }

        // Validate cloned elements
        document.querySelectorAll('.duplicateUiC').forEach(function(clone) {
            const categorySelect = clone.querySelector('select[name^="categoryc_"]');
            const workoutSelect = clone.querySelector('select[name^="workoutc_"]');
            const repsInput = clone.querySelector('input[name^="repsc_"]');
            const weightInput = clone.querySelector('input[name^="weigthc_"]');
            const unitSelect = clone.querySelector('select[name^="unit_"]');
            const timeInput = clone.querySelector('input[name^="timeTC_"]');

            // Check if required fields are filled
            if (categorySelect.value && workoutSelect.value && repsInput.value && weightInput.value && timeInput.value) {
                isValid = true;
            } else {
                isValid = false;
            }

            // Provide feedback if validation fails
            if (!isValid) {
                alert('Please fill in all required fields in each set of inputs.');
                event.preventDefault(); // Prevent form submission
                return;
            }
        });

        // Only submit the form if all validations pass
        if (isValid) {
            document.getElementById('conditioning-form').submit(); // Manually submit the form if valid
        }
    });
</script>
{{-- UI Duplicate --}}
<script>
    function addAnotherClick() {
        // Simulate click on the "another" button
        document.getElementById('another').click();
        showMaxIdFake();
    }

    function createRemoveButton() {
        var removeButton = document.createElement("button");
        removeButton.innerText = "Remove";
        removeButton.classList.add(
            'removeBtn',
            'bg-[#FB1018]',
            'text-white',
            'py-2',
            'px-4',
            'rounded',
            'mb-2',
            'w-24',
            'flex-shrink-0'
        );
        removeButton.addEventListener("click", function() {
            this.parentElement.remove();
            showMaxIdFake();
        });

        return removeButton;
    }

    function updateAttributes(element, index) {
        element.querySelectorAll('input, select, button').forEach(function(el) {
            var baseName = el.name.split('_')[0];
            var baseId = el.id.split('_')[0];
            el.name = baseName + '_' + index;
            el.id = baseId + '_' + index;
        });
    }

    function clearData(element) {
        element.querySelectorAll('input, select, textarea').forEach(function(el) {
            if (el.tagName.toLowerCase() === 'input') {
                el.value = '';
            } else if (el.tagName.toLowerCase() === 'select') {
                el.selectedIndex = 0;
            } else if (el.tagName.toLowerCase() === 'textarea') {
                el.value = '';
            }
        });
    }

    function cloneAndAppendUI() {
        const originalElement = document.querySelector('.duplicateUiC');

        if (!originalElement) {
            console.error('Original element not found.');
            return;
        }

        // Clone the element
        const clone = originalElement.cloneNode(true);

        // Determine the new index based on the current number of elements
        const index = document.querySelectorAll('.duplicateUiC').length + 1;

        // Clear data in the cloned element
        clearData(clone);
        // Update the data-indexc attribute
        clone.setAttribute('data-indexc', index);

        // Update attributes of input, select, and button elements
        updateAttributes(clone, index);

        // Create and add the remove button
        const removeButton = createRemoveButton();
        clone.appendChild(removeButton);

        // Append the clone to the .showUIC container
        document.querySelector('.showUIC').appendChild(clone);
    }

    function initializeEventListeners() {
        document.getElementById('another').addEventListener('click', cloneAndAppendUI);
    }
    // Initialize event listeners once the DOM is fully loaded
    document.addEventListener('DOMContentLoaded', initializeEventListeners);

    function showMaxIdFake() {
        console.log("object")
        const buttons = document.querySelectorAll('button[id^="idfake_"]');
        let maxId = 0;
        let maxButton = null;

        buttons.forEach(button => {
            const idNumber = parseInt(button.id.split('_')[1]);
            if (idNumber > maxId) {
                maxId = idNumber;
                maxButton = button;
            }
            button.style.display = 'none'; // Hide all buttons
        });

        if (maxButton) {
            maxButton.style.display = 'block'; // Show only the button with the max ID
        }
    }

    // Add event listener to the "another" button
    document.getElementById('another').addEventListener('click', function() {
        console.log('Another button clicked');
        // Add your code for the "another" button click event here
    });

    // Initial call to show only the button with the highest ID
    showMaxIdFake();
</script>


<script>
    // {{-- Get category --}}
    function getcategoryC() {
        const selectTab = "conditioning";

        $.ajax({
            url: "/getCategory",
            type: "POST",
            data: {
                tab: selectTab,
                _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
            },
            success: function(response) {
                // console.log(response);
                // Extract the category_options array from the response
                const categoryOptions = response.category_options || [];

                // Clear existing options in the select elements before adding new ones
                ['categoryc_1'].forEach(id => {
                    const categorySelect = document.getElementById(id);
                    categorySelect.innerHTML =
                        '<option value="" selected disabled>-- Select Category --</option>';
                });

                // Loop through each category_option and call the setCategory() function
                categoryOptions.forEach(option => {
                    setCategory(option.id, option.category_name, 'categoryc_1');
                });

                // Optional: Sort the options alphabetically if needed
                ['categoryc_1'].forEach(id => {
                    sortSelectOptions(document.getElementById(id));
                });

                //TO DO Set the default selected category to "hinge" (case-insensitive) and trigger onchange
                ['categoryc_1'].forEach(id => {
                    const categorySelect = document.getElementById(id);
                    const options = categorySelect.options;
                    const defaultCategory = "hinge".toLowerCase();
                    let optionFound = false;

                    for (let i = 0; i < options.length; i++) {
                        if (options[i].text.toLowerCase() === defaultCategory) {
                            categorySelect.selectedIndex = i;
                            optionFound = true;
                            break;
                        }
                    }

                    // Trigger the onchange event if the option was found
                    if (optionFound) {
                        const event = new Event('change', {
                            bubbles: true
                        });
                        categorySelect.dispatchEvent(event);
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error(error); // Handle error
            }
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        getcategoryC();
    });
    // {{-- Get workout --}}
    function getworkoutC(selectElement) {
        // console.log(selectElement);
        const tab = "conditioning"; // Assuming the tab is predefined for warmup
        const selectId = selectElement.value; // Get the value of the selected element

        // Split the ID of the select element by underscores
        const idParts = selectElement.id.split('_');

        // Determine the workout select element ID based on the category type
        let workoutSelectId;
        if (idParts[0] === 'categoryc') {
            workoutSelectId = `workoutc_${idParts[1]}`;
        } else {
            console.error('Unknown category type');
            return;
        }

        // Ensure the workout select element exists before performing operations
        const workoutSelect = document.getElementById(workoutSelectId);
        if (!workoutSelect) {
            console.error('Workout select element not found');
            return;
        }

        $.ajax({
            url: "/get-workout",
            type: "POST",
            data: {
                tab: tab,
                id: selectId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                const workouts = response.workouts || [];
                clearOptions(workoutSelect);

                workouts.forEach(workout => {
                    setWorkout(workoutSelect, workout.id, workout.workout);
                });
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
        });
    }
    // Time to complete
    function adjustRestTime(id, adjustment) {
        // Get the current time value
        let input = document.getElementById(id); // Ensure you get the input element using the id
        let [minutes, seconds] = input.value.split(':').map(Number);

        // Convert to total seconds
        if (isNaN(minutes)) minutes = 0;
        if (isNaN(seconds)) seconds = 0;
        let totalSeconds = (minutes * 60) + seconds;

        // Update the time based on adjustment
        totalSeconds += adjustment;
        if (totalSeconds < 0) totalSeconds = 0; // Prevent negative values

        // Convert back to minutes and seconds
        minutes = Math.floor(totalSeconds / 60);
        seconds = totalSeconds % 60;

        // Format the value as MM:SS
        input.value = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    }
</script>

{{-- data fetch and update --}}
<script>
    function getconditioning() {
        var selectDate = document.getElementById('selectdatec').value;
        console.log(selectDate);
        $.ajax({
            url: "/getConditioning",
            type: "POST",
            data: {
                date: selectDate,
                _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
            },
            success: function(response) {
                console.log(response);
                setConditioning(response.result, response.categoryOptions);
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    function setConditioning(array, categoryOptionsArray) {
        console.log(array);
    }

    document.addEventListener("DOMContentLoaded", function() {
        getconditioning();
    });
</script>
