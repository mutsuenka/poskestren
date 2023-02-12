
<form method="post" action="{{ route('visit.store') }}" class="mt-6 space-y-6">
    @csrf

    <div class="flex align-middle">
        <x-input-label for="pasien_id" :value="__('Pasien')" class="w-48 mt-4" />
        <select name="pasien_id" id="pasien_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">

            @foreach ($pasiens as $pasien)
                <option value="{{ $pasien->id }}">{{ $pasien->nama_lengkap }} </option>
            @endforeach

        </select>
        <x-input-error class="mt-2" :messages="$errors->get('pasien_id')" />
    </div>

    <!-- Tanggal Visit -->

    <div class="flex align-middle">
        <x-input-label for="tanggal_visit" :value="__('Tanggal Visit')" class="w-48 mt-4" />
        <input type="date" name="tanggal_visit" id="tanggal_visit" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" :value="old('tanggal_visit', Carbon::today())">
        <x-input-error class="mt-2" :messages="$errors->get('tanggal_visit')" />
    </div>

    <!-- Jenis Kelamin -->
    <div class="flex align-middle">
        <x-input-label for="status" :value="__('Status')" class="w-48 mt-4" />
        <select name="status" id="status" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">

            @foreach ($statuses as $status)
                <option value="{{ $status->id }}">{{ $status->nama_status }} </option>
            @endforeach

        </select>
        <x-input-error class="mt-2" :messages="$errors->get('status')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Tambahkan Antrian') }}</x-primary-button>
    </div>
</form>
