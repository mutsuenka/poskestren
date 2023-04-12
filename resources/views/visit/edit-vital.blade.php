<x-admin-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl-text-gray-800">
            {{ __('Catat Vital Sign Pasien')}}
        </h2>
    </x-slot:header>

    <div class="py-2">
        <div class="md:flex justify-center gap-3 space-y-3 md:space-y-0">
            <div class="p-5 bg-teal-200 rounded-md mb-5 md:mb-0">
                @include('visit.info-pasien')
            </div>
            <div class="p-5 bg-teal-300 rounded-md">
                @include('visit.field-vital')
            </div>
        </div>
    </div>
</x-admin-layout>
