<tbody>
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 text-center">
        <td scope="row" class="px-6 py-4">
             
        </td>
        <td scope="row" class="px-6 py-4">
            <a href="" class=" font-medium text-gray-900 w-56 dark:text-white">{{ $content->name }}</a> 
        </td>
        
        <td class="px-5 py-4">
            <ul class="flex flex-wrap items-center justify-center text-heading">
                <li>
                    <a href="{{ url($url.'/'. $content->urlfolder . '/show/'.$content->id . '-' . str_replace(' ', '-', $content->name)) }}" class="me-4 md:me-6">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ url($url.'/'. $content->urlfolder . '/edit/'.$content->id . '-' . str_replace(' ', '-', $content->name)) }}" class="me-4 md:me-6">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </li>
            </ul>
        </td>
    </tr>
</tbody>

        