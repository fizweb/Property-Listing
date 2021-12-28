<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center -mx-6">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add New Property') }}
      </h2>

      <div class="min-w-max">
        <a href="{{ route('admin.property.index') }}" class="w-full btn btn-gray">
          Back
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
      <div class="add-property-area bg-white p-6 border-b border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
        <form action="{{ route('admin.property.new') }}" method="POST"
              class="property-form new w-full" enctype="multipart/form-data">
          @csrf
          <div class="flex flex-wrap justify-between items-center">

            {{-- Title --}}
            <div class="w-full px-5 sm:px-6 mb-7">
              <label for="title" class="required input-label-full">
                <span>Title</span>
              </label>

              <input type="text" name="title" id="title" class="required input-field-full @error('title') is-invalid @enderror" placeholder="Write property title here" required value="{{old('title')}}" />

              @if ( $errors->has('title') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('title') }}
                </div>
              @endif
            </div>

            {{-- Price --}}
            <div class="md:w-2/4 px-5 sm:px-6 mb-7">
              <label for="price" class="required input-label-full">
                <span>Price</span>
              </label>

              <input type="number" name="price" id="price" min="0" step="1" class="required input-field-full @error('price') is-invalid @enderror" placeholder="42658569" required value="{{old('price')}}" />

              @if ( $errors->has('price') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('price') }}
                </div>
              @endif
            </div>

            {{-- Dealings-Type --}}
            <div class="md:w-2/4 px-5 sm:px-6 mb-7">
              <label for="dealings_type" class="required input-label-full">
                <span>Dealings Type</span>
              </label>

              <select name="dealings_type" id="dealings_type" class="required select-field-full @error('dealings_type') is-invalid @enderror" required>
                <option value="">Select Buy/Rent</option>
                <option value="buy" {{'buy' == old('dealings_type') ? 'selected' : ''}}>Buy</option>
                <option value="rent" {{'rent' == old('dealings_type') ? 'selected' : ''}}>Rent</option>
              </select>

              @if ( $errors->has('dealings_type') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('dealings_type') }}
                </div>
              @endif
            </div>

            {{-- Property-Type --}}
            <div class="md:w-2/4 px-5 sm:px-6 mb-7">
              <label for="property_type" class="required input-label-full">
                <span>Property Type</span>
              </label>

              <select name="property_type" id="property_type" class="required select-field-full @error('property_type') is-invalid @enderror" required>
                <option value="">Select Property Type</option>
                <option value="land" {{'land' == old('property_type') ? 'selected' : ''}}>Land</option>
                <option value="villa" {{'villa' == old('property_type') ? 'selected' : ''}}>Villa</option>
                <option value="apartment" {{'apartment' == old('property_type') ? 'selected' : ''}}>Apartment</option>
              </select>

              @if ( $errors->has('property_type') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('property_type') }}
                </div>
              @endif
            </div>

            {{-- Main-Feature --}}
            <div class="md:w-2/4 px-5 sm:px-6 mb-7">
              <label for="main_feature" class="input-label-full">
                <span>Main Feature</span>
              </label>

              <select name="main_feature" id="main_feature" class="select-field-full @error('main_feature') is-invalid @enderror">
                <option value="">Select Property Main Feature</option>
                <option value="banglow" {{'banglow' == old('main_feature') ? 'selected' : ''}}>Banglow</option>
                <option value="duplex" {{'duplex' == old('main_feature') ? 'selected' : ''}}>Duplex</option>
                <option value="penthouse" {{'penthouse' == old('main_feature') ? 'selected' : ''}}>Penthouse</option>
              </select>

              @if ( $errors->has('main_feature') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('main_feature') }}
                </div>
              @endif
            </div>

            {{-- Bedrooms --}}
            <div class="md:w-2/4 px-5 sm:px-6 mb-7">
              <label for="bedrooms" class="input-label-full">
                <span>Bedrooms</span>
              </label>

              <input type="number" name="bedrooms" id="bedrooms" min="0" step="1" class="input-field-full @error('bedrooms') is-invalid @enderror" placeholder="7" value="{{old('bedrooms')}}" />

              @if ( $errors->has('bedrooms') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('bedrooms') }}
                </div>
              @endif
            </div>

            {{-- Bathrooms --}}
            <div class="md:w-2/4 px-5 sm:px-6 mb-7">
              <label for="bathrooms" class="input-label-full">
                <span>Bathrooms</span>
              </label>

              <input type="number" name="bathrooms" id="bathrooms" min="0" step="1" class="input-field-full @error('bathrooms') is-invalid @enderror" placeholder="4" value="{{old('bathrooms')}}" />

              @if ( $errors->has('bathrooms') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('bathrooms') }}
                </div>
              @endif
            </div>

            {{-- Gross-Square-Meter --}}
            <div class="md:w-2/4 px-5 sm:px-6 mb-7">
              <label for="gross_smt" class="required input-label-full">
                <span>Gross Square Meter</span>
              </label>

              <input type="number" name="gross_smt" id="gross_smt" min="0" step="1" class="required input-field-full @error('gross_smt') is-invalid @enderror" placeholder="1400" required value="{{old('gross_smt')}}" />

              @if ( $errors->has('gross_smt') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('gross_smt') }}
                </div>
              @endif
            </div>

            {{-- Net-Square-Meter --}}
            <div class="md:w-2/4 px-5 sm:px-6 mb-7">
              <label for="net_smt" class="required input-label-full">
                <span>Net Square Meter</span>
              </label>

              <input type="number" name="net_smt" id="net_smt" min="0" step="1" class="required input-field-full @error('net_smt') is-invalid @enderror" placeholder="1250" required value="{{old('net_smt')}}" />

              @if ( $errors->has('net_smt') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('net_smt') }}
                </div>
              @endif
            </div>

            {{-- Pool --}}
            <div class="md:w-2/4 px-5 sm:px-6 mb-7">
              <label for="pool" class="input-label-full">
                <span>Pool</span>
              </label>

              <select name="pool" id="pool" class="select-field-full @error('pool') is-invalid @enderror">
                <option value="">Select Pool Type</option>
                <option value="private" {{'private' == old('pool') ? 'selected' : ''}}>Private</option>
                <option value="public" {{'public' == old('pool') ? 'selected' : ''}}>Public</option>
                <option value="no" {{'no' == old('pool') ? 'selected' : ''}}>No-Pool</option>
              </select>

              @if ( $errors->has('pool') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('pool') }}
                </div>
              @endif
            </div>

            {{-- Location --}}
            <div class="md:w-2/4 px-5 sm:px-6 mb-7">
              <label for="location_id" class="required input-label-full">
                <span>Location</span>
              </label>

              <select name="location_id" id="location_id" class="required select-field-full @error('location_id') is-invalid @enderror" required>
                <option value="">Select Location</option>
                @if ( $locations )
                  @foreach ( $locations as $location )
                    <option value="{{$location->id}}" {{$location->id == old('location_id') ? 'selected' : ''}}>{{ $location->name }}</option>
                  @endforeach
                @endif
              </select>

              @if ( $errors->has('location_id') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('location_id') }}
                </div>
              @endif
            </div>

            {{-- Overview --}}
            <div class="md:w-2/4 px-5 sm:px-6 mb-7 self-start">
              <label for="overview" class="required input-label-full">
                <span>Overview</span>
              </label>

              <textarea name="overview" id="overview" class="required text-field-full @error('overview') is-invalid @enderror" cols="30" rows="10" placeholder="Write here property overview..." required>{{old('overview')}}</textarea>

              @if ( $errors->has('overview') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('overview') }}
                </div>
              @endif
            </div>

            {{-- Why-Buy --}}
            <div class="md:w-2/4 px-5 sm:px-6 mb-7 self-start">
              <label for="why_buy" class="input-label-full">
                <span>Why Buy?</span>
              </label>

              <textarea name="why_buy" id="why_buy" class="text-field-full @error('why_buy') is-invalid @enderror" cols="30" rows="10" placeholder="Why customer need to buy this property...?">{{old('why_buy')}}</textarea>

              @if ( $errors->has('why_buy') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('why_buy') }}
                </div>
              @endif
            </div>

            {{-- Description --}}
            <div class="md:w-2/4 px-5 sm:px-6 mb-7 self-start">
              <label for="description" class="input-label-full">
                <span>Description</span>
              </label>

              <textarea name="description" id="description" class="text-field-full @error('description') is-invalid @enderror" cols="30" rows="10" placeholder="Write the property details description here...">{{old('description')}}</textarea>

              @if ( $errors->has('description') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('description') }}
                </div>
              @endif
            </div>

            {{-- Featured-&-Gallery-Media --}}
            <div class="md:w-2/4 px-5 sm:px-6 mb-7 self-start">
              {{-- Featured-Media --}}
              <div class="mb-7">
                <label for="featured_media" class="input-label-full">
                  <span>Featured Media</span>
                </label>

                <input type="file" name="featured_media" id="featured_media" class="input-field-full @error('featured_media') is-invalid @enderror" />

                @if ( $errors->has('featured_media') )
                  <div class="alert-validation" role="alert">
                    {{ $errors->first('featured_media') }}
                  </div>
                @endif
              </div>

              {{-- Gallery-Media --}}
              <div class="">
                <label for="gallery_media" class="input-label-full">
                  <span>Gallery Media</span>
                </label>

                <input type="file" name="gallery_media[]" multiple id="gallery_media" class="input-field-full @error('gallery_media.*') is-invalid @enderror" />

                @if ( $errors->has('gallery_media.*') )
                  <div class="alert-validation" role="alert">
                    {{ $errors->first('gallery_media.*') }}
                  </div>
                @endif
              </div>

              {{-- <div class="flex flex-wrap justify-between -mx-5 sm:-mx-6">
                <!-- Remote-Media -->
                <div class="md:w-2/4 px-5 sm:px-6 mb-7 remote-media">
                  <label for="remote_media" class="input-label-full">
                    <span>Remote URL</span>
                  </label>
    
                  <input type="text" name="remote_media" id="remote_media" class="input-field-full" placeholder="" value="{{old('remote_media')}}" />
                </div>
              </div> --}}
            </div>
            

            {{-- Submit --}}
            <div class="w-full px-5 sm:px-6 mb-7 mt-7 text-center">
              <button type="submit" class="btn btn-indigo">Save Property</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>

