<x-admin-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Antrian Farmasi – ' . $today) }}
        </h2>
    </x-slot:header>

    @include('visit.antri-obat')

</x-admin-layout>
