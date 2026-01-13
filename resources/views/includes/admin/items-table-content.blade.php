<tbody>
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
        <td class="w-4 p-4">
            <div class="flex items-center">
                <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
            </div>
        </td>
        <td scope="row" class="px-6 py-4">
            <a href="" class=" font-medium text-gray-900 flex w-56 dark:text-white">{{ $content->product_name }}</a> 
        </td>
        <td class="px-6 py-4"><span class="flex font-semibold">R {{ $content->product_price }}</span></td>
        <td class="px-6 py-4">
            <a href="" class="font-semibold text-blue-600 hover:underline flex dark:text-white">{{ $content->product_status }}</a>
        </td>
        <td class="px-6 py-4">
            <span class="flex w-38">{{ $content->product_category }}</span>
        </td>
        <td class="px-6 py-4">{{ $content->product_quantity }}</td>
        <td class="px-6 py-4">
            <ul class="flex flex-wrap items-center justify-center text-heading">
                <li>
                    <a href="{{ url($url.'/show/'.$content->id . '-' . str_replace(' ', '-', $content->product_name)) }}" class="me-4 md:me-6">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ url($url.'/edit/'.$content->id . '-' . str_replace(' ', '-', $content->product_name)) }}" class="me-4 md:me-6">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ url($url.'/report/'.$content->id . '-' . str_replace(' ', '-', $content->product_name)) }}" class="me-4 md:me-6 ">
                        <i class="fa-solid fa-chart-simple"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="me-4 md:me-6 " onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('archive-form-{{ $content->id }}').submit(); }"><i class="fa-solid fa-box-archive"></i>
                    <form id="archive-form-{{ $content->id }}" action="{{ route('admin.destroy', $content->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PATCH')
                    </form>
                    </a>
                </li>
            </ul>
        </td>
    </tr>
</tbody>

        