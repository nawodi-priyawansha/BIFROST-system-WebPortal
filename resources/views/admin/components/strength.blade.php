<div id="strength" hidden>
    {{-- hidden input field --}}
    <div class="flex gap-5 p-4 mr-8 rounded-md mb-4 font-bold text-xl">
        <div class="flex justify-center text-center items-center w-1/2">Primary</div>
        <div class="flex justify-center text-center items-center w-1/2">Alternate</div>
        <button class="bg-black text-white py-2 px-4 rounded mb-2 mt-2 text-base">Clear</button>
    </div>
    <form action="{{ route('save-strength') }}" method="POST">
        @csrf
        <input type="text" name="selectdates" id="selectdates" hidden>
        <input type="text" name="selecttabs" id="selecttabs" hidden>
       
            <div class="duplicateUiStrength" data-index="1" id="uiContainerStrength">
                <div class="ui-block flex flex-col text-lg p-4 bg-gray-50 mr-8 rounded-md gap-4 mb-4 ">

                    <!-- Your UI block content here -->

                    <div class="flex gap-5 justify-between mt-4">
                        {{-- start primary --}}
                        <div class=" flex-col w-full border-r border-r-black">
                            <div class="flex items-center border-b px-3">
                                <label for="categorys_1" class="w-60 block mb-1">Category <span
                                        class="text-red-500">*</span></label>
                                <select id="categorys_1" name="categorys_1" onchange="getworkoutS(this)"
                                    class="w-2/3 px-3 py-3 border flex rounded mb-2">
                                    <option value="" selected disabled>-- Select Category --</option>
                                </select>
                            </div>
                            <div class="flex items-center border-b mt-2 px-3">
                                <label for="workouts_1" class="w-60 block mb-1">Workout <span
                                        class="text-red-500">*</span></label>
                                <select id="workouts_1" name="workouts_1"
                                    class="w-2/3 px-3 py-3 border flex rounded mb-2">
                                    <option value="" selected disabled>-- Select Workout --</option>
                                </select>
                            </div>
                            <div class="flex items-center border-b mt-2 px-3">
                                <label for="weigth_1" class="w-60 block mb-1">Weigth <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="weigth_1" name="weigth_1"
                                    class="w-2/3 px-3 py-3 border flex rounded mb-2">
                                <label for="" class="border bg-white py-3 px-3 mb-2 ">%</label>
                            </div>
                            <!-- SETS Section -->
                            <div class="border-b" id="duplicateSetUI">
                                <div class="">
                                    <div class="flex items-center sets-view">
                                        <label for="sets_1" class="w-60 block mb-1">SETS <span
                                                class="text-red-500">*</span></label>
                                        <div class="relative flex items-center max-w-[8rem]">
                                            <button type="button"
                                                onclick="decrement(this.parentNode.querySelector('input').id)"
                                                class="decrement-custom bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 18 2">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                            <input type="text" id="sets_1" name="sets_1" data-input-counter
                                                class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center my-2 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                                placeholder="0" readonly />
                                            <button type="button"
                                                onclick="increment(this.parentNode.querySelector('input').id)"
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


                                    {{-- Set Refs --}}
                                    <div class="flex items-center border-b">
                                        <label for="reps" class="w-60 block mb-1">REPS <span
                                                class="text-red-500">*</span></label>
                                        <div class="relative flex items-center max-w-[8rem]">
                                            <button type="button"
                                                onclick="decrement(this.parentNode.querySelector('input').id)"
                                                class="decrement-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 18 2">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                            <input type="text" id="reps_1" name="reps_1" data-input-counter
                                                class="bg-gray-50 border-x-0 border-gray-300 h-11 my-2 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                                placeholder="0" readonly />
                                            <button type="button"
                                                onclick="increment(this.parentNode.querySelector('input').id)"
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

                                    <div class="duplicate-sets-strength" id="duplicate-sets_1"></div>
                                    <div class="ml-60">
                                        <button id="addset_1" onclick="duplicateSetStrength(this.id)" type="button"
                                            class="bg-black text-white py-2 px-4 rounded mb-2 mt-2 text-base">
                                            <i class="fas fa-plus text-[12px]"></i> Add set</button>
                                    </div>
                                </div>
                            </div>

                            <!-- REST Section -->
                            <div class="flex items-center border-b mt-4">
                                <label for="rest" class="w-60 block mb-1">Rest <span
                                        class="text-red-500">*</span></label>
                                <div class="relative flex items-center max-w-[8rem]">
                                    <button type="button" onclick="changeRestTime(this, -15)"
                                        class="decrement bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                        </svg>
                                    </button>
                                    <input type="text" id="rest_1" name="rest_1" placeholder="00:00"
                                        class="bg-gray-50 border-x-0 border-gray-300 h-11 my-2 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                        readonly />
                                    <button type="button" onclick="changeRestTime(this, 15)"
                                        class="increment bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="flex items-center border-b ">
                                <label for="intensity" class="w-60 block mb-1">Intensity <span
                                        class="text-red-500">*</span></label>
                                <select id="intensity_1" name="intensity_1"
                                    class="w-1/3 px-3 py-3 border flex rounded my-2">
                                    <option value=""selected disabled>-- Select Intensity --
                                    </option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                    <option value="extreme">Extreme</option>
                                </select>
                            </div>
                        </div>
                        {{-- end primary --}}

                        {{-- start alternative --}}
                        <div class="flex-col w-full">
                            <!-- Alternate Category and Workouts -->

                            <div class="flex items-center border-b px-3">
                                <label for="alt-categorys_1" class="w-60 block mb-1">Category <span
                                        class="text-red-500">*</span></label>
                                <select id="alt-categorys_1" name="alt-categorys_1" onchange="getworkoutS(this)"
                                    class="w-2/3 px-3 py-3 border flex rounded mb-2">
                                    <option value="" selected disabled>-- Select Category --</option>
                                </select>
                            </div>
                            <div class="flex items-center border-b mt-2 px-3">
                                <label for="alt-workouts_1" class="w-60 block mb-1">Workout <span
                                        class="text-red-500">*</span></label>
                                <select id="alt-workouts_1" name="alt-workouts_1"
                                    class="w-2/3 px-3 py-3 border flex rounded mb-2">
                                    <option value="" selected disabled>-- Select Workout --</option>
                                </select>
                            </div>
                            <div class="flex items-center border-b mt-2">
                                <label for="weigth" class="w-60 block mb-1">Weigth <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="alt-weigth_1" name="alt-weigth_1"
                                    class="w-2/3 px-3 py-3 border flex rounded mb-2">
                                <label for="" class="border bg-white py-3 px-3 mb-2 ">%</label>
                            </div>

                            {{-- alternate sets --}}
                            <div class="border-b" id="altduplicateSetUI">
                                <div class="">
                                    <div class="flex items-center">
                                        <label for="alt-sets" class="w-60 block">SETS <span
                                                class="text-red-500">*</span></label>
                                        <div class="relative flex items-center max-w-[8rem] my-1">
                                            <button type="button"
                                                onclick="decrement(this.parentNode.querySelector('input').id)"
                                                class="decrement-custom bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 18 2">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                            <input type="text" id="alt-sets_1" name="alt-sets_1"
                                                data-input-counter
                                                class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full my-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                                placeholder="0" readonly />
                                            <button type="button"
                                                onclick="increment(this.parentNode.querySelector('input').id)"
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
                                    {{-- Altertnative reps --}}
                                    <div class="flex items-center border-b">
                                        <label for="alt-reps" class="w-60 block mb-1">REPS <span
                                                class="text-red-500">*</span></label>
                                        <div class="relative flex items-center max-w-[8rem] my-2">
                                            <button type="button"
                                                onclick="decrement(this.parentNode.querySelector('input').id)"
                                                class="decrement-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 18 2">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                            <input type="text" id="alt-reps_1" name="alt-reps_1"
                                                data-input-counter
                                                class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                                placeholder="0" readonly />
                                            <button type="button"
                                                onclick="increment(this.parentNode.querySelector('input').id)"
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
                                    <div class="altduplicate-setsstrength" id="alt-duplicate-sets_1"></div>
                                    <div class="ml-60">
                                        <button id="altaddset_1" onclick="altduplicateSetStrength(this.id)"
                                            type="button"
                                            class="bg-black text-white py-2 px-4 rounded mb-2 mt-2 text-base">
                                            <i class="fas fa-plus text-[12px]"></i> Add set</button>
                                    </div>
                                </div>
                            </div>

                            {{-- alternate Rest --}}
                            <div class="flex items-center border-b mt-4">
                                <label for="alt-rest" class="w-60 block mb-1">Rest <span
                                        class="text-red-500">*</span></label>
                                <div class="relative flex items-center max-w-[8rem] my-2">
                                    <button type="button"onclick="changeRestTime(this, -15)"
                                        class="decrement-rest bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                        </svg>
                                    </button>
                                    <input type="text" id="alt-rest_1" name="alt-rest_1" placeholder="00:00"
                                        class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                        readonly />
                                    <button type="button" onclick="changeRestTime(this, 15)"
                                        class="increment-rest bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="flex items-center border-b">
                                <label for="alt-intensity" class="w-60 block mb-1">Intensity <span
                                        class="text-red-500">*</span></label>
                                <select id="alt-intensity_1" name="alt-intensity_1"
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
                        {{-- end  alternative --}}
                    </div>

                </div>
            </div>
        
        <div id="cloneDisplayContainerStrength"></div>
        <div class=" flex flex-col gap-5">
            <a class=" bg-black text-white py-2 px-4 rounded mt-2 text-center text-base w-32" id="cloneButton">Another</a>
            <button type="submit" class="bg-[#FB1018] text-white py-2 px-4  rounded mb-2 hover:bg-red-700 w-24">Save</button>
        </div>

    </form>

</div>



{{-- get category and workout --}}
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
                ['categorys_1', 'alt-categorys_1'].forEach(id => {
                    const categorySelect = document.getElementById(id);
                    categorySelect.innerHTML =
                        '<option value="" selected disabled>-- Select Category --</option>';
                });

                // Loop through each category_option and call the setCategory() function
                categoryOptions.forEach(option => {
                    setCategory(option.id, option.category_name, 'categorys_1');
                    setCategory(option.id, option.category_name, 'alt-categorys_1');
                });

                // Optional: Sort the options alphabetically if needed
                ['categorys_1', 'alt-categorys_1'].forEach(id => {
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
        const isAltCategory = selectElement.id.startsWith("alt-categorys");
        const workoutSelectId = isAltCategory ? `alt-workouts_${selectElement.id.split('_')[1]}` :
            `workouts_${selectElement.id.split('_')[1]}`;

        $.ajax({
            url: "/get-workout",
            type: "POST",
            data: {
                tab: tab,
                id: selectId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log("Response", response)
                const workouts = response.workouts || [];
                const workoutSelect = document.getElementById(workoutSelectId);
                clearOptionstrength(workoutSelect);

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
    function clearOptionstrength(selectElement) {
        selectElement.innerHTML = '<option value="" selected disabled>-- Select Workout --</option>';
    }

    // Call getCategoryS on page load
    document.addEventListener('DOMContentLoaded', function() {
        getCategoryS();
    });
</script>

{{-- rest time calculate --}}
<script>
    function changeRestTime(button, delta) {
        // Find the input element within the same parent container
        const input = button.parentNode.querySelector('input');

        // Get the current time value
        let [minutes, seconds] = input.value.split(':').map(Number);

        // Convert to total seconds
        if (isNaN(minutes)) minutes = 0;
        if (isNaN(seconds)) seconds = 0;
        let totalSeconds = (minutes * 60) + seconds;

        // Update the time
        totalSeconds += delta;
        if (totalSeconds < 0) totalSeconds = 0; // Prevent negative values

        // Convert back to minutes and seconds
        minutes = Math.floor(totalSeconds / 60);
        seconds = totalSeconds % 60;

        // Format the value as MM:SS
        input.value = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    }
</script>


{{-- clear function and other --}}
<script>
    // Function to update input names and IDs for the cloned element
    function updateNamesAndIdss(element, index) {
        element.querySelectorAll("input, select, button").forEach(function(el) {
            var baseName = el.name.split('_')[0];
            var baseId = el.id.split('_')[0];
            el.name = baseName + '_' + index;
            el.id = baseId + '_' + index;
        });
    }

    // Function to add a remove button to the cloned element
    function addRemoveButtonToElementstrength(element) {
        var removeButton = document.createElement("button");
        removeButton.innerText = "Remove";
        removeButton.classList.add(
            'removeBtnStrength',
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
            element.remove();
        });
        element.appendChild(removeButton);
    }

    // Function to handle the duplication of UI elements
    function handleUiDuplications(event) {
        var cloneButton = event.target;
        var originalUiElement = cloneButton.closest(
            '.duplicateUiStrength'); // Adjusted to find the closest element with class `duplicateUi`

        // Retrieve or set the index for the new clone
        var index = parseInt(originalUiElement.dataset.index) || 1;
        index += 1;
        originalUiElement.dataset.index = index;

        // Clone the original UI element
        var clonedElement = originalUiElement.cloneNode(true);

        // Clear content of duplicate-sets in the cloned element
        var duplicateSets = clonedElement.querySelector(".duplicate-sets-strength");
        if (duplicateSets) {
            duplicateSets.innerHTML = ""; // Clear content
        }

        // Reset input values in the cloned element
        clonedElement.querySelectorAll("input").forEach(function(input) {
            input.value = '';
        });

        // Update names and IDs in the cloned element
        updateNamesAndIdss(clonedElement, index);

        // Remove old buttons and add a new remove button
        clonedElement.querySelectorAll(".duplicateBtnStrength, .removeBtnStrength").forEach(function(button) {
            button.remove();
        });
        addRemoveButtonToElementstrength(clonedElement);

        // Append the cloned element to the display container
        document.getElementById('cloneDisplayContainerStrength').appendChild(clonedElement);
    }

    // Event listener for the main clone button
    document.getElementById('cloneButton').addEventListener('click', function() {
        const uiContainerStrength = document.getElementById('uiContainerStrength');
        const cloneDisplayContainerStrength = document.getElementById('uiContainerStrength');
        const newContainer = uiContainerStrength.cloneNode(true);

        // Retrieve or set the index for the new clone
        var index = parseInt(uiContainerStrength.dataset.index) || 1;
        index += 1;
        uiContainerStrength.dataset.index = index;

        // Clear content of duplicate-sets in the cloned container
        var duplicateSets = newContainer.querySelector(".duplicate-sets-strength");
        if (duplicateSets) {
            duplicateSets.innerHTML = ""; // Clear content
        }

        // Clear content of duplicate-sets in the cloned container
        var altduplicateSets = newContainer.querySelector(".altduplicate-setsstrength");
        if (altduplicateSets) {
            altduplicateSets.innerHTML = ""; // Clear content
        }

        // Reset input values in the new container
        newContainer.querySelectorAll("input").forEach(function(input) {
            input.value = '';
        });

        // Update names and IDs in the new container
        updateNamesAndIdss(newContainer, index);

        // Add the remove button to the new container
        addRemoveButtonToElementstrength(newContainer);

        // Append the new container to the display container
        cloneDisplayContainerStrength.appendChild(newContainer);
    });

    // Add event listeners to all duplicate buttons
    document.querySelectorAll(".duplicateBtnStrength").forEach(function(button) {
        button.addEventListener("click", handleUiDuplications);
    });
</script>


{{-- create duplicate sets and reps --}}
<script>
    // Function to clear existing workout options
    function clearOptionstrength(selectElement) {
        selectElement.innerHTML = '<option value="" selected disabled>-- Select Workout --</option>';
    }


    // duplicate Set
    let setCounter = 1;

    function duplicateSetStrength(id) {
        console.log(id)
        const idPartfind = id.split('_');

        // Get the remaining part after the base
        const remainingfind = idPartfind.slice(1).join('_');
        console.log("idsss " + remainingfind)

        setCounter++;
        const originalSet = document.getElementById(id);
        console.log(originalSet);

        if (!originalSet) {
            console.error('Original set element with id "' + id + '" not found');
            return;
        }

        // Clone the original set
        const clone = originalSet.cloneNode(true);

        // Update the id and name attributes of the input field
        const input = clone.querySelector('input');
        if (input) {
            input.id = `sets_${remainingfind}${setCounter}`;
            input.name = `sets_${remainingfind}${setCounter}`;
            input.value = '0';
        }

        // Add remove button
        const removeButton = document.createElement('button');
        removeButton.textContent = 'Remove';
        removeButton.className = 'remove-set bg-red-500 text-white p-2 rounded';
        removeButton.onclick = function() {
            clone.remove();
        };

        // Append the remove button to the clone
        const buttonContainer = document.createElement('div');
        buttonContainer.className = 'flex justify-end mb-2'; // Ensure the button is aligned properly
        buttonContainer.appendChild(removeButton);
        clone.appendChild(buttonContainer);

        // Create a new element from the setui string and append it to the duplicate-sets container
        const setuiElement = document.createElement('div');
        setuiElement.innerHTML = `
        <div class="flex items-center sets-view">
            <label for="custom-numberwe_${remainingfind}${setCounter}" class="w-60 block mb-1">
                SETS <span class="text-red-500">*</span>
            </label>
            <div class="relative flex items-center max-w-[8rem]">
                <button type="button" class="decrement-custom bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"  onclick="decrement(this.parentNode.querySelector('input').id)">
                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                    </svg>
                </button>
                <input type="text" id="sets_${remainingfind}${setCounter}" name="sets_${remainingfind}${setCounter}" data-input-counter class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center my-2 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none" placeholder="0" readonly />
                <button type="button" class="increment-custom bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"  onclick="increment(this.parentNode.querySelector('input').id)">
                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                    </svg>
                </button>
            </div>
            
        </div>
        <div class="flex items-center border-b">
                                    <label for="reps_${remainingfind}${setCounter}" class="w-60 block mb-1">REPS <span
                                            class="text-red-500">*</span></label>
                                    <div class="relative flex items-center max-w-[8rem]">
                                        <button type="button"
                                            onclick="decrement(this.parentNode.querySelector('input').id)"
                                            class="decrement-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                            <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                            </svg>
                                        </button>
                                        <input type="text" id="reps_${remainingfind}${setCounter}" name="reps_${remainingfind}${setCounter}" data-input-counter
                                            class="bg-gray-50 border-x-0 border-gray-300 h-11 my-2 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                            placeholder="0" readonly />
                                        <button type="button"
                                            onclick="increment(this.parentNode.querySelector('input').id)"
                                            class="increment-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                            <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                            </svg>
                                        </button>
                                    </div>
                                    
            <button type="button" class="remove-set bg-red-500 text-white p-2 rounded ml-2">
                    Remove
                </button>
                                </div>
                                
        `;
        // Add functionality to the remove button
        setuiElement.querySelector('.remove-set').addEventListener('click', function() {
            setuiElement.remove();
        });

        // Find the container element with class 'duplicate-sets' using parentNode traversal
        const container = originalSet.closest('.border-b').querySelector('.duplicate-sets-strength');
        console.log(container);

        if (container) {
            container.appendChild(setuiElement);
        } else {
            console.error('Container element with class "duplicate-sets-strength" not found');
        }

        console.log(`Duplicated Set ID: ${input ? input.id : 'N/A'}`);
    }


    // altduplicate Set
    let altsetCounter = 1;

    function altduplicateSetStrength(id) {
        console.log(id);
        const idPartfind = id.split('_');
        const remainingfind = idPartfind.slice(1).join('_');
        console.log("idsss " + remainingfind);

        altsetCounter++;
        const originalSet = document.getElementById(id);
        console.log(originalSet);

        if (!originalSet) {
            console.error('Original set element with id "' + id + '" not found');
            return;
        }

        // Clone the original set
        const altclone = originalSet.cloneNode(true);

        // Update the id and name attributes of the input fields
        const altinputs = altclone.querySelectorAll('input');
        altinputs.forEach((input) => {
            input.id = input.id.replace(/_\d+$/, `_${altsetCounter}`);
            input.name = input.name.replace(/_\d+$/, `_${altsetCounter}`);
            input.value = '0'; // Reset the value
        });

        // Create new HTML for the set and append it to the container
        const altsetuiElement = document.createElement('div');
        altsetuiElement.innerHTML = `
        <div class="flex items-center sets-view">
            <label for="alt-custom-numberwe_${remainingfind}${altsetCounter}" class="w-60 block mb-1">
                SETS <span class="text-red-500">*</span>
            </label>
            <div class="relative flex items-center max-w-[8rem]">
                <button type="button" class="decrement-custom bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none" onclick="decrement(this.parentNode.querySelector('input').id)">
                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                    </svg>
                </button>
                <input type="text" id="alt-sets_${remainingfind}${altsetCounter}" name="alt-sets_${remainingfind}${altsetCounter}" data-input-counter class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center my-2 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none" placeholder="0" readonly />
                <button type="button" class="increment-custom bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none" onclick="increment(this.parentNode.querySelector('input').id)">
                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="flex items-center border-b">
            <label for="alt-reps_${remainingfind}${altsetCounter}" class="w-60 block mb-1">
                REPS <span class="text-red-500">*</span>
            </label>
            <div class="relative flex items-center max-w-[8rem]">
                <button type="button" onclick="decrement(this.parentNode.querySelector('input').id)" class="decrement-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                    </svg>
                </button>
                <input type="text" id="alt-reps_${remainingfind}${altsetCounter}" name="alt-reps_${remainingfind}${altsetCounter}" data-input-counter class="bg-gray-50 border-x-0 border-gray-300 h-11 my-2 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none" placeholder="0" readonly />
                <button type="button" onclick="increment(this.parentNode.querySelector('input').id)" class="increment-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                    </svg>
                </button>
            </div>
            <button type="button" class="altremove-buttonstrength bg-red-500 text-white p-2 rounded ml-2">
                Remove
            </button>
        </div>
    `;

        // Add the new set UI element to the container
        const altcontainer = originalSet.closest('.border-b').querySelector('.altduplicate-setsstrength');
        console.log(altcontainer);

        if (altcontainer) {
            altcontainer.appendChild(altsetuiElement);

            // Add remove button functionality
            altsetuiElement.querySelector('.altremove-buttonstrength').onclick = function() {
                altsetuiElement.remove();
            };
        } else {
            console.error('Container element with class "altduplicate-setsstrength" not found');
        }

        console.log(`Duplicated Set ID: ${altinputs.length > 0 ? altinputs[0].id : 'N/A'}`);
    }





    // Call getcategorywe on page load
    document.addEventListener('DOMContentLoaded', function() {
        getcategorywe();
    });
</script>
