
<form method="post" action="{{ route('pasien.update', $pasien) }}" class="mt-6 space-y-6">
    @csrf
    @method('PUT')

    <div class="flex align-middle">
        <x-input-label for="kategori" :value="__('Kategori')" class="w-48 mt-4" />
        <x-text-input id="kategori" name="kategori" type="text" class="mt-1 block w-full" :value="$pasien->kategori" disabled/>
    </div>

    <div class="flex align-middle">
        <x-input-label for="no_rekam_medis" :value="__('Nomor Rekam Medis')" class="w-48 mt-4" />
        <x-text-input id="no_rekam_medis" name="no_rekam_medis" type="text" class="mt-1 block w-full" :value="$pasien->no_rekam_medis" disabled/>
    </div>

    <div class="flex align-middle">
        <x-input-label for="nik" :value="__('NIK')" class="w-48 mt-4" />
        <x-text-input id="nik" name="nik" type="text" class="mt-1 block w-full" :value="$pasien->nik" disabled/>
    </div>

    <div class="flex align-middle">
        <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" class="w-48 mt-4" />
        <x-text-input id="nama_lengkap" name="nama_lengkap" type="text" class="mt-1 block w-full" :value="$pasien->nama_lengkap" disabled/>
    </div>

    <div class="flex align-middle">
        <x-input-label for="nama_wali" :value="__('Nama Wali')" class="w-48 mt-4" />
        <x-text-input id="nama_wali" name="nama_wali" type="text" class="mt-1 block w-full" :value="$pasien->nama_wali" disabled/>
    </div>

    <!-- DOB -->

    <div class="flex align-middle">
        <x-input-label for="dob" :value="__('Tanggal Lahir')" class="w-48 mt-4" />
        <input type="date" name="dob" id="dob" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" value="{{ $pasien->dob }}" disabled>
    </div>

    @if (isset($pasien))
        <div class="flex align-middle">
            <x-input-label for="umur" :value="__('Umur')" class="w-48 mt-4" />
            <x-text-input id="umur" name="umur" type="text" class="mt-1 block w-full" :value="$pasien->age" disabled/>
        </div>
    @endif

    <!-- Jenis Kelamin -->
    <div class="flex align-middle">
        <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" class="w-48 mt-4" />
        <x-text-input id="jenis_kelamin" name="jenis_kelamin" type="text" class="mt-1 block w-full" :value="$pasien->jenis_kelamin" disabled/>
    </div>

    <!-- Status Kawin -->
    <div class="flex align-middle">
        <x-input-label for="status_kawin" :value="__('Sudah Menikah?')" class="w-48 mt-4" />
        <x-text-input id="status_kawin" name="status_kawin" type="text" class="mt-1 block w-full" :value="$pasien->status_kawin" disabled/>
    </div>

    <!-- Agama -->
    <div class="flex align-middle">
        <x-input-label for="Agama" :value="__('Agama')" class="w-48 mt-4" />
        <x-text-input id="Agama" name="Agama" type="text" class="mt-1 block w-full" :value="$pasien->Agama" disabled/>
    </div>

    <div class="flex align-middle">
        <x-input-label for="phone" :value="__('Nomor Telepon')" class="w-48 mt-4" />
        <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $pasien->phone)" disabled/>
    </div>

    <div class="flex align-middle">
        <x-input-label for="alamat" :value="__('Alamat')" class="w-48 mt-4" />
        <x-text-area id="alamat" name="alamat" type="text" class="mt-1 block w-full" :value="old('alamat', $pasien->alamat)" disabled></x-text-area>
    </div>

    <div class="flex align-middle">
        <x-input-label for="alergi" :value="__('alergi')" class="w-48 mt-4" />
        <x-text-area id="alergi" name="alergi" type="text" class="mt-1 block w-full" :value="old('alergi', $pasien->alergi)" disabled></x-text-area>
    </div>
</form>
