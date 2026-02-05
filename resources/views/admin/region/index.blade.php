

<x-admin-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg dark:border-gray-700 mt-15"> 

          
              
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="bg-gray-50  dark:bg-gray-800">
                    <div class="p-2 bg-gray-300">Overall Total Orders</div>
                    <div class="flex items-center justify-center">
                        <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" id="region-map-south-africa" class="w-full h-auto max-h-96" viewBox="0 0 500 356.55" xml:space="preserve">
                            @include('includes.admin.region-map-fs')
                            @include('includes.admin.region-map-gp')
                            @include('includes.admin.region-map-nw')
                            @include('includes.admin.region-map-lp')
                            @include('includes.admin.region-map-mp')
                            @include('includes.admin.region-map-kzn')
                            @include('includes.admin.region-map-ec')
                            @include('includes.admin.region-map-wc')
                            @include('includes.admin.region-map-nc')
                        </svg>
                    </div>
                    <div class="grid grid-cols-4 gap-4 mb-4">
                        <div class="region-map-province-item" data-province="eastern-cape">Eastern Cape</div>
                        <div class="region-map-province-item" data-province="free-state">Free State</div>
                        <div class="region-map-province-item" data-province="gauteng">Gauteng</div>
                        <div class="region-map-province-item" data-province="kzn">KwaZulu-Natal</div>
                        <div class="region-map-province-item" data-province="limpopo">Limpopo</div>
                        <div class="region-map-province-item" data-province="mpumalanga">Mpumalanga</div>
                        <div class="region-map-province-item" data-province="northern-cape">Northern Cape</div>
                        <div class="region-map-province-item" data-province="north-west">North West</div>
                        <div class="region-map-province-item" data-province="western-cape">Western Cape</div> 
                    </div>
                    
                </div>


                <div class="bg-gray-50  dark:bg-gray-800">
                    <div class="p-2 bg-gray-300">Overall Total Orders</div>
                    <div class="flex items-center justify-center">
                        <div class="region-map-info-panel">
                        <div class="region-map-province-info">
                            <div class="region-map-placeholder">
                                <p>Select a province to view details</p>
                            </div>
                            <div class="region-map-province-details" style="display: none;">
                                <h3 class="region-map-province-name">Province Name</h3>
                                <div class="region-map-province-description">
                                    <p>Description will appear here when a province is selected.</p>
                                </div>

                                <div class="grid grid-cols-4">
                                    <div class="region-map-detail-label" id="za_map_region"></div>
                                    <div class="region-map-detail-label" id="za_map_product"></div>
                                    <div class="region-map-detail-label" id="za_map_customer"></div>
                                    <div class="region-map-detail-label" id="za_map_status"></div>
                                </div>


                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
                    
                    


                    
             
        </div>
    </div>
</x-admin-layout>
