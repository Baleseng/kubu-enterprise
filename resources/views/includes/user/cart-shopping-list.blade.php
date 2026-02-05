
<div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
    <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
        <a href="#" class="w-20 shrink-0 md:order-1">
            <img class="h-20 w-20 dark:hidden" src="{{ url('storage/'.$item->product->file_path) }}" alt="imac image" />
        </a>
        <label for="counter-input" class="sr-only">Choose quantity:</label>
        <div class="flex items-center justify-between md:order-3 md:justify-end">
            <div class="flex items-center">
                

                <button type="button" onclick="changeQuantity(this, -1)" class="" data-input-target="#quantity-input-{{ $item->product->id }}"><svg class="w-4 h-4 text-heading" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/></svg></button>
                <input type="number" id="quantity-input-{{ $item->product->id }}" min="0" class="border-none  placeholder:text-heading text-center w-24 py-2.5 placeholder:text-body" placeholder="0">
                <button type="button" onclick="changeQuantity(this, 1)" class="" data-input-target="#quantity-input-{{ $item->product->id }}"><svg class="w-4 h-4 text-heading" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/></svg></button>


            </div>
            <div class="text-end md:order-4 md:w-32">
                <p class="text-base font-bold text-green-600 dark:text-white">R {{ $item->product->price }}</p>
            </div>
        </div>
        <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
            <a href="#" class="text-base font-medium text-gray-900 hover:underline dark:text-white">{{ $item->product->name }}</a>
            <div class="flex items-center gap-4">
                <button type="button" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-900 hover:underline dark:text-gray-400 dark:hover:text-white">
                    <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                    </svg>Add to Favorites
                </button>
                <form action="{{ route('cart.remove', $item) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
                    <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>Remove
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
