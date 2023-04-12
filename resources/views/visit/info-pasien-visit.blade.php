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

    <h3 class="font-bold">Riwayat Visit Pasien</h3>
    <div class="flex align-middle justify-center border border-blue-500 round-sm">
        @if ($riwayat_pasiens->isNotEmpty())
            @if (isset($riwayat_pasiens[0]))
                <div class="flex justify-center m-5">
                    <button id="readRiwayatPasienButton1" value="{{ $riwayat_pasiens[0] }}" data-modal-toggle="readRiwayatPasienModal" class="block text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800" type="button">
                    Visit {{ $riwayat_pasiens[0]->tanggal_visit }}
                    </button>
                </div>
            @endif
            @if (isset($riwayat_pasiens[1]))
                <div class="flex justify-center m-5">
                    <button id="readRiwayatPasienButton2" value="{{ $riwayat_pasiens[1] }}" data-modal-toggle="readRiwayatPasienModal" class="block text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800" type="button">
                    Visit {{ $riwayat_pasiens[1]->tanggal_visit }}
                    </button>
                </div>
            @endif
            @if (isset($riwayat_pasiens[2]))
                <div class="flex justify-center m-5">
                    <button id="readRiwayatPasienButton3" value="{{ $riwayat_pasiens[2] }}" data-modal-toggle="readRiwayatPasienModal" class="block text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800" type="button">
                    Visit {{ $riwayat_pasiens[2]->tanggal_visit }}
                    </button>
                </div>
            @endif
        @else
            <h4 class="text-center m-5">Visit pertama pasien</h4>
        @endif
    </div>
    <div id="readRiwayatPasienModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                    <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                        <h3 class="font-semibold" id="nama_dokter"></h3>
                        <p class="font-bold" id="tanggal_visit_riwayat"></p>
                    </div>
                    <div>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="readRiwayatPasienModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Tutup Riwayat</span>
                        </button>
                    </div>
                </div>
                <dl>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Keluhan Utama</dt>
                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="keluhan_utama"></dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Diagnosis</dt>
                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="diagnosis"></dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Planning</dt>
                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="planning"></dd>
                </dl>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3 sm:space-x-4">
                        <button type="button" id="viewVisit" class="text-white inline-flex items-center bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1.5 -ml-1">
                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                            Lihat selengkapnya
                        </button>
                        <button type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Preview
                        </button>
                    </div>
                    <button type="button" class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                        <svg aria-hidden="true" class="w-5 h-5 mr-1.5 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        Delete
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

            $('#readRiwayatPasienButton2').on('click', function() {
                dataRiwayatPasien = JSON.parse($(this).val());
                setModalPage(dataRiwayatPasien);
            });

            $('#readRiwayatPasienButton3').on('click', function() {
                var dataRiwayatPasien = JSON.parse($(this).val());
                setModalPage(dataRiwayatPasien);
            });

            function setModalPage(data) {
                $('#nama_dokter').text('Pemeriksaan oleh dr. ');
                $('#nama_dokter').append(data.nama_dokter);
                $('#tanggal_visit_riwayat').text(data.tanggal_visit);
                $('#keluhan_utama').text(data.keluhan_utama);
                $('#diagnosis').text(data.diagnosa);
                $('#planning').html(data.planning);
            }

            $('#viewVisit').on('click', function () {
                var linkURL = "{{ URL::to('visit/show/:id')}}".replace(":id", dataRiwayatPasien.id);

                window.open(linkURL, "_blank");
            });
        });

    </script>
