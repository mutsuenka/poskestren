<x-admin-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Log Visit') }}
        </h2>
    </x-slot:header>

    <div class="flex p-2 gap-4 justify-start">
        <div class="bg-teal-100 p-7 h-1/4 space-y-3 rounded-md w-1/6 shadow-md">
            <div class="font-semibold text-lg text-left mb-5">
                Total Pasien Tahun {{ $year }}
            </div>
            <div class="font-extrabold text-5xl text-right">
                {{ $totalPerTahun }}
            </div>
        </div>
        <div class="bg-teal-100 p-7 h-1/4 space-y-3 rounded-md w-1/6 shadow-md">
            <div class="font-semibold text-lg text-left mb-5">
                Total Pasien Bulan {{ $month }}
            </div>
            <div class="font-extrabold text-5xl text-right">
                {{ $totalPerBulan}}
            </div>
        </div>
    </div>

    @include('visit.log-visit')

</x-admin-layout>
