<x-admin-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl-text-gray-800">
            {{ __('Catat Pemeriksaan Pasien')}}
        </h2>
    </x-slot:header>

    <div class="flex gap-2 justify-center max-w-full">
        <div class="">
            @include('visit.field-visit')
        </div>
    </div>
</x-admin-layout>
