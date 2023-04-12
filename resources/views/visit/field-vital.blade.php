<h3 class="font-bold">Vital Sign Pasien</h3>

<form method="post" action="{{ route('visit.update-vital', $visit->id) }}" class="mt-6 space-y-6">
    @csrf
    @method('PUT')

    <div class="md:flex gap-6">
        <div class="md:w-1/2 space-y-4">

            <div class="flex align-middle gap-1">
                <x-input-label for="vital_tekanan_darah" :value="__('Tekanan Darah (mmHg)')" class="w-40 mt-4" />
                <x-text-input id="vital_tekanan_darah" name="vital_tekanan_darah" type="text" class="mt-1 block w-1/3" :value="old('vital_tekanan_darah', $visit->vital_tekanan_darah)" autofocus autocomplete="vital_tekanan_darah" />
                <x-input-error class="mt-2" :messages="$errors->get('vital_tekanan_darah')" />
            </div>

            <div class="flex align-middle gap-1">
                <x-input-label for="vital_nadi" :value="__('Nadi (x/menit)')" class="w-40 mt-4" />
                <x-text-input id="vital_nadi" name="vital_nadi" type="text" class="mt-1 block w-1/3" :value="old('vital_nadi', $visit->vital_nadi)" autofocus autocomplete="vital_nadi" />
                <x-input-error class="mt-2" :messages="$errors->get('vital_nadi')" />
            </div>

            <div class="flex align-middle gap-1">
                <x-input-label for="vital_suhu" :value="__('Suhu Badan (°C)')" class="w-40 mt-4" />
                <x-text-input id="vital_suhu" name="vital_suhu" type="text" class="mt-1 block w-1/3" :value="old('vital_suhu', $visit->vital_suhu)" autofocus autocomplete="vital_suhu" />
                <x-input-error class="mt-2" :messages="$errors->get('vital_suhu')" />
            </div>

            <div class="flex align-middle gap-1">
                <x-input-label for="vital_respiratory_rate" :value="__('Respiratory Rate (x/menit)')" class="w-40 mt-4" />
                <x-text-input id="vital_respiratory_rate" name="vital_respiratory_rate" type="text" class="mt-1 block w-1/3" :value="old('vital_respiratory_rate', $visit->vital_respiratory_rate)" autofocus autocomplete="vital_respiratory_rate" />
                <x-input-error class="mt-2" :messages="$errors->get('vital_respiratory_rate')" />
            </div>

            <div class="flex align-middle gap-1">
                <x-input-label for="vital_spo" :value="__('SpO2 (%)')" class="w-40 mt-4" />
                <x-text-input id="vital_spo" name="vital_spo" type="text" class="mt-1 block w-1/3" :value="old('vital_spo', $visit->vital_spo)" autofocus autocomplete="vital_spo" />
                <x-input-error class="mt-2" :messages="$errors->get('vital_spo')" />
            </div>
        </div>

        <div class="md:w-1/2 space-y-4 mt-4 md:mt-0">
            <div class="flex align-middle gap-1">
                <x-input-label for="vital_vas" :value="__('VAS (Skala Nyeri)')" class="w-40 mt-4" />
                <x-text-input id="vital_vas" name="vital_vas" type="text" class="mt-1 block w-1/3" :value="old('vital_vas', $visit->vital_vas)" autofocus autocomplete="vital_vas" />
                <x-input-error class="mt-2" :messages="$errors->get('vital_vas')" />
            </div>

            <div class="flex align-middle gap-1">
                <x-input-label for="vital_gcs" :value="__('GCS (Glasgow Coma Scale)')" class="w-40 mt-4" />
                <x-text-input id="vital_gcs" name="vital_gcs" type="text" class="mt-1 block w-1/3" :value="old('vital_gcs', $visit->vital_gcs)" autofocus autocomplete="vital_gcs" />
                <x-input-error class="mt-2" :messages="$errors->get('vital_gcs')" />
            </div>

            <div class="flex align-middle gap-1">
                <x-input-label for="vital_berat_badan" :value="__('Berat Badan (kg)')" class="w-40 mt-4" />
                <x-text-input id="vital_berat_badan" name="vital_berat_badan" type="text" class="mt-1 block w-1/3" :value="old('vital_berat_badan', $visit->vital_berat_badan)" autofocus autocomplete="vital_berat_badan" />
                <x-input-error class="mt-2" :messages="$errors->get('vital_berat_badan')" />
            </div>

            <div class="flex align-middle gap-1">
                <x-input-label for="vital_tinggi_badan" :value="__('Tinggi Badan (cm)')" class="w-40 mt-4" />
                <x-text-input id="vital_tinggi_badan" name="vital_tinggi_badan" type="text" class="mt-1 block w-1/3" :value="old('vital_tinggi_badan', $visit->vital_tinggi_badan)" autofocus autocomplete="vital_tinggi_badan" />
                <x-input-error class="mt-2" :messages="$errors->get('vital_tinggi_badan')" />
            </div>
        </div>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Update Vital Sign Pasien') }}</x-primary-button>
    </div>
</form>
