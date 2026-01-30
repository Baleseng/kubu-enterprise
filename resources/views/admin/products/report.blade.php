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
                    
                    <div class="flex flex-col items-center bg-neutral-primary-soft pt-2 md:flex-row md:max-w-2xl">
                        <img class="object-cover w-full rounded-base h-48 mb-4" src="{{ url('storage/'.$id->file_path) }}" alt="">
                        <div class="flex flex-col justify-between md:p-2 leading-normal">
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-heading">{{ $id->product_name }}</h5>
                             <p class="line-clamp-4 transition-all duration-300">{{ $id->product_description }}</p>
                        </div>
                    </div>
                </div>
                

                <div class="relative overflow-x-auto rounded-base mx-2">
                    <table class="w-full text-sm text-left rtl:text-right text-body">
                        <tbody>
                            <tr class="bg-neutral-secondary-soft border-b border-default">
                                <th scope="row" class="px-3 py-2 font-medium text-heading whitespace-nowrap">Price</th>
                                <td class="px-3 py-2 font-bold">R {{ $id->price }}</td>
                            </tr>
                            <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                                <th scope="row" class="px-3 py-2 font-medium text-heading whitespace-nowrap">Brand</th>
                                <td class="px-3 py-2 font-bold">{{ $id->brand }}</td>
                            </tr>
                            <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                                <th scope="row" class="px-3 py-2 font-medium text-heading whitespace-nowrap">Product</th>
                                <td class="px-3 py-2 font-bold">{{ $id->name }}</td>
                            </tr>
                            <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                                <th scope="row" class="px-3 py-2 font-medium text-heading whitespace-nowrap">Category</th>
                                <td class="px-3 py-2 font-bold">{{ $id->firstcategory }}</td>
                            </tr>
                            <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                                <th scope="row" class="px-3 py-2 font-medium text-heading whitespace-nowrap">Section</th>
                                <td class="px-3 py-2 font-bold">{{ $id->secondcategory }}</td>
                            </tr>
                            <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                                <th scope="row" class="px-3 py-2 font-medium text-heading whitespace-nowrap">Sub-Section</th>
                                <td class="px-3 py-2 font-bold">{{ $id->thirdcategory }}</td>
                            </tr>
                            
                            
                        </tbody>
                    </table>
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
