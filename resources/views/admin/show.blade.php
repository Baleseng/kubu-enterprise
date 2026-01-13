
<x-admin-layout>

    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg mt-20">
            <div class="mx-auto max-w-2xl pt-10 lg:grid lg:max-w-7xl lg:pt-10">
                <!-- BREADCRUM -->
                @include('includes.product-items-breadcrum')
            </div>          
            <div class="mx-auto max-w-2xl px-4 pb-16 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:grid-rows-[auto_auto_1fr] lg:gap-x-5 lg:px-5 lg:pb-24">
                    
                <!-- INFORMATION -->
                @include('includes.product-items-body')
                <!-- SIDEBAR -->
                @include('includes.product-items-sidebar')  

                    <form class="mt-10">
                        <button type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-hidden">Publish</button>
                    </form>
                </div>
                </div> 
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
