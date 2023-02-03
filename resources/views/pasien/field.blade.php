
<form method="post" action="{{ route('pasien.store') }}" class="mt-6 space-y-6">
    @csrf

    <div class="flex align-middle">
        <x-input-label for="kategori" :value="__('Kategori')" class="w-48 mt-4" />
        <select name="kategori" id="kategori" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
            <option value="Umum">Umum</option>
            <option value="Santri">Santri</option>
            <option value="Asatidzah">Asatidzah</option>
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('kategori')" />
    </div>

    <div class="flex align-middle">
        <x-input-label for="nik" :value="__('NIK')" class="w-48 mt-4" />
        <x-text-input id="nik" name="nik" type="text" class="mt-1 block w-full" :value="old('nik')" autofocus autocomplete="nik" />
        <x-input-error class="mt-2" :messages="$errors->get('nik')" />
    </div>

    <div class="flex align-middle">
        <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" class="w-48 mt-4" />
        <x-text-input id="nama_lengkap" name="nama_lengkap" type="text" class="mt-1 block w-full" :value="old('nama_lengkap')" required autofocus autocomplete="nama_lengkap" />
        <x-input-error class="mt-2" :messages="$errors->get('nama_lengkap')" />
    </div>

    <div class="flex align-middle">
        <x-input-label for="nama_wali" :value="__('Nama Wali')" class="w-48 mt-4" />
        <x-text-input id="nama_wali" name="nama_wali" type="text" class="mt-1 block w-full" :value="old('nama_wali')" required autofocus autocomplete="nama_wali" />
        <x-input-error class="mt-2" :messages="$errors->get('nama_wali')" />
    </div>

    <!-- DOB -->

    <div class="flex align-middle">
        <x-input-label for="dob" :value="__('Tanggal Lahir')" class="w-48 mt-4" />
        <input type="date" name="dob" id="dob" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" value="old('dob')">
        <x-input-error class="mt-2" :messages="$errors->get('dob')" />
    </div>

    <!-- Jenis Kelamin -->
    <div class="flex align-middle">
        <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" class="w-48 mt-4" />
        <select name="jenis_kelamin" id="jenis_kelamin" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" value="old('jenis_kelamin')">
            <option value="">--</option>
            <option value="1">Laki-laki</option>
            <option value="2">Perempuan</option>
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('jenis_kelamin')" />
    </div>

    <!-- Status Kawin -->
    <div class="flex align-middle">
        <x-input-label for="status_kawin" :value="__('Sudah Menikah?')" class="w-48 mt-4" />
        <select name="status_kawin" id="status_kawin" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" value="old('status_kawin')">
            <option value="">--</option>
            <option value="1">Sudah</option>
            <option value="0">Belum</option>
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('status_kawin')" />
    </div>

    <!-- Agama -->
    <div class="flex align-middle">
        <x-input-label for="agama" :value="__('Agama')" class="w-48 mt-4" />
        <select name="agama" id="agama" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" value="agama">
            <option value="">--</option>
            <option value="Islam">Islam</option>
            <option value="Kristen Protestan">Kristen Protestan</option>
            <option value="Katolik">Katolik</option>
            <option value="Buddha">Buddha</option>
            <option value="Hindu">Hindu</option>
            <option value="Kong Hu Chu">Kong Hu Chu</option>
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('agama')" />
    </div>

    <div class="flex align-middle">
        <x-input-label for="phone" :value="__('Nomor Telepon')" class="w-48 mt-4" />
        <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone')" autofocus autocomplete="phone" />
        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
    </div>

    <div class="flex align-middle">
        <x-input-label for="alamat" :value="__('Alamat')" class="w-48 mt-4" />
        <x-text-area id="alamat" name="alamat" type="text" class="mt-1 block w-full" :value="old('alamat')" autofocus autocomplete="alamat"></x-text-area>
        <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
    </div>

    <div class="flex align-middle">
        <x-input-label for="alergi" :value="__('alergi')" class="w-48 mt-4" />
        <x-text-area id="alergi" name="alergi" type="text" class="mt-1 block w-full" :value="old('alergi')" required autofocus autocomplete="alergi"></x-text-area>
        <x-input-error class="mt-2" :messages="$errors->get('alergi')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Buat Pasien Baru') }}</x-primary-button>
    </div>
</form>
