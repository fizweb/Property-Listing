<x-guest-layout>
  {{-- Breadcrumbs --}}
  <div class="bg-white shadow-md border-b-2 border-gray-300 py-2 mt-22">
    <div class="container mx-auto">
      <ul class="flex items-center">
        <li>
          <a class="text-3xl text-red-800" href="{{ url('/') }}">
            <i class="fa fa-home"></i>
          </a>
        </li>

        <li class="mx-3">
          <i class="fa fa-angle-right"></i>
        </li>

        <li>
          <a class="text-base text-red-800" href="#">Property</a>
        </li>

        <li class="mx-3">
          <i class="fa fa-angle-right"></i>
        </li>

        <li>Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
      </ul>
    </div>
  </div>

  {{-- Title & Share --}}
  <div class="bg-white py-8">
    <div class="container mx-auto">
      <div class="flex justify-between">
        <div class="w-8/12">
          <h2 class="text-3xl text-gray-600">
            {{ $property->title }}
          </h2>

          <h3 class="text-lg mt-2">
            Price:
            <span class="text-red-800">
              TL {{ $property->price ? number_format( $property->price, 0, '.', ',' ) : '5,000,000' }}
            </span>
          </h3>
        </div>

        <div class="w-3/12">
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
    <div class="flex justify-between mx-2">

      {{-- Left-Sided Content --}}
      <div class="w-9/12 mx-2">
        <div id="slider" class="">
          @include('property.slider', $property->gallery)
        </div>

        {{-- Overview --}}
        @if ( $property->overview )
          <div class="flex justify-between items-center bg-white p-8 mt-10 shadow-sm">
            <h4 class="text-lg w-2/12">Overview</h4>
            <div class="border-l-2 border-gray-300 pl-5 ml-5 w-10/12 text-base">
              <p>{{ $property->overview }}</p>
            </div>
          </div>
        @endif

        {{-- Property Featuers --}}
        <div class="flex justify-between items-center bg-white p-8 mt-10 shadow-sm">
          <h4 class="text-lg w-2/12">Property Features</h4>
          <div class="ml-2 w-10/12 text-base flex justify-between">
            <div class="flex-1 border-l-2 border-gray-300 ml-3 pl-3 self-center">
              <ul>
                @if ( $property->feature_type )
                  <li class="flex flex-wrap items-center text-sm my-2">
                    <i class="fa fa-home mr-2 text-red-400 w-5 text-center"></i>
                    <span class="text-sm">Type:</span>
                    <span class="ml-2 font-bold">{{ ucwords($property->feature_type) }}</span>
                  </li>
                @endif
                
                @if ( $property->bedrooms )
                  <li class="flex flex-wrap items-center text-sm my-2">
                    <i class="fa fa-bed mr-2 text-red-400 w-5 text-center"></i>
                    <span class="text-sm">Bedrooms:</span>
                    <span class="ml-2 font-bold">{{ $property->bedrooms }}</span>
                  </li>
                @endif
              </ul>
            </div>

            <div class="flex-1 border-l-2 border-gray-300 ml-3 pl-3 self-center">
              <ul>
                @if ( $property->bathrooms )
                  <li class="flex flex-wrap items-center text-sm my-2">
                    <i class="fa fa-shower mr-2 text-red-400 w-5 text-center"></i>
                    <span class="text-sm">Bathrooms:</span>
                    <span class="ml-2 font-bold">{{ $property->bathrooms }}</span>
                  </li>
                @endif
                
                @if ( $property->location )
                  <li class="flex flex-wrap items-center text-sm my-2">
                    <i class="fa fa-map-marker mr-2 text-red-400 w-5 text-center"></i>
                    <span class="text-sm">Location:</span>
                    <span class="ml-2 font-bold">{{ ucwords($property->location->name) }}</span>
                  </li>
                @endif
              </ul>
            </div>

            <div class="flex-1 border-l-2 border-gray-300 ml-3 pl-3 self-center">
              <ul>
                @if ( $property->gross_smt )
                  <li class="flex flex-wrap items-center text-sm my-2">
                    <i class="fa fa-gratipay mr-2 text-red-400 w-5 text-center"></i>
                    <span class="text-sm">Living space sqm:</span>
                    <span class="ml-2 font-bold">{{ $property->gross_smt }}</span>
                  </li>
                @endif
                
                @if ( $property->pool )
                  <li class="flex flex-wrap items-center text-sm my-2">
                    <i class="fa fa-low-vision mr-2 text-red-400 w-5 text-center"></i>
                    <span class="text-sm">Pool</span>
                    <span class="ml-2 font-bold">{{ ucwords($property->pool) }}</span>
                  </li>
                @endif
              </ul>
            </div>
          </div>
        </div>

        {{-- Reason to buy --}}
        @if ( $property->why_buy )
          <div class="flex justify-between items-center bg-white p-8 mt-10 shadow-sm">
            <h4 class="text-lg w-2/12">Why buy this Property</h4>
            <div class="border-l-2 border-gray-300 pl-5 ml-5 w-10/12 text-base">
              <ul>
                @foreach ( $property->why_buy as $why_buy )
                  <li>- <span class="ml-1">{{ $why_buy }}</span></li>
                @endforeach
              </ul>
            </div>
          </div>
        @endif

        {{-- Description --}}
        @if ( $property->description )
          <div class="bg-white p-8 mt-10 shadow-sm" id="description">
            <?php $description = $property->description; ?>
            
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
            @endif
            
          </div>
        @endif
      </div>
      {{-- End Left Side Content --}}

      {{-- Right-Sidebar --}}
      <div class="w-3/12 mx-2">
        <div class="border-2 border-red-800 px-5 py-3 text-center font-light text-base">
          <p>Subscribe to Property Listing for blogs/news/videos</p>
        </div>

        {{-- Property-Enquiry Form --}}
        <div class="px-4 py-5 text-left bg-gray-300 my-5">
          <h1 class="text-3xl font-normal leading-none mb-5">
            Enquire about this property
          </h1>

          <form action="#" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="">
              <label class="inputLabel" for="name">
                Name
                <span class="text-red-800 font-serif">*</span>
              </label>
              <input class="inputField" type="text" id="name" name="name" placeholder="First Name" />
            </div>

            <div class="mt-5">
              <label class="inputLabel" for="phone">
                Phone
                <span class="text-red-800 font-serif">*</span>
              </label>
              <input class="inputField" type="text" id="phone" name="phone" placeholder="Phone" />
            </div>

            <div class="mt-5">
              <label class="inputLabel" for="email">
                Email
                <span class="text-red-800 font-serif">*</span>
              </label>
              <input class="inputField" type="email" id="email" name="email" placeholder="E-mail" />
            </div>

            <div class="mt-5">
              <label class="inputLabel" for="message">
                Message
                <span class="text-red-800 font-serif">*</span>
              </label>
              <textarea class="inputField" id="message" name="message" rows="4"
              placeholder="I'm interested in this property"></textarea>
            </div>

            <div class="mt-5">
              <button type="submit"
              class="w-full border-2 uppercase text-center py-3 font-semibold border-red-800 hover:bg-transparent hover:text-red-800 duration-200  text-white bg-red-800 rounded-none">
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