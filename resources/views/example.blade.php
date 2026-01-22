<x-app-layout>
    
    <x-slot name="header"></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                
                <table id="users-table">...</table>
                <table id="products-table">...</table>

              </div>
            </div>
        </div>
    </div>

    
<script>

$(document).ready(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true, // Or false for simple data
            ajax: "{{ route('users.data') }}", // Route for AJAX
            columns: [ { data: 'id' }, { data: 'name' } ]
        });

        $('#products-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('products.data') }}", // Another AJAX route
            columns: [ { data: 'id' }, { data: 'name' }, { data: 'price' } ]
        });
    });

</script>
    
</x-app-layout>
