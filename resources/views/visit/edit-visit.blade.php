<x-admin-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl-text-gray-800">
            {{ __('Catat Pemeriksaan Pasien – ' . $visit->pasien->no_rekam_medis )}}
        </h2>
    </x-slot:header>

    @include('visit.field-visit')
</x-admin-layout>
