
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
                    <div class="flex flex-wrap gap-2 items-center justify-center">
                        
                        <div class="w-32">
                            <form method="POST" action="{{ route('admin.'. $id->folder . '.publish', $id->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            
                            <input type="hidden" value="{{ Auth::user()->id }}" name="admin_id"/>
                            <input type="hidden" value="{{ $id->file_path }}" name="file_path" accept="image/*"/>
                            <input type="hidden" value="{{ $id->category }}" name="category">
                            <input type="hidden" value="{{ $id->section }}" name="section">
                            <input type="hidden" value="{{ $id->brand }}" name="brand">
                            <input type="hidden" value="{{ $id->name }}" name="name">
                            <input type="hidden" value="{{ $id->price }}" name="price">
                            <input type="hidden" value="{{ $id->description }}" name="description">
                            <input type="hidden" value="{{ $id->status }}" name="status">
                            <input type="hidden" value="{{ $id->stock }}" name="stock">
                            <input type="hidden" value="{{ $id->quantity }}" name="quantity">
                            <input type="hidden" value="{{ $id->file_keywords }}" name="file_keywords">
                            <input type="hidden" value="{{ $id->file_description }}" name="file_description">
                            
                            <input type="hidden" value="publish" name="file_status">
                            
                            <button type="submit" class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-hidden">Publish</button>
                            </form>
                        </div>

                        <div class="w-32">
                            <a href="{{ url($url.'/'. $id->folder . '/edit/'.$id->id . '-' . str_replace(' ', '-', $id->name)) }}" class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-hidden">Edit</a>                            
                        </div>

                        <div class="w-32">
                            <form method="POST" action="{{ route('admin.'. $id->folder . '.archive', $id->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            
                            <input type="hidden" value="{{ Auth::user()->id }}" name="admin_id"/>
                            <input type="hidden" value="{{ $id->file_path }}" name="file_path" accept="image/*"/>
                            <input type="hidden" value="{{ $id->category }}" name="category">
                            <input type="hidden" value="{{ $id->section }}" name="section">
                            <input type="hidden" value="{{ $id->brand }}" name="brand">
                            <input type="hidden" value="{{ $id->name }}" name="name">
                            <input type="hidden" value="{{ $id->price }}" name="price">
                            <input type="hidden" value="{{ $id->description }}" name="description">
                            <input type="hidden" value="{{ $id->status }}" name="status">
                            <input type="hidden" value="{{ $id->stock }}" name="stock">
                            <input type="hidden" value="{{ $id->quantity }}" name="quantity">
                            <input type="hidden" value="{{ $id->file_keywords }}" name="file_keywords">
                            <input type="hidden" value="{{ $id->file_description }}" name="file_description">
                            <input type="hidden" value="archived" name="file_status">

                            <button type="submit" class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-hidden">Archive</button>
                            </form>
                        </div>

                        <div class="w-32">
                            <a href="#" class="flex w-full items-center justify-center rounded-md border border-transparent bg-red-600 px-8 py-3 text-base font-medium text-white hover:bg-red-700 focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:outline-hidden" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('archive-form-{{ $id->id }}').submit(); }">
                                Delete
                                <form id="archive-form-{{ $id->id }}" action="{{ route('admin.'. $id->folder . '.destroy', $id->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('PATCH')
                                </form>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="bg-white border border-default rounded-base shadow-xs mt-2 p-3 text-lg">
                    <!-- Content Container -->
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900 mb-5">Product information</h2>
                    <p id="content" class="line-clamp-5 transition-all duration-300">
                        {{ $id->description }}
                    </p> 

                    <!-- Toggle Button -->
                    <button id="toggleButton" class="mt-2 text-blue-600 hover:text-blue-800 font-semibold cursor-pointer">Show more</button>
                    </div>
                </div>

                <div class="bg-white border border-default rounded-base shadow-xs mt-2 p-3 text-lg">
                    <div class="relative overflow-x-auto rounded-base mx-2">
                        <table class="w-full text-sm text-left rtl:text-right text-body">
                            <tbody>
                                <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                                    <th scope="row" class="px-3 py-2 font-medium text-heading whitespace-nowrap">Brand</th>
                                    <td class="px-3 py-2 font-bold">{{ $id->brand }}</td>
                                </tr>                                
                                <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                                    <th scope="row" class="px-3 py-2 font-medium text-heading whitespace-nowrap">Status</th>
                                    <td class="px-3 py-2 font-bold">{{ $id->status }}</td>
                                </tr>
                                <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                                    <th scope="row" class="px-3 py-2 font-medium text-heading whitespace-nowrap">Category</th>
                                    <td class="px-3 py-2 font-bold">{{ $id->category }}</td>
                                </tr>
                                <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                                    <th scope="row" class="px-3 py-2 font-medium text-heading whitespace-nowrap">Section</th>
                                    <td class="px-3 py-2 font-bold">{{ $id->section }}</td>
                                </tr>
                                <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                                    <th scope="row" class="px-3 py-2 font-medium text-heading whitespace-nowrap">Sub-Section</th>
                                    <td class="px-3 py-2 font-bold">{{ $id->subsection }}</td>
                                </tr>
                                
                                <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                                    <th scope="row" class="px-3 py-2 font-medium text-heading whitespace-nowrap">Stock</th>
                                    <td class="px-3 py-2 font-bold">{{ $id->stock }}</td>
                                </tr>

                                <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                                    <th scope="row" class="px-3 py-2 font-medium text-heading whitespace-nowrap">Last Updated</th>
                                    <td class="px-3 py-2 font-bold">{{ $id->updated_at }}</td>
                                </tr>
                                <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                                    <th scope="row" class="px-3 py-2 font-medium text-heading whitespace-nowrap">Date Created</th>
                                    <td class="px-3 py-2 font-bold">{{ $id->created_at }}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</x-admin-layout>
