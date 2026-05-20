(function() {
    const provinceData = {
        'gauteng': {
            name: 'Gauteng',
            description: '',
            za_map_region: 'Soweto',
            za_map_product: 'Coca-cola', 
            za_map_status: 'Sold',
        },
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

    function initMap() {
        const provinces = document.querySelectorAll('.region-map-province');
        const provinceItems = document.querySelectorAll('.region-map-province-item');
        const placeholder = document.querySelector('.region-map-placeholder');
        const provinceDetails = document.querySelector('.region-map-province-details');
        
        // If map elements aren't on this page, exit quietly
        if (provinces.length === 0 && provinceItems.length === 0) return;

        function showProvinceInfo(provinceId) {
            const data = provinceData[provinceId];
            if (!data) return;

            // Use optional chaining or check for existence before setting text
            if(document.querySelector('.region-map-province-name')) 
                document.querySelector('.region-map-province-name').textContent = data.name;
            
            // Set dynamic fields
            ['za_map_region', 'za_map_product', 'za_map_status'].forEach(id => {
                const el = document.querySelector(`#${id}`);
                if (el) el.textContent = data[id];
            });

            if (placeholder) placeholder.style.display = 'none';
            if (provinceDetails) provinceDetails.style.display = 'block';
            
            provinces.forEach(p => p.classList.toggle('active', p.id === provinceId));
            provinceItems.forEach(item => {
                item.classList.toggle('active', item.getAttribute('data-province') === provinceId);
            });
        }

        provinces.forEach(p => p.addEventListener('click', () => showProvinceInfo(p.id)));
        provinceItems.forEach(item => {
            item.addEventListener('click', () => showProvinceInfo(item.getAttribute('data-province')));
        });

        showProvinceInfo('gauteng');
    }

    document.addEventListener('DOMContentLoaded', initMap);
})();