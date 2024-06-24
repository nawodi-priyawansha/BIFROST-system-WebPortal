<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UI Design</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        /* Popup animation styles */
        .popup {
            display: none;
            align-items: center;
            justify-content: center;
        }

        .popup-content {
            animation-duration: 0.4s;
        }

        .popup-content.show {
            animation-name: slideIn;
        }

        .popup-content.hide {
            animation-name: slideOut;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes slideOut {
            from {
                transform: translateY(0);
                opacity: 1;
            }

            to {
                transform: translateY(-50%);
                opacity: 0;
            }
        }
    </style>
</head>

<body class="overflow-y-auto">
    @extends('mobile.layout.mobile-layout')
    @section('content')
        <div class="w-full flex flex-col justify-between h-screen overflow-y-auto">
            <div class="flex-grow items-center justify-center m-0 p-4 bg-cover bg-center bg-no-repeat"
                style="background-image: url('{{ asset('img/valhalla-bg.jpg') }}');">
                <div class="bg-transparent p-6 rounded-lg shadow-md pt-24">

                    <!-- Display selected day and date -->
                    <div class="mb-4 flex flex-col text-center">
                        <div class="w-full mb-2 text-white text-center items-center justify-center flex">Training Day</div>
                        <div class="flex items-center justify-center h-8 rounded overflow">
                            <div id="selectedDay" class="text-white text-lg font-bold"></div>
                            <div id="selectedDate" class="text-white text-sm ml-2"></div>
                        </div>
                    </div>

                    {{-- Hrs of Sleep Div --}}
                    <div class="mb-4 flex flex-col text-center">
                        <div class="w-full mb-2 text-white text-center items-center justify-center flex">Hrs of Sleep</div>
                        <div class="flex items-center h-8 rounded overflow">
                            <div class="flex flex-grow">
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#F20525] text-white text-center p-2 rounded-l-lg"
                                    onclick="selectButton(this, 'Sleep')">&lt;5</button>
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#FF8F36] text-white text-center focus:outline-none p-2"
                                    onclick="selectButton(this, 'Sleep')">5-6</button>
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#FEE943] text-white text-center focus:outline-none p-2"
                                    onclick="selectButton(this, 'Sleep')">6-7</button>
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#89DD43] text-white text-center focus:outline-none p-2"
                                    onclick="selectButton(this, 'Sleep')">7-8</button>
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#1CBA4B] text-white text-center focus:outline-none p-2 rounded-r-lg"
                                    onclick="selectButton(this, 'Sleep')">8+</button>
                            </div>
                            <div class="flex-none">
                                <button class="hover:bg-transparent text-transparent text-center px-2 pointer-events-none"
                                    onclick=""><i class="bi bi-info-circle"></i></button>
                            </div>
                        </div>
                    </div>

                    {{-- Alertness Div --}}
                    <div class="mb-4 flex flex-col">
                        <div class="w-full mb-2 text-white text-center items-center justify-center">Alertness</div>
                        <div class="flex items-center rounded overflow-hidden">
                            <div class="flex flex-grow ">
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#F20525] text-white text-center p-2 rounded-l-lg"
                                    onclick="selectButton(this, 'Alertness')">1</button>
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#FF8F36] text-white text-center focus:outline-none p-2"
                                    onclick="selectButton(this, 'Alertness')">2</button>
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#FEE943] text-white text-center focus:outline-none p-2"
                                    onclick="selectButton(this, 'Alertness')">3</button>
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#89DD43] text-white text-center focus:outline-none p-2"
                                    onclick="selectButton(this, 'Alertness')">4</button>
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#1CBA4B] text-white text-center focus:outline-none p-2 rounded-r-lg"
                                    onclick="selectButton(this, 'Alertness')">5</button>
                            </div>
                            <div class="flex-none">
                                <button class="hover:bg-transparent text-white text-center px-2 border-none"
                                    onclick="showInfo('Alertness')"><i class="bi bi-info-circle"></i></i></button>
                            </div>
                        </div>
                        <div id="alertnessDescription"
                            class="w-full mb-2 text-white text-xs text-center items-center justify-center">1= lights are
                            on but no one is home.</div>
                    </div>

                    {{-- Excitement Div --}}
                    <div class="mb-4 flex flex-col">
                        <div class="w-full mb-2 text-white text-center items-center justify-center">Excitement</div>
                        <div class="flex items-center rounded overflow-hidden">
                            <div class="flex flex-grow ">
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#F20525] text-white text-center p-2 rounded-l-md"
                                    onclick="selectButton(this, 'Excitement')">1</button>
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#FF8F36] text-white text-center focus:outline-none p-2"
                                    onclick="selectButton(this, 'Excitement')">2</button>
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#FEE943] text-white text-center focus:outline-none p-2"
                                    onclick="selectButton(this, 'Excitement')">3</button>
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#89DD43] text-white text-center focus:outline-none p-2"
                                    onclick="selectButton(this, 'Excitement')">4</button>
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#1CBA4B] text-white text-center focus:outline-none p-2 rounded-r-lg"
                                    onclick="selectButton(this, 'Excitement')">5</button>
                            </div>
                            <div class="flex-none">
                                <button class="hover:bg-transparent text-white text-center px-2 border-none"
                                    onclick="showInfo('Excitement')"><i class="bi bi-info-circle"></i></i></button>
                            </div>
                        </div>
                        <div id="excitementDescription"
                            class="w-full mb-2 text-white text-xs text-center items-center justify-center">1= Pulling my
                            hair out.</div>
                    </div>

                    {{-- Stress Div --}}
                    <div class="mb-4 flex flex-col">
                        <div class="w-full mb-2 text-white text-center items-center justify-center">Stress</div>
                        <div class="flex items-center rounded overflow-hidden">
                            <div class="flex flex-grow">
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#F20525] text-white text-center p-2 rounded-l-md"
                                    onclick="selectButton(this, 'Stress')">1</button>
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#FF8F36] text-white text-center focus:outline-none p-2"
                                    onclick="selectButton(this, 'Stress')">2</button>
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#FEE943] text-white text-center focus:outline-none p-2"
                                    onclick="selectButton(this, 'Stress')">3</button>
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#89DD43] text-white text-center focus:outline-none p-2"
                                    onclick="selectButton(this, 'Stress')">4</button>
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#1CBA4B] text-white text-center focus:outline-none p-2 rounded-r-lg"
                                    onclick="selectButton(this, 'Stress')">5</button>
                            </div>
                            <div class="flex-none">
                                <button class="hover:bg-transparent text-white text-center px-2 border-none"
                                    onclick="showInfo('Stress')"><i class="bi bi-info-circle"></i></button>
                            </div>
                        </div>
                        <div id="stressDescription"
                            class="w-full mb-2 text-white text-xs text-center items-center justify-center">1= Pulling my
                            hair out.</div>
                    </div>

                    {{-- Soreness Div --}}
                    <div class="mb-4 flex flex-col">
                        <div class="w-full mb-2 text-white text-center items-center justify-center">Soreness</div>
                        <div class="flex items-center rounded overflow-hidden ">
                            <div class="flex flex-grow">
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#F20525] text-white text-center p-2 rounded-l-lg"
                                    onclick="selectButton(this, 'Soreness')">1</button>
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#FF8F36] text-white text-center focus:outline-none p-2"
                                    onclick="selectButton(this, 'Soreness')">2</button>
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#FEE943] text-white text-center focus:outline-none p-2"
                                    onclick="selectButton(this, 'Soreness')">3</button>
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#89DD43] text-white text-center focus:outline-none p-2"
                                    onclick="selectButton(this, 'Soreness')">4</button>
                                <button
                                    class="flex-1 hover:bg-transparent bg-[#1CBA4B] text-white text-center focus:outline-none p-2 rounded-r-lg"
                                    onclick="selectButton(this, 'Soreness')">5</button>
                            </div>
                            <div class="flex-none">
                                <button id="Sorenesspopup"
                                    class="hover:bg-transparent border-none text-white text-center px-2"
                                    onclick="showInfo('Soreness')"><i class="bi bi-info-circle"></i></i></button>
                            </div>
                        </div>
                        <div id="sorenessDescription"
                            class="w-full mb-2 text-white text-xs text-center items-center justify-center">1= Crippled.
                        </div>
                    </div>

                    {{-- Score Div --}}
                    <div class="mb-4 flex flex-col items-center justify-center text-center font-bold  text-white">
                        <div class="border border-white flex-col flex w-48 h-28 items-center justify-center rounded-lg">
                            <span>SCORE</span>
                            <div class="flex text-3xl text-center">
                                <input type="text" id="score" name="score" class="text-3xl text-center bg-transparent  w-16" value="0"> %
                            </div>
                        </div>                        
                    </div>                                                           
                    <button class="block mx-auto py-2 px-4 b text-white rounded mb-4 focus:outline-none">SAVE</button>
                </div>
            </div>
        </div>

        {{-- Modal --}}
        <div id="popup" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex mt-24 h-fit justify-center">
            <div class="modal bg-white w-[90%] rounded-lg shadow-md popup-content">
                <div class="modal-header bg-black text-white py-2 px-4 flex justify-between items-center">
                    <h2 id="modalTitle" class="text-lg font-bold">Modal Title</h2>
                    <button class="close-btn text-white border-none" onclick="closeModal()">×</button>
                </div>
                <div id="modalBody" class="modal-body px-4 py-2">
                    <!-- Modal content will be dynamically inserted here -->
                </div>
                <div class="modal-footer bg-[#EEEEEE] py-2 px-4 text-center">
                    <button class="close-btn bg-[#6C757D] hover:bg-gray-600 text-white px-4 py-2 rounded-lg"
                        onclick="closeModal()">Close</button>
                </div>
            </div>
        </div>

        {{-- Script to handle modal popup and info display --}}
        <script>
            // Function to show information in the modal and update description
            function showInfo(category) {
                var modalTitle = document.getElementById('modalTitle');
                var modalBody = document.getElementById('modalBody');

                switch (category) {
                    case 'Alertness':
                        modalTitle.textContent = 'Alertness';
                        modalBody.innerHTML = `
                            <li>1 = lights are on but no one is home.</li>
                            <li>2 = attention span of a toddler.</li>
                            <li>3 = Can complete a basic sudoku puzzle.</li>
                            <li>4 = Ready to tackle the day.</li>
                            <li>5 = firing on all cylinders.</li>
                        `;
                        break;
                    case 'Excitement':
                        modalTitle.textContent = 'Excitement';
                        modalBody.innerHTML = `
                            <li>1 = Pulling my hair out.</li>
                            <li>2 = fairly stressed.</li>
                            <li>3 = Feeling ok.</li>
                            <li>4 = surfer level stress.</li>
                            <li>5 = Zen monk.</li>
                            `;
                        break;
                    case 'Stress':
                        modalTitle.textContent = 'Stress';
                        modalBody.innerHTML = `
                            <li>1 = Pulling my hair out.</li>
                            <li>2 = fairly stressed.</li>
                            <li>3 = Feeling ok.</li>
                            <li>4 = surfer level stress.</li>
                            <li>5 = Zen monk.</li>
                            `;
                        break;
                    case 'Soreness':
                        modalTitle.textContent = 'Soreness';
                        modalBody.innerHTML = `
                            <li>1 = Crippled.</li>
                            <li>2 = very sore.</li>
                            <li>3 = Sore but ok to push.</li>
                            <li>4 = feeling good!</li>
                            <li>5 = like I never trained.</li>
                            `;
                        break;
                    default:
                        modalTitle.textContent = 'Information';
                        modalBody.innerHTML = '<p>Information not available.</p>';
                }

                toggleModal();
            }

            // Function to toggle modal visibility
            function toggleModal() {
                var modal = document.getElementById('popup');
                modal.classList.toggle('hidden');
                modal.querySelector('.popup-content').classList.toggle('show');
            }

            // Function to close modal
            function closeModal() {
                var modal = document.getElementById('popup');
                modal.querySelector('.popup-content').classList.remove('show');
                modal.querySelector('.popup-content').classList.add('hide');
                setTimeout(function() {
                    modal.classList.add('hidden');
                    modal.querySelector('.popup-content').classList.remove('hide');
                }, 400);
            }

            // Set the original background color as a data attribute for each button on page load
            document.addEventListener('DOMContentLoaded', function() {
                var buttons = document.querySelectorAll('button');
                buttons.forEach(function(btn) {
                    var originalBg = Array.from(btn.classList).find(function(cls) {
                        return cls.startsWith('data-original-bg');
                    });
                    btn.setAttribute('data-original-bg', originalBg);
                });
            });

            // // Event listener for button clicks to handle selection
            // document.addEventListener('click', function(event) {
            //     var button = event.target.closest('button');
            //     if (button) {
            //         if (button.classList.contains('fa-info-circle')) {
            //             // Handle info button click
            //             var category = button.getAttribute('data-category');
            //             showInfo(category);
            //         } else {
            //             // Handle selection button click
            //             var category = button.getAttribute('data-category');
            //             selectButton(button, category);
            //         }
            //     }
            // });
            // Function to handle button selection
            function selectButton(button, category) {
                // Check if the button clicked is the info icon button
                if (button.classList.contains('bi') && button.classList.contains('bi-info-circle')) {
                    // Handle click on info icon button if needed
                    var category = button.getAttribute('data-category');
                    showInfo(category);
                    return; // Exit function early if it's the info icon button
                }

                // Remove active class from all buttons within their respective row
                var buttons = button.parentElement.querySelectorAll('button');
                buttons.forEach(function(btn) {
                    if (!btn.classList.contains('bi') && !btn.classList.contains('bi-info-circle')) {
                        // Exclude buttons with class 'bi' (bootstrap-icons) and 'bi bi-info-circle' (font-awesome)
                        btn.classList.remove('border', 'bg-transparent');
                        btn.classList.add(btn.getAttribute('data-original-bg'));
                    }
                });

                // Add active class to the clicked button, excluding info icon button
                if (!button.classList.contains('bi') && !button.classList.contains('bi-info-circle')) {
                    button.classList.add('border', 'bg-transparent');
                    button.classList.remove(button.getAttribute('data-original-bg'));
                    updateDescription(button.textContent, category);
                }
            }

            // Function to update description based on selected button
            function updateDescription(value, category) {
                scoreCal(value, category);
                var descriptionElement = document.getElementById(category.toLowerCase() + 'Description');
                if (descriptionElement) {
                    switch (category) {
                        case 'Alertness':
                            switch (value) {
                                case '1':
                                    descriptionElement.textContent = '1 = lights are on but no one is home.';
                                    break;
                                case '2':
                                    descriptionElement.textContent = '2 = attention span of a toddler.';
                                    break;
                                case '3':
                                    descriptionElement.textContent = '3 = Can complete a basic sudoku puzzle.';
                                    break;
                                case '4':
                                    descriptionElement.textContent = '4 = Ready to tackle the day.';
                                    break;
                                case '5':
                                    descriptionElement.textContent = '5 = firing on all cylinders.';
                                    break;
                                default:
                                    descriptionElement.textContent = 'Description not available.';
                                    break;
                            }
                            break;
                        case 'Excitement':
                        case 'Stress':
                            // Assuming stress and excitement descriptions are the same
                            switch (value) {
                                case '1':
                                    descriptionElement.textContent = '1 = Pulling my hair out.';
                                    break;
                                case '2':
                                    descriptionElement.textContent = '2 = fairly stressed.';
                                    break;
                                case '3':
                                    descriptionElement.textContent = '3 = Feeling ok.';
                                    break;
                                case '4':
                                    descriptionElement.textContent = '4 = surfer level stress.';
                                    break;
                                case '5':
                                    descriptionElement.textContent = '5 = Zen monk.';
                                    break;
                                default:
                                    descriptionElement.textContent = 'Description not available.';
                                    break;
                            }
                            break;
                        case 'Soreness':
                            switch (value) {
                                case '1':
                                    descriptionElement.textContent = '1 = Crippled.';
                                    break;
                                case '2':
                                    descriptionElement.textContent = '2 = very sore.';
                                    break;
                                case '3':
                                    descriptionElement.textContent = '3 = Sore but ok to push.';
                                    break;
                                case '4':
                                    descriptionElement.textContent = '4 = feeling good!';
                                    break;
                                case '5':
                                    descriptionElement.textContent = '5 = like I never trained.';
                                    break;
                                default:
                                    descriptionElement.textContent = 'Description not available.';
                                    break;
                            }
                            break;
                        default:
                            descriptionElement.textContent = 'Description not available.';
                            break;
                    }
                }
            }
            var alertness = 0;
            var excitement = 0;
            var stress = 0;
            var soreness = 0;
            var sleep = 0;

            function scoreCal(value, category) {
                console.log(category);
                switch (category) {
                    case 'Alertness':
                        switch (value) {
                            case '1':
                                alertness = 20;
                                break;
                            case '2':
                                alertness = 40;
                                break;
                            case '3':
                                alertness = 60;
                                break;
                            case '4':
                                alertness = 80;
                                break;
                            case '5':
                                alertness = 100;
                                break;
                            default:
                                alertness = 0;
                                break;
                        }
                        break;
                    case 'Excitement':
                        switch (value) {
                            case '1':
                                excitement = 20;
                                break;
                            case '2':
                                excitement = 40;
                                break;
                            case '3':
                                excitement = 60;
                                break;
                            case '4':
                                excitement = 80;
                                break;
                            case '5':
                                excitement = 100;
                                break;
                            default:
                                excitement = 0;
                                break;
                        }
                        break;
                    case 'Stress':
                        switch (value) {
                            case '1':
                                stress = 20;
                                break;
                            case '2':
                                stress = 40;
                                break;
                            case '3':
                                stress = 60;
                                break;
                            case '4':
                                stress = 80;
                                break;
                            case '5':
                                stress = 100;
                                break;
                            default:
                                stress = 0;
                                break;
                        }
                        break;
                    case 'Soreness':
                        switch (value) {
                            case '1':
                                soreness = 20;
                                break;
                            case '2':
                                soreness = 40;
                                break;
                            case '3':
                                soreness = 60;
                                break;
                            case '4':
                                soreness = 80;
                                break;
                            case '5':
                                soreness = 100;
                                break;
                            default:
                                soreness = 0;
                                break;
                        }
                        break;
                    case 'Sleep':
                        switch (value) {
                            case '<5':
                                sleep = 20;
                                break;
                            case '5-6':
                                sleep = 40;
                                break;
                            case '6-7':
                                sleep = 60;
                                break;
                            case '7-8':
                                sleep = 80;
                                break;
                            case '8+':
                                sleep = 100;
                                break;
                            default:
                                sleep = 0;
                                break;
                        }
                        break;
                    default:
                        break;
                }

                score.value = (alertness + excitement + stress + soreness + sleep)/5;
            }
        </script>

        <!-- Local Storage Date getting Script -->
        <script>
            // Function to clear localStorage
            // function clearLocalStorage() {
            //     localStorage.removeItem('selectedDay');
            //     localStorage.removeItem('selectedDate');
            // }

            document.addEventListener('DOMContentLoaded', function() {
                const selectedDay = localStorage.getItem('selectedDay');
                let selectedDate = localStorage.getItem('selectedDate');

                // If no date is selected, use today's date
                if (!selectedDate) {
                    const today = new Date();
                    const options = {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    };
                    selectedDate = today.toLocaleDateString('en-US', options);
                    localStorage.setItem('selectedDate', selectedDate); // Save today's date to localStorage
                }

                if (selectedDay) {
                    document.getElementById('selectedDay').textContent = selectedDay;
                }
                document.getElementById('selectedDate').textContent = selectedDate;

                // Event listener to clear localStorage on page unload (refresh or close)
                window.addEventListener('beforeunload', clearLocalStorage);

                // Existing script for handling modal and button clicks
            });

            // Function to handle clearing localStorage when navigating away
            // window.addEventListener('unload', clearLocalStorage);
        </script>
    @endsection
</body>

</html>
