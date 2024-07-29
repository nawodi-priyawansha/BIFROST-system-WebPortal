<div id="weightlifting" hidden>
    {{-- hidden input field --}}
    <input type="text" name="selecttabwe" id="selecttabwe" hidden>
    <form action="/store-weightlifting" method="POST">
        @csrf
        <input type="text" name="selectdatewe" id="selectdatewe" hidden>
        <div class="duplicateUi flex flex-col text-lg p-4 bg-gray-50 mr-8 rounded-md gap-4 mb-4 " id="uiContainer">
            <div class="" data-index="1">
                <div class="ui-block flex flex-col text-lg p-4 bg-gray-50 mr-8 rounded-md gap-4 mb-4 ">
                    <!-- Your UI block content here -->
                    <div class="flex gap-5 justify-between">
                        <div class="flex-col w-full ">
                            <div class="flex items-center border-b">
                                <label for="categorywe_1" class="w-60 block mb-1">Category <span
                                        class="text-red-500">*</span></label>
                                <select id="categorywe_1" name="categorywe_1" onchange="getworkoutWe(this)" 
                                    class="w-1/3 px-3 py-3 border flex rounded mb-2" required>
                                    <option value="" selected disabled>-- Select Category --</option>
                                </select>
                            </div>
                            <div class="flex items-center border-b mt-2">
                                <label for="workoutwe_1" class="w-60 block mb-1">Workout <span
                                        class="text-red-500">*</span></label>
                                <select id="workoutwe_1" name="workoutwe_1"
                                    class="w-1/3 px-3 py-3 border flex rounded mb-2" required>
                                    <option value="" selected disabled>-- Select Workout --</option>
                                </select>
                            </div>
                            <div class="flex items-center border-b mt-2">
                                <label for="weigthwe_1" class="w-60 block mb-1">Weight <span
                                        class="text-red-500">*</span></label>
                                <input type="number" id="weigthwe_1" name="weigthwe_1"
                                    class="w-1/3 px-3 py-3 border flex rounded mb-2" required>
                                <label for="" class="border bg-white py-3 px-3 mb-2 ">%</label>
                            </div>
                            <div class="border-b" id="duplicateSetUI">
                                <div class="">
                                    <div class="flex items-center sets-view">
                                        <label for="custom-numberwe_1" class="w-60 block mb-1">SETS <span
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
                                            <input type="text" id="setswe_1" name="setswe_1" data-input-counter
                                                class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center my-2 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                                placeholder="0" readonly required/>
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

                                    <div class="flex items-center border-b">
                                        <label for="repswe_1" class="w-60 block mb-1">REPS <span
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
                                            <input type="text" id="repswe_1" name="repswe_1" data-input-counter
                                                class="bg-gray-50 border-x-0 border-gray-300 h-11 my-2 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                                placeholder="0" readonly required/>
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
                                    <div class="duplicate-sets" id="duplicate-sets_1"></div>
                                    <div class="ml-60">
                                        <button id="addset_1" onclick="duplicateSet(this.id)" type="button"
                                            class="bg-black text-white py-2 px-4 rounded mb-2 mt-2 text-base">
                                            <i class="fas fa-plus text-[12px]"></i> Add set</button>
                                    </div>
                                </div>
                            </div>



                            <div class="flex items-center border-b">
                                <label for="restwe_1" class="w-60 block mb-1">Rest <span
                                        class="text-red-500">*</span></label>
                                <div class="relative flex items-center max-w-[8rem]">
                                    <button type="button"
                                        onclick="decrementRest(this.parentNode.querySelector('input').id)"
                                        class="decrement-rest bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                        </svg>
                                    </button>
                                    <input type="text" id="restwe_1" name="restwe_1" placeholder="00:00"
                                        class="bg-gray-50 border-x-0 border-gray-300 h-11 my-2 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                        readonly required>
                                    <button type="button"
                                        onclick="incrementRest(this.parentNode.querySelector('input').id)"
                                        class="increment-rest bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="flex items-center border-b ">
                                <label for="intensitywe_1" class="w-60 block mb-1">Intensity <span
                                        class="text-red-500">*</span></label>
                                <select id="intensitywe_1" name="intensitywe_1"
                                    class="w-1/3 px-3 py-3 border flex rounded my-2" required>
                                    <option value="" selected disabled>-- Select Intensity --</option>
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
                                <label for="alt-categorywe_1" class="w-60 block mb-1">Category <span
                                        class="text-red-500">*</span></label>
                                <select id="alt-categorywe_1" name="alt-categorywe_1" onchange="getworkoutWe(this)"
                                    class="w-1/3 px-3 py-3 border flex rounded mb-2" required>
                                    <option value="" selected disabled>-- Select Category --</option>
                                </select>
                            </div>
                            <div class="flex items-center border-b mt-2">
                                <label for="alt-workoutwe_1" class="w-60 block mb-1">Workout <span
                                        class="text-red-500">*</span></label>
                                <select id="alt-workoutwe_1" name="alt-workoutwe_1"
                                    class="w-1/3 px-3 py-3 border flex rounded mb-2" required>
                                    <option value="" selected disabled>-- Select Workout --</option>
                                </select>
                            </div>
                            <div class="flex items-center border-b mt-2">
                                <label for="alt-weigthwe_1" class="w-60 block mb-1">Weigth <span
                                        class="text-red-500">*</span></label>
                                <input type="number" id="alt-weigthwe_1" name="alt-weigthwe_1"
                                    class="w-1/3 px-3 py-3 border flex rounded mb-2" required>
                                <label for="" class="border bg-white py-3 px-3 mb-2">%</label>
                            </div>
                            <div class="border-b" id="altduplicateSetUI">
                                <div class="">
                                    <div class="flex items-center">
                                        <label for="alt-setswe_1" class="w-60 block">SETS <span
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
                                            <input type="text" id="alt-setswe_1" name="alt-setswe_1"
                                                data-input-counter
                                                class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full my-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                                placeholder="0" readonly required/>
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
                                    <div class="flex items-center border-b">
                                        <label for="alt-repswe_1" class="w-60 block mb-1">REPS <span
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
                                            <input type="text" id="alt-repswe_1" name="alt-repswe_1"
                                                data-input-counter
                                                class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                                placeholder="0" readonly required/>
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
                                    <div class="altduplicate-setss" id="alt-duplicate-sets_1"></div>
                                    <div class="ml-60">
                                        <button id="altaddset_1" onclick="altduplicateSet(this.id)" type="button"
                                            class="bg-black text-white py-2 px-4 rounded mb-2 mt-2 text-base">
                                            <i class="fas fa-plus text-[12px]"></i> Add set</button>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center border-b">
                                <label for="alt-restwe_1" class="w-60 block mb-1">Rest <span
                                        class="text-red-500">*</span></label>
                                <div class="relative flex items-center max-w-[8rem] my-2">
                                    <button type="button"
                                        onclick="decrementRest(this.parentNode.querySelector('input').id)"
                                        class="decrement-rest bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                        </svg>
                                    </button>
                                    <input type="text" id="alt-restwe_1" name="alt-restwe_1" placeholder="00:00"
                                        class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
                                        readonly required>
                                    <button type="button"
                                        onclick="incrementRest(this.parentNode.querySelector('input').id)"
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
                                <label for="alt-intensitywe_1" class="w-60 block mb-1 ">Intensity <span
                                        class="text-red-500">*</span></label>
                                <select id="alt-intensitywe_1" name="alt-intensitywe_1"
                                    class="w-1/3 px-3 py-3 border flex rounded mb-2 mt-2" required>
                                    <option value="" selected disabled>-- Select Intensity --</option>
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
        <div id="cloneDisplayContainer"></div>
        <div class=" flex flex-col gap-5">
            <button id="cloneButton"type="button"
                class="bg-black text-white py-2 px-4 rounded mb-2 mt-2 text-base w-32"> Another
            </button>
            <button id="submitButton" type="submit"
                class="bg-[#FB1018] text-white py-2 px-4 rounded mb-2 hover:bg-red-700 w-24">Save</button>
        </div>
    </form>
</div>




<script>
    // Function to update input names and IDs for the cloned element
    function updateNamesAndIds(element, index) {
        element.querySelectorAll("input, select, button").forEach(function(el) {
            var baseName = el.name.split('_')[0];
            var baseId = el.id.split('_')[0];
            el.name = baseName + '_' + index;
            el.id = baseId + '_' + index;
        });
    }

    // Function to add a remove button to the cloned element
    function addRemoveButtonToElement(element) {
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
            element.remove();
        });
        element.appendChild(removeButton);
    }

    // Function to handle the duplication of UI elements
    function handleUiDuplication(event) {
        var cloneButton = event.target;
        var originalUiElement = cloneButton.closest(
            '.duplicateUi'); // Adjusted to find the closest element with class `duplicateUi`

        // Retrieve or set the index for the new clone
        var index = parseInt(originalUiElement.dataset.index) || 1;
        index += 1;
        originalUiElement.dataset.index = index;

        // Clone the original UI element
        var clonedElement = originalUiElement.cloneNode(true);

        // Clear content of duplicate-sets in the cloned element
        var duplicateSets = clonedElement.querySelector(".duplicate-sets");
        if (duplicateSets) {
            duplicateSets.innerHTML = ""; // Clear content
        }

        // Reset input values in the cloned element
        clonedElement.querySelectorAll("input").forEach(function(input) {
            input.value = '';
        });

        // Update names and IDs in the cloned element
        updateNamesAndIds(clonedElement, index);

        // Remove old buttons and add a new remove button
        clonedElement.querySelectorAll(".duplicateBtn, .removeBtn").forEach(function(button) {
            button.remove();
        });
        addRemoveButtonToElement(clonedElement);

        // Append the cloned element to the display container
        document.getElementById('cloneDisplayContainer').appendChild(clonedElement);
    }

    // Event listener for the main clone button
    document.getElementById('cloneButton').addEventListener('click', function() {
        const uiContainer = document.getElementById('uiContainer');
        const cloneDisplayContainer = document.getElementById('cloneDisplayContainer');
        const newContainer = uiContainer.cloneNode(true);

        // Retrieve or set the index for the new clone
        var index = parseInt(uiContainer.dataset.index) || 1;
        index += 1;
        uiContainer.dataset.index = index;

        // Clear content of duplicate-sets in the cloned container
        var duplicateSets = newContainer.querySelector(".duplicate-sets");
        if (duplicateSets) {
            duplicateSets.innerHTML = ""; // Clear content
        }

        // Clear content of duplicate-sets in the cloned container
        var altduplicateSets = newContainer.querySelector(".altduplicate-setss");
        if (altduplicateSets) {
            altduplicateSets.innerHTML = ""; // Clear content
        }

        // Reset input values in the new container
        newContainer.querySelectorAll("input").forEach(function(input) {
            input.value = '';
        });

        // Update names and IDs in the new container
        updateNamesAndIds(newContainer, index);

        // Add the remove button to the new container
        addRemoveButtonToElement(newContainer);

        // Append the new container to the display container
        cloneDisplayContainer.appendChild(newContainer);
    });

    // Add event listeners to all duplicate buttons
    document.querySelectorAll(".duplicateBtn").forEach(function(button) {
        button.addEventListener("click", handleUiDuplication);
    });
</script>






















<script>
    // Rest increment Decrement
    function incrementRest(id) {
        // Get the current time value
        let input = document.getElementById(id); // Ensure you get the input element using the id
        let [minutes, seconds] = input.value.split(':').map(Number);

        // Convert to total seconds
        if (isNaN(minutes)) minutes = 0;
        if (isNaN(seconds)) seconds = 0;
        let totalSeconds = (minutes * 60) + seconds;

        // Update the time
        totalSeconds += 15;
        if (totalSeconds < 0) totalSeconds = 0; // Prevent negative values

        // Convert back to minutes and seconds
        minutes = Math.floor(totalSeconds / 60);
        seconds = totalSeconds % 60;

        // Format the value as MM:SS
        input.value = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    }


    function decrementRest(id) {
        // Get the current time value
        let input = document.getElementById(id); // Ensure you get the input element using the id
        let [minutes, seconds] = input.value.split(':').map(Number);

        // Convert to total seconds
        if (isNaN(minutes)) minutes = 0;
        if (isNaN(seconds)) seconds = 0;
        let totalSeconds = (minutes * 60) + seconds;

        // Update the time
        totalSeconds -= 15;
        if (totalSeconds < 0) totalSeconds = 0; // Prevent negative values

        // Convert back to minutes and seconds
        minutes = Math.floor(totalSeconds / 60);
        seconds = totalSeconds % 60;

        // Format the value as MM:SS
        input.value = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    }


    // Function to set category options
    function setCategory(id, categoryName, selectId) {
        const categorySelect = document.getElementById(selectId);
        const option = document.createElement('option');
        option.value = id;
        option.text = categoryName;
        categorySelect.add(option);
    }

    // Function to get categories via AJAX
    // Function to get categories via AJAX
    function getcategorywe() {
        const selectTab = "weightlifting";

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
                ['categorywe_1', 'alt-categorywe_1'].forEach(id => {
                    const categoryweelect = document.getElementById(id);
                    categoryweelect.innerHTML =
                        '<option value="" selected disabled>-- Select Category --</option>';
                });

                // Loop through each category_option and call the setCategory() function
                categoryOptions.forEach(option => {
                    setCategory(option.id, option.category_name, 'categorywe_1');
                    setCategory(option.id, option.category_name, 'alt-categorywe_1');
                });

                // Optional: Sort the options alphabetically if needed
                ['categorywe_1', 'alt-categorywe_1'].forEach(id => {
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

    // Function to get workoutwe via AJAX based on selected category
    function getworkoutWe(selectElement) {
        console.log(selectElement);
        const tab = "weightlifting";
        const selectId = selectElement.value; // Get the value of the selected element

        // Split the ID of the select element by underscores
        const idParts = selectElement.id.split('_');

        // Get the remaining part after the base
        const remainingPart = idParts.slice(1).join('_');
        const isAltCategory = selectElement.id === `alt-categorywe_${remainingPart}`;
        const workoutSelectId = isAltCategory ? `alt-workoutwe_${remainingPart}` : `workoutwe_${remainingPart}`;

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



    // duplicate Set
    let setCounter = 1;

    function duplicateSet(id) {
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
            input.id = `setswe_${remainingfind}${setCounter}`;
            input.name = `setswe_${remainingfind}${setCounter}`;
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
                <input type="text" id="setswe_${remainingfind}${setCounter}" name="setswe_${remainingfind}${setCounter}" data-input-counter class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center my-2 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none" placeholder="0" readonly />
                <button type="button" class="increment-custom bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"  onclick="increment(this.parentNode.querySelector('input').id)">
                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                    </svg>
                </button>
            </div>
            
        </div>
        <div class="flex items-center border-b">
                                    <label for="repswe_${remainingfind}${setCounter}" class="w-60 block mb-1">REPS <span
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
                                        <input type="text" id="repswe_${remainingfind}${setCounter}" name="repswe_${remainingfind}${setCounter}" data-input-counter
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
        const container = originalSet.closest('.border-b').querySelector('.duplicate-sets');
        console.log(container);

        if (container) {
            container.appendChild(setuiElement);
        } else {
            console.error('Container element with class "duplicate-sets" not found');
        }

        console.log(`Duplicated Set ID: ${input ? input.id : 'N/A'}`);
    }


    // altduplicate Set
    let altsetCounter = 1;

    function altduplicateSet(id) {
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
                <input type="text" id="alt-setswe_${remainingfind}${altsetCounter}" name="alt-setswe_${remainingfind}${altsetCounter}" data-input-counter class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center my-2 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none" placeholder="0" readonly />
                <button type="button" class="increment-custom bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none" onclick="increment(this.parentNode.querySelector('input').id)">
                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="flex items-center border-b">
            <label for="alt-repswe_${remainingfind}${altsetCounter}" class="w-60 block mb-1">
                REPS <span class="text-red-500">*</span>
            </label>
            <div class="relative flex items-center max-w-[8rem]">
                <button type="button" onclick="decrement(this.parentNode.querySelector('input').id)" class="decrement-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                    </svg>
                </button>
                <input type="text" id="alt-repswe_${remainingfind}${altsetCounter}" name="alt-repswe_${remainingfind}${altsetCounter}" data-input-counter class="bg-gray-50 border-x-0 border-gray-300 h-11 my-2 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none" placeholder="0" readonly />
                <button type="button" onclick="increment(this.parentNode.querySelector('input').id)" class="increment-reps bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                    </svg>
                </button>
            </div>
            <button type="button" class="altremove-button bg-red-500 text-white p-2 rounded ml-2">
                Remove
            </button>
        </div>
    `;

        // Add the new set UI element to the container
        const altcontainer = originalSet.closest('.border-b').querySelector('.altduplicate-setss');
        console.log(altcontainer);

        if (altcontainer) {
            altcontainer.appendChild(altsetuiElement);

            // Add remove button functionality
            altsetuiElement.querySelector('.altremove-button').onclick = function() {
                altsetuiElement.remove();
            };
        } else {
            console.error('Container element with class "altduplicate-setss" not found');
        }

        console.log(`Duplicated Set ID: ${altinputs.length > 0 ? altinputs[0].id : 'N/A'}`);
    }





    // Call getcategorywe on page load
    document.addEventListener('DOMContentLoaded', function() {
        getcategorywe();
    });
</script>
