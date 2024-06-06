<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex items-center justify-center min-h-screen m-0 p-4 bg-cover bg-center bg-no-repeat"
    style="background-image: url('{{ asset('img/valhalla-bg.jpg') }}');">
    <form class="bg-black text-white text-center p-4 sm:p-10 w-full max-w-md rounded-3xl mb-12 sm:mb-44" method="POST" id="resetPin">
        <div class="mb-6">
            <div class="flex justify-center mb-8">
                <img src="{{ asset('img/valhalla-logo.png') }}" alt="logo" class="h-16 sm:h-24">
            </div>
        </div>
        <h2 class="text-2xl sm:text-4xl font-bold mb-8">Reset Pin</h2>
        <div class="flex justify-center gap-4 sm:gap-4 mb-4">
            <label for="text" class="text-xl">New Pin</label>
        </div>
        <div class="flex justify-center gap-4 sm:gap-2 mb-8">
            <input type="text" maxlength="1"
                class="w-12 h-12 sm:w-16 sm:h-16 text-black text-center bg-white rounded" name="pin_1" id="pin_1"
                disabled>
            <input type="text" maxlength="1"
                class="w-12 h-12 sm:w-16 sm:h-16 text-black text-center bg-white rounded" name="pin_2" id="pin_2"
                disabled>
            <input type="text" maxlength="1"
                class="w-12 h-12 sm:w-16 sm:h-16 text-black text-center bg-white rounded" name="pin_3" id="pin_3"
                disabled>
            <input type="text" maxlength="1"
                class="w-12 h-12 sm:w-16 sm:h-16 text-black text-center bg-white rounded" name="pin_4" id="pin_4"
                disabled>
            </div>

        </div>
        <div class="flex justify-center  gap-4 sm:gap-4 mb-4">
            <label for="text" class="text-xl">Conform Pin</label>
        </div>
        <div class="flex justify-center  gap-4 sm:gap-2 mb-8">
            <input type="text" maxlength="1"
                class="w-12 h-12 sm:w-16 sm:h-16 text-black text-center bg-white rounded" name="pin_1" id="pin_1"
                disabled>
            <input type="text" maxlength="1"
                class="w-12 h-12 sm:w-16 sm:h-16 text-black text-center bg-white rounded" name="pin_2" id="pin_2"
                disabled>
            <input type="text" maxlength="1"
                class="w-12 h-12 sm:w-16 sm:h-16 text-black text-center bg-white rounded" name="pin_3" id="pin_3"
                disabled>
            <input type="text" maxlength="1"
                class="w-12 h-12 sm:w-16 sm:h-16 text-black text-center bg-white rounded" name="pin_4" id="pin_4"
                disabled>
            </div>

        </div>
        <div class="rounded-sm sm:w-32 w-1/3 h-10 flex items-center justify-center mx-auto mt-5 hover:bg-black bg-gray-400 transition-colors duration-300" style="background-color: #676768,">
            <button class="text-black text-xs sm:text-lg  hover:text-white text-center font-bold ">CONFORM</button>
        </div>
        <div class="text-sm mt-4">
            &copy; 2024 Valhalla Performance. All rights reserved. System by JPLMS.
        </div>
    </form>
    {{-- <script>
        function enablePinFields() {
            const radios = document.getElementsByName('portal');
            const pinFields = document.querySelectorAll('input[name^="pin"]');
            const selectedPortal = Array.from(radios).find(radio => radio.checked);
            const isPortalSelected = selectedPortal && selectedPortal.value;

            pinFields.forEach(field => {
                field.disabled = !isPortalSelected;
                // Reset pin fields to empty when portal changes
                field.value = '';
            });
        }

        function login() {
            console.log("login...");
            const pinFields = document.querySelectorAll('input[name^="pin"]');
            let allPinsFilled = true;

            pinFields.forEach(pinField => {
                if (pinField.value.trim() === '') {
                    allPinsFilled = false;
                    return;
                }
            });
            if (allPinsFilled) {
                document.getElementById('form').submit();
            }
        }



        // Enable pin fields if a portal is already selected on page load
        enablePinFields();

        const inputs = document.querySelectorAll('input[type="text"]');
        inputs.forEach((input, index) => {
            input.addEventListener('input', function() {
                // Remove non-numeric characters
                this.value = this.value.replace(/[^0-9]/g, '');
                // Move focus to the next input field if a single digit is entered
                login();
                if (this.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
                // Call login function when pin_4 is filled
                if (this.id === 'pin_4' && this.value.length === 1) {
                    login();
                }
            });
        });
    </script> --}}
</body>

</html>
