<x-admin-layout>

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700 mt-28">  
        <form method="POST" action="{{ route('admin.sections.add') }}" enctype="multipart/form-data">
            
            @csrf 

            <input type="hidden" value="{{ Auth::user()->id }}" name="admin_id"/>
            <input type="hidden" value="sections" name="folder"/>
    
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

            <div class="flex">
                <div class="items-center justify-center p-5 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
                   <div class="mb-6 w-100">
                        <label for="default-input" class="block mb-2 text-base font-bold text-gray-500 dark:text-white">Section Name</label>
                        <input type="text" id="default-input" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div> 
                </div>
                <div class="items-center justify-center p-5 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
                    <div class="mb-6 w-100">
                        <label for="message" class="block mb-2 text-base font-bold text-gray-500 dark:text-white">Section Description</label>
                        <textarea id="message" rows="21" name="description" class="resize-none block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                    </div>
                </div>
                <div class="items-center justify-center p-5 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
                    <div class="mb-6 w-100">
                        <label for="countries" class="block mb-2 text-base font-bold text-gray-500 dark:text-white">Section Statue</label>
                        <select id="countries" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Publish">Publish</option>
                        <option value="Ordered">Archive</option>
                        </select>
                    </div>

                    <div class="mb-6 w-full">
                        <button type="submit" class="w-full text-white text-4xl uppercase font-bold  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-4 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Section</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

</x-admin-layout>
