<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 p-4 bg-gray-5">
    <form class="pb-4 bg-gray-5 dark:bg-gray-900 flex justify-between" action="" method="GET">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-1">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="table-search" name="keyword" value="{{  old('keyword', $visits->keyword) }}" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
        </div>
        {{-- <a href="{{ route('visit.create') }}" class="block p-2 bg-teal-600 text-white rounded-lg relative mt-1 hover:bg-teal-800 hover:border-blue-500">Tambahkan Visit</a> --}}
    </form>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-teal-100 dark:bg-gray-700 dark:text-gray-400 rounded">
            <tr>
                {{-- <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th> --}}
                <th scope="col" class="px-6 py-3">
                    Antrian ke-
                </th>
                {{-- <th scope="col" class="px-6 py-3 text-center">
                    Nomor Rekam Medis
                </th> --}}
                <th scope="col" class="px-6 py-3">
                    Nama Pasien
                </th>
                {{-- <th scope="col" class="px-6 py-3">
                    Resep
                </th> --}}
                {{-- <th scope="col" class="px-6 py-3">
                    Status
                </th> --}}
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($visits->count() > 0)
                @foreach ($visits as $visit)
                <tr class="odd:bg-white even:bg-teal-50 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    {{-- <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td> --}}
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $visit->no_antrian }}
                    </th>
                    {{-- <td class="px-6 py-4 text-center">
                        {{ $visit->pasien->no_rekam_medis }}
                    </td> --}}
                    <td class="px-6 py-4">
                        {{ $visit->pasien->nama_lengkap }}
                    </td>
                    {{-- <td class="px-6 py-4">
                        {!! nl2br(e($visit->planning)) !!}
                    </td> --}}
                    {{-- <td class="px-6 py-4" data-html="true">
                        {{ $visit->nama_status }}
                    </td> --}}
                    <td class="px-6 py-4 flex gap-4">
                            <button
                            id="readInformasiVisitButton"
                            data-id="{{ $visit->id }}"
                            value="{{ $visit }}"
                            data-modal-toggle="readInformasiVisitModal"
                            class="toggle-modal inline-flex items-center text-white bg-teal-400 hover:bg-teal-600 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800 disabled:bg-slate-300" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-2 -ml-1 w-6 h-6">
                                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                    <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                                </svg>
                                View
                            </button>
                        <a href="{{ route('visit.obat', $visit->id)}}" class="inline-flex font-medium text-white dark:text-blue-500 hover:underline bg-green-400 p-2 rounded-lg items-center px-5 py-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-2 -ml-1 w-6 h-6">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                            </svg>
                            Selesai
                        </a>
                    </td>
                </tr>
                @endforeach
            @else
                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td colspan="7">
                        <span class="m-16 flex justify-center align-middle text-[1.2rem] font-bold">Tidak ada data</span>
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="mt-5">
        {{ $visits->links() }}
    </div>

    <div id="readInformasiVisitModal" tabindex="-1" aria-hidden="true" class="modal-row hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-6xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                    <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                        <h3 class="font-semibold" id="nama_pasien"></h3>
                        {{-- <p class="font-bold" id="keluhan_utama"></p> --}}
                    </div>
                    <div>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="readInformasiVisitModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Tutup Riwayat</span>
                        </button>
                    </div>
                </div>
                <div class="mx-auto hidden md:block">
                    <h2 class="font-bold mx-4">Vital</h2>
                    <table class="w-full rounded-md border-collapse border mb-4">
                        <thead class="">
                            <tr class="bg-teal-100">
                                <th scope="col" class="px-6 py-3">ABP<br/>(mmHg)</th>
                                <th scope="col" class="px-6 py-3">Nadi<br/>(x/menit)</th>
                                <th scope="col" class="px-6 py-3">Suhu<br/>(°C)</th>
                                <th scope="col" class="px-6 py-3">RR<br/>(x/menit)</th>
                                <th scope="col" class="px-6 py-3">SPO2<br/>(%)</th>
                                <th scope="col" class="px-6 py-3">VAS</th>
                                <th scope="col" class="px-6 py-3">GCS</th>
                                <th scope="col" class="px-6 py-3">BB<br/>(kg)</th>
                                <th scope="col" class="px-6 py-3">TB<br/>(cm)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td id="tekanan_darah" class="bg-teal-50 px-6 py-3"></td>
                                <td id="nadi" class="px-6 py-3"></td>
                                <td id="suhu" class="bg-teal-50 px-6 py-3"></td>
                                <td id="respiratory_rate" class="px-6 py-3"></td>
                                <td id="spo" class="bg-teal-50 px-6 py-3"></td>
                                <td id="vas"  class="px-6 py-3"></td>
                                <td id="gcs" class="bg-teal-50 px-6 py-3"></td>
                                <td id="berat_badan" class="px-6 py-3"></td>
                                <td id="tinggi_badan" class="bg-teal-50 px-6 py-3" ></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="md:flex md:gap-4 p-5">
                    <dl class="p-5 md:w-1/2">
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Keluhan Utama</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="keluhan_utama"></dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Riwayat Penyakit Sekarang</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="riwayat_penyakit_sekarang"></dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Riwayat Penyakit Dulu</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="riwayat_penyakit_dulu"></dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Riwayat Penyakit Keluarga</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="riwayat_penyakit_keluarga"></dd>

                    </dl>
                    <dl class="p-5 md:hidden">
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Tekanan Darah</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="tekanan_darah_2"></dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Nadi</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="nadi_2"></dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Suhu</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="suhu_2"></dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Respiratory Rate</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="respiratory_rate_2"></dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">SPO</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="spo_2"></dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">VAS</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="vas_2"></dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">GCS</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="gcs_2"></dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Berat Badan</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="berat_badan_2"></dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Tinggi Badan</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="tinggi_badan_2"></dd>
                    </dl>
                    <dl class="p-5 md:w-1/2">
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Diagnosis</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="diagnosis"></dd>
                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Planning</dt>
                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="planning"></dd>
                    </dl>
                </div>
                <div class="flex justify-end items-center">

                    <button type="button" data-modal-toggle="readInformasiVisitModal" class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" fill="currentColor" class="mr-1 -ml-1 w-5 h-5">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                        </svg>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts_lib')
    <script type="text/javascript">

        $(document).ready(function(){

            var dataRiwayatPasien = '';
            $('#readRiwayatPasienButton1').on('click', function() {
                dataRiwayatPasien = JSON.parse($(this).val());
                setModalPage(dataRiwayatPasien);
            });

            $('.toggle-modal').on('click', function() {
                var data = JSON.parse($(this).val());
                setModalPage(data);

                console.log(data);
            });

            function setModalPage(data) {
                $('#nama_pasien').text(data.pasien.nama_lengkap);
                $('#tanggal_visit_riwayat').text(data.tanggal_visit);
                $('#tekanan_darah').text(data.vital_tekanan_darah || '-');
                $('#nadi').text(data.vital_nadi || '-');
                $('#suhu').text(data.vital_suhu || '-');
                $('#respiratory_rate').text(data.vital_respiratory_rate || '-');
                $('#spo').text(data.vital_spo || '-');
                $('#vas').text(data.vital_vas || '-');
                $('#gcs').text(data.vital_gcs || '-');
                $('#berat_badan').text(data.vital_berat_badan || '-');
                $('#tinggi_badan').text(data.vital_tinggi_badan || '-');
                $('#tekanan_darah_2').text(data.vital_tekanan_darah || '-');
                $('#nadi_2').text(data.vital_nadi || '-');
                $('#suhu_2').text(data.vital_suhu || '-');
                $('#respiratory_rate_2').text(data.vital_respiratory_rate || '-');
                $('#spo_2').text(data.vital_spo || '-');
                $('#vas_2').text(data.vital_vas || '-');
                $('#gcs_2').text(data.vital_gcs || '-');
                $('#berat_badan_2').text(data.vital_berat_badan || '-');
                $('#tinggi_badan_2').text(data.vital_tinggi_badan || '-');
                $('#keluhan_utama').html(data.keluhan_utama);
                $('#kepala_leher').html(data.sg_kepala_leher);
                $('#thorax').html(data.sg_thorax);
                $('#cor').html(data.sg_cor);
                $('#pulmo').html(data.sg_pulmo);
                $('#abdomen').html(data.sg_abdomen);
                $('#ekstremitas').html(data.sg_ekstremitas);
                $('#riwayat_penyakit_dulu').html(data.riwayat_penyakit_dulu || '-');
                $('#riwayat_penyakit_keluarga').html(data.riwayat_penyakit_keluarga || '-');
                $('#riwayat_penyakit_sekarang').html(data.riwayat_penyakit_sekarang || '-');
                $('#status_lokalis').html(data.status_lokalis || '-');
                $('#hasil_lab').html(data.hasil_lab || '-');
                $('#diagnosis').html(data.diagnosa);
                $('#planning').html(data.planning);
            }
        });

    </script>
