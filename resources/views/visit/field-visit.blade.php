
<form method="post" action="{{ route('visit.update-pemeriksaan', $visit->id) }}" class="flex gap-2">
    @csrf
    @method('PUT')

    <!--Info Pasien dan vital-->
    <div class="space-y-2 w-[40%] h-[80vh]">
        <div class="p-5 bg-teal-200 rounded-md mb-0 shadow-lg h-[55%]">
            @include('visit.info-pasien-visit')
        </div>
        <div class="p-5 bg-teal-300 rounded-md shadow-lg h-[44%]">
            @include('visit.info-vital')
        </div>
    </div>

    <!--anamnesis-->
    <div id="anamnesis" class="overflow-auto p-5 rounded-md bg-teal-200 space-y-6 max-h-[80vh] shadow-lg w-[30%]">
        <h3 class="font-bold mb-4">Anamnesis</h3>
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
            <x-input-label for="sg_cor" :value="__('COR')" class="w-48 mt-4" />
            <x-text-area id="sg_cor" name="sg_cor" type="text" class="mt-1 block w-full" :value="old('sg_cor', $visit->sg_cor)" autofocus autocomplete="sg_cor"></x-text-area>
            <x-input-error class="mt-2" :messages="$errors->get('sg_cor')" />
        </div>

        <div class="flex align-middle">
            <x-input-label for="sg_pulmo" :value="__('pulmo')" class="w-48 mt-4" />
            <x-text-area id="sg_pulmo" name="sg_pulmo" type="text" class="mt-1 block w-full" :value="old('sg_pulmo', $visit->sg_pulmo)" autofocus autocomplete="sg_pulmo"></x-text-area>
            <x-input-error class="mt-2" :messages="$errors->get('sg_pulmo')" />
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
    </div>

    <!--conclusion-->
    <div id="conclusion" class="p-5 rounded-md bg-teal-300 space-y-6 shadow-lg w-[30%] max-h-[80vh]">
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
            <x-primary-button>{{ __('Catat Hasil Pemeriksaan') }}</x-primary-button>
        </div>
    </div>

</form>
