<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            
            @include('includes.user.navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @include('includes.user.footer')

    <script>// Get references to the elements
    const toggleButton = document.getElementById('toggleButton');
    const content = document.getElementById('content');

    // Add a click event listener to the button
    toggleButton.addEventListener('click', function() {
    // Toggle the 'line-clamp-3' class on the content element
    content.classList.toggle('line-clamp-5');

    // Update the button text based on whether the content is clamped
    if (content.classList.contains('line-clamp-5')) {
        toggleButton.textContent = 'Show more';
    } else {
            toggleButton.textContent = 'Show less';
            }
        });
    </script>

    <script>
        function toggleModal() { 
            document.getElementById('signinModal').classList.toggle('hidden');
        }
    </script>

    </body>
</html>
