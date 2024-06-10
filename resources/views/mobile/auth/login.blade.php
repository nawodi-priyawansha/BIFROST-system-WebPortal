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
    <form class=" text-white text-center p-4 sm:p-10 w-full max-w-md rounded-3xl mb-12 sm:mb-44" method="POST"
        action="#" id="form">
        @csrf
        <div class=" ">
            <div class="flex  justify-center ">
                <img src={{ asset('img/valhalla-logo.png') }} alt="logo" class=" h-32 sm:h-24">
            </div>

        </div>
        <label class=" items-center hidden">
            <input type="radio" name="portal" value="user" class="mr-2" onclick="enablePinFields()"checked>
            User Portal
        </label>
        <div class="flex justify-center  w-full  gap-4 mt-20 sm:gap-4 p-1  sm:p-1">
            <input type="text" maxlength="1" class=" w-20 h-20  text-black text-center bg-white rounded"
                name="pin_1" id="pin_1">
            <input type="text" maxlength="1" class="w-20 h-20   text-black text-center bg-white rounded"
                name="pin_2" id="pin_2">
            <input type="text" maxlength="1" class="w-20 h-20  text-black text-center bg-white rounded"
                name="pin_3" id="pin_3">
            <input type="text" maxlength="1" class="w-20 h-20   text-black text-center bg-white rounded"
                name="pin_4" id="pin_4">
        </div>
        <a href="#" class="text-white underline mt-10 block">Forget Pin?</a>

    </form>
    <script>
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
    </script>
</body>

</html>