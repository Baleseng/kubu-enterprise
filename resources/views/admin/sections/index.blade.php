<x-admin-layout>

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700 mt-15">  
        
        <div class="mb-5 py-1.5 bg-gray-50 dark:bg-gray-800 h-142 max-w-full overflow-y-hidden  "> 
            <a href="{{ url('admin/sections/add') }}" class="flex justify-center content-center text-center text-white uppercase w-60 py-3 bg-blue-700 hover:bg-blue-800 font-medium text-sm px-5  focus:outline-none group">
                <span class="ms-3">Add Section</span>
            </a>
            <div class="p-2 bg-gray-300">Sections List</div>
            <div x-data="{ activeTab: 'tab0' }" class="p-4">
                <!-- Tab Headers -->
                <div class="flex border-b">
                    <button @click="activeTab = 'tab0'" :class="{ 'border-b-2 border-blue-500 text-blue-600': activeTab === 'tab0', 'text-gray-600': activeTab !== 'tab0' }" class="px-4 py-2 text-sm font-medium focus:outline-none">All</button>
                </div>
                <!-- Tab Content -->
                <div class="mt-4">
                    <div x-show="activeTab === 'tab0'">
                     @include('includes.admin.section-tab-all-list')
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</x-admin-layout>
