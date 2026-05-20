<x-admin-layout>
<style>
  /* The Core CSS Logic */
        .content-box {
            display: none; /* Hide all boxes by default */
            padding: 0.5rem;
        } 
        
        /* This utility class will be toggled by JavaScript to show the active div */
        .content-box.active {
            display: block; 
            animation: fadeIn 0.3s ease-in-out; /* Optional smooth fade-in */
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(4px); }
            to { opacity: 1; transform: translateY(0); }
        }
</style>
<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700 mtR28">  
        <div class="p-2 bg-gray-300">Product</div>
        <div class="grid grid-cols-2 gap-0 mb-4">

            <div class="bg-gray-50  dark:bg-gray-800">
                
                <div class="flex items-center justify-center">
                    
                    <div class="flex flex-col items-center bg-neutral-primary-soft pt-2 md:flex-row md:max-w-2xl">
                        <img class="object-cover w-full rounded-base h-96 mb-4" src="{{ url('storage/'.$id->file_path) }}" alt="">  
                    </div>
                </div>
            </div>
            <div class="bg-gray-50  dark:bg-gray-800">
                <div class="relative overflow-x-auto rounded-base mx-2">
                    <div class="flex flex-col justify-between md:p-2 leading-normal">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-heading">{{ $id->name }}</h5>
                        <p class="line-clamp-6 transition-all duration-300">{{ $id->description }}</p>
                    </div>
                    <table class="w-full text-sm text-left rtl:text-right text-body">
                        <tbody>
                            <tr class="bg-neutral-secondary-soft border-b border-default">
                                <th scope="row" class="px-3 py-2 font-medium text-heading whitespace-nowrap">Price</th>
                                <td class="px-3 py-2 font-bold">R {{ $id->price }}</td>
                            </tr>
                            <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                                <th scope="row" class="px-3 py-2 font-medium text-heading whitespace-nowrap">Brand</th>
                                <td class="px-3 py-2 font-bold">{{ $id->brand }}</td>
                            </tr>
                            <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                                <th scope="row" class="px-3 py-2 font-medium text-heading whitespace-nowrap">In stock</th>
                                <td class="px-3 py-2 font-bold">{{ $id->quantity }}</td>
                            </tr>
                            <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                                <th scope="row" class="px-3 py-2 font-medium text-heading whitespace-nowrap">Category</th>
                                <td class="px-3 py-2 font-bold">{{ $id->firstcategory }}</td>
                            </tr>
                            <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                                <th scope="row" class="px-3 py-2 font-medium text-heading whitespace-nowrap">Section</th>
                                <td class="px-3 py-2 font-bold">{{ $id->secondcategory }}</td>
                            </tr>
                            <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                                <th scope="row" class="px-3 py-2 font-medium text-heading whitespace-nowrap">Sub-Section</th>
                                <td class="px-3 py-2 font-bold">{{ $id->thirdcategory }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-2 mb-4 text-center"> 
            <div class="p-3 bg-green-500 dark:bg-gray-800">
                <h3 class="text-white dark:text-gray-500">Cart</h3>
                <p class="text-4xl font-bold text-white dark:text-gray-500">0</p>
            </div>
            <div class="p-3 bg-green-500 dark:bg-gray-800">
                <h3 class="text-white dark:text-gray-500">Orders</h3>
                <p class="text-4xl font-bold text-white dark:text-gray-500">0</p>
            </div>
            <div class="p-3 bg-green-500 dark:bg-gray-800">
                <h3 class="text-white dark:text-gray-500">Sales</h3>
                <p class="text-4xl font-bold text-white dark:text-gray-500">R 0</p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="bg-gray-50  dark:bg-gray-800">
                <div class="p-2 bg-gray-300">Total Orders</div>
                <div class="flex items-center justify-center">
                    @include('includes.admin.report-product-orders')
                </div>
            </div>
            <div class="bg-gray-50  dark:bg-gray-800">
                <div class="p-2 bg-gray-300">Total Sales</div>
                <div class="flex items-center justify-center">
                    @include('includes.admin.report-product-sales')
                </div>
            </div> 
        </div>

        <div class="grid grid-cols-3 gap-2 mb-4 text-center"> 
            <div class="p-3 bg-red-500 dark:bg-gray-800">
                <h3 class="text-white dark:text-gray-500">Refunds</h3>
                <p class="text-4xl font-bold text-white dark:text-gray-500">0</p>
            </div>
            <div class="p-3 bg-red-500 dark:bg-gray-800">
                <h3 class="text-white dark:text-gray-500">Voids</h3>
                <p class="text-4xl font-bold text-white dark:text-gray-500">0</p>
            </div>
            <div class="p-3 bg-red-500 dark:bg-gray-800">
                <h3 class="text-white dark:text-gray-500">Declines</h3>
                <p class="text-4xl font-bold text-white dark:text-gray-500">0</p>
            </div>
        </div>

        <div class="p-2 bg-gray-300">Regions</div>
        <div class="grid grid-cols-3 gap-0 mb-4">
            <div class="bg-white">
                <div class="items-center justify-center p-5 mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">   

                    <div class="bg-gray-100 py-2 mb-3 border border-gray-300 rounded-lg">
                        <div class="mb-6 w-100 px-2">
                            <label for="specialsection" class="block mb-2 text-base font-bold text-gray-500 dark:text-white uppercase">Specials Province</label>
                            <select id="divSelector" name="specialsection" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose Province</option>
                                <option value="ec">Eastern Cape</option>
                                <option value="fs">Free State</option>
                                <option value="gp">Gauteng</option>
                                <option value="kzn">KwaZulu-Natal</option>
                                <option value="lp">Limpopo</option>
                                <option value="mp">Mpumalanga</option>
                                <option value="nc">Northern Cape</option>
                                <option value="nw">North West</option>
                                <option value="wc">Western Cape</option>
                            </select>
                        </div>
                        <!-- The Content Divs (Notice the IDs match the select option values) -->
                        <div id="ec" class="content-box active">
                            <h2 class="mb-2 text-base font-bold text-gray-500 dark:text-white uppercase">Eastern Cape</h2>
                            @include('includes.admin.report-product-region-ec')
                        </div>

                        <div id="fs" class="content-box">
                            <h2 class="mb-2 text-base font-bold text-gray-500 dark:text-white uppercase">Free State</h2>
                            @include('includes.admin.report-product-region-fs')
                        </div>

                        <div id="gp" class="content-box">
                            <h2 class="mb-2 text-base font-bold text-gray-500 dark:text-white uppercase">Gauteng</h2>
                            @include('includes.admin.report-product-region-gp')
                        </div>

                        <div id="kzn" class="content-box">
                            <h2 class="mb-2 text-base font-bold text-gray-500 dark:text-white uppercase">KwaZulu-Natal</h2>
                            @include('includes.admin.report-product-region-kzn')
                        </div>

                        <div id="lp" class="content-box">
                            <h2 class="mb-2 text-base font-bold text-gray-500 dark:text-white uppercase">Limpopo</h2>
                            @include('includes.admin.report-product-region-lp')
                        </div>

                        <div id="mp" class="content-box">
                            <h2 class="mb-2 text-base font-bold text-gray-500 dark:text-white uppercase">Mpumalanga</h2>
                            @include('includes.admin.report-product-region-mp')
                        </div>

                        <div id="nc" class="content-box">
                            <h2 class="mb-2 text-base font-bold text-gray-500 dark:text-white uppercase">Northern Cape</h2>
                            @include('includes.admin.report-product-region-nc')
                        </div>

                        <div id="nw" class="content-box">
                            <h2 class="mb-2 text-base font-bold text-gray-500 dark:text-white uppercase">North West</h2>
                            @include('includes.admin.report-product-region-nw')
                        </div>

                        <div id="wc" class="content-box">
                            <h2 class="mb-2 text-base font-bold text-gray-500 dark:text-white uppercase">Western Cape</h2>
                            @include('includes.admin.report-product-region-wc')
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-span-2 max-w-full" id="container" style="height:80vh;"></div>
        </div>

    </div>
</div>

<script>
    // Grab references to the elements
    const selector = document.getElementById('divSelector');
    const contentBoxes = document.querySelectorAll('.content-box');

    // Listen for when the user picks a new option
    selector.addEventListener('change', function() {
        // 1. Get the value of the currently selected option
        const targetId = this.value;

        // 2. Loop through all content boxes
        contentBoxes.forEach(box => {
            // If the box's ID matches the selected value, show it. Otherwise, hide it.
            if (box.id === targetId) {
                box.classList.add('active');
            } else {
                box.classList.remove('active');
            }
        });
    });
</script> 

<script>
    (async () => {
    // 1. Fetch the South Africa TopoJSON data
    const topology = await fetch(
        'https://code.highcharts.com/mapdata/countries/za/za-all.topo.json'
    ).then(response => response.json());

    // 2. Define your bubble data using South African province keys (hc-key)
    // The 'z' value dictates the physical size of the bubble
    const bubbleData = [
        { 'hc-key': 'za-gt', z: 15, name: 'Gauteng' },
        { 'hc-key': 'za-wc', z: 7, name: 'Western Cape' },
        { 'hc-key': 'za-nl', z: 11, name: 'KwaZulu-Natal' },
        { 'hc-key': 'za-ec', z: 6, name: 'Eastern Cape' },
        { 'hc-key': 'za-np', z: 5, name: 'Limpopo' },
        { 'hc-key': 'za-mp', z: 4, name: 'Mpumalanga' },
        { 'hc-key': 'za-nw', z: 4, name: 'North West' },
        { 'hc-key': 'za-fs', z: 2, name: 'Free State' },
        { 'hc-key': 'za-nc', z: 1, name: 'Northern Cape' }
    ];

    // 3. Initialize the map chart
    Highcharts.mapChart('container', {
        chart: {
            map: topology,
            panning: false, // Disables dragging/panning the map
            zooming: {
                type: ''    // Disables drag-to-zoom selectors completely
            }
        },

        title: {
            text: 'South Africa Regional Metrics'
        },

        subtitle: {
            text: ''
        },

        legend: {
            enabled: false
        },

        // mapNavigation provides zoom buttons (+/-) for ease of exploration
        mapNavigation: {
            enabled: false,
        },

        series: [{
            // Series 1: The background structural map of South Africa
            name: 'Basemap',
            borderColor: '#A0A0A0',
            nullColor: 'rgba(200, 200, 200, 0.3)',
            showInLegend: false
        }, {
            // Series 2: The actual bubbles pinned to the map
            type: 'mapbubble',
            name: 'Sold Product in',
            data: bubbleData,
            joinBy: 'hc-key', // Joins your data array keys to the TopoJSON geocodes
            cursor: 'pointer',
            minSize: '4%',    // Minimum size of the smallest bubble
            maxSize: '15%',   // Maximum size of the largest bubble
            color: '#3B82F6', // Bubble fill color
            marker: {
                fillOpacity: 0.6,
                lineWidth: 1,
                lineColor: '#ffffff'
            },
            states: {
                hover: {
                    color: '#60A5FA'
                }
            },
            dataLabels: {
                enabled: false,
                format: '{point.name}'
            },
            tooltip: {
                pointFormat: '<b>{point.name}</b>:<br>Sold: <b>{point.z}</b>'
            }
        }]
    });
})();
</script>

</x-admin-layout>
