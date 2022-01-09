<header id="Site-Header" class="site-header">
  <div class="navbar fixed top-0 {{ request()->is('/') ? 'home' : 'bg-base-1' }} w-full flex justify-between items-center bg-transparent text-white py-5 px-3 md:px-10 z-50">
    <a href="/" class="left logo min-w-max mr-auto md:mr-0">
      <img width="100" src="{{ asset('assets/img/logo/logo-white.png') }}" alt="White Logo" class="site-logo white xs:w-20" />
      {{-- <h2 class="font-bold text-2xl">Brand Logo</h2> --}}
    </a>

    <div id="navbar-menu" class="w-full hidden md:block bg-gray-200 md:bg-transparent absolute md:relative left-0 top-20 md:top-0 -mt-2 md:-mt-0">
      <ul class="navbar-nav md:flex justify-center py-5 md:py-0">
        <li>
          <a href="{{ route('property.all.index') }}/?property_type=land" class="link block md:inline-block color-base-1 md:text-white px-8 md:px-3 py-3">{{ __('Land') }}</a>
        </li>
        <li>
          <a href="{{ route('property.all.index') }}/?property_type=villa" class="link block md:inline-block color-base-1 md:text-white px-8 md:px-3 py-3">{{ __('Villa') }}</a>
        </li>
        <li>
          <a href="{{ route('property.all.index') }}/?property_type=apartment" class="link block md:inline-block color-base-1 md:text-white px-8 md:px-3 py-3">{{ __('Apartment') }}</a>
        </li>
        
        <?php $pages = \App\Models\Page::get()->all(); ?>
        @foreach ( $pages as $page )
          <li>
            <a href="{{ route('page.single', $page->slug) }}" class="link block md:inline-block color-base-1 md:text-white px-8 md:px-3 py-3">
              {{ __(ucwords($page->title)) }}
            </a>
          </li>
        @endforeach

        {{-- <li><a href="{{ route('page.single', 'about-us') }}" class="link block md:inline-block color-base-1 md:text-white px-8 md:px-3 py-3">{{ __('About Us') }}</a></li>
        <li><a href="{{ route('page.single', 'contact-us') }}" class="link block md:inline-block color-base-1 md:text-white px-8 md:px-3 py-3">{{ __('Contact Us') }}</a></li> --}}
      </ul>
    </div>

    <?php 
      $currencyCode = request()->cookie('currency', 'bdt');
      //$currencyCode = \Illuminate\Support\Facades\Cookie::get('currency', 'bdt');
    ?>
    <div class="right currency min-w-max mr-6 md:mr-0">
      <a href="{{ route('currency.change', 'bdt') }}" class="link {{$currencyCode == 'bdt' ? 'text-yellow-400' : 'text-white'}} text-sm">
        BDT
      </a>
      <a href="{{ route('currency.change', 'usd') }}" class="link {{$currencyCode == 'usd' ? 'text-yellow-400' : 'text-white'}} text-sm ml-2">
        USD
      </a>
    </div>

    <div class="right translate-flags min-w-max md:ml-10 mr-6 md:mr-0">
      <a href="{{ LaravelLocalization::getLocalizedURL('bn') }}" class="flag mr-1">
        <img src="https://flagcdn.com/w20/bd.png" srcset="https://flagcdn.com/w40/bd.png 2x"
        width="20" alt="Bangladesh" />
      </a>
      <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="flag">
        {{-- <img src="https://flagcdn.com/w20/tr.png" srcset="https://flagcdn.com/w40/tr.png 2x" width="20" alt="Turkey" /> --}}
        <img src="https://flagcdn.com/w20/us.png" srcset="https://flagcdn.com/w40/us.png 2x"
        width="20" alt="United States" />
      </a>
    </div>

    <div id="menu-hamburger" class="inline-block md:hidden leading-none cursor-pointer px-1">
      <i class="menu-icon" data-feather="menu"></i>
      <span class="menu-close hidden">
        <i class="" data-feather="x"></i>
      </span>
    </div>
  </div>
</header>