<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center -mx-6">
      <h2 class="font-semibold text-xl text-red-600 leading-tight">
        {{ __('Edit Location') }}
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

        <div class="w-full -mx-5 sm:-mx-6">
          <div class="edit-location-area w-2/4 px-5 sm:px-6">
            <form action="{{ route('admin.location.edit', $location) }}" method="POST"
                  class="location-form edit w-full">
              @csrf

              {{-- Name --}}
              <div class="w-full mb-7">
                <label for="name" class="required input-label-full">
                  <span>Name</span>
                </label>

                <input type="text" name="name" id="name" class="required input-field-full @error('name') is-invalid @enderror" required value="{{ $location->name }}" />

                @if ( $errors->has('name') )
                  <div class="alert-validation" role="alert">
                    {{ $errors->first('name') }}
                  </div>
                @endif
              </div>

              {{-- City --}}
              <div class="w-full mb-7">
                <label for="city" class="required input-label-full">
                  <span>City</span>
                </label>

                <input type="text" name="city" id="city" class="required input-field-full @error('city') is-invalid @enderror" required value="{{ $location->city }}" />

                @if ( $errors->has('city') )
                  <div class="alert-validation" role="alert">
                    {{ $errors->first('city') }}
                  </div>
                @endif
              </div>
              

              {{-- Submit --}}
              <div class="mb-7">
                <button type="submit" class="btn btn-green">Update Location</button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</x-app-layout>

