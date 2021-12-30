<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center -mx-6">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Page') }}
      </h2>

      <div class="min-w-max">
        <a href="{{ route('dashboard-page.create') }}" class="btn btn-indigo">
          Add Page
        </a>

        <a href="{{ route('dashboard-page.index') }}" class="btn btn-gray ml-1">
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
      <div class="edit-page-area bg-white p-6 border-b border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
        <form action="{{ route('dashboard-page.update', $page->id) }}" method="POST"
          class="page-form edit w-full" enctype="multipart/form-data">
          @csrf @method('PUT')
          <div class="flex flex-wrap justify-between items-center">

            {{-- Title --}}
            <div class="w-full px-5 sm:px-6 mb-7">
              <label for="title" class="required input-label-full">
                <span>Page Title</span>
              </label>

              <input type="text" name="title" id="title" class="required input-field-full @error('title') is-invalid @enderror" required value="{{ $page->title }}" />

              @if ( $errors->has('title') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('title') }}
                </div>
              @endif
            </div>

            {{-- Content --}}
            <div class="w-full px-5 sm:px-6 mb-7 self-start">
              <label for="content" class="required input-label-full">
                <span>Page Content</span>
              </label>

              <textarea name="content" id="content" class="required text-field-full @error('content') is-invalid @enderror" cols="30" rows="12" required>{{ $page->content }}</textarea>

              @if ( $errors->has('content') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('content') }}
                </div>
              @endif
            </div>
            

            {{-- Submit --}}
            <div class="w-full px-5 sm:px-6 mb-7 mt-7 text-center">
              <button type="submit" class="btn btn-green">Update Page</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>

