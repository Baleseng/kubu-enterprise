<x-admin-layout>
    
<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700 mt-15">
        
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="bg-gray-50  dark:bg-gray-800 col-span-2">
                <div class="p-2 bg-gray-300">Products Lists</div>
                <div class="flex items-center justify-center overflow-y-scroll h-96">
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

        <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="bg-gray-50  dark:bg-gray-800 w-full">
                <div class="p-2 bg-gray-300">Section Lists</div>
                
                <div class="grid grid-cols-2 m-4 text-center"> 
                
                    <div class="p-4 bg-gray-300 dark:bg-gray-800">
                        <h3 class="text-gray-600 dark:text-gray-500">Page Views</h3>
                        <p class="text-gray-600 text-4xl font-bold  dark:text-gray-500">1.83M</p>
                    </div>   
                    <div class="p-4 bg-gray-200 dark:bg-gray-800">
                        <h3 class="text-gray-600 dark:text-gray-500">Session</h3>
                        <p class="text-gray-600 text-4xl font-bold dark:text-gray-500">0</p>
                    </div>
                    <div class="p-4 bg-gray-200 dark:bg-gray-800">
                        <h3 class="text-gray-600 dark:text-gray-500">Total Orders</h3>
                        <p class="text-gray-600 text-4xl font-bold dark:text-gray-500">5098</p>
                    </div>
                    <div class="p-4 bg-gray-300 dark:bg-gray-800">
                        <h3 class="text-gray-600 dark:text-gray-500">Conversions</h3>
                        <p class="text-gray-600 text-4xl font-bold dark:text-gray-500">116 083</p>
                    </div>
                    <div class="p-4 bg-gray-300 dark:bg-gray-800">
                        <h3 class="text-gray-600 dark:text-gray-500">Conversion Rates</h3>
                        <p class="text-gray-600 text-4xl font-bold dark:text-gray-500">76%</p>
                    </div>
                    <div class="p-4 bg-gray-200 dark:bg-gray-800">
                        <h3 class="text-gray-600 dark:text-gray-500">Cost Per Conversion</h3>
                        <p class="text-gray-600 text-4xl font-bold dark:text-gray-500">R 234.50</p>
                    </div>
                    <div class="p-4 bg-gray-200 dark:bg-gray-800">
                        <h3 class="text-gray-600 dark:text-gray-500">Active Customers</h3>
                        <p class="text-gray-600 text-4xl font-bold dark:text-gray-500">103</p>
                    </div>
                    <div class="p-4 bg-gray-300 dark:bg-gray-800">
                        <h3 class="text-gray-600 dark:text-gray-500">New Customers</h3>
                        <p class="text-gray-600 text-4xl font-bold dark:text-gray-500">58</p>
                    </div>

                </div>
                   
            </div>
            <div class="bg-gray-50  dark:bg-gray-800 col-span-2">
                <div class="p-2 bg-gray-300">Real Time Activity</div>
                <div class="flex items-center justify-center overflow-y-scroll h-96">
                    @include('includes.admin.dashboard-index-realtime')
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4 mb-4">
            
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="bg-gray-50  dark:bg-gray-800">
                <div class="p-2 bg-gray-300">Customer Lists</div>
                <div class="overflow-y-scroll h-96">
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
                <div class="overflow-y-scroll h-96">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    @include('includes.admin.dashboard-table-header')
                    @foreach ($admin as $content)
                        @include('includes.admin.dashboard-table-content')
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
        
        

        
        
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="bg-gray-50  dark:bg-gray-800">
                <div class="p-2 bg-gray-300">Product Orders</div>
                <div class="flex items-center justify-center">
                    @include('includes.admin.dashboard-index-orders')
                </div>
            </div>
            <div class="bg-gray-50  dark:bg-gray-800">
                <div class="p-2 bg-gray-300">Product Sales</div>
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
