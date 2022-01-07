<form action="{{ route('property.all.index') }}" method="get" id="property-searchForm" class="property-search-form">
  <div class="flex flex-col md:flex-row justify-between bg-white py-5 rounded-xl shadow-lg">
    <div class="md:w-2/3 px-3">
      <div class="flex flex-wrap flex-col md:flex-row">
        <div class="flex-1 md:w-1/5 mb-5 md:mb-0 px-3 md:border-r-2 border-gray-400">
          <label for="dealings_type" class="hidden text-lg cursor-pointer">{{ __('Dealings Type') }}</label>
          <select name="dealings_type" id="dealings_type" class="w-full text-xl font-bold cursor-pointer border md:border-0 md:py-0 md:pl-0 rounded-xl md:rounded-none">
            <option value="">{{ __('Buy') . __('/') . __('Rent') }}</option>
            <option {{ request('dealings_type') == 'buy' ? 'selected' : '' }} value="buy">{{ __('Buy') }}</option>
            <option {{ request('dealings_type') == 'rent' ? 'selected' : '' }} value="rent">{{ __('Rent') }}</option>
          </select>
        </div>
        
        <div class="flex-1 md:w-1/5 mb-5 md:mb-0 px-3 md:border-r-2 border-gray-400">
          <label for="property_type" class="hidden text-lg cursor-pointer">{{ __('Property Type') }}</label>
          <select name="property_type" id="property_type" class="w-full text-xl font-bold cursor-pointer border md:border-0 md:py-0 md:pl-0 rounded-xl md:rounded-none">
            <option value="">{{ __('Type') }}</option>
            <option {{ request('property_type') == 'land' ? 'selected' : '' }} value="land">{{ __('Land') }}</option>
            <option {{ request('property_type') == 'apartment' ? 'selected' : '' }} value="apartment">{{ __('Apartment') }}</option>
            <option {{ request('property_type') == 'villa' ? 'selected' : '' }} value="villa">{{ __('Villa') }}</option>
          </select>
        </div>
        
        <div class="flex-1 md:w-1/5 mb-5 md:mb-0 px-3 md:border-r-2 border-gray-400">
          <label for="location" class="hidden text-lg cursor-pointer">{{ __('Location') }}</label>
          <select name="location" id="location" class="w-full text-xl font-bold cursor-pointer border md:border-0 md:py-0 md:pl-0 rounded-xl md:rounded-none">
            <option value="">{{ __('Location') }}</option>
            @foreach ( $locations as $location )
              <option {{ request('location') == $location->id ? 'selected' : '' }} value="{{ $location->id }}">{{ $location->name }}</option>  
            @endforeach
          </select>
        </div>

        <div class="flex-1 md:w-1/5 mb-5 md:mb-0 px-3 md:border-r-2 border-gray-400">
          <label for="price" class="hidden text-lg cursor-pointer">{{ __('Property Price') }}</label>
          <select name="price" id="price" class="w-full text-xl font-bold cursor-pointer border md:border-0 md:py-0 md:pl-0 rounded-xl md:rounded-none">
            <option value="">{{ __('Price') }}</option>
            <option {{ request('price') == '500000-600000' ? 'selected' : '' }} value="500000-600000">500000 - 600000</option>
            <option {{ request('price') == '600001' ? 'selected' : '' }} value="600001-700000">600001 - 700000</option>
            <option {{ request('price') == '700001' ? 'selected' : '' }} value="700001-800000">700001 - 800000</option>
            <option {{ request('price') == '800001' ? 'selected' : '' }} value="800001-900000">800001 - 900000</option>
            <option {{ request('price') == '900001' ? 'selected' : '' }} value="900001-1000000">900001 - 1000000</option>
            <option {{ request('price') == '1000001' ? 'selected' : '' }} value="1000001-+">1000001 +</option>
          </select>
        </div>

        <div class="flex-1 md:w-1/5 mb-5 md:mb-0 pl-3 pr-3 md:pr-0">
          <label for="bedrooms" class="hidden text-lg cursor-pointer">{{ __('Bedrooms') }}</label>
          <select name="bedrooms" id="bedrooms" class="w-full text-xl font-bold cursor-pointer border md:border-0 md:py-0 md:pl-0 rounded-xl md:rounded-none">
            <option value="">{{ __('Bedrooms') }}</option>
            <option {{ request('bedrooms') == '3' ? 'selected' : '' }} value="3">3 and more</option>
            <option {{ request('bedrooms') == '5' ? 'selected' : '' }} value="5">5 and more</option>
            <option {{ request('bedrooms') == '7' ? 'selected' : '' }} value="7">7 and more</option>
            <option {{ request('bedrooms') == '9' ? 'selected' : '' }} value="9">9 and more</option>
          </select>
        </div>
      </div>
    </div>

    <div class="md:w-1/3 text-right px-6 md:px-3">
      <div class="flex flex-col md:flex-row justify-center">
        <input type="text" name="search_by" id="search_by" class="w-full text-xl border-gray-500 py-3 px-5 md:mr-2 mb-5 md:mb-0 rounded-xl" placeholder="Try to search for something" value="{{ request('search_by') }}" />

        <button class="btn-base-bg-1 text-26 align-bottom py-3 px-6 xs:rounded">{{ __('Search') }}</button>
      </div>
    </div>
  </div>
</form>