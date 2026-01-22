<x-admin-layout>

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700 mt-28">  
        
        <form method="POST" action="{{ route('admin.products.update', $id->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <input type="hidden" value="{{ Auth::user()->id }}" name="admin_id"/>
            
            <div class="flex">

                <div class="items-center justify-center p-5 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">   
                    <div class="mb-6 w-100">
                        <label id="dropzone-area" for="file-input" class="flex flex-col items-center justify-center w-full h-72 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 border-gray-300">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="www.w3.org">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 4 0 01-.88-7.903A5 5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="mb-2 text-base text-gray-500">
                                    <span class="font-semibold">Click to upload</span> or drag and drop
                                </p>
                                <p class="text-xs text-gray-500">SVG, PNG, JPG, or GIF (MAX. 800x400px)</p>
                            </div>
                            <input id="file-input" type="file" class="hidden" value="{{ $id->file_path }}" name="file_path" accept="image/*"/>
                        </label>
                        <div id="preview-area" class="hidden">
                            <div class="flex items-center justify-center">
                                <img id="preview-image" src="{{ url('storage/'.$id->file_path) }}" alt="File preview" class="h-64 rounded-lg shadow-md"/>
                            </div>
                            <a href="#" id="remove-button" class="block mt-2 w-full bg-red-500 hover:bg-red-700 text-white text-center font-bold py-2 px-4 rounded">
                                Remove Preview
                            </a>
                        </div>
                    </div>
                    <div class="mb-6 w-100">
                        <label for="category" class="block mb-2 text-base font-bold text-gray-500 dark:text-white">Product Catergory</label>
                        <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="{{ $id->category }}">{{ $id->category }}</option>
                            <option value="Groceries">Groceries</option>
                            <option value="Beauty & Health">Beauty & Health</option>
                            <option value="Baby & Toddlers">Baby & Toddlers</option>
                            <option value="Stationary">Stationary</option>
                            <option value="Liquor">Liquor</option>
                            <option value="DIY">DIY</option>
                            <option value="Electronics">Electronics</option>
                        </select>
                    </div>
                    <div class="mb-6 w-100">
                        <label for="section" class="block mb-2 text-base font-bold text-gray-500 dark:text-white">Product Section</label>
                        <select id="section" disabled name="section" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          <option value="{{ $id->section }}">{{ $id->section }}</option>
                        </select>
                    </div>
                    <div class="mb-6 w-100">
                        <label for="subsection" class="block mb-2 text-base font-bold text-gray-500 dark:text-white">Product Subsection</label>
                        <select id="subsection" disabled name="subsection" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          <option value="{{ $id->subsection }}">{{ $id->subsection }}</option>
                        </select>
                    </div>
                    <div class="mb-6 w-100">
                        <label for="default-input" class="block mb-2 text-base font-bold text-gray-500 dark:text-white">Product Brand</label>
                        <input type="text" id="default-input" value="{{ $id->brand }}" name="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>

                <div class="items-center justify-center p-5 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
                    <div class="mb-6 w-100">
                        <label for="default-input" class="block mb-2 text-base font-bold text-gray-500 dark:text-white">Product Title</label>
                        <input type="text" id="default-input" value="{{ $id->name }}" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="mb-6 w-100">
                        <label for="default-input" class="block mb-2 text-base font-bold text-gray-500 dark:text-white">Product Price</label>
                        <input type="text" id="default-input" value="{{ $id->price }}" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="mb-6 w-100">
                        <label for="message" class="block mb-2 text-base font-bold text-gray-500 dark:text-white">Product Description</label>
                        <textarea id="message" rows="21" name="description" class="resize-none block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">{{ $id->description }}</textarea>
                    </div>
                
                </div>
                <div class="items-center justify-center p-5 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
                    <div class="mb-6 w-100">
                        <label for="countries" class="block mb-2 text-base font-bold text-gray-500 dark:text-white">Product Statue</label>
                        <select id="countries" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="{{ $id->product_status }}">{{ $id->status }}</option>
                            <option value="Unassign">Unassign</option>
                            <option value="Publish">Publish</option>
                            <option value="Pending">Pending</option>
                            <option value="Ordered">Ordered</option>
                            <option value="Prepared">Prepared</option>
                            <option value="Delivered">Delivered</option>
                        </select>
                    </div>
                    <div class="mb-6 w-100">
                        <label for="countries" class="block mb-2 text-base font-bold text-gray-500 dark:text-white">Product Availability</label>
                        <select id="countries" name="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="{{ $id->stock }}">{{ $id->stock }}</option>
                            <option value="In Stock">Available Stock</option>
                            <option value="To be Order">To be Ordered</option>
                            <option value="Out of Stock">Out of Stock</option>
                        </select>
                    </div>
                    <div class="mb-6 w-100">
                        <label for="default-input" class="block mb-2 text-base font-bold text-gray-500 dark:text-white">Product Quantity</label>
                        <input type="number" id="default-input" value="{{ $id->quantity }}" name="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="bg-gray-100 py-2 mb-3 border border-gray-300 rounded-lg">
                        <div class="mb-6 w-100  px-2">
                            <label for="default-input" class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">File Key Words</label>
                            <input type="text" id="default-input" value="{{ $id->file_keywords }}" name="file_keywords" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-6 w-100  px-2">
                            <label for="default-input" class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">File Description</label>
                            <input type="text" id="default-input" value="{{ $id->file_description }}" name="file_description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="mb-6 w-100 px-2">
                            <label for="filestatus" class="block mb-2 text-base font-bold text-gray-500 dark:text-white">File Status</label>
                            <select id="filestatus"  name="file_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="{{ $id->file_status }}">{{ $id->file_status }}</option>
                                <option value="Review">Review</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-6 w-full">
                        <button type="submit" class="w-full text-white text-4xl uppercase font-bold  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Publish</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

</x-admin-layout>