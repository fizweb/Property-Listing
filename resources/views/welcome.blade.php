<x-guest-layout>
  <div class="welcome-page-wrapper">
    <div class="hero-area relative bg-cover bg-center pt-40 pb-48 z-10" style="background-image: url('{{ asset('assets/img/bg/hero-bg-1.jpg') }}')">
      <div class="overlay absolute w-full h-full left-0 top-0 bg-black opacity-50 z-10"></div>
      <div class="content container relative text-white text-2xl text-center z-20">
        <h2 class="text-6xl leading-tight mb-8">Lorem ipsum dolor sit amet, <br/>consectetur adipisicing necessitatibus.</h2>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt aliquid ipsum.</p>
      </div>
    </div>

    <div class="property-searches relative -mt-12 z-30">
      <div class="container">
        <form method="get" action="/" id="search-form" class="">
          <div class="grid grid-cols-5 bg-white py-5 rounded-xl shadow-lg">
            <div class="col-span-3 px-3">
              <div class="flex flex-wrap flex-auto">
                <div class="pl-6 pr-3 border-r-2 border-gray-400">
                  <select name="dealings_type" id="dealings_type" class="text-2xl font-bold border-0 py-0 pl-0">
                    <option value="">Buy or Rent</option>
                    <option value="buy">Buy</option>
                    <option value="rent">Rent</option>
                  </select>
                </div>
                
                <div class="pl-6 pr-3 border-r-2 border-gray-400">
                  <select name="property_type" id="property_type" class="w-28 text-2xl font-bold border-0 py-0 pl-0">
                    <option value="">Type</option>
                    <option value="apartment">Apartment</option>
                    <option value="land">Land</option>
                    <option value="villa">Villa</option>
                  </select>
                </div>

                <div class="pl-6 pr-3 border-r-2 border-gray-400">
                  <select name="property_price" id="property_price" class="w-28 text-2xl font-bold border-0 py-0 pl-0">
                    <option value="">Price</option>
                    <option value="1000-1200">1,000 - 1,200</option>
                    <option value="1200-1400">1,200 - 1,400</option>
                    <option value="1400-1600">1,400 - 1,600</option>
                  </select>
                </div>

                <div class="pl-6 pr-3">
                  <select name="bedrooms" id="bedrooms" class="w-44 text-2xl font-bold border-0 py-0 pl-0">
                    <option value="">Bedrooms</option>
                    <option value="3+">3 and more</option>
                    <option value="5+">5 and more</option>
                    <option value="7+">7 and more</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-span-2 text-right px-3">
              <div class="pr-5">
                <input type="text" name="search_by" id="search_by" class="w-2/3 text-xl rounded-xl border-gray-500 py-3 px-5 mr-5" placeholder="Try to search for something" />

                <button class="btn-base-bg-1 text-26 align-bottom py-3 px-6">Search</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="welcome-page-center text-center pt-32">
      <div class="container">
        <div class="block max-w-screen-md mx-auto">
          <h2 class="text-4xl mb-8">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis ipsam <span class="underline">beatae rerum</span>.
          </h2>
  
          <p class="text-2xl">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo culpa dolor.</p>

          {{-- <a href="/" class="review-btn text-xl border-2 border-initial rounded-xl mt-8 py-3 px-8">Start the review</a> --}}
          <a href="/" class="review-btn btn-base-1 mt-14">Start the review</a>
        </div>

        <div class="block pt-28">
          <h2 class="max-w-screen-md mx-auto text-4xl mb-14">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis ipsam beatae rerum.
          </h2>

          <div class="grid grid-cols-3 -mx-5 px-10">
            @for ( $x = 1; $x <= 6; $x++ )
              <div class="px-5 mb-8">
                <div class="mx-8">
                  <h4 class="text-2xl mb-3">Lorem ipsum sit amet.</h4>
                  <p class="text-lg opacity-90">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
              </div>
            @endfor
          </div>
        </div>

        <div class="block pt-28">
          <h3 class="section-title">
            More information about us
          </h3>
          
          <div class="video-wrapper mb-16">
            <a class="video-play mfp-iframe relative block w-full h-80 bg-cover bg-center text-white text-center leading-loose rounded-xl" 
            href="https://www.youtube.com/watch?v=fd8a-8ujfyc?autoplay=1" 
            style="background-image: url(https://img.youtube.com/vi/fd8a-8ujfyc/maxresdefault.jpg);">

            <div class="overlay absolute w-full h-full left-0 top-0 bg-black rounded-xl opacity-50 z-10"></div>
              <div class="table w-full h-full relative z-20">
                <div class="table-cell h-full align-middle">
                  <span class="icon w-32 h-32 text-center leading-loose pl-1 pt-2 border-8 border-initial text-5xl rounded-full">
                    <i class="fa fa-play"></i>
                  </span>
                  <span class="block text-2xl mt-3">Watch the video</span>
                </div>
              </div>
            </a>
          </div>

          <div class="text-2xl leading-normal">
            <p class="text mb-8">
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati corrupti asperiores maiores modi eius mollitia consequuntur dignissimos. Aperiam obcaecati, non minus provident quibusdam hic molestiae, ad veritatis, facere dolorum consequuntur recusandae facere corrupti! Quae, facilis suscipit? Repellat, ea reprehenderit quam.
            </p>

            <div class="flex my-14 -mx-8 px-20">
              <div class="flex-1 px-8">
                <div class="mb-3">
                  <span class="w-12 h-12 bg-base-1 rounded-full text-white text-3xl font-bold leading-relaxed">1</span>
                </div>
                <div class="font-bold text-lg">
                  Using <span class="underline">smart search</span>
                </div>
              </div>

              <div class="flex-1 px-8">
                <div class="mb-3">
                  <span class="w-12 h-12 bg-base-1 rounded-full text-white text-3xl font-bold leading-relaxed">2</span>
                </div>
                <div class="font-bold text-lg">
                  By <span class="underline">map</span> and districts of the city
                </div>
              </div>

              <div class="flex-1 px-8">
                <div class="mb-3">
                  <span class="w-12 h-12 bg-base-1 rounded-full text-white text-3xl font-bold leading-relaxed">3</span>
                </div>
                <div class="font-bold text-lg">
                  Using the advanced filter
                </div>
              </div>

              <div class="flex-1 px-8">
                <div class="mb-3">
                  <span class="w-12 h-12 bg-base-1 rounded-full text-white text-3xl font-bold leading-relaxed">4</span>
                </div>
                <div class="font-bold text-lg">
                  Selection of orders from our verified, licensed real state agents
                </div>
              </div>
            </div>

            <p class="text mb-8">
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati corrupti asperiores maiores modi eius mollitia consequuntur dignissimos. Aperiam obcaecati, non minus provident quibusdam hic molestiae, ad veritatis, facere dolorum consequuntur recusandae facere corrupti! Quae, facilis suscipit? Repellat, ea reprehenderit quam.
            </p>
          </div>
          
          <span class="h-32 w-0.5 bg-gray-400 mb-8"></span>

          <div class="flex -mx-10 mb-20">
            <div class="flex-1 px-10 pt-5 pr-16 text-2xl text-left leading-normal">
              <p class="text mb-8">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio id assumenda pariatur suscipit enim deserunt ad deleniti facilis consectetur, voluptate <span class="font-bold">excepturi aut quia labore ipsam a doloribus at quam</span> repellat libero neque consequuntur perspiciatis incidunt. Cumque <span class="font-bold">assumenda architecto tempore</span>, nisi maxime esse velit consectetur ipsa laboriosam distinct numquam nulla accusantium corrupti magnam tempo asperiores laborum aliquid, quaerat?
              </p>
            </div>

            <div class="flex-1 px-10">
              <div class="relative w-full h-full">
                <span class="absolute w-3/5 h-80 -left-2 -bottom-2 bg-transparent border-2 border-gray-500 rounded-tl-lg rounded-br-lg rounded-bl-100 rounded-tr-100 z-10">
                </span>
                <span class="absolute w-3/5 h-80 left-0 bottom-0 bg-cover bg-center rounded-tl-lg rounded-br-lg rounded-bl-100 rounded-tr-100 z-20"
                style="background-image: url('{{ asset('assets/img/bg/sample-img.jpg') }}')">
                </span>

                <span class="absolute w-3/5 h-80 -right-10 top-0 bg-cover bg-center rounded-tl-lg rounded-br-lg rounded-bl-100 rounded-tr-100 transform rotate-6 z-10"
                style="background-image: url('{{ asset('assets/img/bg/sample-img.jpg') }}')">
                </span>
              </div>
            </div>
          </div>

          {{-- CTA-Buttons --}}
          <div class="flex justify-center items-center">
            <a href="/" class="btn-base-bg-1 text-26 not-hover">
              <span class="block my-1 mx-3">Start searching with filters</span>
            </a>

            <span class="text-4xl font-bold px-14">or</span>

            <a href="/" class="btn-base-1 text-26">
              <span class="block my-1 mx-3">Start searching on the map</span>
            </a>
          </div>
        </div>
        
        {{-- Latest Property Section --}}
        <div class="block pt-28">
          <section class="latest-properties">
            <h2 class="section-title">Last added property</h2>
            <div class="section-content flex -mx-2">

              @if ( $properties )
                @foreach ( $properties as $property )
                  <div class="flex-1 px-2">
                    <div class="bg-white shadow-md rounded-tl-lg rounded-tr-lg">
                      <?php 
                        $featured_image = $property->featured_image ?? 'https://via.placeholder.com/480x380';
                      ?>
                      <div class="bg-img h-52 bg-cover bg-center rounded-tl-lg rounded-tr-lg"
                      style="background-image: url('{{ $featured_image }}')"></div>

                      <div class="box-content text-left p-4">
                        <h3 class="text-2xl font-base-1 font-medium mb-3">
                          {{ $property->title }}
                        </h3>
                        <div class="text-3xl font-bold uppercase mb-5">
                          aed <span class="ml-1">{{ $property->price }}</span>
                        </div>
                        <div class="item-meta mb-2">
                          @if ( $property->bedrooms )
                            <span class="text-gray-400 text-base leading-7 border-2 border-gray-100 rounded-2xl mr-1 mb-2 px-2">
                              <i class="fa fa-home mr-1"></i>
                              {{ $property->bedrooms }} Bedrooms
                            </span>
                          @endif

                          @if ( $property->bathrooms )
                            <span class="text-gray-400 text-base leading-7 border-2 border-gray-100 rounded-2xl mr-1 mb-2 px-2">
                              <i class="fa fa-home mr-1"></i>
                              {{ $property->bathrooms }} Bathrooms
                            </span>
                          @endif

                          @if ( $property->sft )
                            <span class="text-gray-400 text-base leading-7 border-2 border-gray-100 rounded-2xl mr-1 mb-2 px-2">
                              <i class="fa fa-home mr-1"></i>
                              {{ $property->sft }}
                              <span>ft<sup class="align-middle">2</sup></span>
                            </span>
                          @endif
                        </div>
                        <a href="{{ route('property.single.show', $property) }}" class="full-width-btn">More details</a>
                      </div>
                    </div>
                  </div>
                @endforeach
              @endif

            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>