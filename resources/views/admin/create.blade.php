<x-admin-layout>

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700 mt-28">  
        
        <form method="POST" action="{{ route('admin.create') }}" enctype="multipart/form-data">
        @csrf      
            
            <input type="hidden" value="{{ Auth::user()->id }}" name="admin_id"/>
             
            <input type="hidden" value="test" name="file_keywords"/>
            <input type="hidden" value="test" name="file_description"/>
            <input type="hidden" value="review" name="file_status"/>

            <div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success"><strong>{{ $message }}</strong></div>
                @endif
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
                @endif
            </div>

            <div class="flex">

                <div class="items-center justify-center p-5 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
                    <div class="mb-6 w-100">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Title</label>
                        <input type="text" id="default-input" name="product_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                     <div class="mb-6 w-100">
                        <div class="mb-6 w-100">
                            <label id="dropzone-area" for="file-input" class="flex flex-col items-center justify-center w-full h-64 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 border-gray-300">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="www.w3.org">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 4 0 01-.88-7.903A5 5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500">
                                        <span class="font-semibold">Click to upload</span> or drag and drop
                                    </p>
                                    <p class="text-xs text-gray-500">SVG, PNG, JPG, or GIF (MAX. 800x400px)</p>
                                </div>
                                <input id="file-input" type="file" class="hidden" name="file_path" accept="image/*" />  
                            </label>
                            <div id="preview-area" class="mt-4 hidden">
                                <img id="preview-image" src="#" alt="File preview" class="w-full h-auto rounded-lg shadow-md" />
                                <button id="remove-button" class="mt-2 w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Remove Preview
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6 w-100">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Price</label>
                        <input type="text" id="default-input" name="product_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-6 w-100">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Statue</label>
                        <select id="countries" name="product_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a Status</option>
                            <option value="Unassign">Unassign</option>
                            <option value="Publish">Publish</option>
                            <option value="Pending">Pending</option>
                            <option value="Ordered">Ordered</option>
                            <option value="Prepared">Prepared</option>
                            <option value="Delivered">Delivered</option>
                        </select>
                    </div>
                
                    
                </div>

                <div class="items-center justify-center p-5 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
                    <div class="mb-6 w-100">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                        <textarea id="message" rows="25" name="product_description" class="resize-none block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                    </div>
                </div>
                <div class="items-center justify-center p-5 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
                    <div class="mb-6 w-100">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Catergory</label>
                        <select id="category" name="product_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          <option value="">Select Category</option>
                          <option value="Promo Special">Promo Special</option>
                          <option value="Groceries">Groceries</option>
                          <option value="Beauty & Health">Beauty & Health</option>
                          <option value="Baby & Toddlers">Baby & Toddlers</option>
                          <option value="Liquor">Liquor</option>
                          <option value="DIY">DIY</option>
                          <option value="Electronics">Electronics</option>
                        </select>
                    </div>

                    <div class="mb-6 w-100">
                        <label for="section" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Section</label>
                        <select id="section" disabled name="product_section" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          <option value="">Select Section</option>
                        </select>
                    </div>

                    <div class="mb-6 w-100">
                        <label for="subsection" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Subsection</label>
                        <select id="subsection" disabled name="product_subsection" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          <option value="">Select Subsection</option>
                        </select>
                    </div>

                    <div class="mb-6 w-100">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Brand</label>
                        <input type="text" id="default-input" name="product_brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-6 w-100">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Availability</label>
                        <select id="countries" name="product_stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select Option</option>
                            <option value="in">Available Stock</option>
                            <option value="order">To be Ordered</option>
                            <option value="out">Out of Stock</option>
                        </select>
                    </div>
                    <div class="mb-6 w-100">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">In Stock Quantity</label>
                        <input type="number" id="default-input" name="product_quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-6 w-full">
                        <button type="submit" class="w-full text-white text-4xl uppercase font-bold  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-6 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Product</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<script type="text/javascript">
    const data = {
  "Promo Special": {
    sections: {
      'Back To School': ["Ärt & Crafts","Book Covers & Labels","Books & Notebooks","Calculator","Colouring & Painting","Corrector", "Cutting & Sticking","Filing & FOlders","Hobbies & Crafts","Paper & Cardboards","Pencil Bags & Cases","Pens, Pencil & Markers","Rulers & Measuring","Stationary Sets"],
      'Valentines Special': ["", ""],
      'Easter Special': ["", ""],
      'Black Friday': ["", ""],
      'Cyber Monday': ["", ""],
      'Heritage Month Special': ["", ""],
    }
  },
  'Groceries': {
    sections: {
      'Breakfast': ["Cereal","Milk"],
      'Cooking': ["Cans, Jars & Packaged Food","Grains, Rice & Pasta","Oil & Vinegar","Soya, Meal & Additives","Suger & Sweeteners","Salt, Herbs & Spices","Soup, Gravy & Stock"],
      'Sauces, Spreads & Condiments': ["Spreads", "Sauces & Mayonnaise","Salad Dressing","Pickles & Relishes"],
      'Snack & Sweets': ["Biscuits & Rusk","Chips & Popcorn","Sweets & Gum","Nuts & Dried Fruit","Energy & Health Bars","Chocolates"],
      'Desserts': ["Dessert Mixes","Custard", "Jelly"],
      'Beverages': ["Coffee","Tea","Hot Chocolate","Creamers"],
      'Soft Drinks & Juies': ["Cold Drinks","Sports & Energy","Fruit Juices","Water","Cordials & Squashes","Iced Tea"],
      'Baking': ["Powder & Yeast","Essence & Colouring","Toppings","Flouring & Baking Mixes"],
      'Kitchen Supplies': ["Refuse & Carrier Bags","Dustbins","Kitchen Cleaning","Foils & Paper Towels","Dishwashing Liquids","Detergents"],
      'Bathroom Supplies': ["Air Fresheners","Toilet Cleaners","Bleach","Toilet paper"]
    }
  },
  'Beauty & Health': {
    sections: {
      'Bath & Shower': ["Bathfoams & Salts","Soap & Body Wash","Shower & Hand Wash"],
      'Body Care': ["Eye Care","Foot Care","Hygiene Wipes","Tissues","Toilet Paper"],
      'Cosmetics': ["Beauty Accessories", "Nail Care"],
      'Shoe Care': ["Shoe Polish"],
      'Feminine Care': ["Intimate Washes","Panty Liners","Sanitary Pads","Tampoons"],
      'Fragrances': ["Perfumes","Cologn","Gift Set"],
      'Hair Care': ["Hair Colour","Hair Treatment","Hair Dryers","Hair Extensions","Hair Styling","Hot Brushes & Tongs","Shampoo"],
      'Oral Care': ["Dental Care","Toothbrushes","Toothpaste"],
      'Shaving & Grooming': ["Barber Kits","Depilatory","Blades & Shavers","Shaving Foams & Gels"],
      'Skin Care': ["Face Wash","Lipcare","Moisturisers","Sunscreen"],
      'Healthcare': ["Stomach Remedies","Antiseptic Care","Earbuds & Cotton","Energy & Vitamins","First Aid Supplies","Pain & Relief","Patent Medicine","Sexual Health"]
    }
  },
  'Baby & Toddlers': {
    sections: {
      'Baby': ["Nappies & Wipes","Baby Toiletries","Towels & Blankets","Safety & Monitors","Baby Bathing","Nursing & Feeding","Baby Toys","Baby Health","Baby Proofing & Safety"],
      'Baby & Toddler Food': ["Baby Cereals","Baby Formula"],
      'Bags': ["Backpacks","School Bags","Laptop Bags"],
      'Toys': ["Party Themes","Puzzle","Educational Toys","Soft Toys","Outdoor Toys","Toddlers Toys","Toy Furnature","Books"],
    }
  },
  'Liquor': {
    sections: {
      'Spirit': ["Whiskey","Liqueurs","Rum","Gin","Tequila","Cognac","Brandy"],
      'Wine': ["White Wine","Red Wine","Sparkling Wine","Rose Wine","Fortified Wine"],
      'Beer & Cider': ["Beer","Cider","Craft Beer","Non-Alcoholic Beer"],
      'Bar Accessories': ["Bar Serving Accessories","Glasses","Cordials & Squashes","Chips & Popcorn","Sweets & Gum","Dry Fruit, Nut & Seed","Biltong","Water"],
    }
  },
  'DIY': {
    sections: {
      'Workshop': ["Drills","Grinders","Woodworking","Multitools & Kits","Heat Guns","Cordless Powertool","Welding Macines","Compressors","Generators"],
      'Workshop Accessories': ["Loose Drill Bits","Drill Bit Sets","Nails","Hinges","Glue & Accessories","Handsaws","Hammers","Tool Storage","Measuring Tools","Socket Set"],
      'Electrical': ["Multiplugs & Adaptors","Testers & Timers","PVC Conduit","Reels and Extension Cords","Switches & Sockets","Inverters & Solar Panel"],
      'Fitting & Shelving': ["Home Fittings"],
      'Auto': ["Auto Maintenance","Batteries & Chargers","Trailer & Accessories","Lubricant & Additive","Cleaning & Suncare","Vehicle Storage & Organizers"],
      'Paint & Surface': ["Wall Paint","Furniture Paint","Primers","Floor and Paving","Paint Sprayers","Spary Paint","Wood Finishing","Paint Accessories"],
      'Security': ["Security Cameras","Safes","Lock & Padlocks","Cash Boxes"],
      'Laggage & Travel': ["Beer","Cider","Craft Beer","Non-Alcoholic Beer"],
    }
  },
  'Electronics': {
    sections: {
      'Cellphones': ["Cellular Accessories","Cellphone Handsets","Charging Devices"],
      'Fitness & Watches': ["Wearables","Health Technology"],
      'Audio & Video': ["Audio Speakers","Car Audio","Dash Cameras","DJ & AP Audio","Headphones","Home Audio","Home Theaters System","Sound Bars","Streaming Devices"],
      'Cameras': ["Batteries","Camera Bags","Camera Lenses","Digital Cameras","Action Cameras","Drones"],
      'Printers': ["Papers","Cartridges","Prints","Printing Accessories"],
    }
  },
};

const categorySelect = document.getElementById('category');
const sectionSelect = document.getElementById('section');
const subsectionSelect = document.getElementById('subsection');

// Level 1 to Level 2
categorySelect.addEventListener('change', function() {
  const selectedCategory = this.value;
  
  // Reset children
  sectionSelect.innerHTML = '<option value="">Select Section</option>';
  subsectionSelect.innerHTML = '<option value="">Select subsection</option>';
  subsectionSelect.disabled = true;

  if (selectedCategory) {
    sectionSelect.disabled = false;
    const sections = Object.keys(data[selectedCategory].sections);
    
    sections.forEach(section => {
      let opt = new Option(section.charAt(0).toUpperCase() + section.slice(1), section);
      sectionSelect.add(opt);
    });
  } else {
    sectionSelect.disabled = true;
  }
});

// Level 2 to Level 3
sectionSelect.addEventListener('change', function() {
  const selectedCategory = categorySelect.value;
  const selectedSection = this.value;

  // Reset Level 3
  subsectionSelect.innerHTML = '<option value="">Select subsection</option>';

  if (selectedSection) {
    subsectionSelect.disabled = false;
    const cities = data[selectedCategory].sections[selectedSection];
    
    cities.forEach(subsection => {
      let opt = new Option(subsection, subsection);
      subsectionSelect.add(opt);
    });
  } else {
    subsectionSelect.disabled = true;
  }
});

</script>

</x-admin-layout>
