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