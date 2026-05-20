
<div class="w-full dark:bg-gray-800 p-4 md:p-6">
  <div class="flex justify-between">
    <div>
      <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">32.4k</h5>
      <p class="text-base font-normal text-gray-500 dark:text-gray-400">Monthly Orders</p>
    </div>
    <div
      class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
      12%
      <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
      </svg>
    </div>
  </div>
  <div id="areachart"></div>
  <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
    <div class="flex justify-between items-center pt-5">
      <!-- Button -->
      <button
        id="dropdownDefaultButton"
        data-dropdown-toggle="lastDaysdropdown"
        data-dropdown-placement="bottom"
        class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
        type="button">
        Last 7 days
        <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
      </button>
      <!-- Dropdown menu -->
      <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
          <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>
            </li>
          </ul>
      </div>
      <a
        href="#"
        class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
        Users Report
        <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
      </a>
    </div>
  </div>
</div>

<script>
// Data retrieved from https://fas.org/issues/nuclear-weapons/status-world-nuclear-forces/
Highcharts.chart('areachart', {
    chart: {
        type: 'area'
    },
    accessibility: {
        description: 'Image description: An area chart compares the nuclear ' +
            'stockpiles of the USA and the USSR/Russia between 1945 and ' +
            '2024. The number of nuclear weapons is plotted on the Y-axis ' +
            'and the years on the X-axis. The chart is interactive, and the ' +
            'year-on-year stockpile levels can be traced for each country. ' +
            'The US has a stockpile of 2 nuclear weapons at the dawn of the ' +
            'nuclear age in 1945. This number has gradually increased to 170 ' +
            'by 1949 when the USSR enters the arms race with one weapon. At ' +
            'this point, the US starts to rapidly build its stockpile ' +
            'culminating in 31,255 warheads by 1966 compared to the USSR’s 8,' +
            '400. From this peak in 1967, the US stockpile gradually ' +
            'decreases as the USSR’s stockpile expands. By 1978 the USSR has ' +
            'closed the nuclear gap at 25,393. The USSR stockpile continues ' +
            'to grow until it reaches a peak of 40,159 in 1986 compared to ' +
            'the US arsenal of 24,401. From 1986, the nuclear stockpiles of ' +
            'both countries start to fall. By 2000, the numbers have fallen ' +
            'to 10,577 and 12,188 for the US and Russia, respectively. The ' +
            'decreases continue slowly after plateauing in the 2010s, and in ' +
            '2024 the US has 3,708 weapons compared to Russia’s 4,380.'
    },
    title: {
        text: 'Order Performance'
    },
    subtitle: {
        text: 'Source: <a href="https://fas.org/issues/nuclear-weapons/status-world-nuclear-forces/" ' +
            'target="_blank">FAS</a>'
    },
    xAxis: {
        title: {
            text: 'Month'
        },
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: ''
        }
    },
    tooltip: {
        pointFormat: '{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>' +
            'warheads in {point.x}'
    },
    
    series: [{
        name: 'Last Year',
        data: [
          230,45,150,300,500,200,100,180,900,300,100,100
        ]
    }, {
        name: 'This Year',
        data: [
          200,100,380,600,800,100,400,344,700,100,390,600
        ]
    }]
});
</script>
