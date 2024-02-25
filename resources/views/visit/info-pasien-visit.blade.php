<h2 class="font-bold mb-4">Informasi Pasien</h2>

<div class="mt-4">
    {{-- <div class="ring border-blue-500 rounded-sm p-5 mb-4"> --}}
        <div class="flex">
            <dl class="px-5 w-1/2">
                <dt class="mb-2 font-semibold leading-none text-black dark:text-white">Pasien</dt>
                <dd class="mb-4 font-light  dark:text-black">{{ $visit->pasien->nama_lengkap }}</dd>
                <dt class="mb-2 font-semibold leading-none text-black dark:text-white">Tanggal Visit</dt>
                <dd class="mb-4 font-light  dark:text-black">{{ $visit->tanggal_visit }}</dd>
            </dl>
            <dl class="px-5 w-1/2">
                <dt class="mb-2 font-semibold leading-none text-black dark:text-white">Jenis Kelamin</dt>
                <dd class="mb-4 font-light  dark:text-black">{{ $visit->jenis_kelamin }}</dd>
                <dt class="mb-2 font-semibold leading-none text-black dark:text-white">Umur</dt>
                <dd class="mb-4 font-light  dark:text-black">{{ $visit->pasien_age }}</dd>
            </dl>
        </div>
        <dl class="flex px-5">
            <dl class="w-[50%]">
                <dt class="mb-2 font-semibold leading-none text-black dark:text-white">Alergi</dt>
                <dd class="font-light  dark:text-black">{{ $visit->pasien->alergi }}</dd>
            </dl>
            <dl class="w-[50%]">
                <div class="flex m-5">
                    <button id="readPasienButton" value="{{ $pasien }}" data-modal-toggle="readPasienModal" class="block text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800" type="button">
                        Detail Pasien
                    </button>
                </div>
            </dl>
        </dl>
    {{-- </div> --}}

    <h2 class="font-bold mb-4">Riwayat Visit Pasien</h2>
    <div class="flex align-middle justify-center ring border-blue-500 rounded-sm">
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
    <div id="readPasienModal" tabindex="-1" aria-hidden="true"  class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-70%">
        <div class="relative p-4 w-full max-w-xl max-h-full md:h-auto">
            <div class="relative p-4 bg-white rounded-lg shadow max-h-[95vh] dark:bg-gray-800 sm:p-5">
                <div class="flex justify-between mb-4 rounded-t ">
                    <div class="text-lg text-black md:text-xl dark:text-white">
                        <h3 class="font-semibold" id="nama_lengkap"></h3>
                        <p class="font-bold" id="no_rekam_medis"></p>
                    </div>
                    <div>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-black rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="readPasienModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Tutup Detail Pasien</span>
                        </button>
                    </div>
                </div>
                <div class="max-h-[70vh] overflow-auto m-3">
                    <div class="px-5">
                        <table class="w-full rounded-md border-collapse border mb-4">
                            <tbody>
                            <tr class="text-center bg-teal-50">
                                <td class="font-semibold px-6 py-3">Kategori</td>
                                <td id="kategori" class=" px-6 py-3"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="font-semibold px-6 py-3">Tanggal Lahir</td>
                                <td id="dob" class="px-6 py-3"></td>
                            </tr>
                            <tr class="text-center bg-teal-50">
                                <td class="font-semibold px-6 py-3">Jenis Kelamin</td>
                                <td id="jenis_kelamin" class=" px-6 py-3"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="font-semibold px-6 py-3">Alergi</td>
                                <td id="alergi" class="px-6 py-3"></td>
                            </tr>
                            <tr class="text-center bg-teal-50">
                                <td class="font-semibold px-6 py-3">Status Kawin</td>
                                <td id="status_kawin" class=" px-6 py-3"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="font-semibold px-6 py-3">Agama</td>
                                <td id="agama" class="px-6 py-3"></td>
                            </tr>
                            <tr class="text-center bg-teal-50">
                                <td class="font-semibold px-6 py-3">Pendidikan</td>
                                <td id="pendidikan" class=" px-6 py-3"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="font-semibold px-6 py-3">Pekerjaan</td>
                                <td id="pekerjaan" class="px-6 py-3"></td>
                            </tr>
                            <tr class="text-center bg-teal-50">
                                <td class="font-semibold px-6 py-3">Catatan Pemeriksaan Terakhir</td>
                                <td id="catatan_terakhir" class=" px-6 py-3"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="font-semibold px-6 py-3">NIK</td>
                                <td id="nik" class="px-6 py-3"></td>
                            </tr>
                            <tr class="text-center bg-teal-50">
                                <td class="font-semibold px-6 py-3">Nomor Telepon</td>
                                <td id="phone" class=" px-6 py-3"></td>
                            </tr>
                            <tr class="text-center">
                                <td class="font-semibold px-6 py-3">Alamat</td>
                                <td id="alamat" class="px-6 py-3"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3 sm:space-x-4">

                    </div>
                    <button type="button" data-modal-toggle="readPasienModal" class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" fill="currentColor" class="mr-1 -ml-1 w-5 h-5">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                        </svg>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="readRiwayatPasienModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-70%">
        <div class="relative p-4 w-full max-w-6xl max-h-[90vh] md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow max-h-[95vh] dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between mb-4 rounded-t ">
                    <div class="text-lg text-black md:text-xl dark:text-white">
                        <h3 class="font-semibold" id="nama_dokter"></h3>
                        <p class="font-bold" id="tanggal_visit_riwayat"></p>
                    </div>
                    <div>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-black rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="readRiwayatPasienModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Tutup Riwayat</span>
                        </button>
                    </div>
                </div>
                <div class="max-h-[70vh] overflow-auto m-3">
                    <div class="px-5">
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
                    <div class="flex gap-4 px-5 pt-5 pb-2">
                        <dl class="px-5 w-[33%]">
                            <dt class="mb-2 font-semibold leading-none text-black dark:text-white">Keluhan Utama</dt>
                            <dd class="mb-4 font-light text-gray-800 dark:text-gray-400" id="keluhan_utama"></dd>
                            <dt class="mb-2 font-semibold leading-none text-black dark:text-white">Riwayat Penyakit Sekarang</dt>
                            <dd class="mb-2 font-light text-gray-800 dark:text-gray-400" id="riwayat_penyakit_sekarang"></dd>
                        </dl>
                        <dl class="px-5 w-[33%]">
                            <dt class="mb-2 font-semibold leading-none text-black dark:text-white">Riwayat Penyakit Dulu</dt>
                            <dd class="mb-4 font-light text-black dark:text-gray-400" id="riwayat_penyakit_dulu"></dd>
                            <dt class="mb-2 font-semibold leading-none text-black dark:text-white">Riwayat Penyakit Keluarga</dt>
                            <dd class="mb-2 font-light text-black dark:text-gray-400" id="riwayat_penyakit_keluarga"></dd>
                        </dl>
                        <dl class="px-5 w-[33%]">
                            <dt class="mb-2 font-semibold leading-none text-black dark:text-white">Status Lokalis</dt>
                            <dd class="mb-4 font-light text-gray-800 dark:text-gray-400" id="status_lokalis"></dd>
                            <dt class="mb-2 font-semibold leading-none text-black dark:text-white">Hasil Lab</dt>
                            <dd class="mb-2 font-light text-gray-800 dark:text-gray-400" id="hasil_lab"></dd>
                        </dl>
                    </div>
                    <div class="flex gap-4 px-5 py-2 border-y-2">
                        <dl class="px-5 py-2 w-[33%]">
                            <dt class="mb-2 font-semibold leading-none text-black dark:text-white">Kepala/Leher</dt>
                            <dd class="mb-4 font-light text-gray-800  dark:text-gray-400" id="kepala_leher"></dd>
                            <dt class="mb-2 font-semibold leading-none text-black dark:text-white">Thorax</dt>
                            <dd class="mb-2 font-light text-gray-800  dark:text-gray-400" id="thorax"></dd>
                        </dl>
                        <dl class="px-5 py-2 w-[33%]">
                            <dt class="mb-2 font-semibold leading-none text-black dark:text-white">COR</dt>
                            <dd class="mb-4 font-light text-gray-800 dark:text-gray-400" id="cor"></dd>
                            <dt class="mb-2 font-semibold leading-none text-black dark:text-white">Pulmo</dt>
                            <dd class="mb-2 font-light text-gray-800 dark:text-gray-400" id="pulmo"></dd>
                        </dl>
                        <dl class="px-5 py-2 w-[33%]">
                            <dt class="mb-2 font-semibold leading-none text-black dark:text-white">Abdomen</dt>
                            <dd class="mb-4 font-light text-gray-800  dark:text-gray-400" id="abdomen"></dd>
                            <dt class="mb-2 font-semibold leading-none text-black dark:text-white">Ekstremitas</dt>
                            <dd class="mb-2 font-light text-gray-800  dark:text-gray-400" id="ekstremitas"></dd>
                        </dl>
                    </div>
                    <div class="flex gap-4 px-5 py-2">
                        <dl class="px-5 w-[50%]">
                            <dt class="mb-2 font-semibold leading-none text-black dark:text-white">Diagnosis</dt>
                            <dd class="mb-4 font-light text-gray-800 dark:text-gray-400" id="diagnosis"></dd>
                        </dl>
                        <dl class="px-5 w-[50%]">
                            <dt class="mb-2 font-semibold leading-none text-black dark:text-white">Planning</dt>
                            <dd class="mb-4 font-light text-gray-800 dark:text-gray-400" id="planning"></dd>
                        </dl>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3 sm:space-x-4">
                        <button type="button" id="viewVisit" class="text-white inline-flex items-center bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1.5 -ml-1">
                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                            Lihat selengkapnya
                        </button>
                    </div>
                    <button type="button" data-modal-toggle="readRiwayatPasienModal" class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
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
            var dataPasien = '';

            $('#readPasienButton').on('click', function () {
                dataPasien = JSON.parse($(this).val());
                console.log($(this).val());
                setModalPasienPage(dataPasien);
            })

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

            function setModalPasienPage(data) {
                console.log("Yak Betul");
                $('#no_rekam_medis').text(data.no_rekam_medis);
                $('#kategori').text(data.kategori);
                $('#nama_lengkap').text(data.nama_lengkap);
                $('#dob').text(data.dob);
                if (data.jenis_kelamin == 1) {
                    $('#jenis_kelamin').text('Laki-laki');
                } else {
                    $('#jenis_kelamin').text('Perempuan');
                }
                $('#alergi').html(data.alergi || '-');
                if (data.status_kawin == 1) {
                    $('status_kawin').text('Sudah Menikah');
                } else {
                    $('status_kawin').text('Belum Menikah');
                }
                $('#agama').text(data.agama || '-');
                $('#pendidikan').text(data.pendidikan || '-');
                $('#pekerjaan').text(data.pekerjaan || '-');
                $('#catatan_terakhir').html(data.catatan_terakhir || '-');
                $('#nik').text(data.nik || '-');
                $('#phone').text(data.phone || '-');
                $('#alamat').text(data.alamat || '-');
            }

            function setModalPage(data) {
                $('#nama_dokter').text('Pemeriksaan oleh dr. ');
                $('#nama_dokter').append(data.nama_dokter);
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

            $('#viewVisit').on('click', function () {
                var linkURL = "{{ URL::to('visit/show/:id')}}".replace(":id", dataRiwayatPasien.id);

                window.open(linkURL, "_blank");
            });
        });

    </script>
