<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
@include('includes.admin.product-table-header')
@foreach ($product_archive as $content)
    @include('includes.admin.product-table-content')
@endforeach
</table>
@include('includes.admin.default-pagination')

        