<x-admin-layout>

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700 mt-28">  
        <div class="grid grid-cols-6 gap-2 mb-4 text-center"> 
            <div class="p-3 bg-green-500 dark:bg-gray-800">
                <h3 class="text-white dark:text-gray-500">Orders</h3>
                <p class="text-4xl font-bold text-white dark:text-gray-500">0</p>
            </div>   
            <div class="p-3 bg-red-500 dark:bg-gray-800">
                <h3 class="text-white dark:text-gray-500">Refunds</h3>
                <p class="text-4xl font-bold text-white dark:text-gray-500">0</p>
            </div>
            <div class="p-3 bg-red-500 dark:bg-gray-800">
                <h3 class="text-white dark:text-gray-500">Voided</h3>
                <p class="text-4xl font-bold text-white dark:text-gray-500">0</p>
            </div>
            <div class="p-3 bg-green-500 dark:bg-gray-800">
                <h3 class="text-white dark:text-gray-500">Sales</h3>
                <p class="text-4xl font-bold text-white dark:text-gray-500">R 0</p>
            </div>
            <div class="p-3 bg-green-500 dark:bg-gray-800">
                <h3 class="text-white dark:text-gray-500">Customers</h3>
                <p class="text-4xl font-bold text-white dark:text-gray-500">0</p>
            </div>
            <div class="p-3 bg-green-500 dark:bg-gray-800">
                <h3 class="text-white dark:text-gray-500">Cart</h3>
                <p class="text-4xl font-bold text-white dark:text-gray-500">0</p>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="bg-gray-50  dark:bg-gray-800">
                <div class="p-2 bg-gray-300">Product</div>
                <div class="flex items-center justify-center">
                    
                    <a href="#" class="flex flex-col items-center bg-neutral-primary-soft p-6 md:flex-row md:max-w-xl md:flex-row md:max-w-xl">
                        <img class="object-cover w-full rounded-base h-64 md:h-auto md:w-48 mb-4 md:mb-0" src="{{ url('storage/'.$id->file_path) }}" alt="">
                        <div class="flex flex-col justify-between md:p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-heading">{{ $id->product_name }}</h5>
                             <p class="line-clamp-5 transition-all duration-300">{{ $id->product_description }}</p>
                            
                        </div>
                    </a>

                </div>
            </div>
            <div class="bg-gray-50  dark:bg-gray-800">
                <div class="p-2 bg-gray-300">Order</div>
                <div class="flex items-center justify-center">
                    @include('includes.admin.report-product-orders')
                </div>
            </div>
            <div class="bg-gray-50  dark:bg-gray-800">
                <div class="p-2 bg-gray-300">Customers</div>
                <div class="flex items-center justify-center">
                    @include('includes.admin.report-product-customers')
                </div>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800">
                <div class="p-2 bg-gray-300">Comparison</div>
                <div class="flex items-center justify-center">
                    @include('includes.admin.report-product-comperison')
                </div>
            </div> 
        </div>
        <div class="bg-gray-50 dark:bg-gray-800 max-w-7x1">
            <div class="p-2 bg-gray-300">Region</div>
            <div class="flex items-center justify-center">
                @include('includes.admin.report-product-region')
            </div>
        </div>

    </div>
</div>

</x-admin-layout>
