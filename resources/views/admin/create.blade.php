<x-admin-layout>

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700 mt-28">  
        
        <form method="POST" action="{{ route('admin.create') }}" enctype="multipart/form-data">
        @csrf      
            
            <input type="hidden" value="{{ Auth::user()->id }}" name="admin_id"/>
             
            <input type="hidden" value="test" name="file_keywords"/>
            <input type="hidden" value="test" name="file_description"/>

            <div class="flex">

                <div class="items-center justify-center p-5 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">

                    <div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success"><strong>{{ $message }}</strong></div>
                        @endif
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                            </ul>
                        </div>
                        @endif
                    </div>

                     <div class="mb-6 w-100">
                        <div class="mb-6 w-100">
                            <label id="dropzone-area" for="file-input" class="flex flex-col items-center justify-center w-full h-64 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 border-gray-300">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="www.w3.org">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 4 0 01-.88-7.903A5 5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500">
                                        <span class="font-semibold">Click to upload</span> or drag and drop
                                    </p>
                                    <p class="text-xs text-gray-500">SVG, PNG, JPG, or GIF (MAX. 800x400px)</p>
                                </div>
                                <input id="file-input" type="file" class="hidden" name="file_path" accept="image/*" />  
                            </label>
                            <div id="preview-area" class="mt-4 hidden">
                                <img id="preview-image" src="#" alt="File preview" class="w-full h-auto rounded-lg shadow-md" />
                                <button id="remove-button" class="mt-2 w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Remove Preview
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="items-center justify-center p-5 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
                    
                    <div class="mb-6 w-100">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Title</label>
                        <input type="text" id="default-input" name="product_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="mb-6 w-100">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Price</label>
                        <input type="number" id="default-input" name="product_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                
                    <div class="mb-6 w-100">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                        <textarea id="message" rows="4" name="product_description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                    </div>

                    <div class="mb-6 w-100">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Statue</label>
                        <select id="countries" name="product_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a Status</option>
                            <option value="Pending">Pending</option>
                            <option value="Ordered">Ordered</option>
                            <option value="Prepared">Prepared</option>
                            <option value="Delivered">Delivered</option>
                        </select>
                    </div>

                    <div class="mb-6 w-100">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Availability</label>
                        <select id="countries" name="product_instock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select Option</option>
                            <option value="in">Available Stock</option>
                            <option value="out">Out of Stock</option>
                        </select>
                    </div>

                    <div class="mb-6 w-100">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Catergory</label>
                        <select id="countries" name="product_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a Catergory</option>
                            <option value="FMCG">FMCG</option>
                            <option value="Office & Stationary">Office & Stationary</option>
                            <option value="Home Improvement & DIY">Home Improvement & DIY</option>
                            <option value="Computers, Printers & Accessories">Computers, Printers & Accessories</option>
                            <option value="Cellphone, Tablets & Wearables">Cellphone, Tablets & Wearables</option>
                            <option value="TV & Audio">TV & Audio</option>
                            <option value="Furniture">Furniture</option>
                            <option value="Gaming">Gaming</option>
                            <option value="Smart Home, Security & Wifi">Smart Home, Security & Wifi</option>
                            <option value="Photography, Drone & Gadgets">Photography, Drone & Gadgets</option>
                            <option value="Appliances">Appliances</option>
                            <option value="Power Solutions">Power Solutions</option>
                            <option value="Luggage & Travel">Luggage & Travel</option>
                        </select>
                    </div>

                    <div class="mb-6 w-100">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Type</label>
                        <input type="text" id="default-input" name="product_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="mb-6 w-100">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Brand</label>
                        <input type="text" id="default-input" name="product_brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="mb-6 w-100">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">In Stock Quantity</label>
                        <input type="number" id="default-input" name="product_quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="mb-6 w-100">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Product</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

</x-admin-layout>
