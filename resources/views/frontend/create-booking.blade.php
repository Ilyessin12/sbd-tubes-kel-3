<x-layout>
  <x-slot:heading>
    Memboking
  </x-slot:heading>

  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <form method="POST" action="/booking">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Insert something</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Insert more things</p>
                
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="nama">Nama</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="nama" id="nama" required />

                            <x-form-error name="nama" />
                        </div>
                    </x-form-field>        
                    <br>
                    <x-form-field>
                        <x-form-label for="idk">Idk</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="idk" id="idk" required />

                            <x-form-error name="idk" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Book</button>
        </div>
    </form>
  </div>
</x-layout>