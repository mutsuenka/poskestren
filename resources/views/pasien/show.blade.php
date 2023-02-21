<x-admin-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Data Pasien') }}
        </h2>
    </x-slot:header>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="md:max-w-3xl sm:max-w-xl">
                    @include('pasien.field-show')
                </div>
            </div>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg"> --}}
                {{-- <div class="md: max-w-4xl sm:max-w-xl"> --}}
                    @include('visit.table')
                {{-- </div> --}}
            {{-- </div> --}}
        </div>
    </div>

</x-admin-layout>
