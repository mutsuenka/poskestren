<div class="flex justify-center align-middle gap-4 justify-items-center">
    <div class="flex w-[40%] bg-gray-100 rounded-md p-4 place-content-center">
        <form method="post" action="{{ route('visit.store') }}" class="space-y-4">
            @csrf
            <p class="text-md">Pasien sudah ada? Pilih Pasien:</p>
            <select name="pasien_id" id="pasien_id" class="select2 left-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block">
                @foreach ($pasiens as $pasien)
                    <option value="{{ $pasien->id }}">{{ $pasien->nama_lengkap }} </option>
                @endforeach
            </select>
            <x-input-error class="" :messages="$errors->get('pasien_id')" />
            <div>
                <x-primary-button>{{ __('Tambahkan Antrian') }}</x-primary-button>
            </div>
        </form>
    </div>
    <div class="flex w-[45%] bg-gray-100 rounded-md place-content-center place-items-center p-4">
        <div class="space-y-8">
            <p class="text-center text-md mb-4">Pasien belum ada?</p>
            <div class="mt-4 place-self-center" >
                <a href="{{ route('pasien.create') }}" class="bg-teal-700 text-md hover:bg-teal-600 text-white p-4 rounded-lg">Tambah Data Pasien Baru</a>
            </div>
        </div>
    </div>
</div>
