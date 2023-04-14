<x-admin-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Antrian Pasien – ' . $today) }}
        </h2>
    </x-slot:header>

    <div class="flex p-2 gap-4 justify-start">
        <div class="bg-teal-100 p-7 h-1/4 space-y-3 rounded-md w-1/3 xl:w-1/6 shadow-md">
            <div class="font-semibold text-lg text-left">
                Total Pasien:
            </div>
            <div class="font-bold text-2xl text-right">
                {{ $totalPasien . ' Pasien' }}
            </div>
        </div>
        <div class="bg-teal-100 p-7 h-1/4 space-y-3 rounded-md w-1/3 xl:w-1/6 shadow-md">
            <div class="font-semibold text-lg text-left">
                Antrian Selesai:
            </div>
            <div class="font-bold text-2xl text-right">
                {{ $totalPasienSelesai . ' Pasien'}}
            </div>
        </div>
        <div class="bg-teal-100 p-7 h-1/4 space-y-3 rounded-md w-1/3 xl:w-1/6 shadow-md">
            <div class="font-semibold text-lg text-left">
                Sisa Antrian
            </div>
            <div class="font-bold text-2xl text-right">
                {{ $totalPasien - $totalPasienSelesai . ' Pasien'}}
            </div>
        </div>
    </div>

    @include('visit.antrian')

</x-admin-layout>
