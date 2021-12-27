<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between items-center">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add New Property') }}
      </h2>

      <div class="min-w-max">
        <a href="{{ route('admin.property.index') }}" class="w-full bg-gray-800 text-white text-base py-2 px-5 rounded">
          Back
        </a>
      </div>
    </div>
  </x-slot>

  <div class="pt-6 pb-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <div class="add-property-area">
            <form action="" method="POST" class="property-form new">
              @csrf

              <div class="flex flex-wrap justify-between items-center -mx-5">

                <div class="w-2/4 px-5 mb-7">
                  <label for="" class="input-label"><span>Title</span></label>
                  <input type="text" name="title" class="input-field" placeholder="" value="{{ old('title') }}" />
                </div>

                <div class="w-2/4 px-5 mb-7">
                  <label for="" class="input-label"><span>Title</span></label>
                  <input type="text" name="title" class="input-field" placeholder="" value="" />
                </div>

                <div class="w-2/4 px-5 mb-7">
                  <label for="" class="input-label"><span>Title</span></label>
                  <input type="text" name="title" class="input-field" placeholder="" value="" />
                </div>

                <div class="w-2/4 px-5 mb-7">
                  <label for="" class="input-label"><span>Title</span></label>
                  <input type="text" name="title" class="input-field" placeholder="" value="" />
                </div>

              </div>

            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
