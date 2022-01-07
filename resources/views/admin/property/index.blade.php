<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center -mx-6">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Properties') }}
      </h2>

      <div class="min-w-max">
        <a href="{{ route('admin.property.new') }}" class="w-full btn btn-indigo">
          Add Property
        </a>
      </div>
    </div>
  </x-slot>

  {{-- Session-Message --}}
  <div class="session-message">
    @if (session('error'))
      <div role="alert" class="alert-dismissible error">
        {{ session('error') }}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><i class="fa fa-close"></i></button>
      </div>
    @elseif (session('success'))
      <div role="alert" class="alert-dismissible success">
        {{ session('success') }}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><i class="fa fa-close"></i></button>
      </div>
    @endif
  </div>

  <div class="pt-6 pb-12">
    {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> --}}
    <div class="container">
      <div class="bg-white p-6 border-b border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
          
        @if ( $properties )
          {{-- paginate links --}}
          <div class="pagination-links {{ $properties->total() > 20 ? 'mb-5' : '' }}">
            {{ $properties->withQueryString()->links() }}
          </div>

          <table class="table-auto w-full">
            <thead class="table-header">
              <tr class="align-middle text-center bg-gray-800 text-white">
                <th class="border p-2 font-normal serial">#</th>
                <th class="border p-2 font-normal title">Title</th>
                <th class="border p-2 font-normal property-type">Type</th>
                <th class="border p-2 font-normal price">Price</th>
                <th class="border p-2 font-normal location">Location</th>
                <th class="border p-2 font-normal w-40 actions">- - -</th>
              </tr>
            </thead>

            @php
              $serial = $properties->currentPage() == 1 ? 1 : ((($properties->currentPage() - 1) * 20) + 1);
            @endphp

            <tbody class="table-body">
              @foreach ( $properties as $index => $property )
                <tr class="align-middle {{ ($index+1) % 2 == 0 ? 'bg-gray-100' : '' }}">
                  <td class="border p-2 text-center serial">
                    {{ $serial++ }}
                  </td>

                  <td class="border p-2 title">
                    {{ $property->title }}
                  </td>

                  <td class="border p-2 property-type">
                    {{ ucwords($property->property_type) }}
                  </td>

                  <td class="border p-2 text-right price">
                    {{ number_format($property->price, 0, '.', ',') }}
                  </td>

                  <td class="border p-2 location">
                    {{ $property->location->name ?? '- - -' }}
                  </td>

                  <td class="border p-2 text-center text-sm w-40 actions">
                    <a href="{{ route('property.single.show', $property) }}" target="blank"
                      class="btn-blue py-1 px-2 rounded-sm">
                      {{-- <i class="fa fa-eye"></i> --}}
                      <i class="w-4 h-4 mb-1" data-feather="eye"></i>
                    </a>

                    <a href="{{ route('admin.property.edit', $property) }}" class="btn-green py-1 px-2 rounded-sm ml-1">
                      {{-- <i class="fa fa-pencil"></i> --}}
                      <i class="w-4 h-4 mb-1" data-feather="edit-3"></i>
                    </a>

                    <a href="{{ route('admin.property.delete', $property) }}" 
                      onclick="return confirm('Are you sure to delete this property?');"
                      class="btn-red py-1 px-2 rounded-sm ml-1">
                      {{-- <i class="fa fa-trash"></i> --}}
                      <i class="w-4 h-4 mb-1" data-feather="trash-2"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          {{-- paginate links --}}
          <div class="pagination-links {{ $properties->total() > 20 ? 'mt-5' : '' }}">
            {{ $properties->withQueryString()->links() }}
          </div>
        @else
          <div class="text-red-800 text-3xl text-center py-52">
            NO Properties Found
          </div>
        @endif

      </div>
    </div>
  </div>
</x-app-layout>
