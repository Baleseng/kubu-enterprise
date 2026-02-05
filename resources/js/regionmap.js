// Province data
const provinceData = {
    'eastern-cape': {
        name: 'Eastern Cape',
        description: '',
        za_map_region: '',
        za_map_product: '',
        za_map_customer: '', 
        za_map_status: ''
    },
    'free-state': {
        name: 'Free State',
        description: '',
        za_map_region: '',
        za_map_product: '',
        za_map_customer: '', 
        za_map_status: ''
    },
    'gauteng': {
        name: 'Gauteng',
        description: '',
        za_map_region: 'Soweto',
        za_map_product: 'Coca-cola',
        za_map_customer: 'Stephen Mokgosi', 
        za_map_status: 'Sold' 
    },
    'kzn': {
        name: 'KwaZulu-Natal',
        description: '',
        za_map_region: '',
        za_map_product: '',
        za_map_customer: '', 
        za_map_status: ''
    },
    'limpopo': {
        name: 'Limpopo',
        description: '',
        za_map_region: '',
        za_map_product: '',
        za_map_customer: '', 
        za_map_status: ''
    },
    'mpumalanga': {
        name: 'Mpumalanga',
        description: '',
        za_map_region: '',
        za_map_product: '',
        za_map_customer: '', 
        za_map_status: '' 
    },
    'northern-cape': {
        name: 'Northern Cape',
        description: '',
        za_map_region: '',
        za_map_product: '',
        za_map_customer: '', 
        za_map_status: ''
    },
    'north-west': {
        name: 'North West',
        description: '',
        za_map_region: '',
        za_map_product: '',
        za_map_customer: '', 
        za_map_status: ''
    },
    'western-cape': {
        name: 'Western Cape',
        description: '',
        za_map_region: '',
        za_map_product: '',
        za_map_customer: '', 
        za_map_status: ''
    }
};

// Get DOM elements
const provinces = document.querySelectorAll('.region-map-province');
const provinceItems = document.querySelectorAll('.region-map-province-item');
const placeholder = document.querySelector('.region-map-placeholder');
const provinceDetails = document.querySelector('.region-map-province-details');
const provinceName = document.querySelector('.region-map-province-name');

const za_map_region = document.querySelector('#za_map_region');
const za_map_product = document.querySelector('#za_map_product');
const za_map_customer = document.querySelector('#za_map_customer');
const za_map_status = document.querySelector('#za_map_status');



const description = document.querySelector('.region-map-province-description p');

// Function to show province information
function showProvinceInfo(provinceId) {
    const data = provinceData[provinceId];
    
    if (data) {
        // Update the information panel
        provinceName.textContent = data.name;

        za_map_region.textContent = data.za_map_region;
        za_map_product.textContent = data.za_map_product;
        za_map_customer.textContent = data.za_map_customer;
        za_map_status.textContent = data.za_map_status;


        description.textContent = data.description;
        
        // Show details and hide placeholder
        placeholder.style.display = 'none';
        provinceDetails.style.display = 'block';
        
        // Update active states
        provinces.forEach(province => {
            province.classList.remove('active');
        });
        document.getElementById(provinceId).classList.add('active');
        
        provinceItems.forEach(item => {
            item.classList.remove('active');
            if (item.getAttribute('data-province') === provinceId) {
                item.classList.add('active');
            }
        });
    }
}

// Add event listeners to provinces on the map
provinces.forEach(province => {
    province.addEventListener('click', function() {
        showProvinceInfo(this.id);
    });
});

// Add event listeners to province list items
provinceItems.forEach(item => {
    item.addEventListener('click', function() {
        const provinceId = this.getAttribute('data-province');
        showProvinceInfo(provinceId);
    });
});

// Initialize with first province
showProvinceInfo('gauteng');