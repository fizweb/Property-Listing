<x-guest-layout>
  {{-- Breadcrumbs --}}
  <div class="bg-white shadow-md border-b-2 border-gray-300 py-2 mt-22">
    <div class="container mx-auto">
      <ul class="flex items-center">
        <li class="hidden md:block">
          <a class="text-3xl text-red-800" href="{{ url('/') }}">
            {{-- <i class="fa fa-home"></i> --}}
            <i data-feather="home"></i>
          </a>
        </li>

        <li class="hidden md:block mx-3">
          {{-- <i class="fa fa-angle-right"></i> --}}
          <i data-feather="chevron-right"></i>
        </li>

        <li>
          <a class="text-base text-red-800" href="#">Property</a>
        </li>

        <li class="mx-3">
          {{-- <i class="fa fa-angle-right"></i> --}}
          <i data-feather="chevron-right"></i>
        </li>

        <li>Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
      </ul>
    </div>
  </div>

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


  {{-- Title & Share --}}
  <div class="bg-white py-8">
    <div class="container mx-auto">
      <div class="flex justify-between">
        <div class="w-full md:w-8/12">
          <h2 class="text-3xl text-gray-600">
            {{ $property->title }}
          </h2>

          <h3 class="text-lg mt-2">
            {{ __('Price') }}:
            <span class="text-red-800">
              {{ $property->dynamicPricing($property->price) }}
            </span>
          </h3>
        </div>

        <div class="w-3/12 hidden md:block">
          <ul class="flex justify-end">
            <li>
              <a class="flex flex-col justify-center items-center mx-2 border-2 border-gray-200 p-3 hover:border-red-400 duration-200"
              href="#">
                <i class="fa fa-print mb-2"></i>
                <span class="text-md block">Print</span>
              </a>
            </li>
            <li>
              <a class="flex flex-col justify-center items-center mx-2 border-2 border-gray-200 p-3 hover:border-red-400 duration-200"
              href="#">
                <i class="fa fa-heart-o mb-2"></i>
                <span class="text-md block">Save</span>
              </a>
            </li>
            <li>
              <a class="flex flex-col justify-center items-center mx-2 border-2 border-gray-200 p-3 hover:border-red-400 duration-200"
              href="#">
                <i class="fa fa-share-alt mb-2"></i>
                <span class="text-md block">Share</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  {{-- Single Property Content --}}
  <div class="container my-14">
    <div class="flex flex-col md:flex-row justify-between md:mx-2">

      {{-- Left-Sided Content --}}
      <div class="w-full md:w-9/12 md:mx-2">
        <div id="slider" class="">
          @include('property.slider', $property->gallery)
        </div>

        {{-- Overview --}}
        @if ( $property->overview )
          <div class="flex flex-col md:flex-row justify-between items-center bg-white md:px-8 py-8 mt-10 shadow-sm">
            <h4 class="md:w-2/12 text-lg mb-5 md:mb-0 pb-3 md:pb-0 border-b-2 md:border-b-0 border-gray-300">Overview</h4>
            <div class="md:w-10/12 text-base text-center md:text-left md:pt-5 md:pl-5 md:ml-5 md:border-l-2 border-gray-300">
              <p>{{ $property->overview }}</p>
            </div>
          </div>
        @endif

        {{-- Property Featuers --}}
        <div class="flex flex-col md:flex-row md:justify-between items-center bg-white px-5 md:px-8 py-8 mt-10 shadow-sm">
          <h4 class="md:w-2/12 text-lg mb-5 md:mb-0 pb-3 md:pb-0 border-b-2 md:border-b-0 border-gray-300">Property Features</h4>
          <div class="w-full md:w-10/12 md:ml-2">
            <div class="flex flex-col md:flex-row md:justify-between text-base">
              <div class="flex-1 self-center w-full md:w-auto md:ml-3 md:pl-3 md:border-l-2 border-gray-300">
                <ul class="flex md:block flex-row md:flex-col flex-wrap justify-between items-center">
                  @if ( $property->main_feature )
                    <li class="flex-1 w-1/2 md:w-full text-sm my-2">
                      <div class="flex flex-wrap items-center">
                        {{-- <i class="fa fa-home mr-2 text-red-400 w-5 text-center"></i> --}}
                        <i data-feather="home" class="mr-2 text-red-400 w-5 text-center"></i>
                        <span class="text-sm">Type:</span>
                        <span class="ml-2 font-bold">{{ ucwords($property->main_feature) }}</span>
                      </div>
                    </li>
                  @endif
                  
                  @if ( $property->bedrooms )
                    <li class="flex-1 w-1/2 md:w-full text-sm my-2">
                      <div class="flex flex-wrap items-center">
                        {{-- <i class="fa fa-bed mr-2 text-red-400 w-5 text-center"></i> --}}
                        <i data-feather="home" class="mr-2 text-red-400 w-5 text-center"></i>
                        <span class="text-sm">Bedrooms:</span>
                        <span class="ml-2 font-bold">{{ $property->bedrooms }}</span>
                      </div>
                    </li>
                  @endif
                </ul>
              </div>

              <div class="flex-1 self-center w-full md:w-auto md:ml-3 md:pl-3 md:border-l-2 border-gray-300">
                <ul class="flex md:block flex-row md:flex-col flex-wrap justify-between items-center">
                  @if ( $property->bathrooms )
                    <li class="flex-1 w-1/2 md:w-full text-sm my-2">
                      <div class="flex flex-wrap items-center">
                        {{-- <i class="fa fa-shower mr-2 text-red-400 w-5 text-center"></i> --}}
                        <i data-feather="home" class="mr-2 text-red-400 w-5 text-center"></i>
                        <span class="text-sm">Bathrooms:</span>
                        <span class="ml-2 font-bold">{{ $property->bathrooms }}</span>
                      </div>
                    </li>
                  @endif
                  
                  <li class="flex-1 w-1/2 md:w-full text-sm my-2">
                    <div class="flex flex-wrap items-center">
                      {{-- <i class="fa fa-map-marker mr-2 text-red-400 w-5 text-center"></i> --}}
                      <i data-feather="home" class="mr-2 text-red-400 w-5 text-center"></i>
                      <span class="text-sm">Location:</span>
                      <span class="ml-2 font-bold">{{ ucwords($property->location->name) }}</span>
                    </div>
                  </li>
                </ul>
              </div>

              <div class="flex-1 self-center w-full md:w-auto md:ml-3 md:pl-3 md:border-l-2 border-gray-300">
                <ul class="flex md:block flex-row md:flex-col flex-wrap justify-between items-center">
                  @if ( $property->gross_smt )
                    <li class="flex-1 w-1/2 md:w-full text-sm my-2">
                      <div class="flex flex-wrap items-center">
                        {{-- <i class="fa fa-gratipay mr-2 text-red-400 w-5 text-center"></i> --}}
                        <i data-feather="home" class="mr-2 text-red-400 w-5 text-center"></i>
                        <span class="text-sm">Living space:</span>
                        <span class="ml-2 font-bold">
                          <span>{{ $property->gross_smt }}</span>
                          <sup>sqm</sup>
                        </span>
                      </div>
                    </li>
                  @endif
                  
                  @if ( $property->pool )
                    <li class="flex-1 w-1/2 md:w-full text-sm my-2">
                      <div class="flex flex-wrap items-center">
                        {{-- <i class="fa fa-low-vision mr-2 text-red-400 w-5 text-center"></i> --}}
                        <i data-feather="home" class="mr-2 text-red-400 w-5 text-center"></i>
                        <span class="text-sm">Pool:</span>
                        <span class="ml-2 font-bold">{{ ucwords($property->pool) }}</span>
                      </div>
                    </li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>

        {{-- Reason to buy --}}
        @if ( $property->why_buy )
          <div class="flex flex-col md:flex-row justify-between items-center bg-white px-5 md:px-8 py-8 mt-10 shadow-sm">
            <h4 class="md:w-2/12 text-lg mb-5 md:mb-0 pb-3 md:pb-0 border-b-2 md:border-b-0 border-gray-300">Why buy this Property</h4>
            <div class="md:w-10/12 text-base text-center md:text-left md:pt-5 md:pl-5 md:ml-5 md:border-l-2 border-gray-300">
              <p>{{ $property->why_buy }}</p>

              {{-- <ul>
                @foreach ( $property->why_buy as $why_buy )
                  <li>- <span class="ml-1">{{ $why_buy }}</span></li>
                @endforeach
              </ul> --}}
            </div>
          </div>
        @endif

        {{-- Description --}}
        @if ( $property->description )
          <div class="bg-white text-center md:text-right p-5 md:p-8 mt-10 shadow-sm" id="description">
            
            <p>{{ $property->description }}</p>

            {{-- <?php $description = $property->description; ?>
            @if ( $description['intro'] )
              <h2 class="font-bold uppercase mb-2">{{ $description['intro']['title'] }}</h2>
              @if ( $description['intro']['text'] )
                @foreach ( $description['intro']['text'] as $intro_text )
                  <p>{{ $intro_text }}</p>
                @endforeach
              @endif
            @endif
            
            @if ( $description['sub_intro'] )
              <h3 class="mb-2">{{ $description['sub_intro']['title'] }}</h3>
              @if ( $description['sub_intro']['text'] )
                @foreach ( $description['sub_intro']['text'] as $subIntro_text )
                  <p>{{ $subIntro_text }}</p>
                @endforeach
              @endif
            @endif
            
            @if ( $description['facilities'] )
              @foreach ( $description['facilities'] as $facility )
                <div class="pt-4">
                  <p><strong>{{ $facility['title'] }}</strong></p>

                  @if ( $facility['text'] )
                    @foreach ( $facility['text'] as $text )
                      <p>{{ $text }}</p>
                    @endforeach
                  @endif

                  @if ( $facility['lists'] )
                    @foreach ( $facility['lists'] as $list )
                      <p>-<span class="ml-1">{{ $list }}</span></p>
                    @endforeach
                  @endif

                  @if ( $facility['note'] )
                    <p>
                      <strong>NOTE</strong>:
                      <span class="ml-2">{{ $facility['note'] }}</span>
                    </p>
                  @endif
                </div>
              @endforeach
            @endif --}}
            
          </div>
        @endif
      </div>
      {{-- End Left Side Content --}}

      {{-- Right-Sidebar --}}
      <div class="w-full md:w-3/12 md:mx-2">
        <div class="border-2 border-red-800 px-5 py-3 text-center font-light text-base">
          <p>Subscribe to Property Listing for blogs/news/videos</p>
        </div>

        {{-- Property-Enquiry Form --}}
        <div class="px-4 py-5 text-left bg-gray-300 my-5">
          <h1 class="text-3xl font-normal text-center md:text-right leading-none mb-5">
            Enquire about this property
          </h1>

          <form action="{{ route('property.single.inquiry', $property) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="">
              <label class="inputLabel" for="name">
                Name
                <span class="text-red-800 font-serif">*</span>
              </label>
              <input type="text" name="name" id="name" class="inputField @error('name') is-invalid @enderror rounded" placeholder="Name" value="{{ old('name') }}" required />

              @if ( $errors->has('name') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('name') }}
                </div>
              @endif
            </div>

            <div class="mt-5">
              <label class="inputLabel" for="email">
                Email
                <span class="text-red-800 font-serif">*</span>
              </label>
              <input type="email" name="email" id="email" class="inputField @error('email') is-invalid @enderror rounded" placeholder="E-mail" value="{{ old('email') }}" required />

              @if ( $errors->has('email') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('email') }}
                </div>
              @endif
            </div>

            <div class="mt-5">
              <label class="inputLabel" for="phone">
                Phone
                <span class="text-red-800 font-serif">*</span>
              </label>
              <input type="text" name="phone" id="phone" class="inputField @error('phone') is-invalid @enderror rounded" placeholder="Phone" value="{{ old('phone') }}" required />

              @if ( $errors->has('phone') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('phone') }}
                </div>
              @endif
            </div>

            <div class="mt-5">
              <label class="inputLabel" for="message">
                Message
                <span class="text-red-800 font-serif">*</span>
              </label>
              <textarea name="message" id="message" class="inputField @error('message') is-invalid @enderror rounded" rows="4"
              placeholder="I'm interested in this property" required>{{ old('message') }}</textarea>

              @if ( $errors->has('message') )
                <div class="alert-validation -mt-1" role="alert">
                  {{ $errors->first('message') }}
                </div>
              @endif
            </div>

            <div class="mt-5">
              <button type="submit"
              class="w-full border-2 uppercase text-center py-3 font-semibold border-red-800 hover:bg-transparent hover:text-red-800 duration-200 text-white bg-red-800 rounded">
                <i class="fa fa-commenting mr-2"></i>
                Request Details
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>