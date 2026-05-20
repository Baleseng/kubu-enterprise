 <style>
  .counter-container {
      display: flex;
      align-items: center;
      gap: 20px;
  }

  button {
      width: 60px;
      height: 60px;
      font-size: 30px;
      cursor: pointer;
      border: none;
      border-radius: 50%;
      background-color: #007bff;
      color: white;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  button:hover {
      background-color: #0056b3;
  }

  #count-display {
      font-size: 45px;
      font-weight: bold;
      color: #333;
      width: 80px;
      text-align: center;
  }
</style>
<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900 dark:text-gray-100">
                
            <div class="counter-container">
              <button id="minus-btn">-</button>
              <p id="count-display">0</p>
              <button id="add-btn">+</button>
            </div>

          </div>
        </div>
      </div>
    </div>

    
<script>
  // Select the screen elements using their IDs
  const countDisplay = document.getElementById('count-display');
  const minusBtn = document.getElementById('minus-btn');
  const addBtn = document.getElementById('add-btn');

  // Initialize the counter variable
  let count = 0;

  // Function to update the display
  function updateDisplay() {
      countDisplay.textContent = count;
  }

  // Add event listener for the add button
  addBtn.addEventListener('click', () => {
      count++; // Increment the count
      updateDisplay(); // Update the display
  });

  // Add event listener for the minus button
  minusBtn.addEventListener('click', () => {
      count--; // Decrement the count
      updateDisplay(); // Update the display
  });

  // Initial display render
  updateDisplay();
</script>
    
</x-app-layout>
