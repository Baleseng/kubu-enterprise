<x-admin-layout>

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg dark:border-gray-700 mt-15">  
        
        <div class="mb-5 py-1.5 bg-gray-50 dark:bg-gray-800 h-142 max-w-full overflow-y-hidden  "> 
            <a href="{{ url('admin/sections/add') }}" class="flex justify-center content-center text-center text-white uppercase w-60 py-3 bg-blue-700 hover:bg-blue-800 font-medium text-sm px-5  focus:outline-none group">
                <span class="ms-3">Add Section</span>
            </a>
            <div class="p-2 bg-gray-300">Sections List</div>
            <div x-data="{ activeTab: 'tab0' }" class="p-4">
                <!-- Tab Headers -->
                <div class="flex border-b">
                    <button @click="activeTab = 'tab0'" :class="{ 'border-b-2 border-blue-500 text-blue-600': activeTab === 'tab0', 'text-gray-600': activeTab !== 'tab0' }" class="px-4 py-2 text-sm font-medium focus:outline-none">All</button>
                </div>
                <!-- Tab Content -->
                <div class="mt-4">
                    <div x-show="activeTab === 'tab0'">
                     @include('includes.admin.section-tab-all-list')
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-5 py-1.5 bg-gray-50 dark:bg-gray-800 h-142 max-w-full overflow-y-hidden  "> 
            
            <div class="p-2 bg-gray-300">Report Performance</div>

            <div id="'sections"></div>
            
        </div>

    </div>
</div>

<script>
    Highcharts.setOptions({
    chart: {
        styledMode: true
    }
});
Dashboards.board('sections', {
    dataPool: {
        connectors: [{
            id: 'VegeTable',
            type: 'CSV',
            csv: document.querySelector('#csv').innerHTML
        }]
    },
    gui: {
        layouts: [{
            rows: [{
                cells: [{
                    id: 'top-left'
                }, {
                    id: 'top-right'
                }]
            }, {
                cells: [{
                    id: 'bottom'
                }]
            }]
        }]
    },
    components: [{
        renderTo: 'top-left',
        type: 'Highcharts',
        sync: {
            highlight: true
        },
        connector: {
            id: 'VegeTable'
        },
        chartOptions: {
            chart: {
                type: 'bar'
            },
            credits: {
                enabled: false
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    colorByPoint: true
                }
            },
            title: {
                text: ''
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    enabled: false
                }
            }
        }
    }, {
        renderTo: 'top-right',
        type: 'Highcharts',
        sync: {
            highlight: true
        },
        connector: {
            id: 'VegeTable'
        },
        chartOptions: {
            chart: {
                type: 'pie'
            },
            credits: {
                enabled: false
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                pie: {
                    innerSize: '60%'
                },
                series: {
                    colorByPoint: true
                }
            },
            title: {
                text: ''
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    enabled: false
                }
            }
        }
    }, {
        renderTo: 'bottom',
        type: 'Highcharts',
        sync: {
            highlight: true
        },
        connector: {
            id: 'VegeTable'
        },
        chartOptions: {
            chart: {
                type: 'scatter'
            },
            credits: {
                enabled: false
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    colorByPoint: true,
                    dataSorting: {
                        enabled: true,
                        sortKey: 'y'
                    },
                    marker: {
                        radius: 8
                    }
                }
            },
            title: {
                text: ''
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    enabled: false
                }
            }
        }
    }]
});
</script>

</x-admin-layout>
