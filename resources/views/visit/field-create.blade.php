
<form method="post" action="{{ route('visit.store') }}" class="mt-6 space-y-6">
    @csrf

    <div class="flex align-middle">
        <x-input-label for="pasien_id" :value="__('Pasien')" class="w-36 mt-4" />
        <select name="pasien_id" id="pasien_id" class="select2 left-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">

            @foreach ($pasiens as $pasien)
                <option value="{{ $pasien->id }}">{{ $pasien->nama_lengkap }} </option>
            @endforeach

        </select>
        <x-input-error class="mt-2" :messages="$errors->get('pasien_id')" />
    </div>

    <div class="flex align-middle">
        <x-input-label for="pasien_id" :value="__('')" class="w-36 mt-4" />
        <div>
            <a href="{{ route('pasien.create') }}" class="bg-teal-700 hover:bg-teal-600 text-white p-2 rounded-lg">+ Pasien Baru</a>
        </div>
    </div>

    <!-- Tanggal Visit -->

    <div class="flex align-middle">
        <x-input-label for="tanggal_visit" :value="__('Tanggal Visit')" class="w-48 mt-4" />
        {{-- <input type="date" name="tanggal_visit" id="tanggal_visit" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" value="{{ $today }}"/> --}}
        <div class="relative w-full">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg aria-hidden="true" class="w-5 h-5 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
            </div>
            <input datepicker datepicker-autohide datepicker-format="d M yyyy" datepicker-buttons value="{{ $today }}" type="text" name="tanggal_visit" id="tanggal_visit" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
          </div>
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
