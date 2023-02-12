<h2 class="font-bold mb-4">Informasi Pasien</h2>

<div class="mt-4 space-y-6">
    <div class="flex align-middle">
        <x-input-label for="pasien_id" :value="__('Pasien')" class="w-48 mt-4" />
        <x-text-input id="pasien_id" name="pasien_id" type="" class="mt-1 block w-full" :value="$visit->pasien->nama_lengkap" disabled/>
    </div>

    <div class="flex align-middle">
        <x-input-label for="tanggal_visit" :value="__('Tanggal Visit')" class="w-48 mt-4" />
        <x-text-input id="tanggal_visit" name="tanggal_visit" type="" class="mt-1 block w-full" :value="$visit->tanggal_visit" disabled/>
    </div>

    <div class="flex align-middle">
        <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" class="w-48 mt-4" />
        <x-text-input id="jenis_kelamin" name="jenis_kelamin" type="" class="mt-1 block w-full" :value="$visit->jenis_kelamin" disabled/>
    </div>

    <div class="flex align-middle">
        <x-input-label for="pasien_age" :value="__('Umur')" class="w-48 mt-4" />
        <x-text-input id="pasien_age" name="pasien_age" type="" class="mt-1 block w-full" :value="$visit->pasien_age" disabled/>
    </div>

    <div class="flex align-middle">
        <x-input-label for="alergi" :value="__('alergi')" class="w-48 mt-4" />
        <x-text-area id="alergi" name="alergi" type="" class="mt-1 block w-full" :value="$visit->pasien->alergi" disabled></x-text-area>
    </div>
</div>
