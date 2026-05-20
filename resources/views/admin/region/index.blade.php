<x-admin-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg dark:border-gray-700 mt-15"> 

           <div class="max-w-full" id="container" style="height:100vh;"></div> 
   
        </div>
    </div>

    <script>
    (async () => {

    const topology = await fetch(
        'https://code.highcharts.com/mapdata/custom/world.topo.json'
    ).then(response => response.json());

    const data = await fetch(
        'https://www.highcharts.com/samples/data/world-population.json'
    ).then(response => response.json());

    Highcharts.mapChart('container', {
        chart: {
            map: topology,
            panning: false, // Disables dragging/panning the map
            zooming: {
                type: ''    // Disables drag-to-zoom selectors completely
            }
        },

        title: {
            text: 'World population 2016 by country'
        },

        subtitle: {
            text: 'Demo of Highcharts map with bubbles'
        },

        accessibility: {
            description: 'We see how China and India by far are the ' +
                'countries with the largest population.'
        },

        legend: {
            enabled: false
        },

        mapNavigation: {
            enabled: false,
            buttonOptions: {
                verticalAlign: 'bottom'
            }
        },

        mapView: {
            fitToGeometry: {
                type: 'MultiPoint',
                coordinates: [
                    // Alaska west
                    [-164, 54],
                    // Greenland north
                    [-35, 84],
                    // New Zealand east
                    [179, -38],
                    // Chile south
                    [-68, -55]
                ]
            }
        },

        series: [{
            name: 'Countries',
            color: '#E0E0E0',
            enableMouseTracking: false
        }, {
            type: 'mapbubble',
            name: 'Population 2016',
            joinBy: ['iso-a3', 'code3'],
            data: data,
            minSize: 4,
            maxSize: '12%',
            tooltip: {
                pointFormat: '{point.properties.hc-a2}: {point.z} thousands'
            }
        }]
    });
})();


    </script>

    <script src="https://code.highcharts.com/maps/highmaps.js"></script>
    <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/maps/modules/offline-exporting.js"></script>
    <script src="https://code.highcharts.com/maps/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/themes/adaptive.js"></script>

</x-admin-layout>
