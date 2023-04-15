<x-admin-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Daftar Pasien') }}
        </h2>
    </x-slot:header>

    <!-- simple dashboard -->
    <div class="flex p-2 gap-4 justify-start">
        <div class="bg-teal-100 p-7 h-1/4 space-y-3 rounded-md w-1/3 xl:w-1/6 shadow-md">
            <div class="font-semibold text-md text-left mb-5">
                Total Pasien
            </div>
            <div class="font-extrabold text-5xl text-right">
                {{ $totalPasien }}
            </div>
        </div>
        <div class="bg-teal-100 p-7 h-1/4 space-y-3 rounded-md w-1/3 xl:w-1/6 shadow-md">
            <div class="font-semibold text-md text-left mb-5">
                Pasien Baru {{ $monthYear }}
            </div>
            <div class="font-extrabold text-5xl text-right">
                {{ $totalPasienBulan }}
            </div>
        </div>
        <div class="bg-teal-100 p-7 h-1/4 space-y-3 rounded-md w-1/3 xl:w-1/6 shadow-md">
            <div class="font-semibold text-md text-left mb-5">
                Pasien Baru {{ $year }}
            </div>
            <div class="font-extrabold text-5xl text-right">
                {{ $totalPasienTahun }}
            </div>
        </div>
    </div>

    <!-- Pasien Table -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 p-4 bg-gray-5">
        <form class="pb-4 bg-gray-5 dark:bg-gray-900 flex justify-between" action="" method="GET">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="table-search" name="keyword" value="{{  old('keyword',$pasiens->keyword) }}" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Pasien/RM">
            </div>
            <div class="flex gap-2">
                <a href="{{ route('pasien.export') }}" class="flex py-2 px-3 bg-teal-400 text-white rounded-lg relative mt-1 hover:bg-teal-600 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-1 -ml-1 w-5 h-5">
                        <path fill-rule="evenodd" d="M11.47 2.47a.75.75 0 011.06 0l4.5 4.5a.75.75 0 01-1.06 1.06l-3.22-3.22V16.5a.75.75 0 01-1.5 0V4.81L8.03 8.03a.75.75 0 01-1.06-1.06l4.5-4.5zM3 15.75a.75.75 0 01.75.75v2.25a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5V16.5a.75.75 0 011.5 0v2.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V16.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                    </svg>
                    Export
                </a>
                <a href="{{ route('pasien.create') }}" class="flex py-2 px-3 bg-teal-500 text-white rounded-lg relative mt-1 hover:bg-teal-600 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                    </svg>
                    Pasien
                </a>
            </div>
        </form>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-teal-100 dark:bg-gray-700 dark:text-gray-400 rounded">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Pasien
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No Rekam Medis
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Lahir
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Umur
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jenis Kelamin
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alergi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = ($pasiens->currentPage() -1) * $pasiens->perPage() + 1;
                @endphp
                @foreach ($pasiens as $pasien)
                <tr class="odd:bg-white even:bg-teal-50 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4">
                        {{ $i++ }}
                    </th>
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $pasien->nama_lengkap }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pasien->no_rekam_medis }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pasien->dob }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pasien->age }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pasien->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $pasien->alergi }}
                    </td>
                    <td class="px-6 py-4 flex gap-4">
                        <a href="{{ route('pasien.edit', $pasien->id)}}" class="font-medium text-teal-600 dark:text-blue-500 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                            </svg>
                        </a>
                        <a href="{{ route('pasien.show', $pasien->id)}}" class="font-medium text-teal-600 dark:text-blue-500 hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        @if ($pasien->jumlah_visit == 0)
                            <form action="{{ route('pasien.destroy', $pasien)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus data pasien ini?')" class="font-medium text-red-600 dark:text-blue-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5">
            {{ $pasiens->withQueryString()->links() }}
        </div>

    </div>
</x-admin-layout>
