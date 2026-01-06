<x-app-layout>
    
    <x-slot name="header"></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">

                <div x-data="{ activeTab: 'tab1' }" class="p-4">
    <!-- Tab Headers -->
    <div class="flex border-b">
        <button @click="activeTab = 'tab1'" :class="{ 'border-b-2 border-blue-500 text-blue-600': activeTab === 'tab1', 'text-gray-600': activeTab !== 'tab1' }"
                class="px-4 py-2 text-sm font-medium focus:outline-none">
            Tab 1
        </button>
        <button @click="activeTab = 'tab2'" :class="{ 'border-b-2 border-blue-500 text-blue-600': activeTab === 'tab2', 'text-gray-600': activeTab !== 'tab2' }"
                class="px-4 py-2 text-sm font-medium focus:outline-none">
            Tab 2
        </button>
        <button @click="activeTab = 'tab3'" :class="{ 'border-b-2 border-blue-500 text-blue-600': activeTab === 'tab3', 'text-gray-600': activeTab !== 'tab3' }"
                class="px-4 py-2 text-sm font-medium focus:outline-none">
            Tab 3
        </button>
    </div>

    <!-- Tab Content -->
    <div class="mt-4">
        <div x-show="activeTab === 'tab1'">
            <p>Content for Tab 1 goes here. This can be a separate Blade partial or specific data.</p>
        </div>
        <div x-show="activeTab === 'tab2'">
            <p>Content for Tab 2 goes here.</p>
        </div>
        <div x-show="activeTab === 'tab3'">
            <p>Content for Tab 3 goes here.</p>
        </div>
    </div>
</div>

                                     
              </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
