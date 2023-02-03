<x-admin-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Daftar Pasien') }}
        </h2>
    </x-slot:header>

    @include('visit.table')

</x-admin-layout>
