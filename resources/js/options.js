const data = {
  "Promo Special": {
    sections: {
      'weekend': ["", ""],
      'weekday': ["", ""]
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
