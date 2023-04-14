<h2 class="font-bold mb-4">Vital Sign Pasien</h2>

<table class="w-full rounded-md border-collapse border mb-4">
    <thead class="">
        <tr class="bg-teal-100">
            <th scope="col" class="px-6 py-3">ABP<br/>(mmHg)</th>
            <th scope="col" class="px-6 py-3">Nadi<br/>(x/menit)</th>
            <th scope="col" class="px-6 py-3">Suhu<br/>(°C)</th>
            <th scope="col" class="px-6 py-3">RR<br/>(x/menit)</th>

        </tr>
    </thead>
    <tbody>
        <tr class="text-center">
            <td id="tekanan_darah" class="bg-teal-50 px-6 py-3">{{ $visit->vital_tekanan_darah }}</td>
            <td id="nadi" class="px-6 py-3">{{ $visit->vital_nadi }}</td>
            <td id="suhu" class="bg-teal-50 px-6 py-3">{{ $visit->vital_suhu }}</td>
            <td id="respiratory_rate" class="px-6 py-3">{{ $visit->vital_respiratory_rate }}</td>

        </tr>
    </tbody>
</table>

<table class="w-full rounded-md border-collapse border mb-4">
    <thead class="">
        <tr class="bg-teal-100">

            <th scope="col" class="px-6 py-3">SPO2<br/>(%)</th>
            <th scope="col" class="px-6 py-3">VAS</th>
            <th scope="col" class="px-6 py-3">GCS</th>
            <th scope="col" class="px-6 py-3">BB<br/>(kg)</th>
            <th scope="col" class="px-6 py-3">TB<br/>(cm)</th>
        </tr>
    </thead>
    <tbody>
        <tr class="text-center">

            <td id="spo" class="bg-teal-50 px-6 py-3">{{ $visit->vital_spo }}</td>
            <td id="vas"  class="px-6 py-3">{{ $visit->vital_vas }}</td>
            <td id="gcs" class="bg-teal-50 px-6 py-3">{{ $visit->vital_gcs }}</td>
            <td id="berat_badan" class="px-6 py-3">{{ $visit->vital_berat_badan }}</td>
            <td id="tinggi_badan" class="bg-teal-50 px-6 py-3" >{{ $visit->vital_tinggi_badan }}</td>
        </tr>
    </tbody>
</table>
