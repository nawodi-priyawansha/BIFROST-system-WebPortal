<div id="conditioning" hidden>
    {{-- hidden input field --}}
    <input type="text" name="selectdatec" id="selectdatec">
    <input type="text" name="selecttabc" id="selecttabc">
    <div class="ui-block flex flex-col text-lg p-4 bg-gray-50 mr-8 rounded-md gap-4 mb-4 ">
        <div class="duplicateUi" data-index="1">
            <div class="ui-block flex flex-col text-lg p-4 bg-gray-50 mr-8 rounded-md gap-4 mb-4 ">
                <div class="flex-col w-full ">
                    <div class="flex items-center border-b">
                        <label for="reps" class="w-60 block mb-1">Rounds <span class="text-red-500">*</span></label>
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
                        <label for="categoryc" class="w-60 block mb-1">Category <span
                                class="text-red-500">*</span></label>
                        <select id="categoryc" name="categoryc" onchange="getworkout(this)"
                            class="w-1/3 px-3 py-2 border flex rounded mb-2">
                            <option value="" selected disabled>-- Select Category --
                            </option>
                        </select>
                        <!-- This element will push the button to the right -->
                    </div>
                    <div class="flex items-center border-b">
                        <label for="workout" class="w-60 block mb-1">Workout <span
                                class="text-red-500">*</span></label>
                        <select id="workout" name="workout" class="w-1/3 px-3 py-2 border flex rounded mb-2">
                            <option value="" selected disabled>-- Select Workout --
                            </option>
                        </select>
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
                                class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:outline-none"
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
                        <label for="reps" class="w-60 block mb-1">REPS <span class="text-red-500">*</span></label>
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
                        <label for="intensity" class="w-60 block mb-1">Intensity <span
                                class="text-red-500">*</span></label>
                        <select id="intensity" name="intensity" class="w-1/3 px-3 py-2 border flex rounded mb-2">
                            <option value=""selected disabled>-- Select Intensity --
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
    <button class="duplicateBtn bg-black text-white py-2 px-4 rounded mb-2 mt-2 text-base">Another</button>
</div>
