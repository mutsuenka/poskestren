<h2 class="font-bold mb-4">Data Vital Pasien</h2>

<div class="flex mb-4 gap-2">
    <div class="w-1/2 space-y-4">
        <div class="flex align-middle gap-1">
            <x-input-label for="vital_tekanan_darah" :value="__('Tekanan Darah (mmHg)')" class="w-36 mt-4" />
            <x-text-input id="vital_tekanan_darah" name="vital_tekanan_darah" type="text" class="mt-1 block w-1/3" :value="$visit->vital_tekanan_darah" disabled/>
        </div>

        <div class="flex align-middle gap-1">
            <x-input-label for="vital_nadi" :value="__('Nadi (x/menit)')" class="w-36 mt-4" />
            <x-text-input id="vital_nadi" name="vital_nadi" type="text" class="mt-1 block w-1/3" :value="$visit->vital_nadi" disabled/>
        </div>

        <div class="flex align-middle gap-1">
            <x-input-label for="vital_suhu" :value="__('Suhu Badan (°C)')" class="w-36 mt-4" />
            <x-text-input id="vital_suhu" name="vital_suhu" type="text" class="mt-1 block w-1/3" :value="$visit->vital_suhu" disabled/>
        </div>

        <div class="flex align-middle gap-1">
            <x-input-label for="vital_respiratory_rate" :value="__('Respiratory Rate (x/menit)')" class="w-36 mt-4" />
            <x-text-input id="vital_respiratory_rate" name="vital_respiratory_rate" type="text" class="mt-1 block w-1/3" :value="$visit->vital_respiratory_rate" disabled />
        </div>
        <div class="flex align-middle gap-1">
            <x-input-label for="vital_spo" :value="__('SpO2 (%)')" class="w-36 mt-4" />
            <x-text-input id="vital_spo" name="vital_spo" type="text" class="mt-1 block w-1/3" :value="$visit->vital_spo" disabled/>
        </div>
    </div>

    <div class="w-1/2 space-y-4">


        <div class="flex align-middle gap-1">
            <x-input-label for="vital_vas" :value="__('VAS (Skala Nyeri)')" class="w-36 mt-4" />
            <x-text-input id="vital_vas" name="vital_vas" type="text" class="mt-1 block w-1/3" :value="$visit->vital_vas" disabled/>
        </div>

        <div class="flex align-middle gap-1">
            <x-input-label for="vital_gcs" :value="__('GCS (Glasgow Coma Scale)')" class="w-36 mt-4" />
            <x-text-input id="vital_gcs" name="vital_gcs" type="text" class="mt-1 block w-1/3" :value="$visit->vital_gcs" disabled/>
        </div>

        <div class="flex align-middle gap-1">
            <x-input-label for="vital_berat_badan" :value="__('Berat Badan (kg)')" class="w-36 mt-4" />
            <x-text-input id="vital_berat_badan" name="vital_berat_badan" type="text" class="mt-1 block w-1/3" :value="$visit->vital_berat_badan" disabled/>
        </div>

        <div class="flex align-middle gap-1">
            <x-input-label for="vital_tinggi_badan" :value="__('Tinggi Badan (cm)')" class="w-36 mt-4" />
            <x-text-input id="vital_tinggi_badan" name="vital_tinggi_badan" type="text" class="mt-1 block w-1/3" :value="$visit->vital_tinggi_badan" disabled/>
        </div>
    </div>
</div>
