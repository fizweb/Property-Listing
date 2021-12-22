<x-guest-layout>
  {{-- Breadcrumbs --}}
  <div class="bg-white shadow-md border-b-2 border-gray-300 py-2 mt-22">
    <div class="container mx-auto">
      <ul class="flex items-center">
        <li>
          <a class="text-xl text-red-800" href="{{ route('homepage') }}">
            Home
          </a>
        </li>

        <li class="mx-3"><i class="fa fa-angle-right"></i></li>

        <li>
          Properties
          {{-- <span class="mx-3"><i class="fa fa-angle-right"></i></span>
          <span>{{ ucwords($property_type) }}</span> --}}
        </li>
      </ul>
    </div>
  </div>

  {{-- Title & Share --}}
  <div class="bg-white py-8">
    <div class="container mx-auto">
      <div class="flex justify-between">
        <div class="w-8/12">
          <h2 class="text-3xl text-gray-600">
            Properties
            @if ( request('property_type') )
              <span class="mx-3">-</span>
              {{-- <i class="fa fa-angle-right"></i> --}}
              <span>{{ ucwords(request('property_type')) }}</span>
            @endif
          </h2>
        </div>
      </div>
    </div>
  </div>

  {{-- Properties Index Content --}}
  <div class="container my-14">
    <div class="flex justify-between -mx-2 pt-5">

      {{-- Left-Sided Content --}}
      <div class="w-9/12 px-2">
        
        @if ( $properties && count($properties) > 0 )
          {{-- paginate links --}}
          <div class="pagination-links {{ $properties->total() >= 9 ? 'mb-5' : '' }}">
            {{ $properties->withQueryString()->links() }}
          </div>

          <div class="flex flex-wrap -mx-2">
            @foreach ( $properties as $property )
              @include('components.property.single-property-card', [ $property, 'width' => 'w-1/3', ])
            @endforeach
          </div>

          {{-- paginate links --}}
          <div class="pagination-links {{ $properties->total() >= 9 ? 'mt-5' : '' }}">
            {{ $properties->withQueryString()->links() }}
          </div>
          
        @else
          <div class="text-red-600 text-center py-20 text-2xl">
            Sorry, there are no record found!
          </div>
        @endif

      </div>
      {{-- End Left Side Content --}}

      {{-- Right-Sidebar --}}
      <div class="w-3/12 px-2 sidebar-search-form">
        {{-- <div class="border-2 border-red-800 px-5 py-3 text-center font-light text-base">
          <p>Subscribe to Property Listing for blogs/news/videos</p>
        </div> --}}

        {{-- Property-Enquiry Form --}}
        <div class="px-4 py-5 text-left bg-gray-300">
          <h2 class="text-2xl font-normal leading-none mb-5">
            Enquire about property
          </h2>

          <!-- Search-Form -->
          @include('components.property.search-form', $locations)

        </div>
      </div>
    </div>
  </div>
</x-guest-layout>