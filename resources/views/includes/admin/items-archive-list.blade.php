<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
@include('includes.admin.items-table-header')
@foreach ($arc as $content)
    @include('includes.admin.items-table-content')
@endforeach
</table>
@include('includes.admin.items-table-nav')

        