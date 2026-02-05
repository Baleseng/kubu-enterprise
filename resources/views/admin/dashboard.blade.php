<x-admin-layout>
    
<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700 mt-15">
        <div class="grid grid-cols-1 gap-4 mb-4">
            <div class="bg-gray-50  dark:bg-gray-800">
                <div class="p-2 bg-gray-300">Real Time Activity</div>
            @include('includes.admin.dashboard-index-realtime')
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="bg-gray-50  dark:bg-gray-800">
                <div class="p-2 bg-gray-300">Customer Lists</div>
                <div class="flex items-center justify-center">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    @include('includes.admin.dashboard-table-header')
                    @foreach ($customer as $content)
                        @include('includes.admin.dashboard-table-content')
                    @endforeach
                    </table>
                </div>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800">
                <div class="p-2 bg-gray-300">Admin Lists</div>
                <div class="flex items-center justify-center">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    @include('includes.admin.dashboard-table-header')
                    @foreach ($admin as $content)
                        @include('includes.admin.dashboard-table-content')
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-4 mb-4 text-center"> 
            <div class="p-3 bg-red-500 dark:bg-gray-800">
                <h3 class="text-white dark:text-gray-500">Customers</h3>
                <p class="text-4xl font-bold text-white dark:text-gray-500">0</p>
            </div>   
            <div class="p-3 bg-indigo-500 dark:bg-gray-800">
                <h3 class="text-white dark:text-gray-500">Session</h3>
                <p class="text-4xl font-bold text-white dark:text-gray-500">0</p>
            </div>
            <div class="p-3 bg-blue-500 dark:bg-gray-800">
                <h3 class="text-white dark:text-gray-500">Bounce Rate</h3>
                <p class="text-4xl font-bold text-white dark:text-gray-500">0%</p>
            </div>
            <div class="p-3 bg-green-500 dark:bg-gray-800">
                <h3 class="text-white dark:text-gray-500">Session Rates</h3>
                <p class="text-4xl font-bold text-white dark:text-gray-500">0%</p>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="bg-gray-50  dark:bg-gray-800 col-span-2">
                <div class="p-2 bg-gray-300">Products Lists</div>
                <div class="flex items-center justify-center">
                   <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    @include('includes.admin.dashboard-table-header')
                    @foreach ($product as $content)
                        @include('includes.admin.dashboard-table-content')
                    @endforeach
                    </table>
                </div>
            </div>
            <div class="bg-gray-50  dark:bg-gray-800 w-full">
                <div class="p-2 bg-gray-300">Section Lists</div>
                <div class="flex items-center justify-center">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    @include('includes.admin.dashboard-table-header')
                    @foreach ($section as $content)
                        @include('includes.admin.dashboard-table-content')
                    @endforeach
                    </table>
                </div>
            </div>
        </div>

        
        
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="bg-gray-50  dark:bg-gray-800">
                <div class="p-2 bg-gray-300">Overall Total Orders</div>
                <div class="flex items-center justify-center">
                    @include('includes.admin.dashboard-index-orders')
                </div>
            </div>
            <div class="bg-gray-50  dark:bg-gray-800">
                <div class="p-2 bg-gray-300">Overall Total Sales</div>
                <div class="flex items-center justify-center">
                    @include('includes.admin.dashboard-index-sales')
                </div>
            </div>
            <div class="bg-gray-50  dark:bg-gray-800">
                <div class="p-2 bg-gray-300">Revenue</div>
                <div class="flex items-center justify-center">
                    @include('includes.admin.dashboard-index-revenue')
                </div>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800">
                <div class="p-2 bg-gray-300">Expenses</div>
                <div class="flex items-center justify-center">
                    @include('includes.admin.dashboard-index-expenses')
                </div>
            </div>
        </div>
    </div>
</div>
;
</x-admin-layout>
