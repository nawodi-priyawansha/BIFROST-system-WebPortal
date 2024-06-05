<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Financial</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./node_modules/apexcharts/dist/apexcharts.css">
    <script src="./node_modules/lodash/lodash.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha384-uXf6sr8AaXNpfLE4u1jL1EB5Yc5zH06smif1RtZWm1sC2C2Mi41WIebh5q1Q0ynP" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation"></script>
</head>

<body>
    @extends('layout.layout')
    @section('content')
        <div class="container overflow-y-auto w-full" id="container">

            <div class="flex flex-col md:mt-24 md:flex-row text-start mt-24">
                <span class=" text-gray-500"> Home <span> /</span> <span
                        class="text-black font-bold">Financial</span></span>
            </div>
            {{-- tabmenu --}}
            <div class=" rounded shadow-md mt-3 md:text-lg text-sm font-medium text-center ">

                <ul class="flex flex-wrap -mb-px   items-center justify-center ">
                    <a href="#" aria-current="false"
                        class="inline-block rounded shadow  p-4 border-b-2 border-transparent px-5 py-2 hover:border-gray-300 dark:hover:text-gray-300 bg-white text-gray-800 border-gray-200 hover:bg-black hover:text-white hover:font-bold font-bold mb-2">
                        DASHBOARD
                    </a>
                    <a href="#" aria-current="page"
                        class="inline-block p-4 rounded shadow  border-b-2 border-transparent px-5 py-2 dark:text-blue-500 dark:border-blue-500 bg-white text-gray-800 border-gray-200 hover:bg-black hover:text-white hover:font-bold font-bold mb-2">
                        INVOICES
                    </a>
                    <a href="#" aria-current="false"
                        class="inline-block p-4 rounded shadow  border-b-2 border-transparent px-5 py-2 bg-white text-gray-800 border-gray-200 hover:bg-black hover:text-white hover:font-bold font-bold mb-2">
                        JOURNAL
                    </a>
                    <a href="#" aria-current="false"
                        class="inline-block p-4 rounded shadow  border-b-2 border-transparent px-5 py-2 bg-white text-gray-800 border-gray-200 hover:bg-black hover:text-white hover:font-bold font-bold mb-2">
                        LEDGER
                    </a>
                    <a href="#" aria-current="false"
                        class="inline-block p-4 rounded shadow  border-b-2 border-transparent px-5 py-2  bg-white text-gray-800 border-gray-200 hover:bg-black hover:text-white hover:font-bold font-bold mb-2">
                        ASSETS
                    </a>
                    <a href="#" aria-current="false"
                        class="inline-block p-4 rounded shadow  border-b-2 border-transparent px-5 py-2  bg-white text-gray-800 border-gray-200 hover:bg-black hover:text-white hover:font-bold font-bold mb-2">
                        END OF YEAR
                    </a>
                </ul>
            </div>
            {{-- end tab menu --}}
            {{-- year data segement --}}
            <div class="relative  flex flex-wrap -mb-px   items-center justify-center mt-28 ">
                <div
                    class="tooltiptext absolute left-1/2 transform -translate-x-1/2 bottom-full mb-2 bg-black text-white text-center rounded-lg px-4 py-2 text-sm opacity-100 w-48">
                    Year to Date
                    <div
                        class="absolute top-full left-1/2 transform -translate-x-1/2 w-0 h-0 border-t-8 border-t-black border-x-8 border-x-transparent">
                    </div>
                </div>

                <div
                    class="relative w-96 h-20 font-bold text-center pt-4 text-white text-3xl bg-littlegreen lg:mr-16 md:mr-16">
                    $1,500.00</div>
                <div class="relative w-96 h-20 font-bold text-center pt-4 text-black text-3xl shadow-md bg-white">
                    $500.00
                    <div class="absolute top-0 left-0 ml-2 mt-2 text-sm font-normal text-black">GST</div>
                    <div class="absolute bottom-0 right-0 mr-2 mb-2 text-sm font-normal text-black">PAYABLE</div>
                </div>
            </div>

            <div class="flex flex-wrap items-center justify-center"><a href=""
                    class=" text-black  mt-10 underline ">View to Date</a></div>
            {{-- end year date segement --}}

            {{-- year naviagate --}}
            <div class=" w-full">
                <div class=" w-auto mt-10">
                    <div class="flex justify-between mb-4">
                        <span class="text-2xl font-bold "> June 2017</span>
                        <span class="  text-2xl font-bold">
                            <i class="fa fa-angle-left mr-2" aria-hidden="true" style="font-size: 1.5rem;"></i>
                            2017-2018
                            <i class="fa fa-angle-right ml-2" aria-hidden="true" style="font-size: 1.5rem;"></i>
                        </span>

                        <span class="text-2xl font-bold">June 2018 </span>
                    </div>

                    <div class="w-full grid grid-cols-4   md:flex flex-wrap   border-black">
                        <div class="w-auto flex-1 text-center p-2 border border-gray-300 bg-black text-white relative">
                            <div class="font-medium text-sm">July</div>
                            <div class="text-sm">$1,110,000</div>
                        </div>
                        <div class="w-auto flex-1 text-center p-2 border border-gray-300 relative">
                            <div class="text-sm">Aug.</div>
                            <div class="text-sm">$0.00</div>
                        </div>
                        <div class="w-auto flex-1 text-center p-2 border border-gray-300 relative">
                            <div class="text-sm">Sept.</div>
                            <div class="text-sm">$1,110,000</div>
                        </div>
                        <div class="w-auto flex-1 text-center p-2 border border-gray-300 relative bg-yellow-300 ">
                            <div class="absolute top-1 left-1 text-xs">BAS</div>
                            <div class="pt-2 justify-center items-center text-sm">RECEIVABLE</div>
                            <div class="absolute bottom-1 right-1 text-xs">$499</div>
                        </div>
                        <div class="w-auto flex-1 text-center p-2 border border-gray-300">
                            <div class="text-sm">Oct.</div>
                            <div class="text-sm">$1,110,000</div>
                        </div>
                        <div class="w-auto flex-1 text-center p-2 border border-gray-300">
                            <div class="text-sm">Nov.</div>
                            <div class="text-sm">$10,000</div>
                        </div>
                        <div class="w-auto flex-1 text-center p-2 border border-gray-300">
                            <div class="text-sm">Dec.</div>
                            <div class="text-sm">$10,000</div>
                        </div>
                        <div class="w-auto flex-1 text-center p-2 border border-gray-300 bg-yellow-300 relative">
                            <div class="absolute top-1 left-1 text-xs">BAS</div>
                            <div class="pt-2 justify-center items-center text-sm">PAYABLE</div>
                            <div class="absolute bottom-1 right-1 text-xs">$1250.00</div>
                        </div>
                        <div class="w-full flex-1 text-center p-2 border border-gray-300">
                            <div class="text-sm">Jan.</div>
                            <div class="text-sm">$1,110,000</div>
                        </div>
                        <div class="w-full flex-1 text-center p-2 border border-gray-300">
                            <div class="text-sm">Feb.</div>
                            <div class="text-sm">$0,000,000</div>
                        </div>
                        <div class="w-auto flex-1 text-center p-2 border border-gray-300">
                            <div class="text-sm">March</div>
                            <div class="text-sm">$10,000</div>
                        </div>
                        <div class="w-auto flex-1 text-center p-2 border border-gray-300 bg-yellow-300 relative">
                            <div class="absolute top-1 left-1 text-xs">BAS</div>
                            <div class="pt-2 justify-center items-center text-sm">RECEIVABLE</div>
                            <div class="absolute bottom-1 right-1 text-xs">$499.25</div>
                        </div>
                        <div class="w-auto flex-1 text-center p-2 border border-gray-300">
                            <div class="text-sm">April</div>
                            <div class="text-sm">$1,110,000</div>
                        </div>
                        <div class="w-auto flex-1 text-center p-2 border border-gray-300">
                            <div class="text-sm">May</div>
                            <div class="text-sm">$10,000</div>
                        </div>
                        <div class="w-auto flex-1 text-center p-2 border border-gray-300">
                            <div class="text-sm">June</div>
                            <div class="text-sm">$0,000,000</div>
                        </div>
                        <div class="w-auto  fixed flex-1 text-center p-2 border border-gray-300 bg-yellow-300 relative">
                            <div class="absolute top-1 left-1 text-xs">BAS</div>
                            <div class="pt-2 justify-center items-center text-sm">RECEIVABLE</div>
                            <div class="absolute bottom-1 right-1 text-xs">$499.25</div>
                        </div>
                    </div>
                </div>
                {{-- end year naviagte --}}
            </div>

            {{-- chart and profit segement 1 --}}
            <div class="w-full mt-20">
                <div class=" w-auto md:flex gap-4">
                    <div class="w-4/12 md:flex gap-4">
                        <!-- Content for the first part (4/12 width) -->
                        <div class="w-1/2 grid md:flex flex-col gap-4 flex-1">
                            <div class="bg-white p-4 rounded shadow flex-1">
                                <h2 class="text-xl font-bold mb-4">Profit and Loss</h2>
                                <div>
                                    <div class="flex justify-between"><span>Total Income</span><span>$2500.00</span></div>
                                    <div class="flex justify-between"><span>Wages</span><span>$1500.00</span></div>
                                    <div class="flex justify-between"><span>Gross Profit</span><span>$1000.00</span></div>
                                    <div class="flex justify-between"><span>Expenses</span><span>$500.00</span></div>
                                    <div class="flex justify-between font-bold"><span>Net
                                            Profit</span><span>$1000.00</span></div>
                                </div>
                            </div>
                            <div class="bg-white p-4 rounded shadow flex-1 flex-grow">
                                <h2 class="text-xl font-bold mb-4">Invoices</h2>
                                <div class="">
                                    <canvas id="donut-chart"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="w-1/2 flex flex-col gap-4 flex-1 h-28 ">
                            <div class="bg-white p-4 rounded shadow flex-1">
                                <h2 class="text-xl font-bold mb-4">Cash Balance</h2>
                                <p>Last Month</p>
                                <p class="text-green-500 text-3xl font-bold">$3,051.00</p>
                                <p>Cash Balance</p>
                                <p class="text-red-500 text-3xl font-bold">$3,051.00</p>
                            </div>

                            <div class="bg-white p-4 rounded shadow flex-1 flex-grow">
                                <div class="space-y-5">
                                    <!-- Progress -->
                                    <div>
                                        <div class="mb-2 flex justify-between items-center">
                                            <h3 class="text-sm font-semibold text-gray-800 dark:text-white">Progress title
                                            </h3>
                                            <span class="text-sm text-gray-800 dark:text-white">25%</span>
                                        </div>
                                        <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700"
                                            role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500"
                                                style="width: 25%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mb-2 flex justify-between items-center">
                                            <h3 class="text-sm font-semibold text-gray-800 dark:text-white">Progress title
                                            </h3>
                                            <span class="text-sm text-gray-800 dark:text-white">25%</span>
                                        </div>
                                        <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700"
                                            role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500"
                                                style="width: 25%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mb-2 flex justify-between items-center">
                                            <h3 class="text-sm font-semibold text-gray-800 dark:text-white">Progress title
                                            </h3>
                                            <span class="text-sm text-gray-800 dark:text-white">25%</span>
                                        </div>
                                        <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700"
                                            role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500"
                                                style="width: 25%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mb-2 flex justify-between items-center">
                                            <h3 class="text-sm font-semibold text-gray-800 dark:text-white">Progress title
                                            </h3>
                                            <span class="text-sm text-gray-800 dark:text-white">25%</span>
                                        </div>
                                        <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700"
                                            role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500"
                                                style="width: 25%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mb-2 flex justify-between items-center">
                                            <h3 class="text-sm font-semibold text-gray-800 dark:text-white">Progress title
                                            </h3>
                                            <span class="text-sm text-gray-800 dark:text-white">25%</span>
                                        </div>
                                        <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700"
                                            role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500"
                                                style="width: 25%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mb-2 flex justify-between items-center">
                                            <h3 class="text-sm font-semibold text-gray-800 dark:text-white">Progress title
                                            </h3>
                                            <span class="text-sm text-gray-800 dark:text-white">25%</span>
                                        </div>
                                        <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden dark:bg-neutral-700"
                                            role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition duration-500 dark:bg-blue-500"
                                                style="width: 25%"></div>
                                        </div>
                                    </div>

                                    <!-- End Progress -->

                                    <!-- Progress -->
                                    <!-- Remaining progress divs -->
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="md:w-4/12 ">
                        
                            <h2 class="text-xl font-bold mb-4">Graph Heading</h2>
                            <select class="mb-4 p-2 border rounded">
                                <option>View by Month</option>
                                <!-- other options -->
                            </select>
                            <div class=" mt-20 w-full">
                                <canvas id="myChart"></canvas>
                            </div>
                            <script>
                                var ctx = document.getElementById('myChart').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: ['2018', '2019', '2020', '2021', '2022', '2023'],
                                        datasets: [
                                           
                                            {
                                                label: 'Height',
                                                data: [500, 700, 600, 800, 500, 1200],
                                                borderColor: 'rgba(255, 99, 132, 1)',
                                                borderWidth: 2,
                                                fill: false,
                                                tension: 0.4
                                            },
                                            {
                                                label: 'Heading 1',
                                                data: [800, 600, 1200, 900, 1300, 500],
                                                borderColor: 'rgba(54, 162, 235, 1)',
                                                borderWidth: 2,
                                                fill: false,
                                                tension: 0.4
                                            },
                                            {
                                                label: 'Heading 2',
                                                data: [600, 900, 500, 700, 800, 1500],
                                                borderColor: 'rgba(255, 159, 64, 1)',
                                                borderWidth: 2,
                                                fill: false,
                                                tension: 0.4
                                            }
                                        ]
                                    },
                                    options: {
                                        responsive: true,
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        },
                                        plugins: {
                                            annotation: {
                                                annotations: [
                                                    {
                                                        type: 'point',
                                                        xValue: '2021',
                                                        yValue: 1500,
                                                        backgroundColor: 'rgba(0, 255, 0, 0.5)',
                                                        borderColor: 'rgb(0, 255, 0)',
                                                        borderWidth: 2,
                                                        radius: 5,
                                                    },
                                                    {
                                                        type: 'point',
                                                        xValue: '2023',
                                                        yValue: 1200,
                                                        backgroundColor: 'rgba(255, 0, 0, 0.5)',
                                                        borderColor: 'rgb(255, 0, 0)',
                                                        borderWidth: 2,
                                                        radius: 5,
                                                    }
                                                ]
                                            }
                                        }
                                    }
                                });
                            </script>
                    </div>
                    <div class="  md:w-4/12 md:flex gap-4">
                        <!-- Content for the first part (4/12 width) -->
                        <div class="w-1/2  flex flex-col  gap-4">
                            <div class=" bg-lightyellow p-4 rounded shadow flex-1">
                                <h2 class="text-xl font-bold mb-4 text-center">Accounts Receivable</h2>
                                <p class="text-3xl font-bold text-center mt-20">$2,356.12</p>
                                <button class="text-black ml-14 mt-4">Manage</button>
                            </div>
                            <div class="bg-lightyellow p-4 rounded shadow flex-1">
                                <h2 class="text-xl font-bold mb-4 text-center">Receivable Overdue</h2>
                                <p class="text-3xl font-bold text-center mt-20">$2,356.12</p>
                                <button class="text-black ml-14 mt-4">Debtors List</button>
                            </div>
                        </div>
                        <div class="w-1/2 flex flex-col gap-4">
                            <!-- Accounts Payable -->
                            <div class="bg-lightyellow p-4 rounded shadow flex-1">
                                <h2 class="text-xl font-bold mb-4 text-center">Accounts Payable</h2>
                                <p class="text-3xl font-bold text-center mt-20">$2,356.12</p>
                                <button class="text-black ml-14 mt-4">Manage</button>
                            </div>
                            <div class="bg-lightyellow p-4 rounded shadow flex-1">
                                <h2 class="text-xl font-bold mb-4 text-center">Payable Overdue</h2>
                                <p class="text-3xl font-bold text-center mt-20">$2,356.12</p>
                                <button class="text-black ml-14 mt-4">Creditors List</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{-- chart and profit segment 1 end --}}

            {{-- barchar segement  --}}
            <div class=" w-full mt-20">
                <div class="w-auto md:flex gap-4">
                    <div class="w-4/12 md:flex">
                        <div class="bg-white rounded-lg shadow-lg p-5 w-full">
                            <h2 class="text-center text-2xl font-bold mb-5">Revenue</h2>
                            <div class="space-y-4">
                                <div class="flex items-center">
                        
                                    <div class=""><span class="text-sm ">JPLMS Internal Works</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    
                                    <span class="ml-1">$90</span>
                                </div>

                                <div class="flex items-center">
                        
                                    <div class=""><span class="text-sm ">Beach Avenue Wholesalers</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    
                                    <span class="ml-1">$90</span>
                                </div>


                                <div class="flex items-center">
                        
                                    <div class=""><span class="text-sm ">G Terlato</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    
                                    <span class="ml-1">$90</span>
                                </div>


                              <div class="flex items-center">
                        
                                    <div class=""><span class="text-sm ">Alliance Financial Group</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    
                                    <span class="ml-1">$90</span>
                                </div>

                             <div class="flex items-center">
                        
                                    <div class=""><span class="text-sm ">Alliance Financial Group</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    
                                    <span class="ml-1">$90</span>
                                </div>

                              <div class="flex items-center">
                        
                                    <div class=""><span class="text-sm ">JPLMS Internal Works</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    
                                    <span class="ml-1">$90</span>
                                </div>


                              <div class="flex items-center">
                        
                                    <div class=""><span class="text-sm ">JPLMS Internal Works</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    
                                    <span class="ml-1">$90</span>
                                </div>


                                <div class="flex items-center">
                        
                                    <div class=""><span class="text-sm ">JPLMS Internal Works</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    
                                    <span class="ml-1">$90</span>
                                </div>
                            </div>

                            <div class="bg-yellow-400 text-center text-white font-bold py-2 mt-5 rounded-md">
                                No Data Found
                            </div>
                        </div>
                    </div>
                    <div class="w-4/12  md:flex">
                        <div class="bg-white rounded-lg shadow-lg p-5 w-full">
                            <h2 class="text-center text-2xl font-bold mb-5">Expenses</h2>

                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class=" w-28"><span class="text-sm ">Vehicle</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>

                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class=" w-28"><span class="text-sm ">Payroll</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class=" w-28"><span class="text-sm ">Internet/Phone</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class=" w-28"><span class="text-sm ">Accomodation</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class=" w-28"><span class="text-sm ">Fines</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class=" w-28"><span class="text-sm ">Entertainment</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class=" w-28"><span class="text-sm ">Distribution</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class=" w-28"><span class="text-sm ">Equipment/Furniture <br>/Supplies</span>
                                    </div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class=" w-28"><span class="text-sm ">Membership Fees</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class=" w-28"><span class="text-sm ">Software/Research</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class=" w-28"><span class="text-sm ">JPL Automotive</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class=" w-28"><span class="text-sm ">Accountant Fee</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class="w-28"><span class="text-sm ">Director Fee</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class="w-28"><span class="text-sm ">Loan Repayment
                                        </span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class="w-28"><span class="text-sm ">Wages
                                        </span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>
                            </div>
                            <div class="bg-yellow-400 text-center text-white font-bold py-2 mt-5 rounded-md">
                                No Data Found
                            </div>
                        </div>
                    </div>



                    <div class="w-4/12  md:flex">
                        <div class="bg-white rounded-lg shadow-lg p-5 w-full">
                            <h2 class="text-center text-2xl font-bold mb-5">Expenses</h2>

                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class=" w-28"><span class="text-sm ">Membership Fees</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>

                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class=" w-28"><span class="text-sm ">Membership Fees</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class=" w-28"><span class="text-sm ">Software/Research</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class=" w-28"><span class="text-sm ">JPL Automotive</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class=" w-28"><span class="text-sm ">Accountant Fee</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class="w-28"><span class="text-sm ">Director Fee</span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class="w-28"><span class="text-sm ">Loan Repayment
                                        </span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fa fa-car mr-2" aria-hidden="true"></i>
                                    <div class="w-28"><span class="text-sm ">Wages
                                        </span></div>

                                    <div class="ml-8 flex-1">
                                        <div
                                            class="progress-bar w-10/12 h-5 bg-gray-300 rounded-md overflow-hidden relative">
                                            <div class="progress bg-blue-500 h-full" style="width: 90%;"></div>
                                            <span
                                                class="amount absolute top-0 right-0 text-black text-sm px-1">$1200</span>
                                        </div>
                                    </div>
                                    <div class=" mx-3 ">
                                        <i class="fa fa-file-text " aria-hidden="true"></i>
                                    </div>
                                    <span class="ml-1">$90</span>
                                </div>




                            </div>

                            <div class="bg-yellow-400 text-center text-white font-bold py-2 mt-5 rounded-md">
                                No Data Found
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end bar chart segement --}}
        </div>
    @endsection
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('donut-chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Red', 'Blue', 'Yellow'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    });
</script>


</html>
