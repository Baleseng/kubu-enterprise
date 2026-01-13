<x-app-layout>
    
    <x-slot name="header"></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                
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
                          1                  </div>

                    <div x-show="activeTab === 'tab1'">
2                    </div>

                    <div x-show="activeTab === 'tab2'">
3                    </div>

                    <div x-show="activeTab === 'tab3'">
4
                    </div>

                    <div x-show="activeTab === 'tab4'">
5
                    </div>

                    <div x-show="activeTab === 'tab5'">
                        6
                    </div>

                    <div x-show="activeTab === 'tab6'">
                        7
                    </div>
                </div>
            </div>


              </div>
            </div>
        </div>
    </div>

    

    
</x-app-layout>
