<x-admin-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Kelola User Aplikasi') }}
        </h2>
    </x-slot:header>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 p-4 bg-gray-5">
        <form class="pb-4 bg-gray-5 dark:bg-gray-900 flex justify-between" action="" method="GET">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="table-search" name="keyword" value="{{  old('keyword',$users->keyword) }}" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
            </div>
            <a href="{{ route('user.create') }}" class="block p-2 bg-teal-600 text-white rounded-lg relative mt-1 hover:bg-teal-800 hover:border-blue-500">Tambah User</a>
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
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nomor Telepon
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Peran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->phone }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->peran }}
                    </td>
                    <td class="px-6 py-4 flex gap-4">
                        <a href="{{ route('user.edit', $user->id)}}" class="font-medium text-teal-600 dark:text-blue-500 hover:underline">Edit</a>
                        {{-- <a href="{{ route('user.show', $user->id)}}" class="font-medium text-teal-600 dark:text-blue-500 hover:underline">Show</a> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-5">
            {{ $users->withQueryString()->links() }}
        </div>

    </div>
</x-admin-layout>
