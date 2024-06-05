<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <title>Access</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans antialiased bg-gray-100">
    @extends('layout.layout')
    {{-- @section('content') --}}
    <!-- Main content (Dashboard) -->
    <main class="flex-grow bg-gray-100 p-4 overflow-y-auto mt-20">
        <div class="container mx-auto">
            <div class="breadcrumb text-sm mb-4">
                <a href="#" class="text-gray-500 no-underline hover:underline">Home</a> / <span><strong> Access </strong></span>
            </div>
            <div class="card bg-white p-4 rounded-lg shadow-md">
                <table class="w-full">
                    <tr class="border-b flex text-sm flex-col sm:table-row">
                        <td class="py-2 pr-6 text-gray-700 sm:w-1/4">Name</td>
                        <td class="py-2  sm:pl-0 sm:w-3/4">James</td>
                      </tr>
                      <tr class="border-b flex text-sm flex-col sm:table-row">
                        <td class="py-2 pr-6 text-gray-700 sm:w-1/4">Email</td>
                        <td class="py-2  sm:pl-0 sm:w-3/4">jlukins@ruwebd.com.au</td>
                      </tr>
                      <tr class="border-b flex text-sm flex-col sm:table-row">
                        <td class="py-2 pr-6 text-gray-700 sm:w-1/4">Pin Number</td>
                        <td class="py-2  sm:pl-0 sm:w-3/4">123456789</td>
                      </tr>
                    <tr class="border-b flex flex-col sm:table-row">
                        <td class="py-2 pr-6 text-gray-700 sm:w-1/5">Access</td>
                        <td class="py-2 pl-2 sm:pl-0 sm:w-full">
                            <div class="access-buttons text-xs flex flex-wrap gap-1 sm:gap-2 ">
                                <label for="users" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Users</label>
                                <label for="clients" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Clients</label>
                                <label for="jobs" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Jobs</label>
                                <label for="drivers" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Drivers</label>
                                <label for="timesheet" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Timesheet</label>
                                <label for="imessage" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">iMessage</label>
                                <label for="fuelLevy" class="border px-2 py-1 sm:px-4 sm:py-2  rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Fuel Levy</label>
                                <label for="truck" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Truck</label>
                              </div>
                            <div class="access-buttons flex flex-wrap gap-2 mt-2">
                                <label class="ml-2 text-sm border rounded-3xl px-2 py-1 bg-yellow-300"><strong>Account</strong></label>
                            </div>
                            <div class="access-buttons text-xs flex flex-wrap gap-1 sm:gap-2 mt-2 ">
                                <label class="border text-gray-500 border-gray-800 bg-white px-4 py-2 rounded-md md:w-auto" readonly>Accounts</label>
                                <label class="border text-gray-500 border-gray-300 bg-white px-4 py-2 rounded-md md:w-auto" readonly>Bank Ledger</label>
                                <label class="border text-gray-500 border-gray-300 bg-white px-4 py-2 rounded-md md:w-auto" readonly>Invoices</label>
                                <label class="border text-gray-500 border-gray-800 bg-white px-2 py-1 sm:px-4 sm:py-2 rounded-md md:w-auto" readonly>Outgoings</label>
                                <label class="border text-gray-500 border-gray-300 bg-white px-4 py-2 rounded-md md:w-auto" readonly>Journal</label>
                                <label class="border text-gray-500 border-gray-300 bg-white px-2 py-1 sm:px-4 sm:py-2 rounded-md md:w-auto" readonly>Summary</label>
                                <label class="border text-gray-500 border-gray-300 bg-white px-4 py-2 rounded-md md:w-auto" readonly>End Of Year</label>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b flex flex-col sm:table-row">
                        <td class="py-2 pr-6  text-gray-700 sm:w-1/4">Access Type</td>
                        <td class="access-type flex items-center py-2  sm:pl-0 sm:w-3/4">
                            <input type="checkbox" id="readOnly" class="mr-2">
                            <label for="readOnly">Read Only</label>
                        </td>
                    </tr>
                </table>
                <div class="actions flex flex-row flex-wrap  sm:pl-72  gap-4 mt-6">
                    <div id="editAction" class="cursor-pointer text-black flex items-center">
                        <i class="fas fa-edit mr-1"></i>
                        <i>Edit</i>
                    </div>
                    <div id="deleteAction" class="cursor-pointer text-black flex items-center">
                        <i class="fa-solid fa-trash mr-1"></i>
                        <i>Delete</i>
                    </div>
                    <div id="resetPinAction" class="cursor-pointer text-black flex items-center">
                        <i class="fa-solid fa-rotate-right mr-1"></i>
                        <i>Reset Pin</i>
                    </div>
                </div>
            </div>

            {{-- Second table started --}}

            <div class="card bg-white p-4 rounded-lg shadow-md mt-4">
                <table class="w-full">
                    <tr class="border-b flex text-sm flex-col sm:table-row">
                        <td class="py-2 pr-6 text-gray-700 sm:w-1/4">Name</td>
                        <td class="py-2  sm:pl-0 sm:w-3/4">James</td>
                      </tr>
                      <tr class="border-b flex text-sm flex-col sm:table-row">
                        <td class="py-2 pr-6 text-gray-700 sm:w-1/4">Email</td>
                        <td class="py-2  sm:pl-0 sm:w-3/4">jlukins@ruwebd.com.au</td>
                      </tr>
                      <tr class="border-b flex text-sm flex-col sm:table-row">
                        <td class="py-2 pr-6 text-gray-700 sm:w-1/4">Pin Number</td>
                        <td class="py-2  sm:pl-0 sm:w-3/4">123456789</td>
                      </tr>
                    <tr class="border-b flex flex-col sm:table-row">
                        <td class="py-2 pr-6 text-gray-700 sm:w-1/5">Access</td>
                        <td class="py-2 pl-2 sm:pl-0 sm:w-full">
                            <div class="access-buttons text-xs flex flex-wrap gap-1 sm:gap-2 ">
                                <label for="users" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Users</label>
                                <label for="clients" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Clients</label>
                                <label for="jobs" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Jobs</label>
                                <label for="drivers" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Drivers</label>
                                <label for="timesheet" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Timesheet</label>
                                <label for="imessage" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">iMessage</label>
                                <label for="fuelLevy" class="border px-2 py-1 sm:px-4 sm:py-2  rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Fuel Levy</label>
                                <label for="truck" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Truck</label>
                              </div>
                            <div class="access-buttons flex flex-wrap gap-2 mt-2">
                                <label class="ml-2 text-sm border rounded-3xl px-2 py-1 bg-yellow-300"><strong>Account</strong></label>
                            </div>
                            <div class="access-buttons text-xs flex flex-wrap gap-1 sm:gap-2 mt-2 ">
                                <label class="border text-gray-500 border-gray-800 bg-white px-4 py-2 rounded-md md:w-auto" readonly>Accounts</label>
                                <label class="border text-gray-500 border-gray-300 bg-white px-4 py-2 rounded-md md:w-auto" readonly>Bank Ledger</label>
                                <label class="border text-gray-500 border-gray-300 bg-white px-4 py-2 rounded-md md:w-auto" readonly>Invoices</label>
                                <label class="border text-gray-500 border-gray-800 bg-white px-2 py-1 sm:px-4 sm:py-2 rounded-md md:w-auto" readonly>Outgoings</label>
                                <label class="border text-gray-500 border-gray-300 bg-white px-4 py-2 rounded-md md:w-auto" readonly>Journal</label>
                                <label class="border text-gray-500 border-gray-300 bg-white px-2 py-1 sm:px-4 sm:py-2 rounded-md md:w-auto" readonly>Summary</label>
                                <label class="border text-gray-500 border-gray-300 bg-white px-4 py-2 rounded-md md:w-auto" readonly>End Of Year</label>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b flex flex-col sm:table-row">
                        <td class="py-2 pr-6  text-gray-700 sm:w-1/4">Access Type</td>
                        <td class="access-type flex items-center py-2  sm:pl-0 sm:w-3/4">
                            <input type="checkbox" id="readOnly" class="mr-2">
                            <label for="readOnly">Read Only</label>
                        </td>
                    </tr>
                </table>
                <div class="actions flex flex-row flex-wrap  sm:pl-72  gap-4 mt-6">
                    <div id="editAction" class="cursor-pointer text-black flex items-center">
                        <i class="fas fa-edit mr-1"></i>
                        <i>Edit</i>
                    </div>
                    <div id="deleteAction" class="cursor-pointer text-black flex items-center">
                        <i class="fa-solid fa-trash mr-1"></i>
                        <i>Delete</i>
                    </div>
                    <div id="resetPinAction" class="cursor-pointer text-black flex items-center">
                        <i class="fa-solid fa-rotate-right mr-1"></i>
                        <i>Reset Pin</i>
                    </div>
                </div>
            </div>

            {{-- Second table closed  --}}

            {{-- Third table Start --}}
            <div class="card bg-white p-4 rounded-lg shadow-md mt-4">
                <table class="w-full">
                    <tr class="border-b flex text-sm flex-col sm:table-row">
                        <td class="py-2 pr-6 text-gray-700 sm:w-1/4">Name</td>
                        <td class="py-2  sm:pl-0 sm:w-3/4">James</td>
                      </tr>
                      <tr class="border-b flex text-sm flex-col sm:table-row">
                        <td class="py-2 pr-6 text-gray-700 sm:w-1/4">Email</td>
                        <td class="py-2  sm:pl-0 sm:w-3/4">jlukins@ruwebd.com.au</td>
                      </tr>
                      <tr class="border-b flex text-sm flex-col sm:table-row">
                        <td class="py-2 pr-6 text-gray-700 sm:w-1/4">Pin Number</td>
                        <td class="py-2  sm:pl-0 sm:w-3/4">123456789</td>
                      </tr>
                    <tr class="border-b flex flex-col sm:table-row">
                        <td class="py-2 pr-6 text-gray-700 sm:w-1/5">Access</td>
                        <td class="py-2 pl-2 sm:pl-0 sm:w-full">
                            <div class="access-buttons text-xs flex flex-wrap gap-1 sm:gap-2 ">
                                <label for="users" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Users</label>
                                <label for="clients" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Clients</label>
                                <label for="jobs" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Jobs</label>
                                <label for="drivers" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Drivers</label>
                                <label for="timesheet" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Timesheet</label>
                                <label for="imessage" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">iMessage</label>
                                <label for="fuelLevy" class="border px-2 py-1 sm:px-4 sm:py-2  rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Fuel Levy</label>
                                <label for="truck" class="border px-4 py-2 rounded-md text-gray-500 hover:text-gray-700 cursor-pointer">Truck</label>
                              </div>
                            <div class="access-buttons flex flex-wrap gap-2 mt-2">
                                <label class="ml-2 text-sm border rounded-3xl px-2 py-1 bg-yellow-300"><strong>Account</strong></label>
                            </div>
                            <div class="access-buttons text-xs flex flex-wrap gap-1 sm:gap-2 mt-2 ">
                                <label class="border text-gray-500 border-gray-800 bg-white px-4 py-2 rounded-md md:w-auto" readonly>Accounts</label>
                                <label class="border text-gray-500 border-gray-300 bg-white px-4 py-2 rounded-md md:w-auto" readonly>Bank Ledger</label>
                                <label class="border text-gray-500 border-gray-300 bg-white px-4 py-2 rounded-md md:w-auto" readonly>Invoices</label>
                                <label class="border text-gray-500 border-gray-800 bg-white px-2 py-1 sm:px-4 sm:py-2 rounded-md md:w-auto" readonly>Outgoings</label>
                                <label class="border text-gray-500 border-gray-300 bg-white px-4 py-2 rounded-md md:w-auto" readonly>Journal</label>
                                <label class="border text-gray-500 border-gray-300 bg-white px-2 py-1 sm:px-4 sm:py-2 rounded-md md:w-auto" readonly>Summary</label>
                                <label class="border text-gray-500 border-gray-300 bg-white px-4 py-2 rounded-md md:w-auto" readonly>End Of Year</label>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b flex flex-col sm:table-row">
                        <td class="py-2 pr-6  text-gray-700 sm:w-1/4">Access Type</td>
                        <td class="access-type flex items-center py-2  sm:pl-0 sm:w-3/4">
                            <input type="checkbox" id="readOnly" class="mr-2">
                            <label for="readOnly">Read Only</label>
                        </td>
                    </tr>
                </table>
                <div class="actions flex flex-row flex-wrap  sm:pl-72  gap-4 mt-6">
                    <div id="editAction" class="cursor-pointer text-black flex items-center">
                        <i class="fas fa-edit mr-1"></i>
                        <i>Edit</i>
                    </div>
                    <div id="deleteAction" class="cursor-pointer text-black flex items-center">
                        <i class="fa-solid fa-trash mr-1"></i>
                        <i>Delete</i>
                    </div>
                    <div id="resetPinAction" class="cursor-pointer text-black flex items-center">
                        <i class="fa-solid fa-rotate-right mr-1"></i>
                        <i>Reset Pin</i>
                    </div>
                </div>
            </div>
            {{-- Third table closed --}}
        </div>
    </main>
    {{-- @endsection --}}
</body>

</html>
