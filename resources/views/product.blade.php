<x-app-layout>
    
    <x-slot name="header"></x-slot>

    
        <div class="p-1">
            <div class="mx-auto max-w-2xl pt-10 lg:grid lg:max-w-7xl lg:pt-10">
            <!-- BREADCRUM -->
            @include('includes.product-items-breadcrum')
            </div>          
            <div class="mx-auto max-w-2xl px-4 pb-16 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:grid-rows-[auto_auto_1fr] lg:gap-x-5 lg:px-5 lg:pb-15">
                <!-- INFORMATION -->
                @include('includes.product-items-body')
                <!-- SIDEBAR -->
                
                    @include('includes.product-items-sidebar')

                        <form action="{{ route('cart.add', $id) }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                
                                <input type="hidden" name="" value="{{ $id->product_name }}">
                                <input type="hidden" name="" value="{{ $id->product_price }}">

                                <span>Increase Quantity:</span> 
                                <input type="number" name="quantity" value="1" min="1" class="bg-transparent border-transparent w-24 form-control">

                                <button type="submit" class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add to Cart</button>
                                
                            </div>
                        </form>
                    </div>
                    <div class="bg-white border border-default rounded-base shadow-xs mt-2 p-3 text-lg">
                        <!-- Content Container -->
                        <h2 class="text-2xl font-bold tracking-tight text-gray-900 mb-5">Product information</h2>
                        <p id="content" class="line-clamp-5 transition-all duration-300">
                        {{ $id->product_description }}
                        </p> 

                        <!-- Toggle Button -->
                        <button id="toggleButton" class="mt-2 text-blue-600 hover:text-blue-800 font-semibold cursor-pointer">Show more</button>
                    </div>
                    <div class="bg-white border border-default rounded-base shadow-xs mt-2 p-3 font-bold text-lg">Related Products</div>
                </div>
            </div> 
        
        </div>

</x-app-layout>


