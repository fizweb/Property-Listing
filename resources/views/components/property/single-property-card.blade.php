<div class="{{ $width }} px-2 mb-8">
  <div class="bg-white shadow-md rounded-tl-lg rounded-tr-lg">
    <?php 
      $featured_media = $property->featured_media ?? 'https://via.placeholder.com/480x380';
    ?>
    <div class="bg-img h-52 rounded-bl-none rounded-br-none"
    style="background-image: url('{{ asset($featured_media) }}')"></div>

    <div class="box-content text-left p-4">
      <h3 class="text-2xl font-base-1 font-medium mb-3">
        {{ $property->title }}
      </h3>
      <div class="text-3xl font-bold uppercase mb-5">
        <span class="">{{ $property->dynamicPricing($property->price) }}</span>
      </div>
      <div class="item-meta mb-2">
        @if ( $property->bedrooms )
          <span class="text-gray-400 text-base leading-7 border-2 border-gray-100 rounded-2xl mr-1 mb-2 px-2">
            <span class="icon">
              {{-- <i class="fa fa-home mr-1"></i> --}}
              <i class="w-4 h-4 mr-1 mb-1.5" data-feather="home"></i>
            </span>
            {{ __($property->bedrooms) }} {{ __('Bedrooms') }}
          </span>
        @endif

        @if ( $property->bathrooms )
          <span class="text-gray-400 text-base leading-7 border-2 border-gray-100 rounded-2xl mr-1 mb-2 px-2">
            <span class="icon">
              {{-- <i class="fa fa-home mr-1"></i> --}}
              <i class="w-4 h-4 mr-1 mb-1.5" data-feather="home"></i>
            </span>
            {{ __($property->bathrooms) }} {{ __('Bathrooms') }}
          </span>
        @endif

        @if ( $property->gross_smt )
          <span class="text-gray-400 text-base leading-7 border-2 border-gray-100 rounded-2xl mr-1 mb-2 px-2">
            <span class="icon">
              {{-- <i class="fa fa-home mr-1"></i> --}}
              <i class="w-4 h-4 mr-1 mb-1.5" data-feather="home"></i>
            </span>
            {{ __($property->gross_smt) }}
            <span>mt<sup class="align-middle">2</sup></span>
          </span>
        @endif
      </div>
      <a href="{{ route('property.single.show', $property) }}" class="full-width-btn">{{ __('More details') }}</a>
    </div>
  </div>
</div>