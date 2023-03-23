<x-admin-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl-text-gray-800">
            {{ __('Tambah Data Visit')}}
        </h2>
    </x-slot:header>

    <div class="py-2">
        <div class="max-w-screen sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    @include('visit.field-create')
            </div>
        </div>
    </div>
</x-admin-layout>
