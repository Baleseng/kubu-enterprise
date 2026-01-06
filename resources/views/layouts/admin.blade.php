<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>

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
            
            @include('includes.admin.navigation')
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="w-full mx-auto py-6 px-4 sm:px-3 lg:px-4">
                        {{ $header }}
                    </div>
                </header>
            @endisset

             @include('includes.admin.sidebar')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
              const fileInput = document.getElementById('file-input');
              const previewArea = document.getElementById('preview-area');
              const previewImage = document.getElementById('preview-image');
              const removeButton = document.getElementById('remove-button');
              const dropzoneArea = document.getElementById('dropzone-area');

              // Handle file selection via click or drag-and-drop
              const handleFiles = (files) => {
                if (files && files.length > 0 && files[0].type.startsWith('image/')) {
                  const file = files[0];
                  // Create a temporary URL for the file
                  const imageUrl = URL.createObjectURL(file);
                  previewImage.src = imageUrl;
                  previewArea.classList.remove('hidden');
                  dropzoneArea.classList.add('hidden');
                } else {
                    alert('Please select an image file.');
                }
              };

              fileInput.addEventListener('change', (event) => {
                handleFiles(event.target.files);
              });

              // Handle drag-and-drop events (optional)
              dropzoneArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropzoneArea.classList.add('border-blue-500', 'bg-blue-50');
              });

              dropzoneArea.addEventListener('dragleave', () => {
                dropzoneArea.classList.remove('border-blue-500', 'bg-blue-50');
              });

              dropzoneArea.addEventListener('drop', (e) => {
                e.preventDefault();
                dropzoneArea.classList.remove('border-blue-500', 'bg-blue-50');
                const files = e.dataTransfer.files;
                handleFiles(files);
              });


              // Handle file removal
              removeButton.addEventListener('click', () => {
                previewImage.src = '#'; // Clear the image source
                previewArea.classList.add('hidden');
                dropzoneArea.classList.remove('hidden');
                fileInput.value = null; // Clear the input value
                URL.revokeObjectURL(previewImage.src); // Clean up the object URL
              });
            });
        </script>

    </body>
</html>
