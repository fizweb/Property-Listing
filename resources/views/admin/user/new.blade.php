<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center -mx-6">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add New User') }}
      </h2>

      <div class="min-w-max">
        <a href="{{ route('dashboard-user.index') }}" class="w-full btn btn-gray">
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
      <div class="add-user-area bg-white p-6 border-b border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
        <form action="{{ route('dashboard-user.store') }}" method="POST"
          class="user-form new w-full" enctype="multipart/form-data">
          @csrf
          <div class="flex flex-wrap justify-between items-center">

            {{-- Name --}}
            <div class="w-2/4 px-5 sm:px-6 mb-7">
              <label for="name" class="required input-label-full">
                <span>Full Name</span>
              </label>

              <input type="text" name="name" id="name" class="required input-field-full @error('name') is-invalid @enderror" placeholder="Write user name here" required value="{{old('name')}}" />

              @if ( $errors->has('name') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('name') }}
                </div>
              @endif
            </div>

            {{-- Email --}}
            <div class="w-2/4 px-5 sm:px-6 mb-7 self-start">
              <label for="email" class="required input-label-full">
                <span>Email</span>
              </label>

              <input type="email" name="email" id="email" class="required input-field-full @error('email') is-invalid @enderror" placeholder="email@example.com" required value="{{old('email')}}" />

              @if ( $errors->has('email') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('email') }}
                </div>
              @endif
            </div>

            {{-- Password --}}
            <div class="w-2/4 px-5 sm:px-6 mb-7 self-start">
              <label for="password" class="required input-label-full">
                <span>Password</span>
              </label>

              <input type="password" name="password" id="password" class="required input-field-full @error('password') is-invalid @enderror" required placeholder="Type secure password" />

              @if ( $errors->has('password') )
                <div class="alert-validation" role="alert">
                  {{ $errors->first('password') }}
                </div>
              @endif
            </div>

            {{-- Confirm-Password --}}
            <div class="w-2/4 px-5 sm:px-6 mb-7 self-start">
              <label for="password_confirmation" class="required input-label-full">
                <span>Confirm Password</span>
              </label>

              <input type="password" name="password_confirmation" id="password_confirmation" class="required input-field-full" required placeholder="Retype password" />
            </div>
            

            {{-- Submit --}}
            <div class="w-full px-5 sm:px-6 mb-7 mt-7 text-center">
              <button type="submit" class="btn btn-indigo">Save User</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>

