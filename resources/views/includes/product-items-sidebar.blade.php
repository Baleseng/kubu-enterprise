
    
    <!-- Options -->
    <div class="mt-5 lg:row-span-3 lg:mt-5">
        <div class="bg-white border border-default rounded-base shadow-xs p-3">
            <h1 class="text-2xl font-medium tracking-tight text-gray-900 sm:text-3xl mb-3">{{ $id->name }}</h1>
            
            <p class="text-4xl font-black tracking-tight text-red-600">R {{ $id->price }}</p>
            <!-- Reviews -->
            <div class="mt-3">
                <h3 class="sr-only">Reviews</h3>
                <div class="flex items-center">
                    <div class="flex items-center">
                    <!-- Active: "text-gray-900", Default: "text-gray-200" -->
                        <i class="fa-solid fa-star text-yellow-400"></i>
                        <i class="fa-solid fa-star text-yellow-400"></i>
                        <i class="fa-solid fa-star text-yellow-400"></i>
                        <i class="fa-solid fa-star text-yellow-400"></i>
                        <i class="fa-solid fa-star text-gray-400"></i>
                    </div>
                    <p class="sr-only">4 out of 5 stars</p>
                    <a href="#" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">117 reviews</a>
                </div>
            </div>
            <p class=" my-2">Availble  stock: <span class="text-green-600 font-bold">{{ $id->quantity }}</span></p>
        
