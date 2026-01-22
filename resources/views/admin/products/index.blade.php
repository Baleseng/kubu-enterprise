<x-admin-layout>

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700 mt-15">

        <div class="mb-5 py-1.5 bg-gray-50 dark:bg-gray-800 h-142 max-w-full overflow-y-hidden  "> 
            <a href="{{ url('admin/products/post') }}" class="flex justify-center content-center text-center text-white uppercase w-60 py-3 bg-blue-700 hover:bg-blue-800 font-medium text-sm px-5  focus:outline-none group">
                <span class="ms-3">Post Product</span>
            </a>
            <div class="p-2 bg-gray-300">Products List</div>
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
                    @include('includes.admin.product-tab-all-list')
                    </div>

                    <div x-show="activeTab === 'tab1'">
                        @include('includes.admin.product-tab-unassign-list')
                    </div>

                    <div x-show="activeTab === 'tab2'">
                        @include('includes.admin.product-tab-ordered-list')
                    </div>

                    <div x-show="activeTab === 'tab3'">
                        @include('includes.admin.product-tab-prepared-list')
                    </div>

                    <div x-show="activeTab === 'tab4'">
                        @include('includes.admin.product-tab-delivered-list')
                    </div>

                    <div x-show="activeTab === 'tab5'">
                        @include('includes.admin.product-tab-pending-list')
                    </div>

                    <div x-show="activeTab === 'tab6'">
                        @include('includes.admin.product-tab-archive-list')
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</x-admin-layout>
