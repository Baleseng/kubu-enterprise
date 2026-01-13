<x-admin-layout>
    
<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700 mt-15">
        
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

        <div class="mb-5 py-1.5 bg-gray-50 dark:bg-gray-800 h-142 max-w-full overflow-y-hidden  ">
            <div class="p-2 bg-gray-300">Product Orders</div>
            <div x-data="{ activeTab: 'tab0' }" class="p-4">
                <!-- Tab Headers -->
                <div class="flex border-b">
                    <button @click="activeTab = 'tab0'" :class="{ 'border-b-2 border-blue-500 text-blue-600': activeTab === 'tab0', 'text-gray-600': activeTab !== 'tab0' }" class="px-4 py-2 text-sm font-medium focus:outline-none">All</button>

                    <button @click="activeTab = 'tab1'" :class="{ 'border-b-2 border-blue-500 text-blue-600': activeTab === 'tab1', 'text-gray-600': activeTab !== 'tab1' }" class="px-4 py-2 text-sm font-medium focus:outline-none">Unassign</button>

                    <button @click="activeTab = 'tab2'" :class="{ 'border-b-2 border-blue-500 text-blue-600': activeTab === 'tab2', 'text-gray-600': activeTab !== 'tab2' }" class="px-4 py-2 text-sm font-medium focus:outline-none">Ordered</button>

                    <button @click="activeTab = 'tab3'" :class="{ 'border-b-2 border-blue-500 text-blue-600': activeTab === 'tab3', 'text-gray-600': activeTab !== 'tab3' }" class="px-4 py-2 text-sm font-medium focus:outline-none">Prepared</button>
                    
                    <button @click="activeTab = 'tab4'" :class="{ 'border-b-2 border-blue-500 text-blue-600': activeTab === 'tab4', 'text-gray-600': activeTab !== 'tab4' }" class="px-4 py-2 text-sm font-medium focus:outline-none">Delivered</button>

                    <button @click="activeTab = 'tab5'" :class="{ 'border-b-2 border-blue-500 text-blue-600': activeTab === 'tab5', 'text-gray-600': activeTab !== 'tab5' }" class="px-4 py-2 text-sm font-medium focus:outline-none">Pending</button>

                    <button @click="activeTab = 'tab6'" :class="{ 'border-b-2 border-blue-500 text-blue-600': activeTab === 'tab6', 'text-gray-600': activeTab !== 'tab6' }" class="px-4 py-2 text-sm font-medium focus:outline-none">Archive</button>
                </div>

                <!-- Tab Content -->
                <div class="mt-4">
                    <div x-show="activeTab === 'tab0'">
                        @include('includes.admin.items-product-list')
                    </div>

                    <div x-show="activeTab === 'tab1'">
                        @include('includes.admin.items-unassign-list')
                    </div>

                    <div x-show="activeTab === 'tab2'">
                        @include('includes.admin.items-ordered-list')
                    </div>

                    <div x-show="activeTab === 'tab3'">
                        @include('includes.admin.items-prepared-list')
                    </div>

                    <div x-show="activeTab === 'tab4'">
                        @include('includes.admin.items-delivered-list')
                    </div>

                    <div x-show="activeTab === 'tab5'">
                        @include('includes.admin.items-pending-list')
                    </div>

                    <div x-show="activeTab === 'tab6'">
                        @include('includes.admin.items-pending-list')
                    </div>
                </div>
            </div>
        </div>
        


        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="bg-gray-50  dark:bg-gray-800">
                <div class="p-2 bg-gray-300">Orders</div>
                <div class="flex items-center justify-center">
                    @include('includes.admin.dashboard-product-orders')
                </div>
            </div>
            <div class="bg-gray-50  dark:bg-gray-800">
                <div class="p-2 bg-gray-300">Profits</div>
                <div class="flex items-center justify-center">
                    @include('includes.admin.dashboard-product-profits')
                </div>
            </div>
            <div class="bg-gray-50  dark:bg-gray-800">
                <div class="p-2 bg-gray-300">Revenue</div>
                <div class="flex items-center justify-center">
                    @include('includes.admin.dashboard-product-revenue')
                </div>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800">
                <div class="p-2 bg-gray-300">Expenses</div>
                <div class="flex items-center justify-center">
                    @include('includes.admin.dashboard-product-expenses')
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
      function tabBtnIndex(tabIdIndex) {
        var i;
        var x = document.getElementsByClassName("tabClassIndex");
        for (i = 0; i < x.length; i++) {x[i].style.display = "none";}
        document.getElementById(tabIdIndex).style.display = "block";
      }
</script>

</x-admin-layout>
