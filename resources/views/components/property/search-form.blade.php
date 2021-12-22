<form action="{{ route('property.all.index') }}" method="get" id="property-searchForm" class="property-search-form">
  <div class="flex justify-between bg-white py-5 rounded-xl shadow-lg">
    <div class="w-2/3 px-3">
      <div class="flex flex-wrap">
        <div class="flex-1 w-1/5 px-3 border-r-2 border-gray-400">
          <label for="dealings_type" class="hidden text-lg cursor-pointer">Dealings Type</label>
          <select name="dealings_type" id="dealings_type" class="w-full text-xl font-bold cursor-pointer border-0 py-0 pl-0">
            <option value="">Buy or Rent</option>
            <option {{ request('dealings_type') == 'buy' ? 'selected' : '' }} value="buy">Buy</option>
            <option {{ request('dealings_type') == 'rent' ? 'selected' : '' }} value="rent">Rent</option>
          </select>
        </div>
        
        <div class="flex-1 w-1/5 px-3 border-r-2 border-gray-400">
          <label for="property_type" class="hidden text-lg cursor-pointer">Property Type</label>
          <select name="property_type" id="property_type" class="w-full text-xl font-bold cursor-pointer border-0 py-0 pl-0">
            <option value="">Type</option>
            <option {{ request('property_type') == 'land' ? 'selected' : '' }} value="land">Land</option>
            <option {{ request('property_type') == 'apartment' ? 'selected' : '' }} value="apartment">Apartment</option>
            <option {{ request('property_type') == 'villa' ? 'selected' : '' }} value="villa">Villa</option>
          </select>
        </div>
        
        <div class="flex-1 w-1/5 px-3 border-r-2 border-gray-400">
          <label for="location" class="hidden text-lg cursor-pointer">Location</label>
          <select name="location" id="location" class="w-full text-xl font-bold cursor-pointer border-0 py-0 pl-0">
            <option value="">Location</option>
            @foreach ( $locations as $location )
              <option {{ request('location') == $location->id ? 'selected' : '' }} value="{{ $location->id }}">{{ $location->name }}</option>  
            @endforeach
          </select>
        </div>

        <div class="flex-1 w-1/5 px-3 border-r-2 border-gray-400">
          <label for="price" class="hidden text-lg cursor-pointer">Property Price</label>
          <select name="price" id="price" class="w-full text-xl font-bold cursor-pointer border-0 py-0 pl-0">
            <option value="">Price</option>
            <option {{ request('price') == '500000-600000' ? 'selected' : '' }} value="500000-600000">500000 - 600000</option>
            <option {{ request('price') == '600001' ? 'selected' : '' }} value="600001-700000">600001 - 700000</option>
            <option {{ request('price') == '700001' ? 'selected' : '' }} value="700001-800000">700001 - 800000</option>
            <option {{ request('price') == '800001' ? 'selected' : '' }} value="800001-900000">800001 - 900000</option>
            <option {{ request('price') == '900001' ? 'selected' : '' }} value="900001-1000000">900001 - 1000000</option>
            <option {{ request('price') == '1000001' ? 'selected' : '' }} value="1000001-+">1000001 +</option>
          </select>
        </div>

        <div class="flex-1 w-1/5 pl-3">
          <label for="bedrooms" class="hidden text-lg cursor-pointer">Bedrooms</label>
          <select name="bedrooms" id="bedrooms" class="w-full text-xl font-bold cursor-pointer border-0 py-0 pl-0">
            <option value="">Bedrooms</option>
            <option {{ request('bedrooms') == '3' ? 'selected' : '' }} value="3">3 and more</option>
            <option {{ request('bedrooms') == '5' ? 'selected' : '' }} value="5">5 and more</option>
            <option {{ request('bedrooms') == '7' ? 'selected' : '' }} value="7">7 and more</option>
            <option {{ request('bedrooms') == '9' ? 'selected' : '' }} value="9">9 and more</option>
          </select>
        </div>
      </div>
    </div>

    <div class="w-1/3 text-right px-3">
      <div class="flex justify-center">
        <input type="text" name="search_by" id="search_by" class="text-xl rounded-xl border-gray-500 py-3 px-5 mr-2" placeholder="Try to search for something" value="{{ request('search_by') }}" />

        <button class="btn-base-bg-1 text-26 align-bottom py-3 px-6">Search</button>
      </div>
    </div>
  </div>
</form>