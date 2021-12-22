<x-guest-layout>
  {{-- Breadcrumbs --}}
  <div class="bg-white shadow-md border-b-2 border-gray-300 py-2 mt-22">
    <div class="container mx-auto">
      <ul class="flex items-center">
        <li>
          <a class="text-xl text-red-800" href="{{ route('homepage') }}">
            Home
          </a>
        </li>

        <li class="mx-3"><i class="fa fa-angle-right"></i></li>

        <li>Pages</li>

        <li class="mx-3"><i class="fa fa-angle-right"></i></li>

        <li>{{ $page->title }}</li>
      </ul>
    </div>
  </div>

  {{-- Single Property Content --}}
  <div class="container my-14">
    <div class="flex flex-col justify-between mx-2 py-10">

      <p class="my-5">
        {{ $page->content }}
      </p>
      
      <p class="my-5">
        {{ $page->content }}
      </p>
      
    </div>
  </div>
</x-guest-layout>