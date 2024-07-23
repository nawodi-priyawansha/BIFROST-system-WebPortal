<div id="test" hidden>
    {{-- hidden input field --}}
    <input type="text" name="selectdatet" id="selectdatet">
    <input type="text" name="selecttabt" id="selecttabt">
    <div class="ui-block flex flex-col text-lg p-4 bg-gray-50 mr-8 rounded-md gap-4 mb-4 ">
        <div class="duplicateUi" data-index="1">
            <div class="ui-block flex flex-col text-lg p-4 bg-gray-50 mr-8 rounded-md gap-4 ">
                <!-- Your UI block content here -->
                <div id="block-container" class="flex flex-col text-lg p-4 mr-8 rounded-md gap-4">
                    <div class="flex flex-col text-lg p-4 bg-gray-50 mr-8 rounded-md gap-2 ">
                        <!-- Your UI block content here -->

                        <div class="flex items-center border-b">
                            <label for="test-category" class="w-60 block mb-1">Category <span
                                    class="text-red-500">*</span></label>
                            <select id="test-category" name="test-category" onchange="getworkout(this)"
                                class="w-1/3 px-3 py-3 border flex rounded mb-2">
                                <option value="" selected disabled>-- Select Category --</option>
                            </select>
                            <!-- This element will push the button to the right -->
                        </div>
                        <div class="flex items-center border-b">
                            <label for="test-workout" class="w-60 block mb-1">Workout <span
                                    class="text-red-500">*</span></label>
                            <select id="test-workout" name="test-workout"
                                class="w-1/3 px-3 py-3 border flex rounded mb-2">
                                <option value="" selected disabled>-- Select Workout --
                                </option>
                            </select>
                        </div>
                        <div class="flex items-center border-b">
                            <label for="test-member" class="w-60 block mb-1">Member 
                                {{-- <span class="text-red-500">*</span> --}}
                            </label>
                            <select id="test-member" name="test-member"
                                class="w-1/3 px-3 py-3 border flex rounded mb-2">
                                <option value="" selected disabled>-- Select Member --
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="duplicateBtn bg-black text-white py-2 px-4 rounded mb-2  text-base">Another</button>
</div>