<header id="Site-Header" class="site-header">
  <div class="navbar fixed top-0 {{ request()->is('/') ? 'home' : 'bg-base-1' }} w-full flex justify-between items-center bg-transparent text-white py-5 px-10 z-50">
    <a href="/" class="left logo min-w-max">
      <img width="100" src="{{ asset('assets/img/logo/logo-white.png') }}" alt="White Logo" class="site-logo white" />
      {{-- <h2 class="font-bold text-2xl">Brand Logo</h2> --}}
    </a>

    <div class="w-full">
      <ul class="navbar-nav flex justify-center">
        <li>
          <a href="{{ route('property.all.index') }}/?property_type=land" class="link text-white p-3">{{ __('Land') }}</a>
        </li>
        <li>
          <a href="{{ route('property.all.index') }}/?property_type=villa" class="link text-white p-3">{{ __('Villa') }}</a>
        </li>
        <li>
          <a href="{{ route('property.all.index') }}/?property_type=apartment" class="link text-white p-3">{{ __('Apartment') }}</a>
        </li>
        <li><a href="{{ route('page.single', 'about-us') }}" class="link text-white p-3">{{ __('About Us') }}</a></li>
        <li><a href="{{ route('page.single', 'contact-us') }}" class="link text-white p-3">{{ __('Contact Us') }}</a></li>
      </ul>
    </div>

    <div class="right translate-flags min-w-max">
      <a href="{{ LaravelLocalization::getLocalizedURL('bn') }}" class="flag mr-1">
        <img src="https://flagcdn.com/w20/bd.png" srcset="https://flagcdn.com/w40/bd.png 2x"
        width="20" alt="Bangladesh" />
      </a>
      <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="flag">
        <img src="https://flagcdn.com/w20/us.png" srcset="https://flagcdn.com/w40/us.png 2x"
        width="20" alt="United States" />
        {{-- <img src="https://flagcdn.com/w20/tr.png" srcset="https://flagcdn.com/w40/tr.png 2x"
        width="20" alt="Turkey" /> --}}
      </a>
    </div>
  </div>
  
</header>