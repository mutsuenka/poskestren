<h3 class="font-bold mb-4">Anamnesis</h3>

<form method="post" action="{{ route('visit.update', [$visit->id, 'visit']) }}" class="mt-6 space-y-6">
    @csrf
    @method('PUT')

    <div class="flex align-middle">
        <x-input-label for="keluhan_utama" :value="__('Keluhan Utama')" class="w-48 mt-4" />
        <x-text-area id="keluhan_utama" name="keluhan_utama" type="text" class="mt-1 block w-full" :value="old('keluhan_utama', $visit->keluhan_utama)" autofocus autocomplete="keluhan_utama"></x-text-area>
        <x-input-error class="mt-2" :messages="$errors->get('keluhan_utama')" />
    </div>

    <div class="flex align-middle">
        <x-input-label for="riwayat_penyakit_sekarang" :value="__('Riwayat Penyakit Sekarang')" class="w-48 mt-4" />
        <x-text-area id="riwayat_penyakit_sekarang" name="riwayat_penyakit_sekarang" type="text" class="mt-1 block w-full" :value="old('riwayat_penyakit_sekarang', $visit->riwayat_penyakit_sekarang)" autofocus autocomplete="riwayat_penyakit_sekarang"></x-text-area>
        <x-input-error class="mt-2" :messages="$errors->get('riwayat_penyakit_sekarang')" />
    </div>

    <div class="flex align-middle">
        <x-input-label for="riwayat_penyakit_dulu" :value="__('Riwayat Penyakit Dulu')" class="w-48 mt-4" />
        <x-text-area id="riwayat_penyakit_dulu" name="riwayat_penyakit_dulu" type="text" class="mt-1 block w-full" :value="old('riwayat_penyakit_dulu', $visit->riwayat_penyakit_dulu)" autofocus autocomplete="riwayat_penyakit_dulu"></x-text-area>
        <x-input-error class="mt-2" :messages="$errors->get('riwayat_penyakit_dulu')" />
    </div>

    <div class="flex align-middle">
        <x-input-label for="riwayat_penyakit_keluarga" :value="__('Riwayat Penyakit Keluarga')" class="w-48 mt-4" />
        <x-text-area id="riwayat_penyakit_keluarga" name="riwayat_penyakit_keluarga" type="text" class="mt-1 block w-full" :value="old('riwayat_penyakit_keluarga', $visit->riwayat_penyakit_keluarga)" autofocus autocomplete="riwayat_penyakit_keluarga"></x-text-area>
        <x-input-error class="mt-2" :messages="$errors->get('riwayat_penyakit_keluarga')" />
    </div>

    <h3>Status General</h3>

    <div class="flex align-middle">
        <x-input-label for="sg_kepala_leher" :value="__('Kepala/Leher')" class="w-48 mt-4" />
        <x-text-area id="sg_kepala_leher" name="sg_kepala_leher" type="text" class="mt-1 block w-full" :value="old('sg_kepala_leher', $visit->sg_kepala_leher)" autofocus autocomplete="sg_kepala_leher"></x-text-area>
        <x-input-error class="mt-2" :messages="$errors->get('sg_kepala_leher')" />
    </div>

    <div class="flex align-middle">
        <x-input-label for="sg_thorax" :value="__('Thorax')" class="w-48 mt-4" />
        <x-text-area id="sg_thorax" name="sg_thorax" type="text" class="mt-1 block w-full" :value="old('sg_thorax', $visit->sg_thorax)" autofocus autocomplete="sg_thorax"></x-text-area>
        <x-input-error class="mt-2" :messages="$errors->get('sg_thorax')" />
    </div>

    <div class="flex align-middle">
        <x-input-label for="sg_cob" :value="__('COB')" class="w-48 mt-4" />
        <x-text-area id="sg_cob" name="sg_cob" type="text" class="mt-1 block w-full" :value="old('sg_cob', $visit->sg_cob)" autofocus autocomplete="sg_cob"></x-text-area>
        <x-input-error class="mt-2" :messages="$errors->get('sg_cob')" />
    </div>

    <div class="flex align-middle">
        <x-input-label for="sg_abdomen" :value="__('Abdomen')" class="w-48 mt-4" />
        <x-text-area id="sg_abdomen" name="sg_abdomen" type="text" class="mt-1 block w-full" :value="old('sg_abdomen', $visit->sg_abdomen)" autofocus autocomplete="sg_abdomen"></x-text-area>
        <x-input-error class="mt-2" :messages="$errors->get('sg_abdomen')" />
    </div>

    <div class="flex align-middle">
        <x-input-label for="sg_ekstremitas" :value="__('Ekstremitas')" class="w-48 mt-4" />
        <x-text-area id="sg_ekstremitas" name="sg_ekstremitas" type="text" class="mt-1 block w-full" :value="old('sg_ekstremitas', $visit->sg_ekstremitas)" autofocus autocomplete="sg_ekstremitas"></x-text-area>
        <x-input-error class="mt-2" :messages="$errors->get('sg_ekstremitas')" />
    </div>

    <div class="flex align-middle">
        <x-input-label for="status_lokalis" :value="__('Status Lokalis')" class="w-48 mt-4" />
        <x-text-area id="status_lokalis" name="status_lokalis" type="text" class="mt-1 block w-full" :value="old('status_lokalis', $visit->status_lokalis)" autofocus autocomplete="status_lokalis"></x-text-area>
        <x-input-error class="mt-2" :messages="$errors->get('status_lokalis')" />
    </div>

    <div class="flex align-middle">
        <x-input-label for="hasil_lab" :value="__('Hasil Lab')" class="w-48 mt-4" />
        <x-text-area id="hasil_lab" name="hasil_lab" type="text" class="mt-1 block w-full" :value="old('hasil_lab', $visit->hasil_lab)" autofocus autocomplete="hasil_lab"></x-text-area>
        <x-input-error class="mt-2" :messages="$errors->get('hasil_lab')" />
    </div>

    <h3 class="font-bold mb-4">Diagnosis dan Planning</h3>

    <div class="flex align-middle">
        <x-input-label for="diagnosa" :value="__('Diagnosis')" class="w-48 mt-4" />
        <x-text-area id="diagnosa" name="diagnosa" type="text" class="mt-1 block w-full" :value="old('diagnosa', $visit->diagnosa)" autofocus autocomplete="diagnosa"></x-text-area>
        <x-input-error class="mt-2" :messages="$errors->get('diagnosa')" />
    </div>

    <div class="flex align-middle">
        <x-input-label for="planning" :value="__('Planning')" class="w-48 mt-4" />
        <x-text-area id="planning" name="planning" type="text" class="mt-1 block w-full" :value="old('planning', $visit->planning)" autofocus autocomplete="planning"></x-text-area>
        <x-input-error class="mt-2" :messages="$errors->get('planning')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Update Data Vital Pasien') }}</x-primary-button>
    </div>
</form>
