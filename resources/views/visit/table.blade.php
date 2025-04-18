<div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 p-4 bg-gray-5">
    <form class="pb-4 bg-gray-5 dark:bg-gray-900 flex justify-between" action="" method="GET">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-1">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="table-search" name="keyword" value="{{  old('keyword') }}" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
        </div>
        <a href="{{ route('visit.create') }}" class="block p-2 bg-teal-600 text-white rounded-lg relative mt-1 hover:bg-teal-800 hover:border-blue-500">Tambahkan Visit</a>
    </form>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-teal-100 dark:bg-gray-700 dark:text-gray-400 rounded">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Visit
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Nama Pasien
                </th>
                <th scope="col" class="px-6 py-3">
                    Keluhan Utama
                </th>
                <th scope="col" class="px-6 py-3">
                    Diagnosa
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
            @foreach ($visits as $visit)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $visit->tanggal_visit }}
                </th>
                <td class="px-6 py-4 text-center">
                    {{ $visit->pasien->nama_lengkap }}
                </td>
                <td class="px-6 py-4">
                    {{ $visit->keluhan_utama }}
                </td>
                <td class="px-6 py-4">
                    {{ $visit->diagnosa }}
                </td>
                <td class="px-6 py-4">
                    {{ $visit->nama_status }}
                </td>
                <td class="px-6 py-4 flex gap-4">
                    @if ($visit->status < 4)
                        <a href="{{ route('visit.edit', [$visit->id, 'vital'])}}" class="font-medium text-white dark:text-blue-500 hover:underline bg-teal-400 p-2 rounded text-center shadow-md">Catat Vital</a>
                        <a href="{{ route('visit.edit', [$visit->id, 'visit'])}}" class="font-medium text-white dark:text-blue-500 hover:underline bg-green-400 p-2 rounded text-center shadow-md">Periksa Pasien</a>
                    @else
                        <a href="{{ route('visit.show', $visit->id)}}" class="font-medium text-white dark:text-blue-500 hover:underline bg-teal-400 p-2 rounded text-center shadow-md">Lihat Visit</a>

                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-5">
        {{ $visits->links() }}
    </div>

</div>
