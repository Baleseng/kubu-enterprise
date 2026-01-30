<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr class="text-center">
            <th scope="col" class="p-4">
                <div class="flex items-center">
                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                </div>
            </th>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Position</th>
            <th scope="col" class="px-6 py-3">Status</th>
            <th scope="col" class="px-6 py-3">Folder</th>

            <th scope="col" class="px-6 py-3">Last Updated</th>
        </tr>
    </thead>
    @foreach ($section as $content)
    <tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 text-center">
            <td class="w-4 p-4">
                <div class="flex items-center">
                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                </div>
            </td>
            <td scope="row" class="px-6 py-4">
                <a href="" class=" font-medium text-gray-900 w-56 dark:text-white">{{ $content->name }}</a> 
            </td>
            <td scope="row" class="px-6 py-4"><span class="font-medium">{{ $content->position }}</span></td>
            <td scope="row" class="px-6 py-4"><span class="font-medium">{{ $content->status }}</span></td>
            <td class="px-6 py-4"><span class="font-medium">{{ $content->urlfolder }}</span></td>
            <td class="px-5 py-4">
                <ul class="flex flex-wrap items-center justify-center text-heading">
                    <li>
                        <a href="#" class="me-4 md:me-6">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url($url.'/sections/edit/'.$content->id . '-' . str_replace(' ', '-', $content->name)) }}" class="me-4 md:me-6">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="me-4 md:me-6 ">
                            <i class="fa-solid fa-chart-simple"></i>
                        </a>
                    </li>
                </ul>
            </td>
            <td class="px-6 py-4">
                <span class="w-38 capitalize"></span>
            </td>

        </tr>
    </tbody>
@endforeach
</table>
@include('includes.admin.default-pagination')

        