
<form method="post" action="{{ route('pasien.store') }}" class="mt-6 space-y-6">
    @csrf

    <!-- Kategori -->
    <div class="flex align-middle">
        <x-input-label for="kategori" class="w-48 mt-4">
            Kategori <span class="text-red-400">*</span>
        </x-input-label>
        <select name="kategori" id="kategori" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
            <option value="Umum">Umum</option>
            <option value="Santri">Santri</option>
            <option value="Asatidzah">Asatidzah</option>
        </select>
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('kategori')" />

    <!-- NIK -->
    <div class="flex align-middle">
        <x-input-label for="nik" :value="__('NIK')" class="w-48 mt-4" />
        <x-text-input id="nik" name="nik" type="text" class="mt-1 block w-full" :value="old('nik')" autofocus autocomplete="nik" />
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('nik')" />

    <!--Nama Lengkap-->
    <div class="flex align-middle">
        <x-input-label for="nama_lengkap" class="w-48 mt-4">
            Nama Lengkap <span class="text-red-400">*</span>
        </x-input-label>
        <x-text-input id="nama_lengkap" name="nama_lengkap" type="text" class="mt-1 block w-full" :value="old('nama_lengkap')" required autofocus autocomplete="nama_lengkap" />
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('nama_lengkap')" />

    <!-- Nama Wali -->
    <div class="flex align-middle">
        <x-input-label for="nama_wali" :value="__('Nama Wali')" class="w-48 mt-4" />
        <x-text-input id="nama_wali" name="nama_wali" type="text" class="mt-1 block w-full" :value="old('nama_wali')" required autofocus autocomplete="nama_wali" />
        <x-input-error class="mt-2" :messages="$errors->get('nama_wali')" />
    </div>

    <!-- DOB -->
    <div class="flex align-middle">
        <x-input-label for="dob" class="w-48 mt-4">
            Tanggal Lahir <x-mandatory/>
        </x-input-label>
        <x-datepicker :value="old('dob')" :name="'dob'" :id="'dob'"></x-datepicker>
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('dob')" />

    <!-- Jenis Kelamin -->
    <div class="flex align-middle">
        <x-input-label for="jenis_kelamin" class="w-48 mt-4">
            Jenis Kelamin <x-mandatory />
        </x-input-label>
        <select name="jenis_kelamin" id="jenis_kelamin" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" value="old('jenis_kelamin')">
            <option value="">--</option>
            <option value="1">Laki-laki</option>
            <option value="2">Perempuan</option>
        </select>
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('jenis_kelamin')" />

    <!-- Status Kawin -->
    <div class="flex align-middle">
        <x-input-label for="status_kawin" class="w-48 mt-4">
            Sudah menikah?<x-mandatory />
        </x-input-label>
        <select name="status_kawin" id="status_kawin" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" value="old('status_kawin')">
            <option value="">--</option>
            <option value="1">Sudah</option>
            <option value="0">Belum</option>
        </select>
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('status_kawin')" />

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
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('agama')" />

    <!-- Nomor Telepon -->
    <div class="flex align-middle">
        <x-input-label for="phone" :value="__('Nomor Telepon')" class="w-48 mt-4" />
        <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone')" autofocus autocomplete="phone" />
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('phone')" />

     <!-- Pendidikan -->
     <div class="flex align-middle">
        <x-input-label for="pendidikan" :value="__('Pendidikan')" class="w-48 mt-4" />
        <x-text-input id="pendidikan" name="pendidikan" type="text" class="mt-1 block w-full" :value="old('pendidikan')" autofocus autocomplete="pendidikan" />
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('pendidikan')" />

     <!-- Pekerjaan -->
     <div class="flex align-middle">
        <x-input-label for="pekerjaan" :value="__('Pekerjaan')" class="w-48 mt-4" />
        <x-text-input id="pekerjaan" name="pekerjaan" type="text" class="mt-1 block w-full" :value="old('pekerjaan')" autofocus autocomplete="pekerjaan" />
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('pekerjaan')" />

    <!-- Alamat -->
    <div class="flex align-middle">
        <x-input-label for="alamat" :value="__('Alamat')" class="w-48 mt-4" />
        <x-text-area id="alamat" name="alamat" type="text" class="mt-1 block w-full" :value="old('alamat')" autofocus autocomplete="alamat"></x-text-area>
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('alamat')" />

    <!-- Alergi -->
    <div class="flex align-middle">
        <x-input-label for="alergi" class="w-48 mt-4">
            Alergi<x-mandatory />
        </x-input-label>
        <x-text-area id="alergi" name="alergi" type="text" class="mt-1 block w-full" :value="old('alergi')" required autofocus autocomplete="alergi"></x-text-area>
    </div>
    <x-input-error class="mt-2" :messages="$errors->get('alergi')" />

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Buat Pasien Baru') }}</x-primary-button>
    </div>
</form>
