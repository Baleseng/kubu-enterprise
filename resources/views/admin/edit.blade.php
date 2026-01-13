<x-admin-layout>

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700 mt-28">  
        
        <form method="POST" action="{{ route('admin.update', $id->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
            
            <input type="hidden" value="{{ Auth::user()->id }}" name="admin_id"/>
            
            <div class="flex">

                <div class="items-center justify-center p-5 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
                    <div class="mb-6 w-100">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Key Words</label>
                        <input type="text" id="default-input" name="file_keywords" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-6 w-100">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <input type="text" id="default-input" name="file_description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-6 w-100">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Title</label>
                        <input type="text" id="default-input" value="{{ $id->product_name }}" name="product_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

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
                            <input id="file-input" type="file" class="hidden" value="{{ $id->file_path }}" name="file_path" accept="image/*" />  
                        </label>
                        <div id="preview-area" class="mt-4 hidden">
                            <img id="preview-image" src="{{ url('storage/'.$id->file_path) }}" alt="File preview" class="w-full h-auto rounded-lg shadow-md" />
                            <button id="remove-button" class="mt-2 w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Remove Preview
                            </button>
                        </div>
                        
                    </div>
                </div>

                <div class="items-center justify-center p-5 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
                    <div class="mb-6 w-100">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Price</label>
                        <input type="text" id="default-input" value="{{ $id->product_price }}" name="product_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-6 w-100">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Statue</label>
                        <select id="countries" name="product_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="{{ $id->product_status }}">{{ $id->product_status }}</option>
                            <option value="Pending">Pending</option>
                            <option value="Ordered">Ordered</option>
                            <option value="Prepared">Prepared</option>
                            <option value="Delivered">Delivered</option>
                        </select>
                    </div>
                    <div class="mb-6 w-100">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                        <textarea id="message" rows="20" value="test" name="product_description" class="resize-none block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">{{ $id->product_description }}</textarea>
                    </div>
                </div>

                <div class="items-center justify-center p-5 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
                    <div class="mb-6 w-100">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Catergory</label>
                        <select id="category" name="product_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          <option value="{{ $id->product_category }}">{{ $id->product_category }}</option>
                          <option value="Promo Special">Promo Special</option>
                          <option value="Groceries">Groceries</option>
                          <option value="Beauty & Health">Beauty & Health</option>
                          <option value="Baby & Toddlers">Baby & Toddlers</option>
                          <option value="Liquor">Liquor</option>
                          <option value="DIY">DIY</option>
                          <option value="Electronics">Electronics</option>
                        </select>
                    </div>

                    <div class="mb-6 w-100">
                        <label for="section" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Section</label>
                        <select id="section" disabled name="product_section" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          <option value="{{ $id->product_section }}">{{ $id->product_section }}</option>
                        </select>
                    </div>

                    <div class="mb-6 w-100">
                        <label for="subsection" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Subsection</label>
                        <select id="subsection" disabled name="product_subsection" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          <option value="{{ $id->product_subsection }}">{{ $id->product_subsection }}</option>
                        </select>
                    </div>

                    <div class="mb-6 w-100">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Brand</label>
                        <input type="text" id="default-input" value="{{ $id->product_brand }}" name="product_brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-6 w-100">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Availability</label>
                        <select id="countries" name="product_stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="{{ $id->product_stock }}">{{ $id->product_stock }}</option>
                            <option value="in">Available Stock</option>
                            <option value="order">To be Ordered</option>
                            <option value="out">Out of Stock</option>
                        </select>
                    </div>
                    <div class="mb-6 w-100">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">In Stock Quantity</label>
                        <input type="number" id="default-input" value="{{ $id->product_quantity }}" name="product_quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-6 w-full">
                        <button type="submit" class="w-full text-white text-4xl uppercase font-bold  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-6 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

</x-admin-layout>