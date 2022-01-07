<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  {{-- Styles --}}
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @yield('custom-style')

</head>
<body>

  <div id="APP" class="font-sans bg-gray-100 antialiased min-h-screen">

    {{-- Site-Header --}}
    @include('layouts.includes.header')

    {{-- Site-Content --}}
    <main class="main-content">
      {{ $slot }}
    </main>

    {{-- Site-Footer --}}
    @include('layouts.includes.footer')

    
    {{-- Mouse Scroll-To-Top --}}
    <div id="scroll-top" class="hidden fixed w-12 h-12 right-0 bottom-0 bg-red-600 text-white text-3xl text-center leading-normal rounded-full mr-5 mb-5 cursor-pointer transition-all">
      <span>
        {{-- <i class="fa fa-angle-up"></i> --}}
        <i class="mb-2" data-feather="chevron-up"></i>
      </span>
    </div>
  </div>


  {{-- Scripts --}}
  {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
  <script src="{{ asset('js/app.js') }}"></script>

  @yield('custom-script')

</body>
</html>
