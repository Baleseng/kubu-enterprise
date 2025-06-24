<x-app-layout>
    <x-slot name="header">
        
        @include('includes.user.items-search')

    </x-slot>

        <div class="max-w-7xl mx-auto sm:">
            <div class="dark:bg-gray-800 overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-row">
                   
                    @include('includes.user.items-cards')
                    
                </div>
            </div>
        </div>
 
</x-app-layout>



