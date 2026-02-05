<x-app-layout>
    
    <x-slot name="header"></x-slot>

    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Shopping Cart</h2>

            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                    <div class="space-y-6">

                    @if($cartItems->isEmpty())
                        <div class="alert alert-info">Your cart is empty</div>
                    @else
                        @foreach($cartItems as $item)
                            @include('includes.user.cart-shopping-list')
                        @endforeach
                        
                    </div>
                </div>
                    @if($cartItems->isNotEmpty())
                        @include('includes.user.cart-order-summery')
                    @endif

                    @endif
            </div>

            <div class="hidden xl:mt-8 xl:block">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">People also bought</h3>
                <div class="mt-6 grid grid-cols-4 gap-4 sm:mt-8">
                    @foreach($products as $product)
                        @include('includes.user.cart-bought-list')
                    @endforeach
                </div>
            </div>
            
        </div>
    </section>
    
<script>
    function changeQuantity(buttonElement, delta) {
        // Get the target input ID from the data attribute of the clicked button
        const targetInputSelector = buttonElement.getAttribute('data-input-target');
        const inputElement = document.querySelector(targetInputSelector);

        if (inputElement) {
            let currentValue = parseInt(inputElement.value) || 0;
            let newValue = currentValue + delta;
            
            // Optional: Enforce min/max attributes if present
            const min = inputElement.getAttribute('min');
            const max = inputElement.getAttribute('max');

            if (min !== null && newValue < parseInt(min)) {
                newValue = parseInt(min);
            }

            if (max !== null && newValue > parseInt(max)) {
                newValue = parseInt(max);
            }

            inputElement.value = newValue;
        }
    }

</script>
</x-app-layout>