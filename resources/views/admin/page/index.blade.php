<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center -mx-6">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Pages') }}
      </h2>

      <div class="min-w-max">
        <a href="{{ route('dashboard-page.create') }}" class="w-full btn btn-indigo">
          Add New Page
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
      <div class="bg-white p-6 border-b border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
          
        @if ( $pages )
          {{-- paginate links --}}
          <div class="pagination-links {{ $pages->total() > 10 ? 'mb-5' : '' }}">
            {{ $pages->withQueryString()->links() }}
          </div>

          <table class="table-auto w-full">
            <thead class="table-header">
              <tr class="align-middle text-center bg-gray-800 text-white">
                <th class="border p-2 font-normal serial">#</th>
                <th class="border p-2 font-normal title">Title</th>
                <th class="border p-2 font-normal slug">Slug</th>
                <th class="border p-2 font-normal w-40 actions">- - -</th>
              </tr>
            </thead>

            @php
              $serial = $pages->currentPage() == 1 ? 1 : ((($pages->currentPage() - 1) * 10) + 1);
            @endphp

            <tbody class="table-body">
              @foreach ( $pages as $index => $page )
                <tr class="align-middle {{ ($index+1) % 2 == 0 ? 'bg-gray-100' : '' }}">
                  <td class="border p-2 text-center serial">
                    {{ $serial++ }}
                  </td>

                  <td class="border p-2 title">
                    {{ ucwords($page->title) }}
                  </td>

                  <td class="border p-2 slug">
                    {{ $page->slug }}
                  </td>

                  <td class="border p-2 text-center text-sm w-40 actions">
                    <a href="{{ route('page.single', $page->slug) }}" target="blank"
                      class="btn-blue py-1 px-2 rounded-sm">
                      <i class="fa fa-eye"></i>
                    </a>

                    <a href="{{ route('dashboard-page.edit', $page->id) }}" class="btn-green py-1 px-2 rounded-sm ml-1">
                      <i class="fa fa-pencil"></i>
                    </a>

                    {{-- <a href="{{ route('dashboard-page.destroy', $page->id) }}" 
                      onclick="return confirm('Are you sure to delete this page?');"
                      class="btn-red py-1 px-2 rounded-sm ml-1">
                      <i class="fa fa-trash"></i>
                    </a> --}}

                    <form action="{{ route('dashboard-page.destroy', $page->id) }}"   
                      method="POST" class="inline-block">
                      @csrf @method('DELETE')
                      <button type="submit" class="btn-red py-1 px-2 rounded-sm ml-1"
                        onclick="return confirm('Are you sure to delete this page?');">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          {{-- paginate links --}}
          <div class="pagination-links {{ $pages->total() > 10 ? 'mt-5' : '' }}">
            {{ $pages->withQueryString()->links() }}
          </div>
        @else
          <div class="text-red-800 text-3xl text-center py-52">
            NO Properties Found
          </div>
        @endif

      </div>
    </div>
  </div>
</x-app-layout>
