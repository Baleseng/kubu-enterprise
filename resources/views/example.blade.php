 <style>
    .subtitle {font-size: 1.2rem; opacity: 0.9;}
    .content {display: flex;flex-wrap: wrap;gap: 30px;}

    #south-africa-map {width: 100%;height: auto;max-height: 500px;}
    
    .map-container {flex: 1; min-width: 300px; padding:20px;display: flex;flex-direction: column;}
    .map-title {text-align: center; margin-bottom: 15px; color: #2c3e50; font-size: 1.5rem;}
    .map-wrapper {flex: 1;display: flex;justify-content: center;align-items: center;overflow: hidden;}
    
    .greyout-province{fill: #aaaaaa; stroke: #fff; stroke-width: 1; transition: all 0.3s ease;}
    
    .province {fill: #00984A; stroke: #fff; stroke-width: 1; transition: all 0.3s ease; cursor: pointer;}
    .province:hover {fill:#FFCD07; stroke-width: 2;}
    .province.active {fill:#FFCD07; stroke-width: 2; filter:);}
    .province-info {flex: 1;display: flex;flex-direction: column;gap: 15px;}
    .province-name {font-size: 3rem; color: #ffcd07; text-align: center;margin-bottom: 10px;}
    .province-description {margin-top: 15px;line-height: 1.6;color: #34495e;}
    .province-details {display: grid;grid-template-columns: 1fr 1fr;gap: 15px; margin-top:10%;}
    .province-list {display: grid;grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));gap: 15px;margin-top: 15px;}
    .province-item {background: #f8f9fa;padding: 12px;text-align: center;cursor: pointer;transition: all 0.3s ease;}
    .province-item:hover {background: #e9ecef;transform: translateY(-3px);}
    .province-item.active {background: #ffcd07; color: #000000;}
    
    .info-panel {flex:1; border-radius:10px; padding:25px; display:flex; flex-direction: column;}
    
    .detail-item {background:#f8f9fa; padding:12px;border-radius:8px; border-left: 4px solid #00984A;}
    .detail-label {font-weight: bold;color: #7f8c8d; visibility:hidden; font-size: 0.9rem;}
    .detail-value {font-size: 1.1rem;color: #2c3e50;margin-top: 5px;}
    
    .placeholder {text-align: center;color: #ffffff;font-style: bold; font-size:21px; margin: auto;}
</style>
<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900 dark:text-gray-100">
                
            <div class="content">
              <div class="map-container">
                <div class="map-wrapper">
                  
                  <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" id="south-africa-map" viewBox="0 0 500 356.55" xml:space="preserve">
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

                <div class="province-list">
                  <div class="province-item" data-province="eastern-cape">Eastern Cape</div>
                  <div class="province-item" data-province="free-state">Free State</div>
                  <div class="province-item" data-province="gauteng">Gauteng</div>
                  <div class="province-item" data-province="kzn">KwaZulu-Natal</div>
                  <div class="province-item" data-province="limpopo">Limpopo</div>
                  <div class="province-item" data-province="mpumalanga">Mpumalanga</div>
                  <div class="province-item" data-province="northern-cape">Northern Cape</div>
                  <div class="province-item" data-province="north-west">North West</div>
                  <div class="province-item" data-province="western-cape">Western Cape</div> 
                </div>
                
              </div>

              <div class="info-panel">
                <div class="province-info">
                  <div class="placeholder">
                    <p>Select a province to view details</p>
                  </div>
                  <div class="province-details" style="display: none;">
                    <h3 class="province-name">Province Name</h3>
                    <div class="province-description">
                      <p>Description will appear here when a province is selected.</p>
                    </div>

                    <div class="detail-item">
                      <div class="detail-label"></div>
                      <div class="detail-value bergone">-</div>
                    </div>

                    <div class="detail-item">
                      <div class="detail-label"></div>
                      <div class="detail-value bergtwo">-</div>
                    </div>

                    <div class="detail-item">
                      <div class="detail-label"></div>
                      <div class="detail-value bergthree">-</div>
                    </div>

                    <div class="detail-item">
                      <div class="detail-label"></div>
                      <div class="detail-value bergfour">-</div>
                    </div>

                    <div class="detail-item">
                      <div class="detail-label"></div>
                      <div class="detail-value bergfive">-</div>
                    </div>

                    <div class="detail-item">
                      <div class="detail-label"></div>
                      <div class="detail-value bergsix">-</div>
                    </div>

                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>

    
<script>
 

</script>
    
</x-app-layout>
