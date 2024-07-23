<div id="strength" hidden>
    {{-- hidden input field --}}
    <input type="text" name="selectdates" id="selectdates">
    <input type="text" name="selecttabs" id="selecttabs">
    <div class="ui-block flex flex-col text-lg p-4 bg-gray-50 mr-8 rounded-md gap-4 mb-4 ">
        <div class="duplicateUi" data-index="1">
            <div class="ui-block flex flex-col text-lg p-4 bg-gray-50 mr-8 rounded-md gap-4 mb-4 ">
                <!-- Your UI block content here -->
                <div class="flex gap-5 justify-between">
                    <div class="flex-col w-full ">
                        <div class="flex items-center border-b">
                            <label for="categorys" class="w-60 block mb-1">Category <span
                                    class="text-red-500">*</span></label>
                            <select id="categorys" name="categorys" onchange="getworkoutS(this)"
                                class="w-1/3 px-3 py-3 border flex rounded mb-2">
                                <option value="" selected disabled>-- Select Category --</option>
                            </select>
                        </div>
                        <div class="flex items-center border-b mt-2">
                            <label for="workouts" class="w-60 block mb-1">Workout <span
                                    class="text-red-500">*</span></label>
                            <select id="workouts" name="workouts" class="w-1/3 px-3 py-3 border flex rounded mb-2">
                                <option value="" selected disabled>-- Select Workout --</option>
                            </select>
                        </div>
                        <div class="flex items-center border-b mt-2">
                            <label for="weigth" class="w-60 block mb-1">Weigth <span class="text-red-500">*</span></label>
                            <input type="text" id="weigth" name="weigth"
                                class="w-1/3 px-3 py-3 border flex rounded mb-2">
                            <label for="" class="border bg-white py-3 px-3 mb-2 ">%</label>
                        </div>
        
                        <div class="flex items-center border-b">
                            <label for="custom-number" class="w-60 block mb-1">SETS <span
                                    class="text-red-500">*</span></label>
                            <div class="relative flex items-center max-w-[8rem]">
                                <button type="button"
                                    class="decrement-custom bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>
                                <input type="text" id="sets" name="sets" data-input-counter
                                    class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center my-2 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                    placeholder="0" readonly />
                                <button type="button"
                                    class="increment-custom bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center border-b">
                            <label for="reps" class="w-60 block mb-1">REPS <span
                                    class="text-red-500">*</span></label>
                            <div class="relative flex items-center max-w-[8rem]">
                                <button type="button"
                                    class="decrement-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>
                                <input type="text" id="reps" name="reps" data-input-counter
                                    class="bg-gray-50 border-x-0 border-gray-300 h-11 my-2 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                    placeholder="0" readonly />
                                <button type="button"
                                    class="increment-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center border-b">
                            <label for="rest" class="w-60 block mb-1">Rest <span
                                    class="text-red-500">*</span></label>
                            <div class="relative flex items-center max-w-[8rem]">
                                <button type="button"
                                    class="decrement-rest bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>
                                <input type="text" id="rest" name="rest" placeholder="00:00"
                                    class="bg-gray-50 border-x-0 border-gray-300 h-11 my-2 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                    readonly>
                                <button type="button"
                                    class="increment-rest bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center border-b ">
                            <label for="intensity" class="w-60 block mb-1">Intensity <span
                                    class="text-red-500">*</span></label>
                            <select id="intensity" name="intensity" class="w-1/3 px-3 py-3 border flex rounded my-2">
                                <option value=""selected disabled>-- Select Intensity --
                                </option>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                                <option value="extreme">Extreme</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex-col w-full">
                        <!-- Alternate Category and Workouts -->
                        <div class="flex items-center border-b">
                            <label for="alt-categorys" class="w-60 block mb-1">Category <span
                                    class="text-red-500">*</span></label>
                            <select id="alt-categorys" name="alt-categorys" onchange="getworkoutS(this)"
                                class="w-1/3 px-3 py-3 border flex rounded mb-2">
                                <option value="" selected disabled>-- Select Category --</option>
                            </select>
                        </div>
                        <div class="flex items-center border-b mt-2">
                            <label for="alt-workouts" class="w-60 block mb-1">Workout <span
                                    class="text-red-500">*</span></label>
                            <select id="alt-workouts" name="alt-workouts"
                                class="w-1/3 px-3 py-3 border flex rounded mb-2">
                                <option value="" selected disabled>-- Select Workout --</option>
                            </select>
                        </div>
                        <div class="flex items-center border-b mt-2">
                            <label for="weigth" class="w-60 block mb-1">Weigth <span class="text-red-500">*</span></label>
                            <input type="text" id="weigth" name="weigth"
                                class="w-1/3 px-3 py-3 border flex rounded mb-2">
                            <label for="" class="border bg-white py-3 px-3 mb-2 ">%</label>
                        </div>
        
                        <div class="flex items-center border-b">
                            <label for="alt-sets" class="w-60 block">SETS <span class="text-red-500">*</span></label>
                            <div class="relative flex items-center max-w-[8rem] my-1">
                                <button type="button"
                                    class="decrement-custom bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>
                                <input type="text" id="alt-sets" name="alt-sets" data-input-counter
                                    class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full my-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                    placeholder="0" readonly />
                                <button type="button"
                                    class="increment-custom bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center border-b">
                            <label for="alt-reps" class="w-60 block mb-1">REPS <span
                                    class="text-red-500">*</span></label>
                            <div class="relative flex items-center max-w-[8rem] my-2">
                                <button type="button"
                                    class="decrement-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>
                                <input type="text" id="alt-reps" name="alt-reps" data-input-counter
                                    class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                    placeholder="0" readonly />
                                <button type="button"
                                    class="increment-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center border-b">
                            <label for="alt-rest" class="w-60 block mb-1">Rest <span
                                    class="text-red-500">*</span></label>
                            <div class="relative flex items-center max-w-[8rem] my-2">
                                <button type="button"
                                    class="decrement-rest bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>
                                <input type="text" id="alt-rest" name="alt-rest" placeholder="00:00"
                                    class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                    readonly>
                                <button type="button"
                                    class="increment-rest bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center border-b">
                            <label for="alt-intensity" class="w-60 block mb-1">Intensity <span
                                    class="text-red-500">*</span></label>
                            <select id="alt-intensity" name="alt-intensity"
                                class="w-1/3 px-3 py-3 border flex rounded mb-2 mt-2">
                                <option value="" selected disabled>-- Select Intensity --
                                </option>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                                <option value="extreme">Extreme</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button class="duplicateBtn bg-black text-white py-2 px-4 rounded mb-2 mt-2 text-base">Another</button>
</div>
<script>
    // Function to set category options
    function setCategory(id, categoryName, selectId) {
        const categorySelect = document.getElementById(selectId);
        const option = document.createElement('option');
        option.value = id;
        option.text = categoryName;
        categorySelect.add(option);
    }

    // Function to get categories via AJAX
    function getCategoryS() {
        const selectTab = "strength";

        $.ajax({
            url: "/getCategory",
            type: "POST",
            data: {
                tab: selectTab,
                _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
            },
            success: function(response) {
                console.log(response);
                // Extract the category_options array from the response
                const categoryOptions = response.category_options || [];

                // Clear existing options in the select elements before adding new ones
                ['categorys', 'alt-categorys'].forEach(id => {
                    const categorySelect = document.getElementById(id);
                    categorySelect.innerHTML =
                        '<option value="" selected disabled>-- Select Category --</option>';
                });

                // Loop through each category_option and call the setCategory() function
                categoryOptions.forEach(option => {
                    setCategory(option.id, option.category_name, 'categorys');
                    setCategory(option.id, option.category_name, 'alt-categorys');
                });

                // Optional: Sort the options alphabetically if needed
                ['categorys', 'alt-categorys'].forEach(id => {
                    sortSelectOptions(document.getElementById(id));
                });
            },
            error: function(xhr, status, error) {
                console.error(error); // Handle error
            }
        });
    }

    // Function to sort select options alphabetically
    function sortSelectOptions(selectElement) {
        const options = Array.from(selectElement.options);
        options.sort((a, b) => a.text.localeCompare(b.text));
        selectElement.innerHTML = '';
        options.forEach(option => selectElement.add(option));
    }

    // Function to get workouts via AJAX based on selected category
    function getworkoutS(selectElement) {
        const tab = "strength";
        const selectId = selectElement.value;
        const isAltCategory = selectElement.id === "alt-categorys";
        const workoutSelectId = isAltCategory ? 'alt-workouts' : 'workouts';

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
                const workoutSelect = document.getElementById(workoutSelectId);
                clearOptions(workoutSelect);

                workouts.forEach(workout => {
                    setWorkout(workoutSelect, workout.id, workout.workout);
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            },
        });
    }

    // Function to set workout options
    function setWorkout(selectElement, id, workout) {
        const option = document.createElement('option');
        option.value = id;
        option.textContent = workout;
        selectElement.appendChild(option);
    }

    // Function to clear existing workout options
    function clearOptions(selectElement) {
        selectElement.innerHTML = '<option value="" selected disabled>-- Select Workout --</option>';
    }

    // Call getCategoryS on page load
    document.addEventListener('DOMContentLoaded', function() {
        getCategoryS();
    });
</script>
