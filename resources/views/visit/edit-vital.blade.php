<x-admin-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl-text-gray-800">
            {{ __('Catat Data Vital Pasien')}}
        </h2>
    </x-slot:header>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-teal-50 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('visit.info-pasien')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-teal-50 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('visit.field-vital')
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
