<x-admin-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Log Visit') }}
        </h2>
    </x-slot:header>

    @include('visit.log-visit')

</x-admin-layout>
