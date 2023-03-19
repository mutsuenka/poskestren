<h3 class="font-bold mb-4">Anamnesis</h3>

<div class="space-y-2">
    <div class="flex align-middle">
        <x-input-label for="keluhan_utama" :value="__('Keluhan Utama')" class="w-48 mt-4" />
        <x-text-area id="keluhan_utama" name="keluhan_utama" type="text" class="mt-1 block w-full" :value="old('keluhan_utama', $visit->keluhan_utama)" disabled></x-text-area>
    </div>

    <div class="flex align-middle">
        <x-input-label for="riwayat_penyakit_sekarang" :value="__('Riwayat Penyakit Sekarang')" class="w-48 mt-4" />
        <x-text-area id="riwayat_penyakit_sekarang" name="riwayat_penyakit_sekarang" type="text" class="mt-1 block w-full" :value="old('riwayat_penyakit_sekarang', $visit->riwayat_penyakit_sekarang)" disabled></x-text-area>
    </div>

    <div class="flex align-middle">
        <x-input-label for="riwayat_penyakit_dulu" :value="__('Riwayat Penyakit Dulu')" class="w-48 mt-4" />
        <x-text-area id="riwayat_penyakit_dulu" name="riwayat_penyakit_dulu" type="text" class="mt-1 block w-full" :value="old('riwayat_penyakit_dulu', $visit->riwayat_penyakit_dulu)" disabled></x-text-area>
    </div>

    <div class="flex align-middle">
        <x-input-label for="riwayat_penyakit_keluarga" :value="__('Riwayat Penyakit Keluarga')" class="w-48 mt-4" />
        <x-text-area id="riwayat_penyakit_keluarga" name="riwayat_penyakit_keluarga" type="text" class="mt-1 block w-full" :value="old('riwayat_penyakit_keluarga', $visit->riwayat_penyakit_keluarga)" disabled></x-text-area>
    </div>

    <h3>Status General</h3>

    <div class="flex align-middle">
        <x-input-label for="sg_kepala_leher" :value="__('Kepala/Leher')" class="w-48 mt-4" />
        <x-text-area id="sg_kepala_leher" name="sg_kepala_leher" type="text" class="mt-1 block w-full" :value="old('sg_kepala_leher', $visit->sg_kepala_leher)" disabled></x-text-area>
    </div>

    <div class="flex align-middle">
        <x-input-label for="sg_thorax" :value="__('Thorax')" class="w-48 mt-4" />
        <x-text-area id="sg_thorax" name="sg_thorax" type="text" class="mt-1 block w-full" :value="old('sg_thorax', $visit->sg_thorax)" disabled></x-text-area>
    </div>

    <div class="flex align-middle">
        <x-input-label for="sg_cor" :value="__('COR')" class="w-48 mt-4" />
        <x-text-area id="sg_cor" name="sg_cor" type="text" class="mt-1 block w-full" :value="old('sg_cor', $visit->sg_cor)" disabled></x-text-area>
    </div>

    <div class="flex align-middle">
        <x-input-label for="sg_pulmo" :value="__('Pulmo')" class="w-48 mt-4" />
        <x-text-area id="sg_pulmo" name="sg_pulmo" type="text" class="mt-1 block w-full" :value="old('sg_pulmo', $visit->sg_pulmo)" disabled></x-text-area>
    </div>

    <div class="flex align-middle">
        <x-input-label for="sg_abdomen" :value="__('Abdomen')" class="w-48 mt-4" />
        <x-text-area id="sg_abdomen" name="sg_abdomen" type="text" class="mt-1 block w-full" :value="old('sg_abdomen', $visit->sg_abdomen)" disabled></x-text-area>
    </div>

    <div class="flex align-middle">
        <x-input-label for="sg_ekstremitas" :value="__('Ekstremitas')" class="w-48 mt-4" />
        <x-text-area id="sg_ekstremitas" name="sg_ekstremitas" type="text" class="mt-1 block w-full" :value="old('sg_ekstremitas', $visit->sg_ekstremitas)" disabled></x-text-area>
    </div>

    <div class="flex align-middle">
        <x-input-label for="status_lokalis" :value="__('Status Lokalis')" class="w-48 mt-4" />
        <x-text-area id="status_lokalis" name="status_lokalis" type="text" class="mt-1 block w-full" :value="old('status_lokalis', $visit->status_lokalis)" disabled></x-text-area>
    </div>

    <div class="flex align-middle">
        <x-input-label for="hasil_lab" :value="__('Hasil Lab')" class="w-48 mt-4" />
        <x-text-area id="hasil_lab" name="hasil_lab" type="text" class="mt-1 block w-full" :value="old('hasil_lab', $visit->hasil_lab)" disabled></x-text-area>
    </div>

    <h3 class="font-bold mb-4">Diagnosis dan Planning</h3>

    <div class="flex align-middle">
        <x-input-label for="diagnosa" :value="__('Diagnosis')" class="w-48 mt-4" />
        <x-text-area id="diagnosa" name="diagnosa" type="text" class="mt-1 block w-full" :value="old('diagnosa', $visit->diagnosa)" disabled></x-text-area>
    </div>

    <div class="flex align-middle">
        <x-input-label for="planning" :value="__('Planning')" class="w-48 mt-4" />
        <x-text-area id="planning" name="planning" type="text" class="mt-1 block w-full" :value="old('planning', $visit->planning)" disabled></x-text-area>
    </div>

    <div class="flex items-center gap-4">
        <a href="{{ url()->previous() }}">
            <x-button>{{ __('Tutup Data Visit') }}</x-button>
        </a>
    </div>
</div>
