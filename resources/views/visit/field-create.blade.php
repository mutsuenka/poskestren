<div class="flex justify-center align-middle gap-4 justify-items-center">
    <div class="flex w-[40%] bg-gray-100 rounded-md p-4 place-content-center">
        <form method="post" action="{{ route('visit.store') }}" class="space-y-4">
            @csrf
            <p class="text-md text-center m-5">Pasien sudah ada? Pilih Pasien:</p>
            <div class="text-center m-5 w-[25em]">
                <select name="pasien" id="pasien"  class="w-full select2 left-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block">
                    <option value=""></option>
                    @foreach ($pasiens as $pasien)
                        <option value="{{ $pasien }}" >{{ $pasien->nama_lengkap }} </option>
                    @endforeach
                </select>
                <x-input-error class="" :messages="$errors->get('pasien')" />
            </div>
            <!-- Modal toggle -->
            <div class="flex justify-center m-5">
                <button id="readPasienButton" data-modal-toggle="readPasienModal" class="inline-flex items-center text-white bg-teal-400 hover:bg-teal-600 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800 disabled:bg-slate-300" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-2 -ml-1 w-6 h-6">
                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                        <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                      </svg>
                    Cek Detail Pasien
                </button>
            </div>
            <div class="text-center m-5">
                <x-primary-button class="text-center ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-1 -ml-1 w-5 h-5">
                        <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                    </svg>
                    {{ __('Antrian') }}
                </x-primary-button>
            </div>

            <!-- Main modal -->
            <div id="readPasienModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                            <!-- Modal header -->
                            <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                                    <h3 class="font-semibold" id="nama_pasien">Nama Pasien</h3>
                                    <p class="font-bold" id="dob_pasien">DOB Pasien</p>
                                </div>
                                <div>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="readPasienModal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                            </div>
                            <dl>

                                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Nomor Rekam Medis</dt>
                                <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="no_rekam_medis"></dd>
                                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Kategori</dt>
                                <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="kategori"></dd>
                                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Nama Wali</dt>
                                <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="nama_wali"></dd>
                                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Jenis Kelamin</dt>
                                <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="jenis_kelamin"></dd>
                                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">NIK</dt>
                                <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="nik"></dd>
                                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">No. Telepon</dt>
                                <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="phone"></dd>
                                <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Alamat</dt>
                                <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400" id="alamat"></dd>
                            </dl>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center space-x-3 sm:space-x-4">
                                    <button type="button" id="editPasienButton" class="text-white inline-flex items-center bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                                        <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                        Edit
                                    </button>
                                    <button type="submit" class="text-black inline-flex items-center bg-gray-50 outline hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-1 -ml-1 w-5 h-5">
                                            <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                                        </svg>
                                        Antrian
                                    </button>
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
        </form>
    </div>
    <div class="flex w-[45%] bg-gray-100 rounded-md place-content-center place-items-center p-4">
        <div class="space-y-8">
            <p class="text-center text-md mb-4">Pasien belum ada?</p>
            <div class="mt-4 place-self-center" >
                <a href="{{ route('pasien.create') }}" class="bg-teal-700 text-md hover:bg-teal-600 text-white p-4 rounded-lg">Tambah Data Pasien Baru</a>
            </div>
        </div>
    </div>
</div>
@push('scripts-lib')
    <script type="text/javascript">
        $(document).ready(function(){

            var currentPasien = '';
            console.log(currentPasien);

            if (currentPasien == '') {
                $('#readPasienButton').prop('disabled', true);
            }

            $('#pasien').on('change', function () {
                currentPasien = JSON.parse($(this).val());

                $('#readPasienButton').prop('disabled', false);

                var kelamin = 'laki-laki';

                $('#id').text(currentPasien.id);
                $('#nama_pasien').text(currentPasien.nama_lengkap);
                $('#dob_pasien').text(currentPasien.dob);
                $('#dob_pasien').append(' (' + currentPasien.age + ')');
                $('#nama_wali').text(currentPasien.nama_wali);
                $('#no_rekam_medis').text(currentPasien.no_rekam_medis);
                if (currentPasien.jenis_kelamin == 2) {
                    kelamin = 'perempuan';
                }
                $('#jenis_kelamin').text(kelamin);
                $('#nik').text(currentPasien.nik);
                $('#phone').text(currentPasien.phone);
                $('#alamat').text(currentPasien.alamat);

            });

            $('#editPasienButton').click(function() {
                var id = currentPasien.id;
                window.location.href = "{{ URL::to('pasien/:id/edit') }}".replace(':id', id);
            });

        });

        document.addEventListener("DOMContentLoaded", function(event) {
            document.getElementById('readPasienButton').click();
        });
    </script>
@endpush
