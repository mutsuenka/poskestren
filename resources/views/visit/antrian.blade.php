<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 p-4 bg-gray-5">
    <form class="pb-4 bg-gray-5 dark:bg-gray-900 flex justify-between" action="" method="GET">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-1">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="table-search" name="keyword" value="{{  old('keyword', $visits->keyword) }}" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari data visit">
        </div>
        <a href="{{ route('visit.create') }}" class="flex py-2 px-4 bg-teal-600 text-white rounded-lg relative mt-1 hover:bg-teal-800 hover:border-blue-500 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
            </svg>
            Antrian
        </a>
    </form>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-teal-100 dark:bg-gray-700 dark:text-gray-400 rounded">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">
                    Antrian ke-
                </th>
                <th scope="col" class="px-6 py-3">
                    Nomor Rekam Medis
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Pasien
                </th>
                <th scope="col" class="px-6 py-3">
                    Umur Pasien
                </th>
                <th scope="col" class="px-6 py-3">
                    Jenis Kelamin
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($visits->count() > 0)
                @foreach ($visits as $visit)
                <tr class="odd:bg-white even:bg-teal-50 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 text-center">
                        {{ $visit->no_antrian }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $visit->pasien->no_rekam_medis }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $visit->pasien->nama_lengkap }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $visit->age }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $visit->pasien->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan'  }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $visit->nama_status }}
                    </td>
                    <td class="px-6 py-4 flex gap-4">
                        @if ($visit->status == 2)
                            <a href="{{ route('visit.panggil', $visit)}}" class="align-middle text-center font-medium text-white dark:text-blue-500 hover:underline bg-teal-400 p-2 rounded">Panggil</a>
                        @endif
                        @if (auth()->user()->role != 1 && $visit->status != 6)
                            @if ($visit->status >= 1)
                            <a href="{{ route('visit.edit', [$visit->id, 'vital'])}}" class="text-center font-medium text-white dark:text-blue-500 hover:underline bg-teal-400 p-2 rounded">Catat Vital</a>
                            @endif
                            @if ($visit->status >= 2)
                            <a href="{{ route('visit.edit', [$visit->id, 'visit'])}}" class="text-center font-medium text-white dark:text-blue-500 hover:underline bg-green-400 p-2 rounded">Periksa Pasien</a>
                            @endif
                        @endif
                        @if ($visit->status == 1)
                            <a href="{{ route('visit.cancel', $visit)}}" class="text-center font-medium text-white dark:text-blue-500 hover:underline bg-green-400 p-2 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375z" />
                                    <path fill-rule="evenodd" d="M3.087 9l.54 9.176A3 3 0 006.62 21h10.757a3 3 0 002.995-2.824L20.913 9H3.087zm6.133 2.845a.75.75 0 011.06 0l1.72 1.72 1.72-1.72a.75.75 0 111.06 1.06l-1.72 1.72 1.72 1.72a.75.75 0 11-1.06 1.06L12 15.685l-1.72 1.72a.75.75 0 11-1.06-1.06l1.72-1.72-1.72-1.72a.75.75 0 010-1.06z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        @endif
                        @if ($visit->status == 6)
                            <a href="{{ route('visit.reset', $visit)}}" class="text-center font-medium text-white dark:text-blue-500 hover:underline bg-green-400 p-2 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M4.755 10.059a7.5 7.5 0 0112.548-3.364l1.903 1.903h-3.183a.75.75 0 100 1.5h4.992a.75.75 0 00.75-.75V4.356a.75.75 0 00-1.5 0v3.18l-1.9-1.9A9 9 0 003.306 9.67a.75.75 0 101.45.388zm15.408 3.352a.75.75 0 00-.919.53 7.5 7.5 0 01-12.548 3.364l-1.902-1.903h3.183a.75.75 0 000-1.5H2.984a.75.75 0 00-.75.75v4.992a.75.75 0 001.5 0v-3.18l1.9 1.9a9 9 0 0015.059-4.035.75.75 0 00-.53-.918z" clip-rule="evenodd" />
                                  </svg>
                            </a>
                        @endif
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

</div>
