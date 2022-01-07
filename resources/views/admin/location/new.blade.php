<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center -mx-6">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add New Location') }}
      </h2>
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

        <div class="flex flex-wrap justify-between -mx-5 sm:-mx-6">
          <div class="add-location-area w-2/4 px-5 sm:px-6">
            <form action="{{ route('admin.location.new') }}" method="POST"
                  class="location-form new w-full">
              @csrf

              {{-- Name --}}
              <div class="mb-7">
                <label for="name" class="required input-label-full">
                  <span>Name</span>
                </label>

                <input type="text" name="name" id="name" class="required input-field-full @error('name') is-invalid @enderror" placeholder="Write location name here" required value="{{old('name')}}" />

                @if ( $errors->has('name') )
                  <div class="alert-validation" role="alert">
                    {{ $errors->first('name') }}
                  </div>
                @endif
              </div>

              {{-- City --}}
              <div class="mb-7">
                <label for="city" class="required input-label-full">
                  <span>City</span>
                </label>

                <input type="text" name="city" id="city" class="required input-field-full @error('city') is-invalid @enderror" placeholder="Write location city here" required value="{{old('city')}}" />

                @if ( $errors->has('city') )
                  <div class="alert-validation" role="alert">
                    {{ $errors->first('city') }}
                  </div>
                @endif
              </div>
              

              {{-- Submit --}}
              <div class="mb-7">
                <button type="submit" class="btn btn-indigo">Save Location</button>
              </div>
            </form>
          </div>

          {{-- All-Locations-Index --}}
          <div class="w-2/4 px-5 sm:px-6">
            <div class="text-xl font-bold mb-3">
              Locations Index
            </div>

            <table class="locations-table table-auto w-full">
              <thead class="table-header">
                <tr class="align-middle text-center bg-gray-800 text-white">
                  <th class="border p-2 font-normal serial">#</th>
                  <th class="border p-2 font-normal name">Name</th>
                  <th class="border p-2 font-normal city">City</th>
                  <th class="border p-2 font-normal w-40 actions">- - -</th>
                </tr>
              </thead>

              <tbody class="table-body">
                @foreach ( $locations as $index => $location )
                  <tr class="align-middle">
                    <td class="border p-2 text-center serial">
                      {{ $index + 1 }}
                    </td>
  
                    <td class="border p-2 name">
                      {{ ucwords($location->name) }}
                    </td>
  
                    <td class="border p-2 city">
                      {{ ucwords($location->city) }}
                    </td>
  
                    <td class="border p-2 text-center text-sm w-40 actions">
                      <a href="{{ route('admin.location.edit', $location) }}" class="btn-green py-1 px-2 rounded-sm">
                        {{-- <i class="fa fa-pencil"></i> --}}
                        <i class="w-4 h-4 mb-1" data-feather="edit-3"></i>
                      </a>
  
                      <a href="{{ route('admin.location.delete', $location) }}" 
                        onclick="return confirm('Are you sure to delete this location?');"
                        class="btn-red py-1 px-2 rounded-sm ml-1">
                        {{-- <i class="fa fa-trash"></i> --}}
                        <i class="w-4 h-4 mb-1" data-feather="trash-2"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</x-app-layout>

