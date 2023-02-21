<x-admin-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Antrian Pasien – ' . $today) }}
        </h2>
    </x-slot:header>

    @include('visit.antrian')

</x-admin-layout>
